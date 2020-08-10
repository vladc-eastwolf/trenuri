<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'css/profile.css',
        'css/signup.css',
        'css/eroare_cautare.css',
        '//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css',
        'css/train.css',
        'css/jquery.seat-charts.css',
    ];
    public $js = [
//        '//code.jquery.com/jquery-1.11.1.min.js',
//        '//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js',
        'js/signup.js',
        'js/profile.js',
        'js/jquery.seat-charts.js',
        'js/jquery.seat-charts.min.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
}
