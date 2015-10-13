<?php
class Core_Controller_Router
{
 	public static function dispatch()
    {

     $request = App::getRequest();

     $module = $request->getModule();
     $controller = $request->getController();
     $action = $request->getAction();
     $action .= 'Action';
     $params = $request->getParams();


     if (isset($controller))
     {
      $path_file = 'app/' . ucwords($module). '/controllers/' . ucwords($controller ) . 'Controller.php';

        if (file_exists($path_file))
        {
         include $path_file;
        }
        else
        {
         echo "file does not exist ->" . $path_file;
        }
     }
     else
     {
      return $request;
     }

     $class_name = ucwords($module). '_IndexController';
     $index = new $class_name;
     if(method_exists($index,$action))
     {
       $index->$action();
     }
     else
     {
       echo "method does not exist {$action}";
     }

	}
}

