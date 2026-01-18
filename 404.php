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
    </div>
</div>
<main class="sub-404">
    <div class="sub-404__inner inner">
        <div class="sub-404__title">
            <?php get_template_part(
                'parts/component/title',
                null,
                [
                    'en' => '404 Not found',
                    'ja' => 'お探しのページは<br>見つかりませんでした。',
                    'modifier' => 'black',
                ]
            );
            ?>
        </div>
        <p class="sub-404__text">
            お探しのページは、移動や削除されたか、<br class="sp-only">一時的にご利用できない可能性があります。<br>
            TOPページから再度アクセスアクセスしてください。
        </p>
        <div class="sub-404__link">
            <?php
            get_template_part(
                'parts/component/button',
                null,
                [
                    'url'      => '/',
                    'text'     => 'TOPへもどる',
                    'modifier' => 'black',
                ]
            );
            ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>