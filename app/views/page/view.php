<?php $self->setHeaderTitle($page->title); ?>

<h1><?= RHtml::encode($page->title) ?></h1>
<div class="page-meta">
    <?= $page->createTime ?>
</div>
<div class="page-content">
    <?php if ($page->contentType === Page::TYPE_MARKDOWN) {
        Rays::import("application.extensions.markdown.MarkDownUtil");
        echo MarkDownUtil::parseText($page->content);
    } else {
        echo $page->content;
    } ?>
</div>
<div class="actions">
    <?php
    if (Rays::isLogin() && Rays::user()->role === User::ADMIN) {
        echo "Actions: ";
        echo RHtml::linkAction('page', "Edit", "edit", $page->id);
    }
    ?>
</div>