<?php
class Autoload_Autoloader
{
    static protected $_instance = null;

    static public function instance()
    {
        if (!self::$_instance) {
            self::$_instance = new Autoload_Autoloader();
        }
        return self::$_instance;
    }

    /**
     * Register SPL autoload function
     */
    static public function register()
    {
        spl_autoload_register(array(self::instance(), 'autoload'));
    }

    public function autoload($class)
    {
        $classFile = str_replace(' ', DIRECTORY_SEPARATOR, ucwords(str_replace('_', ' ', $class)));
        $classFile.= '.php';
        return include $classFile;
    }

}