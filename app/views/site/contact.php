<div class="page-header"><h1>Contact</h1></div>
<?php
if (isset($errors)) {
    RHtml::showValidationErrors($errors);
}
?>
<?= RForm::openForm("site/contact", array('class' => 'form', 'style' => 'max-width: 600px;')) ?>
<?= RForm::input(array('name' => 'name', 'class' => 'form-control', 'placeholder' => 'Your name'), isset($form["name"]) ? $form["name"] : "") ?>
<?= RForm::input(array('name' => 'subject', 'class' => 'form-control', 'placeholder' => 'Subject'), isset($form["subject"]) ? $form["subject"] : "") ?>
<?= RForm::input(array('name' => 'email', 'class' => 'form-control', 'placeholder' => 'Email like name@host.com'), isset($form["email"]) ? $form["email"] : "") ?>
<textarea name="content" cols="70" rows="7" class="form-control"
          placeholder="Content"><?= (isset($form["content"]) ? $form['content'] : "") ?></textarea>

<?= RForm::input(array('type' => 'submit', 'value' => 'Send', 'class' => 'btn btn-info')) ?>
<?= RForm::endForm() ?>