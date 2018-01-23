<?php
namespace app\assets;

use yii\web\AssetBundle;

class CroppieAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/croppie';
    public $css = [
        'croppie.css'
    ];
    public $js = [
        'croppie.min.js',
    ];
}
