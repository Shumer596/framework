<?php
define('APPLICATION_PATH', realpath('app'));
define('LIBRARY_PATH', realpath('lib'));

$paths = array(APPLICATION_PATH,LIBRARY_PATH);

set_include_path(implode($paths,PATH_SEPARATOR));

require_once 'Autoload/Autoloader.php';

Autoload_Autoloader::register();

final class App
{
    static private $_registry;

    static private $_request;

    static private $_response;

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

    protected static function _initApplication()
    {
        self::$_request = new Core_Model_Request();

        /* todo add something here later */
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

    /**
     * @return Core_Model_Request
     */
    public static function getRequest()
    {
        return self::$_request;

    }

    public static function  getRouter()
    {
        return new Core_Controller_Router();
    }

    public static function run($scope = null)
    {
        self::_initApplication();
        self::_initConnection();
        self::getRouter()->dispatch();
    }
}