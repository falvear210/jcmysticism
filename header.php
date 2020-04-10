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
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header id="masthead" class="site-header" role="banner">
		<!-- Start Header Branding -->
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-header.jpg" width="401" height="400" alt="" /></a>
		</div>
		<!-- End Header Branding -->
	<?php
	if ( has_nav_menu( 'primary' ) ) {
		?>
		<!-- Main Menu -->
		<nav id="site-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Header', 'aeonblog' ); ?>" class="main-navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
		<button id="mobile-menu-toggle" aria-controls="main-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'aeonblog' ); ?></button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_id'        => 'main-menu',
				'depth'          => 2,
				'container'      => 'ul',
			)
		);
		?>
		</nav><!-- #site-navigation -->
		<?php
	}
	?>
</header><!-- #masthead -->
<?php
if ( has_header_image() ) {
	the_custom_header_markup();
}

//do_action( 'aeonblog_breadcrumb_hook' );
?>
<div id="content" class="blog-wrapper">
