<div class="page-header"><h1><?= $user->name ?></h1></div>
<?php $self->renderPartial("_user_nav", array("user" => $user, "active" => "edit")); ?>

<?= RForm::openForm("user/edit/{$user->id}") ?>
<?= RForm::label("User name") ?>
<?= RForm::input(array(
    "name" => "name",
    "disabled" => true,
    "class" => "form-control",
    "value" => $user->name)) ?>

<?= RForm::label("Email") ?>
<?= RForm::input(array(
    "name" => "email",
    "disabled" => true,
    "class" => "form-control",
    "value" => $user->email)) ?>

    <br/>
<?= RForm::input(array("type" => "submit", "value" => "Save", "class" => "btn btn-info")) ?>

<?= RForm::endForm() ?>