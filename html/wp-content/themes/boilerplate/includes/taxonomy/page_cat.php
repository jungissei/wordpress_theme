<?php

register_taxonomy(
  'page_cat',
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
