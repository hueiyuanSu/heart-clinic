<?php

use yii\helpers\Html;
use app\models\ProductMetaOil;
use app\models\ProductMetaMask;
use app\models\ProductMetaSoap;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = Yii::t('app', 'Create Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
switch($useType){
    case 'essential-oil':
        $useLayout = '_form_essential_oil';
        $modelMeta = new ProductMetaOil();
        break;
    case 'mask':
        $useLayout = '_form_mask';
        $modelMeta = new ProductMetaMask();
        break;
    case 'soap':
        $useLayout = '_form_soap';
        $modelMeta = new ProductMetaSoap();
        break;
    default:
        $useLayout = '_form';
        break;

}
?>
<div class="an-body-topbar wow fadeIn">

    <div class="an-page-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
</div>
<!--內容物-->
<div class="an-doc-block default with-shadow">

    <?= $this->render($useLayout, [
        'model' => $model,
        'modelMeta'=>$modelMeta,
        'useType'=>$useType
    ]) ?>
</div>

<?php
use app\assets\CroppieAsset;
CroppieAsset::register($this);
echo $this->render('_avatar_modal', ['model'=>$model]);
$this->registerJsFile('@web/js/admin/share/avatar.js', ['depends'=>['app\assets\BackendAppAsset']]);
$this->registerJsFile('@web/js/admin/products/action.js', ['depends'=>['app\assets\BackendAppAsset']]);
?>
