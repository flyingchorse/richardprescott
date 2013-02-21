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
<div id="site-title">	

		<nav id="access" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'toolbox' ); ?></h1>
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'toolbox' ); ?>"><?php _e( 'Skip to content', 'toolbox' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
</div>
		<div id="content" role="main">
			<article class="post-439 page type-page status-publish hentry" id="post-439">
				<header class="entry-header">
				<h1 class="entry-title"></h1>
				</header><!-- .entry-header -->

				<div class="entry-content"></div><!-- .entry-content -->
			</article>
			</div><!-- #content -->
	</header><!-- #branding -->
			
		
<?php wp_footer(); ?>

</body>
</html>