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
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_logo.png"
                    alt="愛犬と泊まれる宿プルニモ">
            </picture>
        </div>
        <div class="mv__scroll">Scroll</div>
    </div>
</div>
<main>
    <section class="intro bg-video">
        <div class="bg-video__container">
            <video class="js-bg-video" src="<?php echo get_template_directory_uri(); ?>/assets/images/bg_video.mp4" autoplay muted loop playsinline></video>
        </div>
        <div class="intro__inner inner">
            <div class="intro__contents">
                <div class="intro__gallery">
                    <figure class="intro__img01">
                        <picture>
                            <source
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-intro01.avif"
                                type="image/avif">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-intro01.jpg"
                                alt="">
                        </picture>
                    </figure>
                    <figure class="intro__img02">
                        <picture>
                            <source
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-intro02.avif"
                                type="image/avif">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-intro02.jpg"
                                alt="">
                        </picture>
                    </figure>
                    <figure class="intro__img03">
                        <picture>
                            <source
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-intro03.avif"
                                type="image/avif">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-intro03.jpg"
                                alt="">
                        </picture>
                    </figure>
                    <figure class="intro__img04">
                        <picture>
                            <source
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-intro04.avif"
                                type="image/avif">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-intro04.jpg"
                                alt="">
                        </picture>
                    </figure>
                </div>
                <div class="intro__textarea">
                    <h2 class="intro__title">
                        愛おしさが宿る<br>
                        ふわもこ時間
                    </h2>
                    <p class="intro__text">
                        自然と調和した空間で、<br>
                        大切な家族とのかけがえのないひとときを。
                    </p>
                </div>
            </div>
        </div>
    </section>
    <?php
    $concepts = [
        [
            'text' => "ドッグファーストな<br>癒し空間。",
            'link' => [
                'url'  => '/',
                'text' => '詳しくはこちら',
            ],
        ],
        [
            'text' => "“非日常”と“我が家”の<br>ちょうどいいバランス",
            'link' => [
                'url'  => '/',
                'text' => '詳しくはこちら',
            ],
        ],
        [
            'text' => "地域との調和<br>四季の彩り",
            'link' => [
                'url'  => '/',
                'text' => '詳しくはこちら',
            ],
        ],
        [
            'text' => "“ふわふわ”の<br>幸福感を届ける<br>デザインとサービス",
            'link' => [
                'url'  => '/',
                'text' => '詳しくはこちら',
            ],
        ],
    ];
    ?>

    <section class="concept js-concept" aria-label="Concept">
        <div class="concept__sticky">
            <div class="concept__fade concept__fade--top" aria-hidden="true"></div>
            <div class="concept__fade concept__fade--bottom" aria-hidden="true"></div>
            <?php foreach ($concepts as $i => $concept) : ?>
                <?php
                $index      = sprintf('%02d', $i + 1);
                $index_next = sprintf('%02d', $i + 2);
                ?>
                <div class="concept__container js-concept-container" data-index="<?php echo esc_attr($index); ?>">
                    <div class="concept__inner inner">
                        <div class="concept__progress progress"
                            aria-hidden="true"
                            data-index="<?php echo esc_attr($index); ?>"
                            data-index-next="<?php echo esc_attr($index_next); ?>">
                            <span class="progress__bar">
                                <span class="progress__barFill js-progress-bar"></span>
                            </span>
                        </div>
                        <div class="concept__content js-concept-content">
                            <div class="concept__title">
                                <?php
                                get_template_part(
                                    'parts/component/title',
                                    null,
                                    [
                                        'en' => 'Concept',
                                        'ja' => 'コンセプト',
                                        'modifier' => '',
                                    ]
                                );
                                ?>
                            </div>

                            <p class="concept__text">
                                <?php echo wp_kses_post($concept['text']); ?>
                            </p>

                            <div class="concept__link">
                                <?php
                                get_template_part(
                                    'parts/component/more',
                                    null,
                                    [
                                        'url'      => $concept['link']['url'],
                                        'text'     => $concept['link']['text'],
                                        'modifier' => '',
                                    ]
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </section>
    <section class="facilities js-facilities">
        <div class="facilities__inner inner">
            <div class="facilities__contents">
                <div class="facilities__gallery">
                    <div class="facilities__slider facilities-slider js-facilities-slider01 swiper">
                        <ul class="facilities-slider__wrapper swiper-wrapper">
                            <li class="facilities-slider__slide swiper-slide">
                                <picture>
                                    <source
                                        srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-facilities01.avif"
                                        type="image/avif">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-facilities01.jpg"
                                        alt="">
                                </picture>
                            </li>
                            <li class="facilities-slider__slide swiper-slide">
                                <picture>
                                    <source
                                        srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-facilities02.avif"
                                        type="image/avif">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-facilities02.jpg"
                                        alt="">
                                </picture>
                            </li>
                            <li class="facilities-slider__slide swiper-slide">
                                <picture>
                                    <source
                                        srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-facilities03.avif"
                                        type="image/avif">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-facilities03.jpg"
                                        alt="">
                                </picture>
                            </li>
                        </ul>
                    </div>
                    <div class="facilities__slider facilities-slider js-facilities-slider02 swiper pc-only">
                        <ul class="facilities-slider__wrapper swiper-wrapper">
                            <li class="facilities-slider__slide swiper-slide">
                                <picture>
                                    <source
                                        srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-facilities04.avif"
                                        type="image/avif">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-facilities04.jpg"
                                        alt="">
                                </picture>
                            </li>
                            <li class="facilities-slider__slide swiper-slide">
                                <picture>
                                    <source
                                        srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-facilities05.avif"
                                        type="image/avif">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-facilities05.jpg"
                                        alt="">
                                </picture>
                            </li>
                            <li class="facilities-slider__slide swiper-slide">
                                <picture>
                                    <source
                                        srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-facilities06.avif"
                                        type="image/avif">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_top-facilities06.jpg"
                                        alt="">
                                </picture>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="facilities__content">ああああ</div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>