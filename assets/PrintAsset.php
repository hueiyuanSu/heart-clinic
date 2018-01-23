<?php
namespace app\assets;

use yii\web\AssetBundle;

class PrintAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $js = [
        'js/jQuery.print.js',
    ];
}
