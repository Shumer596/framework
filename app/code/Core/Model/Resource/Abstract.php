<?php
abstract class Core_Model_Resource_Abstract extends CObject
{
    abstract protected function _init($tableName, $idField);

    public function load($id, $column = null)
    {

    }

    public function save()
    {
        /* TODO*/
    }

    public function delete()
    {
        /* TODO*/
    }
    
    protected function _getConnection()
    {

    }
}