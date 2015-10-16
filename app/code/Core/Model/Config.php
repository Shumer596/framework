<?php
class Core_Model_Config
{
    private $_config;


    /**
     * @throws Zend_Json_Exception
     */
    public function __construct()
    {
        $this->_config = Zend_Json::decode(file_get_contents('app/config/local.json'));
    }

    /**
     * @param null $key
     * @return mixed
     * @throws Exception
     */
    public  function  getNode($key = null)
    {
        if (isset($this->_config['config']))
        {
            if (isset($this->_config['config'][$key]))
            {
                return $this->_config['config'][$key];
            }
            else
            {
                return $this->_config['config'];
            }
        }
        else
        {
            throw new Exception('Check out the file of config -> app/config/local.json');
        }
    }

}