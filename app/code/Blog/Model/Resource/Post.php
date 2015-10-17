<?php

class Blog_Model_Resource_Post extends Core_Model_Resource_Abstract
{

    protected function _init($tableName, $idField)
    {
        $this->_tableName = $tableName;
        $this->_idField = $idField;
        return $this;
    }

    public function __construct()
    {
        $this->_init('blog_post', 'id');
        return $this;
    }
}