<?php

// объявляем нужные константы
define('APPLICATION_PATH', realpath('app'));
define('LIBRARY_PATH', realpath('lib'));

$paths = array(APPLICATION_PATH,LIBRARY_PATH);

set_include_path(implode($paths,PATH_SEPARATOR));

require_once 'Autoload/Autoload_Autoloader.php';

// регистрируем наш автолоадер
spl_autoload_register(array('Autoload_Autoloader', 'autoload'));

$b = new Hello();
$b->bla();

?>