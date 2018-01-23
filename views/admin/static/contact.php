<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\Status;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contact Us');
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
                <form id="data-form" action="<?=Url::to(['admin/static/create'])?>">
                    <a value="聯絡我們" name="category" hidden></a>
                    <div class="form-group">
                        <textarea class="form-control" id="editor" rows="3" name="editor">
                            <?=$datalist->content?>
                        </textarea>
                    </div>
                    <div class="text-right">
                        <a href="#" class="btn btn-default">編輯文案</a>
                        <button type="submit" class="btn btn-default" id="submit-data">確定上傳</button>
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
