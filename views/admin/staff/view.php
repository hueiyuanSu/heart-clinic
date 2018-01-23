<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staff'), 'url' => ['index']];
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
            [
                'attribute'=>'avatar',
                'value'=>$model->avatar,
                'format' => ['image',['width'=>'100']],
            ],         
            [  
                'attribute'=>'group',
                'label' =>  Yii::t('app', 'Staff Group'),
                'value' => function ($model) {
                    return $model->group->name;
                },
            ],
            'name',
            
        ],
    ]) ?>

</div>
