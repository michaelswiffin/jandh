<?php

/*-
 | Admin Shop Controller
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
	public function products($action='create') {
	
		switch($action) {
			
			case 'create':
				$inc = 'create';
			break;
			case 'read':
				$inc = 'index';
			break;			
			case 'update':
				$inc = 'update';
			break;
			case 'delete':
				$inc = 'delete';
			break;				
		}
		$inc = ($inc != '') ? $inc : 'index';
		require 'application/views/_templates/systemheader.php';
        require 'application/views/system/'. $inc .'.php';
        require 'application/views/_templates/systemfooter.php';
		
	}
 */
class System extends Controller {

    /*
     | Admin Shop index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index() {
		// load the default page of / or home
		$store_model = $this->loadModel('AdminStoreModel');
        $store = $store_model->getAllProducts();
        
        debugger($_GET);
		require 'application/views/_templates/systemheader.php';
        require 'application/views/system/index.php';
        require 'application/views/_templates/systemfooter.php';
    }
	
	
	/*
	 | View the admin pages
	 * CRUD
	 */
	public function pages($action='read', $p1=null) {
		
		$admin_page_model = $this->loadModel('AdminPageModel');
		$affiliate = $admin_page_model->getAffiliateCats();
		/*
		 | SWITCH the incoming action
		 *
		 */
		switch($action) {
			
			case 'create':
				$inc = 'create';
			break;
			case 'read':
				$inc = 'index';
				$pages = $admin_page_model->getAllPages();
				$param = $p1;
			break;			
			case 'update':
				$inc = 'update';
				$data = $admin_page_model->getSpecificPage($p1);
			break;
			case 'delete':
				$inc = 'delete';
				$param = $p1;
			break;			
		}
		
		/*
		 | Set defaults
		 */
		$inc = ($inc != '') ? $inc : 'index';
		
		require 'application/views/_templates/systemheader.php';
        require 'application/views/system/pages/'. $inc .'.php';
        require 'application/views/_templates/systemfooter.php';
		
	}
	
	/*
	 | View the admin products
	 * CRUD
	 */
	public function products($action='read') {
	
		switch($action) {
			
			case 'create':
				$inc = 'create';
			break;
			case 'read':
				$inc = 'index';
			break;			
			case 'update':
				$inc = 'update';
			break;
			case 'delete':
				$inc = 'delete';
			break;			
		}
		
		$inc = ($inc != '') ? $inc : 'index';
		
		require 'application/views/_templates/systemheader.php';
        require 'application/views/system/products/'. $inc .'.php';
        require 'application/views/_templates/systemfooter.php';
		
	}
	
	/*
	 | 
	 *
	 */
	 
	public function imageLibrary($action='read', $p1=null) {
	
		$admin_media_model = $this->loadModel('AdminMediaModel');			
  
		switch($action) {
			
			case 'upload':
				$inc = 'upload';
			break;
			case 'read':
				$imagelist = $admin_media_model->getAllImages();
				$inc = 'index';
			break;			
			case 'update':
				$image = $admin_media_model->getSingleImage($p1);
				$times_used = $admin_media_model->timesUsed($p1);
				$inc = 'update';
			break;
			case 'delete':
				$inc = 'delete';
			break;				
		}
		$inc = ($inc != '') ? $inc : 'index';
		require 'application/views/_templates/systemheader.php';
        require 'application/views/system/images/'. $inc .'.php';
        require 'application/views/_templates/systemfooter.php';
		
	}	
/*-------------------------------------------------------------------
# ORDERS
# -------------------------------------------------------------------
#
#
#
#
#
-------------------------------------------------------------------*/
	public function orders($action='read') {
	
	
		$admin_orders_model = $this->loadModel('AdminOrdersModel');	
		
		switch($action) {
			
			case 'create':
				$inc = 'create';
			break;
			case 'read':
				$orders = $admin_orders_model->getAllOrders();
				$inc = 'index';
			break;			
			case 'update':
				$inc = 'update';
			break;
			case 'delete':
				$inc = 'delete';
			break;				
		}
		$inc = ($inc != '') ? $inc : 'index';
		require 'application/views/_templates/systemheader.php';
        require 'application/views/system/orders/'. $inc .'.php';
        require 'application/views/_templates/systemfooter.php';
		
	}

/*-------------------------------------------------------------------
# CMD - Form control
# -------------------------------------------------------------------
#
#
#
#
#
-------------------------------------------------------------------*/
	 
	 public function cmd() {
		 
		 $admin_page_model = $this->loadModel('AdminPageModel');
		 $admin_media_model = $this->loadModel('AdminMediaModel');
		 
		 switch($_POST['form_id']) {	 
			 /* 
			  | CREATING A PAGE
			  */
			 case 'add_page' :
			 	//echo 'adding';
			 	$admin_page_model->createPage();			 
			 	break;
			 /* 
			  | EDITING A PAGE
			  */
			 case 'edit_page' :
			 	//echo 'editing';
			 	$admin_page_model->updatePage();
			 break;
			 
			 /*
			  | ADDING AN IMAGE
			  */
			  case 'add_image' : 
			  	$admin_media_model->processImageUpload();
			  break;
		 }
	 }

}