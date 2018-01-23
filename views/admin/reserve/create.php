<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Banners */

$this->title = Yii::t('app', 'Create Reserve');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reserve'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

<?php
use app\assets\CroppieAsset;
CroppieAsset::register($this);
echo $this->render('_avatar_modal', ['model'=>$model]);
$this->registerJsFile('@web/js/admin/share/avatar.js', ['depends'=>['app\assets\BackendAppAsset']]);
$this->registerJsFile('@web/js/admin/banners/action.js', ['depends'=>['app\assets\BackendAppAsset']]);
?>
