<?php
class Core_Model_Resource
{
    private $_connect;

    public function __construct()
    {
        /* return Zend_Db_Adapter_Pdo_Mysql */

        $this->_connect = new Zend_Db_Adapter_Pdo_Mysql(new Zend_Config(App::getConfig()->getNode('db')));

    }

    public  function select()
    {
        /* return Zend_Db_Select */
        return new Zend_Db_Select($this->_connect);
    }

    public function getConnect()
    {

        return $this->_connect;
    }

}