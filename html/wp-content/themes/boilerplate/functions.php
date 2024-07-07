<?php
// ----------------------------------------------------------------------------
// 【Table of Content】
//
// Basic
// Includes
// ----------------------------------------------------------------------------


// ----------------------------------------------------------------------------
// Basic
// ----------------------------------------------------------------------------
// コメントのフィードなどの非表示
remove_action('wp_head', 'feed_links_extra', 3);

// 絵文字の非表示
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// WordPressのバージョンの非表示
remove_action('wp_head', 'wp_generator');

// rel=”canonical”タグの非表示
remove_action('wp_head', 'rel_canonical');

// 短縮URLの非表示
remove_action('wp_head', 'wp_shortlink_wp_head');

//すべての自動更新を無効化
add_filter( 'automatic_updater_disabled', '__return_true' );


/**
 * ログイン後のリダイレクト先変更
 * @see https://developer.wordpress.org/reference/hooks/login_redirect/
 */
// add_filter('login_redirect', function ($redirect_to, $request, $user) {

// 	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
// 		//check for admins
// 		if ( in_array( 'administrator', $user->roles ) ) {
// 			// redirect them to the default place
// 			return $redirect_to;
// 		} else {
// 			return admin_url('/edit.php');
// 		}
// 	} else {
// 		return $redirect_to;
// 	}

// }, 10, 3);


// ----------------------------------------------------------------------------
// Includes
// ----------------------------------------------------------------------------

if (function_exists('is_plugin_active') === false) {
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

// Setting post types
require_once(get_stylesheet_directory().'/includes/post_types_taxonomy_term.php');

// Setting Gutenberg
require_once(get_stylesheet_directory().'/includes/gutenberg/index.php');

// Setting ACF
require_once(get_stylesheet_directory().'/includes/acf/index.php');

// Setting admin menu
require_once(get_stylesheet_directory().'/includes/admin_menu.php');

// Setting admin bar menu
require_once(get_stylesheet_directory().'/includes/admin_bar_menu.php');

// Setting dashboard widget
require_once(get_stylesheet_directory().'/includes/dashboard_widget.php');

// Setting 管理画面の記事一覧
require_once(get_stylesheet_directory().'/includes/admin-post-list.php');

// Setting 管理画面の記事一覧
require_once(get_stylesheet_directory().'/includes/contact-form-7.php');


// ----------------------------------------------------------------------------
// Theme assets
// ----------------------------------------------------------------------------
// サイト共通CSS＆JS
add_action( 'wp_enqueue_scripts', function () {
  wp_enqueue_style( 'site-common', get_theme_file_uri( '/lib/common/site/css/style.css' ), [], 0);
  wp_enqueue_script( 'site-common', get_theme_file_uri( '/lib/common/site/js/scripts.js' ), ['jquery'], 0);
});
