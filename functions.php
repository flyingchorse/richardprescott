<?php
/**
 * Toolbox functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */




/**
 * This theme was built with PHP, Semantic HTML, CSS, love, and a Toolbox.
 */
 
/*
function custom_init()
{
if ( is_page_template('full-screen-page.php') ) {
wp_enqueue_script('supersized_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/supersized.3.2.5.min.js', array('jquery'));
wp_enqueue_script('supersized_theme_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/theme/supersized.shutter.js', array('jquery'));
}
}
add_action('init', 'custom_init');
*/

function CustomThumbs(){
add_image_size('feature_thumb',112,75, true);
add_image_size('slide_image',970,400, true);
}
add_action('init','CustomThumbs');

function register_my_menus() {
  register_nav_menus(
    array('secondary-menu' => __( 'Secondary Menu ') )
  );
}

add_action( 'init', 'register_my_menus' );


/* register hook to add secondary navigation */
function thematic_scndnav() {
    do_action('thematic_scndnav');
} // end thematic_scndnav


function add_service_menu(){
wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'container_class' => 'secondary_menu_class', 'container_id' => 'secondary-menu-id' ) );
}

/* Add hook to add secondary navigation */
add_action('thematic_scndnav','add_service_menu');



function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}    
 
add_action('wp_enqueue_scripts', 'my_scripts_method');



function custom_styles()
{
if ( is_page_template('full-screen-page.php') ) {
wp_enqueue_script('easing_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/jquery.easing.min.js', array('jquery'));
wp_enqueue_script('supersized_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/supersized.3.2.5.min.js', array('jquery'));
wp_enqueue_script('supersized_theme_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/theme/supersized.shutter.js', array('jquery'));
wp_enqueue_style('supersized_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/css/supersized.css');
wp_enqueue_style('supersized_theme_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/theme/supersized.shutter.css');
}
if ( is_page_template('alternate-homepage.php') ) {
wp_enqueue_script('easing_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/jquery.easing.min.js', array('jquery'));
wp_enqueue_script('supersized_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/supersized.3.2.5.js', array('jquery'));
wp_enqueue_script('supersized_theme_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/theme/supersized.shutter.js', array('jquery'));
wp_enqueue_style('supersized_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/css/supersized.css');
wp_enqueue_style('supersized_theme_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/theme/supersized.shutter.css');
}

if ( is_page_template('gallery-page.php') ) {
wp_enqueue_script('slideshow_js', get_bloginfo('stylesheet_directory'). '/js/slideshow.js', array('jquery'));
}
if ( is_page_template('simple-page.php') ) {
wp_enqueue_script('visual_js', get_bloginfo('stylesheet_directory'). '/js/visual-functions.js', array('jquery'));
}

if ( is_page_template('resizegallery-page.php') ) {
wp_enqueue_script('easing_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/jquery.easing.min.js', array('jquery'));
wp_enqueue_script('supersized_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/supersized.3.2.5.js', array('jquery'));
wp_enqueue_script('supersized_theme_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/theme/supersized.shutter.js', array('jquery'));
wp_enqueue_style('supersized_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/css/supersized.css');
wp_enqueue_style('supersized_theme_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/theme/supersized.shutter.css');
}
if ( is_page_template('automotive-gallery-page.php') ) {
wp_enqueue_script('easing_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/jquery.easing.min.js', array('jquery'));
wp_enqueue_script('supersized_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/supersized.3.2.5.js', array('jquery'));
wp_enqueue_script('supersized_theme_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/theme/supersized.shutter.js', array('jquery'));
wp_enqueue_style('supersized_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/css/supersized.css');
wp_enqueue_style('supersized_theme_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/theme/supersized.shutter.css');
}
if ( is_page_template('places-gallery-page.php') ) {
wp_enqueue_script('easing_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/jquery.easing.min.js', array('jquery'));
wp_enqueue_script('supersized_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/supersized.3.2.5.js', array('jquery'));
wp_enqueue_script('supersized_theme_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/theme/supersized.shutter.js', array('jquery'));
wp_enqueue_style('supersized_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/css/supersized.css');
wp_enqueue_style('supersized_theme_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/theme/supersized.shutter.css');
}

if (is_page_template('thumbnail-overview.php')){
wp_enqueue_script('scroll_area', get_bloginfo('stylesheet_directory'). '/js/jquery.jscrollpane.min.js', array('jquery'));
wp_enqueue_script('mouse_wheel', get_bloginfo('stylesheet_directory'). '/js/jquery.mousewheel.js', array('jquery'));
wp_enqueue_style('scroll_area_style', get_bloginfo('stylesheet_directory') .'/js/jquery.jscrollpane.css');
wp_enqueue_script('scroll_area_activate', get_bloginfo('stylesheet_directory'). '/js/js_active.js', array('jquery'));


}


}
add_action('wp_print_styles', 'custom_styles');

add_action( 'init', 'register_cpt_gal_image' );

function register_cpt_gal_image() {

    $labels = array( 
        'name' => _x( 'Gallery Images', 'gal_image' ),
        'singular_name' => _x( 'Image', 'gal_image' ),
        'add_new' => _x( 'Add New', 'gal_image' ),
        'add_new_item' => _x( 'Add New Image', 'gal_image' ),
        'edit_item' => _x( 'Edit Image', 'gal_image' ),
        'new_item' => _x( 'New Image', 'gal_image' ),
        'view_item' => _x( 'View Image', 'gal_image' ),
        'search_items' => _x( 'Search Gallery Images', 'gal_image' ),
        'not_found' => _x( 'No gallery images found', 'gal_image' ),
        'not_found_in_trash' => _x( 'No gallery images found in Trash', 'gal_image' ),
        'parent_item_colon' => _x( 'Parent Image:', 'gal_image' ),
        'menu_name' => _x( 'Gallery Images', 'gal_image' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'An image for constructing special galleries',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes','Template' ),
        'taxonomies' => array( 'category', 'page-category', 'automotive', 'cgi', 'places', 'people' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'gal_image', $args );
}

function Add_thumbnails()
{
if ( is_page_template('thumbnail-overview.php') ) {
 get_template_part( 'thumbgrid', 'page' ); 
 }
 }
 
 add_action('thematic_belowheader','Add_thumbnails');



// Just after the header div
function thematic_belowheader() {
    do_action('thematic_belowheader');
} // end thematic_belowheader

function thematic_belowpost() {
    do_action('thematic_belowpost');
} // end thematic_belowpost

/* thematic_belowpost(); */ 

function digi_sub_childposts($digi_parent)
{

// Get all the posts which have a custom field called gallery with the value set to 1
// which we will then iterate through to get the postID's we can then
// use the funstion to retrieve the attachments using the parent ID.
// also need to do a test to see how many articles to decide how many attachments to pull

global $post;
$tmp_post = $post;

$digi_sub_posts = array();

	$args = array(
				'numberposts' => -1 ,
				'post_type' => 'page',
				'order' => 'ASC' , 
				'orderby' => 'menu_order',
				'meta_query' => array(
						array(
								'key' => 'gallery',
								'value' => '1',
								'compare' => '='
							)
						)
					); 
	
	$digi_subs = get_posts($args);
	$loopcount = 0;
	if ($digi_subs) {
	$nochildren = "Yesy";
	foreach ( $digi_subs as $digi_sub ) {
	
				// echo apply_filters( 'the_title' , $attachment->post_title );
				
			$sub_children = digi_get_childposts($digi_sub->ID);
						
			for ($i_sub_child = 0; $i_sub_child < count($sub_children); ++$i_sub_child) {	
			$digi_sub_posts[$loopcount] = array("postID"=>$sub_children[$i_sub_child]['postID'],
												  "title"=>$sub_children[$i_sub_child]['Title']);
			$loopcount = $loopcount + 1;
			}

				
			
				}
			}
			else
			{
			$nosubs = "Nochilderen";
			}


if (!$digi_sub_posts){
$digi_sub_posts[0]= "failed";
$digi_sub_posts[1] = $digi_parent;
$digi_sub_posts[2] = $nochildren;
}


return $digi_sub_posts;



}





function digi_get_childposts($digi_parent)
{

// Get all the posts related to the thumbnail month and assign to an array
// which we will then iterate through to get the postID's we can then
// use the funstion to retrieve the attachments using the parent ID.
// also need to do a test to see how many articles to decide how many attachments to pull

global $post;
$tmp_post = $post;

$digi_child_posts = array();

	$args = array('numberposts' => -1 ,'post_type' => 'page', 'post_parent' => $digi_parent, 'order' => 'ASC' , 'orderby' => 'menu_order'); 
	
	$digi_children = get_posts($args);
	$loopcount = 0;
	if ($digi_children) {
	$nochildren = "Yesy";
	foreach ( $digi_children as $digi_kid ) {
				// echo apply_filters( 'the_title' , $attachment->post_title );
			$digi_child_posts[$loopcount] = array("postID"=>$digi_kid->ID,
												  "title"=>$digi_kid->post_excerpt);
			$loopcount = $loopcount + 1;
				}
			}
			else
			{
			$nochildren = "Nochilderen";
			}


if (!$digi_child_posts){
$digi_child_posts[0]= "failed";
$digi_child_posts[1] = $digi_parent;
$digi_child_posts[2] = $nochildren;
}
return $digi_child_posts;



}

function thumbnail_overview()
{
global $post;
 	$digi_cat =  get_the_category(); 
	$childpost = digi_sub_childposts($post->ID);

/* Test code to see what info coming out of function.*/
/* echo "**********-------------  ". $post->ID; */
/*
echo "  ****--***  " . $childpost[0]['postID'];
echo "  ****--***  " . $childpost[1]['postID'];
echo "  ****--***  " . $childpost[2]['postID'];
*/



		$i = 0;
		$counter = 1;
		$slidecounter = 1;

		 do {
				$args = array('post_type' => 'attachment' ,'numberposts' => -1, 'post_parent' => $childpost[$i]['postID'], 'order' => 'ASC' , 'orderby' => 'menu_order' ); 
				$attachments = get_posts($args);
		
				if ($attachments) {
				foreach ( $attachments as $attachment ) {
				// echo apply_filters( 'the_title' , $attachment->post_title );
				$imageloader =  wp_get_attachment_image_src($attachment->ID,'feature_thumb');
				
				?>
				<div class="gallery-thumbnail">
					<a href="<?php $gallery_url =  get_permalink($childpost[$i]['postID']) . "?slide_id=" .  $slidecounter; echo $gallery_url ; ?>"><img src="<?php echo $imageloader[0]; ?>"/></a>
				</div>
				<?php
				$counter++;
				$slidecounter++;
				}
			}
			$slidecounter = 1;
			$i++;
			
		} while ($i<=(count($childpost)-1));
		
		for ($b = $counter; $b <= 56; $b++) {
    		?><div class="gallery-thumbnail"></div><?php;
			}
		
		 
}	 
		 
add_action('thematic_belowpost','thumbnail_overview');	 
		 
// $gallery_url =  get_permalink($childpost[$i]['postID']); echo $gallery_url;


function child_pages(){
global $post;

$mypages = get_pages('child_of='.$post->ID.'&sort_column=post_date&sort_order=desc&parent='.$post->ID);
	$postcounter = count($mypages);
	foreach($mypages as $post) :  setup_postdata($post);
	
		/*
$content = $post->the_post_content;
		if(!$content) // Check for empty page
			continue;
*/
		?><div class="gallery-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('feature_thumb');  ?></a><?php
		
		?>
		</div>
	<?php
	endforeach;
	for ( $counter = $postcounter; $counter <= 39; $counter += 1)
	{
?>	<div class="gallery-thumbnail"></div><?php
	}
}
/* add_action('thematic_belowpost','child_pages'); */

function thematic_belowmenu() {
    do_action('thematic_belowmenu');
} // end thematic_aboveheader


function slideshow() {
global $post;
if ( is_page_template('gallery-page.php') ) {
?>
<div id="slide-container"><div id="art-slideshow"> <?php
$args = array('post_type' => 'attachment' ,'post_parent' => $post->ID  ); 
			$attachments = get_posts($args);
			$loopcount = 1;
			if ($attachments) {
				foreach ( $attachments as $attachment ) {
				// echo apply_filters( 'the_title' , $attachment->post_title );
				$imageloader =  wp_get_attachment_image_src($attachment->ID,'slide_image');
				?>
				 <img class="slide-image <?php if ($loopcount == 1) { echo 'active';} ?>" src="<?php echo $imageloader[0]; ?>" width="970" height="400" alt="<?php echo $template_name ?>"/>
				<?php 
				
				$loopcount = $loopcount + 1;
				}
			}


?></div></div><?php
//end action:
}}
//now we can add our new action to the appropriate place like so:

add_action('thematic_belowheader', 'slideshow' ,0); 

function addThumbnails() {
global $post;
if ( is_page_template('gallery-page.php') ) {
?>
<div id="thumb-container"><div id="gallery-thumbnails"><ul id="thumbnails"><?php
$args = array('post_type' => 'attachment' ,'post_parent' => $post->ID  ); 
			$attachments = get_posts($args);
			$loopcount = 1;
			if ($attachments) {
				foreach ( $attachments as $attachment ) {
				// echo apply_filters( 'the_title' , $attachment->post_title );
				$imageloader =  wp_get_attachment_image_src($attachment->ID,'feature_thumb');
				?>
				<li class="thumbnail-items"><img class="gallery-thumbs<?php if ($loopcount == 1) { echo 'active';} ?>" src="<?php echo $imageloader[0]; ?>" width="75" height="50" alt="<?php echo $template_name ?>"/></li> 
				<?php 
				
				$loopcount = $loopcount + 1;
				}
			}


?></ul></div></div><?php
//end action:
}

}

add_action('thematic_belowheader', 'addThumbnails' ,1); 



function next_page_not_post($anchor='',$loop=NULL, $getPagesQuery='sort_column=menu_order&sort_order=asc') {
	global $post;
	

	// cousins will have a similar grandparent
	// find the grandparent
	// query the children of common grandparent
	// combine to get all cousins
	if ($loop == 'cousins' || $loop == 'cousinsloop') {
		$getPages = array();
		$ancestors = get_post_ancestors($post->ID);
		
		// grandparent is $ancestors[1]
		$pageUncle = get_pages('child_of='. $ancestors[1] . '&parent='.$ancestors[1] . '&' . $getPagesQuery);
		
		foreach ($pageUncle as $uncle) {
			$cousins = get_pages('child_of='. $uncle->ID . '&parent='.$uncle->ID . '&' . $getPagesQuery);
			$getPages = array_merge($getPages, $cousins);
			unset($cousins);
		}
	} elseif ($loop != 'expand') $getPagesQuery .= '&parent='.$post->post_parent;
	
	// only query if we don't have results from cousins
	if (!is_array($getPages)) $getPages = get_pages('child_of='.$post->post_parent.'&'.$getPagesQuery);
	
	
	$pageCount = count($getPages);
	
	for($p=0; $p < $pageCount; $p++) {
	  	// get the array key for our entry
		if ($post->ID == $getPages[$p]->ID) break;
	}
	
	// assign our next key
	$nextKey = $p+1;
	
	// if there isn't a value assigned for the previous key, go all the way to the end
	if (isset($getPages[$nextKey])) {
		$anchorName = $getPages[$nextKey]->post_title;
		$output = get_permalink($getPages[$nextKey]->ID);
	}
	elseif ($loop == 'expand') {
		// fixed by banesto
		// http://wordpress.org/support/topic/plugin-next-page-not-next-post-link-from-child-to-grand-parent-does-not-work
		// query parent page level, and then loop to find next entry, eke!
		// get grandparent id
		$parentInfo = get_page($post->post_parent);
	
		// query the level above's pages
		// $getParentPages = get_pages('child_of='.$parentInfo->post_parent.'&parent='.$parentInfo->post_parent.'&'.$getPagesQuery);
		$getParentPages = get_pages($getPagesQuery);

		$parentPageCount = count($getParentPages);
	
		for($pp=0; $pp < $parentPageCount; $pp++) {
	  		// get the array key for our entry
			// if ($post->post_parent == $getParentPages[$pp]->ID) break;
			if ($post->ID == $getParentPages[$pp]->ID) break;
		}
	
		// assign our next key
		$parentNextKey = $pp+1;
		
		if (isset($getParentPages[$parentNextKey])) {
			$anchorName = $getParentPages[$parentNextKey]->post_title;
			$output = get_permalink($getParentPages[$parentNextKey]->ID);
		}
	}	
	elseif (isset($loop) && ($loop != 'cousins')) {
		$anchorName = $getPages[0]->post_title;		
		$output = get_permalink($getPages[0]->ID);
	}
	
	/* determine if we have a link and assign some anchor text
	if ($output) {
		if ($anchor == '') {
			$output .= $anchorName;
		} else {
			$output .= str_replace('%title', $anchorName, $anchor);
		}	
	  $output .= '</a>';
	}
	*/

	return $output;
}

function previous_page_not_post($anchor='',$loop=NULL, $getPagesQuery='sort_column=menu_order&sort_order=asc') {
	global $post;
	 
	
	// cousins will have a similar grandparent
	// find the grandparent
	// query the children of common grandparent
	// combine to get all cousins
	if ($loop == 'cousins' || $loop == 'cousinsloop') {
		$getPages = array();
		$ancestors = get_post_ancestors($post->ID);
		
		// grandparent is $ancestors[1]
		$pageUncle = get_pages('child_of='. $ancestors[1] . '&parent='.$ancestors[1] . '&' . $getPagesQuery);
		
		foreach ($pageUncle as $uncle) {
			$cousins = get_pages('child_of='. $uncle->ID . '&parent='.$uncle->ID . '&' . $getPagesQuery);
			$getPages = array_merge($getPages, $cousins);
			unset($cousins);
		}
	} 	
	
	// only query if we don't have results from cousins
	if (!is_array($getPages)) $getPages = get_pages('child_of='.$post->post_parent.'&'.$getPagesQuery);
	
	$pageCount = count($getPages);
	
	for($p=0; $p < $pageCount; $p++) {
	  // get the array key for our entry
		if ($post->ID == $getPages[$p]->ID) break;
	}
	
	// assign our next & previous keys
	$prevKey = $p-1;
	$lastKey = $pageCount-1;
	
	// if there isn't a value assigned for the previous key, go all the way to the end
	if (isset($getPages[$prevKey])) {
		$anchorName = $getPages[$prevKey]->post_title;
		$output = get_permalink($getPages[$prevKey]->ID);
	}
	elseif ($loop == 'expand') {
		if ($post->post_parent != 0) {
			$anchorName = get_the_title($post->post_parent);		
			$output = get_permalink($post->post_parent);
		}
	}
	elseif (isset($loop) && ($loop != 'cousins')) {
		$anchorName = $getPages[$lastKey]->post_title;		
		$output = get_permalink($getPages[$lastKey]->ID);
	} 

	
	// determine if we have a link and assign some anchor text
/*
	if ($output) {
		if ($anchor == '') {
			$output .= $anchorName;
		} else {
			$output .= str_replace('%title', $anchorName, $anchor);			
		}	
	  $output .= '</a>';
	}
*/

	return $output;
}

?>