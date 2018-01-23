<?php

/* @var $this yii\web\View */
// \Yii::$app->language = 'th';
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = Yii::t('app', 'homepage');
// $role = Yii::$app->authManager->getAssignments(Yii::$app->user->identity->id);

?>

<!-- Page Parallax Header -->
    <div class="ws-parallax-header parallax-window" data-parallax="scroll" data-image-src="<?= Url::to(['@web/images/stage1_sample/5.jpg']); ?>">        
        <div class="ws-overlay">
            <div class="ws-parallax-caption">
                <div class="ws-parallax-holder">
                    <h1>關於我們</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Parallax Header -->

    <!-- Page Content -->
    <div class="container ws-page-container">
        <div class="row">
            <div class="ws-about-content col-sm-12">
                <h3 class="m-b-10 t-center">想要最專業的芳療學證</h3>
                <h3 class="m-b-10 t-center">就找最完整的芮秋卡兒</h3>
                <div class="padding-top-x70"></div>

                <h3 class="m-b-10">PENNY PRICE AROMATHERAPY</h3>
                <h3>英國PPA芳療學院</h3>
                <div class="ws-footer-separator"></div>
                <p>由國際芳療權威Sherly Price 的女兒 Penny Price 於2003年六月成立，著重教育有等級文憑和研究生課程的芳香療法，而這些課程已擴展包含反射學、治療的全身按摩、印度頭部按摩、淋巴引流按摩、熱石按摩、霍皮耳燭療法及祈台更多的課程。Penny 還制定和教育高等的芳香療法文憑，其中涉及強化的和內部使用之精油、植物底油及純露等全球所知的芳香科學課程。</p>

                <!-- Space Helper Class -->
                <div class="padding-top-x70"></div>

                <h3 class="m-b-10">International Federation of Professional Aromatherapists</h3>
                <h3>國際專業芳療師聯盟</h3>
                <div class="ws-footer-separator"></div>
                <p>IFPA 是現今世界最大的專業芳香治療從業人員的組織之一，成立於2002年4月1日，由英國三大香薰治療師協會 the Register of Qualified Aromatherapists(RQA),the International Society of Professional Aromatherapists(ISPA)及International Federation of Aromatherapisets(IFA)合併組合而成，在全世界輔助療法中具有崇高的地位。</p>

                <!-- Space Helper Class -->
                <div class="padding-top-x70"></div>

            </div>
        </div>
    </div>
    <!-- End Page Content -->
