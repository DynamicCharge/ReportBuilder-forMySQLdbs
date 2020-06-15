<?php


namespace app\controllers;

use app\models\Reports;
use app\models\Settings;
use PHPExcel;
use PHPExcel_Writer_Excel5;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

require '../vendor/PHPExcel.php';

class MainController extends Controller
{
    public $layout = 'second-layout';

public function beforeAction($action)
{
    if (in_array($action->id, ['create-report'])) {
        $this->enableCsrfValidation = false;
    }
    if (in_array($action->id, ['show-report'])) {
        $this->enableCsrfValidation = false;
    }
    if (in_array($action->id, ['export-excel'])) {
        $this->enableCsrfValidation = false;
    }
    return parent::beforeAction($action);
}

    public function actionCreateReport(){
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            $settingsModel = Settings::find()->one();
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
            $model->db_name = $settingsModel->db_name;
            $model->save();
        }
        return $this->render('create-report', compact('post'));
    }


    public function actionExportExcel(){
    if (Yii::$app->request->post()){
        $reportName = Yii::$app->request->post('reportName');
        $headersArray = Yii::$app->request->post('headersArray');
        $queryData = Yii::$app->request->post('queryData');


        $myXls = new PHPExcel();
        $myXls->setActiveSheetIndex(0);
        $mySheet = $myXls->getActiveSheet();
        $mySheet->setTitle($reportName);


        $cellLetter = 'A';
        for ($i=0; $i<count($headersArray); $i++){
            $string = $headersArray[$i];
            $myXls->getActiveSheet()->setCellValueExplicit($cellLetter.'1', $string, \PHPExcel_Cell_DataType::TYPE_STRING);
            $cellLetter++;
        }

        $cellLetter = 'A';
        for ($i=0; $i<count($headersArray); $i++){
            $cellNumber = 2;
            for ($j=0; $j<count($queryData[$i]); $j++){
                $string = $queryData[$i][$j][0];
                $myXls->getActiveSheet()->setCellValueExplicit($cellLetter.$cellNumber, $string, \PHPExcel_Cell_DataType::TYPE_STRING);
                $cellNumber++;
            }
            $cellLetter++;
        }

        $objWriter = new PHPExcel_Writer_Excel5($myXls);
        $objWriter->save("../export/CustomReport.xls");
    }
    }
    public function actionShowReport(){

        if(Yii::$app->request->isAjax){
            $temp = Yii::$app->request->post();
            switch ($temp['requestType']){
                case ('delete'):
                    $report = Reports::find()->where(['name' => $temp['reportName']])->one();
                    $report->delete();
                    break;
            }
        }
        return $this->render('show-report');
    }
}