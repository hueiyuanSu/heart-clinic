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
                <h1>訂購成功</h1>
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

            </h5>
            <?php

            echo '<p class="text">'.Yii::$app->session->getFlash('success').'</p>';

            ?>
        </div>
        <!-- Cart Content -->
        <div class="ws-cart-page">
            <div class="col-sm-8">
                <!--  -->


                <!-- </form> -->
            </div>



        </div>

    </div>
</div>
<!-- End Page Content -->
