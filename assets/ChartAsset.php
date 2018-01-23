<?php
namespace app\assets;

use yii\web\AssetBundle;

class ChartAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/chartjs';


    public $js = [
        'dist/Chart.min.js',
    ];
}
