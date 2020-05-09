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
        'css/style.css'
    ];
    public $js = [
        'js/Site.js',
        'js/AjaxBuilder.js',
        'js/Pagination.js',
        'js/index.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
        /*'yii\bootstrap\BootstrapAsset',*/
    ];

    public static function setJs( $arr )
    {
        $this->js = $arr;
    }
}
