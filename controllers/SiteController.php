<?php

namespace app\controllers;

use app\models\Settings;
use Yii;
use yii\db\Exception;
use yii\debug\components\search\matchers\Base;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
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
        $settingsArray = Settings::find()->asArray()->one();
        if ($settingsArray){
            Yii::$app->session->setFlash('connected', 'База даных подключена!');
            return $this->render('index', compact('settingsArray'));
        } else {
            Yii::$app->session->setFlash('disconnected', 'База даных не подключена!');
            return $this->render('index');
        }
    }

    /**
     * Displays settings page.
     *
     * @return string
     */
    public function actionSettings()
    {
        $settingsModel = new Settings();

        if (Settings::find()->all()) {
            $settingsModel = Settings::find()->one();
        }

        if ($settingsModel->load(Yii::$app->request->post())){
            if ($settingsModel->validate()) {
                try {
                    $dbc = mysqli_connect($settingsModel['host'], $settingsModel['username'], $settingsModel['password'], $settingsModel['db_name']);
                    if(!$dbc){
                        throw new Exception('Error!');
                    }
                    Yii::$app->session->setFlash('settings-model-success', 'Соединение успешно установлено!');
                    $settingsModel->save();
                } catch (\Exception $ex){
                    Yii::$app->session->setFlash('settings-model-error', 'Соединение не установлено');
                }
            }
        }

        return $this->render('settings', compact('settingsModel'));
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionInfo()
    {
        return $this->render('info');
    }
}
