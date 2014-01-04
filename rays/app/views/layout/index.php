<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Rays MVC framework. Rays is a light-weight MVC framework. Easy and fast!">
    <meta name="author" content="Raysmond, Jiankun Lei">

    <title><?= Rays::app()->client()->getHeaderTitle() ?></title>
    <?php $baseUrl = Rays::baseUrl(); ?>
    <!-- Bootstrap core CSS -->
    <link href="<?= $baseUrl ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= $baseUrl ?>/assets/bootstrap/css/non-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?= $baseUrl ?>/assets/bootstrap/js/html5shiv.js"></script>
    <script src="<?= $baseUrl ?>/assets/bootstrap/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?= Rays::app()->getName() ?></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Documentation <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Installation</a></li>
                        <li><a href="#">Get started</a></li>
                        <li><a href="http://raysmond.com/rays/docs/api">Classes API</a></li>
                        <!--  <li class="divider"></li>-->
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="https://github.com/Raysmond/Rays">Github</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>

<div class="container">
    <div id="message" class="row">
        <?php RHtml::showFlashMessages(false); ?>
    </div>
    <div id="content">
        <?= isset($content) ? $content : "" ?>
    </div>

</div>
<!-- /container -->

<div class="container">
    <div id="footer">
        <hr>
        Copyright &copy; <?= Rays::app()->getName() ?> 2013, All Rights Reserved. by <a
            href="http://raysmond.com">Raysmond</a>
        <span style="float: right;"> Powered by <a href="https://github.com/Raysmond/Rays">Rays</a> framework!</span>
        <br/>
        <span
            style="color: gray;">Page generated in <?= sprintf("%.2f", (microtime(true) - Rays::$startTime) * 1000); ?>
            ms</span>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= $baseUrl ?>/assets/js/jquery.min.js"></script>
<script src="<?= $baseUrl ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<?php
// link custom script files
echo RHtml::linkScriptArray(Rays::app()->client()->script);
?>
</body>
</html>
