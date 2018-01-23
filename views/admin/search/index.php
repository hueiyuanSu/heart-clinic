<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Query');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="an-body-topbar wow fadeIn">
    <div class="an-page-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
    <div class="title_right">
        <?= Html::a('<i class="fa fa-plus m-r-5"></i>'.Yii::t('app', 'Create Industry'), ['create'], ['class' => 'btn btn-success']) ?>
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
                            [
                                'attribute'=>'avatar',
                                'format' => ['image',['width'=>'100']],
                                'value' => function ($model) {
                                    return $model->avatar;
                                },
                            ],
                            'name',
                            'description:ntext',
                            [
                                'attribute' => 'status',
                                'format'=>'html',
                                'value' => function ($model) {
                                    return $model->getStatusLabel();
                                },
                            ],
                            'modified_at:datetime',
                            'created_at:datetime',

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

                    ]);
                ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
