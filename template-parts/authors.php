<?php
/**
* Template Name: Author list
 *
 */

get_header();

/** Left sidebar */
get_sidebar();

?>
	<main id="primary" role="main">
			<header class="page-header">
				<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-wrapper' ); ?>>
	<div class="post-thumbnail">
			</div><!-- .post-thumbnail -->

	<div class="entry-content">

		<div class="lgc-column lgc-grid-parent lgc-grid-50 lgc-tablet-grid-50 lgc-mobile-grid-100 lgc-equal-heights  lgc-first" ><div class="inside-grid-column">
<?php 
$image1 = get_field('photo1');
if( !empty( $image1 ) ): ?>
    <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" />
<?php endif; ?>
<?php if( get_field('name1') ): ?>
	<h3><?php the_field('name1'); ?></h3>
<?php endif; ?>
<?php if( get_field('biography1') ): ?>
	<?php the_field('biography1'); ?>
<?php endif; ?>
<?php 
$rows1 = get_field('links1');
if($rows1){
	echo '<p>';
	foreach($rows1 as $row)
		echo '<a class="links-author" href="'.$row['link1'].'" '.$row['new_window1'][0].'>'.$row['label1'].'</a> ';
	echo '</p>';
}
?>


</div></div>

<div class="lgc-column lgc-grid-parent lgc-grid-50 lgc-tablet-grid-50 lgc-mobile-grid-100 lgc-equal-heights  lgc-last"><div class="inside-grid-column">
<?php 
$image2 = get_field('photo2');
if( !empty( $image2 ) ): ?>
    <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
<?php endif; ?>
<?php if( get_field('name2') ): ?>
	<h3><?php the_field('name2'); ?></h3>
<?php endif; ?>
<?php if( get_field('biography2') ): ?>
	<?php the_field('biography2'); ?>
<?php endif; ?>
<?php 
$rows1 = get_field('links2');
if($rows1){
	echo '<p>';
	foreach($rows1 as $row)
		echo '<a class="links-author" href="'.$row['link2'].'" '.$row['new_window2'][0].'>'.$row['label2'].'</a> ';
	echo '</p>';
}
?>

</div></div>	</div><!-- .entry-content -->

		</article>
			<?php
			/*while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			} // End of the loop.
			*/?>
		</main><!-- #primary -->
<?php

get_footer();
