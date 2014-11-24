<?php
/* views -> store -> products.php */


?>
<br />
<div class="row">
	<div class="large-12 columns">
		<h2><?php echo $store->product_description; ?></h2>
	</div>
</div>

<div class="row">
	<div class="large-2 columns">
		<?php
			if(count($images) == 0) { ?>
				<img src="<?php echo URL; ?>/public/img/products/default.png" alt="default" width="250" height="250" />
		<?php } ?>
	</div>
	<div class="large-8 columns">
		<?php 
			if($store->product_text) {
				echo nl2p($store->product_text);
			} else {		
				echo nl2p($store->product_description); 
			}
		?>
		<hr />
		<div class="prod-basket-bar">

			<form name="atb" action="" method="get">
			<table width="100%">
				<tr>
					<td><label>Add to Basket</label></td>
					<td>
						<select name="atb-qty">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
						</select>
					</td>
					<td>
						<input type="button" name="submit" value="Add" class="add-to-cart">
					</td>
				</tr>
				
			</table>
			</form>
		</div>
	</div>
	<div class="large-2 columns">
ff
	</div>
</div>
<div class="row">
	
</div>

<?php debugger($related_appliances, 'APPS'); ?>