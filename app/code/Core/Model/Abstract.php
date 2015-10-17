<?php
abstract class Core_Model_Abstract extends CObject
{
    protected $_resource = null;
    protected $_IdField = null;
    private $_originalData;

    protected function _init($resourceName, $id)
    {
        $this->_resource = App::getResourceModel($resourceName);
        $this->_IdField = $id;
        return $this;
    }

    protected function _loadBefore()
    {
        return $this;
    }

    /**
     * @return $this
     */
    protected function _loadAfter()
    {
        $this->_originalData = $this->getData();
        return $this;
    }

    /**
     * @return Core_Model_Resource_Abstract
     */
    public function getResourceModel()
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
        $this->_loadBefore();
        $this->getResourceModel()->load($this, $id, $field);
        $this->_loadAfter();
        return $this;
    }

    public function getId()
    {
        return $this->getData($this->_IdField);
    }

    public function save()
    {
        if($this->_loadAfter() == $this->_loadBefore()) {
            return $this;
        }else{
            $this->getResourceModel()->save($this);
        }

    }




}