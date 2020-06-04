<?php


namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class MainController extends Controller
{
    public $layout = 'second-layout';

    public function actionMain(){
        return $this->render('main');
    }

}