<?php
/**
 * MarkDown extension
 *
 * @author: Raysmond
 * Date: 2014-01-01
 */

class MarkDownUtil
{
    /**
     * Parse text with markdown syntax to HTML
     */
    public static function parseText($text)
    {
//        Rays::import("application.vendors.php-markdown.Michelf.Markdown_inc");
//        return \Michelf\Markdown::defaultTransform($text);

        Rays::import("application.vendors.php-markdown.Michelf.MarkdownExtra_inc");
        return MarkdownExtra::defaultTransform($text);
    }
} 