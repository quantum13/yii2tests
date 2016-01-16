<?php
namespace app\modules\site\assetbundles;


use yii\web\AssetBundle;

class SiteAsset extends AssetBundle
{
    public $sourcePath = '@site/assets';
    public $css = [
        'base.css'
    ];
    public $js = [
        'base.js'
    ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'app\modules\site\assetbundles\LightboxAsset',
    ];

}
