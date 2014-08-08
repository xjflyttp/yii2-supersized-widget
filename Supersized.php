<?php

namespace xj\supersized;

use yii\helpers\Json;
use yii\web\View;
use yii\base\Widget;

class Supersized extends Widget {

    const THEME_CORE = 1;
    const THEME_SLIDESHOW = 2;
    const RETURN_NONE = 0;
    const RETURN_CONTROL = 1;
    const RETURN_ASSETS = 2;

    /**
     * Theme Core
     * @var int
     */
    public $theme = self::THEME_CORE;

    /**
     * Return Control | Assets
     * @var int
     */
    public $returnType = self::RETURN_NONE;

    /**
     * Options
     * @var []
     * @see http://buildinternet.com/project/supersized/docs.html
     * @example 
     * [
     * autoplay
     * fit_always
     * fit_landscape
     * fit_portrait
     * horizontal_center
     * image_protect
     * keyboard_nav
     * min_height
     * min_width
     * new_window
     * pause_hover
     * performance
     * random
     * slides
     * slideshow
     * slide_interval
     * slide_links
     * start_slide
     * stop_loop
     * thumb_links
     * thumbnail_navigation
     * transition
     * transition_speed
     * vertical_center
     * ]
     * @see http://buildinternet.com/project/supersized/docs.html
     */
    public $options = [];

    /**
     * Render Position
     * @var mixed
     * false =  Render JavaScript Code in Current Position
     * View::POS_READY
     * View::POS_BEGIN
     * View::......
     */
    public $renderPosition = View::POS_READY;

    /*
     * Assets Publish Directory
     */
    private $publishDirectory;

    /**
     * Initializes the widget.
     */
    public function init() {
        //register js css
        switch ($this->theme) {
            case self::THEME_CORE :
                $assets = SupersizedCoreAsset::register($this->view);
                break;
            case self::THEME_SLIDESHOW:
                $assets = SupersizedSlideshowAsset::register($this->view);
                break;
            default :
            //none
        }
        $this->publishDirectory = $assets->baseUrl;

        return parent::init();
    }

    /**
     * Renders the widget.
     */
    public function run() {
        $this->view->registerJs($this->getScript(), $this->renderPosition);

        switch ($this->returnType) {
            case self::RETURN_CONTROL:
                return $this->getControlHtml();
            case self::RETURN_ASSETS:
                return $this->publishDirectory;
            default:
                //none
                break;
        }
    }

    /**
     * get Publish Image Directory
     * @return string
     */
    private function getImageDirectory() {
        return $this->publishDirectory . '/img/';
    }

    /**
     * get Control UI Html
     * @return string
     */
    private function getControlHtml() {
        $imagePath = $this->getImageDirectory();
        return <<<EOF
<!--Thumbnail Navigation-->
<div id="prevthumb"></div>
<div id="nextthumb"></div>

<!--Arrow Navigation-->
<a id="prevslide" class="load-item"></a>
<a id="nextslide" class="load-item"></a>

<div id="thumb-tray" class="load-item">
    <div id="thumb-back"></div>
    <div id="thumb-forward"></div>
</div>

<!--Time Bar-->
<div id="progress-back" class="load-item">
    <div id="progress-bar"></div>
</div>

<!--Control Bar-->
<div id="controls-wrapper" class="load-item">
    <div id="controls">

        <a id="play-button"><img id="pauseplay" src="{$imagePath}pause.png"/></a>

        <!--Slide counter-->
        <div id="slidecounter">
            <span class="slidenumber"></span> / <span class="totalslides"></span>
        </div>

        <!--Slide captions displayed here-->
        <div id="slidecaption"></div>

        <!--Thumb Tray button-->
        <a id="tray-button"><img id="tray-arrow" src="{$imagePath}button-tray-up.png"/></a>

        <!--Navigation-->
        <ul id="slide-list"></ul>

    </div>
</div>
EOF;
    }

    /**
     * Register Script
     */
    private function getScript() {
        $imagePath = $this->getImageDirectory();
        $options = Json::encode($this->options);
        $js = '';
        if ($this->theme !== self::THEME_CORE) {
            $js .= '$.supersized.themeVars.image_path = "' . $imagePath . '";';
        }
        $js .= '$.supersized(' . $options . ');';
        return $js;
    }

}
