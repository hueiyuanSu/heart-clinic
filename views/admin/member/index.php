<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\Status;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('appWeb', 'Members');
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
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'member_number',
                            'name',
                            [
                                'attribute'=>'sex',
                                'value' => function ($model) {
                                    $status_helper = new Status();
                                    return $status_helper->sex_status($model->sex);
                                },
                            ],
                            'email:email',
                            'phone',
                            'address',
                            [
                                'attribute'=>'is_stop',
                                'value' => function ($model) {
                                    $status_helper = new Status();
                                    return $status_helper->stop_status($model->is_stop);
                                },
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view} {myButton}',  // the default buttons + your custom button
                                'buttons' => [
                                    // 'myButton' => function($url, $model, $key) {     // render your custom button
                                    //     return Html::a();
                                    // }
                                ]
                            ],
                        ],
                    ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>

