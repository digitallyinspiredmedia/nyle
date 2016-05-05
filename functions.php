<?php
/**
 * Nyle wordpress theme
 *
 * @package Wordpress
 * @subpackage Base
 * @since  Base v1.1
 *
 *
 * Nyle theme works in WordPress 4.0+ or later.
 */


// Register Theme Features
function nyle()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

  // Add theme support for document Title tag
  add_theme_support( 'title-tag' );

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside' ) );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );

  //custom post-thumbnail for base
	if ( function_exists( 'add_theme_support' ) ) {
    	set_post_thumbnail_size( 250, 250, true ); // default Post Thumbnail dimensions (cropped)
	    // additional image sizes
	    // delete the next line if you do not need additional image sizes
	    //add_image_size( 'category-thumb', 334, 214 );
	}

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

  // Remove admin menu bar
	add_filter('show_admin_bar', '__return_false');

}
add_action( 'after_setup_theme', 'nyle' );

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return -1;' ), 20 );

//WordPress Set Featured Image with Fallback
// display featured image
/*function display_featured_image($content) {
	global $post;

	$img_path =  esc_url( get_template_directory_uri() ).'/image/logo.png'; // fallback image

	if (is_single()) {
		if (has_post_thumbnail()) {
			//the_post_thumbnail();
		} else {
			$attachments = get_posts(array(
				'post_type' => 'attachment',
				'post_mime_type'=>'image',
				'posts_per_page' => 0,
				'post_parent' => $post->ID,
				'order'=>'ASC'
			));
			if ($attachments) {
				foreach ($attachments as $attachment) {
					set_post_thumbnail($post->ID, $attachment->ID);
					break;
				}
				the_post_thumbnail();
			} else {
				$content = '<img src="' . $img_path . '" alt="">' . $content;
			}
		}
	}
	return $content;
}
add_filter('the_content', 'display_featured_image');*/

/**
 * Enqueue scripts and styles.
 */
function base_scripts() {
		wp_enqueue_style( 'font-lato', '//fonts.googleapis.com/css?family=Lato:300,400,700' );

	//base css
		wp_enqueue_style( 'base-style', get_stylesheet_uri() );

	// Load the html5 shiv.
		wp_enqueue_script( 'base-html5', get_template_directory_uri() . '/js/html5.js');
		wp_script_add_data( 'base-html5', 'conditional', 'lt IE 9' );

	//jquery
		wp_enqueue_script( 'base-jquery', get_template_directory_uri() . '/js/jquery2.js', true );


		wp_enqueue_script( 'jquery-zoom', get_template_directory_uri() . '/js/imagezoom.js', true );
		wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', true );

	//less
		//wp_enqueue_script( 'less', get_template_directory_uri() . '/js/less.js', true );

	//functions
		wp_enqueue_script( 'base-functions', get_template_directory_uri() . '/js/functions.js', true );

	// //comment
	// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 		wp_enqueue_script( 'comment-reply' );
	// 	}

}
add_action( 'wp_enqueue_scripts', 'base_scripts' );


/**
 * Widget
 */
	function base_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Sidebar_name', 'base' ),
			'id'            => 'sidebar_id',
			'description'   => __( 'sidebar_description', 'base' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',

		) );

	}
	add_action( 'widgets_init', 'base_widgets_init' );

/**
 * Menu
 */
// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'base' ),
		'social'  => __( 'Social Links Menu', 'base' ),
	) );

// Register Custom Post Type
	require get_template_directory() . '/inc/custom-post.php';

// Register Custom Post Type for Portfolio Page
	require get_template_directory() . '/inc/meta-box.php';

/**
 * Sticky Post
 */
  //Display just the first sticky post, if none return the last post published:
  	$args = array(
  		'posts_per_page' => 1,
  		'post__in'  => get_option( 'sticky_posts' ),
  		'ignore_sticky_posts' => 1
  	);
  	$query = new WP_Query( $args );

/**
 * SVG
 */
	//svg upload in media
	function cc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

	function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
	}

//for all expcerpt
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

// Custom title lengths
function short_title($n) {
	$title = get_the_title($post->ID);
	$title = substr($title,0,$n);
	echo $title;
	// echo short_title(30);
}

//Display a custom gravatar in WordPress
function display_gravatar($avatar_defaults) {
	$myavatar = get_bloginfo('template_directory') . '/image/logo.png';
	$avatar_defaults[$myavatar] = 'My custom gravatar';
	return $avatar_defaults;
}
add_filter('avatar_defaults', 'display_gravatar');

//Add featured images to WordPress feeds
function rss_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = get_the_post_thumbnail($post->ID) . $content;
	}
	return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

// Adding a Character Counter to Excerpts

function excerpt_count_js(){

if ('page' != get_post_type()) {

      echo '<script>jQuery(document).ready(function(){
jQuery("#postexcerpt .handlediv").after("<div style=\"position:absolute;top:12px;right:34px;color:#666;\"><small>Excerpt length: </small><span id=\"excerpt_counter\"></span><span style=\"font-weight:bold; padding-left:7px;\">/ 500</span><small><span style=\"font-weight:bold; padding-left:7px;\">character(s).</span></small></div>");
     jQuery("span#excerpt_counter").text(jQuery("#excerpt").val().length);
     jQuery("#excerpt").keyup( function() {
         if(jQuery(this).val().length > 500){
            jQuery(this).val(jQuery(this).val().substr(0, 500));
        }
     jQuery("span#excerpt_counter").text(jQuery("#excerpt").val().length);
   });
});</script>';
}
}
add_action( 'admin_head-post.php', 'excerpt_count_js');
add_action( 'admin_head-post-new.php', 'excerpt_count_js');

// Dashboard Footer Text
function remove_footer_admin () {
   ?>
			 <p>&copy; by <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> @ <?php echo date('Y'); ?></p>
			<?php
}

add_filter('admin_footer_text', 'remove_footer_admin');

function remove_footer_version() {
    remove_filter( 'update_footer', 'core_update_footer' );
}
add_action( 'admin_menu', 'remove_footer_version' );


//post view
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wps_login_message( $message ) {
    if ( empty($message) ){
        return "<p class='message'>Welcome Mr. Nyle Admin </p>";
    } else {
        return $message;
    }
}
add_filter( 'login_message', 'wps_login_message' );

function loginLogo() { echo '<style type="text/css"> h1 a { background-image:url('.get_bloginfo('template_directory').'/image/logo.png) !important; position: relative;
top: -50px;} </style>'; } add_action('login_head', 'loginLogo');



function disable_wp_emojicons() {
   // all actions related to emojis
   remove_action( 'admin_print_styles', 'print_emoji_styles' );
   remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
   remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
   remove_action( 'wp_print_styles', 'print_emoji_styles' );
   remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
   remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
   remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
   // filter to remove TinyMCE emojis
   add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
 }
 add_action( 'init', 'disable_wp_emojicons' );
 function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

//WordPress shortcode for google map
function googlemap($atts, $content = null) {
   extract(shortcode_atts(array(
               "width" => '940',
               "height" => '300',
               "src" => ''
   ), $atts));

return '<div>
         <iframe src="'.$src.'&output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="'.$width.'" height="'.$height.'"></iframe>
        </div>
       ';
}
/* [googlemap src="google_map_url"] [googlemap width="600" height="250" src="google_map_url"] */
add_shortcode("googlemap", "googlemap");

//clean dashboard
				function remove_dashboard_widgets() {

					global $wp_meta_boxes;

					unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
					unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);

					unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
					unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

					unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
					unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);

					unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
					unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

				}
				add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
				// if (!current_user_can('manage_options')) {
				// 	add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
				// }
				function enable_more_buttons($buttons) {

				$buttons[] = 'fontselect';
				$buttons[] = 'fontsizeselect';
				$buttons[] = 'styleselect';
				$buttons[] = 'backcolor';
				$buttons[] = 'newdocument';
				$buttons[] = 'cut';
				$buttons[] = 'copy';
				$buttons[] = 'charmap';
				$buttons[] = 'hr';
				$buttons[] = 'visualaid';

				return $buttons;
				}
				add_filter("mce_buttons_3", "enable_more_buttons");
				add_action( 'wp_dashboard_setup', 'register_my_dashboard_widget' );
function register_my_dashboard_widget() {
	wp_add_dashboard_widget(
		'my_dashboard_widget',
		'Website Guidelines',
		'my_dashboard_widget_display'
	);

}

add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
	if ( !current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'options-general.php' );
	}
}
add_action( 'admin_menu', 'remove_themecheck', 999 );
function remove_themecheck() {
	if ( !current_user_can( 'manage_options' ) ) {
		remove_submenu_page( 'themes.php', 'themecheck' );
	}
}
// add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
// function remove_dashboard_widgets() {
// 	global $wp_meta_boxes;
// 	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
// }
// add_action( 'wp_dashboard_setup', 'register_my_dashboard_widget' );
// function register_my_dashboard_widget() {
// 	wp_add_dashboard_widget(
// 		'my_dashboard_widget',
// 		'My Dashboard Widget',
// 		'my_dashboard_widget_display'
// 	);
//}


function my_dashboard_widget_display() {
	 echo 'Hello, I am DIM Bot';
    ?>
    <p>Howdy Mr. Nyle, welcome to your website back. Here are some quick guidelines to keep in mind when using the site.</p>


	<h4><strong>Plugins</strong></h4>
    <p>If you'd like to use any plugin please let us know first so we can vet it to make sure the code quality is good.</p>

	<h4><strong>Images</strong></h4>
    <p>Please make sure to always add good title and proper alt text to images. This makes single attachment pages better and does some SEO magic as well.</p>

	<h4><strong>Important Links</strong></h4>
    <ul>
		<li><a href='<?php echo admin_url("post-new.php") ?>'>New Post</a></li>
		<li><a href='<?php echo admin_url("profile.php") ?>'>Your Profile</a></li>
    </ul>


    <?php
}
function my_post_guidelines() {

  $screen = get_current_screen();

  if ( 'post' != $screen->post_type )
    return;

  $args = array(
    'id'      => 'my_website_guide',
    'title'   => 'Content Guidelines',
    'content' => '
    	<h3>Website Content Guidelines</h3>
    	<p>All content on this website must be unique. Formatting must be relegated to level 2 headings and down, level 1 headings should not be used in the post content.</p>
    	<p>
		All images should be inserted with the media editor and should have a title, alt text and a descriptive caption.
    	</p>
    ',
  );

  // Add the help tab.
  $screen->add_help_tab( $args );

}

add_action('admin_head', 'my_post_guidelines');
add_filter( 'plugin_action_links', 'bsb_disable_plugin_actions', 10, 4 );

function bsb_disable_plugin_actions( $actions, $plugin_file, $plugin_data, $context ) {
	$plugins = array( 'advanced-custom-fields-pro/acf.php' );
	if ( array_key_exists( 'deactivate', $actions ) && in_array( $plugin_file, $plugins ))
		unset( $actions['deactivate'] );
	return $actions;
}


function annointed_admin_bar_remove() {
        global $wp_admin_bar;

        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

// Multiple Post Thumbnails / Featured Images
if (class_exists('MultiPostThumbnails')) {

new MultiPostThumbnails(array(
'label' => 'Product Image',
'id' => 'product-image',
'post_type' => 'hairneeds'
 ) );

// Multiple Post Thumbnails / Featured Images

new MultiPostThumbnails(array(
'label' => 'Product Ingredient Image',
'id' => 'productingredient-image',
'post_type' => 'hairneeds'
 ) );

// Multiple Post Thumbnails / Featured Images

new MultiPostThumbnails(array(
'label' => 'Hair Need mini Image',
'id' => 'hairneedmini-image',
'post_type' => 'hairneeds'
 ) );

 }

add_filter('mpt_unprotect_meta', '__return_true');

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );



//woo commerce

//disable default style from woocommerce
define('WOOCOMMERCE_USE_CSS', false);
//Declaring WooCommerce Support
add_theme_support( 'woocommerce' );

//Remove Related Products Output
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
//Remove the breadcrumbs
add_action( 'init', 'jk_remove_wc_breadcrumbs' );
function jk_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

//Removing Tabs
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
    return $tabs;
}


//responsive Images
/**
 * Disable responsive image support (test!)
 */

// Clean the up the image from wp_get_attachment_image()
add_filter( 'wp_get_attachment_image_attributes', function( $attr )
{
    if( isset( $attr['sizes'] ) )
        unset( $attr['sizes'] );

    if( isset( $attr['srcset'] ) )
        unset( $attr['srcset'] );

    return $attr;

 }, PHP_INT_MAX );

// Override the calculated image sizes
add_filter( 'wp_calculate_image_sizes', '__return_false',  PHP_INT_MAX );

// Override the calculated image sources
add_filter( 'wp_calculate_image_srcset', '__return_false', PHP_INT_MAX );

// Remove the reponsive stuff from the content
remove_filter( 'the_content', 'wp_make_content_images_responsive' );

//list all product in one page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return -1;' ), 20 );

//Remove WooCommerce Tabs - this code removes all 3 tabs - to be more specific just remove actual unset lines
add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {

 unset($tabs['reviews']);
 unset($tabs['description']);
 unset( $tabs['additional_information'] );  	// Remove the additional information tab

 return $tabs;
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

/*
 * wc_remove_related_products
 *
 * Clear the query arguments for related products so none show.
 * Add this code to your theme functions.php file.
 */
function wc_remove_related_products( $args ) {
	return array();
}
add_filter( 'woocommerce_related_products_args','wc_remove_related_products', 10 );

//remove display notice - Showing all x results
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
//remove default sorting drop-down from WooCommerce
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

//WordPress shortcode for product url
add_shortcode( 'product_url', 'rohils_product_url_function' );

function rohils_product_url_function($atts){
        global $wpdb;

        if ( empty( $atts ) ) {
            return '';
        }

        if ( isset( $atts['id'] ) ) {
            $product_data = get_post( $atts['id'] );
        } elseif ( isset( $atts['sku'] ) ) {
            $product_id   = wc_get_product_id_by_sku( $atts['sku'] );
            $product_data = get_post( $product_id );
        } else {
            return '';
        }

        if ( 'product' !== $product_data->post_type ) {
            return '';
        }

        $_product = wc_get_product( $product_data );
echo '<a class="viewmore btn" href="' .esc_url( get_post_permalink($_product->id) ).'"> View more </a> ';
}

add_filter( 'add_to_cart_text', 'woo_custom_product_add_to_cart_text' );            // < 2.1
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_product_add_to_cart_text' );  // 2.1 +

function woo_custom_product_add_to_cart_text() {

    return __( 'Know More', 'woocommerce' );

}




//ing

add_action('product_cat_add_form_fields', 'category_metabox_add', 10, 1);
add_action('product_cat_edit_form_fields', 'category_metabox_edit', 10, 1);

function category_metabox_add($tag) { ?>
	<div class="form-field">
		<label for="ingredient-code"><?php _e('Ingredient Color Code') ?></label>
		<input name="ingredient-code" id="ingredient-code" type="color" value="" size="40" aria-required="true" />
		<p class="description"><?php _e('This color code will shown at category page.'); ?></p>
	</div>
<?php }

function category_metabox_edit($tag) { ?>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="ingredient-code"><?php _e('Ingredient Color Code'); ?></label>
		</th>
		<td>
			<input name="ingredient-code" id="ingredient-code" type="color" value="<?php echo get_term_meta($tag->term_id, 'ingredient-code', true); ?>" size="40" aria-required="true" />
			<p class="description"><?php _e('This color code will shown at category page.'); ?></p>
		</td>
	</tr>
<?php }

add_action('created_product_cat', 'save_category_metadata', 10, 1);
add_action('edited_product_cat', 'save_category_metadata', 10, 1);

function save_category_metadata($term_id)
{
    if (isset($_POST['ingredient-code']))
		update_term_meta( $term_id, 'ingredient-code', $_POST['ingredient-code']);

}

?>
