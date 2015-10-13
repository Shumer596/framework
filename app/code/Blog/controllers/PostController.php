<?php
class Blog_PostController extends Core_Controller_Abstract
{
    public function viewAction()
    {
        echo $this->getRequest()->getParam('id');
    }
}