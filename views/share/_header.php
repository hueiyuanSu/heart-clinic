<?php
use yii\helpers\Url;
use yii\helpers\Html;

?>
<div class="header" id="header">
	<nav class="navbar navbar-fixed-top navi_area navbar-default affix" data-spy="affix" data-offset-top="65">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu_mobile" aria-expanded="false">
                <i class="fa fa-bars"></i>
            </button>
            <a href="index.php" class="logo_title_block">
                <div class="pull-left logo_img"><img src="../images/logo.png"></div>
                <div class="main_title pull-left">
                    產業雲棧 <br/>iCase Deal
                </div>
                <div class="clear"></div>
            </a>
        </div>
		<div class="collapse navbar-collapse" id="menu_mobile" aria-expanded="false">
			<div class="menu_wrapper">
				<ul class="nav navbar-nav main_menu navbar-right">
					<li class="dropdown menu_item">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">最新消息<span class="caret m-l-5"></span>
						</a>
						<ul class="dropdown-menu">
                            <li><a href="<?= Url::to(['industry/index']);?>">產業訊息</a></li>
                            <li><a href="<?= Url::to(['supplier/index']);?>">平台供需情報</a></li>
                            <!-- <li><a href="#">座談/說明會時間表</a></li> -->
                        </ul>
					</li>
					<li class="dropdown menu_item">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">關於我們<span class="caret m-l-5"></span>
						</a>
						<ul class="dropdown-menu">
                            <li><a href="<?= Url::to(['site/about']);?>">組織介紹</a></li>
                            <li><a href="<?= Url::to(['/service']);?>">服務項目</a></li>
                            <li><a href="<?= Url::to(['site/member']);?>">團隊介紹</a></li>
                            <li><a href="<?= Url::to(['site/contact']);?>">聯絡我們</a></li>
                        </ul>
					</li>

                    <!-- <li class="dropdown menu_item">
                        <a href="#" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">會員專區</a>
                    </li> -->

                    <?php if(Yii::$app->session['memberid'] != null){ ?>
					<li class="dropdown menu_item">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">會員專區<span class="caret m-l-5"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= Url::to(['member/index']);?>">會員資料設定</a></li> <!--profile.php-->
                        </ul>
                    </li>
					<?php }
                    // print_r(Yii::$app->session['memberid']);
                        if(Yii::$app->session['memberid']== null){
                            echo $this->render("login");
                        }else{
                            echo $this->render("logout");
                        }
                    ?>
					<div class="clear"></div>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
	</nav>
</div>
