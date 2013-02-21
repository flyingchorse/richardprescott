<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			<div id="site-generator">
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<div id="thumb-g-container"><div id="thumb-g-margin">
<div id="thumb-tray-container"><div id="thumb-tray" class="load-item">
</div></div></div></div>
<header id="branding" role="banner">
		
	<div id="brandbar">
		<nav id="access" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'toolbox' ); ?></h1>
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'toolbox' ); ?>"><?php _e( 'Skip to content', 'toolbox' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
			<div id="thumb-button"><a id="tray-button"><img id="tray-arrow" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/supersized/slideshow/img/button-tray-up.png"/></a>
			</div>
			<?php /* $overview = "/?page_id=" . $post->post_parent; */ ?>

			<?php $overview = "thumbnail-overview/"; ?>

			<div id="large-grid"><a href="<?php echo home_url($overview);?>"><span id="large-grid-link"></span></a></div>

			<a id="prevslide" class="load-item"></a>
			<a id="nextslide" class="load-item"></a>
	
			

	</div>
</header><!-- #branding -->
			
		
<?php wp_footer(); ?>

</body>
</html>