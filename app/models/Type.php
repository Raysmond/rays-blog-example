<?php
/**
 * Type model
 *
 * @author: Raysmond
 * @created: 2014-01-01
 */

class Type extends RModel
{
    public $id, $name;

    public $primary_key = "id";
    public $table = "type";

    public $mapping = array(
        'id' => 'tid',
        'name' => 'name'
    );

    public $rules = array(
        'name' => array("label" => "Name", "rules" => "trim|required|max_length[255]")
    );

    // cached "id-to-title" map
    public static $types_map = null;

    public function getTypeName($typeId)
    {
        if (!isset(Type::$types_map)) {
            $types = Type::find()->all();
            Type::$types_map = array();
            foreach ($types as $type) {
                Type::$types_map["id_" . $type->id] = $type->name;
            }
        }
        return isset(Type::$types_map["id_" . $typeId]) ? Type::$types_map["id_" . $typeId] : null;
    }
} 