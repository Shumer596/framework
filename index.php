<?php
ini_set('display_errors',1);
require_once 'app/App.php';
App::run();



$connect = App::getSingleton('core/resource');
$db = $connect->getConnect();
//var_dump($db);
$select = $connect->select();
//var_dump($select);

$select->from('blog_post');
$result = $db->query($select);
var_dump($result->fetchAll());

$a = App::getConfig()->getNode('db');
