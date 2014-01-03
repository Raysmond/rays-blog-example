<div class="page-header"><h1>Pages</h1></div>
<?php if (Rays::isLogin() && Rays::user()->role == User::ADMIN) {
    echo RHtml::linkAction("page", "+ New page", "new", null, array('class' => 'btn btn-success btn-sm'));
} ?>
<p>
<ul>
    <?php
    foreach ($pages as $page) {
        echo '<li>';
        echo RHtml::linkAction("page", $page->title, "view", $page->id);
        echo '</li>';
    }
    ?>
</ul>

</p>
