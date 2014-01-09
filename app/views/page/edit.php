<?php if (isset($errors)) {
    RHtml::showValidationErrors($errors);
} ?>
<?php $self->setHeaderTitle("Edit " . $page->title); ?>
<?= RForm::openForm("page/edit/{$page->id}", array('class' => 'form')) ?>
<?= RForm::input(array(
    'name' => 'title',
    "class" => 'form-control',
    'placeholder' => 'Page title',
    'value' => isset($form["title"]) ? $form['title'] : $page->title
)) ?>

<?php $pageContent = isset($form["content"]) ? $form['content'] : $page->content; ?>
<?= RForm::textarea(array(
    "name" => 'content',
    "class" => 'form-control',
    "placeholder" => 'Page content',
    'style' => 'height: 300px;',
), $pageContent) ?>
<?= RForm::label("Custom url alias", "custom_url_alias") ?>
<?= RForm::input(array(
    "name" => "custom_url_alias",
    'value' => isset($uri) ? $uri->aliasUrl : "",
    "class" => 'form-control',
    "placeholder" => 'Internal url (leave blank to use the default URL)')) ?>

<?= RForm::input(array('type' => 'submit', 'value' => 'Save', 'class' => 'btn btn-info')) ?>
<?= RForm::endForm() ?>