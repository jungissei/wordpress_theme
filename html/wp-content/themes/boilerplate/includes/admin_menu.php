<?php
// ============================================================================
// Setting dashboard sidebar
// ============================================================================
add_action( 'admin_menu', function () {
  global $current_user, $submenu;


  //--------------------------------------
  // 全ユーザー共通
  //--------------------------------------
  // メニュー
  remove_menu_page( 'edit.php' );// 投稿
  remove_menu_page( 'edit-comments.php' );// コメント
  remove_submenu_page( 'tools.php', 'site-health.php' ); // サイトヘルス


  //--------------------------------------
  // 固定ページ サブメニュー追加
  //--------------------------------------
  /**
   * 管理画面にサブメニューを追加
   *
   * 第1引数：親メニューのスラッグ
   * 第2引数：サブメニューが選択されたとき、ページのタイトルタグに表示されるテキスト
   * 第3引数：サブメニューとして表示されるテキスト
   * 第4引数：サブメニューを表示するために必要な権限
   * 第5引数：サブメニューのスラッグ名
   * 第6引数：（任意）このページのコンテンツを出力するために呼び出される関数
   *
   * @see https://qiita.com/sola-msr/items/14848a964b8b3317ae87
   */
  $terms = get_terms('page_cat', array(
    'hide_empty'    => false,
  ));
  foreach ( $terms as $term ) {
    add_submenu_page( 'edit.php?post_type=page', $term->name.'一覧', $term->name.'一覧', 'manage_options', 'edit.php?s&post_status=all&post_type=page&action=-1&m=0&page_cat='.$term->name.'&filter_action=絞り込み&paged=1&action2=-1', '' );
  }

  //--------------------------------------
  // 管理者以外
  //--------------------------------------
	if ( current_user_can( 'administrator') ) {
		return;
	}

  /**
   * @see https://wordpress-web.and-ha.com/side-menu-of-management-screen/
   */

  // メニュー
  remove_menu_page( 'upload.php' );// ツール
  remove_menu_page( 'tools.php' );// ツール
  remove_menu_page( 'options-general.php' );// 設定
  remove_menu_page( 'edit.php?post_type=acf-field-group' );// ACF
  remove_menu_page('profile.php');// プロフィール
  remove_menu_page('siteguard'); // SiteGuard
  remove_menu_page('http-auth-settings'); // HTTP Auth

  // サブメニュー
  remove_submenu_page( 'index.php', 'update-core.php' ); // 更新
  remove_submenu_page( 'index.php', 'aioseo-setup-wizard' ); // All in One SEO Pack
  remove_submenu_page( 'flamingo', 'flamingo' ); // Flamingo アドレス帳

}, 999 );
