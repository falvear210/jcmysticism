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
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

$read_more           = get_theme_mod( 'aeonblog-read-more-text', __( 'Continue Reading', 'aeonblog' ) );
$blog_meta           = get_theme_mod( 'aeonblog-blog-meta', 1 );
$blog_featured_image = get_theme_mod( 'aeonblog-blog-image', 1 );
$featured_image_full = get_theme_mod( 'aeonblog-blog-full-image', 0 );
$blog_full_image     = ( $featured_image_full == 0 ) ? '' : 'blog-full-image';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-wrapper' ); ?> style="background-color: #f5f5f5; margin-bottom: 10px;">
			<header class="entry-header">
			<?php
			if ( /*$blog_meta == 1*/ false ) {
				?>
				<ul class="entry-meta clearfix">
					<li>
						<?php
						echo aeonblog_get_svg( array( 'icon' => 'clock' ) );
						aeonblog_posted_on();
						?>
					</li>
					<li><span class="post-comments">
						<?php
						echo aeonblog_get_svg( array( 'icon' => 'comments' ) ) . ' ';
						comments_number();
						?>
					</span></li>
				</ul>
				<?php
			}

			if ( is_singular() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

			if ( /*$blog_meta == 1*/ false ) {
				?>
				<ul class="entry-meta clearfix">
					<li>
						<span class="posted-in">
							<?php
							$categories = get_the_category();
							if ( ! empty( $categories ) ) {
								echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . ' " rel="category tag">' . esc_html( $categories[0]->name ) . '</a>';
							}
							?>
						</span>
					</li>
				</ul>
			<?php } ?>




<?php
if ( function_exists( 'get_coauthors' ) ) {
    $coauthors = get_coauthors();?>
 <ul class="entry-meta clearfix">
	<li>
		<span class="author-link">By <?php coauthors_posts_links(); ?></span>
	</li>
</ul>
<?php
	} else {
	    ?>
<ul class="entry-meta clearfix">
		<li>
			<span class="author-link">By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a></span>
		</li>
</ul>
	    <?php
}
?>



			</header><!-- .entry-header -->

</article><!-- #post-<?php the_ID(); ?> -->
