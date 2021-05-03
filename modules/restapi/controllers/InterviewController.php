<?php

namespace app\modules\restapi\controllers;

use app\modules\restapi\models\Interview;
use Yii;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;


class InterviewController extends \yii\rest\Controller
{
    public $modelClass = Interview::class;

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



//xatolik bor
    public function actionUpdate($id){
        $model = $this->findModel($id);
        $model->load(Yii::$app->request->getBodyParams(), '');
        if ($model->save() === false && !$model->hasErrors()){
            throw new ServerErrorHttpException('failed');
        }

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

    public function verbs()
    {
        return parent::verbs();

    }

}
