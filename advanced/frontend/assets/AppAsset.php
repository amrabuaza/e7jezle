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
        'css/site.css',
  //      'css/index/animate.css',
       // 'css/index/camera.css',
        //'css/index/contact-form.css',
      //'css/index/google-map.css',
       // 'css/index/grid.css',
       // 'css/index/jquery.fancybox.css',
//      'css/index/style.css',
        'css/fonts.googleapis.css',
        'css/indexStyle.css'
    ];
    public $js = [
        'js/myCode.js',
//        'js/index/jquery-migrate-1.2.1.js',
//        'js/index/html5shiv.js',
//        'js/index/device.min.js',
//        'js/index/script.js',
//        'js/index/jquery.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
