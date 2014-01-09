<?php $self->setHeaderTitle($page->title); ?>

    <div class="page-header"><h1><?= RHtml::encode($page->title) ?></h1></div>
    <div class="page-content">
        <?= $page->content ?>
    </div>
    <div class="page-meta">
        ---------------- <br/>
        Updated at <?= $page->updateTime ?>
    </div>
    <div class="actions">
        <?php
        if (Rays::isLogin() && Rays::user()->role === User::ADMIN) {
            echo "Actions: ";
            echo RHtml::linkAction('page', "Edit", "edit", $page->id);
        }
        ?>
    </div>
<?= $self->renderPartial("_common._duoshuo", null, true) ?>