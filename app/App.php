<?php
final class App
{
    static private $_registry;

    /**
     * @return Zend_Config
     */
    protected static function _getConfig()
    {
        return new Zend_Config(array(
            'host' => '127.0.0.1',
            'username' => 'vagrant',
            'password' => 'vaimo123',
            'dbname' => 'zf'
        ));
    }
    protected static function _initConnection()
    {
        self::register('write_connection', new Zend_Db_Adapter_Pdo_Mysql(self::_getConfig()));
    }

    /**
     * @param $key
     * @return mixed
     */
    private function _getRegistry($key)
    {
        return $this->_registry[$key];
    }


    public static function register($key, $value)
    {
        if (isset(self::$_registry[$key])) {
            throw new Exception('Registry key "'.$key.'" already exists');
        }
        self::$_registry[$key] = $value;
    }
    /**
     * @param $key
     * @return mixed
     */
    public static function registry($key)
    {
        if (isset(self::$_registry[$key])) {
            return self::$_registry[$key];
        }
        return null;
    }

    public static function core()
    {

    }

    public static function getModel($path)
    {
        /* return object of that class */
    }

    public static  function getRouter()
    {
        include 'Core/Controller/Router.php';
        Core_Controller_Router::dispatch();
    }

    public static function run($scope = null)
    {
        define('APPLICATION_PATH', realpath('app'));
        define('LIBRARY_PATH', realpath('lib'));

        $paths = array(APPLICATION_PATH,LIBRARY_PATH);

        set_include_path(implode($paths,PATH_SEPARATOR));

        // var_dump(get_include_path());die;

        require_once 'Autoload/Autoload_Autoloader.php';

        spl_autoload_register(array('Autoload_Autoloader', 'autoload'));
        self::getRouter();
        self::_initConnection();
        
        

    }
}