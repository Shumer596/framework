<?php
abstract class Core_Model_Abstract extends CObject
{
    protected $_resource = null;

    protected function _init($resourceName)
    {
        $this->_resource = App::getResourceModel($resourceName);
    }
    protected function _getResource()
    {
        return $this->_resource;
    }

    protected function load()
    {

    }

}