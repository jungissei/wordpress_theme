<?php

// ============================================================================
// Setting post types
// ============================================================================
add_action( 'init', function () {

  // ----------------------------------------------------------------------------
  // Initial
  // ----------------------------------------------------------------------------
  $rm = new WP_Roles();



  // ----------------------------------------------------------------------------
  // Gutenberg エディター
  // ----------------------------------------------------------------------------
  $label_name = 'Gutenberg エディター';
  $slug_name = 'gutenberg_editor';

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
    'show_in_rest' => true,
    'rest_base' => '',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'rest_namespace' => 'wp/v2',
    'has_archive' => false,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'delete_with_user' => false,
    'exclude_from_search' => true,
    'capability_type' => 'page',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'can_export' => false,
    'rewrite' => array('slug' => $slug_name, 'with_front' => true),
    'query_var' => true,
    'menu_icon' => 'dashicons-admin-page',
    'supports' => array('title', 'revisions', 'editor', 'author'),
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


  // ----------------------------------------------------------------------------
  // Gutenberg エディター (制限なし)
  // ----------------------------------------------------------------------------
  $label_name = 'Gutenberg エディター(制限なし)';
  $slug_name = 'gutenberg_norestrict';

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
    'show_in_rest' => true,
    'rest_base' => '',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'rest_namespace' => 'wp/v2',
    'has_archive' => false,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'delete_with_user' => false,
    'exclude_from_search' => true,
    'capability_type' => 'page',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'can_export' => false,
    'rewrite' => array('slug' => $slug_name, 'with_front' => true),
    'query_var' => true,
    'menu_icon' => 'dashicons-admin-page',
    'supports' => array('title', 'revisions', 'editor', 'author'),
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



  // ----------------------------------------------------------------------------
  // カスタムフィールドエディター
  // ----------------------------------------------------------------------------
  $label_name = 'カスタムフィールド エディター';
  $slug_name = 'custom_field_editor';

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
    'has_archive' => false,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'delete_with_user' => false,
    'exclude_from_search' => true,
    'capability_type' => 'page',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'can_export' => false,
    'rewrite' => array('slug' => $slug_name, 'with_front' => true),
    'query_var' => true,
    'menu_icon' => 'dashicons-admin-page',
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


  $rm->add_role('authid', $slug_name );
  foreach( array( 'authid',  'administrator', 'editor', 'author' ) as $rid ) {
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



  // ----------------------------------------------------------------------------
  // タクソノミー登録
  // @see https://developer.wordpress.org/reference/functions/register_taxonomy/
  // ----------------------------------------------------------------------------

  // --------------------------------------
  // post type / 投稿ページカテゴリ
  // --------------------------------------
  // 投稿者に manage_categories 権限追加
  get_role('author')->add_cap('manage_categories');


  // --------------------------------------
  // page post type / 固定ページカテゴリ
  // --------------------------------------
  register_taxonomy(
    'page-cat',
    'page',
    array(
      'label' => 'カテゴリ',
      'hierarchical' => false,
      'public' => true,
      'show_in_rest' => false, #=> Gutenbergでは非表示(ACFでラジオボタンで表示させるため)
      'update_count_callback' => '_update_post_term_count',
      'capabilities' => array( // manage_categories 権限を有していれば表示
        'manage_terms' => 'manage_categories',
        'edit_terms' => 'manage_categories',
        'delete_terms' => 'manage_categories',
        'assign_terms' => 'manage_categories',
      )
    )
  );

});
