<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '產品';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="an-body-topbar wow fadeIn">

    <div class="an-page-title">
        <h2><?= $this->title; ?></h2>
    </div>
    <div class="an-page-tool">
        <?= Html::a('新增產品', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
</div>
<div class="an-single-component with-shadow">
    <div class="an-component-header">
        <h6>產品列表</h6>
    </div>
    <div class="an-component-body">
        <div class="table_wrapper">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'shop_id',
                    'price',
                    'discount',
                    // 'category',
                    // 'rank',
                    // 'status',
                    // 'comment:ntext',
                    // 'modified_at',
                    // 'created_at',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>

    </div>
</div>
