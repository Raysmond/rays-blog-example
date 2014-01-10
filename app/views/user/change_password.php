<div class="page-header"><h1><?= $user->name ?></h1></div>
<?php $self->renderPartial("_user_nav", array("user" => $user, "active" => "changePassword")); ?>

<?php
if (isset($errors)) {
    RHtml::showValidationErrors($errors);
}
?>
<?= RForm::openForm("user/changePassword") ?>
<?= RForm::label("Old password") ?>
<?=
RForm::input(array(
    "name" => "old-password",
    "type" => "password",
    "class" => "form-control")) ?>

<?= RForm::label("New password") ?>
<?=
RForm::input(array(
    "name" => "new-password",
    "type" => "password",
    "class" => "form-control")) ?>

<?= RForm::label("New password confirm") ?>
<?=
RForm::input(array(
    "name" => "new-password-confirm",
    "type" => "password",
    "class" => "form-control")) ?>

<br/>
<?= RForm::input(array("type" => "submit", "value" => "Save", "class" => "btn btn-info")) ?>

<?= RForm::endForm() ?>