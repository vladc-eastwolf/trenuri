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
        'css/profile.css',
        'css/signup.css',
        'css/eroare_cautare.css',
        '//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css',
        'css/display_trenuri.css'
    ];
    public $js = [
        'js/signup.js',
        'js/profile.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
}
