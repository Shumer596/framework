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


        if (isset($module))
        {

        }
        else
        {

        }

        if (isset($controller))
        {

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

