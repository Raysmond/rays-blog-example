<h1>Application configuration</h1>
<?= RForm::openForm("site/config") ?>
<?= RForm::label("Site name", 'site_name') ?>
<?=
RForm::input(array(
    'name' => 'site_name',
    "class" => 'form-control',
    'value' => isset($config["site_name"]) ? $config["site_name"] : ""
)) ?>

<?= RForm::label("Site email", 'site_email') ?>
<?=
RForm::input(array(
    'name' => 'site_email',
    "class" => 'form-control',
    'value' => isset($config["site_email"]) ? $config["site_email"] : ""
)) ?>

<?= RForm::label("About page ID", 'about_page_id') ?>
<?=
RForm::input(array(
    'name' => 'about_page_id',
    "class" => 'form-control',
    'value' => isset($config["about_page_id"]) ? $config["about_page_id"] : ""
)) ?>

<?= RForm::label("Custom routing", 'custom_routing') ?>
<textarea class="form-control" rows="7"
          name="custom_routing"><?= (isset($config["custom_routing"]) ? $config['custom_routing'] : "") ?></textarea>

<br/>

<?= RForm::input(array('type' => 'submit', 'value' => 'Save configuration', 'class' => 'btn btn-info')) ?>
<?= RForm::endForm() ?>

<br/>
<pre>
<?php var_dump($config); ?>
</pre>