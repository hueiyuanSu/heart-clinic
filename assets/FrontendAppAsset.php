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
class FrontendAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //theme
        'css/animate.min.css',
        'https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900',
        'https://fonts.googleapis.com/css?family=Merriweather:400,300,700,900',
        'css/front.css'
    ];
    public $depends = [
        'yii\web\YiiAsset'
        // 'app\assets\FontAwesomeAsset',
        // 'app\assets\MomentAsset', // analog theme
        // 'app\assets\SweetAlertAsset',
        // 'app\assets\TypeAheadAsset',
        // 'app\assets\HandlebarsAsset',
        // 'app\assets\PlaceHolderAsset',
        // 'app\assets\Select2Asset',
        // 'app\assets\DatetimePickerAsset', // analog theme
        // 'app\assets\PrintAsset',
        // 'app\assets\CircleProgressAsset', // analog theme
        // 'app\assets\PerfectScrollbarAsset', // analog theme
        // 'app\assets\MicropluginAsset',// analog theme for Selectize
        // 'app\assets\SelectizeAsset',// analog theme
        // 'app\assets\ChartAsset',// analog theme
        // 'app\assets\DataTablesAsset',
        // 'app\assets\JqnotifybarAsset'
        // owl.carousel.min.js, wow.min.js 先不掛
        // analog theme
    ];
    public $js = [
        "http://cdn.bootcss.com/jquery/3.2.1/jquery.min.js",
        "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js",
        "https://www.google.com/recaptcha/api.js",
        "http://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js",
        "js/init.js",
        "js/slider.js",
        'js/index.js',
        'js/memberdata.js',
        'js/register_member.js',
        'js/login_member.js',
    ];
}
