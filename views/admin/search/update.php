<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Industry',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Industry'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
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
         'category_id'=>$category_id
    ]) ?>
</div>

<?php
use app\assets\CroppieAsset;
CroppieAsset::register($this);
echo $this->render('_avatar_modal', ['model'=>$model]);
$this->registerJsFile('@web/js/admin/share/avatar.js', ['depends'=>['app\assets\BackendAppAsset']]);
$this->registerJsFile('@web/js/admin/news/action.js', ['depends'=>['app\assets\BackendAppAsset']]);
?>
