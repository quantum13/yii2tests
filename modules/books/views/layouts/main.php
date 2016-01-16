<?php
use app\modules\site\assetbundles\SiteAsset;
use yii\helpers\Html;
use yii\web\YiiAsset;

YiiAsset::register($this);
SiteAsset::register($this);

/* @var $this yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= Html::encode($this->title) ?></title>

    <!-- Bootstrap core CSS -->
    <?php $this->head() ?>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?= Html::csrfMetaTags() ?>
</head>

<body>
<?php $this->beginBody() ?>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" data-toggle="tooltip" data-container="body" data-placement="bottom"
               title="Yii2tests">
                Yii2tests
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/books">Books</a></li>
                <? if (Yii::$app->user->isGuest) { ?>
                    <li><a href="/login">Login</a></li>
                <? } else { ?>
                    <li><a href="/logout">Logout</a></li>
                <? } ?>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<div class="container container-main">
    <div class="row">
        <?= $content ?>
    </div>
</div>
<!-- /container -->

<div class="container footer">
    <div class="row">
        <div class="col-md-12">
            <hr>

        </div>
    </div>
</div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
