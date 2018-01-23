<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = Yii::t('app', 'Login And Register');
?>

<body>
   <div id="site-wrapper" class="site_wrapper login">
   		<div class="page_wrapper login_wrapper">
	        <div class="page_title_area clearAfter">
				<div class="page_title pull-left">會員登入與註冊</div>
				<div class="page_title_en pull-left">Login & Register</div>
			</div>
			<div class="login_area clearAfter">
				<div class="login_block">
					<div class="block_title">會員登入</div>
					<form class="form-horizontal" id="login-form" action="<?= Url::to('/member/login')?>">
                    <table id="login-table" data-return-action="<?= Url::to('/index?memberid=')?>" data-check-action="<?= Url::to('/member/check')?>" data-login-action="<?= Url::to('/member/login')?>">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">E-mail</label>
							<div class="col-sm-7">
								<input type="email" class="form-control" id="email" name="email" placeholder="">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">密碼</label>
							<div class="col-sm-7">
								<input type="password" class="form-control" id="password" name="password" placeholder="">
							</div>
							<div class="col-sm-3 forget_pwd_block">
								<a href="<?= Url::to(['member/forget']);?>" class="forget_pwd" id="forget_pwd">
									<i class="fa fa-question-circle m-r-5" aria-hidden="true"></i>
									忘記密碼
								</a>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-7">
								<button type="submit" class="btn no-btn-style login_bt" id="login">登入</button>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-7">
								<div class="line">或</div>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-7">
								<button type="submit" class="btn no-btn-style login_bt fb">
									<i class="fa fa-facebook m-r-5" aria-hidden="true"></i>
									以 Facebook 帳號登入
								</button>
							</div>
							<div class="col-sm-3"></div>
						</div>
                    </table>
					</form>
				</div>

				<div class="login_block register">
					<div class="block_title">註冊為會員</div>
					<form class="form-horizontal" id="register-form" action="<?= Url::to('/member/create')?>">
                    <table id="register-table" data-index-action="<?= Url::to('/member/login')?>" data-create-action="<?= Url::to('/member/create')?>" data-return-action="<?= Url::to('/index')?>">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <button type="submit" class="btn no-btn-style login_bt fb">
                                        <i class="fa fa-facebook m-r-5" aria-hidden="true"></i>
                                        以 Facebook 帳號登入
                                    </button>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">手機號碼</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">設定密碼</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="setting-password" name="setting-password" placeholder="">
                                    <p class="pwd_text">* 至少8字，內含英文大小寫及數字</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">確認密碼</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="button" class="btn pull-left no-btn-style service_bt" data-toggle="modal" data-target="#ServiceModal"><i class="fa fa-exclamation-circle m-r-5" aria-hidden="true"></i>服務條款</button>
                                    <div class="checkbox pull-right">
                                        <label class="l-h-20">
                                            <input type="checkbox" value="" id="check">我已閱讀並同意服務條款、隱私條款、風險揭露
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="col-sm-5 pull-right no-padding">
                                        <button type="submit" class="btn no-btn-style login_bt" id="register-submit">提交註冊</button>
                                    </div>
                                </div>
                            </div>
                        </table>
					</form>
				</div>
			</div>
		</div>
		<!-- terms of Service modal -->
		<div class="modal fade" id="ServiceModal" tabindex="-1" role="dialog" aria-labelledby="ServiceModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="">服務條款</h4>
					</div>
					<div class="modal-body">
						...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
					</div>
				</div>
			</div>
		</div>
    </div>
</body>
</html>



