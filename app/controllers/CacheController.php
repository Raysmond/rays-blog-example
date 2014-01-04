<?php
/**
 * CacheController
 *
 * @author: Raysmond
 * @created: 2014-01-04
 * Time: AM9:17
 */

class CacheController extends RController
{

    public $access = array(User::ADMIN => array("clearAll"));

    /**
     * Clear all cache
     */
    public function actionClearAll()
    {
        $config = Rays::app()->getConfig("cache");
        if ($config !== null && isset($config["cache_dir"])) {
            $cacheDir = Rays::app()->getBaseDir() . $config["cache_dir"];
            $this->deleteDir($cacheDir);
        }
        $this->redirect(Rays::baseUrl());
    }

    /**
     * Delete directory recursively
     * @param $dir
     */
    private function deleteDir($dir)
    {
        $files = glob($dir . "/*"); // get all file names
        foreach ($files as $file) { // iterate files
            if ($file === "." || $file === "..") continue;
            if (is_file($file))
                unlink($file); // delete file
            else if (is_dir($file))
                $this->deleteDir($file);
        }
    }
} 