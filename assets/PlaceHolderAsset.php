<?php
namespace app\assets;

use yii\web\AssetBundle;

class PlaceHolderAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/jquery-placeholder';
    public $js = [
        'jquery.placeholder.min.js'
    ];
}

