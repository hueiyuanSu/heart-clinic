<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!-- Page Parallax Header -->
<div class="ws-parallax-header parallax-window" data-parallax="scroll" data-image-src="<?= Url::to(['@web/images/stage1_sample/5.jpg']); ?>">
    <div class="ws-overlay">
        <div class="ws-parallax-caption">
            <div class="ws-parallax-holder">
                <h1>購物車</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Page Parallax Header -->

<!-- Page Content -->
<div class="container ws-page-container">
    <div class="row">

        <!-- Cart Content -->
        <div class="ws-cart-page">
            <div class="col-sm-8">
                <div class="ws-mycart-content">
                    <table class="table" id="cart-table">
                        <thead>
                            <tr>
                                <th class="cart-item-head">&nbsp;</th>
                                <th class="cart-item-head">品項</th>
                                <th class="cart-item-head">單價</th>
                                <th class="cart-item-head">數量</th>
                                <th class="cart-item-head">小計</th>
                                <th class="cart-item-head">&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="cart-operation">
                                <td colspan="6">
                                    <!-- Coupon -->
                                    <div class="ws-coupon-code hide">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <input type="text" placeholder="Coupon code">
                                            </div>
                                            <!-- Button -->
                                            <a class="btn ws-small-btn-black">Apply Coupon</a>
                                        </form>
                                    </div>

                                    <!-- Update Cart -->
                                    <div class="ws-update-cart">
                                        <a class="btn ws-small-btn-black" id="update-cart">更新購物車</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
                    <a href="<?= Url::to('cart/checkout'); ?>" class="btn ws-btn-fullwidth">結帳</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Page Content -->
