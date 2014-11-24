// common way to initialize jQuery
$(function() {
    // simple demo to show create something via javascript on the page
    if ($('#javascript-header-demo-box').length != 0) {
        $('#javascript-header-demo-box').hide();
        $('#javascript-header-demo-box').text('Hello from JavaScript! This line has been added by public/js/application.js');
        $('#javascript-header-demo-box').css('color', 'green');
        $('#javascript-header-demo-box').fadeIn('slow');
    }
    
    $(".nav li a").each(function() {
    if ($(this).next().length > 0) {
    	$(this).addClass("parent");
		};
	})
	
	$(".toggleMenu").click(function(e) {
		e.preventDefault();
		$(this).toggleClass("active");
		$(".nav").toggle();
	});
	adjustMenu();
	
});    
    
/* 
 | NAVIGATION    
 */   



var ww =  $(window).width();
$(window).bind('resize orientationchange', function() {
	ww =  $(window).width();
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 768) {
    // if "more" link not in DOM, add it
    if (!$(".more")[0]) {
    $('<div class="more">&nbsp;</div>').insertBefore($('.parent')); 
    }
		$(".toggleMenu").css("display", "inline-block");
		if (!$(".toggleMenu").hasClass("active")) {
			$(".nav").hide();
		} else {
			$(".nav").show();
		}
		$(".nav li").unbind('mouseenter mouseleave');
		$(".nav li a.parent").unbind('click');
    $(".nav li .more").unbind('click').bind('click', function() {
			
			$(this).parent("li").toggleClass("hover");
		});
	} 
	else if (ww >= 768) {
    // remove .more link in desktop view
    $('.more').remove(); 
		$(".toggleMenu").css("display", "none");
		$(".nav").show();
		$(".nav li").removeClass("hover");
		$(".nav li a").unbind('click');
		$(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
		 	// must be attached to li so that mouseleave is not triggered when hover over submenu
		 	$(this).toggleClass('hover');
		});
	}
}
