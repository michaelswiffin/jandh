<?php 

/* 
 | PAGE UPDATE FORM
 *
 *
 *
 *
 *
 *
 *
 */
 
$data->form_title = 'Edit the page: <b>'. $data->page_name .'</b>';
$data->form_description = '<p>Edit this page</p>';
$data->extra = '<input type="hidden" name="page_id" value="'. $data->id .'">';
$data->button_text = 'Commit Edit';
$data->form_id = 'edit_page';

include_once('page-form.php'); 

?>
