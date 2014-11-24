<?php
$filename = IMAGE_PATH .'/'. $image->image_id .'.jpg';
list($width, $height) = getimagesize($filename);

?>
<h3>Update an Image</h3>
<p>This form gives you control of the image, add a tag, edit a tag or delete the image!</p>
<hr />

<div class="large-8 columns">

<img src="tmp.php?im=<?php echo $filename; ?>" alt="<?php echo $image->alt; ?>" />

</div>

<div class="large-4 columns">
<h3>Image Details</h3>

<table width="100%">
	<tr>
		<td>Image Dimensions:</td>
		<td><?php echo $width; ?> x <?php echo $height; ?></td>
	</tr>
	<tr>
		<td>Date Added:</td>
		<td><?php echo $image->date_added; ?></td>
	</tr>
	<tr>
		<td>ALT Tag:</td>
		<td><?php echo $image->alt; ?></td>
	</tr>
	<tr>
		<td>Image Tag:</td>
		<td>[IMG=<?php echo $image->image_id; ?>]</td>
	</tr>
	<tr>
		<td>Times Used:</td>
		<td>Image used <strong>(<?php echo $times_used->times; ?>)</strong> times</td>
	</tr>
</table>
<p class="helper">Copy the code from the table above eg [IMG=1234546] and paste it into your page where you want the image to appear.</p>
<hr />
</div>