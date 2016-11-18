<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/*
 *  Add options page
 */

// if( function_exists('acf_add_options_page') ) {

//   acf_add_options_page(array(
//     'page_title'  => 'Theme General Settings',
//     'menu_title'  => 'Theme Settings',
//     'menu_slug'   => 'theme-general-settings',
//     'capability'  => 'edit_posts',
//     'redirect'    => false
//   ));

// }

/*
  Rename UL Dropdown Menu class to support Bootstrap Menu plugin
 */

// function new_submenu_class($menu) {
//   $menu = preg_replace('/ class="sub-menu"/',' class="dropdown-menu" ',$menu);
//   return $menu;
// }

// add_filter('wp_nav_menu', __NAMESPACE__ . '\\new_submenu_class');

// /**
//  * Hide Advanced Custom Fields from Admin View
//  */
// add_filter('acf/settings/show_admin', '__return_false');

// /*
//   Enqueue JS after Footer
//  */
// function js_to_footer() {
//   remove_action('wp_head', 'wp_print_scripts');
//   remove_action('wp_head', 'wp_print_head_scripts', 9);
//   remove_action('wp_head', 'wp_enqueue_scripts', 1);
// }
// add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\js_to_footer');

// function custom_excerpt_length( $length ) {
//         return 20;
//     }
// add_filter( 'excerpt_length', __NAMESPACE__ . '\\custom_excerpt_length', 999 );