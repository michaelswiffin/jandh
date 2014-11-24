<?php

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">


 	<title>
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

<div id="jh-top-navigation" style="background: #ff0000;">
<div class="">
	<div class="large-6 columns">
		<span>ADMINISTRATION MODULE</span>
	</div>
	
	<div class="large-6 columns">
	<ul>
		<li class="li_first"><a href="#"><i class="fa fa-home"></i></a></li>
		<li><a href="#"><i class="fa fa-map-marker"></i></a></li>
		<li><a href="#"><i class="fa fa-shopping-cart"></i> 1 NEW</a></li>
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
		<p>NAV</p>
	</div>
</div>

<div id="jh-page-content-x" class="row">
	<div id="jh-side-navigation" class="large-2 columns nav-list-admin" >
	   	<ul>
	   		<li class="header-admin">MAIN MENU</li>
			<li><a href="#"><i class="fa fa-home fa-lg fa-fw"></i> ADMIN HOME</a></li>
			<li><a href="#"><i class="fa fa-cog fa-lg fa-fw"></i> SETTINGS</a></li>
			<li><a href="#"><i class="fa fa-shopping-cart fa-lg fa-fw"></i> ORDERS - 1 NEW</a></li>
			<li class=""><a href="#"><i class="fa fa-question-circle fa-lg fa-fw"></i> HELP</a></li>
		</ul>
		<ul>
			<li class="header-admin">PAGE CONTROL</li>
			<li>
				<ul>
					<li><a href="<?php echo URL; ?>system/pages/"><i class="fa fa-caret-right fa-lg fa-fw"></i> VIEW ALL PAGES</a></li>
					<li><a href="<?php echo URL; ?>system/pages/create"><i class="fa fa-caret-right fa-lg fa-fw"></i> ADD NEW PAGE</a></li>
				</ul>
			</li>
			
			<li class="header-admin">PRODUCTS</li>
			<li>
				<ul>
					<li><a href="<?php echo URL; ?>system/products/"><i class="fa fa-caret-right fa-lg fa-fw"></i> VIEW ALL PRODUCTS</a></li>
					<li><a href="<?php echo URL; ?>system/products/create"><i class="fa fa-caret-right fa-lg fa-fw"></i> ADD NEW PRODUCT</a></li>
					<li><a href="<?php echo URL; ?>system/products/specials"><i class="fa fa-caret-right fa-lg fa-fw"></i> SPECIALS</a></li>
					<li><a href="<?php echo URL; ?>system/products/settings"><i class="fa fa-cog fa-lg fa-fw"></i> SETTINGS</a></li>
				</ul>
			</li>
			
			<li class="header-admin">ORDERS</li>
			<li>
				<ul>
					<li><a href="<?php echo URL; ?>system/orders/"><i class="fa fa-caret-right fa-lg fa-fw"></i> ORDER LIST</a></li>
					<li><a href="<?php echo URL; ?>system/orders/history"><i class="fa fa-caret-right fa-lg fa-fw"></i> HISTORY</a></li>
					<li><a href="<?php echo URL; ?>system/orders/invoices"><i class="fa fa-caret-right fa-lg fa-fw"></i> INVOICES</a></li>
				</ul>
			</li>
			
			<li class="header-admin">MEDIA</li>
			<li>
				<ul>
					<li><a href="<?php echo URL; ?>system/imagelibrary/"><i class="fa fa-caret-right fa-lg fa-fw"></i> VIEW ALL IMAGES</a></li>
					<li><a href="<?php echo URL; ?>system/media/"><i class="fa fa-caret-right fa-lg fa-fw"></i> VIEW ALL VIDEOS</a></li>
					<li><a href="<?php echo URL; ?>system/imagelibrary/upload"><i class="fa fa-caret-right fa-lg fa-fw"></i> ADD NEW MEDIA FILES</a></li>
				</ul>
			</li>
			

		</ul>
	</div>
	    
<!-- right columns -->
	    <div class="large-10 columns "><br />