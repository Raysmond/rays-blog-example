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
    public $id, $uid, $typeId, $title, $content, $summary, $contentType, $createTime, $updateTime, $status;

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
        'contentType' => 'content_type',
        'createTime' => 'create_time',
        'updateTime' => 'update_time',
        'status' => 'status',
    );

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    const TYPE_HTML = "html";
    const TYPE_MARKDOWN = "markdown";

    public static $relation = array(
        'user' => array('User', "[uid] = [User.id]"),
        'type' => array('Type', "[typeId] = [Type.id]"),
    );

    public static $rules = array(
        'uid' => array("label" => "Author ID", "rules" => "trim|required|number"),
        'typeId' => array("label" => "Type ID", "rules" => "trim|required|number"),
        "title" => array("label" => "Title", "rules" => "trim|required|min_length[5]|max_length[255]"),
        "content" => array("label" => "Content", "rules" => "trim|required|max_length[65535]"),
        "createTime" => array("label" => "Create time", "rules" => "trim|required"),
        "updateTime" => array("type" => "update", "label" => "Update time", "rules" => "trim|required"),
    );

    public function parseContent()
    {
        if ($this->contentType === self::TYPE_MARKDOWN) {
            Rays::import("application.extensions.markdown.MarkDownUtil");
            $this->content = MarkDownUtil::parseText($this->content);
        }
        return $this->content;
    }
} 