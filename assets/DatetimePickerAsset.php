<?php
namespace app\assets;

use yii\web\AssetBundle;

class DatetimePickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/datetimepicker/';
    public $css = [
        'jquery.datetimepicker.css'
    ];
    public $js = [
        'jquery.datetimepicker.js'
    ];
}
