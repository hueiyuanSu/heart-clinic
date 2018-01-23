<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->employer_identification_number;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'PlarformInformation'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category',
            'company',
            'principal',
            'employer_identification_number',
            'factory_number',
            'address',
            'phone',
            'email',
            'writer',
            'remark',
            'department',
            'cellphone',
            'fax',
            'website',
            'is_confirmed',
            [
                'attribute'=>'register_date',
                'value'=>date("Y/m/d",strtotime($model->register_date)),
            ],
        ],
    ]) ?>

</div>
