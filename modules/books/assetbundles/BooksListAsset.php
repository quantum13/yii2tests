<?php
namespace app\modules\books\assetbundles;


use yii\web\AssetBundle;

class BooksListAsset extends AssetBundle
{
    public $sourcePath;
    public $css = [
    ];
    public $js = [
        'list.js'
    ];
    public $depends = [
        'app\modules\site\assetbundles\SiteAsset',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/../assets';
        parent::init();
    }

}
