<?php
$self->setHeaderTitle("Login"); ?>
<div class="page-header"><h1>Login</h1></div>
<?php
if (isset($errors) && !empty($errors)) {
    echo '<div>';
    RHtml::showValidationErrors($errors);
    echo '</div>';
}
?>
<?= RForm::openForm("user/login", array('class' => 'form')) ?>
<?= RForm::input(array('name' => 'name', "class" => 'form-control', "placeholder" => "User name"), isset($form) ? $form["name"] : "") ?>

<?= RForm::input(array('type' => "password", "name" => "password", "placeholder" => "Password", 'class' => 'form-control'), isset($form) ? $form["password"] : "") ?>
<?= RForm::input(array('type' => 'submit', "value" => 'Login', 'class' => 'btn btn-info')) ?>

<?= RForm::endForm() ?>
