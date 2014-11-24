<?php
 /*
  | PAGE FORM
  *
  */
//debugger($data);
?>
<h2><?php echo $data->form_title; ?></h2>
<?php echo $data->form_description; ?>
<form name="page-form" action="<?php echo URL; ?>system/cmd" method="post">
<div class="rows">
	<div class="large-8 columns">
		<label>Page Name</label>
		<p class="helper">Give the page a Name</p>
		<input type="text" name="page_name" id="page_name" placeholder="Page Name" value="<?php if(isset($data->page_name)) { echo $data->page_name; } ?>">
		
		
		<label for="affiliate_to">Attached to:</label>
		<p class="helper">Is this a 'Sub' page eg About us > About Jacko....</p>
            <select  class="selecto" name="affiliate_to" id="affiliate_to">
            	<option value="0">Root</option>
                <?php echo $affiliate; ?>
            </select>

	</div>
	<div class="large-4 columns">
		
		<label>Display Options</label>
		<input type="checkbox" name="display_nav" value="1" <?php if($data->display_nav == 1) { echo 'checked'; } ?>> Display on the main navigation?<br />
		<input type="checkbox" name="visible" value="1" <?php if($data->visible == 1) { echo 'checked'; } ?>> Display the page on the website?
		
		<hr />
		
		<input type="button" name="submit" value="<?php echo $data->button_text; ?>" class="admin-btn">

	</div>
</div>
<hr />

<div class="large-6 columns">
	<label>Content for Column One (left side of the page)</label>
	<textarea name="page_column_one" id="page_column_one" style="height:500px"><?php if(isset($data->page_column_one)) { echo $data->page_column_one; } ?></textarea>
	
	<p>Images used in Column One:</p>
	<?php echo adminGetImages($data->page_column_one); ?>

	<hr />
	
	<label>Content for Column Two (right side of the page)</label>
	<textarea name="page_column_two" id="page_column_two" style="height:500px"><?php if(isset($data->page_column_two)) { echo $data->page_column_two; } ?></textarea>
	
	<p>Images used in Column Two:</p>
	<?php echo adminGetImages($data->page_column_two); ?>
	
</div>

<div class="large-6 columns">
	<label>Page Title</label>
	<p class="helper">What is the Page title? <br />This is the part that appears at the top of the web page and is important!</p>
	<input type="text" name="page_title" id="page_title" value="<?php if(isset($data->page_title)) { echo $data->page_title; } ?>" >
	
	<label>Page Description - What is the page about</label>
	<p class="helper">Enter a brief description about the page. This is for you rather than the site.</p>
	<textarea name="page_description" id="page_description" style="height:200px"><?php if(isset($data->page_description)) { echo $data->page_description; } ?></textarea>
	
	<label>Header Image?</label>
	<p class="helper">Do you want a large image displayed above the page content? If so, visit your Header Image Library and choose one! <br /> Then come back and paste the code number in here.</p>
	<input type="text" name="header_image" id="header_image" value="<?php if(isset($data->header_image)) { echo $data->header_image; } ?>" >

	<label>META Keywords</label>
	<p class="helper">META data isn't really used as much anymore but it is still useful to add a few keywords and a description. <br />
		Separate the words by comma eg heating, spares, boilers.
	</p>
	<textarea name="meta_keywords" id="meta_keywords" style="height:200px"><?php if(isset($data->meta_keywords)) { echo $data->meta_keywords; } ?></textarea>
	
	<label>META Description</label>
	<p class="helper">Describe the page and what it's for....!</p>
	<textarea name="meta_description" id="meta_description" style="height:200px"><?php if(isset($data->meta_description)) { echo $data->meta_description; } ?></textarea>
	

</div>

		<hr />
		<p>If you are happy with the data you have added, click the button!</p>
		<input type="submit" name="submit" value="<?php echo $data->button_text; ?>" class="admin-btn">
		<input type="hidden" name="form_id" value="<?php echo $data->form_id; ?>">
		<?php echo $data->extra; ?>
</form>