<?php
class Core_Controller_Router
{
 public static function dispatch()

 	{
	$f = preg_split("[/]", $_SERVER['PATH_INFO'], -1, PREG_SPLIT_NO_EMPTY);
	echo "<pre>";
	print_r($f);
	for ($i=0; $i <3 ; $i++) { 
		array_shift($f);
	}
	print_r($f);
   	$b = array();

   	$array =$f;
	$result = array();
	while ( $array ) {
    	$name = array_shift( $array );
    	$value = array_shift( $array );
    	$result[$name] = $value;
}

var_export( $result );
	
	// static function ErrorPage404($param)
	// {
 //        echo "not found -> $param";
 //      }
      
	}
}