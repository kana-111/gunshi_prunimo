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
<main class="single change-color">
    <section class="single__wrapper">
        <div class="single__inner inner">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <article class="single__article article">

                        <div class="article__head">
                            <time
                                datetime="<?php echo esc_attr(get_the_date('c')); ?>"
                                class="article__date">
                                <?php echo esc_html(get_the_date('Y.m.d')); ?>
                            </time>

                            <h1 class="article__title"><?php the_title(); ?></h1>

                            <div class="article__thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', [
                                        'alt'     => esc_attr(get_the_title()),
                                        'loading' => 'lazy',
                                    ]); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="article__content">
                            <?php the_content(); ?>
                        </div>
                        <nav class="article__nav article-nav" aria-label="記事ナビゲーション">
                            <div class="article-nav__prev">
                                <?php
                                previous_post_link(
                                    '%link',
                                    '前の記事'
                                );
                                ?>
                            </div>

                            <div class="article-nav__archive">
                                <a href="<?php echo esc_url(home_url('/news/')); ?>">
                                    記事一覧へ戻る
                                </a>
                            </div>

                            <div class="article-nav__next">
                                <?php
                                next_post_link(
                                    '%link',
                                    '次の記事'
                                );
                                ?>
                            </div>
                        </nav>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>