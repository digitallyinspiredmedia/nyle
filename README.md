archive
	title
	description
	loop
		if: template-part -> content
						pagination
		else: content -> none

Comment
	post password
		if : comment title
	      comment navigation
		endif;
		if :
					!comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) )
		   Comment closed
		endif;
	comment form

Content Page
	article
		post thumbnail
			the_post_thumbnail()
		header .entry-header
			the_title()
		content .entry-content
			the_content()
		pagination
			wp_link_pages()
	 edit page link
			edit_post_link()
	/article

Content Single
	article
		post thumbnail
			the_post_thumbnail()
		header .entry-header
			the_title()
		content .entry-content
			the_content()
		pagination
			wp_link_pages()
		edit page link
			edit_post_link()
	/article

Footer
	/div .site-content
	/div .site
	footer
	/footer
		wp_footer();
	/body
 /html

Functions
	nyle base
		automatic-feed-links
		title-tag
		post-formats
		post-thumbnails
			add theme support
		html 5 Semantic Markup
		remove admin menu bar

 fall back image -> display featured image fail

	Enqueue script and style

 
