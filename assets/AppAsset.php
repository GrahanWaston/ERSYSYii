<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = __DIR__;
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap',
        'css/app.css.map',
    ];
    public $js = [
        'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        \yii\web\JqueryAsset::class,
        \yii\bootstrap5\BootstrapIconAsset::class,
        \jeemce\assets\main\JeemceMainAsset::class,
    ];
}
