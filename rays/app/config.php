<?php
/**
 * Application configuration
 *
 * @author: Raysmond
 * @created: 2013-12-28
 */

return array(
    "name" => "Rays Framework",
    "baseDir" => dirname(__FILE__),
    "basePath" => "/Raysmond/rays",
    "isCleanUrl" => true,
    "layout" => "index",
    "defaultController" => 'site',
    'isDebug' => true,
    "exceptionAction" => 'site/exception'
);