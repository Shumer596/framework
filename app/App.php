<?php
define('APPLICATION_PATH', realpath('app/code'));
define('LIBRARY_PATH', realpath('lib'));
define('DS', DIRECTORY_SEPARATOR);

$paths = array(APPLICATION_PATH, LIBRARY_PATH);

set_include_path(implode($paths, PATH_SEPARATOR));

require_once 'Autoload/Autoloader.php';

Autoload_Autoloader::register();

final class App
{
    static private $_registry;

    static private $_request;

    static private $_config;

    static private $_response;

    static private $_instance;

    private function __construct()
    {
    } // pattern Singleton defense from copy

    private function __clone()
    {
    } // pattern Singleton defense from copy

    private function __wakeup()
    {
    } // pattern Singleton defense from copy


    /**
     * @param $key
     * @param $value
     * @throws Exception
     */
    public static function register($key, $value)
    {
        if (isset(self::$_registry[$key])) {
            throw new Exception('Registry key "' . $key . '" already exists');
        }
        self::$_registry[$key] = $value;
    }

    /**
     * @return Zend_Config
     */
    public static function getConfig()
    {

        return self::$_config;

    }

    protected static function _initApplication()
    {
        self::$_request = new Core_Model_Request();

        self::$_config = new Core_Model_Config();

        /* todo add something here later */
    }

    public static function core()
    {

    }

    /**
     * @param $path
     * @return Core_Model_Resource
     * @throws Exception
     */
    public static function getSingleton($path)
    {
        $request = array();

        if (isset($path)) {
            $request = preg_split("[/]", $path, -1, PREG_SPLIT_NO_EMPTY);
        } else {
            throw new Exception('Does not exist' . $path . 'in App::getSingleton()');
        }

        $module = $request[0];
        $resource = $request[1];

        $class_name = ucwords($module) . '_Model_' . ucwords($resource);

        if (!isset(self::$_instance[$path])) {
            self::$_instance[$path] = new $class_name;
        }

        return self::$_instance[$path];
    }

    /**
     * @param $path
     * @return object
     * @throws Exception
     */
    public static function getModel($path)
    {
        /* return object of that class */
        $request = array();
        if (isset($path)) {
            $request = preg_split("[/]", $path, -1, PREG_SPLIT_NO_EMPTY);
        } else {
            throw new Exception('Does not exist' . $path . 'in App::getModel()');
        }

        $module = $request[0];
        $resource = $request[1];

        $class_name = ucwords($module) . '_Model_' . ucwords($resource);
        return new $class_name;
    }

    /**
     * @param $path
     * @return object
     * @throws Exception
     */
    public static function getResourceModel($path)
    {
        // return new {Moduel}_Model_Resource_{Name}
        $request = array();
        if (isset($path)) {
            $request = preg_split("[/]", $path, -1, PREG_SPLIT_NO_EMPTY);
        } else {
            throw new Exception('Does not exist' . $path . 'in App::getResourceModel()');
        }

        $module = $request[0];
        $name = $request[1];

        $class_name = ucwords($module) . '_Model_Resource_' . ucwords($name);
        return new $class_name();
    }

    /**
     * @return Core_Model_Request
     */
    public static function getRequest()
    {
        return self::$_request;

    }

    /**
     * @return Core_Controller_Router
     */
    public static function  getRouter()
    {
        return new Core_Controller_Router();
    }

    /**
     * @param null $scope
     * @throws Exception
     */
    public static function run($scope = null)
    {
        self::_initApplication();
        self::getRouter()->dispatch();
    }
}