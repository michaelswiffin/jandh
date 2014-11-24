<h2>Pages Online</h2>

<p>This is a list of the pages currently on the site</p>


<table width="100%">
	<tr>
		<th>#</th>
		<th>Page Name</th>
		<th>Page path</th>
		<th>Date Added</th>
		<th>Last Edit</th>
		<th>Visibility</th>
	</tr>
<?php foreach($pages as $page) { ?>
	<tr>
		<td><?php echo $page->id; ?></td>
		<td><a href="<?php echo URL; ?>system/pages/update/<?php echo $page->id; ?>"><?php echo $page->page_name; ?></a></td>
		<td><?php echo $page->page_path; ?></td>
		<td><?php echo $page->date_added; ?></td>
		<td><?php echo $page->last_edit; ?></td>
		<td><?php echo $page->visible; ?></td>
	</tr>
<?php } ?>
</table>