<?php
namespace TenUp\PrimaryCategoriesPlugin;

class PrimaryCategoryShortcode {

	public function __construct() {
		add_shortcode('primary-category-posts', array($this, 'createShortcode'));
	}

	/**
	 * Creates a shortcode to return posts filtering by primary categories
	 * @param array $atts
	 *
	 * @return mixed
	 */
	public function createShortcode($atts=[]){

		// normalize attribute keys, lowercase
		$atts = array_change_key_case((array)$atts, CASE_LOWER);
		$atts = shortcode_atts(
			array(
				'category' => 'no category'
			), $atts, 'primary-category-posts' );

		$query_posts = new \WP_Query( array(
			'post_type'     => 'any',
			'meta_key'      => 'primary_category',
			'meta_value'    => $atts['category']
		));

		$html = "";
		if ( $query_posts->have_posts() ) {
			$html .= '<ul>';

			while ( $query_posts->have_posts() ) {

				$query_posts->the_post();

				$html .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';

			}

			$html .= '</ul>';
		} else{
			$html = "There are no posts with this primary category";
		}

		echo $html;
	}

}