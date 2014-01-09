<?php
/**
 * Application configuration
 *
 * @author: Raysmond
 * @created: 2013-12-19
 */

return array(
    'baseDir' => dirname(__FILE__),
    'basePath' => "/Raysmond",
    'name' => 'Raysmond',
    'layout' => 'index',
    'isCleanUrl' => true,
    'defaultController' => 'site',
    'defaultAction' => 'index',
    'exceptionAction' => 'site/exception',
    'debug' => true,

    'authProvider' => 'User',

    'db' => array(
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'db_name' => 'raysmond',
        'table_prefix' => 'rays_',
        'charset' => 'utf8',
    ),

    'route' => array(
        'contact' => 'site/contact',
    ),

    'cache' => array(
        'cache_dir' => '/cache',
        'cache_prefix' => "cache_",
        'cache_time' => 3600, //seconds
    )
);
