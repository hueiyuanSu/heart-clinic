<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\Status;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BannersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Disease Time');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="an-body-topbar wow fadeIn">
    <div class="an-page-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
    <div class="title_right">
        <?= Html::a('<i class="fa fa-plus m-r-5"></i>'.Yii::t('app', 'Create Disease Time'), ['create'], ['class' => 'btn btn-success']) ?>
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
                            'weekdays',
                            'time',
                        ],
                    ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php

$this->registerJsFile('@web/js/init.js', ['depends'=>['app\assets\AppAsset']]);
?>
