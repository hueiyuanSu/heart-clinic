<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = Yii::t('app', 'Update Orders') .':'. $model->sn;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sn, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="an-body-topbar wow fadeIn">

    <div class="an-page-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
</div>
<!--內容物-->
<div class="an-doc-block default with-shadow">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>