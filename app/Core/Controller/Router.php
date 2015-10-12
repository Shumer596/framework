<?php
class Core_Controller_Router
{
 	public static function dispatch()
	{

       $request = App::getRequest();

        $module = $request->getModule();
        $controller = $request->getController();
        $action = $request->getAction();
        $params = $request->getParams();



        if (isset($controller))
        {
          $path_file =$module . '/controllers/' . ucwords($controller) . 'Controller.php';
           if(file_exists($path_file))
           {
            var_dump($path_file);die;
            include $path_file;
           }
           else
           {
            echo "file does not exist ->" . $path_file;
           }
        }
        else
        {

        }







        if (isset($action))
        {

        }
        else
        {

        }





	}
}

