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


$model = App::getModel('blog/post')->load(1);
//var_dump($model->getData());
//var_dump($model->getContent());

$model->setContent('Content was changed')->save();
$model->setAuthor('kozhuh');
////var_dump($model->getContent());
var_dump($model->getData());

//Unit test #1
//$model = App::getModel('blog/post')->load(1);
//var_dump($model->getTitle());
//$model->setTitle('fff')->save();
//$anotherModel = App::getModel('blog/post')->load(1);
//var_dump($anotherModel->getTitle());
//$anotherModel->setTitle('aaa')->save();
//$thirdModel = App::getModel('blog/post')->load(1);
//var_dump($thirdModel->getTitle());

// Unit test #2
//$model = App::getModel('blog/post')->load(1);
//$model->setAuthor('kozhug')->save();
//$modelNew = App::getModel('blog/post');
//$modelNew->setContent('123')->setTitle('111')->save();
