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


     if (isset($controller)) {
      $path_file = 'app/' . $module . '/controllers/' . ucwords($controller) . 'Controller.php';
      if (file_exists($path_file)) {
//            var_dump($path_file);die;
       include $path_file;
      } else {
       echo "file does not exist ->" . $path_file;
      }
     } else {
      return $request;
     }

     $index = new Core_FrontController();
     if(method_exists($index,$action))
     {
       $index->$action();
     }

	}
}

