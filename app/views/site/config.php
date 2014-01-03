<div class="page-header"><h1>Application configuration</h1></div>
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

<?= RForm::label("Front page introduction post id", 'front_page_intro_id') ?>
<?=
RForm::input(array(
    'name' => 'front_page_intro_id',
    "class" => 'form-control',
    'value' => isset($config["front_page_intro_id"]) ? $config["front_page_intro_id"] : ""
)) ?>

<?= RForm::label("About page ID", 'about_page_id') ?>
<?=
RForm::input(array(
    'name' => 'about_page_id',
    "class" => 'form-control',
    'value' => isset($config["about_page_id"]) ? $config["about_page_id"] : ""
)) ?>
<?= RForm::label("Project page ID", 'project_page_id') ?>
<?=
RForm::input(array(
    'name' => 'project_page_id',
    "class" => 'form-control',
    'value' => isset($config["project_page_id"]) ? $config["project_page_id"] : ""
)) ?>
<?= RForm::label("Custom routing", 'custom_routing') ?>
<textarea class="form-control" rows="7"
          name="custom_routing"><?= (isset($config["custom_routing"]) ? $config['custom_routing'] : "") ?></textarea>
<br/>

<h2>Additional configurations</h2>
<a class="btn btn-success btn-sm" style="float: right; margin-bottom: 10px;" href="javascript:addConfig()">+ Add custom configuration</a>
<br/>
<?php
$appConfigs = array("project_page_id", "about_page_id", "front_page_intro_id", "site_name", "site_email", "custom_routing");
echo '<table id="custom_config_table" class="table">';
echo '<thead></thead>';
echo '<tbody>';
if (isset($config)) {
    foreach ($config as $col => $value) {
        if (!in_array($col, $appConfigs)) {
            echo '<tr>';
            echo '<td style="width: 25%;">'.$col.'</td>';
            echo "<td>".RForm::input(array("name" => $col, "value" => $value, "class" => "form-control"))."</td>";
            echo '</tr>';
        }
    }
}
echo '</tbody>';
echo '</table>';
?>
<br/>
<?= RForm::input(array('type' => 'submit', 'value' => 'Save configuration', 'class' => 'btn btn-info')) ?>
<?= RForm::endForm() ?>

<br/>
<pre>
<?php var_dump($config); ?>
</pre>
<script>
    function addConfig() {
        $("#custom_config_table>tbody").append('<tr><td style="width: 25%;"><input class="form-control" name="new_configs_keys[]" placeholder="Key" /></td><td><input name="new_configs_values[]" class="form-control" placeholder="Value" /></td></tr>');
    }
</script>