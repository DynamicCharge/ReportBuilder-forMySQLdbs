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
        'css/main-layout.css',
        'css/main-second-layout.css',
    ];
    public $js = [
//        jQuery CDN - Slim version (=without AJAX)
        "https://code.jquery.com/jquery-3.3.1.slim.min.js",
//        Popper.JS
        "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js",
//        Bootstrap JS
        "https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js",
//        jQuery Custom Scroller CDN
        "https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js",
//        custom scripts
        '/web/scripts/sidebar-functionality.js',
        '/web/scripts/main-sidebar-functionality.js',
        '/web/scripts/flexible-table-functionality.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
