<?php

/**
 * Helper functions
 * Not in a class cos there aint no point
 * 
 **/

/*
 | bbcode
 *
 ':...................................................................*/
	function bbcode($str) {
    
    	$simple_search = array(
        '/\[h1\](.*?)\[\/h1\]/is',
        '/\[h2\](.*?)\[\/h2\]/is',
        '/\[h3\](.*?)\[\/h3\]/is',
        '/\[h4\](.*?)\[\/h4\]/is',
        '/\[b\](.*?)\[\/b\]/is',                                
        '/\[i\](.*?)\[\/i\]/is',                                
        '/\[u\](.*?)\[\/u\]/is',
        '/\[s\](.*?)\[\/s\]/is',
        '/\[ul\](.*?)\[\/ul\]/is',
        '/\[li\](.*?)\[\/li\]/is',
        '/\[LINK=(.*?)\](.*?)\[\/LINK]/is',
        '/\[LINK-NW=(.*?)\](.*?)\[\/LINK-NW]/is',
        '/\[LINK-BTN=(.*?)\](.*?)\[\/LINK]/is',
        '/\[FBLINK=(.*?)\](.*?)\[\/FBLINK]/is',
        '/\[LBLINK=(.*?) GR=(.*?) DES=(.*?)\](.*?)\[\/LBLINK]/is',
        '/\[FILELINK=(.*?)\](.*?)\[\/FILELINK]/is',
        '/\[L\](.*?)\[\/L]/is',
        '/\[R\](.*?)\[\/R]/is',
        '/\[C\](.*?)\[\/C]/is',        
        '/\[FILE\](.*?)\[\/FILE]/is',
        '/\[clear\]/is',
        '/\[rclear\]/is',
        '/\[line\]/is',
        '/\[redline\]/is',
        '/\[blackline\]/is',
        '/\[red\](.*?)\[\/red]/is',
        '/\[blue\](.*?)\[\/blue]/is',
        '/\[orange\](.*?)\[\/orange]/is',
        '/\[IMG=(.*?)\]/is',
        '/\[L-IMG=(.*?)\]/is',
        '/\[R-IMG=(.*?)\]/is',

        '/\[tick\]/is',                
        
		/* LAYOUT -----------------------------------------*/
        '/\[row\](.*?)\[\/row\]/is',
        '/\[1_col(.*?)\](.*?)\[\/1_col\]/is',
        '/\[2_col(.*?)\](.*?)\[\/2_col\]/is',
        '/\[3_col(.*?)\](.*?)\[\/3_col\]/is',
        '/\[4_col(.*?)\](.*?)\[\/4_col\]/is',
        '/\[5_col(.*?)\](.*?)\[\/5_col\]/is',
        '/\[6_col(.*?)\](.*?)\[\/6_col\]/is',
        '/\[7_col(.*?)\](.*?)\[\/7_col\]/is',
        '/\[8_col(.*?)\](.*?)\[\/8_col\]/is',
        '/\[9_col(.*?)\](.*?)\[\/9_col\]/is',
        '/\[10_col(.*?)\](.*?)\[\/10_col\]/is',
        '/\[11_col(.*?)\](.*?)\[\/11_col\]/is',
        '/\[12_col(.*?)\](.*?)\[\/12_col\]/is',
        '/\[inner(.*?)\](.*?)\[\/inner\]/is',
        '/\[box(.*?)\](.*?)\[\/box\]/is'
        );
        
        $simple_replace = array(
        '<h1><span>$1</span></h1>',
        '<h2>$1</h2>',
        '<h3>$1</h3>',
        '<h4>$1</h4>',
        '<strong>$1</strong>',
        '<em>$1</em>',
        '<u>$1</u>',
        '<s>$1</s>',
        '<ul>$1</ul>',
        '<li>$1</li>',
        '<a href="$1">$2</a>',
        '<a href="$1" target="_blank">$2</a>',
        '<a href="$1" class="bw_button">$2</a>',
        '<a href="$1" rel="facebox">$2</a>',
        '<a href="$1" class="lightbox-2" rel="$2" title="$3">$4</a>',        
        '<a href="$1">$2</a>',
        '<div style="float:left">$1</div>',
        '<div style="float:right">$1</div>',
        '<div style="margin: auto; text-align: center;">$1</div>',
        '<a href="$1">$1</a>',
        '<br style="clear:both" />',
        '<br style="clear:right" />',
        '<hr class="hr" />',
        '<hr class="redline" />',
        '<hr class="blackline" />',
        '<span style="color: red">$1</span>',
        '<span style="color: #2595c5;">$1</span>',
        '<span style="color: #ff9900">$1</span>',
        '<img src="$1">',
        '<img src="$1" style="float:left">',
        '<img src="$1" style="float:right">',
        '<i class="icon-ok"></i>', 
        
		/* LAYOUT -----------------------------------------*/
        '<div class="row">$1</div>',
        '<div class="large-1 columns$1">$2</div>',
        '<div class="large-2 columns$1">$2</div>',
        '<div class="large-3 columns$1">$2</div>',
        '<div class="large-4 columns$1">$2</div>',
        '<div class="large-5 columns$1">$2</div>',
        '<div class="large-6 columns$1">$2</div>',
        '<div class="large-7 columns$1">$2</div>',
        '<div class="large-8 columns$1">$2</div>',
        '<div class="large-9 columns$1">$2</div>',
        '<div class="large-10 columns$1">$2</div>',
        '<div class="large-11 columns$1">$2</div>',
        '<div class="large-12 columns$1">$2</div>',
        '<div class="spacer$1">$2</div>',
        '<div class="contentbox$1">$2</div>'
        );
        
        $str = preg_replace ($simple_search, $simple_replace, $str);
	
		return $str;

	}

/*
 | debugger
 * takes an array or string for dumping
 ':...................................................................*/
	function debugger($data, $desc=null) {

		echo '<div class="debug">';
		// if it's an array, print_r for formatted output
		echo '<b>'. $desc  .'</b><br />';
		echo '<pre>';
			print_r($data);
		echo '</pre>';

		echo '</div>';
	}	

/*
 | pdo_print
 * takes an SQL prepped for pdo and str_replaces the 
 * tokens for values
 ':...................................................................*/	 
	 function pdo_print($sql, $params, $just_str=null, $fu=null) {
	 	
		$sql = str_replace(array_keys($params), array_values($params), $sql);
		 
		if(isset($_GET['debug'])) {
		echo '<div class="pdo-debug">';
		if(isset($fu)) {
			echo '<b>'. $fu .'</b>';
		}
		echo '<pre>';
		 	if($just_str) {
			 	echo $sql;
		 	} else {
				print_r($sql);
			}
		 	echo '</pre>';
		echo '</div>';
		}
	 }
	 

/*
 | encode_base64
 * takes an string and encodes it.
 * Useful for passing GET variables
 ':...................................................................*/
	function encode_base64($sData){
		$sBase64 = base64_encode($sData);
		
		return str_replace('=', '', strtr($sBase64, '+/', '-_'));
	}

/*
 | decode_base64
 * takes an string and decodes it.
 * Useful for passing GET variables
 ':...................................................................*/
	function decode_base64($sData){
		$sBase64 = strtr($sData, '-_', '+/');
		
		return base64_decode($sBase64.'==');
	}	

/*
 | percent
 * Calculate a percentage.
 * Useful if you ever need to calculate the %....
 ':...................................................................*/
	 function percent($num_amount, $num_total) {
		$count1 = $num_amount / $num_total;
		$count2 = $count1 * 100;
		$count = number_format($count2, 0);
		
		return $count;
	}
/*
 | Returns string with newline formatting converted into HTML paragraphs.
 *
 *
 ':...................................................................*/
 

	function nl2p($text) {
		# first, lets trim starting/trailing whitespace
		$text = trim($text);

		# temporarily replace two or more consecutive newlines
		# into SOH characters (not used in normal texts)

		$text = preg_replace('~(\r\n|\n){2,}|$~', "\001", $text);

		# convert remaining (i.e. single) newlines into html br's
		
		$text = nl2br($text);
		
		# finally, replace SOH chars with paragraphs
		
		$text = preg_replace('/(.*?)\001/s', "<p>$1</p>\n", $text); 
		
		# test
		return $text;
	}	
/*
 | output
 * 
 * 
 ':...................................................................*/ 
	function getImages($html) {
		
		$db = new Controller;
		$ed = $db->returnDb();
				
		$width = '';
    	$pattern = "/<img src=\"(.*?)\"/is";

    	preg_match_all($pattern,$html,$match);
  		
        foreach($match[1] as $key=>$data) 
		{
			
			
	        /* get the filename - without the jpg */
	        $filename =  preg_replace("/(.jpg|.gif)/", "", basename($data));
			
	     
	        /* 
			 | get the desired width
			 */
			if(strpos($filename, ':')) {
				
				$width = strstr($filename, ':');
				$filename = strstr($filename, ':', true);
				$filename_to_replace = $filename . $width;
				$width = str_replace(':','',$width);
			} else {
				$filename_to_replace = $filename;
				list($width, $height, $type, $attr) = getimagesize(IMAGE_PATH .'/'. $filename .'.jpg');
				
			}
			
			/* query */	
	    	$sql = "select * from imagetable where image_id = :filename";
	       // pdo_print($sql, array(':filename'=>$filename));
	        
        	try {
        		$query = $ed->prepare($sql);
        		
        		if($query->execute(array(':filename' => $filename))) {
        			
        			$row = $query->fetch();
        			
        			$html = preg_replace(
                	'/<img src="'. $filename_to_replace.'"/', 
                	'<img src="tmp.php?im='. IMAGE_PATH .'/'. $row->image_id .'.jpg&ms='. $width .'" alt="'. $row->alt .'"  class="img-holder"', 
                	$html);

        		}

        	} catch(PDOException $e) {debugger($e->getMessage()); }
        	
        	            } 
            
            return $html;
                    	
        }     
/*
 | output
 * 
 * 
 ':...................................................................*/      
 	function adminGetImages($text) {
		
		$db = new Controller;
		$ed = $db->returnDb();

		$html = '';
		
		//$text = implode(" ", $text);
		
		preg_match_all('/\[img=(.*?)\]/is', $text, $matches);
		//debugger($matches);
		
		foreach($matches[1] as $data) {
			
			$filename =  preg_replace("/(.jpg|.gif)/", "", basename($data));
			if(strpos($filename, ':')) {
				$filename = strstr($filename, ':', true);
			}
			$sql = "select * from imagetable where image_id = :filename";
    		//$this->core->pdo_print($sql, ':filename', $filename);
 		
			$query = $ed->prepare($sql);
        		
        		if($query->execute(array(':filename' => $filename))) {
				
					$row = $query->fetch(PDO::FETCH_OBJ);
		
                	$html .= '<img src="tmp.php?im='. IMAGE_PATH .'/'. $row->image_id .'.jpg&ms=100" alt="'. $row->alt .'" 
                	style="margin: 2px; padding: 2px; border: 1px solid #cccccc; background: #f4f4e8" />';
                 }
    	}    
		$html .= '<p>' . count($matches[1]) .' images found</p>';
    	return trim($html);

	}
/*
 | output
 * 
 * 
 ':...................................................................*/
	function output_str($str) {
     
		$str = bbcode($str);
		$str = nl2p($str);
		$str = getImages($str);
		return $str;
	
	}	