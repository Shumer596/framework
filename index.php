<?php

// объявляем нужные константы
define('APPLICATION_PATH', realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'app'));
define('LIBRARY_PATH', realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'lib'));
// добавляем путь к library к indlude path
set_include_path(implode(DIRECTORY_SEPARATOR, array(
            realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'lib'),
            get_include_path()
        )));	
require_once 'Autoload/Autoloader.php';

// регистрируем наш автолоадер
spl_autoload_register(array('Autoload_Autoloader', 'autoload'));
