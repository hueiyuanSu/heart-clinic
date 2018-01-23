<?php
namespace app\assets;

use yii\web\AssetBundle;

class SelectizeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/selectize/';
    public $css = [
        'dist/css/selectize.css'
    ];
    public $js = [
        'dist/js/selectize.min.js'
    ];
}
