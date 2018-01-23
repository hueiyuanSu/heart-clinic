<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\Status;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'PlatformInformation');
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
                            'category',
                            'company',
                            'principal',
                            'employer_identification_number',
                            'factory_number',
                            'address',
                            'phone',
                            'email:email',
                            'register_date',
                            'remark',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view} {myButton}',
                                'buttons' => [
                                    'myButton' => function($url, $model, $key) {
                                        $status_helper = new Status();
                                        // return $status_helper->confirmed_status($model->is_confirmed);
                                        if($model->is_confirmed==0){
                                            return Html::a($status_helper->confirmed_status($model->is_confirmed),['/admin/platform-information/confirm?id='.$model->id], ['class' => 'btn btn-danger btn-sm', 'data-pjax' => 0]);
                                        }else{
                                            return Html::a($status_helper->confirmed_status($model->is_confirmed),['/admin/platform-information/confirm?id='.$model->id], ['class' => 'btn btn-primary btn-sm disabled', 'data-pjax' => 0]);
                                        }

                                    }
                                ]
                            ],
                        ],
                    ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
