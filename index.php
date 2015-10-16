<?php
ini_set('display_errors',1);
require_once 'app/App.php';
App::run();

$connect = App::getSingleton('core/resource');

$db = $connect->getConnect();
$select = $connect->select();
$s1 =$select->from('blog_post');
$s1->where('id',1);
$result = $db->query($select);
var_dump($result->fetchAll());

//$model = App::getModel('core/resource');
//var_dump($model);






//$model = App::getModel('blog/post')->load(1);
//var_dump($model->getTitle());
//$model->setTitle('fff')->save();
//$anotherModel = App::getModel('blog/post')->load(1);
//var_dump($anotherModel->getTitle());
//$anotherModel->setTitle('aaa')->save();
//$thirdModel = App::getModel('blog/post')->load(1);
//var_dump($thirdModel->getTitle());

//Core_Model_Resource_Abstract::load(1);
