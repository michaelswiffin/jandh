<?php

/*
 |
 *
 *
 *
 *
 *
 */
 	$search_string = '';
 	
 	if(isset($_GET['q'])) {
	 	$search_string .= $_GET['q'];
 	}
 	
 	if(isset($_GET['manu'])) {
	 	$search_string .= 'Manufacturer: '. $_GET['manu'];
 	}
 	
 	if(isset($_GET['appliance'])) {
	 	$search_string .= ', Appliance: '. $_GET['appliance'];
 	}
 	
 	if(isset($_GET['product_description'])) {
	 	$search_string .= ', Product Description: '. $_GET['product_description'];
 	}
 	$total_results = count($results);
	$number_of_results = $total_results == 1000 ? ' > 1000' : $total_results;
?>
<?php include_once('snippets/searchform.php'); ?>


<div class="search-information">
<hr />
<p>Your search for <b><?php echo $search_string; ?></b> returned <?php echo $number_of_results; ?> results</p>

</div>

<?php
if($total_results > 0) {
?>

<div class="large-8 columns">
	<h3 class="h-title">SEARCH RESULTS</h3>
	
	<table width="100%" id="search-results-table">
<?php foreach($results as $data) { ?>
		<tr>
			<td rowspan="3" class="srt-base" width="30"><i class="fa fa-dot-circle-o fa-fw fa-2x"></i></td>
		</tr>
		<tr>
			<td width="70%"><a href="store/viewitem/<?php echo $data->id; ?>"><?php echo $data->manufacturer; ?>: <?php echo $data->product_description; ?></a></td>
			<td class="srt-price">&pound;<?php echo number_format($data->price, 2, '.', ''); ?></td>
		</tr>
		<tr>
			<td class="srt-base">Part Number: <a href="<?php echo URL; ?>search/searchresults?form_id=qomni&q=<?php echo $data->part_number; ?>"><?php echo $data->part_number; ?></a></td>
			<td class="srt-base"><i class="fa fa-info fa-fw  fa-lg"></i>&nbsp;
				<i class="fa fa-shopping-cart fa-fw fa-lg"></i>&nbsp;
				<i class="fa fa-check-square fa-fw fa-lg grey"></i>
			</td>
		</tr>
<?php } ?>
	</table>
			


</div>
<div class="large-4 columns">
	<h4>MANUFACTURERS LIST</h4>
	<ul>
<?php
	$manloop = '';

	
	foreach($results as $data) {
		$arr[] = $data->manufacturer;
	}
	
	$res = array_unique($arr);
	
	if(isset($_GET['appliance'])) {
		$app = $_GET['appliance'];
	}
	foreach($res as $unique) {
		echo '<li><a href="?q='. $unique .'&form_id=qomni">'. $unique .'</a></li>';
	}
	 
?></ul>
</div>


	
<?php } ?>

