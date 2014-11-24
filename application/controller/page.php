<?php

/**
 * Class Page
 *
 */
class Page extends Controller {
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index() {
		// load the default page of / or home
		$page_model = $this->loadModel('PageModel');
        $page = $page_model->getPage('/');
        
		require 'application/views/_templates/header.php';
        require 'application/views/page/index.php';
        require 'application/views/_templates/footer.php';
    }
	
	/**
	 * PAGE: ViewPage
	 * Grabs all the data for a single page
	 * @v( Pagename )
	 */

   	public function v($pagename='/') {
				
		$page_model = $this->loadModel('PageModel');
        $page = $page_model->getPage($pagename);

     	//debugger('string printout', 'String');
     	
     	
		require 'application/views/_templates/header.php';
        require 'application/views/page/viewpage.php';
        require 'application/views/_templates/footer.php';
	}

    
}