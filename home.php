<?php get_header(); ?>
<div class="sub-title">
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
            <h2>お知らせ</h2>
            <p>news</p>
        </hgroup>
    </div>
</div>
<main class="sub-news">
    <section class="news change-color">
        <div class="news__inner inner">
            <ul class="news__list news-list">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="news-list__item">
                            <a href="<?php the_permalink(); ?>" class="news-list__link">
                                <time
                                    datetime="<?php echo esc_attr(get_the_date('c')); ?>"
                                    class="news-list__date">
                                    <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                </time>
                                <h3 class="news-list__title"><?php the_title(); ?></h3>
                            </a>
                        </li>
                    <?php endwhile; ?>

                <?php else : ?>
                    <li class="news-list__item">
                        <p class="news-list__empty">お知らせはまだありません。</p>
                    </li>
                <?php endif; ?>
            </ul>

            <?php if (have_posts()) : ?>
                <nav class="news__pagination pagination" aria-label="ページナビゲーション">
                    <?php
                    the_posts_pagination([
                        'mid_size'  => 1,
                        'prev_text' => '',
                        'next_text' => '',
                        'screen_reader_text' => '',
                    ]);
                    ?>
                </nav>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>