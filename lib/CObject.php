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
$basa = new CObject();
echo "<pre>";
$basa->setCustomerName('Artem');
$basa->setCustomerLastname('Kozhuh');
$basa->setCustomerAge('26');


print_r ($basa->getCustomerName());
echo "</pre>";
echo "<br />";
// $basa->setCustomerName();

