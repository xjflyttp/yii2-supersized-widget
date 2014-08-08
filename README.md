yii2-supersized-widget
======================

http://buildinternet.com/project/supersized/

composer.json
-----
```json
"require": {
        "xj/yii2-supersized-widget": "*"
},
```

Core
-----------
```php
Supersized::widget([
    'theme' => Supersized::THEME_CORE,
    'options' => [
        'start_slide' => 0,
        'new_window' => 1,
        'image_protect' => 1,
        'min_width' => 0,
        'min_height' => 0,
        'vertical_center' => 1,
        'horizontal_center' => 1,
        'fit_always' => 0,
        'fit_portrait' => 1,
        'fit_landscape' => 0,
        'slides' => [
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/kazvan-1.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/kazvan-2.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/kazvan-3.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/wojno-1.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/wojno-2.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/wojno-3.jpg', 'title' => 'Image Credit: Colin Wojno'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/shaden-1.jpg', 'title' => 'Image Credit: Colin Wojno'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/shaden-2.jpg', 'title' => 'Image Credit: Colin Wojno'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/shaden-3.jpg', 'title' => 'Image Credit: Brook Shaden'],
        ]
    ],
]);
```

SlideShow - Inner Render Control
------
```php
<?=
Supersized::widget([
    'theme' => Supersized::THEME_SLIDESHOW,
    'returnType' => Supersized::RETURN_CONTROL,
    'options' => [
        'slide_interval' => 3000,
        'transition' => 3,
        'transition_speed' => 700,
        'slide_links' => 'blank',
        'slides' => [
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/kazvan-1.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/kazvan-2.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/kazvan-3.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/wojno-1.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/wojno-2.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/wojno-3.jpg', 'title' => 'Image Credit: Colin Wojno'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/shaden-1.jpg', 'title' => 'Image Credit: Colin Wojno'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/shaden-2.jpg', 'title' => 'Image Credit: Colin Wojno'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/shaden-3.jpg', 'title' => 'Image Credit: Brook Shaden'],
        ]
    ]
]);
?>
```


SlideShow - Custom Control UI
------
```php
$assetsDir = Supersized::widget([
    'theme' => Supersized::THEME_SLIDESHOW,
    'returnType' => Supersized::RETURN_ASSETS,
    'options' => [
        'slide_interval' => 3000,
        'transition' => 3,
        'transition_speed' => 700,
        'slide_links' => 'blank',
        'slides' => [
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/kazvan-1.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/kazvan-2.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/kazvan-3.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/wojno-1.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/wojno-2.jpg', 'title' => 'Image Credit: Maria Kazvan'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/wojno-3.jpg', 'title' => 'Image Credit: Colin Wojno'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/shaden-1.jpg', 'title' => 'Image Credit: Colin Wojno'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/shaden-2.jpg', 'title' => 'Image Credit: Colin Wojno'],
            ['image' => 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/slides/shaden-3.jpg', 'title' => 'Image Credit: Brook Shaden'],
        ]
    ]
]);
```
```html
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

        <a id="play-button"><img id="pauseplay" src="<?=$assetsDir?>/img/pause.png"/></a>

        <!--Slide counter-->
        <div id="slidecounter">
            <span class="slidenumber"></span> / <span class="totalslides"></span>
        </div>

        <!--Slide captions displayed here-->
        <div id="slidecaption"></div>

        <!--Thumb Tray button-->
        <a id="tray-button"><img id="tray-arrow" src="<?=$assetsDir?>/img/button-tray-up.png"/></a>

        <!--Navigation-->
        <ul id="slide-list"></ul>

    </div>
</div>
```

@see http://buildinternet.com/project/supersized/docs.html