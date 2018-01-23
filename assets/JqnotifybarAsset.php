<?php
namespace app\assets;

use yii\web\AssetBundle;

class JqnotifybarAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/jqnotifybar/';

    public $css = [
        'css/jquery.notifyBar.css',
    ];

    public $js = [
        'jquery.notifyBar.js'
    ];
}
