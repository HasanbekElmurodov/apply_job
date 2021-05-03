<?php


namespace app\controllers;


use app\models\ApplicationForm;
use Yii;
use yii\base\Controller;

class ApplicationController extends Controller
{
    public function actionIndex()
    {
        $model = new ApplicationForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('success', "Ro'yxatdan muvaffaqiyatli o'tdingiz. Sizga uchrashuv vaqtini email orqali malum qilamiz!!!");
                $model = new ApplicationForm();
                return $this->render('index', ['model' => $model]);
            }
        }
            return $this->render('index', ['model' => $model]);

        }


}