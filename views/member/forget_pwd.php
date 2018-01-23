<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Forget password');
?>
    <div id="site-wrapper" class="site_wrapper">
        <div class="page_wrapper forget_pwd_wrapper">
        	<div class="page_title_area clearAfter">
				<div class="page_title pull-left">忘記密碼</div>
				<div class="page_title_en pull-left">Forget Password</div>
			</div>
			<div class="forget_pwd_area">
				<div class="forget_pwd_block">
					<form>
						<div class="form-group">
							<label for="" class="m-b-10">請輸入 Email</label>
							<input type="email" class="form-control" id="" placeholder="Email">
						</div>
						<button type="submit" class="btn btn-default">重設密碼</button>
					</form>
				</div>
			</div>
		</div>


    </div>



