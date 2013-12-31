<?php
/**
 * Post model
 *
 * @author: Raysmond
 * @created: 2014-01-01
 */

class Post extends RModel
{
    public $user;
    public $type;
    public $id, $uid, $typeId, $title, $content, $summary, $createTime, $updateTime, $status;

    public static $table = "post";
    public static $primary_key = "id";

    public static $protected = array("id", "uid", "createdTime");

    public static $mapping = array(
        'id' => 'pid',
        'uid' => 'uid',
        'typeId' => 'type_id',
        'title' => 'title',
        'content' => 'content',
        'summary' => 'summary',
        'createTime' => 'create_time',
        'updateTime' => 'update_time',
        'status' => 'status',
    );

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    public static $relation = array(
        'user' => array('User', "[uid] = [User.id]"),
        'type' => array('Type', "[typeId] = [Type.id]"),
    );

    public static $rules = array(
        'uid' => array("label" => "Author ID", "rules" => "trim|required|number"),
        "title" => array("label" => "Title", "rules" => "trim|required|min_length[5]|max_length[255]"),
        "content" => array("label" => "Content", "rules" => "trim|required|max_length[65535]")
    );
} 