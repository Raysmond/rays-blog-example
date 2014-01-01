<?php
/**
 * Page model
 *
 * @author: Raysmond
 * @created: 2014-01-01
 */

class Page extends Post
{
    public $typeId = Page::TYPE_PAGE;

    const TYPE_PAGE = 1;

    public static function get($pid)
    {
        return Page::find("id", $pid)->where("[typeId]=?", Page::TYPE_PAGE)->first();
    }
} 