<?php

namespace app\modules\main\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use app\modules\admin\models\User;
use app\modules\admin\models\Event;
use app\modules\admin\models\Project;
use app\modules\admin\models\SheetMusic;
use app\modules\admin\models\MusicTrack;
use app\modules\admin\models\Publication;
use app\modules\admin\models\LoginForm;
use app\modules\admin\models\Service;
use app\modules\main\models\ContactForm;
use app\modules\admin\models\Review;
use app\modules\admin\models\ServiceReview;
use app\modules\admin\models\SheetMusicReview;
use app\modules\admin\models\MusicTrackReview;

class DefaultController extends Controller
{
    public $layout = 'site';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'backColor' => 0xF9F9F9,
                'foreColor' => 0xFE5D39,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // Подключение макета главной страницы
        $this->layout = 'main';
        // Выборка пользователя сайта
        $user = User::find()->one();
        // Поиск последней партитуры с типом "Big band"
        $big_band = SheetMusic::find()
            ->where(array('type' => SheetMusic::TYPE_BIG_BAND))
            ->orderBy(['id' => SORT_DESC])
            ->one();
        // Поиск последней партитуры с типом "Jazz combo"
        $jazz_combo = SheetMusic::find()
            ->where(array('type' => SheetMusic::TYPE_JAZZ_COMBO))
            ->orderBy(['id' => SORT_DESC])
            ->one();
        // Поиск последней партитуры с типом "Pop music"
        $pop_music = SheetMusic::find()
            ->where(array('type' => SheetMusic::TYPE_POP_MUSIC))
            ->orderBy(['id' => SORT_DESC])
            ->one();
        // Поиск последнего трека с типом "Джингл"
        $jingle = MusicTrack::find()
            ->where(array('type' => MusicTrack::TYPE_JINGLE))
            ->orderBy(['id' => SORT_DESC])
            ->one();
        // Поиск последнего трека с типом "Мультитрек"
        $stem = MusicTrack::find()
            ->where(array('type' => MusicTrack::TYPE_STEMS))->orderBy(['id' => SORT_DESC])
            ->one();
        // Поиск последнего трека с типом "Минус"
        $minus_one = MusicTrack::find()
            ->where(array('type' => MusicTrack::TYPE_MINUS_ONE))->orderBy(['id' => SORT_DESC])
            ->one();
        // Подсчет кол-ва партитур
        $sheet_music_count = SheetMusic::find()->count();
        // Подсчет кол-ва треков
        $music_track_count = MusicTrack::find()->count();
        // Подсчет кол-ва услуг
        $service_count = Service::find()->count();

        // Форма контакта
        $contact_form = new ContactForm();
        // Если пользователь заполнил и отправил форму контактов
        if ($contact_form->load(Yii::$app->request->post()) && $contact_form->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('index', [
            'user' => $user,
            'contact_form' => $contact_form,
            'big_band' => $big_band,
            'jazz_combo' => $jazz_combo,
            'pop_music' => $pop_music,
            'jingle' => $jingle,
            'stem' => $stem,
            'minus_one' => $minus_one,
            'sheet_music_count' => $sheet_music_count,
            'music_track_count' => $music_track_count,
            'service_count' => $service_count,
        ]);
    }

    /**
     * Displays all sheet music.
     *
     * @return string
     */
    public function actionSheetMusic()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SheetMusic::find(),
            'pagination' => [
                'pageSize' => 9,
            ],
        ]);

        return $this->render('sheet-music', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays big band.
     *
     * @return string
     */
    public function actionBigBand()
    {
        // Поиск всех партитур с типом "big band"
        $dataProvider = new ActiveDataProvider([
            'query' => SheetMusic::find()->where(array('type' => SheetMusic::TYPE_BIG_BAND)),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('big-band', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SheetMusic model (big band).
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionBigBandView($id)
    {
        // Поиск партитуры по id
        $model = SheetMusic::findOne($id);
        // Поиск всех отзывов, сделанных для данной ноты (партитуры)
        $reviews = $model->reviews;
        // Модель отзыва
        $new_review = new Review();
        // Если пользователь заполнил и отправил форму отзыва
        if ($new_review->load(Yii::$app->request->post()) && $new_review->save()) {
            // Создание модели для связи нот с отзывом
            $sheet_music_review = new SheetMusicReview();
            $sheet_music_review->sheet_music = $id;
            $sheet_music_review->review = $new_review->id;
            $sheet_music_review->save();

            return $this->refresh();
        }

        return $this->render('big-band-view', [
            'model' => $model,
            'reviews' => $reviews,
            'new_review' => $new_review
        ]);
    }

    /**
     * Displays jazz combo.
     *
     * @return string
     */
    public function actionJazzCombo()
    {
        // Поиск всех партитур с типом "jazz combo"
        $dataProvider = new ActiveDataProvider([
            'query' => SheetMusic::find()->where(array('type' => SheetMusic::TYPE_JAZZ_COMBO)),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('jazz-combo', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SheetMusic model (jazz-combo).
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionJazzComboView($id)
    {
        // Поиск партитуры по id
        $model = SheetMusic::findOne($id);
        // Поиск всех отзывов, сделанных для данной ноты (партитуры)
        $reviews = $model->reviews;
        // Модель отзыва
        $new_review = new Review();
        // Если пользователь заполнил и отправил форму отзыва
        if ($new_review->load(Yii::$app->request->post()) && $new_review->save()) {
            // Создание модели для связи нот с отзывом
            $sheet_music_review = new SheetMusicReview();
            $sheet_music_review->sheet_music = $id;
            $sheet_music_review->review = $new_review->id;
            $sheet_music_review->save();

            return $this->refresh();
        }

        return $this->render('jazz-combo-view', [
            'model' => $model,
            'reviews' => $reviews,
            'new_review' => $new_review
        ]);
    }

    /**
     * Displays pop music.
     *
     * @return string
     */
    public function actionPopMusic()
    {
        // Поиск всех партитур с типом "pop music"
        $dataProvider = new ActiveDataProvider([
            'query' => SheetMusic::find()->where(array('type' => SheetMusic::TYPE_POP_MUSIC)),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('pop-music', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SheetMusic model (pop-music).
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionPopMusicView($id)
    {
        // Поиск партитуры по id
        $model = SheetMusic::findOne($id);
        // Поиск всех отзывов, сделанных для данной ноты (партитуры)
        $reviews = $model->reviews;
        // Модель отзыва
        $new_review = new Review();
        // Если пользователь заполнил и отправил форму отзыва
        if ($new_review->load(Yii::$app->request->post()) && $new_review->save()) {
            // Создание модели для связи нот с отзывом
            $sheet_music_review = new SheetMusicReview();
            $sheet_music_review->sheet_music = $id;
            $sheet_music_review->review = $new_review->id;
            $sheet_music_review->save();

            return $this->refresh();
        }

        return $this->render('pop-music-view', [
            'model' => $model,
            'reviews' => $reviews,
            'new_review' => $new_review
        ]);
    }

    /**
     * Displays all audio.
     *
     * @return string
     */
    public function actionAudio()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => MusicTrack::find(),
            'pagination' => [
                'pageSize' => 9,
            ],
        ]);

        return $this->render('audio', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays jingles.
     *
     * @return string
     */
    public function actionJingles()
    {
        // Поиск всех треков с типом "jingles"
        $dataProvider = new ActiveDataProvider([
            'query' => MusicTrack::find()->where(array('type' => MusicTrack::TYPE_JINGLE)),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('jingles', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MusicTrack model (jingles).
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionJingleView($id)
    {
        // Поиск трека по id
        $model = MusicTrack::findOne($id);
        // Поиск всех отзывов, сделанных для данного аудио (трека)
        $reviews = $model->reviews;
        // Модель отзыва
        $new_review = new Review();
        // Если пользователь заполнил и отправил форму отзыва
        if ($new_review->load(Yii::$app->request->post()) && $new_review->save()) {
            // Создание модели для связи аудио с отзывом
            $music_track_review = new MusicTrackReview();
            $music_track_review->music_track = $id;
            $music_track_review->review = $new_review->id;
            $music_track_review->save();

            return $this->refresh();
        }

        return $this->render('jingle-view', [
            'model' => $model,
            'reviews' => $reviews,
            'new_review' => $new_review
        ]);
    }

    /**
     * Displays stems.
     *
     * @return string
     */
    public function actionStems()
    {
        // Поиск всех треков с типом "stems"
        $dataProvider = new ActiveDataProvider([
            'query' => MusicTrack::find()->where(array('type' => MusicTrack::TYPE_STEMS)),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('stems', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MusicTrack model (stems).
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionStemView($id)
    {
        // Поиск трека по id
        $model = MusicTrack::findOne($id);
        // Поиск всех отзывов, сделанных для данного аудио (трека)
        $reviews = $model->reviews;
        // Модель отзыва
        $new_review = new Review();
        // Если пользователь заполнил и отправил форму отзыва
        if ($new_review->load(Yii::$app->request->post()) && $new_review->save()) {
            // Создание модели для связи аудио с отзывом
            $music_track_review = new MusicTrackReview();
            $music_track_review->music_track = $id;
            $music_track_review->review = $new_review->id;
            $music_track_review->save();

            return $this->refresh();
        }

        return $this->render('stem-view', [
            'model' => $model,
            'reviews' => $reviews,
            'new_review' => $new_review
        ]);
    }

    /**
     * Displays minus one.
     *
     * @return string
     */
    public function actionMinusOne()
    {
        // Поиск всех треков с типом "minus one"
        $dataProvider = new ActiveDataProvider([
            'query' => MusicTrack::find()->where(array('type' => MusicTrack::TYPE_MINUS_ONE)),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('minus-one', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MusicTrack model (minus one).
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionMinusOneView($id)
    {
        // Поиск трека по id
        $model = MusicTrack::findOne($id);
        // Поиск всех отзывов, сделанных для данного аудио (трека)
        $reviews = $model->reviews;
        // Модель отзыва
        $new_review = new Review();
        // Если пользователь заполнил и отправил форму отзыва
        if ($new_review->load(Yii::$app->request->post()) && $new_review->save()) {
            // Создание модели для связи аудио с отзывом
            $music_track_review = new MusicTrackReview();
            $music_track_review->music_track = $id;
            $music_track_review->review = $new_review->id;
            $music_track_review->save();

            return $this->refresh();
        }

        return $this->render('minus-one-view', [
            'model' => $model,
            'reviews' => $reviews,
            'new_review' => $new_review
        ]);
    }

    /**
     * Displays services.
     *
     * @return string
     */
    public function actionServices()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Service::find(),
            'pagination' => [
                'pageSize' => 9,
            ],
        ]);

        return $this->render('services', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Services model.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionServiceView($id)
    {
        // Поиск услуги по id
        $model = Service::findOne($id);
        // Поиск всех отзывов, сделанных для данной услуги
        $reviews = $model->reviews;
        // Модель отзыва
        $new_review = new Review();
        // Если пользователь заполнил и отправил форму отзыва
        if ($new_review->load(Yii::$app->request->post()) && $new_review->save()) {
            // Создание модели для связи услуги с отзывом
            $service_review = new ServiceReview();
            $service_review->service = $id;
            $service_review->review = $new_review->id;
            $service_review->save();

            return $this->refresh();
        }

        return $this->render('service-view', [
            'model' => $model,
            'reviews' => $reviews,
            'new_review' => $new_review
        ]);
    }

    /**
     * Delete review.
     *
     * @return bool|\yii\console\Response|Response
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionReviewDelete()
    {
        // Ajax-запрос
        if (Yii::$app->request->isAjax) {
            // Определение массива возвращаемых данных
            $data = array();
            // Установка формата JSON для возвращаемых данных
            $response = Yii::$app->response;
            $response->format = Response::FORMAT_JSON;
            // Поиск отызва по id
            $review = Review::findOne(Yii::$app->request->post('Review')['id']);
            // Удаление отзыва из БД
            $review->delete();
            // Формирование данных об id удаленного отзыва
            $data['review_id'] = Yii::$app->request->post('Review')['id'];
            // Возвращение данных
            $response->data = $data;

            return $response;
        }

        return false;
    }

    /**
     * Displays events.
     *
     * @return string
     */
    public function actionEvents()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Event::find(),
            'pagination' => [
                'pageSize' => 9,
            ],
        ]);

        return $this->render('events', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Event model.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionEventView($id)
    {
        $model = Event::findOne($id);

        return $this->render('event-view', [
            'model' => $model,
        ]);
    }

    /**
     * Displays projects.
     *
     * @return string
     */
    public function actionProjects()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Project::find(),
            'pagination' => [
                'pageSize' => 9,
            ],
        ]);

        return $this->render('projects', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionProjectView($id)
    {
        $model = Project::findOne($id);

        return $this->render('project-view', [
            'model' => $model,
        ]);
    }

    /**
     * Displays publications.
     *
     * @return string
     */
    public function actionPublications()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Publication::find(),
            'pagination' => [
                'pageSize' => 9,
            ],
        ]);

        return $this->render('publications', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Publication model.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionPublicationView($id)
    {
        $model = Publication::findOne($id);

        return $this->render('publication-view', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionSingIn()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('sing-in', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionSingOut()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $user = User::find()->one();

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
            'user' => $user,
        ]);
    }
}