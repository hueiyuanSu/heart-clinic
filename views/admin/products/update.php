<?php

use yii\helpers\Html;
use app\models\ProductMetaOil;
use app\models\ProductMetaMask;
use app\models\ProductMetaSoap;
/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Products',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
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
    <?php
    switch($model->meta_type){
        case 'essential-oil':
            $modelMeta = ($model->meta)? $model->meta : new ProductMetaOil();
            echo $this->render('_form_essential_oil', [
                'model' => $model,
                'modelMeta' => $modelMeta
            ]);
            break;
        case 'mask':
            $modelMeta = ($model->meta)? $model->meta : new ProductMetaMask();
            echo $this->render('_form_mask', [
                'model' => $model,
                'modelMeta' => $modelMeta
            ]);
            break;
        case 'soap':
            $modelMeta = ($model->meta)? $model->meta : new ProductMetaSoap();
            echo $this->render('_form_soap', [
                'model' => $model,
                'modelMeta' => $modelMeta
            ]);
            break;
    }


    ?>

</div>

<?php
use app\assets\CroppieAsset;
CroppieAsset::register($this);
echo $this->render('_avatar_modal', ['model'=>$model]);
$this->registerJsFile('@web/js/admin/share/avatar.js', ['depends'=>['app\assets\BackendAppAsset']]);
$this->registerJsFile('@web/js/admin/products/action.js', ['depends'=>['app\assets\BackendAppAsset']]);
?>
