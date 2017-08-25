<?php
namespace core;

class SimpleConfig
{
    //This file should be in core folder
    const CONFIG_FILE_NAME = 'Configs.php';

    protected static $_instance = null;
    protected static $_configFile = '';
    protected $_values = array();

    protected function __construct()
    {
        $this->loadConfig();
        $values = include(self::$_configFile);

        if (is_array($values)) {
            $this->_values = &$values;
        }
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            $c = __CLASS__;
            self::$_instance = new $c;
        }

        return self::$_instance;
    }

    public function loadConfig()
    {
        self::$_configFile = (self::CONFIG_FILE_NAME);
    }

    public function get($key)
    {
        return $this->_values[$key];
    }

}