<?php
abstract class Core_Model_Resource_Abstract extends CObject
{
    abstract function load($id, $field = null);
    abstract function save();
    abstract function delete();

    protected function _getConnection()
    {
        return App::registry('db_connection');
    }
}