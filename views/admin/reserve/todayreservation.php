<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\Status;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BannersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Today Reservation').Yii::$app->formatter->asTime(time(), 'php:Y-m-d');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="an-body-topbar wow fadeIn">
    <div class="an-page-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
</div>
<div class="an-single-component with-shadow">
    <div class="an-component-body">
        <div class="an-helper-block">
            <div class="an-scrollable-x">
                <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            [
                                'attribute'=>'disease',
                                'value' => function ($model) {
                                    $status_helper = new Status();
                                    return $status_helper->disease_status($model->disease);
                                },
                            ],
                            'patient_name',
                            'patient_phone',
                            'reserve_time',
                            'remark',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'headerOptions' => ['style' => 'width:150px'],
                                'template' => '{view}{update}{delete}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::a('<div class="btn btn-info m-r-5"><i class="fa fa-eye"></i></div>', $url, [
                                                    'title' => Yii::t('app', 'lead-view'),
                                        ]);
                                    },

                                    'update' => function ($url, $model) {
                                        return Html::a('<div class="btn btn-success m-r-5"><i class="fa fa-pencil"></i></div>', $url, [
                                                    'title' => Yii::t('app', 'lead-update'),
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a('<div class="btn btn-danger"><i class="fa fa-trash"></i></div>', $url, [
                                                    'title' => Yii::t('app', 'lead-delete'),
                                        ]);
                                    }

                                ],
                            ],
                        ],
                    ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
