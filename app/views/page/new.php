<h1>New page</h1>
<?php $self->setHeaderTitle("New page"); ?>
<?= RForm::openForm("page/new", array('class' => 'form')) ?>
<?= RForm::input(array('name' => 'title', "class" => 'form-control', 'placeholder' => 'Page title')) ?>
<?= RForm::textarea(array("name" => 'content', "class" => 'form-control', "placeholder" => 'Page content','style'=>'height: 300px;')) ?>
<?= RForm::input(array('type' => 'submit', 'value' => 'Save', 'class' => 'btn btn-info')) ?>
<?= RForm::endForm() ?>