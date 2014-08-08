<?php

namespace xj\supersized;

use yii\web\AssetBundle;

class SupersizedSlideshowAsset extends AssetBundle {

    public $sourcePath;
    public $basePath = '@webroot/assets';
    public $publishOptions = ['forceCopy' => YII_DEBUG];
    public $css = [
        'css/supersized.css',
        'theme/supersized.shutter.css',
    ];
    public $js = [];
    public $depends = ['yii\web\JqueryAsset'];

    private function getJs() {
        return [
            'js/jquery.easing.min.js',
            YII_DEBUG ? 'js/supersized.3.2.7.js' : 'js/supersized.3.2.7.min.js',
            YII_DEBUG ? 'theme/supersized.shutter.js' : 'theme/supersized.shutter.min.js',
        ];
    }

    public function init() {
        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets/slideshow';
        if (empty($this->js)) {
            $this->js = $this->getJs();
        }
        return parent::init();
    }

}
