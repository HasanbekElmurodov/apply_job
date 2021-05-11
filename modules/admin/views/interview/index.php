<?php

use app\models\Application;
use app\models\Examiner;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\InterviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Interviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interview-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Interview', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);
    //
    $examiner = ArrayHelper::map(Examiner::find()->all(), 'id', 'username' );
//    echo "<pre>";
//    print_r($examiner);
//    exit();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'examiner.username',
//                'format' =>'raw',
                'label'=>'Examiner Name',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'examiner_id',
                    'data' => ArrayHelper::map(Examiner::find()->all(), 'id', 'username'),
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'options' => [
                        'placeholder' => Yii::t('app', 'Select ...'),
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
            ],
            [
                'attribute' => 'application.full_name',
                'format' =>'text',
                'label'=>'Applicant Name',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'applicant_id',
                    'data' => ArrayHelper::map(Application::find()->all(), 'id', 'full_name'),
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'options' => [
                        'placeholder' => Yii::t('app', 'Select ...'),
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
            ],
            'attribute' =>'interview_time',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
