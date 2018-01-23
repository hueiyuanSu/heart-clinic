<?php
namespace app\assets;

use yii\web\AssetBundle;

class DaterangePickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/gentelella/vendors/bootstrap-daterangepicker/';
    public $css = [
        'daterangepicker.css'
    ];
    public $js = [
        'daterangepicker.js'
    ];
}
