<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\Status;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Domain Information');
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
                <h1 class="h1">新增產業訊息文章</h1>
                <form method="post" action="#">
                    <div class="form-group">
                        <label for="#" class="col-sm-2 col-form-label">文章標題</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" placeholder="文章標題">
                        </div>
                    </div>
                    <br><br><br><br>
                    <div class="form-group col-md-offset-2">
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

                    <div class="form-group">
                        <textarea class="form-control" id="editor" rows="3"></textarea>
                    </div>
                    <div class="text-right">
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

