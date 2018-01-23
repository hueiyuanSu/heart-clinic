<?php
namespace app\assets;

use yii\web\AssetBundle;

class TypeAheadAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/twitter/typeahead.js/';


    public $js = [
        'dist/bloodhound.min.js',
        'dist/typeahead.jquery.min.js'
    ];
}
