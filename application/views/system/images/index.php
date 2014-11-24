<h2>Image Library</h2>
<p>Theses are the images used in the pages, NOT the products!</p>
<p>To add a new image, <a href="<?php echo URL; ?>system/imagelibrary/upload">Click here</a></p>
<hr />
<style>
.img_holder {
	width: 220px;
	min-height: 200px;
	padding: 5px;
	text-align: center;
	float: left;
	background: #f5f5f5;
	border: 1px solid #c3c3c3;
	margin: 2px;
}
.img {
	width: 220px;
	min-height: 200px;
	overflow: hidden;
}
.img_details {
	background: #e7e7e7;
	padding: 5px;
	display: block;
	text-align: left;
}
</style>
<?php foreach($imagelist as $images) { ?>
<div class="img_holder">
	<div class="img">
		<a href="<?php echo URL; ?>system/imagelibrary/update/<?php echo $images->image_id; ?>">
		<img src="tmp.php?im=<?php echo IMAGE_PATH .'/'. $images->image_id; ?>.jpg&ms=200" alt="<?php echo $images->alt; ?>" />
		</a>
	</div>
	<br />
     <span class="img_details"> 
     	ALT TAG: <?php echo $images->alt; ?><br />
	 	IMG TAG: [IMG=<?php echo $images->image_id; ?>]
     </span>
</div>         	
<?php } ?>

