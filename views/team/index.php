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
                <h1>團隊介紹</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Page Parallax Header -->

<section class="ws-works-section">
    <div class="container">
        <div class="row">

            <div class="ws-works-title">
                <div class="col-sm-12">
                    <h3>師資陣容介紹</h3>
                    <div class="ws-separator"></div>
                </div>
            </div>

            <!-- Item -->
            <div class="col-sm-6 col-md-4 ws-works-item team_area" data-sr='wait 0.1s, ease-in 20px'>
                <div class="ws-item-offer t-center">
                    <figure>
                        <img src="<?= Url::to('@web/images/teacher01.png'); ?>" alt="">
                    </figure>
                </div>

                <div class="ws-works-caption text-center">
                    <h3 class="ws-item-title">校長 / 陳淑 Sue (Melissa)</h3>
                    <div class="ws-item-separator"></div>
                    <div class="ws-item-category">
                        專長：重症、失智、安寧、長照、早療、綜合理療、芳療調研<br>
                        英國PPA台灣分校校長<br>
                        國軍花蓮總醫院護理部督導<br>
                        芳療護理照護經驗20餘年<br>
                        PPA/NAHA資深講師20餘年<br>
                        WHO中醫芳療師<br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 ws-works-item team_area" data-sr='wait 0.1s, ease-in 20px'>
                <div class="ws-item-offer t-center">
                    <figure>
                        <img src="<?= Url::to('@web/images/teacher02.png'); ?>" alt="">
                    </figure>
                </div>
                <div class="ws-works-caption text-center">
                    <h3 class="ws-item-title">總監 / 黃國忠 David</h3>
                    <div class="ws-item-separator"></div>
                    <div class="ws-item-category">
                        專長：芳療空間療癒<br>
                        PPA / NAHA / IFPA國際證照<br>
                        台灣藝術大學造型藝術<br>
                        中國一級高級設計師<br>
                        台灣室內設計師檢定監評<br>
                        西恩斯國際總監<br>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-6 col-md-4 ws-works-item team_area" data-sr='wait 0.1s, ease-in 20px'>
                <div class="ws-item-offer t-center">
                    <figure>
                        <img src="<?= Url::to('@web/images/teacher02.png'); ?>" alt="">
                    </figure>
                </div>

                <div class="ws-works-caption text-center">
                    <h3 class="ws-item-title">Penny Price</h3>
                    <div class="ws-item-separator"></div>
                    <div class="ws-item-category">英國 PPA 創校校長 ( IFPA協會 副主席)</div>
                </div>
            </div> -->
            <div class="col-sm-6 col-md-4 ws-works-item team_area" data-sr='wait 0.1s, ease-in 20px'>
                <div class="ws-item-offer t-center">
                    <figure>
                        <img src="<?= Url::to('@web/images/teacher03.png'); ?>" alt="">
                    </figure>
                </div>

                <div class="ws-works-caption text-center">
                    <h3 class="ws-item-title">黃雪蘭 Lan</h3>
                    <div class="ws-item-separator"></div>
                    <div class="ws-item-category">
                        專長：中醫芳療<br>
                        PPA / NAHA / IFPA國際證照<br>
                        中國湖南中醫藥大學博士班<br>
                        WHO中醫芳療師<br>
                        西恩斯芳療空間督導<br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 ws-works-item team_area" data-sr='wait 0.1s, ease-in 20px'>
                <div class="ws-item-offer t-center">
                    <figure>
                        <img src="<?= Url::to('@web/images/teacher04.jpg'); ?>" alt="">
                    </figure>
                </div>

                <div class="ws-works-caption text-center">
                    <h3 class="ws-item-title">王秀合 Lillian</h3>
                    <div class="ws-item-separator"></div>
                    <div class="ws-item-category">
                        專長：芳療花藝療癒<br>
                        台灣世界花藝博覽會<br>
                        國際組花藝設計師<br>
                        台灣芮秋卡兒芳療師<br>
                        WHO中醫芳療師<br>
                        花弄空間首席設計師<br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 ws-works-item team_area" data-sr='wait 0.1s, ease-in 20px'>
                <div class="ws-item-offer t-center">
                    <figure>
                        <img src="<?= Url::to('@web/images/teacher05.png'); ?>" alt="">
                    </figure>
                </div>

                <div class="ws-works-caption text-center">
                    <h3 class="ws-item-title">陳宥安</h3>
                    <div class="ws-item-separator"></div>
                    <div class="ws-item-category">
                        專長：精神科、肢體障礙個案<br>
                        台灣PPA/NAHA資深講師<br>
                        東莞虎門台新護理長<br>
                        台灣自然保健發展協會秘書長<br>
                        台灣PPA芮秋卡兒芳療講師<br>
                        WHO中醫芳療師<br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 ws-works-item team_area" data-sr='wait 0.1s, ease-in 20px'>
                <div class="ws-item-offer t-center">
                    <figure>
                        <img src="<?= Url::to('@web/images/teacher06.png'); ?>" alt="">
                    </figure>
                </div>

                <div class="ws-works-caption text-center">
                    <h3 class="ws-item-title">盧季純 Steacy</h3>
                    <div class="ws-item-separator"></div>
                    <div class="ws-item-category">
                        專長：PPA芳療美容保健<br>
                        PPA / NAHA / IFPA國際證照<br>
                        台灣PPA芮秋卡兒芳療講師<br>
                        台灣實踐大學設計系<br>
                        WHO中醫芳療師<br>
                        中國二級心裡諮商師<br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 ws-works-item team_area" data-sr='wait 0.1s, ease-in 20px'>
                <div class="ws-item-offer t-center">
                    <figure>
                        <img src="<?= Url::to('@web/images/teacher07.png'); ?>" alt="">
                    </figure>
                </div>

                <div class="ws-works-caption text-center">
                    <h3 class="ws-item-title">李偉齡 Grace</h3>
                    <div class="ws-item-separator"></div>
                    <div class="ws-item-category">
                        專長：PPA芳療美容保健<br>
                        PPA / NAHA / IFPA國際證照<br>
                        台灣PPA芮秋卡兒芳療講師<br>
                        University of East Anglia (U.K.) 碩士<br>
                        WHO中醫芳療師<br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 ws-works-item team_area" data-sr='wait 0.1s, ease-in 20px'>
                <div class="ws-item-offer t-center">
                    <figure>
                        <img src="<?= Url::to('@web/images/teacher08.png'); ?>" alt="">
                    </figure>
                </div>

                <div class="ws-works-caption text-center">
                    <h3 class="ws-item-title">劉珮芸 Peggy</h3>
                    <div class="ws-item-separator"></div>
                    <div class="ws-item-category">
                        專長：PPA芳療美容保健、芳療花藝療癒<br>
                        PPA / NAHA / IFPA國際證照<br>
                        台灣PPA芮秋卡兒芳療講師<br>
                        芳香療法經驗10餘年<br>
                        Univeristy of North Dakota (美國州立大學)<br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 ws-works-item team_area" data-sr='wait 0.1s, ease-in 20px'>
                <div class="ws-item-offer t-center">
                    <figure>
                        <img src="<?= Url::to('@web/images/'); ?>" alt="">
                    </figure>
                </div>

                <div class="ws-works-caption text-center">
                    <h3 class="ws-item-title">陳菊珍 Jen</h3>
                    <div class="ws-item-separator"></div>
                    <div class="ws-item-category">
                        專長：精神科、內外科及產後護理<br>
                        台灣PPA/NAHA資深講師<br>
                        國軍花蓮總醫院護理長<br>
                        宜蘭普門醫院護理部主任<br>
                        麗晶產後護理之家副理<br>
                        台灣PPA芮秋卡兒芳療師<br>
                        WHO中醫芳療師<br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 ws-works-item team_area" data-sr='wait 0.1s, ease-in 20px'>
                <div class="ws-item-offer t-center">
                    <figure>
                        <img src="<?= Url::to('@web/images/teacher10.png'); ?>" alt="">
                    </figure>
                </div>

                <div class="ws-works-caption text-center">
                    <h3 class="ws-item-title">劉雅芳</h3>
                    <div class="ws-item-separator"></div>
                    <div class="ws-item-category">
                        專長：胸腔呼吸系統科<br>
                        台灣PPA / NAHA資深講師<br>
                        台灣PPA芮秋卡兒芳療師<br>
                        WHO中醫芳療師<br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
