<?php
define('APPLICATION_PATH', realpath('app/code'));
define('LIBRARY_PATH', realpath('lib'));
define('DS', DIRECTORY_SEPARATOR);

$paths = array(APPLICATION_PATH,LIBRARY_PATH);

set_include_path(implode($paths,PATH_SEPARATOR));

require_once 'Autoload/Autoloader.php';

Autoload_Autoloader::register();

final class App
{
    static private $_registry;

    static private $_request;

    static private $_config;

    static private $_response;

    /**
     * @return Zend_Config
     */
    protected static function _getConfig($param = null)
    {
        return $param ? self::$_config['config'][$param] : self::$_config['config'];
    }
    protected static function _initConnection()
    {
        self::register('write_connection', new Zend_Db_Adapter_Pdo_Mysql(new Zend_Config(self::_getConfig('db'))));
    }

    protected static function _initApplication()
    {
        self::$_request = new Core_Model_Request();

        self::$_config = Zend_Json::decode(file_get_contents('app/config/local.json'));

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

    public static function getResourceModel($path)
    {
        /* todo */
    }

    public static function getModel($path)
    {
        /* return object of that class */
        $request = preg_split("[/]", $path, -1, PREG_SPLIT_NO_EMPTY);

        $module = $request[0];
        $resource = $request[1];

        $class_name = ucwords($module) . '_Model_' . ucwords($resource);
        return new $class_name;
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