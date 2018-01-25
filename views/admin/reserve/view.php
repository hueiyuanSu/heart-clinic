<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Status;
/* @var $this yii\web\View */
/* @var $model app\models\Banners */

$this->title = '預約編號'.$model->reserve_number;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reserve'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="an-body-topbar wow fadeIn">
    <div class="an-page-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
    <div class="title_right">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary m-r-5']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </div>
</div>
<!--內容物-->
<div class="an-doc-block default with-shadow">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'patient_name',
            'patient_phone',
            'reserve_date:date',
            'reserve_time',
            [
                'attribute'=>'disease',
                'value' => function ($model) {
                    $status_helper = new Status();
                    return $status_helper->disease_status($model->disease);
                },
            ],
            'remark',
        ],
    ]) ?>

</div>
