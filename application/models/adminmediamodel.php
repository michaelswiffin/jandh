<?php
/*
 | ADMIN MEDIA MODEL
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
 *
 *
 *
 *
 */

class AdminMediaModel { 


 	public $imgPath = 'public/img/';
    /*
     |
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
  	/*
  	 |
     * Get all pages from database
     */
    public function getAllImages()  {
        $sql = "SELECT * FROM imagetable where visible = 1";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    
    /*
     |
     *
     */
    public function getSingleImage($image_id) {
	    
        $sql = "SELECT * FROM imagetable where image_id=:id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id'=>$image_id));

        return $query->fetch();
    }
    
    /*
     |
     *
     */
     public function timesUsed($image_id) {
        $sql = "
        select
            id,
            page_name,
        	count(*) as times
        from
            pagedata
        where
            page_column_one
        regexp('". $image_id ."')
        or
            page_column_two
        regexp('". $image_id ."')"
            ;  
        
        $query = $this->db->prepare($sql);
        $query->execute(array(':id'=>$image_id));

        return $query->fetch();
    
    }
	/*
	 |
	 *
	 */
	 public function processImageUpload() {
	 
	 	foreach($_POST as $key=>$data) {
			$this->$key = $data;
		}
		
		/*
		: IMAGES
		:......................................*/
		if($_FILES['img_upload']['error'] != 4) {

		$handle = new upload($_FILES['img_upload']);
		
		
		
 		if ($handle->uploaded) {
        	$handle->file_new_name_body   =  time();
        	$this->image_id = $handle->file_new_name_body;
        	
       			$handle->image_convert 		  = 'jpg';
        	if($handle->image_src_x > 1024) {
	       		$handle->image_resize         = true;
    	   		$handle->image_x              = 1024;
       			$handle->image_ratio_y        = true;
       		}
       		
       		$handle->process($this->imgPath);
       		if ($handle->processed) {
           		$this->image_id = $handle->file_dst_name;
           		$handle->clean();
       		} else {
           		echo 'error : ' . $handle->error .' '. $this->imgPath;
       		}
       		
       		
       		$sql = "
       			insert into
       				imagetable
       			(image_id, alt, date_added)
       				values
       			(:image_id, :alt, NOW()) 
       			      		
       		";
       		$this->image_id = str_replace('.jpg', '', $this->image_id);
       	
	   		$query = $this->db->prepare($sql);
	   		$query->execute(array(':image_id'=> $this->image_id, ':alt'=> $this->alt));
       		
    
			header("Location: ". URL .'system/imageLibrary/');
			exit();
				
 		}
 	
 		} else {
 			return 'Sorry, your image could not be uploaded';
 		}
 	}

} // end class
