<?php
namespace app\assets;

use yii\web\AssetBundle;

class MicropluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/microplugin/';

    public $js = [
        'src/microplugin.js'
    ];
}
