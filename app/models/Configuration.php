<?php
/**
 * Configuration
 *
 * @author: Raysmond
 * @created: 2014-01-02
 */

class Configuration
{
    private $_data;

    const CONFIG_KEY = "site_configuration";

    public static $configuration = null;

    public static function getConfiguration()
    {
        if (null === self::$configuration) {
            self::$configuration = new Configuration();
            self::$configuration->load();
        }
        return self::$configuration;
    }

    public function load()
    {
        $config = Variable::get(Configuration::CONFIG_KEY);
        $this->_data = $config !== null ? $config->value : array();
    }

    public function save()
    {
        $config = Variable::get(Configuration::CONFIG_KEY);
        if ($config === null)
            $config = new Variable(array("value" => $this->_data));
        else
            $config->value = array_merge_recursive($config->value, $this->_data);

        return $config->save();
    }

    public function getConfig($key = null)
    {
        if (isset($this->_data)) {
            if ($key !== null)
                return isset($this->_data[$key]) ? $this->_data[$key] : null;
            return $this->_data;
        }
    }
} 