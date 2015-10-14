<?php
class Core_Model_Resource
{
    protected $_connect = null;

    public function getConnection()
    {
        /* return Zend_Db_Adapter_Pdo_Mysql */
        $this->_connect = App::registry('write_connection');
        return $this->_connect;
    }

    public  function select()
    {
        /* return Zend_Db_Select */
        return  Zend_Db_Select();
    }

    public function setConnection()
    {
        $_connect = Zend_Db_Adapter_Pdo_Mysql();
    }


}