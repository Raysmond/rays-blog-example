<div class="page-header"><h1>New post</h1></div>
<?php
if (isset($errors)) {
    RHtml::showValidationErrors($errors);
}
?>
<?php
if (!isset($post)){
    echo RForm::openForm("post/new", array('class'=>'form'));
    $self->setHeaderTitle("New post");
}
else{
    echo RForm::openForm("post/edit/" . $post->id,array('class'=>'form'));
    $self->setHeaderTitle("Edit " . $post->title);
}
?>

<?=(isset($post)? RForm::hidden("id", $post->id) : "")?>

<?= RForm::input(array(
    'name'=>'title',
    'value'=>isset($form['title']) ? $form["title"] : (isset($post) ? $post->title : ""),
    'placeholder'=>'Post title',
    'class'=>'form-control')
) ?>
<?= RForm::label("Content", "content") ?>
<br/>
<textarea style="height: 240px;" name="content" placeholder="Post content" class="form-control"><?= (isset($form["content"]) ? $form["content"] : (isset($post) ? $post->content : "")) ?></textarea>
<input type="submit" value="Save post" class="btn btn-info" />
<?= RForm::endForm() ?>