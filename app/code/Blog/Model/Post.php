<?php
class Blog_Model_Post extends Core_Model_Abstract
{
    public function __construct()
    {
        $this->_init('blog/post', 'id');
    }
}