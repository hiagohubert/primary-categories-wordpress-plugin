<?php

if (! defined('ABSPATH')) {
    exit;
}

/*
 * Plugin Name: Primary Categories Exercise for 10up
 * Description: This is a exercise
 * Plugin URI: http://foobar.com/
 * Author: Hiago Hubert
 * Version: 1.0.0
 * Author URI: http://foobar.com/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 */

define('PLUGIN_DIR', plugin_dir_path(__FILE__));


include PLUGIN_DIR . 'classes/class-primary-category-box.php';
include PLUGIN_DIR . 'classes/class-primary-category-shortcode.php';



$meta_box = new \TenUp\PrimaryCategoriesPlugin\PrimaryCategoryBox();

$shortcode = new \TenUp\PrimaryCategoriesPlugin\PrimaryCategoryShortcode();
