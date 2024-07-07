<?php

// Contact Form 7の自動挿入p,brタグを無効化
add_filter('wpcf7_autop_or_not', function(){
  return false;
});
