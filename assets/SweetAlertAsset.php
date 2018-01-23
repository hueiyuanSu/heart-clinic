<?php
namespace app\assets;

use yii\web\AssetBundle;

class SweetAlertAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/sweetalert/';

    public $css = [
        'dist/sweetalert.css',
    ];

    public $js = [
        'dist/sweetalert.min.js'
    ];
}
