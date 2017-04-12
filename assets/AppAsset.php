<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.css',
        'css/animate.css',
        'css/owl.carousel.css',
        'css/magnific-popup.css',
        'css/styles.css',
        'css/bg.css',
        'css/color.css',
        'revolution/css/settings.css',
        'revolution/css/layers.css',
        'revolution/css/navigation.css',
        'css/site.css',
    ];
    public $js = [
         "js/jquery.min.js",
         "js/bootstrap.min.js",
         "js/jquery.isotope.min.js",
         "js/easing.js",
         "js/owl.carousel.js",
         "js/jquery.countTo.js",
         //"js/validation.js",
         "js/wow.min.js",
         "js/jquery.magnific-popup.min.js",
         "js/enquire.min.js",
         "js/jquery.stellar.min.js",
         "js/designesia.js",

         "revolution/js/jquery.themepunch.tools.min.js?rev=5.0", 
         "revolution/js/jquery.themepunch.revolution.min.js?rev=5.0" ,
         "revolution/js/extensions/revolution.extension.video.min.js", 
         "revolution/js/extensions/revolution.extension.slideanims.min.js", 
         "revolution/js/extensions/revolution.extension.layeranimation.min.js", 
         "revolution/js/extensions/revolution.extension.navigation.min.js", 
         "revolution/js/extensions/revolution.extension.actions.min.js", 
         "revolution/js/extensions/revolution.extension.kenburn.min.js", 
         "revolution/js/extensions/revolution.extension.migration.min.js",
         "revolution/js/extensions/revolution.extension.parallax.min.js", 
         "js/script.js",
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'yiister\adminlte\assets\Asset',
    ];
}

