<h1>Contact</h1>
<?= RForm::openForm("site/contact", array('class' => 'form', 'style' => 'max-width: 600px;')) ?>
<?= RForm::input(array('name' => 'name', 'class' => 'form-control', 'placeholder' => 'Your name'), isset($form["name"]) ? $form["name"] : "") ?>
<?= RForm::input(array('name' => 'name', 'class' => 'form-control', 'placeholder' => 'Email like name@host.com'), isset($form["email"]) ? $form["email"] : "") ?>
<textarea name="content" cols="70" rows="7" class="form-control"
          placeholder="Content"><?= (isset($form["content"]) ? $form['content'] : "") ?></textarea>

<?= RForm::input(array('type' => 'submit', 'value' => 'Send', 'class' => 'btn btn-info')) ?>
<?= RForm::endForm() ?>