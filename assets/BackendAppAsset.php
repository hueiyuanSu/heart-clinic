<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BackendAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //analog theme
        'https://fonts.googleapis.com/css?family=Montserrat:400,700"',
        'css/animate.min.css',
        'css/vendor-styles.css',
        'css/styles.css',
        //custom part
        'css/backend.css'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'app\assets\FontAwesomeAsset',
        'app\assets\MomentAsset', // analog theme
        'app\assets\SweetAlertAsset',
        'app\assets\TypeAheadAsset',
        'app\assets\HandlebarsAsset',
        'app\assets\PlaceHolderAsset',
        'app\assets\Select2Asset',
        'app\assets\DatetimePickerAsset', // analog theme
        'app\assets\PrintAsset',
        'app\assets\CircleProgressAsset', // analog theme
        'app\assets\PerfectScrollbarAsset', // analog theme
        'app\assets\MicropluginAsset',// analog theme for Selectize
        'app\assets\SelectizeAsset',// analog theme
        'app\assets\ChartAsset',// analog theme
        'app\assets\DataTablesAsset',
        'app\assets\JqnotifybarAsset'
        // owl.carousel.min.js, wow.min.js 先不掛
        // analog theme
    ];
    public $js = [
        //analog theme
        'js/analog_scripts.js',
        // custom part
        'js/admin/init.js',
        'js/admin/staticpage.js',

    ];
}
