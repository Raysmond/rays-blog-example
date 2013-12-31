<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Raysmond blog">
    <meta name="author" content="Raysmond, Jiankun Lei, 雷建坤">

    <title><?= RHtml::encode(Rays::app()->client()->getHeaderTitle()) ?></title>
    <?php $baseDir = Rays::baseUrl(); ?>
    <!-- Bootstrap core CSS -->
    <link href="<?= $baseDir ?>/assets/bootstrap3.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?= $baseDir ?>/assets/bootstrap3.0/css/non-responsive.css" rel="stylesheet"/>
    <link href="<?= $baseDir ?>/assets/css/main.css" rel="stylesheet"/>
    <!-- Custom css -->
    <?= RHtml::linkCssArray(Rays::app()->client()->css); ?>

    <script src="<?= $baseDir ?>/assets/js/jquery.min.js"></script>
    <script src="<?= $baseDir ?>/assets/bootstrap3.0/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?=$baseDir?>/assets/js/html5shiv.js"></script>
    <script src="<?=$baseDir?>/assets/js/respond.min.js"></script>
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
            <a class="navbar-brand" href="#"><?=Rays::app()->getName()?></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?=Rays::baseUrl()?>">Home</a></li>
                <li><?=RHtml::linkAction("site","About","about")?></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>

<div id="message" class="container">
    <?= RHtml::showFlashMessages(); ?>
</div>
<!-- /container -->

<div class="container">
    <div id="content">
        <?= isset($content) ? $content : "" ?>
    </div>
</div>
<!-- /container -->

<div id="footer" class="container">
    <hr>
    Copyright &copy; Raysmond 2011-2013. All Right Reserved.
    <span style="float: right;">Theme based on <a href="http://getbootstrap.com/">Bootstrap</a> and powered by <a href="https://github.com/Raysmond/Rays">Rays</a></span>
</div>

<!-- Placed at the end of the document so the pages load faster -->
<!-- Custom JavaScript  -->
<?= RHtml::linkScriptArray(Rays::app()->client()->script); ?>
</body>
</html>