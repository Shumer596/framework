<?php
class CObject
{
    protected $data = array();

    public function getData($key = NULL)
    {
        if ($key && isset($this->data[$key])) {

            return $this->data[$key];


        } else
            return $this->data;


    }

    public function setData($key, $value)
    {
        if ($key && $value) {
            $this->data[$key] = $value;
        } else {
            return $this;

        }

        return $this;
    }

    public function __call($name, $args)
    {


        switch (substr($name, 0, 3)) {

            case 'set':
                $name = $this->_camelCase($name);
                $this->setData($name, $args[0]);
//                var_dump($this->data);
                return $this;

            case 'get':
                return $this->getData($this->_camelCase($name));

            case 'has':
                $name = $this->_camelCase($name);
                if (array_key_exists($this->_camelCase($name), $this->data)) {
                    return $this;
                } else {
                    return $this;
                }

            case 'uns':
                $name = $this->_camelCase($name);
                if (array_key_exists($this->_camelCase($name), $this->data)) {
                    $this->unsetData($this->data[$name]);
                } else {
                    return $this;
                }


        }

        return $this;
    }

    public function unsetData($var)
    {

        if (isset($this->data[$var])) {
            unset($this->data[$var]);
        } else {
            return $this;
        }

    }


    protected function _camelCase($name)
    {
        $name = substr($name, 3);
        $name = ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $name)), '_');
        return $name;
    }


}


$basa = new CObject();
$basa->setCustomerName('artem','kozhuh');
//$basa->getCustomerName();
var_dump($basa->getData(), $basa->getCustomerName());