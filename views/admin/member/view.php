<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'member_number',
            'name',
            'ssid',
            'sex',
            'birth_date',
            'bank',
            'branch_bank',
            'account_number',
            'useful_date',
            'email',
            'phone',
            'address',
            'is_stop',
        ],
    ]) ?>

</div>
