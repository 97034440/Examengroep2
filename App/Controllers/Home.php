<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Home as HomeModel;

//Home controller
class Home extends \Core\Controller
{

    public function indexAction()
    {
        View::renderTemplate('Home/index.html');
    }


    public function objectAction()
    {
        

        View::renderTemplate('Home/index.html', [

        	
        ]);
    }
}
