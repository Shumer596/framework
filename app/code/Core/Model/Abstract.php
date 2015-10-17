<?php
abstract class Core_Model_Abstract extends CObject
{
    protected $_resource = null;
    protected $_primaryIdField = 'id';
    protected $_dataLoaded;


    protected function _init($resourceName)
    {
        $this->_resource = App::getResourceModel($resourceName);
    }


    protected function _getResource()
    {
        return $this->_resource;
    }

    /**
     * @param $id
     * @param null $field
     * @return Core_Model_Abstract
     */
    public function load($id, $field = null)
    {
        /* TODO */
        $this->_getResource()->load($this, $id, $field);

        return $this;
    }

    /**
     * @return string
     */
    public function getPrimaryIdField()
    {
        return $this->_primaryIdField;
    }

    public function setDataLoaded()
    {
      $this->_dataLoaded = $this->getData();
    }





}