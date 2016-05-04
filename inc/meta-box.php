<?php


// Brand Color

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function brand_color_add_meta_box() {

//	$screens = array( 'post', 'page' ); remove page
	$screens = array( 'product' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'brand_color_sectionid',
			__( 'Brand Color', 'base' ),
			'brand_color_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'brand_color_add_meta_box' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function brand_color_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'brand_color_save_meta_box_data', 'brand_color_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_brand_color_value_key', true );

	echo '<label for="brand_color_new_field">';
	_e( '', 'base' );
	echo '</label> ';
	echo '<input type="color" id="brand_color_new_field" name="brand_color_new_field" value="' . esc_attr( $value ) . '" size="25" />';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function brand_color_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['brand_color_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['brand_color_meta_box_nonce'], 'brand_color_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */

	// Make sure that it is set.
	if ( ! isset( $_POST['brand_color_new_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['brand_color_new_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_brand_color_value_key', $my_data );
}
add_action( 'save_post', 'brand_color_save_meta_box_data' );



			add_action("admin_init", "images_init");
			add_action('save_post', 'save_images_link');
			function images_init(){
			          $post_types = get_post_types();
			          foreach ( $post_types as $post_type ) {
			                add_meta_box("my-images", "Pictures", "images_link", $post_type, "normal", "low");
			          }
			        }
			function images_link(){
			        global $post;
			        $custom  = get_post_custom($post->ID);
			        $link    = $custom["_link"][0];
			        $count   = 0;
			        echo '<div class="link_header">';
			        $query_images_args = array(
			                'post_type' => 'attachment',
			                'post_mime_type' =>array(
			                                'jpg|jpeg|jpe' => 'image/jpeg',
			                                'gif' => 'image/gif',
			                                'png' => 'image/png',
			                                ),
			                'post_status' => 'inherit',
			                'posts_per_page' => -1,
			                );
			        $query_images = new WP_Query( $query_images_args );
			        $images = array();
			        echo '<div class="frame">';
			        $thelinks = explode(',', $link);
			        foreach ( $query_images->posts as $file) {
			           if(in_array($images[]= $file->ID, $thelinks)){
			              echo '<label><input type="checkbox" group="images" value="'.$images[]= $file->ID.'" checked /><img src="'.$images[]= $file->guid.'" width="60" height="60" /></label>';
			                 }else{
			              echo '<label><input type="checkbox" group="images" value="'.$images[]= $file->ID.'" /><img src="'.$images[]= $file->guid.'" width="60" height="60" /></label>';
			                 }
			                $count++;
			        }
			        echo '<br /><br /></div></div>';
			        echo '<input type="hidden" name="link" class="field" value="'.$link.'" />';
			        echo '<div class="images_count"><span>Files: <b>'.$count.'</b></span> <div class="count-selected"></div></div>';
			}
			function save_images_link(){
			        global $post;
			        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){ return $post->ID; }
			        update_post_meta($post->ID, "_link", $_POST["link"]);
			}
			add_action( 'admin_head-post.php', 'images_css' );
			add_action( 'admin_head-post-new.php', 'images_css' );
			function images_css() {
			        echo '<style type="text/css">
			        #my-images .inside{padding:0px !important;margin:0px !important;}
			        .frame{
			                width:100%;
			                height:320px;
			                overflow:auto;
			                background:#e5e5e5;
			                padding-bottom:10px;
			                }
			        .field{width:800px;}
			        #results {
			                width:100%;
			                overflow:auto;
			                background:#e5e5e5;
			                padding:0px 0px 10px 0px;
			                margin:0px 0px 0px 0px;
			                }
			        #results img{
			                border:solid 5px #FDD153;
			                -moz-border-radius:3px;
			                margin:10px 0px 0px 10px;
			                }
			        .frame label{
			                margin:10px 0px 0px 10px;
			                padding:5px;
			                background:#fff;
			                -moz-border-radius:3px;
			                border:solid 1px #B5B5B5;
			                height:60px;
			                display:block;
			                float:left;
			                overflow:hidden;
			                }
			        .frame label:hover{
			                background:#74D3F2;
			                }
			        .frame label.checked{background:#FDD153 !important;}
			        .frame label input{
			                opacity:0.0;
			                position:absolute;
			                top:-20px;
			                }
			        .images_count{
			                font-size:10px;
			                color:#666;
			                text-transform:uppercase;
			                background:#f3f3f3;
			                border-top:solid 1px #ccc;
			                position:relative;
			                }
			        .selected_title{border-top:solid 1px #ccc;}
			        .images_count span{
			                color:#666;
			                padding:10px 6px 6px 12px;
			                display:block;
			                }
			        .count-selected{
			                font-size:9px;
			                font-weight:bold;
			                text-transform:normal;
			                position:absolute;
			                top:10px;
			                right:10px;
			                }
			                </style>';
			}
			add_action( 'admin_head-post.php', 'images_js' );
			add_action( 'admin_head-post-new.php', 'images_js' );
			function images_js(){
	?>
<script type="text/javascript">
			jQuery(document).ready(function($){
			  $('.frame input').change(function() {
			        var values = new Array();
			        $("#results").empty();
			        var result = new Array();
			        $.each($(".frame input:checked"), function() {
			                result.push($(this).attr("value"));
			                $(this).parent().addClass('checked');
			        });
			        $('.field').val(result.join(','));
			        $('.count-selected').text('Selected: '+result.length);
			        $.each($(".frame input:not(:checked)"), function() {
			                $(this).parent().removeClass('checked');
			        });
			  });
			        var result = new Array();
			        $.each($(".frame input:checked"), function() {
			                result.push($(this).attr("value"));
			                $(this).parent().addClass('checked');
			        });
			        $('.field').val(result.join(','));
			        $('.count-selected').text('Selected: '+result.length);
			        $.each($(".frame input:not(:checked)"), function() {
			                $(this).parent().removeClass('checked');
			        });
			});
</script>
<?php
}
function wps_thumbnails_list(){
           global $post;
           $image = get_post_meta($post->ID, '_link', true);
           $image = explode(",", $image);
           foreach($image as $images){
                $url = wp_get_attachment_image_src($images, 1, 1);
                echo '<a href="';
                echo $url[0];
                echo '" class="lightbox">';
                echo wp_get_attachment_image($images,'thumbnail', 1, 1);
                echo '</a>';
                }
}


 ?>
