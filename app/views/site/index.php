<!--<div class="page-header"><h1>Welcome to Raysmond website!</h1></div>-->
<div class="raysmond">
    <?= RHtml::image("assets/images/raysmond.jpg", "Raysmond") ?>
    <h1><span>Raysmond</span></h1>

    <div class="about">
        <?= isset($intro) ? $intro->content : "" ?>
    </div>
</div>
