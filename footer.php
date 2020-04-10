<?php
/**
 * File aeonblog.
 *
 * @package   AeonBlog
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2019, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
</div><!-- #content -->

<div class="site-footer"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.jpg" width="401" height="400" style="margin: 0 auto 20px; display:block;" />
	<?php
	if ( has_nav_menu( 'social' ) ) {
		?>
			<nav class="social-icons-footer footer-social-menu-navigation" aria-label="<?php esc_attr_e( 'Social', 'aeonblog' ); ?>" role="navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'social',
						'menu_class'     => 'aeonblog-menu-social',
						'depth'          => 1,
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>' . aeonblog_get_svg( array( 'icon' => 'chain' ) ),
						'container'      => false,
					)
				);
				?>
			</nav>
		<?php
	}
	?>


	<footer id="colophon" role="contentinfo">

		<div class="copyright">
			<?php echo wp_kses_post( get_theme_mod( 'aeonblog-copyright-text', __( 'All Rights Reserved', 'aeonblog' ) ) ); ?>
		</div>


		<?php
		/**
		 * Go to Top Option.
		 */
		do_action( 'aeonblog_go_to_top_hook' );
		?>
	</footer><!-- #colophon -->
</div>
<?php wp_footer(); ?>
</body>
</html>
