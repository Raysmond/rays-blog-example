<?php
/**
 * Article model
 *
 * @author: Raysmond
 * @created: 2014-01-01
 */

class Article extends Post{
    public $typeId = Article::TYPE_ARTICLE;

    const TYPE_ARTICLE = 2;
} 