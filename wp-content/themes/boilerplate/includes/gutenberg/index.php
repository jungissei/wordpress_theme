<?php

// GutenbergエディタでJS読込させる
add_action( 'enqueue_block_editor_assets', function() {

  global $post_type;

  if($post_type !== 'gutenberg_norestrict'){
    wp_enqueue_script( 'my_gutenberg_scripts',
        get_theme_file_uri( '/includes/gutenberg/setting_blocks.js' ),
        array(),
        date( 'ymdgis' ),
        true
    );
  }
});


/**
 * remove unused meta box
 * @see https://www.nxworld.net/wp-gutenberg-remove-block-editor-options.html
 */
// add_action( 'init', function () {
//   remove_post_type_support( 'post', 'author' );              // 投稿者
//   remove_post_type_support( 'post', 'post-formats' );        // 投稿フォーマット
//   remove_post_type_support( 'post', 'revisions' );           // リビジョン
//   remove_post_type_support( 'post', 'thumbnail' );           // アイキャッチ
//   remove_post_type_support( 'post', 'excerpt' );             // 抜粋
//   remove_post_type_support( 'post', 'comments' );            // コメント
//   remove_post_type_support( 'post', 'trackbacks' );          // トラックバック
//   remove_post_type_support( 'post', 'custom-fields' );       // カスタムフィールド
//   unregister_taxonomy_for_object_type( 'category', 'post' ); // カテゴリー
//   unregister_taxonomy_for_object_type( 'post_tag', 'post' ); // タグ
// });
