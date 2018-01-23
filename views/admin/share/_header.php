<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<header class="an-header wow fadeInDown">
	<div class="an-topbar-left-part">
		<h3 class="an-logo-heading">
			<a class="an-logo-link" href="<?= Yii::$app->homeUrl; ?>">心齋中醫診所
			</a>
		</h3>
		<button class="an-btn an-btn-icon toggle-button js-toggle-sidebar">
			<i class="icon-list"></i>
		</button>
		<!-- <form class="an-form" action="#">
			<div class="an-search-field topbar">
				<input class="an-form-control" type="text" placeholder="Search...">
				<button class="an-btn an-btn-icon" type="submit">
					<i class="icon-search"></i>
				</button>
			</div>
		</form> -->
	</div> <!-- end .AN-TOPBAR-LEFT-PART -->
	<?php
	if(!Yii::$app->user->isGuest){
	// if(1){
	?>
    <div class="an-topbar-right-part">
		<!-- notifications -->
        <div class="an-notifications hide">
            <div class="btn-group an-notifications-dropown notifications">
            	<button type="button"
            class="an-btn an-btn-icon dropdown-toggle js-has-new-notification"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            		<i class="ion-ios-bell-outline"></i>
            	</button>
				<div class="dropdown-menu">
					<p class="an-info-count">Notifications <span>0</span></p>
					<div class="an-info-content notifications-info notifications-content">

						<!-- loop messages -->
						<div class="an-info-single unread">
							<a href="#">
								<span class="icon-container important">
									<i class="icon-setting"></i>
								</span>
								<div class="info-content">
									<h5 class="user-name">Settings updated</h5>
									<p class="content"><i class="icon-clock"></i> 30 min ago</p>
								</div>
							</a>
						</div>

					</div> <!-- end .AN-INFO-CONTENT -->
					<div class="an-info-show-all-btn">
						<a class="an-btn an-btn-transparent fluid rounded uppercase small-font" href="#">Show all</a>
					</div>
				</div>
			</div>
		</div> <!-- end .AN-NOTIFICATION -->

		<div class="an-profile-settings">
			<div class="btn-group an-notifications-dropown  profile">
				<button type="button" class="an-btn an-btn-icon dropdown-toggle"
			data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<!--<span class="an-profile-img" style="background-image: url('<?= \Yii::getAlias('@webroot'); ?>/assets/img/users/user5.jpeg');"></span>-->
					<span class="an-user-name">
						<?= Yii::$app->user->identity->username;?>
					</span>
					<span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
				</button>
				<div class="dropdown-menu">
					<p class="an-info-count">個人設定</p>
					<ul class="an-profile-list">
						<!-- <li><a href="<?= Url::to(['/']);?>"><i class="icon-download-left"></i>中文</a></li>
						<li><a href="<?= Url::to(['/']);?>"><i class="icon-download-left"></i>泰文</a></li> -->
						<li><a href="<?= Url::to(['/user/logout']);?>" data-method="post"><i class="icon-download-left"></i><?= Yii::t('appuser', 'Logout') ?></a></li>
					</ul>
				</div>
			</div>
		</div> <!-- end .AN-PROFILE-SETTINGS -->

	</div> <!-- end .AN-TOPBAR-RIGHT-PART -->
	<?php } ?>
</header> <!-- end .AN-HEADER -->
