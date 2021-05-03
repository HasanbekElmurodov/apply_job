<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\BackendAsset;
use yii\helpers\Html;


BackendAsset::register($this);
$url = Yii::$app->homeUrl."backend/";
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="<?= Yii::$app->homeUrl?>" class="logo"><b>Admin panel</b></a>

        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a data-method="POST" class="logout" href="<?= \yii\helpers\Url::to(['/site/logout']) ?>">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="<?= \yii\helpers\Url::to(['interview/index'])?>"><img src="<?= $url?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                <h5 class="centered"></h5>

                <?= $controller = Yii::$app->controller->id;?>

                <li class="mt">
                    <a class="<?= ($controller=='interview')?'active':''?>" href="<?= \yii\helpers\Url::to(['interview/index'])?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Interview</span>
                    </a>
                </li>
                <li class="mt">
                    <a class="<?= ($controller=='examiner')?'active':''?>" href="<?= \yii\helpers\Url::to(['examiner/index'])?>">
                        <i class="fa fa-users"></i>
                        <span>Examiner</span>
                    </a>
                </li>
                <li class="mt">
                    <a class="<?= ($controller=='application')?'active':''?>" href="<?= \yii\helpers\Url::to(['application/index'])?>">
                        <i class="fa fa-table"></i>
                        <span>Application</span>
                    </a>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            <?= $content ?>

        </section>
    </section>

    <!--main content end-->

</section>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
