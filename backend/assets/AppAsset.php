<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/change-transact.css',
        'plugins/layui/css/layui.css',
//        'css/signin-form-elements.css',
//        'css/signin-style.css',
//        'plugins/layui/css/layui.mobile.css',
        'plugins/Font-Awesome-master/css/font-awesome.min.css'
    ];
    public $js = [
        'plugins/layui/layui.js',
        'js/main.js',
//        'js/jquery.backstretch.min.js',
//        'js/signin-scripts.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
