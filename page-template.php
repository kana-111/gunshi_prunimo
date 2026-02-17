<?php

/**
 * Template Name: 固定ページテンプレート
 * Description: 規約等の固定ページテンプレート
 */
get_header();
?>

<main class="page-template">
  <div class="page-template__title sub-title">
    <div class="sub-title__inner inner">
      <div class="sub-title__image">
        <picture>
          <source
            srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img_sub-access_title.avif"
            type="image/avif">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img_sub-access_title.jpg"
            alt="">
        </picture>
      </div>
      <hgroup class="sub-title__ttl">
        <?php if (is_page('policy')) : ?>
          <h2>プライバシー<br>ポリシー</h2>
        <?php else : ?>
          <h2><?php the_title(); ?></h2>
        <?php endif; ?>
        <p><?php echo esc_html(get_post_field('post_name', get_the_ID())); ?></p>
      </hgroup>
    </div>
  </div>

  <div class="page-template__inner inner article">
    <div class="page-template__content article__content">
      <?php
      if (have_posts()) :
        while (have_posts()) :
          the_post();
          the_content();
        endwhile;
      endif;
      ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>