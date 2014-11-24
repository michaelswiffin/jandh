<div class="large-8 columns">
<h3>Add a new image to your library</h3>
<form name="upload_form" action="<?php echo URL; ?>system/cmd" method="post" enctype="multipart/form-data">

	<label>Upload your file!</label>	
	<input type="file" name="img_upload"> 
	
	<label>ALT Tag</label>
	<input type="text" name="alt" placeholder="alt" />
	<hr />
	<p>If you are happy with the data you have added, click the button!</p>
	<input type="submit" name="submit" value="Add Media" class="admin-btn">
	<input type="hidden" name="form_id" value="add_image" />
</form>

</div>

<div class="large-4 columns">

</div>