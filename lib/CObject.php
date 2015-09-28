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

    public function setData($value,$key = NULL)
    {
        if (isset($key) && $value ){

            $this->_data[$key] = $value;

        } else {

            $this->_data[]=$value;

        }
        return $this;
    }

   

    // protected function _camelCase($name)
    // {
    //     $name = substr($name, 3);
    //     $name = ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $name)), '_');
    //     return $name;
    // }


}
$basa = new CObject();
$basa->setData('Artem','Kozhuh');
$basa->setData('Artem1','Kozhuh1');
$basa->setData('Shumer');
echo "<pre>";
print_r($basa->getData());
var_dump($basa->getData('0'));
echo "</pre>";
