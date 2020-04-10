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
 * AeonBlog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! function_exists( 'aeonblog_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aeonblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AeonBlog, use a find and replace
		 * to change 'aeonblog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aeonblog' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'aeonblog' ),
				'social'  => esc_html__( 'Social Menu', 'aeonblog' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'aeonblog_custom_background_args',
				array(
					'default-color' => 'f1f5f5',
					'default-image' => '',
				)
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for default block styles.
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'disable-custom-font-sizes' );

		/*
		 * Add support custom font sizes.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-font-sizes' );
		 */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'aeonblog' ),
					'shortName' => __( 'S', 'aeonblog' ),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Medium', 'aeonblog' ),
					'shortName' => __( 'M', 'aeonblog' ),
					'size'      => 25,
					'slug'      => 'medium',
				),
				array(
					'name'      => __( 'Large', 'aeonblog' ),
					'shortName' => __( 'L', 'aeonblog' ),
					'size'      => 31,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Larger', 'aeonblog' ),
					'shortName' => __( 'XL', 'aeonblog' ),
					'size'      => 39,
					'slug'      => 'larger',
				),
			)
		);
	}
}
add_action( 'after_setup_theme', 'aeonblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aeonblog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'aeonblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'aeonblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aeonblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 1', 'aeonblog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'aeonblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 2', 'aeonblog' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'aeonblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'aeonblog_widgets_init' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/47891
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if ( ! function_exists( 'aeonblog_skip_link' ) ) {
	/**
	 * Include a skip to content link at the top of the page so that users can bypass the menu.
	 */
	function aeonblog_skip_link() {
		echo '<a class="skip-link screen-reader-text" href="#content">' . esc_html__( 'Skip to content', 'aeonblog' ) . '</a>';
	}
	add_action( 'wp_body_open', 'aeonblog_skip_link', 5 );
}

if ( ! function_exists( 'aeonblog_fonts_url' ) ) {
	/**
	 * Register custom fonts.
	 * Credits:
	 * Twenty Seventeen WordPress Theme, Copyright 2016 WordPress.org
	 * Twenty Seventeen is distributed under the terms of the GNU GPL
	 */
	function aeonblog_fonts_url() {
		$fonts_url = '';

		$font_families   = array();
		$font_families[] = get_theme_mod( 'aeonblog_body_font', 'Open Sans' );
		$font_families[] = get_theme_mod( 'aeonblog_title_font', 'Josefin Sans' );

		$font_families = array_unique( $font_families );

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

		return esc_url_raw( $fonts_url );
	}
}

/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function aeonblog_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'aeonblog-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'aeonblog_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function aeonblog_scripts() {
	/*google font  */
	wp_enqueue_style( 'aeonblog-fonts', aeonblog_fonts_url(), array(), null );
	wp_enqueue_style( 'aeonblog-style', get_stylesheet_uri() );
	wp_style_add_data( 'aeonblog-style', 'rtl', 'replace' );
	wp_enqueue_style( 'aeonblog-print-css', get_template_directory_uri() . '/css/print.css', 'print' );

	wp_enqueue_script( 'aeonblog-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '4.6.0', true );
	wp_enqueue_script( 'aeonblog-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '4.5.0', true );
	wp_enqueue_script( 'aeonblog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( get_theme_mod( 'aeonblog-sticky-sidebar', 1 ) === 1 ) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js', array(), '20151215', true );
		wp_enqueue_script( 'aeonblog-sticky-sidebar', get_template_directory_uri() . '/js/sticky-sidebar.js', array(), '20151215', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aeonblog_scripts' );

if ( ! function_exists( 'aeonblog_editor_assets' ) ) {
	/**
	 * Add styles and fonts for the editor.
	 */
	function aeonblog_editor_assets() {
		wp_enqueue_style( 'aeonblog-fonts', aeonblog_fonts_url(), array(), null );
		wp_enqueue_style( 'aeonblog-blocks', get_theme_file_uri( '/css/block-editor.css' ), false );
	}
	add_action( 'enqueue_block_editor_assets', 'aeonblog_editor_assets' );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-fonts.php';
require get_template_directory() . '/inc/sanitize-functions.php';
require get_template_directory() . '/inc/class-customize.php';

/**
 * Custom Function Templates
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Loading breadcrumbs File.
 */
if ( ! function_exists( 'aeonblog_breadcrumb_trail' ) ) {
	require get_template_directory() . '/inc/breadcrumb.php';
}

/**
 * Load dynamic css file
*/
require get_template_directory() . '/inc/functions/dynamic-css.php';

//Fernando options


function wpb_add_google_fonts() {
 
//wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i|Source+Sans+Pro:400,700&display=swap&subset=cyrillic,cyrillic-ext,latin-ext', false ); 

wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Lora:700,700i|Source+Sans+Pro:400,400i,700&display=swap&subset=cyrillic', false ); 
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );








function edit_author_archive( $title ) {
	if ( is_author() ) {
		$title = sprintf( __( 'Entries by %s' ), '<span class="vcard">' . get_the_author() . '</span>' );
	}
	  return $title;

}
add_filter('get_the_archive_title','edit_author_archive');
//add_filter( 'body_class', 'my_neat_body_class');

function my_neat_body_class( $classes ) {
     if ( is_page_template('template-parts/blog.php') )
          $classes[] = 'middle-column';
 
     return $classes; 
}

// Register Custom Post Type
function books() {

	$labels = array(
		'name'                  => 'Books',
		'singular_name'         => 'Book',
		'menu_name'             => 'Books',
		'name_admin_bar'        => 'Book',
		'archives'              => 'Item Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Items',
		'add_new_item'          => 'Add New Item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'view_items'            => 'View Items',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Book',
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-book',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'books', $args );

}
add_action( 'init', 'books', 0 );
// Register Custom Taxonomy
function book_authors() {

	$labels = array(
		'name'                       => 'Book authors',
		'singular_name'              => 'Book author',
		'menu_name'                  => 'Book authors',
		'all_items'                  => 'All Items',
		'parent_item'                => 'Parent Item',
		'parent_item_colon'          => 'Parent Item:',
		'new_item_name'              => 'New Item Name',
		'add_new_item'               => 'Add New Item',
		'edit_item'                  => 'Edit Item',
		'update_item'                => 'Update Item',
		'view_item'                  => 'View Item',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No items',
		'items_list'                 => 'Items list',
		'items_list_navigation'      => 'Items list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => true,
	);
	register_taxonomy( 'book_authors', array( 'books' ), $args );

}
add_action( 'init', 'book_authors', 0 );

// Register Custom Taxonomy
function book_type() {

	$labels = array(
		'name'                       => 'Book type',
		'singular_name'              => 'Book type',
		'menu_name'                  => 'Book type',
		'all_items'                  => 'All Items',
		'parent_item'                => 'Parent Item',
		'parent_item_colon'          => 'Parent Item:',
		'new_item_name'              => 'New Item Name',
		'add_new_item'               => 'Add New Item',
		'edit_item'                  => 'Edit Item',
		'update_item'                => 'Update Item',
		'view_item'                  => 'View Item',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No items',
		'items_list'                 => 'Items list',
		'items_list_navigation'      => 'Items list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => true,
	);
	register_taxonomy( 'book_types', array( 'books' ), $args );

}
add_action( 'init', 'book_type', 0 );

add_filter( 'pre_get_posts', 'slug_cpt_category_archives' );
function slug_cpt_category_archives( $query ) {
if ( is_tax( 'book_authors') && $query->is_main_query()  )  {
    $query->set( 'post_type',
        array(
            'post',
            'books'
        )
    );
}
if ( is_tax( 'book_types') && $query->is_main_query()  )  {
    $query->set( 'post_type',
        array(
            'post',
            'books'
        )
    );
}

return $query;

}

add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {

        $title = single_cat_title( 'Topic: ', false );

    }
    if( is_post_type_archive('books') ) {

        $title = post_type_archive_title('',false);

    }
    if( is_tax( 'book_authors') ) {

        $title = single_term_title( 'Books by ', false );

    }
    if( is_tax( 'book_types') ) {

        $title = single_term_title( '', false );

    }
    return $title;

});

function my_added_page_content ( $content ) {
    if ( get_field('html_content') ) {
        $content = get_field('html_content');
        remove_filter('the_content', 'wpautop'); //removes wpautop filter

    }
    return $content;
}
add_filter( 'the_content', 'my_added_page_content', 7, 1 );



add_filter('site_transient_update_plugins', 'remove_update_notification');
function remove_update_notification($value) {
     unset($value->response[ 'table-of-contents-plus/toc.php' ]);
     return $value;
} 
/*
add_action( 'wp_footer', function() {
    global $wp_filter;
    print '<pre>';
    print_r( $wp_filter['the_content'] );
    print '</pre>';
});*/

