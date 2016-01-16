<?php
namespace app\modules\site\assetbundles;


use yii\web\AssetBundle;

class LightboxAsset extends AssetBundle
{
    public $sourcePath = '@bower/responsive-lightbox';
    public $css = [
        'jquery.lightbox.min.css'
    ];
    public $js = [
        'jquery.lightbox.min.js'
    ];
    public $depends = [

    ];

}
