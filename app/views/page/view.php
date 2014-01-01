<?php $self->setHeaderTitle($page->title); ?>

<h1><?= RHtml::encode($page->title) ?></h1>
<div class="page-meta">
    <?= $page->createTime ?>
</div>
<div class="page-content">
    <?= $page->content ?>
</div>