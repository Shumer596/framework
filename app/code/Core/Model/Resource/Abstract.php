<?php
abstract class Core_Model_Resource_Abstract extends CObject
{
    abstract protected function _init($tableName, $idField);

    public function load($id, $column = null)
    {
        /* TODO*/
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
        return App::registry('db_connection');
    }
}