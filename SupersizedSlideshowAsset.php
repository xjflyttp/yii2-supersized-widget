<?php

namespace xj\supersized;

use yii\web\AssetBundle;

class SupersizedSlideshowAsset extends AssetBundle {

    public $sourcePath = '@vendor/xj/yii2-supersized-widget/assets/slideshow';
    public $css = [
        'css/supersized.css',
        'theme/supersized.shutter.css',
    ];
    public $js = [
        'js/jquery.easing.min.js',
        'js/supersized.3.2.7.js',
        'theme/supersized.shutter.js',
    ];
    public $depends = ['yii\web\JqueryAsset'];

}
