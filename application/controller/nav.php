<?php

/*
 | Nav Class Controller
 */

class Nav extends Controller
{

	public function index()
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Nav, using the method index().';

        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $nav_model = $this->loadModel('NavModel');
        $nav = $nav_model->displayNav();
		
        require 'application/views/nav/index.php';
    }
	


}// x