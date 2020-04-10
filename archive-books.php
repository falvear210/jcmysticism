<?php
/**
* 
 */

get_header();

/** Left sidebar */
get_sidebar();


?>
<main id="primary" role="main" class="two-column blog">
<?php

if( have_posts() ) { ?>
<header class="page-header">
<?php
	the_archive_title( '<h1 class="page-title">', '</h1>' );
	the_archive_description( '<div class="archive-description">', '</div>' );
?>
</header><!-- .page-header -->
<?php
  while( have_posts() ) {
    the_post();
    $url = esc_url(get_field('url'));
    $download = get_field('downloadable_file');
	if( $download ): 
		$url = esc_url( $download['url'] );
	endif; 
    ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-wrapper' ); ?> style="background-color: #f5f5f5">
	<header class="entry-header">
		<?php
		the_title( '<h2 class="entry-title"><a href="' . $url . '" rel="bookmark" target="_blank">', '</a></h2>' );
		?>
		<?php if( get_field('title_2') ): ?>
			<h5><?php echo get_field('title_2'); ?></h5>
		<?php endif; ?>
	<ul class="entry-meta clearfix">
		<li>
			<span class="posted-in">
				<?php
				$authors = get_the_terms( get_the_id(), 'book_authors');
				foreach ($authors as $author) {
					echo '<a href="' . esc_url( get_term_link( $author->term_id ) ) . ' " rel="category tag">' . esc_html( $author->name ) . '</a>';
				}
				?>
			</span>
		</li>
	</ul>
	</header><!-- .entry-header -->

	<?php
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
	?>
	<div class="blog-content">
		<div class="book-info"><?php the_field('description'); ?></div>
		<footer class="entry-footer">
			<?php if( get_field('url') ): ?>
				<a class="more-link" href="<?php echo esc_url( get_field('url') ); ?>" target="_blank">More info</a>
			<?php endif; ?>
			<?php if( $download ): ?>
				<a class="more-link" href="<?php echo esc_url( $download['url'] ); ?>" target="_blank">Download</a>
			<?php endif; ?>	
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->


    <?php
  }
    do_action( 'aeonblog_action_navigation' );

}
else {
  echo 'Oh ohm no books!';
}

  ?>


	
	
<?php

get_footer();
