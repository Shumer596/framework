<?php
class CObject
{
    /**
     * @var array
     */
    protected $_data = array();

    /**
     * @param null $key
     * @return array
     */
    public function getData($key = NULL)
    {
        if (isset($this->_data[$key])) {

            return $this->_data[$key];

        } else
            return $this->_data;
    }

    /**
     * @param $key
     * @param null $value
     * @return $this
     */
    public function setData($key, $value = NULL)
    {
        if ($key && isset($value)){

            $this->_data[$key] = $value;

        } else {

            $this->_data[]=$key;

        }
        return $this;
    }


    /**
     * @param $name
     * @param $args
     * @return $this|array
     * @throws Exception
     */
    public function __call($name,$args)
    {
        $ind = substr($name,0,3);// search prefix "set", "has" or "get"
        $name = substr($name,3); // another part of method's name to under_score
        $name = ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $name)), '_');
        switch ($ind) {
            case 'has':
                # code...
                break;

            case 'set':
                $this->setData($name,array_shift($args));
                break;

            case 'get':
                return $this->getData($name);
                break;    

            default:
                throw new Exception(sprintf('Method %s does not exist in %s', $name, get_class($this)));
                break;
        }

        return $this;
    }

}


