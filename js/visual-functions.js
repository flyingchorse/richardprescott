jQuery(function()
{

if(jQuery.support.opacity){
			    	jQuery('#large-grid').mouseover(function() {
					   jQuery(this).stop().animate({opacity:1},100);
					}).mouseout(function(){
					   jQuery(this).stop().animate({opacity:0.3},100);
					});
				}
				
var isiPad = navigator.userAgent.match(/iPad/i) != null;

if (isiPad == true )
{
$('body').addClass('ipad');
}



});