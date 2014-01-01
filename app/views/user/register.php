<?php
$self->setHeaderTitle("Register"); ?>
<?php
if(isset($errors) && !empty($errors)){
    echo '<div>';
    RHtml::showValidationErrors($errors);
    echo '</div>';
}
?>
<div class="col-lg-4">

    <h1>Register</h1>
    <?=RForm::openForm("user/register",array('class'=>'form'))?>

    <?=RForm::input(array('name'=>'name','class'=>'form-control','placeholder'=>'User name'),isset($form["name"])?$form["name"]:"")?>

    <br/>

    <?=RForm::input(array('name'=>'email','class'=>'form-control','placeholder'=>'Email'),isset($form["email"])?$form["email"]:"")?>

    <br/>

    <?=RForm::input(array('type'=>"password","name"=>"password",'class'=>'form-control','placeholder'=>'Password'),isset($form["password"])?$form["password"]:"")?>

    <br/>

    <?=RForm::input(array('type'=>"password","name"=>"password-confirm",'class'=>'form-control','placeholder'=>'Password confirm'),isset($form["password-confirm"])?$form["password-confirm"]:"")?>

    <br/>

    <?=RForm::input(array('type'=>'submit','value'=>'Register','class'=>'btn btn-default'))?>

    <?=RForm::endForm()?>

</div>