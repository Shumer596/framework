<?php
abstract class Core_Model_Resource_Abstract extends CObject
{
    protected $_tableName = null;
    protected $_idField = null;

    abstract protected function _init($tableName, $idField);

    public static function load($id, $column = null)
    {
        $connect = App::getSingleton('core/resource');
        $select  = $connect->select();
        $select->from('blog_post')->where($id);
        var_dump($b);

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

    }

}