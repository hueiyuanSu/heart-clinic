<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Categories */

$this->title = Yii::t('app', 'Create Staff Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staff Group'), 'url' => ['/staff/group-index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="an-body-topbar wow fadeIn">

    <div class="an-page-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
</div>
<!--內容物-->
<div class="an-doc-block default with-shadow">

    <?= $this->render('/admin/staff/_group_form', [
        'model' => $model,
        'parent_id'=> $parent_id
    ]) ?>

</div>
