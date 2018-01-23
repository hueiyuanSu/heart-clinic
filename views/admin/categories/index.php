<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories Manage');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="an-body-topbar wow fadeIn">
    <div class="an-page-title">
        <h2><?= Html::encode($this->title.$now_cat); ?></h2>
    </div>
    <div class="title_right">
        <?= Html::a('<i class="fa fa-plus m-r-5"></i>'.Yii::t('app', 'Create Category'), ['create','parent'=>$parent_id], ['class' => 'btn btn-success']) ?>
    </div>
</div>
<div class="an-single-component with-shadow">
    <div class="an-component-body">
        <div class="an-helper-block">
            <div class="an-scrollable-x">
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'name',
                        // 'parent',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'headerOptions' => ['style' => 'width:200px'],
                            'template' => '{child}{view}{update}{delete}',
                            'buttons' => [
                                'child' => function ($url, $model) {
                                    return Html::a('<div class="btn btn-default m-r-5"><i class="fa fa-folder-open-o"></i></div>', ['/admin/categories/index', 'CategoriesSearch[parent_id]' => $model->id], [
                                                'title' => Yii::t('app', 'lead-view'),
                                                'data-pjax'=>"0"
                                    ]);
                                },
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
