<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!-- Page Parallax Header -->
<div class="ws-parallax-header parallax-window" data-parallax="scroll" data-image-src="<?= Url::to(['@web/images/stage1_sample/5.jpg']); ?>">
    <div class="ws-overlay">
        <div class="ws-parallax-caption">
            <div class="ws-parallax-holder">
                <h1>結帳</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Page Parallax Header -->

<!-- Page Content -->
<div class="container ws-page-container">
    <div class="row">
        <div class="cart-checkout-info text-center m-b-20">
            <h5>
                官網線上刷卡即將上線，目前我們只接受下訂後匯款送貨，謝謝您的體諒。<br/>
                訂單送出後，您將收到訂單確認信與匯款資訊。
            </h5>
            <?php

            echo '<p class="text-error">'.Yii::$app->session->getFlash('danger').'</p>';

            ?>
        </div>
        <!-- Cart Content -->
        <div class="ws-cart-page">
            <div class="col-sm-8">
                <!--  -->
                    <div class="ws-mycart-content">
                        <h3 class="m-b-20">商品資訊</h3>
                        <table class="table" id="checkout-table">
                            <thead>
                                <tr>
                                    <th class="cart-item-head">&nbsp;</th>
                                    <th class="cart-item-head">品項</th>
                                    <th class="cart-item-head">單價</th>
                                    <th class="cart-item-head">數量</th>
                                    <th class="cart-item-head">小計</th>
                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <!-- 寄送資訊 -->
                    <div class="ws-mycart-content">
                        <h3 class="m-b-20">收件人資訊</h3>
                        <?php $form = ActiveForm::begin([
                            'action' => Url::to('/cart/process'),
                            'method' => 'post',
                            'options' => [
                                'class' => 'form-horizontal ws-contact-form',
                                'id'=>'delivery-form'
                             ]
                        ]); ?>

                                <!-- Name -->
                                <div class="form-group">
                                    <label class="control-label">姓名 <span>*</span></label>
                                    <input type="text" class="form-control" name="Orders[recipient]" value="<?= $profile->firstname.$profile->lastname; ?>">
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label class="control-label">聯絡電話 </label>
                                    <input type="phone" class="form-control" name="Orders[phone]" value="<?= $profile->phone;?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">聯絡手機 </label>
                                    <input type="mobile" class="form-control" name="Orders[mobile]" value="<?= $profile->mobile;?>">
                                </div>

                                <!-- Message -->
                                <div class="form-group">
                                    <label class="control-label">寄送地址 <span>*</span></label>
                                    <input type="address" class="form-control" name="Orders[address]" value="<?= $profile->address;?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">同意服務條款 <span>*</span></label>
                                    <input type="checkbox" class="" name="agree" value="1" id="agree-policy">
                                </div>
                            <?php ActiveForm::end(); ?>
                            <div class="row">
                                <div class="col-sm-4 col-xs-12">

                                    <a href="<?= Url::to('/cart'); ?>" class="btn ws-btn-fullwidth">返購物車</a>
                                </div>
                            </div>





                    </div>
                <!-- </form> -->
            </div>

            <!-- Cart Total -->
            <div class="col-sm-4">
                <div class="ws-mycart-total">
                    <h2>總計</h2>
                    <table>
                        <tbody>
                            <tr class="cart-subtotal">
                                <th>小結</th>
                                <td><span class="amount">$<span id="cart-subtotal">0</span></span></td>
                            </tr>

                            <tr class="shipping">
                                <th>運費</th>
                                <td><span class="amount">$<span id="cart-shipfee">0</span></span></td>
                            </tr>

                            <tr class="order-total">
                                <th>總價</th>
                                <td><strong><span class="amount">$<span id="cart-total">0</span></span></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="btn ws-btn-fullwidth" id="send-order">確認送出</div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- End Page Content -->
