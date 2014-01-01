<?php
$self->setHeaderTitle("Login"); ?>
<div class="col-lg-4">
    <h1>Login</h1>
    <?php
    if (isset($errors) && !empty($errors)) {
        echo '<div>';
        RHtml::showValidationErrors($errors);
        echo '</div>';
    }
    ?>
    <?= RForm::openForm("user/login", array('class' => 'form')) ?>

    <?= RForm::label("Username", "name") ?>
    <?= RForm::input(array('name' => 'name', "class" => 'form-control'), isset($form) ? $form["name"] : "") ?>

    <br/>

    <?= RForm::label("Password", "password") ?>
    <?= RForm::input(array('type' => "password", "name" => "password", 'class' => 'form-control'), isset($form) ? $form["password"] : "") ?>

    <br/>
    <?= RForm::input(array('type' => 'submit', "value" => 'Login', 'class' => 'btn  btn-default')) ?>

    <?= RForm::endForm() ?>

</div>
