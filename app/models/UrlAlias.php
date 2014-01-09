<?php
/**
 * UrlAlias model
 *
 * @author: Raysmond
 * @created: 2014-01-09
 */

class UrlAlias extends RModel
{
    public $id, $source, $aliasUrl;

    public static $table = "url_alias";
    public static $primary_key = "id";
    public static $mapping = array(
        'id' => 'aid',
        'source' => 'source',
        'aliasUrl' => 'alias_url'
    );

    public static $rules = array(
        'source' => array('label' => 'Url source', "rules" => "trim|required|max_length[255]"),
        'aliasUrl' => array('label' => 'Url alias', "rules" => "trim|required|max_length[255]")
    );

} 