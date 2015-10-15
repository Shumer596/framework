<?php
class Core_Model_Resource
{
    private $_connect;
    private $_config;

    public function __construct()
    {
        /* return Zend_Db_Adapter_Pdo_Mysql */

        $this->_config = Zend_Json::decode(file_get_contents('app/config/local.json'));

        $this->_connect = new Zend_Db_Adapter_Pdo_Mysql(new Zend_Config(self::_getConfig('db')));

    }

    protected  function _getConfig($param = null)
    {

        return $param ? $this->_config['config'][$param] : $this->_config['config'];

    }


    public  function select()
    {
        /* return Zend_Db_Select */
        return new Zend_Db_Select($this->_connect);
    }

    public function getConnection()
    {

        return $this->_connect;
    }

}