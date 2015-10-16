<?php
abstract class Core_Model_Resource_Abstract extends CObject
{
    protected $_tableName = null;
    protected $_idField = null;

    abstract protected function _init($tableName, $idField);

    public static function load(Core_Model_Abstract $object, $value, $field = null)
    {
        $connect = App::getSingleton('core/resource');
        $db = $connect->getConnect();
        $select = $connect->select();
        $select->from('blog_post')->where("$field=?",$value);
        $result= $db->query($select);
        var_dump($result->fetchAll());

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