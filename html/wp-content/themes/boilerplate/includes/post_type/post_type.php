<?php

// ----------------------------------------------------------------------------
// Includes
// ----------------------------------------------------------------------------
(function() {

  // インクルードファイルクラス名の配列
  $class_names = [
    'gutenberg_full',
    'gutenberg_restricted',
    'custom_field_editor',
    'news',
  ];

  // インクルードファイルのパス
  $includes_path = __DIR__ . '/';

  // 各クラスファイルをインクルード
  foreach ($class_names as $class_name) {
    include_class_file($class_name, $includes_path);
  }
})();
