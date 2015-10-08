<?php
ini_set('display_errors',1);
require_once 'app/App.php';
App::run();

/* @var $db Zend_Db_Adapter_Pdo_Mysql */
$db = App::registry('write_connection');

$select = new Zend_Db_Select($db);

//var_dump(App::getRequest());
// var_dump($select);
