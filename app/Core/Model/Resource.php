<?php
class Core_Model_Resource
{
    /**
     * @return object
     */
    public function getReadConnection()
    {
        /* return Zend_Db_Select */
        echo "/* return Zend_Db_Select */";
    }

    public function getWriteConnection()
    {
        /* return Zend_Db_Adapter_Pdo_Mysql */
    }
}