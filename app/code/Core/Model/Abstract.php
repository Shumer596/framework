<?php
abstract class Core_Model_Abstract extends CObject
{
    protected $_resource = null;

    protected function _init($resourceName)
    {
        $this->_resource = App::getModel(/* app/code/module/Model/Resource/name */);
    }
    protected function _getResource()
    {
        /* return Core_Model_Resource_Abstract */
    }
}