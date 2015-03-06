<?php

namespace xj\supersized;

use yii\web\AssetBundle;

class SupersizedCoreAsset extends AssetBundle {

    public $sourcePath = '@vendor/xj/yii2-supersized-widget/assets/core';
    public $basePath = '@webroot/assets';
    public $css = ['css/supersized.core.css'];
    public $js = ['js/supersized.core.3.2.1.js'];
    public $depends = ['yii\web\JqueryAsset'];

}
