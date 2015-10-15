<?php
ini_set('display_errors',1);
require_once 'app/App.php';
App::run();

/* @var $db Zend_Db_Adapter_Pdo_Mysql */
//$db = App::registry('write_connection');

//$select = new Zend_Db_Select($db);

//$select->from('blog_post');
//$result = $db->query($select);
////var_dump($result->fetchAll());

$connect = App::getSingleton('core/resource');
$db = $connect->getConnection();
//var_dump($db);
$select = $connect->select();
//var_dump($select);

$select->from('blog_post');
$result = $db->query($select);
var_dump($result->fetchAll());