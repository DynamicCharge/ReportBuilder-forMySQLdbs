<?php


namespace app\controllers;

use app\models\Reports;
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

public function beforeAction($action)
{
    if (in_array($action->id, ['create-report'])) {
        $this->enableCsrfValidation = false;
    }
    return parent::beforeAction($action);
}

    public function actionCreateReport(){
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            $reportDataArray = $post['newReportDataArray'];
            $resultArray = [];
            for ($i=0; $i<count($reportDataArray); $i++){
                $resultArray[$i] = implode('|', $reportDataArray[$i]);
            }
            $model = new Reports();
            $model->name = $post['reportName'];
            $model->custom_headers = $resultArray[0];
            $model->table_names = $resultArray[1];
            $model->table_header_name = $resultArray[2];
            $model->search_items = $resultArray[3];
            $model->save();
            return $this->refresh();
        }
        return $this->render('create-report', compact('post'));
    }
}