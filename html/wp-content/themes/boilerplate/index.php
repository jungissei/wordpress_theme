<?php get_header(); ?>

<main>
  <div class="page_layout layout1">
    <div class="layout_inner">
      <div class="layout_container">
        <div class="layout_width">
          <p>123</p>
          <?php if(have_posts()): ?>
            <?php while(have_posts()):
              the_post();
            ?>
              <?php the_content(); ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
