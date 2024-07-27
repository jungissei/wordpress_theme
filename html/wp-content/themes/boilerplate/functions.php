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

// ----------------------------------------------------------------------------
// Includes
// ----------------------------------------------------------------------------
(function() {

  // インクルードファイルクラス名の配列
  $class_names = [
    'post_type',
    'acf',
    'admin_menu',
    'admin_bar_menu',
    'dashboard_widget',
    'admin-post-list',
    'form',
  ];

  // インクルードファイルのパス
  $includes_path = get_stylesheet_directory() . '/includes/';

  // 各クラスファイルをインクルード
  foreach ($class_names as $class_name) {
    include_class_file($class_name, $includes_path);
  }
})();

/**
 * 指定されたクラスファイルをインクルードし、成功したらtrueを返す
 * @param string $class_name クラス名
 * @param string $includes_path インクルードファイルのパス
 * @return bool インクルード成功時にtrueを返す
 */
function include_class_file($class_name, $includes_path) {
  return include_file_if_exists($class_name . '/' . $class_name . '.php', $includes_path)
    || include_file_if_exists($class_name . '.php', $includes_path);
}

/**
 * 指定されたパスのファイルが存在すればインクルードし、成功したらtrueを返す
 * @param string $file_path ファイルパス
 * @param string $includes_path インクルードファイルのパス
 * @return bool インクルード成功時にtrueを返す
 */
function include_file_if_exists($file_path, $includes_path) {

  $full_path = $includes_path . $file_path;

  if (file_exists($full_path)) {
    require_once($full_path);
    return true;
  }

  return false;
}





// ----------------------------------------------------------------------------
// Theme assets
// ----------------------------------------------------------------------------
// サイト共通CSS＆JS
add_action( 'wp_enqueue_scripts', function () {
  wp_enqueue_style( 'site-common', get_theme_file_uri( '/lib/common/site/css/style.css' ), [], 0);
  wp_enqueue_script( 'site-common', get_theme_file_uri( '/lib/common/site/js/scripts.js' ), ['jquery'], 0);
});
