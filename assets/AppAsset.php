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
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/ui/jquery-ui.css',
        'css/site.css',
        'css/style.css',
        'css/font-awesome/css/font-awesome.min.css',
    ];
    public $js = [
        'js/jquery.cookie.js', // куки
        'js/jquery.dcjqaccordion.2.9.js', // виджет для аккордиона
        'js/jquery.hoverIntent.minified.js', // виджет для аккордиона
        'js/ui/jquery-ui.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
