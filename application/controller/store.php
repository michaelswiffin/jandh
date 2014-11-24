<?php

/*-
 | Shop Controller
 */
class Store extends Controller {
    /**
     * Shop index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index() {
		// load the default page of / or home
		$store_model = $this->loadModel('StoreModel');
        $store = $store_model->getAllProducts();
        
		require 'application/views/_templates/header.php';
        require 'application/views/store/index.php';
        require 'application/views/_templates/footer.php';
    }
	
	
/*
 | function viewItem(product_name, product_id)
 */

   	public function viewItem($xid) {
		
		$store_model = $this->loadModel('StoreModel');
        $store = $store_model->viewItem($xid);

		/*
		 | Images
		 */
		$images = $store_model->getRelatedImages($store->part_number); 
     	
     	
     	/*
     	 | Related Appliances
     	 */
     	$related_appliances = $store_model->getRelatedProducts($store->appliance);
     	
		require 'application/views/_templates/header.php';
        require 'application/views/store/products.php';
        require 'application/views/_templates/footer.php';
	}
	
/*
 | function viewAllProducts()
 */

   	public function viewStock() {
				
		$store_model = $this->loadModel('StoreModel');
        $store = $store_model->getAllProducts();

     	 
		require 'application/views/_templates/header.php';
        require 'application/views/store/products.php';
        require 'application/views/_templates/footer.php';
	}
    
}