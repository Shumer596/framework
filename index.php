<?php
ini_set('display_errors',1);
require_once 'app/App.php';
App::run();

//$connect = App::getSingleton('core/resource');
//
//$db = $connect->getConnect();
//$select = $connect->select();
//$select->from('blog_post')->where('id = ?',2);
////$select->where('id = ?',3);
//$result = $db->query($select);
//var_dump($result->fetchAll());

//$model = App::getModel('core/resource');
//var_dump($model);



$model = App::getModel('blog/post')->load(1);
var_dump($model->getContent());



//$model = App::getModel('blog/post')->load(1);
//var_dump($model->getTitle());
//$model->setTitle('fff')->save();
//$anotherModel = App::getModel('blog/post')->load(1);
//var_dump($anotherModel->getTitle());
//$anotherModel->setTitle('aaa')->save();
//$thirdModel = App::getModel('blog/post')->load(1);
//var_dump($thirdModel->getTitle());

//Core_Model_Resource_Abstract::load(App::getModel('blog/post'),2,'id');
