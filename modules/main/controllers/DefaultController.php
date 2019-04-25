<?php

namespace app\modules\main\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use app\modules\admin\models\User;
use app\modules\admin\models\Event;
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
        $model = Event::find()->all();

        return $this->render('events', [
            'model' => $model,
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
        return $this->render('big-band');
    }

    /**
     * Displays jazz combo.
     *
     * @return string
     */
    public function actionJazzCombo()
    {
        return $this->render('jazz-combo');
    }

    /**
     * Displays pop music.
     *
     * @return string
     */
    public function actionPopMusic()
    {
        return $this->render('pop-music');
    }

    /**
     * Displays jingles.
     *
     * @return string
     */
    public function actionJingles()
    {
        return $this->render('jingles');
    }

    /**
     * Displays stems.
     *
     * @return string
     */
    public function actionStems()
    {
        return $this->render('stems');
    }

    /**
     * Displays projects.
     *
     * @return string
     */
    public function actionProjects()
    {
        return $this->render('projects');
    }

    /**
     * Displays publications.
     *
     * @return string
     */
    public function actionPublications()
    {
        return $this->render('publications');
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