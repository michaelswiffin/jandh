	</div>
</div>
<div id="jh-footer">FOOTER</div>

	<!-- Included JS Files (Compressed) -->
	<script src="<?php echo URL; ?>public/js/jquery.js"></script>
	<script src="<?php echo URL; ?>public/js/foundation.min.js"></script>
  
	<!-- Initialize JS Plugins -->
	<script src="<?php echo URL; ?>public/js/app.js"></script>

  
    <script>
    $(window).load(function(){
    	$('#btt_link').hide();
    
    	$(".sb").mouseenter(
		  function(){
		    $(this).find("img").animate({marginTop:'35px'},'fast')
		  });
		$(".sb").mouseleave(
		  function() {
		    $(this).find("img").animate({marginTop:'20px'},'fast')
		  });

   
	
		$('a[href="#"]').click(function(event){ 
			event.preventDefault(); 
		});
    });
    </script> 
  
</body>
</html>