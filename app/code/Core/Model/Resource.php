<?php
class Core_Model_Resource
{
    private $_connect;
    private $_config;

    public function __construct()
    {
        /* return Zend_Db_Adapter_Pdo_Mysql */

        $this->_config = App::getConfig();
        $this->_connect = new Zend_Db_Adapter_Pdo_Mysql(new Zend_Config($this->_config->_getConfig('db')));

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