<?php

/* @var $this yii\web\View */
// \Yii::$app->language = 'th';
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = Yii::t('app', 'Contact Me');
// $role = Yii::$app->authManager->getAssignments(Yii::$app->user->identity->id);

?>
<body>
    <div id="site-wrapper" class="site_wrapper">
        <div class="page_wrapper contact_wrapper">
        	<div class="page_title_area clearAfter">
				<div class="page_title pull-left">聯絡我們</div>
				<div class="page_title_en pull-left">Contact</div>
			</div>
			<div class="contact_area">
	        	<?=$contact->content?>
	        	<hr>
	        	<div class="contact_block">
	        		<div class="contact_form_area">
	        			<form class="form-horizontal">
	        				<div class="form-group">
								<label for="" class="col-sm-2 control-label">* 會員姓名</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">* Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">* 聯絡電話</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">* 內容說明</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="5"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">* 上傳附件</label>
								<div class="col-sm-10">
									<input type="file" id="">
									<p class="help-block">可上傳檔案類型為PDF或JPG，檔案小於2MB。</p>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">* 驗證</label>
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
									<button type="submit" class="btn btn-default pull-right">確認送出</button>
									<button type="submit" class="btn btn-default pull-right m-r-5">重新填寫</button>
								</div>
							</div>
						</form>
	        		</div>
	        	</div>
	        </div>
        </div>

    </div>
</body>
</html>



