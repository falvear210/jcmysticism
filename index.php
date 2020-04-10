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
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
/** Left sidebar */
get_sidebar( 'left' );
?>
	<main id="primary" role="main">
<?php if( !is_paged()) { ?> 

		<div style="padding: 0 30px 30px;" class="content-search">
			<h2>Search</h2>
			<?php get_search_form(); ?>
		</div>
		<div style="padding: 0 30px;">
			<h2>Categories</h2>
			<ul class="list-group">
			    <?php wp_list_categories( array(
			        'title_li' => '',
			        'show_count' => 1
			    ) ); ?> 
			</ul>
		</div>
			<?php } ?>

			<?php
			if ( have_posts() ) {
				if( is_home() ){ ?>
			<header class="page-header">
				<h2>All entries</h2>
			</header><!-- .page-header -->
			<?php
				}
				if ( is_home() && ! is_front_page() ) {
					?>
					<div>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</div>
					<?php
				}

				/* Start the Loop */
				while ( have_posts() ) {
					the_post();
					/**
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );
				}

				/**
				 * Aeonblog_post_navigation hook.
				 *
				 * @since AeonBlog 1.0.0
				 *
				 * @hooked aeonblog_posts_navigation -  10
				 */
				do_action( 'aeonblog_action_navigation' );

			} else {
				get_template_part( 'template-parts/content', 'none' );
			}
			?>
	</main><!-- #primary -->
<?php
//get_sidebar();

get_footer();
