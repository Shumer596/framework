<?php
class Blog_PostController extends Core_Controller_Abstract
{
    public function viewAction()
    {
        var_dump($this->getRequest()->getParam('product'));
    }
}