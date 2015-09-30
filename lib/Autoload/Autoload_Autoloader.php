<?php
class Autoload_Autoloader
{

    public static function autoload($className)
    {
        // все как в ZF, чтобы отыскать класс заменяем в нем
        // '_' на '/'
        $className = str_replace('_', '/', $className);
        $classPath = LIBRARY_PATH . DIRECTORY_SEPARATOR . $className . '.php';
        if (file_exists($classPath) && is_readable($classPath)) {
         // подключаем его, если файл имеется и мы имеем к нему доступ
            require_once $classPath;
        } else {
            //throw new MVC_Exception("Class name '{$className}' not found");
        }
        //echo $classPath;
    }

}