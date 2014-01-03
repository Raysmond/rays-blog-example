<div class="page-header"><h1><?= $user->name ?></h1></div>
<div class="user-info">
<?php
foreach(User::$mapping as $col){
    if(!in_array($col, array("id","status","password")) && isset($user->$col)){
        echo $user->$col."<br/>";
    }
}
?>
</div>