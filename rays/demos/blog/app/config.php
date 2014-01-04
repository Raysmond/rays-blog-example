<?php
/**
 * Application configuration
 *
 * @author: Raysmond
 * @created: 2013-12-19
 */

return array(
    'baseDir' => dirname(__FILE__),
    "basePath" => "/Raysmond/rays/demos/blog",
    'name' => 'Rays blog',
    'layout' => 'index',
    'isCleanUri' => false,
    'defaultController' => 'site',
    'defaultAction' => 'index',
    'exceptionAction' => 'site/exception',
    'debug' => true,

    'authProvider' => 'User',

    'db' => array(
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'db_name' => 'rays_blog',
        'table_prefix' => '',
        'charset' => 'utf8',
    ),

    /*
    'cache' => array(
        'cache_dir' => '/cache',
        'cache_prefix' => "cache_",
        'cache_time' => 1800, //seconds
    )
    */
);
