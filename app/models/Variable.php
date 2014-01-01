<?php
/**
 * Variable model
 *
 * @author: Raysmond
 * @created: 2014-01-01
 */

class Variable extends RModel
{
    public $name, $value;

    public static $primary_key = "name";
    public static $table = "variable";
    public static $mapping = array(
        'name' => 'name',
        "value" => 'value'
    );
    public static $rules = array(
        'name' => array('label' => 'Name', "rules" => "trim|required|max_length[255]"),
        'value' => array('label' => 'Value', "rules" => "required")
    );

    public function save()
    {
        $val = $this->value;
        $this->value = base64_encode(serialize($this->value));
        $result = parent::save();
        $this->value = $val;
        return $result;
    }

    public static function get($id)
    {
        $v = parent::get($id);
        if ($v !== null) {
            $v->value = unserialize(base64_decode($v->value));
        }
        return $v;
    }
} 