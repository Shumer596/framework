<?php
ini_set('display_errors',1);
require_once 'app/App.php';
App::run();

/* @var $db Zend_Db_Adapter_Pdo_Mysql */
$db = App::registry('write_connection');
var_dump(App::getSingleton('core/request'));
var_dump(App::getSingleton('core/request'));
$select = new Zend_Db_Select($db);

$select->from('blog_post');
$result = $db->query($select);
var_dump($result->fetchAll());
//$connect = App::getModel('core/resource');

