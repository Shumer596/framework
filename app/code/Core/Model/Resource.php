<?php
class Core_Model_Resource
{
    /**
     * @var Zend_Db_Adapter_Pdo_Mysql
     */
    private $_connect;

    /**
     *
     */
    public function __construct()
    {
        /* return Zend_Db_Adapter_Pdo_Mysql */
        $this->_connect = new Zend_Db_Adapter_Pdo_Mysql(new Zend_Config(App::getConfig()->getNode('db')));
    }

    /**
     * @return Zend_Db_Select
     */
    public function select()
    {
        return new Zend_Db_Select($this->_connect);
    }

    /**
     * @return Zend_Db_Adapter_Pdo_Mysql
     */
    public function getConnect()
    {
        return $this->_connect;
    }

}