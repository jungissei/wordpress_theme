<?php


add_action( 'restrict_manage_posts', function () {
  global $post_type;
  if ( $post_type == 'page' ) {
    $taxonomy = 'page-cat';
    wp_dropdown_categories( array(
      'show_option_all' => 'すべてのカテゴリー',
      'orderby' => 'name',
      'selected' => get_query_var( $taxonomy ),
      'hide_empty' => 0,
      'name' => $taxonomy,
      'taxonomy' => $taxonomy,
      'value_field' => 'slug',
    ) );
  }
});
