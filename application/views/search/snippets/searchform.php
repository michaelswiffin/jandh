	    <div class="searchbar">
	    	<form name="q" method="get" action="search/searchresults" class="search-form">
	    	<ul>
	    		<li><input type="text" name="q" class="qclass"
				value="<?php if(isset($_GET['q'])) { echo $_GET['q']; } ?>"></li>
	    		<li><input type="submit" name="qs" value="&#xf002;"></li>
	    		<li class="advanced-search-trigger">Advanced Search <i class="fa fa-eject fa-rotate-180"></i></li>
	    	</ul>
	    	<input type="hidden" name="form_id" value="qomni">
	    	
	    	</form>
	    </div>
	   
	    <div id="advanced-search-rig" >
	    	<form name="qadv" action="" method="get" id="qadv" class="advanced-search-form">
				<div class="inputs-rig large-8 columns">
				<label>Manufacturer</label>
				<input type="text" name="manu" placeholder="Manufacturer" class="qclass" 
				value="<?php if(isset($_GET['manu'])) { echo $_GET['manu']; } ?>"><br />
				
				<label>Appliance</label>
				<input type="text" name="appliance" placeholder="Appliance" class="qclass"
				value="<?php if(isset($_GET['appliance'])) { echo $_GET['appliance']; } ?>">
				<br />
				
				<label>Product Description</label>
				<input type="text" name="product_description" placeholder="Product Description" class="qclass"
				value="<?php if(isset($_GET['product_description'])) { echo $_GET['product_description']; } ?>">
				
				<input type="hidden" name="form_id" value="qadv">
				</div>
				<div class="large-4 columns advanced-search-description">
					<p>Refine your search by <br />Manufacturer, <br />Appliance or <br />Description.</p>
					<input type="submit" name="qs" value="SEARCH &#xf002;">
					
				</div>
			</form>
	   
	    </div>
	   
	    <!-- e/searchbar -->