<?php
/**
 * Template Name: Middle Column for page
 * Template Post Type: page

 */

get_header();

/** Left sidebar */
//get_sidebar();

?>

	<main id="primary" role="main" class="col-md-8 col-sm-8 col-sm-push-2">

		<?php if (is_front_page()) echo do_shortcode('[metaslider id="448"]'); ?>

			<header class="page-header">
				<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<?php
			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content', 'page' );
			} // End of the loop.
			?>
<?php if( is_front_page()) { ?> 

		<div style="padding: 0 30px 30px;" class="content-search">
			<h2>Search</h2>
			<?php get_search_form(); ?>
		</div>
		<div style="padding: 0 30px;">
			<h2>Explore by topics</h2>
			<ul class="list-group">
			    <?php wp_list_categories( array(
			        'title_li' => '',
			        'show_count' => 1
			    ) ); ?> 
			</ul>
		</div>
		
<?php
$args = array(
    'post_type' => 'books',
    'tax_query' => array(
        array(
            'taxonomy' => 'book_types',
            'field'    => 'slug',
            'terms'    => 'jewish-roots-of-christian-mysticism-series',
        ),
    ),
    'order'   => 'ASC',
);
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
    echo '<div style="padding: 0 30px;"><h2>Books of the Series</h2>';
    $count = 0;
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $url = esc_url(get_field('url'));
    	$download = get_field('downloadable_file');
		if( $download )	$url = esc_url( $download['url'] );
		echo '<div class="lgc-column lgc-grid-parent lgc-grid-25 lgc-tablet-grid-25 lgc-mobile-grid-50 lgc-equal-heights "><div class="inside-grid-column">';

		if ( has_post_thumbnail() ) {
			?>
			<div class="featured-wrapper <?php echo esc_attr( $blog_full_image ); ?>">
				<div class="post-thumbnail">
				<?php if( $url ){ ?>
					<a href="<?php echo $url; ?>" target="_blank"><?php the_post_thumbnail( 'small' ); ?></a>
				<?php }else{ ?>
					<?php the_post_thumbnail( 'small' ); ?>
				<?php }; ?>

				</div>
			</div>
			<?php
		}
		echo '<h5>' . get_the_title() . '</h5>';
        //if( get_field('title_2') ) echo '<h6>'.get_field('title_2').'</h6>';
?>
	<div class="blog-content">
		<div class="book-info" style="font-size: 13px;"><?php the_field('description'); ?></div>
		<footer class="entry-footer">
			<?php if( get_field('url') ): ?>
				<a class="more-link" href="<?php echo esc_url( get_field('url') ); ?>" target="_blank">More info</a>
			<?php endif; ?>
			<?php if( $download ): ?>
				<a class="more-link" href="<?php echo esc_url( $download['url'] ); ?>" target="_blank">Download</a>
			<?php endif; ?>	
		</footer><!-- .entry-footer -->
	</div>
<?php
		$count = $count + 1;
		echo '</div></div>';
		if ($count == 4) {
			echo '<div class="lgc-clear"></div>';
			$count = 0;
		}
    }
    echo '</div>';
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

?>

			<?php } ?>

		</main><!-- #primary -->
<?php

get_footer();
