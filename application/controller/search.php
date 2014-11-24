<?php

/*
 | SEARCH CONTROLLER
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */
 class Search extends Controller {
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index() {
		// load the default page of / or home
		$page_name = 'Search';
		$search_model = $this->loadModel('SearchModel');
        
		require 'application/views/_templates/header.php';
        require 'application/views/search/index.php';
        require 'application/views/_templates/footer.php';
    }
    
    /*
     | 
     *
     */
    
    public function searchresults() {
    	
    	$page_name = 'Search Results';
    	
	    $search_model = $this->loadModel('SearchModel');
	    
	    if($_GET['form_id'] == 'qomni') {
			$results = $search_model->SearchDatabase($_GET['q'], 'basic');
		} else {
			$results = $search_model->SearchDatabase($_GET, 'advanced');
		}	
	    
	    
	    require 'application/views/_templates/header.php';
        require 'application/views/search/search.php';
        require 'application/views/_templates/footer.php';
    }
} // end