<?php
class Core_Model_Request extends CObject
{

    public function __construct()
    {
        $request = array();
        if (isset($_SERVER['PATH_INFO']))
        {
            $request = preg_split("[/]", $_SERVER['PATH_INFO'], -1, PREG_SPLIT_NO_EMPTY);
        }


        if(isset($request[0]))
        {
            $this->setModule($request[0]);
        }
        else
        {
            $this->setModule('Cms');
        }

        if(isset($request[1]))
        {
            $this->setController($request[1]);
        }
        else
        {
            $this->setController('index');
        }

        if(isset($request[2]))
        {
            $this->setAction($request[2]);
        }
        else
        {
            $this->setAction('index');
        }

        	for ($i=0; $i <3 ; $i++) 
        	{ 
        	   array_shift($request);
        	
         	}

        // set second part of request
        if (isset($request[0]))
        {
            $array =$request;
            $result = array();
            while ( $array ) {
                $name = array_shift( $array );
                $value = array_shift( $array );
                $result[$name] = $value;
            }

            $this->setParams($result);
        }

    }

    public function getParam($param)
    {
        return $this->getParams()[$param];
    }

}