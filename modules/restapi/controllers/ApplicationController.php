<?php

namespace app\modules\restapi\controllers;

use app\modules\restapi\models\Application;
use app\modules\restapi\models\Interview;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;

class ApplicationController extends \yii\rest\Controller
{
    public $modelClass = Application::class;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'index'  => ['GET'],
                    'view'   => ['GET'],
                    'create' => ['GET', 'POST'],
                    'update' => ['GET', 'PUT', 'POST'],
                    'delete' => ['POST', 'DELETE'],
                ],
            ],
        ];
    }

//    public function actionCreate(){
//
//    }
    public function actionCreate()
    {
        $model = new $this->modelClass;
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
            $id = implode(',', array_values($model->getPrimaryKey(true)));
            $response->getHeaders()->set('Location', Url::toRoute([$this->viewAction, 'id' => $id], true));
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }

        return $model;
    }

//    ishladi
    public function actionView($id){
        return Interview::findOne($id);
    }

//public function actionUpdate($id){
//
//}
public function actionUpdate($id){
    $model = $this->modelClass::findOne($id);
    $model->load(Yii::$app->getRequest()->getBodyParams(), '');
    if ($model->save() === false && !$model->hasErrors()) {
        throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
    }

    return $model;
}

//    ishladi
    public function actionDelete($id){

        $model=$this->findModel($id)->delete();
        return true;



    }
    protected function findModel($id)
    {
        if (($model = \app\modules\restapi\models\Interview::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
