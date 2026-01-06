<?php get_header(); ?>
<div class="mv">
    <div class="mv__inner inner">
        <div class="mv__slider mv-slider swiper js-mv-swiper">
            <div class="mv-slider__wrapper swiper-wrapper">
                <div class="mv-slider__slide swiper-slide">
                    <div class="mv-slider__image">
                        <picture>
                            <source
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-mv01.avif"
                                type="image/avif"
                                media="(min-width: 768px)">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-mv01.jpg"
                                alt="">
                        </picture>
                    </div>
                </div>
                <div class="mv-slider__slide swiper-slide">
                    <div class="mv-slider__image">
                        <picture>
                            <source
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-mv02.avif"
                                type="image/avif"
                                media="(min-width: 768px)">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-mv02.jpg"
                                alt="">
                        </picture>
                    </div>
                </div>
                <div class="mv-slider__slide swiper-slide">
                    <div class="mv-slider__image">
                        <picture>
                            <source
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-mv03.avif"
                                type="image/avif"
                                media="(min-width: 768px)">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-mv03.jpg"
                                alt="">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
        <div class="mv__logo">
            <picture>
                <source
                    srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_logo.avif"
                    type="image/avif">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_logo.ping"
                    alt="愛犬と泊まれる宿プルニモ">
            </picture>
        </div>
        <div class="mv__scroll">Scroll</div>
    </div>
</div>
<main>
    <section class="intro">
        <div class="intro__inner inner">

        </div>
    </section>
</main>

<?php get_footer(); ?>