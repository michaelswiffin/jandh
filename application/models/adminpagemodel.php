<?php
/*
 | ADMIN PAGE MODEL
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

class AdminPageModel { 
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
    public function getAllPages()  {
        $sql = "SELECT * FROM pagedata";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

	/*
	 |
	 *
	 */    
	public function getSpecificPage($id)  {
	
        $sql = "SELECT * FROM pagedata where id=:id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));

		//pdo_print($sql, array(':id' => $id));
        return $query->fetch();
    }

	/*
	 |
	 *
	 */
	public function getAffiliateCats($cat=null, $div=null, $lvl=0){
       	$ret = '';
       	
       	$arr = array();
       	if($cat) { 
			$a = "affiliate_to = :cat";
		} else {
			$a = "affiliate_to = 0";
		}
		
        $sql = "SELECT id, page_name FROM pagedata where $a";
        $query = $this->db->prepare($sql);
        
        if($cat) {
			$arr[':cat'] = $cat;
		}
        $query->execute($arr);
			
		while($rows = $query->fetch()) {
		
			$sel = ($rows->id == 0) ? 'selected' : '';
			$ret .= '<option value="'. $rows->id .'" '. $sel .'>'. str_repeat($div, $lvl). str_replace("_", " ", stripslashes($rows->page_name)) .'</option>';
			$ret .= $this->getAffiliateCats($rows->id, '&nbsp;&nbsp;&nbsp;&nbsp;', $lvl+1);
		}
		
        return $ret;
		
	}
	
	/*
	 | Create page
	 *
	 */
	public function createPage() {
		
		foreach($_POST as $key=>$data) {
			$this->$key = $data;
		}
		
		$this->display_nav = isset($this->display_nav) ? $this->display_nav : 0;
		$this->visible = isset($this->visible) ? $this->visible : 0;
//		debugger($this);
		$sql = "
			insert into
				pagedata
			(
			  page_name
			, page_path
			, page_title
			, page_description
			, header_image
			, page_column_one
			, page_column_two
			, meta_keywords
			, meta_description
			, date_added
			, visible
			, affiliate_to
			, display_nav
			) values (
			  :page_name
			, :page_path
			, :page_title
			, :page_description
			, :header_image
			, :page_column_one
			, :page_column_two
			, :meta_keywords
			, :meta_description
			, :date_added
			, :visible
			, :affiliate_to
			, :display_nav
			
			)
			
		";
		$query = $this->db->prepare($sql);
			
		$query->execute(array(
			  ':page_name' => $this->page_name
			, ':page_path' => $this->page_name
			, ':page_title' => $this->page_title
			, ':page_description' => $this->page_description
			, ':header_image' => $this->header_image
			, ':page_column_one' => $this->page_column_one
			, ':page_column_two' => $this->page_column_two
			, ':meta_keywords' => $this->meta_keywords
			, ':meta_description' => $this->meta_description
			, ':date_added' => date('Y-m-d')
			, ':visible' => $this->visible
			, ':affiliate_to' => $this->affiliate_to
			, ':display_nav' => $this->display_nav
		));
		
		$lid = $this->db->lastInsertId(); 
		header("Location: ". URL .'system/pages/update/'. $lid .'?msg=added');
		exit();
	}
	
	/*
	 | Create page
	 *
	 */
	public function updatePage() {
		
		foreach($_POST as $key=>$data) {
			$this->$key = $data;
		}
		
		$this->display_nav = isset($this->display_nav) ? $this->display_nav : 0;
		$this->visible = isset($this->visible) ? $this->visible : 0;
		
		$sql = "
			update
				pagedata
			set
				  page_name = :page_name
				, page_path = :page_path
				, page_title = :page_title
				, page_description = :page_description
				, header_image = :header_image
				, page_column_one  = :page_column_one
				, page_column_two = :page_column_two
				, meta_keywords = :meta_keywords
				, meta_description = :meta_description
				, visible = :visible
				, affiliate_to = :affiliate_to
				, display_nav = :display_nav
				, last_edit = :last_edit
			where
				id = :id

		";
		$query = $this->db->prepare($sql);
			
		$query->execute(array(
			  ':page_name' => $this->page_name
			, ':page_path' => $this->page_name
			, ':page_title' => $this->page_title
			, ':page_description' => $this->page_description
			, ':header_image' => $this->header_image
			, ':page_column_one' => $this->page_column_one
			, ':page_column_two' => $this->page_column_two
			, ':meta_keywords' => $this->meta_keywords
			, ':meta_description' => $this->meta_description
			, ':last_edit' => date('Y-m-d')
			, ':visible' => $this->visible
			, ':affiliate_to' => $this->affiliate_to
			, ':display_nav' => $this->display_nav
			, ':id' => $this->page_id
		));
		header("Location: ". URL .'system/pages/update/'. $this->page_id .'?msg=edited');
		exit();
	}
	
} // end class
