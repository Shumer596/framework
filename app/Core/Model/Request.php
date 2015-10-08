<?php
class Core_Model_Request extends CObject
{



    /**
     *  @setModule() return module path
     */
    public function __construct()
    {
       $request = preg_split("[/]", $_SERVER['PATH_INFO'], -1, PREG_SPLIT_NO_EMPTY);
        echo "<pre>";

        if(isset($request[0]))
        {
            $this->setModule($request[0]);
        }

        if(isset($request[1]))
        {
            $this->setController($request[1]);
        }

        if(isset($request[2]))
        {
            $this->setAction($request[2]);
        }

        	for ($i=0; $i <3 ; $i++) 
        	{ 
        	   array_shift($request);
        	
         	}

        // get second part of request
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

    	print_r(($this->getData()));
        /* cut your request here */
    }
}