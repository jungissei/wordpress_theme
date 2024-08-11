<?php

// Contact Form 7の自動挿入p,brタグを無効化
add_filter('wpcf7_autop_or_not', function(){
  return false;
});


// フォームのCSS,JSを読み込み
function form_enqueue_scripts() {

  add_action( 'wp_enqueue_scripts', function () {

    $form_assets_version = 1;

    wp_enqueue_style( 'form-common', get_theme_file_uri( '/includes/form/lib/css/style.css' ), [], $form_assets_version);
    wp_enqueue_script( 'form-common', get_theme_file_uri( '/includes/form/lib/js/scripts.js' ), ['jquery'], $form_assets_version);
  });
}
