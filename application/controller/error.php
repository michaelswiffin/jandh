<?php
include('application/libs/helpers.php');
/**
 * Class Page
 *
 */
class Error extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index()
    {
		// load the default page of / or home
		//$error_model = $this->loadModel('ErrorModel');
        //$error = $error_model->getError();
        
		require 'application/views/error/header.php';
        require 'application/views/error/404.php';
        require 'application/views/error/footer.php';
    }
	
	public function e404(){
		
        require 'application/views/error/404.php';
	}
    
}