<ul class="nav nav-tabs">
    <li class="<?= ((isset($active) && $active === "profile") ? "active" : "") ?>"><?= RHtml::linkAction("user", "Profile", "view", $user->id) ?></li>
    <li class="<?= ((isset($active) && $active === "edit") ? "active" : "") ?>"><?= RHtml::linkAction("user", "Edit", "edit", $user->id) ?></li>
    <li class="<?= ((isset($active) && $active === "changePassword") ? "active" : "") ?>"><?= RHtml::linkAction("user", "Change password", "changePassword", $user->id) ?></li>
</ul>