<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


//            'examiner_id',
            [
                'attribute' => 'examiner.username',
                'format' =>'raw',
                'label'=>'Examiner Name',
                'filter' => true
            ],
            [
                'attribute' => 'application.full_name',
                'format' =>'text',
                'label'=>'Applicant Name',
            ],
            'interview_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
