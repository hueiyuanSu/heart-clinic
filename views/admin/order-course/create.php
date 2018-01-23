<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrderCourse */

$this->title = Yii::t('app', 'Create Order Course');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
