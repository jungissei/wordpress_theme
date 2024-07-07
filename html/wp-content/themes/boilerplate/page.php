<?php

if(is_page('contact')){
  add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'form-common', get_theme_file_uri( '/lib/common/form/css/style.css' ), [], 0);
    wp_enqueue_script( 'form-common', get_theme_file_uri( '/lib/common/form/js/scripts.js' ), ['jquery'], 0);
  });
}

get_header();
?>

<main>
  <div class="page_layout layout1">
    <div class="layout_inner">
      <div class="layout_container">
        <div class="layout_width">

          <div class="block_entry">
            <h1 id="entry_title"><?php the_title(); ?></h1>
            <div id="entry_content">
              <?php the_content(); ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>

<?php

get_footer();
