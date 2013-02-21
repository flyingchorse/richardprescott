function slideSwitch() {
    var $active = jQuery('#art-slideshow IMG.active');

    if ( $active.length == 0 ) $active = jQuery('#art-slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : jQuery('#art-slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 3000, function() {
            $active.removeClass('active last-active');
        });
}


jQuery(function() {


	var $active = jQuery('#art-slideshow IMG.active');
							
	$active.animate({opacity: 1.0}, 1000);

    setInterval( "slideSwitch()", 5000 );
    
});


jQuery(function(){
    //Get our elements for faster access and set overlay width
    var div = jQuery('div.thumbs'),
                 ul = jQuery('ul.sdt_menu'),
                 // unordered list's left margin
                 ulPadding = 3;

    //Get menu width
    var divWidth = div.width();

    //Remove scrollbars
    div.css({overflow: 'hidden'});

    //Find last image container
    var lastLi = ul.find('li:last-child');

    //When user move mouse over menu
    div.mousemove(function(e){

      //As images are loaded ul width increases,
      //so we recalculate it each time
      var ulWidth = lastLi[0].offsetLeft + lastLi.outerWidth() + ulPadding;

      var left = (e.pageX - div.offset().left) * (ulWidth-divWidth) / divWidth;
      div.scrollLeft(left);
    });
});
    