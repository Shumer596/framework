<?php
abstract class Core_Controller_Abstract
{
    /**
     * @return Core_Model_Request
     */
    public function getRequest(){

        return App::getRequest();
    }

}