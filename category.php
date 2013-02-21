<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */

get_header();

if (isset ($_GET['cat'])){
		$post_selected = $_GET['cat'];}

$mypages = get_posts('post_type=gal_image&category=4');
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
	
 get_footer(); ?>