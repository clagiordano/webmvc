<?php

use webmvc\application\Controller;

class error404Controller Extends Controller {

    public function index() 
    {
        $this->registry->template->heading = 'This is the 404';
        $this->registry->template->show('error404');
    }
}