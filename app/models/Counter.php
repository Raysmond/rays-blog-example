<?php
/**
 * Counter model
 *
 * @author: Raysmond
 * @created: 2014-01-11
 */

class Counter extends RModel
{
    public $post;
    public $type;
    public $id, $dayCount, $totalCount, $typeId, $postId, $timestamp;

    public static $table = "counter";
    public static $mapping = array(
        "id" => 'cid',
        "dayCount" => 'daycount',
        "totalCount" => 'totalcount',
        "postId" => 'post_pid',
        "typeId" => 'type_tid',
        "timestamp" => 'timestamp',
    );

    public static $relation = array(
        "post" => array("Post", "[postId]=[Post.id]"),
        "type" => array("Type", "[typeId]=[Type.id]")
    );

    public static function increaseCounter($typeId, $postId)
    {
        $counter = Counter::find(array("typeId", $typeId, "postId", $postId))->first();
        if ($counter !== null) {
            $now = date("Y-m-d 00:00:00");
            if ($counter->timestamp < $now)
                $counter->dayCount = 1;
            else
                $counter->dayCount++;
            $counter->totalCount++;
            $counter->timestamp = date("Y-m-d H:i:s");
            $counter->save();
        } else if (Post::get($postId) !== null) {
            $counter = new Counter(array(
                "dayCount" => 1,
                "totalCount" => 1,
                "typeId" => $typeId,
                "postId" => $postId,
                "timestamp" => date("Y-m-d H:i:s")
            ));
            $counter->save();
            return $counter;
        }
    }

}