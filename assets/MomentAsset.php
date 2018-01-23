<?php
namespace app\assets;

use yii\web\AssetBundle;

class MomentAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/moment';


    public $js = [
        'min/moment-with-locales.min.js',
    ];
}
