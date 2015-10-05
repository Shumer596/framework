<?php
ini_set('display_errors',1);
require_once 'app/App.php';
require_once 'app/Core/Controller/Router.php';
App::run();
Core_Controller_Router::start();
/* @var $db Zend_Db_Adapter_Pdo_Mysql */
$db = App::registry('write_connection');

$select = new Zend_Db_Select($db);


// var_dump($select);
