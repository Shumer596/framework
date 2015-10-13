<?php
ini_set('display_errors',1);
require_once 'app/App.php';
App::run();

/* @var $db Zend_Db_Adapter_Pdo_Mysql */
$db = App::registry('write_connection');

$select = new Zend_Db_Select($db);

//var_dump(App::getRequest());die;
//$connect = App::getModel('core/resource');
//$v= $connect->getReadConnection();

// var_dump($select);
