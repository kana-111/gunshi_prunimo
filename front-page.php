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
        <div class="intro__inner bg-video__inner inner">
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
            'img' => "bg_top-concept01",
            'link' => [
                'url'  => '/',
                'text' => '詳しくはこちら',
            ],
        ],
        [
            'text' => "“非日常”と“我が家”の<br>ちょうどいいバランス",
            'img' => "bg_top-concept02",
            'link' => [
                'url'  => '/',
                'text' => '詳しくはこちら',
            ],
        ],
        [
            'text' => "地域との調和<br>四季の彩り",
            'img' => "bg_top-concept03",
            'link' => [
                'url'  => '/',
                'text' => '詳しくはこちら',
            ],
        ],
        [
            'text' => "“ふわふわ”の<br>幸福感を届ける<br>デザインとサービス",
            'img' => "bg_top-concept04",
            'link' => [
                'url'  => '/',
                'text' => '詳しくはこちら',
            ],
        ],
    ];
    ?>

    <section class="concept js-concept" aria-label="Concept" id="concept">
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
                        <div class="concept__img">
                            <picture>
                                <source
                                    srcset="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $concept['img'] . '.avif'); ?>"
                                    type="image/avif">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $concept['img'] . '.jpg'); ?>"
                                    alt="">
                            </picture>
                        </div>
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
                <div class="facilities__content">
                    <div class="facilities__title">
                        <?php get_template_part(
                            'parts/component/title',
                            null,
                            [
                                'en' => 'Introduction',
                                'ja' => '施設紹介',
                                'modifier' => 'left',
                            ]
                        );
                        ?>
                    </div>
                    <p class="facilities__text text">
                        ここにテキストが入ります。ここにテキストが入ります。<br>
                        ここにテキストが入ります。ここにテキストが入ります。<br>
                        ここにテキストが入ります。ここにテキストが入ります。<br>
                        ここにテキストが入ります。
                    </p>
                    <div class="facilities__link">
                        <?php
                        get_template_part(
                            'parts/component/more',
                            null,
                            [
                                'url'      => '/about#facilities',
                                'text'     => '詳しくみる',
                                'modifier' => 'facilities',
                            ]
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="reservation" id="reservation">
        <div class="reservation__inner inner">
            <div class="reservation__contents">
                <div class="reservation__content">
                    <div class="reservation__title">
                        <?php get_template_part(
                            'parts/component/title',
                            null,
                            [
                                'en' => 'Reservation',
                                'ja' => '料金・予約について',
                                'modifier' => 'left',
                            ]
                        );
                        ?>
                    </div>
                    <p class="reservation__text text">
                        ここにテキストが入ります。ここにテキストが入ります。<br>
                        ここにテキストが入ります。ここにテキストが入ります。<br>
                        ここにテキストが入ります。ここにテキストが入ります。<br>
                        ここにテキストが入ります。
                    </p>
                </div>
                <div class="reservation__content">
                    <dl class="reservation__list">
                        <dt class="reservation__ttl">住所</dt>
                        <dd class="reservation__item">
                            〒289-1305 千葉県山武市本須賀２８９<br>
                            <?php
                            get_template_part(
                                'parts/component/map-link',
                                null,
                            );
                            ?>
                        </dd>
                    </dl>
                    <dl class="reservation__list">
                        <dt class="reservation__ttl">お車でお越しのかた</dt>
                        <dd class="reservation__item">真亀JCTから県道30号と産業道路経由</dd>
                    </dl>
                    <dl class="reservation__list">
                        <dt class="reservation__ttl">空港でお越しのかた</dt>
                        <dd class="reservation__item">成田空港から車で約90分</dd>
                    </dl>
                    <div class="reservation__link">
                        <?php
                        get_template_part(
                            'parts/component/more',
                            null,
                            [
                                'url'      => '/',
                                'text'     => '料金についてはこちら',
                                'modifier' => '',
                            ]
                        );
                        ?>
                    </div>
                    <div class="reservation__link">
                        <?php
                        get_template_part(
                            'parts/component/more',
                            null,
                            [
                                'url'      => '/',
                                'text'     => 'ご予約はこちら',
                                'modifier' => '',
                            ]
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="faq bg-video">
        <div class="bg-video__container">
            <video class="js-bg-video" src="<?php echo get_template_directory_uri(); ?>/assets/images/bg_video.mp4" autoplay muted loop playsinline></video>
        </div>
        <div class="faq__inner bg-video__inner inner">
            <div class="faq__title">
                <?php get_template_part(
                    'parts/component/title',
                    null,
                    [
                        'en' => 'faq',
                        'ja' => 'よくある質問',
                        'modifier' => 'faq',
                    ]
                );
                ?>
            </div>
            <?php
            $faqs = [
                [
                    'q' => 'テキストテキストテキストテキストテキストテキストテキストテキストテキスト1',
                    'a' => 'テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト1',
                ],
                [
                    'q' => 'テキストテキストテキストテキストテキストテキストテキストテキストテキスト2',
                    'a' => 'テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト2',
                ],
                [
                    'q' => 'テキストテキストテキストテキストテキストテキストテキストテキストテキスト3',
                    'a' => 'テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト3',
                ],
                [
                    'q' => 'テキストテキストテキストテキストテキストテキストテキストテキストテキスト4',
                    'a' => 'テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト4',
                ],
                [
                    'q' => 'テキストテキストテキストテキストテキストテキストテキストテキストテキスト5',
                    'a' => 'テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト5',
                ],
            ];
            ?>
            <div class="faq__content js-faq-content">
                <h3 class="faq__content-title">ペットに関して</h3>
                <ul class="faq__list faq-list">
                    <?php foreach ($faqs as $i => $faq) : ?>
                        <li class="faq-list__item">
                            <p class="faq-list__item-question js-faq-question">
                                <span>Q.</span>
                                <?php echo wp_kses_post($faq['q']); ?>
                            </p>
                            <p class="faq-list__item-answer">
                                <span>A.</span>
                                <?php echo wp_kses_post($faq['a']); ?>
                            </p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="faq__link">
                    <?php
                    get_template_part(
                        'parts/component/more',
                        null,
                        [
                            'url'      => '/about#faq',
                            'text'     => '詳しくみる',
                            'modifier' => 'facilities',
                        ]
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="news change-color">
        <div class="news__inner inner">
            <div class="news__title">
                <?php get_template_part(
                    'parts/component/title',
                    null,
                    [
                        'en' => 'News',
                        'ja' => 'お知らせ',
                        'modifier' => 'black',
                    ]
                );
                ?>
            </div>
            <ul class="news__list news-list">
                <?php
                $news_query = new WP_Query([
                    'post_type'      => 'post', // 通常の投稿
                    'posts_per_page' => 3,      // 3件表示
                    'post_status'    => 'publish',
                ]);

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) :
                        $news_query->the_post();
                ?>
                        <li class="news-list__item">
                            <a href="<?php the_permalink(); ?>" class="news-list__link">
                                <time
                                    datetime="<?php echo esc_attr(get_the_date('c')); ?>"
                                    class="news-list__date">
                                    <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                </time>
                                <h3 class="news-list__title">
                                    <?php the_title(); ?>
                                </h3>
                            </a>
                        </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </ul>

            <div class="news__link">
                <?php
                get_template_part(
                    'parts/component/more',
                    null,
                    [
                        'url'      => '/news',
                        'text'     => '詳しくみる',
                        'modifier' => 'black',
                    ]
                );
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>