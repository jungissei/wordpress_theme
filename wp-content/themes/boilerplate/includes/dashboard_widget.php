<?php

/**
 * ダッシュボードにある項目を消す
 * @see https://yumegori.com/wordpress-admin-menu-custmize
 */
add_action('wp_dashboard_setup', function () {
  remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' ); //サイトヘルスステータス
  remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); //概要
  // remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); //アクティビティ
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); //クイックドラフト
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); //WordPressニュース
  remove_action( 'welcome_panel', 'wp_welcome_panel' ); //ようこそ
});
