<?php
/**
 * Sneaker shop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sneaker_shop
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sneaker_shop_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sneaker shop, use a find and replace
	 * to change 'sneaker-shop' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('sneaker-shop', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'sneaker-shop'),
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
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sneaker_shop_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'sneaker_shop_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sneaker_shop_content_width()
{
	$GLOBALS['content_width'] = apply_filters('sneaker_shop_content_width', 640);
}
add_action('after_setup_theme', 'sneaker_shop_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sneaker_shop_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'sneaker-shop'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'sneaker-shop'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'sneaker_shop_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function sneaker_shop_scripts()
{

	function mytheme_enqueue_assets()
	{
		wp_enqueue_style('mytheme-styles', get_stylesheet_uri());
	}
	add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');

	wp_enqueue_style('sneaker-shop-style', get_template_directory_uri() . '/style.css');


	wp_enqueue_script('sneaker-shop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'sneaker_shop_scripts');

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

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

#cracion del post type de productos (use https://generatewp.com/post-type/)
function create_product_post_type()
{

	$labels = array(
		'name' => _x('Productos', 'Post Type General Name', 'text_domain'),
		'singular_name' => _x('Producto', 'Post Type Singular Name', 'text_domain'),
		'menu_name' => __('Productos', 'text_domain'),
		'name_admin_bar' => __('Post Type', 'text_domain'),
		'archives' => __('Item Archives', 'text_domain'),
		'attributes' => __('Item Attributes', 'text_domain'),
		'parent_item_colon' => __('Parent Item:', 'text_domain'),
		'all_items' => __('All Items', 'text_domain'),
		'add_new_item' => __('Add New Item', 'text_domain'),
		'add_new' => __('Add New', 'text_domain'),
		'new_item' => __('New Item', 'text_domain'),
		'edit_item' => __('Edit Item', 'text_domain'),
		'update_item' => __('Update Item', 'text_domain'),
		'view_item' => __('View Item', 'text_domain'),
		'view_items' => __('View Items', 'text_domain'),
		'search_items' => __('Search Item', 'text_domain'),
		'not_found' => __('Not found', 'text_domain'),
		'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
		'featured_image' => __('Imagen del producto', 'text_domain'),
		'set_featured_image' => __('Set featured image', 'text_domain'),
		'remove_featured_image' => __('Remove featured image', 'text_domain'),
		'use_featured_image' => __('Use as featured image', 'text_domain'),
		'insert_into_item' => __('Insert into item', 'text_domain'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
		'items_list' => __('Items list', 'text_domain'),
		'items_list_navigation' => __('Items list navigation', 'text_domain'),
		'filter_items_list' => __('Filter items list', 'text_domain'),
	);
	$args = array(
		'label' => __('Producto', 'text_domain'),
		'description' => __('productos', 'text_domain'),
		'labels' => $labels,
		'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
		'taxonomies' => array('category', 'post_tag'),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type('Producto', $args);

}
add_action('init', 'create_product_post_type', 0);


#llamar al script del modal con la funcion enqueue_modal_script
function enqueue_modal_script()
{
	wp_enqueue_script('modal', get_template_directory_uri() . '/js/modal.js');
}
add_action('wp_enqueue_scripts', 'enqueue_modal_script');




#funcion para llamar y mostrar los datos del modal usados en el template de productos
function get_product_data()
{
	static $called = false;
	if ($called) {
		return;
	}
	$called = true;

	$args = array(
		'post_type' => 'producto',
		'posts_per_page' => -1
	);
	$query = new WP_Query($args);

	if ($query->have_posts()) {
		
		echo '<main id="primary" class="site-main">';
		echo '<div class="container">';
		echo '<div class="row">';
		while ($query->have_posts()) {
			$query->the_post();
			echo '<div class="col-md-3">';
			echo '<div class="product-card">';
			#obtener los metadatos del producto
			$image_id = get_post_meta(get_the_ID(), 'imagen', true);
			$image_url = wp_get_attachment_url($image_id);
			echo '<a href="#" class="product-image" data-modal-id="productModal-' . get_the_ID() . '">';
			echo '<img src="' . $image_url . '" alt="' . get_the_title() . '">';
			echo '</a>';
			echo '<h4>' . get_the_title() . '</h4>';
			echo '<p>' . get_the_content() . '</p>';
			echo '<p>$' . get_post_meta(get_the_ID(), 'precio', true) . '</p>';

			// Modal
			echo '<div class="modal" id="productModal-' . get_the_ID() . '">';
			echo '<div class="modal-content">';
			echo '<div class="modal-cotainer">';
			echo '<h4>' . get_the_title() . '</h4>';			
			echo '</div>';
			echo '<div class="modal-body">';
			echo '<img src="' . $image_url . '" class="img-fluid" alt="' . get_the_title() . '">';
			echo '<p>' . get_the_content() . '</p>';
			echo '<p>$' . get_post_meta(get_the_ID(), 'precio', true) . '</p>';
			echo '<button class="close-modal">Close</button>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}

		echo '</div>';
		echo '</main>';

	} else {
		?>
		<p>No hay productos disponibles.</p>
		<?php
	}
}

