<?php
namespace app\assets;

use yii\web\AssetBundle;

class DataTablesAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/';
    public $css = [
        'datatables.net-bs/css/dataTables.bootstrap.min.css'
    ];
    public $js = [
        'datatables.net/js/jquery.dataTables.min.js',
        'datatables.net-bs/js/dataTables.bootstrap.min.js',
    ];
}
