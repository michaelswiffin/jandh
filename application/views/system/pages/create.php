<?php 
/* 
 | NEW PAGE 
 *
 * Set up some blank arrays objects 
 * Form_id
 * Button Text
 *
 * 	
 */
$data = new stdClass();
$data->form_title = '<h3>Add a new page to the site</h3>';
$data->form_description = '<p>Add a new page to the site</p>';
$data->page_column_one = '';
$data->page_column_two = '';
$data->display_nav = 0;
$data->visible = 1;
$data->extra = '';
$data->button_text = 'Add Page';
$data->form_id = 'add_page';

include_once('page-form.php'); 

?>