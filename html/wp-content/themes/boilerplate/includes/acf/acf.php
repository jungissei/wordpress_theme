<?php

// ============================================================================
// ACF Setting
// ============================================================================

// if(is_plugin_active( 'advanced-custom-fields-pro/acf.php' )){

//   add_filter('acf/settings/save_json', function ( $path ) {

//     return get_stylesheet_directory() . '/includes/acf';
//   });

//   add_filter('acf/settings/load_json', function ( $paths ) {

//     unset($paths[0]);

//     $paths[] = get_stylesheet_directory() . '/includes/acf';

//     return $paths;
//   });



// /**
//  * Enable ACF Preview
//  * @see https://qiita.com/ki6ool/items/5a13197fbe3c29dc10de
//  */
// function get_preview_id($post_id) {

//   global $post;
//   $preview_id = 0;

//   if(isset($_GET['preview'])
//       && ($post->ID == $post_id)
//         && $_GET['preview'] == true
//           && ($post_id == url_to_postid($_SERVER['REQUEST_URI']))
//   ) {
//     $preview = wp_get_post_autosave($post_id);
//     if ($preview != false) {
//       $preview_id = $preview->ID;
//     }
//   }

//   return $preview_id;
// }

// add_filter('get_post_metadata', function($meta_value, $post_id, $meta_key, $single) {

//   if ($preview_id = get_preview_id($post_id)) {

//     if ($post_id != $preview_id) {
//       $meta_value = get_post_meta($preview_id, $meta_key, $single);
//     }
//   }

//   return $meta_value;
// }, 10, 4);


// add_action('wp_insert_post', function ($post_id) {

//   global $wpdb;

//   if (wp_is_post_revision($post_id)) {
//     if (isset($_POST['fields']) && count($_POST['fields']) != 0) {
//       foreach ($_POST['fields'] as $key => $value) {

//         $field = get_field($key);

//         if ( !isset($field['name']) || !isset($field['key']) ){
//           continue;
//         }

//         if (count(get_metadata('post', $post_id, $field['name'], $value)) != 0) {

//           update_metadata('post', $post_id, $field['name'], $value);
//           update_metadata('post', $post_id, "_" . $field['name'], $field['key']);

//         } else {

//           add_metadata('post', $post_id, $field['name'], $value);
//           add_metadata('post', $post_id, "_" . $field['name'], $field['key']);
//         }
//       }
//     }
//     do_action('save_preview_postmeta', $post_id);
//   }
// });

// }
