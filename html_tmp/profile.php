<?php require_once('share/_frame_top.php'); ?>
<body>
    <?php require_once('share/_header.php'); ?>
    <div id="site-wrapper" class="site_wrapper">
        <div class="page_wrapper profile_wrapper">
        	<div class="page_title_area clearAfter">
				<div class="page_title pull-left">會員資料設定</div>
				<div class="page_title_en pull-left">Profile</div>
			</div>
			<div class="profile_area">
				<div class="profile_block">
					<form class="form-horizontal">
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
								<input type="email" class="form-control" id="" placeholder="">
								<input type="checkbox" value="" class="m-r-5 m-t-10">以E-mail發出通知訊息
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">登入帳號</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 col-xs-12 control-label">登入密碼</label>
							<div class="col-sm-8 col-xs-8">
								<input type="password" class="form-control" id="" placeholder="">
							</div>
							<div class="col-sm-2 col-xs-2">
								<button type="submit" class="btn no-btn-style profile_bt">修改密碼</button>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">真實姓名</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" placeholder="">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6 col-xs-12 no-padding">
								<label for="" class="col-sm-4 control-label">身分證字號</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="" placeholder="">
									<p class="m-t-10">* 本國人士必填</p>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12 no-padding">
								<label for="" class="col-sm-4 control-label">護照號碼</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="" placeholder="">
									<p class="m-t-10">* 非本國人士必填</p>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">出生日期</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">通訊地址</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">戶籍地址</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" placeholder="">
								<input type="checkbox" value="" class="m-r-5 m-t-10">同通訊地址
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 col-xs-12 control-label">手機號碼</label>
							<div class="col-sm-6 col-xs-12">
								<input type="text" class="form-control" id="" placeholder="">
							</div>
							<div class="col-sm-4 col-xs-12">
								<button type="submit" class="btn no-btn-style profile_bt m-r-5">發送驗證碼</button>
								<input type="checkbox" value="" class="m-r-5 m-t-10">以簡訊發出通知訊息
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">驗證</label>
							<div class="col-sm-10">
								<div class="g-recaptcha" data-sitekey="your_site_key"></div>
								<noscript>
								  <div>
								    <div style="width: 302px; height: 422px; position: relative;">
								      <div style="width: 302px; height: 422px; position: absolute;">
								        <iframe src="https://www.google.com/recaptcha/api/fallback?k=6Lf-CzUUAAAAANM6ICasmtad8QVBW9ruHid9fYZW"
								                frameborder="0" scrolling="no"
								                style="width: 302px; height:422px; border-style: none;">
								        </iframe>
								      </div>
								    </div>
								    <div style="width: 300px; height: 60px; border-style: none;
					                   bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px;
					                   background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px;">
								      <textarea id="g-recaptcha-response" name="g-recaptcha-response"
						                   class="g-recaptcha-response"
						                   style="width: 250px; height: 40px; border: 1px solid #c1c1c1;
					                        margin: 10px 25px; padding: 0px; resize: none;" >
								      </textarea>
								    </div>
								  </div>
								</noscript>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="col-sm-12 no-padding">
									<button type="submit" class="btn no-btn-style profile_bt pull-right">提交審核</button>
									<button type="submit" class="btn no-btn-style profile_bt pull-right m-r-10">暫存資料</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


    </div>
    <?php require_once('share/_footer.php'); ?>
    <?php require_once('share/_footer_js.php'); ?>
</body>
</html>



