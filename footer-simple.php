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
<header id="branding" role="banner">
		<div id="brandbar">
		<nav id="access" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'toolbox' ); ?></h1>
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'toolbox' ); ?>"><?php _e( 'Skip to content', 'toolbox' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
		<div id="large-grid"><a href="<?php echo home_url("?page_id=711");?>"><span id="large-grid-link"></span></a></div>
</div>
		</header><!-- #branding -->
			
		
<?php wp_footer(); ?>

</body>
</html>