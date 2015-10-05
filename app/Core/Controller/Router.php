<?php
class Core_Controller_Router
{
 public static function dispatch()
 	{
 		$uri = explode('/', $_SERVER['REQUEST_URI']);

 		$controller_name = 'Index';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// get controller's name
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// get action name
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		$controller_name = 	$controller_name . 'Controller';
		$action_name  	 = 	$action_name . 'Action';

		var_dump($controller_name);
		echo "<br />";
		var_dump($action_name);

		$controller_file = $controller_name.'.php';
		$controller_path = 'app/Core/controllers/'.$controller_file;
		if(file_exists($controller_path))
		{
			include 'app/Core/controllers/'.$controller_file;
		}
		else
		{
			Core_Controller_Router::ErrorPage404($controller_path);
		}


   		
	}

	static function ErrorPage404($param)
	{
        echo "not found -> $param";
    }

}