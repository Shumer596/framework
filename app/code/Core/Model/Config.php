<?php
class Core_Model_Config
{
    private $_config;

    public function __construct()
    {

        $this->_config = Zend_Json::decode(file_get_contents('app/config/local.json'));

    }

    public  function _getConfig($param = null)
    {

        return $param ? $this->_config['config'][$param] : $this->_config['config'];

    }

}