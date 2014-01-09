<?php if (isset($errors)) {
    RHtml::showValidationErrors($errors);
} ?>

    <h1>New page</h1>
<?php $self->setHeaderTitle("New page"); ?>

<?= RForm::openForm("page/new", array('class' => 'form')) ?>
<?= RForm::input(array('name' => 'title', "class" => 'form-control', 'placeholder' => 'Page title')) ?>
<?= RForm::textarea(array("name" => 'content', "class" => 'form-control', "placeholder" => 'Page content', 'style' => 'height: 300px;')) ?>
<?= RForm::label("Custom url alias", "custom_url_alias") ?>
<?= RForm::input(array("name" => "custom_url_alias", "class" => 'form-control', "placeholder" => 'Internal url (leave blank to use the default URL)')) ?>
<?= RForm::input(array('type' => 'submit', 'value' => 'Save', 'class' => 'btn btn-info')) ?>

<?= RForm::endForm() ?>