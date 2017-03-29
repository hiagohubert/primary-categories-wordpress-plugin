<?php
namespace TenUp\PrimaryCategoriesPlugin;

class PrimaryCategoryBox
{
	/**
	 * PrimaryCategoryBox constructor.
	 */
	public function __construct() {
		add_action('add_meta_boxes', array( $this, 'setPrimaryCategoryMetaBox' ));
		add_action('save_post', array( $this, 'savePrimaryCategory' ));
	}

	/**
	 * Adds Primary Category Metabox to all post types and custom post types
	 */
	public function setPrimaryCategoryMetaBox() {
		$all_posts_types = get_post_types();

		//don't show metabox on page type
		$key = array_search("page",$all_posts_types);
		if( $key !== false ){
			unset($all_posts_types[$key]);
		}

		add_meta_box(
			'primary_category_tenup',
			'Primary Category',
			array( $this, 'fillMetaBoxContent' ),
			$all_posts_types,
			'side',
			'high'
		);
	}

	/**
	 * print a select with all the categories, and the current selected option
	 */
	public function fillMetaBoxContent(){
		global $post;

	    $primary_category_selected = get_post_meta( $post->ID, 'primary_category', true );
	    $categories = get_the_category();

	    if ( ! empty($categories) ) {
		    $html = '<select name="primary_category" id="primary_category">';
	    	foreach ($categories as $category) {
			    $html .= '<option value="' . $category->name . '" ' . selected( $primary_category_selected, $category->name, false ) . '>' . $category->name . '</option>';
		    }
		    $html .= '</select>';
	    } else {
	    	$html = "<strong>You need to select a category for your post.</strong>";
	    }

	    echo $html;

    }

	/**
	 * Save primary category of post on post's meta
	 */
	public function savePrimaryCategory(){
		global $post;

		if ( isset($_POST['primary_category']) ) {
			$primary_category = sanitize_text_field( $_POST[ 'primary_category' ] );
			update_post_meta( $post->ID, 'primary_category', $primary_category );
		}
	}

}
