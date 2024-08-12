<?php
/**
 * Template Name: お問い合わせページ
 */


form_enqueue_scripts();

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
