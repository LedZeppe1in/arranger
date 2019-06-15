<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\modules\admin\models\SheetMusic;
use app\modules\admin\models\SheetMusicSearch;

/**
 * SheetMusicController implements the CRUD actions for SheetMusic model.
 */
class SheetMusicController extends Controller
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
     * Lists all SheetMusic models.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new SheetMusicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SheetMusic model.
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
     * Creates a new SheetMusic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SheetMusic();

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'sheet_music_file');
            if ($file && $file->tempName) {
                $model->sheet_music_file = $file;
                if ($model->validate(['sheet_music_file'])) {
                    // Формирование пути к файлу партитуры (без папки с id записи БД)
                    $dir = Yii::getAlias('@webroot') . '/uploads/sheet-music/';
                    $fileName = str_replace(' ', '-', $model->sheet_music_file->baseName) . '.' .
                        $model->sheet_music_file->extension;
                    $model->file = $dir . $fileName;
                    // Сохранение данных о новой партитуре в БД
                    if ($model->save()) {
                        // Формирование новой директории для файла партитуры
                        $dir .= $model->id . '/';
                        // Создание новой директории для файла партитуры
                        FileHelper::createDirectory($dir);
                        // Обновление пути к для файлу партитуры в БД
                        $model->updateAttributes(['file' => $dir . $fileName]);
                        // Сохранение файла партитуры на сервере
                        $model->sheet_music_file->saveAs($dir . $fileName);
                        Yii::$app->getSession()->setFlash('success',
                            Yii::t('app', 'SHEET_MUSIC_ADMIN_PAGE_MESSAGE_CREATE_SHEET_MUSIC'));

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
     * Updates an existing SheetMusic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $file = UploadedFile::getInstance($model, 'sheet_music_file');
            if ($file && $file->tempName) {
                $model->sheet_music_file = $file;
                if ($model->validate(['sheet_music_file'])) {
                    // Определение директории где расположен файл партитуры
                    $pos = strrpos($model->file, '/');
                    $dir = substr($model->file, 0, $pos) . '/';
                    // Запоминание нового имя файла партитуры
                    $fileName = $model->sheet_music_file->baseName . '.' . $model->sheet_music_file->extension;
                    // Удаление старого файла партитуры
                    unlink($model->file);
                    // Сохранение нового файла партитуры
                    $model->sheet_music_file->saveAs($dir . $fileName);
                    // Сохранение нового пути к файлу партитуры в БД
                    $model->updateAttributes(['file' => $dir . $fileName]);
                }
            }
            // Вывод сообщения об удачном изменении записи
            Yii::$app->getSession()->setFlash('success',
                Yii::t('app', 'SHEET_MUSIC_ADMIN_PAGE_MESSAGE_UPDATED_SHEET_MUSIC'));

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SheetMusic model.
     * If deletion is successful, the browser will be redirected to the 'list' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        // Определение директории где расположен файл партитуры
        $pos = strrpos($model->file, '/');
        $dir = substr($model->file, 0, $pos);
        // Удаление файла партитуры и директории где она хранилась
        FileHelper::removeDirectory($dir);
        // Удалние записи из БД
        $model->delete();
        Yii::$app->getSession()->setFlash('success',
            Yii::t('app', 'SHEET_MUSIC_ADMIN_PAGE_MESSAGE_DELETED_SHEET_MUSIC'));

        return $this->redirect(['list']);
    }

    /**
     * Вывод pdf-файла партитуры на экран.
     * @param integer $id
     * @return $this
     * @throws NotFoundHttpException
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        // Получение названия файла партитуры
        $file_name = basename($model->file);
        // Формирование полного пути до файла партитуры
        $completePath = Yii::getAlias('@webroot') . '/uploads/sheet-music/' . $model->id . '/' . $file_name;

        return Yii::$app->response->sendFile($completePath, $file_name, ['inline'=>true]);
    }

    /**
     * Finds the SheetMusic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SheetMusic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SheetMusic::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'ERROR_MESSAGE_PAGE_NOT_FOUND'));
    }
}