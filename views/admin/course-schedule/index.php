<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Course Schedules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="an-body-topbar wow fadeIn">
    <div class="an-page-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
    <div class="title_right">
        <?= Html::a('<i class="fa fa-plus m-r-5"></i>'.Yii::t('app', 'Create Course Schedule'), ['create'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('<i class="fa fa-calendar m-r-5"></i>'.Yii::t('app', 'Calendar View'), ['calendar'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<div class="an-single-component with-shadow">
    <div class="an-component-body">
        <div class="an-helper-block">
            <div class="an-scrollable-x">
                <?php Pjax::begin(); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute'=>'course_id',
                                'headerOptions' => ['style' => 'width:150px'],
                                'label' =>  Yii::t('app', 'Course Name'),
                                'value' => function ($model) {
                                    return $model->course->name;
                                },
                            ],
                            [
                                'attribute' => 'status',
                                'format'=>'html',
                                'value' => function ($model) {
                                    return $model->getStatusLabel();
                                },
                            ],
                            'start_at:datetime',
                            'end_at:datetime',
                            // 'modified_at',
                            'created_at:datetime',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
