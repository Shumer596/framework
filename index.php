<?php
ini_set('display_errors',1);
require_once 'app/App.php';
App::run();

/* @var $db Zend_Db_Adapter_Pdo_Mysql */
$db = App::registry('write_connection');
//var_dump(App::getSingleton('core/request'));
$select = new Zend_Db_Select($db);

$a = App::getSingleton('core/request');
$b = App::getSingleton('blog/post');
//var_dump($a);
$a->setSome('thing');
$c = App::getSingleton('core/request');
var_dump(get_class($b),$c->getSome());

$select->from('blog_post');
$result = $db->query($select);
//var_dump($result->fetchAll());
//$connect = App::getModel('core/resource');

