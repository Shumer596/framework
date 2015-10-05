<?php
class Autoload_Autoloader
{

    public static function autoload($class)
    {
        $classFile = str_replace(' ', DIRECTORY_SEPARATOR, ucwords(str_replace('_', ' ', $class)));
        $classFile.= '.php';
        return include $classFile;
    }

}