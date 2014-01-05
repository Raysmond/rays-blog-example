<?php $self->setHeaderTitle($post->title); ?>
<div class="page-header"><h1><?= $post->title ?></h1></div>
<div class="post-meta">
    <?= RHtml::linkAction("user", $post->user->name, "view", $post->user->id) ?> post at <?= $post->createTime ?>
</div>
<div class="post-content">
    <?= $post->parseContent() ?>
</div>

<div class="clearfix"></div>
<div class="post-actions">
    <?php
    if (Rays::isLogin() && (Rays::user()->id == $post->uid || Rays::user()->role == "admin")) {
        echo "Actions &nbsp;";
        echo RHtml::linkAction("post", "Edit", "edit", $post->id);
    }
    ?>
</div>
