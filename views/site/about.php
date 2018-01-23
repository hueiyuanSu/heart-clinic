<?php
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = Yii::t('app', 'About Me');

?>
<body>
    <div id="site-wrapper" class="site_wrapper">
        <div class="page_wrapper about_wrapper">
        	<div class="page_title_area clearAfter">
				<div class="page_title pull-left">組織介紹</div>
				<div class="page_title_en pull-left">Contact</div>
			</div>
			<div class="about_area">
				<?php

				if($org){
					$org->content; 
				}else{
					echo '預設介紹文字';
				}
				

				?>
	        </div>
        </div>

    </div>
</body>
</html>



