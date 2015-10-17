<?php

class Blog_Model_Resource_Post extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->_init('blog_post', 'id');
    }
}