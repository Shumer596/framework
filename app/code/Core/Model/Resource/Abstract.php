<?php
abstract class Core_Model_Resource_Abstract extends CObject
{
    protected $_tableName = null;
    protected $_idField = null;

    abstract protected function _init($tableName, $idField);

    public function load($id, $column = null)
    {

    }

    public function save(Core_Model_Abstract $object)
    {
        /* TODO*/
    }

    public function delete(Core_Model_Abstract $object)
    {
        /* TODO*/
    }
    
    protected function _getConnection()
    {
        /*TODO*/
    }
}