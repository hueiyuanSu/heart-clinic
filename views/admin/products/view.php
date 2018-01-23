<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
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
            'name',
            'sub_name',
            [
                'attribute'=>'category',
                'value'=>$model->category->name,
            ],
            [
                'attribute'=>'avatar',
                'value'=>$model->avatar,
                'format' => ['image',['width'=>'100']],
            ],
            'price',
            'sale_price',
            'meta_type',
            'description:ntext',
            'keyword',
            'content:html',
            [
                'label' => 'status',
                'value' => ($model->status)? '上架' : '下架',
            ],
            'modified_at:datetime',
            'created_at:datetime',
        ],
    ]) ?>

</div>
