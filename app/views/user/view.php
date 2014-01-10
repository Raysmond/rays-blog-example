<div class="page-header"><h1><?= $user->name ?></h1></div>
<?php
if (Rays::isLogin() && Rays::user()->id === $user->id || Rays::user()->role === User::ADMIN) {
    $self->renderPartial("_user_nav", array("user" => $user, "active" => "profile"));
}
?>
<div class="user-info">
    <?php
    foreach (User::$mapping as $col) {
        if (!in_array($col, array("id", "status", "password")) && isset($user->$col)) {
            echo $user->$col . "<br/>";
        }
    }
    ?>
</div>