<?php
$nav_model = $this->loadModel('NavModel');
$dataset = $nav_model->getManufacturers();
//debugger($_GET, '$dataset');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">


 	<title>
 		<?php 
	 		$title = isset($page_name) ? $page_name : 'J and H Heating Spares';
	 		echo $title;
	 	?>
 	 </title>

	<base href="<?php echo URL; ?>" >
	<meta name="description" content="J AND H">
	<meta name="author" content="ZTECH">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/foundation.min.css" />
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/jh.css?v=1.0">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,700" rel="stylesheet" type='text/css'>
    
    <!-- JS -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="js/jh.js"></script>
	<script src="javascripts/modernizr.foundation.js"></script>
    
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>



</head>

<body>

<div id="jh-top-navigation" class="bg-green">
<div class="">
	<div class="large-2 columns">
		<span><i class="fa fa-phone-square "></i> 0161 620 2310</span>
	</div>
	
	<div class="large-10 columns">
	<ul>
		<li class="li_first"><a href="#"><i class="fa fa-home"></i></a></li>
		<li><a href="#"><i class="fa fa-map-marker"></i></a></li>
		<li><a href="#"><i class="fa fa-shopping-cart"></i> 1 ITEM</a></li>
		<li class="li_last"><a href="#"><i class="fa fa-question-circle"></i></a></li>
	</ul>
	</div>
</div>
</div>

<!-- masthead -->
<div id="jh-masthead" class="">

	<div class="large-3 columns">
		<img src="<?php echo URL; ?>public/img/jandh-logo.png" alt="jandh-logo" width="231" height="80">
	</div>
	<div class="large-9 columns address">
		J & H Heating Spares<br />
		Acorn Centre, Unit 43 , Barry St<br />
		Oldham OL1 3NE<br />
	
	</div>
</div>

<div id="jh-page-content-x" class="row">
	    <div id="jh-side-navigation" class="large-2 columns nav-list">
	    <ul>
			<li class="header">Main Menu</li>
			<?php echo $nav_model->displayNav(); ?>
	      </ul>
	
			<ul class="">
				<li class="header">Manufacturers</li>
				<?php foreach($dataset as $m) { 
					if($m->manufacturer) {
					
				?>
					<li><a href="<?php echo URL; ?>search/searchresults?q=<?php echo $m->manufacturer; ?>&qs=x&form_id=qomni"><i class="fa fa-caret-right"></i> <?php echo $m->manufacturer; ?></a></li>
				<?php }
				} ?>
            </ul>
	    
	    <div class="side-snippet">
	    	<p class="white"><b>Got a Question?</b><br />Call us!</p>
	    	<h2 class="white"><i class="fa fa-phone-square "></i> 0161 620 2310</h2>
	    </div>
	    
	    </div>	 

<!-- right columns -->
	    <div class="large-10 columns "><br />
