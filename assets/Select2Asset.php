<?php
namespace app\assets;

use yii\web\AssetBundle;

class Select2Asset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/select2/dist';

    public $css = [
        'css/select2.min.css',
    ];

    public $js = [
        'js/select2.full.js',
        'js/i18n/zh-TW.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
