<?php
namespace app\assets;

use yii\web\AssetBundle;

class HandlebarsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/handlebars';


    public $js = [
        'handlebars.min.js'
    ];
}
