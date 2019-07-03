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
use app\modules\main\models\ContactForm;

class DefaultController extends Controller
{
    public $layout = 'main';

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
        $model = User::find()->one();

        return $this->render('index', [
            'model' => $model,
        ]);
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
                'pageSize' => 10,
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

        return $this->render('big-band-view', [
            'model' => $model,
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

        return $this->render('jazz-combo-view', [
            'model' => $model,
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

        return $this->render('pop-music-view', [
            'model' => $model,
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

        return $this->render('jingle-view', [
            'model' => $model,
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

        return $this->render('stem-view', [
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
                'pageSize' => 10,
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
                'pageSize' => 10,
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
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
}