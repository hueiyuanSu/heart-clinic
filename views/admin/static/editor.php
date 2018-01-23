<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\Status;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Slider Editor');
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
                    <div class="input-group">
                        <span class="input-group-addon">Name</span>
                        <input type="text" class="form-control">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Name</span>
                        <input type="text" class="form-control">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Name</span>
                        <select class="form-control" name="#">
                            <option value="">Option 1</option>
                            <option value="">Option 2</option>
                        </select>
                    </div>
                    <br><br>
                    <a href="#" class="btn btn-default">Web圖</a>
                    <br><br>
                    <small class="form-text text-muted">Helping text here</small>
                    <br><br>
                    <div class="form-group">
                        <label class="btn btn-primary col-sm-2" for="my-file-selector">
                            <input id="my-file-selector" type="file" style="display:none"
                                   onchange="$('#upload-file-info').html(this.files[0].name)">選擇圖片
                        </label>
                        <span class='label label-info' id="upload-file-info"></span>
                    </div>
                    <br><br>
                    <a href="#" class="btn btn-default">Mobile圖</a>
                    <br><br>
                    <small class="form-text text-muted">Helping text here</small>
                    <br><br>
                    <div class="form-group">
                        <label class="btn btn-primary col-sm-2" for="my-file-selector-2">
                            <input id="my-file-selector-2" type="file" style="display:none"
                                   onchange="$('#upload-file-info-2').html(this.files[0].name)">選擇圖片
                        </label>
                        <span class='label label-info' id="upload-file-info-2"></span>
                    </div>
                    <br><br><br>
                    <div class="text">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

