<?php
class Core_Controller_Router
{
 static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Index';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[2]) )
		{	
			$controller_name = $routes[2];
		}
		
		// получаем имя экшена
		if ( !empty($routes[3]) )
		{
			$action_name = $routes[3];
		}

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = $controller_name.'Controller';
		$action_name = $action_name.'Action';
				
		// подцепляем файл с классом модели (файла модели может и не быть)
		$model_file = $model_name.'.php';
		$model_path = "app/Core/models/".$model_file;
		if(file_exists($model_path))
		{
			include "app/Core/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = $controller_name.'.php';
		// var_dump($controller_file);
		$controller_path = "app/Core/controllers/".$controller_file;
		// var_dump($controller_path);die;
		if(file_exists($controller_path))
		{
			include "app/Core/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Core_Controller_Router::ErrorPage404($controller_path);
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		// var_dump($controller);die;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Core_Controller_Router::ErrorPage404($action);
		}
	
	}
	
	function ErrorPage404($param)
	{
        		echo 'Not found ->'.$param."<br />" ;
   	}
}