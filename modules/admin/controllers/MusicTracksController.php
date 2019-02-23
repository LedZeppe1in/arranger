<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\modules\admin\models\MusicTrack;
use app\modules\admin\models\MusicTrackSearch;

/**
 * MusicTracksController implements the CRUD actions for MusicTrack model.
 */
class MusicTracksController extends Controller
{
    public $layout = 'admin';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MusicTrack models.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new MusicTrackSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MusicTrack model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MusicTrack model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MusicTrack();

        if ($model->load(Yii::$app->request->post())) {
            $preview_file = UploadedFile::getInstance($model, 'preview_file');
            $music_track_file = UploadedFile::getInstance($model, 'music_track_file');
            if ($preview_file && $preview_file->tempName && $music_track_file && $music_track_file->tempName) {
                $model->preview_file = $preview_file;
                $model->music_track_file = $music_track_file;
                if ($model->validate(['preview_file']) && $model->validate(['music_track_file'])) {
                    // Формирование пути к файлам превью и трека (без папки с id записи БД)
                    $dir = Yii::getAlias('@webroot') . '/uploads/music-tracks/';
                    $preview_file_name = $model->preview_file->baseName . '.' . $model->preview_file->extension;
                    $model->preview = $dir . $preview_file_name;
                    $music_track_file_name = $model->music_track_file->baseName . '.' .
                        $model->music_track_file->extension;
                    $model->file = $dir . $music_track_file_name;
                    // Сохранение данных о новом превью и треке в БД
                    if ($model->save()) {
                        // Формирование новой директории для файлов превью и трека
                        $dir .= $model->id . '/';
                        // Создание новой директории для файлов превью и трека
                        FileHelper::createDirectory($dir);
                        // Обновление пути к для файлов превью и трека в БД
                        $model->updateAttributes(['preview' => $dir . $preview_file_name]);
                        $model->updateAttributes(['file' => $dir . $music_track_file_name]);
                        // Сохранение файлов превью и трека на сервере
                        $model->preview_file->saveAs($dir . $preview_file_name);
                        $model->music_track_file->saveAs($dir . $music_track_file_name);
                        Yii::$app->getSession()->setFlash('success',
                            Yii::t('app', 'MUSIC_TRACKS_ADMIN_PAGE_MESSAGE_CREATE_MUSIC_TRACK'));

                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MusicTrack model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $preview_file = UploadedFile::getInstance($model, 'preview_file');
            $music_track_file = UploadedFile::getInstance($model, 'music_track_file');
            if ($preview_file && $preview_file->tempName && $music_track_file && $music_track_file->tempName) {
                $model->preview_file = $preview_file;
                $model->music_track_file = $music_track_file;
                if ($model->validate(['preview_file']) && $model->validate(['music_track_file'])) {
                    // Определение директории где расположен файл превью
                    $pos = strrpos($model->preview, '/');
                    $dir = substr($model->preview, 0, $pos) . '/';
                    // Запоминание нового имя файла превью
                    $preview_file_name = $model->preview_file->baseName . '.' . $model->preview_file->extension;
                    // Удаление старого файла превью
                    unlink($model->preview);
                    // Сохранение нового файла превью
                    $model->preview_file->saveAs($dir . $preview_file_name);
                    // Сохранение нового пути к файлу превью в БД
                    $model->updateAttributes(['preview' => $dir . $preview_file_name]);
                    // Определение директории где расположен файл трека
                    $pos = strrpos($model->file, '/');
                    $dir = substr($model->file, 0, $pos) . '/';
                    // Запоминание нового имя файла трека
                    $music_track_file_name = $model->music_track_file->baseName . '.' .
                        $model->music_track_file->extension;
                    // Удаление старого файла трека
                    unlink($model->file);
                    // Сохранение нового файла трека
                    $model->music_track_file->saveAs($dir . $music_track_file_name);
                    // Сохранение нового пути к файлу трека в БД
                    $model->updateAttributes(['file' => $dir . $music_track_file_name]);
                }
            }
            // Вывод сообщения об удачном изменении записи
            Yii::$app->getSession()->setFlash('success',
                Yii::t('app', 'MUSIC_TRACKS_ADMIN_PAGE_MESSAGE_UPDATED_MUSIC_TRACK'));

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MusicTrack model.
     * If deletion is successful, the browser will be redirected to the 'list' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        // Удаление файла превью
        unlink($model->preview);
        // Определение директории где расположен файл трека
        $pos = strrpos($model->file, '/');
        $dir = substr($model->file, 0, $pos);
        // Удаление файла трека и директории где он хранился
        FileHelper::removeDirectory($dir);
        // Удалние записи из БД
        $model->delete();
        Yii::$app->getSession()->setFlash('success',
            Yii::t('app', 'MUSIC_TRACKS_ADMIN_PAGE_MESSAGE_DELETED_MUSIC_TRACK'));

        return $this->redirect(['list']);
    }

    /**
     * Finds the MusicTrack model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MusicTrack the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MusicTrack::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'ERROR_MESSAGE_PAGE_NOT_FOUND'));
    }
}