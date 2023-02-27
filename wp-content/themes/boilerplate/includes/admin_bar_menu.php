<?php


// ============================================================================
// Setting admin bar menu
// ============================================================================
/**
 * 管理バーの要素を非表示に設定する
 * @see https://wp-labo.com/wordpress-admin-bar-menu-hidden-customize/
 */
add_action('admin_bar_menu', function ( $wp_admin_bar ) {

	//ログインユーザーが管理者権限の場合は何もしない
	if ( current_user_can( 'administrator' ) ) {
		return;
	}

	//ログインユーザーが管理者権限以外の場合は非表示を実行
	$wp_admin_bar->remove_menu( 'wp-logo' );      // WordPressロゴ
	// $wp_admin_bar->remove_menu( 'site-name' );    // サイト名
	$wp_admin_bar->remove_menu( 'view-site' );    // サイト名 → サイトを表示
	$wp_admin_bar->remove_menu( 'dashboard' );    // サイト名 → ダッシュボード（ウェブサイト側）
	$wp_admin_bar->remove_menu( 'themes' );       // サイト名 → テーマ（ウェブサイト側）
	$wp_admin_bar->remove_menu( 'customize' );    // サイト名 → カスタマイズ（ウェブサイト側）
	$wp_admin_bar->remove_menu( 'comments' );     // コメント
	$wp_admin_bar->remove_menu( 'updates' );      // 更新
	// $wp_admin_bar->remove_menu( 'view' );         // 投稿を表示
	$wp_admin_bar->remove_menu( 'new-content' );  // 新規
	$wp_admin_bar->remove_menu( 'new-post' );     // 新規 → 投稿
	$wp_admin_bar->remove_menu( 'new-media' );    // 新規 → メディア
	$wp_admin_bar->remove_menu( 'new-link' );     // 新規 → リンク
	$wp_admin_bar->remove_menu( 'new-page' );     // 新規 → 固定ページ
	$wp_admin_bar->remove_menu( 'new-user' );     // 新規 → ユーザー
	// $wp_admin_bar->remove_menu( 'my-account' );   // マイアカウント
	$wp_admin_bar->remove_menu( 'user-info' );    // マイアカウント → プロフィール
	$wp_admin_bar->remove_menu( 'edit-profile' ); // マイアカウント → プロフィール編集
	// $wp_admin_bar->remove_menu( 'logout' );       // マイアカウント → ログアウト
	$wp_admin_bar->remove_menu( 'search' );       // 検索（ウェブサイト側）

	$wp_admin_bar->remove_menu( 'wpseo-menu' );       // Yoast SEO

}, 111);

