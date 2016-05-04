<?php

//view more button dynamic
function related_prodcut_add_meta_box() {
	$hairscreens = array( 'hairneeds' );
	foreach ( $hairscreens as $hairscreen ) {
		add_meta_box(
			'related_prodcut_sectionid',
			__( 'Related Product', 'base' ),
			'related_prodcut_meta_box_callback',
			$hairscreen,
            'side', 'high'
		);
	}
}
add_action( 'add_meta_boxes', 'related_prodcut_add_meta_box' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function related_prodcut_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'related_prodcut_save_meta_box_data', 'related_prodcut_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_related_prodcut_value_key', true );

	echo '<label for="related_prodcut_new_field">';
	_e( '', 'base' );
	echo '</label> ';
	echo '<input type="text" id="related_prodcut_new_field" name="related_prodcut_new_field" value="' . esc_attr( $value ) . '" size="25" />';
}


/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function related_prodcut_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['related_prodcut_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['related_prodcut_meta_box_nonce'], 'related_prodcut_save_meta_box_data' ) ) {
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
	if ( ! isset( $_POST['related_prodcut_new_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['related_prodcut_new_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_related_prodcut_value_key', $my_data );
}
add_action( 'save_post', 'related_prodcut_save_meta_box_data' );






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
			$screen,
            'side', 'high'
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




 ?>
