<?php
/**
 * # カスタム投稿タイプ追加後に行うこと
 * WordPressの管理画面で「設定」→「パーマリンク」を開き、「変更を保存」ボタンをクリックしてパーマリンク構造を更新。
 * 正しいテンプレートファイルが適用されないため。
 */
add_action( 'init', function () {

  $label_name = 'NEWS';
  $slug_name = 'news';

  register_post_type( $slug_name, array(
    'label' => $label_name,
    'labels' => array(
      'name' => $label_name,
      'singular_name' => $label_name
    ),
    'description' => '',
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_rest' => false,
    'rest_base' => '',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'rest_namespace' => 'wp/v2',
    'has_archive' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'delete_with_user' => false,
    'exclude_from_search' => true,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'can_export' => false,
    'rewrite' => array('slug' => $slug_name, 'with_front' => true),
    'query_var' => true,
    'menu_icon' => 'dashicons-admin-post',
    'supports' => array('title', 'revisions', 'author'),
    'show_in_graphql' => false,
    'capability_type' => $slug_name.'_auth',
    'capabilities'  => array(
      'edit_posts' => 'edit_'.$slug_name.'_auths', // 自分の投稿を編集する権限
      'edit_others_posts' => 'edit_others_'.$slug_name.'_auths',// 他のユーザーの投稿を編集する権限
      'publish_posts' => 'publish_'.$slug_name.'_auths',// 投稿を公開する権限
      'read_private_posts' => 'read_private_'.$slug_name.'_auths',// プライベート投稿を閲覧する権限
      'delete_posts' => 'delete_'.$slug_name.'_auths',// 自分の投稿を削除する権限
      'delete_private_posts' => 'delete_private_'.$slug_name.'_auths',// プライベート投稿を削除する権限
      'delete_published_posts' => 'delete_published_'.$slug_name.'_auths',// 公開済み投稿を削除する権限
      'delete_others_posts' => 'delete_others_'.$slug_name.'_auths',// 他のユーザーの投稿を削除する権限
      'edit_private_posts' => 'edit_private_'.$slug_name.'_auths',// プライベート投稿を編集する権限
      'edit_published_posts' => 'edit_published_'.$slug_name.'_auths',// 公開済みの投稿を編集する権限
    )
  ));

  $rm = new WP_Roles();
  $rm->add_role('authid', $slug_name );
  foreach( array( 'authid',  'administrator', 'editor' ) as $rid ) {
    $role = $rm->get_role($rid);
    $role->add_cap('edit_'.$slug_name.'_auths');
    $role->add_cap('publish_'.$slug_name.'_auths');
    $role->add_cap('read_private_'.$slug_name.'_auths');
    $role->add_cap('delete_'.$slug_name.'_auths');
    $role->add_cap('delete_private_'.$slug_name.'_auths');
    $role->add_cap('delete_published_'.$slug_name.'_auths');
    $role->add_cap('edit_private_'.$slug_name.'_auths');
    $role->add_cap('edit_published_'.$slug_name.'_auths');
    $role->add_cap('edit_others_'.$slug_name.'_auths');
    $role->add_cap('delete_others_'.$slug_name.'_auths');
  }
});
