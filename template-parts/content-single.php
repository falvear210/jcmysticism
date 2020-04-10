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

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-wrapper' ); ?>>
	<header class="entry-header">

		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
		<!-- AUTHOR information top-->
<?php
if ( function_exists( 'get_coauthors' ) ) {
    $coauthors = get_coauthors();
    foreach( $coauthors as $coauthor ){
    	$archive_link = get_author_posts_url( $coauthor->ID, $coauthor->user_nicename ); ?>
		<div>
		    <div style="display: flex; margin-bottom: 10px">
		        <div>
		            <a rel="noopener" href="#"><?php echo coauthors_get_avatar($coauthor,48); ?>
		            </a>
		        </div>
		        <div style="width: 100%; display: block; margin-left: 10px;">
		            <div style="display: flex">
		                <span style="font-weight: 700"><?php echo $coauthor->display_name; ?></span>
		        	</div>
		        	<div>
		        		<span style="padding: 2px 0;"><?php echo $coauthor->description; ?></span>
		        		<a class="view-author-posts" href="<?php echo esc_url( $archive_link ); ?>" title="<?php echo esc_attr( $coauthor->display_name ); ?>">View Entries</a>
		            </div>
		    	</div>
			</div>
		</div>

<?php 
		}

	} else {
	    the_author_posts_link();
}
?>



<!--
		<ul class="entry-meta clearfix">
			<li><span class="author vcard">
				<?php
				//echo aeonblog_get_svg( array( 'icon' => 'user' ) );
				?>
				<i class="fa fa-user" aria-hidden="true"></i> 
				<?php //aeonblog_posted_by(); ?></span>
			</li>
			<li>
				<?php
				//echo aeonblog_get_svg( array( 'icon' => 'clock' ) );
				//aeonblog_posted_on();
				?>
			</li>
		</ul>
		<ul class="entry-meta clearfix">
			<li>
				<span class="posted-in">
					<?php
					//$categories = get_the_category();
					//if ( ! empty( $categories ) ) {
					//	echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . ' " rel="category tag">' . esc_html( $categories[0]->name ) . '</a>';
					//}
					?>
				</span>
			</li>
		</ul>-->
	</header>
	<?php
	//if ( has_post_thumbnail() ) {
	if (false){
		?>
		<div class="featured-wrapper">
			<div class="post-thumbnail">
				<?php the_post_thumbnail( 'small' ); ?>
			</div>
		</div>
		<?php
	}
	?>
	<div class="blog-content">
		<div class="entry-content">
			<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aeonblog' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<footer class="entry-footer" style="text-align: initial">

		<!-- Author info in footer -->

<?php
if ( function_exists( 'get_coauthors' ) ) {
    $coauthors = get_coauthors();
    foreach( $coauthors as $coauthor ){
    	$archive_link = get_author_posts_url( $coauthor->ID, $coauthor->user_nicename ); ?>

		<div>
		    <div style="display: flex; align-items: center; margin-top: 20px; ">
		        <div>
		            <a rel="noopener" href="#">
		            	<?php
		            	/*if ( function_exists ( 'mt_profile_img' ) ) {
						    $author_id = $post->post_author;
						    mt_profile_img( $author_id, 
						        array(
						            'size' => array( 80, 80),
						            'attr' => array( 'style' => 'border-radius: 50%; display: block; margin-right: 5px;'),
						            'echo' => true,
						        )
						    );
						} */
						echo coauthors_get_avatar($coauthor,80);
						?>            	
		            </a>
		        </div>
		        <div style="width: 70%; display: block; margin-left: 20px;">
		            <div style="display: initial">
		                <span class="" style="display: block; font-weight: 700; font-size: 1.5em"> <?php echo $coauthor->display_name; ?></span>
		            </div>  
		        </div>
		        <div>
		        	<a class="view-author-posts" href="<?php echo esc_url( $archive_link ); ?>" title="<?php echo esc_attr( $coauthor->display_name ); ?>">View Entries</a>
		        </div>
	    	</div>
	    	<div style="margin-left: 100px;">
	        		<span style="padding: 2px 0;"><?php echo $coauthor->description; ?></span> 
		    </div>
		</div>



<?php 
		}//end foreach

	} else {
	    the_author_posts_link();
}
?>









		</footer>
		<!--
		<?php //if ( has_tag() ) { ?>
			<footer class="entry-footer">
				<ul class="entry-meta clearfix">
					<li><?php //the_tags(); ?></li>
				</ul>
			</footer>
		<?php //} ?>-->
	</article><!-- #post-<?php //the_ID(); ?> -->
