<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

?>

<body>
    <div id="site-wrapper" class="site_wrapper">
        <div class="page_wrapper apply_information_wrapper">
        	<div class="page_title_area clearAfter">
				<div class="page_title pull-left">供需媒合申請</div>
				<div class="page_title_en pull-left">Apply for Information Post</div>
            </div>

			<div class="apply_information_area clearAfter" >
                <div class="apply_information_block">
    				<form class="form-horizontal" id="platform-form" action="<?= Url::to('/supplier/create')?>">
                        <table id="platform-table" data-create-action="<?= Url::to('/supplier/create')?>" data-return-action="<?= Url::to('/supplier')?>" data-temp-action="<?= Url::to('/supplier/temp')?>">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">產業分類</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="category" name="category">
                                        <option value="總體議題">01 總體議題</option>
                                        <option value="農、林、漁、牧、礦業">02 農、林、漁、牧、礦業</option>
                                        <option value="食品業">03 食品業</option>
                                        <option value="紡織業">04 紡織業</option>
                                        <option value="紙業及印刷業">05 紙業及印刷業</option>
                                        <option value="石油化學工業">06 石油化學工業</option>
                                        <option value="生技製藥與醫療保健業">07 生技製藥與醫療保健業</option>
                                        <option value="非金屬礦物製品製造業">08 非金屬礦物製品製造業</option>
                                        <option value="金屬工業">09 金屬工業</option>
                                        <option value="電子零組件製造業">10 電子零組件製造業</option>
                                        <option value="光電材料及元件業">11 光電材料及元件業</option>
                                        <option value="資訊電子業">12 資訊電子業</option>
                                        <option value="通訊業">13 通訊業</option>
                                        <option value="電力設備製造業">14 電力設備製造業</option>
                                        <option value="機械設備製造業">15 機械設備製造業</option>
                                        <option value="運輸工具及零件製造業">16 運輸工具及零件製造業</option>
                                        <option value="綜合用品製造業">17 綜合用品製造業</option>
                                        <option value="水電燃氣業">18 水電燃氣業</option>
                                        <option value="營造及不動產業">19 營造及不動產業</option>
                                        <option value="批發及零售業">20 批發及零售業</option>
                                        <option value="運輸及倉儲業">21 運輸及倉儲業</option>
                                        <option value="觀光、餐飲及休閒業">22 觀光、餐飲及休閒業</option>
                                        <option value="文化創意產業">23 文化創意產業</option>
                                        <option value="金融、保險及證券業">24 金融、保險及證券業</option>
                                        <option value="工商及個人服務業">25 工商及個人服務業</option>
                                        <option value="環保、教育及社會服務">26 環保、教育及社會服務</option>
                                        <option value="新興產業">27 新興產業</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">公司名稱</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="company" name="company" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">公司負責人</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="principal" name="principal" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">統一編號</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ein" name="ein" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">工廠證號</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="factory" name="factory" placeholder="">
                                    <p class="apply_information_text">＊ 未設有工廠者免填</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">填表人</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="writer" name="writer" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">部門/職稱</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="department" name="department" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">地址</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">聯絡電話</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">行動電話</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">傳真</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fax" name="fax" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">網站</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="website" name="website" placeholder="">
                                    <p class="apply_information_text">＊ 選填</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="col-sm-12 no-padding">
                                        <button type="submit" class="btn no-btn-style apply_information_bt pull-right" id="platform-submit">提交審核</button>
                                        <button type="submit" class="btn no-btn-style apply_information_bt pull-right m-r-10" id="template-data">暫存資料</button>
                                    </div>
                                </div>
                            </div>
                        </table>
                    </form>

                </div>
	        </div>
		</div>

        <?php
            $this->registerJsFile('@web/js/platform_information.js', ['depends'=>['app\assets\FrontendAppAsset']]);
        ?>
    </div>
</body>
</html>



