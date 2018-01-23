<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\Status;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Conference');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="an-body-topbar wow fadeIn">
    <div class="an-page-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
</div>
<div class="an-single-component with-shadow">
    <div class="an-component-body">
        <div class="an-helper-block">
            <div class="an-scrollable-x">
                <form method="post" action="#">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">新增活動</label>
                        <div class="col-sm-8">
                            <label class="radio-inline"> <input type="radio" name="#"  value="#"> 座談會 </label>
                            <label class="radio-inline"> <input type="radio" name="#"  value="#"> 說明會 </label>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="#" class="col-sm-2 col-form-label">文章標題</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" placeholder="文章標題"><br><br>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group col-md-offset-2">
                        <br><br>
                        <label class="btn btn-primary col-sm-2" for="my-file-selector">
                            <input  id="my-file-selector" type="file" style="display:none"
                                    onchange="$('#upload-file-info').html(this.files[0].name)">選擇圖片
                        </label>
                        <span class='label label-info' id="upload-file-info"></span>
                        <br><br>
                        <p class="h3">＊建議大小為　1440 * 540</p>
                    </div>
                    <div class="form-group col-md-offset-2">
                        <label class="btn btn-primary col-sm-2" for="my-file-selector-2">
                            <input id="my-file-selector-2" type="file" style="display:none"
                                   onchange="$('#upload-file-info-2').html(this.files[0].name)">上傳圖片（行動版）
                        </label>
                        <span class='label label-info' id="upload-file-info-2"></span>
                        <br><br>
                        <p class="h3">＊建議大小為　780 * 300</p>
                    </div>
                    <div class="form-group col-sm-8">
                        <br><br>
                        <label for="#" class="col-sm-3  col-form-label">活動日期</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="#" placeholder="活動日期"><br>
                        </div>
                        <br><br>
                        <label for="#" class="col-sm-3  col-form-label">活動時間</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="#" placeholder="活動時間"><br>
                        </div>

                        <label for="#" class="col-sm-3 col-form-label">報名截止日</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="#" placeholder="報名截止日">
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group">
                            <label for="#" class="col-sm-12 col-form-label">
                                <input type="checkbox" >開放報名
                            </label><br><br>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <textarea class="form-control" id="editor" name="editor" rows="3"></textarea> <br><br>
                    </div>
                    <div class="text-right col-sm-12">
                        <a href="#" class="btn btn-default">預覽頁面</a>
                        <button type="submit" class="btn btn-default">確定上傳</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'editor' );
</script>
