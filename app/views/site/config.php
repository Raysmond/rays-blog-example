<h1>Application configuration</h1>
<?= RForm::openForm("site/config") ?>
<?= RForm::label("Site name", 'site_name') ?>
<?= RForm::input(array('name' => 'site_name', "class" => 'form-control')) ?>

<?= RForm::label("Site email", 'site_email') ?>
<?= RForm::input(array('name' => 'site_email', "class" => 'form-control')) ?>
<br/>
<?=RForm::input(array('type'=>'submit','value'=>'Save configuration','class'=>'btn btn-info'))?>
<?= RForm::endForm() ?>