<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->sn;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="an-body-topbar wow fadeIn">
    <div class="an-page-title">
        <h2>訂單編號：<?= Html::encode($this->title) ?></h2>
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
    <h3 class="m-b-20">訂單資訊</h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sn',
            [
                'attribute'=>'user',
                'headerOptions' => ['style' => 'width:150px'],
                'label' =>  Yii::t('app', 'Customer Name'),
                'value' => function ($model) {
                    return $model->user->username;
                },
            ],
            'recipient',
            'phone',
            'mobile',
            'address',
            'total_price',
            'item_count',
            'payment_time:datetime',
            'shipping_time:datetime',
            [
                'attribute'=>'status',               // the owner name of the model
                'label' => Yii::t('app', 'Order Status'),
                'value' => $model->getStatusLabel()
            ],
            'payment_method',
            [
                'attribute'=>'payment_method',            // the owner name of the model
                'label' => Yii::t('app', 'Payment Status'),
                'value' => $model->getPaymentStatusLabel()
            ],
            'modified_at:datetime',
            'created_at:datetime',
        ],
    ]) ?>

    <h3 class="m-b-20">訂單內容</h3>
    <table class="table">
        <thead>
            <tr>
                <th>封面</th>
                <th>品名</th>
                <th>單價</th>
                <th>數量</th>
                <th>小計</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($model->items){
                foreach($model->items as $item){
                    echo '<tr>';
                    echo '<td width="120"><img src="'.$item->product->avatar.'" width="100"/></td>';
                    echo '<td><A href="'.Url::to(['/admin/products/view','id'=>$item->product_id]).'" target="_BLANK">'.$item->name.'</A></td>';
                    echo '<td>'.$item->price.'</td>';
                    echo '<td>'.$item->quantity.'</td>';
                    echo '<td>'.$item->quantity*$item->price.'</td>';
                    echo '</tr>';
                }
            }

            ?>
        </tbody>
    </table>
</div>
