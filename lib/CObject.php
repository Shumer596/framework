<?php
class CObject
{
    protected $_data = array();

    public function getData($key = NULL)
    {
        if (isset($this->_data[$key])) {

            return $this->_data[$key];

        } else
            return $this->_data;
    }

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
     * @param $name mixed
     * @param $args array
     * @return array
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
                echo "wrong method's!!";
                break;
        }
    }

}


