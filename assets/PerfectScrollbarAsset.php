<?php
namespace app\assets;

use yii\web\AssetBundle;

class PerfectScrollbarAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/perfect-scrollbar/';
    public $css = [
        'css/perfect-scrollbar.min.css'
    ];
    public $js = [
        'js/perfect-scrollbar.jquery.min.js'
    ];
}
