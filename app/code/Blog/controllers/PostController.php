<?php
class Blog_PostController extends Core_Controller_Abstract
{
    public function viewAction()
    {
        var_dump(App::getModel('blog/post')->load(1)->getData());
    }
}