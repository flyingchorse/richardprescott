/*

	Supersized - Fullscreen Slideshow jQuery Plugin
	Version : 3.2.5
	Theme 	: Shutter 1.1
	
	Site	: www.buildinternet.com/project/supersized
	Author	: Sam Dunn
	Company : One Mighty Roar (www.onemightyroar.com)
	License : MIT License / GPL License

*/

(function($){

 
	
	theme = {
	 	
	 	
	 	/* Initial Placement
		----------------------------*/
	 	_init : function(){
	 		
	 		// Center Slide Links
	 		/* if (api.options.slide_links) $(vars.slide_list).css('margin-left', -$(vars.slide_list).width()/2); */
	 		
			// Start progressbar if autoplay enabled
    		if (api.options.autoplay){
    			if (api.options.progress_bar) theme.progressBar();
			}else{
				if ($(vars.play_button).attr('src')) $(vars.play_button).attr("src", vars.image_path + "play.png");	// If pause play button is image, swap src
				if (api.options.progress_bar) $(vars.progress_bar).stop().animate({left : -$(window).width()}, 0 );	//  Place progress bar
			}
			
			
			/* Thumbnail Tray
			----------------------------*/
			// Hide tray off screen
			/* $(vars.thumb_tray).animate({bottom : -207}, 0 ); */
			window.onorientationchange = switchThumbnailBar;
			
			var MyiPadOrientation;
			 

			var isiPad = navigator.userAgent.match(/iPad/i) != null;
			var thumbBottom = 160;		

			function switchThumbnailBar() {
			var thumbBottom = 160;	
			if (isiPad == true){
						if(detectIPadOrientation() == 'landscape'){				
						thumbBottom = 160;
						}
					}
					
					
			$(vars.thumb_tray_cont).stop().animate({bottom : thumbBottom, avoidTransforms : true}, 500 );
			}
			
			function detectIPadOrientation () {  
			  
			    if ( orientation == 0 ) {  
			    MyiPadOrientation = 'portrait';
			   //  alert ('Portrait Mode, Home Button bottom');  
			    }  
			    else if ( orientation == 90 ) {  
			    MyiPadOrientation = 'landscape';
			    // alert ('Landscape Mode, Home Button right');  
			    }  
			    else if ( orientation == -90 ) {  
			    MyiPadOrientation = 'landscape';
			   //  alert ('Landscape Mode, Home Button left');  
			    }  
			    else if ( orientation == 180 ) {
			    MyiPadOrientation = 'portrait';  
			     //alert ('Portrait Mode, Home Button top');  
			    }  
			    
			    return MyiPadOrientation;
			 }  
			 
			 
			
			// Thumbnail Tray Toggle
			$(vars.tray_button).toggle(function(){
				$(vars.thumb_tray_cont).stop().animate({bottom : 0, avoidTransforms : true}, 500 );
				if ($(vars.tray_arrow).attr('src')) $(vars.tray_arrow).attr("src", vars.image_path + "button-tray-up.png");
				return false;
			}, function() {
						var thumbBottom = 160;	
			//detect ipad & orientation 
			 			if (isiPad == true){
						if(detectIPadOrientation() == 'landscape'){
						thumbBottom = 160;
						}
					}

			//detect ipad & orientation
				$(vars.thumb_tray_cont).stop().animate({bottom : thumbBottom, avoidTransforms : true}, 300 );
				if ($(vars.tray_arrow).attr('src')) $(vars.tray_arrow).attr("src", vars.image_path + "button-tray-down.png");
				return false;
			});
			
			// Make thumb tray proper size
			$(vars.thumb_list).width($('> li', vars.thumb_list).length * $('> li', vars.thumb_list).outerWidth(true));	//Adjust to true width of thumb markers
			
			// Display total slides
			if ($(vars.slide_total).length){
				$(vars.slide_total).html(api.options.slides.length);
			}
			
			
			/* Thumbnail Tray Navigation
			----------------------------*/	
			if (api.options.thumb_links){
				//Hide thumb arrows if not needed
				if ($(vars.thumb_list).width() <= $(vars.thumb_tray).width()){
					$(vars.thumb_back +','+vars.thumb_forward).fadeOut(0);
				}
				
				// Thumb Intervals
        		vars.thumb_interval = Math.floor($(vars.thumb_tray).width() / $('> li', vars.thumb_list).outerWidth(true)) * $('> li', vars.thumb_list).outerWidth(true);
        		vars.thumb_page = 0;
        		
        		// Cycle thumbs forward
        		$(vars.thumb_forward).click(function(){
        			if (vars.thumb_page - vars.thumb_interval <= -$(vars.thumb_list).width()){
        				vars.thumb_page = 0;
        				$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
        			}else{
        				vars.thumb_page = vars.thumb_page - vars.thumb_interval;
        				$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
        			}
        		});
        		
        		// Cycle thumbs backwards
        		$(vars.thumb_back).click(function(){
        			if (vars.thumb_page + vars.thumb_interval > 0){
        				vars.thumb_page = Math.floor($(vars.thumb_list).width() / vars.thumb_interval) * -vars.thumb_interval;
        				if ($(vars.thumb_list).width() <= -vars.thumb_page) vars.thumb_page = vars.thumb_page + vars.thumb_interval;
        				$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
					}else{
        				vars.thumb_page = vars.thumb_page + vars.thumb_interval;
        				$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
        			}
        		});
				
			}
			
			
			/* Navigation Items
			----------------------------*/
		    $(vars.next_slide).click(function() {
		    	    
			$current_slide_no = vars.current_slide;
		    $total_no_slides = api.options.slides.length;
		    $total_no_slides = $total_no_slides - 1;
			
			if ($total_no_slides == $current_slide_no) {
			$('#supersized').css('display','none');	
			var $newdiv1 = $('<div id="supersized-loader"/>');
		    $('#supersized').before($newdiv1);

			$myUrl = api.getField('nextpage');
			window.location.href = $myUrl;

			
			//-- go to next page need to find this from wordpress  
			
			
			}
		    
		    // count the number of slides - find which number is current selected - then determine which is next album and link to it
		    
		    	api.nextSlide();
		    });
		    
		    $(vars.prev_slide).click(function() {
		    
		   
		    $current_slide_no = vars.current_slide;
		    $total_no_slides = api.options.slides.length;
		    $total_no_slides = $total_no_slides - 1;
			
			if ($current_slide_no == 0) {
			$('#supersized').css('display','none');
			 var $newdiv1 = $('<div id="supersized-loader"/>');
		    $('#supersized').before($newdiv1);
			
			$PrevUrl = api.getField('previouspage');
			window.location.href = $PrevUrl;

			
			//-- go to next page need to find this from wordpress
			
			}
		    	api.prevSlide();
		    });
		    	
		    	// Full Opacity on Hover
		    	if(jQuery.support.opacity){
			    	$(vars.prev_slide +','+vars.next_slide +','+vars.thumbgridlink).mouseover(function() {
					   $(this).stop().animate({opacity:1},100);
					}).mouseout(function(){
					   $(this).stop().animate({opacity:0.6},100);
					});
				}
			
			if (api.options.thumbnail_navigation){
				// Next thumbnail clicked
				$(vars.next_thumb).click(function() {
			    	api.nextSlide();
			    });
			    // Previous thumbnail clicked
			    $(vars.prev_thumb).click(function() {
			    	api.prevSlide();
			    });
			}
			
		    $(vars.play_button).click(function() {
				api.playToggle();						    
		    });
			
			
			/* Thumbnail Mouse Scrub
			----------------------------*/
    		if (api.options.mouse_scrub){
				$(vars.thumb_tray).mousemove(function(e) {
					var containerWidth = $(vars.thumb_tray).width(),
						listWidth = $(vars.thumb_list).width();
					if (listWidth > containerWidth){
						var mousePos = 1,
							diff = e.pageX - mousePos;
						if (diff > 10 || diff < -10) { 
						    mousePos = e.pageX; 
						    mousePos = mousePos - 64;
						    newX = (containerWidth - listWidth) * ((e.pageX-64)/containerWidth);
						    diff = parseInt(Math.abs(parseInt($(vars.thumb_list).css('left'))-newX )).toFixed(0);
						    $(vars.thumb_list).stop().animate({'left':newX}, {duration:diff*3, easing:'easeOutExpo'});
						}
					}
				});
			}
			
			
			/* Window Resize
			----------------------------*/
			$(window).resize(function(){
				
				// Delay progress bar on resize
				if (api.options.progress_bar && !vars.in_animation){
					if (vars.slideshow_interval) clearInterval(vars.slideshow_interval);
					if (api.options.slides.length - 1 > 0) clearInterval(vars.slideshow_interval);
					
					$(vars.progress_bar).stop().animate({left : -$(window).width()}, 0 );
					
					if (!vars.progressDelay && api.options.slideshow){
						// Delay slideshow from resuming so Chrome can refocus images
						vars.progressDelay = setTimeout(function() {
								if (!vars.is_paused){
									theme.progressBar();
									vars.slideshow_interval = setInterval(api.nextSlide, api.options.slide_interval);
								}
								vars.progressDelay = false;
						}, 1000);
					}
				}
				
				// Thumb Links
				if (api.options.thumb_links && vars.thumb_tray.length){
					// Update Thumb Interval & Page
					vars.thumb_page = 0;	
					vars.thumb_interval = Math.floor($(vars.thumb_tray).width() / $('> li', vars.thumb_list).outerWidth(true)) * $('> li', vars.thumb_list).outerWidth(true);
					
					// Adjust thumbnail markers
					if ($(vars.thumb_list).width() > $(vars.thumb_tray).width()){
						$(vars.thumb_back +','+vars.thumb_forward).fadeIn('fast');
						$(vars.thumb_list).stop().animate({'left':0}, 200);
					}else{
						$(vars.thumb_back +','+vars.thumb_forward).fadeOut('fast');
					}
					
				}
			});	
			
								
	 	},
	 	
	 	
	 	/* Go To Slide
		----------------------------*/
	 	goTo : function(){
	 		if (api.options.progress_bar && !vars.is_paused){
				$(vars.progress_bar).stop().animate({left : -$(window).width()}, 0 );
				theme.progressBar();
			}
		},
	 	
	 	/* Play & Pause Toggle
		----------------------------*/
	 	playToggle : function(state){
	 		
	 		if (state =='play'){
	 			// If image, swap to pause
	 			if ($(vars.play_button).attr('src')) $(vars.play_button).attr("src", vars.image_path + "pause.png");
				if (api.options.progress_bar && !vars.is_paused) theme.progressBar();
	 		}else if (state == 'pause'){
	 			// If image, swap to play
	 			if ($(vars.play_button).attr('src')) $(vars.play_button).attr("src", vars.image_path + "play.png");
        		if (api.options.progress_bar && vars.is_paused)$(vars.progress_bar).stop().animate({left : -$(window).width()}, 0 );
	 		}
	 		
	 	},
	 	
	 	
	 	/* Before Slide Transition
		----------------------------*/
	 	beforeAnimation : function(direction){
		    if (api.options.progress_bar && !vars.is_paused) $(vars.progress_bar).stop().animate({left : -$(window).width()}, 0 );
		  	
		  	/* Update Fields
		  	----------------------------*/
		  	// Update slide caption
		   	if ($(vars.slide_caption).length){
		   		(api.getField('title')) ? $(vars.slide_caption).html(api.getField('title')) : $(vars.slide_caption).html('');
		   	}
		   	if ($(vars.slide_excerpt).length){
		   	(api.getField('desc')) ? $(vars.slide_excerpt).html(function(){ $(vars.image_info_icon).show(); return api.getField('desc'); }) : $(vars.slide_excerpt).html(function(){ $(vars.image_info_icon).hide(); return 'Falabalam'; }); 
		   	}
		    // Update slide number
			if (vars.slide_current.length){
			    $(vars.slide_current).html(vars.current_slide + 1);
			}
		    
		    
		    // Highlight current thumbnail and adjust row position
		    if (api.options.thumb_links){
		    
				$('.current-thumb').removeClass('current-thumb');
				$('li', vars.thumb_list).eq(vars.current_slide).addClass('current-thumb');
				
				// If thumb out of view
				if ($(vars.thumb_list).width() > $(vars.thumb_tray).width()){
					// If next slide direction
					if (direction == 'next'){
						if (vars.current_slide == 0){
							vars.thumb_page = 0;
							$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
						} else if ($('.current-thumb').offset().left - $(vars.thumb_tray).offset().left >= vars.thumb_interval){
	        				vars.thumb_page = vars.thumb_page - vars.thumb_interval;
	        				$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
						}
					// If previous slide direction
					}else if(direction == 'prev'){
						if (vars.current_slide == api.options.slides.length - 1){
							vars.thumb_page = Math.floor($(vars.thumb_list).width() / vars.thumb_interval) * -vars.thumb_interval;
							if ($(vars.thumb_list).width() <= -vars.thumb_page) vars.thumb_page = vars.thumb_page + vars.thumb_interval;
							$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
						} else if ($('.current-thumb').offset().left - $(vars.thumb_tray).offset().left < 0){
							if (vars.thumb_page + vars.thumb_interval > 0) return false;
	        				vars.thumb_page = vars.thumb_page + vars.thumb_interval;
	        				$(vars.thumb_list).stop().animate({'left': vars.thumb_page}, {duration:500, easing:'easeOutExpo'});
						}
					}
				}
				
				
			}
		    
	 	},
	 	
	 	
	 	/* After Slide Transition
		----------------------------*/
	 	afterAnimation : function(){
	 		if (api.options.progress_bar && !vars.is_paused) theme.progressBar();	//  Start progress bar
	 	},
	 	
	 	
	 	/* Progress Bar
		----------------------------*/
		progressBar : function(){
    		$(vars.progress_bar).stop().animate({left : -$(window).width()}, 0 ).animate({ left:0 }, api.options.slide_interval);
    	}
	 	
	 
	 };
	 
	 
	 /* Theme Specific Variables
	 ----------------------------*/
	 $.supersized.themeVars = {
	 	
	 	// Internal Variables
		progress_delay		:	false,				// Delay after resize before resuming slideshow
		thumb_page 			: 	false,				// Thumbnail page
		thumb_interval 		: 	false,				// Thumbnail interval
		image_path			:	'/wp-content/themes/view/supersized/slideshow/img/',				// Default image path
													
		// General Elements							
		play_button			:	'#pauseplay',		// Play/Pause button
		next_slide			:	'#nextslide',		// Next slide button
		prev_slide			:	'#prevslide',		// Prev slide button
		next_thumb			:	'#nextthumb',		// Next slide thumb button
		prev_thumb			:	'#prevthumb',		// Prev slide thumb button
		thumbgridlink		:	'#large-grid',		// THumbnail grid link
		
		/* slide_caption		:	'#slidecaption',	// Slide caption  */
		/* slide_caption		:	'.entry-title',		// Slide caption  */
		slide_excerpt		:	'.entry-content-caption',	// Excerpt for image - to be placed into content area 
		image_info_icon		:	'#image-info',
		slide_current		:	'.slidenumber',		// Current slide number
		slide_total			:	'.totalslides',		// Total Slides
		slide_list			:	'#slide-list',		// Slide jump list							
		thumb_tray_cont		:	'#thumb-g-container',// Thumb Tray conatinaing div
		thumb_tray			:	'#thumb-tray',		// Thumbnail tray
		thumb_list			:	'#thumb-list',		// Thumbnail list
		thumb_forward		:	'#thumb-forward',	// Cycles forward through thumbnail list
		thumb_back			:	'#thumb-back',		// Cycles backwards through thumbnail list
		tray_arrow			:	'#tray-arrow',		// Thumbnail tray button arrow
		tray_button			:	'#tray-button',		// Thumbnail tray button
		
		progress_bar		:	'#progress-bar'		// Progress bar
	 												
	 };												
	
	 /* Theme Specific Options
	 ----------------------------*/												
	 $.supersized.themeOptions = {					
	 						   
		progress_bar		:	1,		// Timer for each slide											
		mouse_scrub			:	0		// Thumbnails move with mouse
		
	 };
	
	
})(jQuery);