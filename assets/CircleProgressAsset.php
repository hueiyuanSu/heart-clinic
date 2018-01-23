<?php
namespace app\assets;

use yii\web\AssetBundle;

class CircleProgressAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/jquery-circle-progress';


    public $js = [
        'dist/circle-progress.min.js',
    ];
}
