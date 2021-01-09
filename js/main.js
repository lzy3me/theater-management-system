/*---------------------------------------------------
ACTIVE JS FILES:
	[2. Sticky ]
	[3. Scrollspy ]
	[5. Smooth Scroll ]
	[6. ScrollUp ]
	[8. NiceScroll ]
----------------------------------------------------*/
jQuery(document).ready(function($){

/*-------------------
[2. Sticky ]
---------------------*/
	// Create a clone of the menu, right next to original.
$('.header_menu').addClass('original').clone().insertAfter('.header_menu').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();

scrollIntervalID = setInterval(stickIt, 10);


function stickIt() {

  var orgElementPos = $('.original').offset();
  orgElementTop = orgElementPos.top;               

  if ($(window).scrollTop() >= (orgElementTop)) {
    // scrolled past the original position; now only show the cloned, sticky element.

    // Cloned element should always have same left position and width as original element.     
    orgElement = $('.original');
    coordsOrgElement = orgElement.offset();
    leftOrgElement = coordsOrgElement.left;  
    widthOrgElement = orgElement.css('width');
    $('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement).show();
    $('.original').css('visibility','hidden');
  } else {
    // not scrolled past the menu; only show the original menu.
    $('.cloned').hide();
    $('.original').css('visibility','visible');
  }
}
/*-------------------
[3. Scrollspy ]
---------------------*/
	$('body').scrollspy({
		target: '#navbar-example',
		offset: 95
	});

/*-------------------
[5. Smooth Scroll ]
---------------------*/
	var $root = $('html, body');
	$('#nav li a').click(function() {
		var href = $.attr(this, 'href');
		$root.animate({
			scrollTop: $(href).offset().top
		}, 2000, function () {
			window.location.hash = href;
		});
		return false;
	});
/*-------------------
[6. ScrollUp ]
---------------------*/
	$.scrollUp({
		animation: 'slide', // Fade, slide, none
		scrollText: [
		  "<i class='fa fa-chevron-up'></i>"
		]
	});

/*-------------------
[8. NiceScroll ]
---------------------*/
    (function () {
   var nice = $("html").niceScroll({
    cursorcolor: '#000',
      cursorwidth: '20px',
      cursorborderradius: '100px',
      cursorborder: '0px solid',
      zindex:"9999"
    
    });  // The document page (body)
    $("#boxscroll").niceScroll({touchbehavior:true});
	
    }());
	
	

});