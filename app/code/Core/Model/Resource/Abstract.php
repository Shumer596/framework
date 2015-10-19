<?php

abstract class Core_Model_Resource_Abstract extends CObject
{
    protected $_tableName = null;
    protected $_idField = null;

    protected function _init($tableName, $idField)
    {
        $this->_tableName = $tableName;
        $this->_idField = $idField;
        return $this;
    }

    public function getConnection()
    {
        return App::getSingleton('core/resource');
    }

    public function getTable()
    {
        return $this->_tableName;
    }

    public function getIdField()
    {
        return $this->_idField;
    }

    public function load(Core_Model_Abstract $object, $value, $field = null)
    {
        /* @var $select Zend_Db_Select */
        $select = $this->getConnection()->getConnect()->select();

        $select->from($this->getTable())
            ->where($field ? $field : $this->getIdField() . '=?', $value);
        $stmt = $this->getConnection()->getConnect()->query($select);

        $object->setData($stmt->fetch());

        return $this;
    }

    public function save(Core_Model_Abstract $object)
    {
        /* @var $mysql Zend_Db_Adapter_Pdo_Mysql */
        $mysql = $this->getConnection()->getConnect();
        $id= $object->getId();
        $idField = $this->getIdField();
        $where = $idField . '=' .$id;
        $mysql->update($this->getTable(),$object->getData(),$where);
    }

    public function delete(Core_Model_Abstract $object)
    {
        /* TODO*/
    }

    protected function _getConnection()
    {

    }

}