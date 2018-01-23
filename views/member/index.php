<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Member Data Setting');
?>

    <div id="site-wrapper" class="site_wrapper">
        <div class="page_wrapper profile_wrapper">
        	<div class="page_title_area clearAfter">
				<div class="page_title pull-left">會員資料設定</div>
				<div class="page_title_en pull-left">Profile</div>
			</div>
			<div class="profile_area">
				<div class="profile_block">
					<form class="form-horizontal" id="data-form" action="<?= Url::to('/member/update')?>">
                    <table id="data-table" data-return-action="<?= Url::to('/index')?>" data-update-action="<?= Url::to('/member/update')?>"
                     data-temp-action="<?= Url::to('/member/temp')?>"  data-origin-action="<?= Url::to('/member/index')?>" data-uppass-action="<?= Url::to('/member/updatepass')?>"
                     data-validate-action="<?= Url::to('/mailer/index')?>">
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn no-btn-style fb_bt">
									<i class="fa fa-facebook m-r-5" aria-hidden="true"></i>
									以 Facebook 帳號登入
								</button>
								<input type="checkbox" value="" class="m-r-5">綁定帳號
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">E-mail</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email" placeholder="" value="<?=$member->email;?>">
								<input type="checkbox" value="" class="m-r-5 m-t-10">以E-mail發出通知訊息
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">登入帳號</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="account" name="account" placeholder="" value="<?=$member->account;?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 col-xs-12 control-label">登入密碼</label>
							<div class="col-sm-8 col-xs-8">
								<input type="password" class="form-control" id="password" name="password" placeholder="" value="<?=base64_decode($member->password);?>">
							</div>
							<div class="col-sm-2 col-xs-2">
								<button type="submit" class="btn no-btn-style profile_bt" id="update-password">修改密碼</button>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">真實姓名</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name" name="name" placeholder="" value="<?=$member->name;?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6 col-xs-12 no-padding">
								<label for="" class="col-sm-4 control-label">身分證字號</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="ssid" name="ssid" placeholder="" value="<?=$member->ssid;?>">
									<p class="m-t-10">* 本國人士必填</p>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12 no-padding">
								<label for="" class="col-sm-4 control-label">護照號碼</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="ssid2" name="ssid2" placeholder="">
									<p class="m-t-10">* 非本國人士必填</p>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">出生日期</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="birth" name="birth" placeholder="" value="<?=$member->birth_date;?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">通訊地址</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="contact_address" name="contact_address" placeholder="" value="<?=$member->contact_address;?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">戶籍地址</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="address" name="address" placeholder="" value="<?=$member->address;?>">
								<input type="checkbox" value="" class="m-r-5 m-t-10">同通訊地址
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 col-xs-12 control-label">手機號碼</label>
							<div class="col-sm-6 col-xs-12">
                            	<input type="text" class="form-control" id="phone" name="phone" placeholder="" value="<?=$member->phone;?>">
							</div>
							<div class="col-sm-4 col-xs-12">
								<div class="btn no-btn-style profile_bt m-r-5"  name="validate" id="validate" data-mail="<?=$member->email;?>">發送驗證碼</div>
							</div>
						</div>

                        <div class="form-group">
							<div class="col-sm-6 col-xs-12 no-padding">
								<label for="" class="col-sm-4 control-label">驗證碼</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="number" name="number" placeholder="" value="">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">驗證</label>
							<div class="col-sm-10">
								<div class="g-recaptcha" data-sitekey="6LfNLj4UAAAAAOtmKIBad86HtpYfBoZEYLgnLmze"></div>

							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="col-sm-12 no-padding">
									<button type="submit" class="btn no-btn-style profile_bt pull-right" id="data-submit">提交審核</button>
									<button type="submit" class="btn no-btn-style profile_bt pull-right m-r-10" id="template-data">暫存資料</button>
								</div>
							</div>
						</div>

                        </table>
					</form>
				</div>
			</div>
		</div>
    </div>




