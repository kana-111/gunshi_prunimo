<?php get_header(); ?>
<main>
    <section class="sub-facilities" id="facilities">
        <div class="sub-facilities__title">
            <?php
            get_template_part(
                'parts/component/sub-title',
                null,
                [
                    'en' => 'Introduction',
                    'ja' => '施設紹介',
                    'img' => 'img_sub-facilities_title',
                    'alt' => '',
                    'modifier' => '',
                ]
            );
            ?>
        </div>
        <?php
        $subFacilities = [
            [
                'titleEn' => "Facade",
                'titleJa' => "外観・玄関",
                'topText' => "ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。",
                'bottomText' => "ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。",
                'bg' => "bg_sub-facilities_facade",
                'slider' => [
                    [
                        'img'  => 'bg_sub-facilities_facade',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_living',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_kitchen',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_bathroom',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun',
                        'alt'  => '',
                    ],
                ],
            ],
            [
                'titleEn' => "Living Dining",
                'titleJa' => "リビング・ダイニング",
                'topText' => "ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。",
                'bottomText' => "ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。",
                'bg' => "bg_sub-facilities_living",
                'slider' => [
                    [
                        'img'  => 'bg_sub-facilities_facade',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_living',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_kitchen',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_bathroom',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun',
                        'alt'  => '',
                    ],
                ],
            ],
            [
                'titleEn' => "Kitchen",
                'titleJa' => "キッチン",
                'topText' => "ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。",
                'bottomText' => "ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。",
                'bg' => "bg_sub-facilities_kitchen",
                'slider' => [
                    [
                        'img'  => 'bg_sub-facilities_facade',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_living',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_kitchen',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_bathroom',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun',
                        'alt'  => '',
                    ],
                ],
            ],
            [
                'titleEn' => "Bathroom",
                'titleJa' => "浴室・洗面・トイレ",
                'topText' => "ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。",
                'bottomText' => "ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。",
                'bg' => "bg_sub-facilities_bathroom",
                'slider' => [
                    [
                        'img'  => 'bg_sub-facilities_facade',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_living',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_kitchen',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_bathroom',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun',
                        'alt'  => '',
                    ],
                ],
            ],
            [
                'titleEn' => "Dogrun",
                'titleJa' => "ドッグラン",
                'topText' => "ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。",
                'bottomText' => "ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。",
                'bg' => "bg_sub-facilities_dogrun",
                'slider' => [
                    [
                        'img'  => 'bg_sub-facilities_facade',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_living',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_kitchen',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_bathroom',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun',
                        'alt'  => '',
                    ],
                ],
            ],

        ];
        ?>
        <div class="sub-facilities__contents">
            <?php foreach ($subFacilities as $i => $subFacility) : ?>
                <div class="sub-facilities__content">
                    <div class="sub-facilities__desc"
                        style="background-image:
                    image-set(url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/<?php echo esc_html($subFacility['bg']); ?>.avif) type('image/avif'),
                    url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/<?php echo esc_html($subFacility['bg']); ?>.jpg) type('image/jpg'));">
                        <div class="sub-facilities__desc-inner inner">
                            <div class="sub-facilities__desc-title">
                                <p><?php echo esc_html($subFacility['titleEn']); ?></p>
                                <h3><?php echo esc_html($subFacility['titleJa']); ?></h3>
                            </div>
                            <div class="sub-facilities__desc-texts">
                                <p class="sub-facilities__desc-topText">
                                    <?php echo wp_kses_post($subFacility['topText']); ?>
                                </p>
                                <p class="sub-facilities__desc-bottomText">
                                    <?php echo wp_kses_post($subFacility['bottomText']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="sub-facilities__slider sub-facilities-slider swiper js-sub-facilities-slider">
                        <!-- <ul class="sub-facilities-slider__wrapper swiper-wrapper">
                            <?php foreach ($subFacility['slider'] as $j => $slide) : ?>
                                <?php
                                $modalId = 'modal-' . $i . '-' . $j;

                                $imgBase = esc_attr($slide['img']); // filename
                                $alt     = esc_attr($slide['alt'] ?? '');

                                $basePath = esc_url(get_template_directory_uri() . '/assets/images/');
                                ?>
                                <li class="sub-facilities-slider__slide swiper-slide">
                                    <div class="sub-facilities-slider__item js-modal-open" data-target="<?php echo $modalId; ?>">
                                        <div class="sub-facilities-slider__item-img">
                                            <picture>
                                                <source srcset="<?php echo $basePath . $imgBase; ?>.avif" type="image/avif">
                                                <img src="<?php echo $basePath . $imgBase; ?>.jpg" alt="<?php echo $alt; ?>">
                                            </picture>
                                        </div>
                                    </div>
                                </li>

                            <?php endforeach; ?>
                        </ul> -->
                        <ul class="sub-facilities-slider__wrapper swiper-wrapper">
                            <?php foreach ($subFacility['slider'] as $j => $slide) : ?>
                                <?php
                                // ★ モーダルは「施設ごと」に1つ
                                $modalId = 'modal-' . $i;

                                $imgBase  = esc_attr($slide['img']); // filename
                                $alt      = esc_attr($slide['alt'] ?? '');
                                $basePath = esc_url(get_template_directory_uri() . '/assets/images/');
                                ?>
                                <li class="sub-facilities-slider__slide swiper-slide">
                                    <div
                                        class="sub-facilities-slider__item js-modal-open"
                                        data-target="<?php echo esc_attr($modalId); ?>"
                                        data-index="<?php echo esc_attr($j); ?>">
                                        <div class="sub-facilities-slider__item-img">
                                            <picture>
                                                <source srcset="<?php echo $basePath . $imgBase; ?>.avif" type="image/avif">
                                                <img src="<?php echo $basePath . $imgBase; ?>.jpg" alt="<?php echo $alt; ?>">
                                            </picture>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="sub-facilities-slider__pagination swiper-pagination"></div>
                    </div>
                    <!-- <?php foreach ($subFacility['slider'] as $j => $slide) : ?>
                        <?php
                                $modalId = 'modal-' . $i . '-' . $j;

                                $imgBase  = esc_attr($slide['img']);
                                $alt      = esc_attr($slide['alt'] ?? '');
                                $basePath = esc_url(get_template_directory_uri() . '/assets/images/');
                        ?>
                        <div class="sub-facilities-slider__modal modal js-modal" id="<?php echo $modalId; ?>" aria-hidden="true">
                            <div class="modal__overlay js-modal-close"></div>
                            <div class="modal__inner inner">
                                <button class="modal__close-button js-modal-close"><span></span><span></span>close</button>
                                <div class="modal__img">
                                    <picture>
                                        <source srcset="<?php echo $basePath . $imgBase; ?>.avif" type="image/avif">
                                        <img src="<?php echo $basePath . $imgBase; ?>.jpg" alt="<?php echo $alt; ?>">
                                    </picture>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?> -->
                    <?php
                    $modalId  = 'modal-' . $i; // ★施設ごとに1つ
                    $basePath = esc_url(get_template_directory_uri() . '/assets/images/');
                    ?>

                    <div class="sub-facilities-slider__modal modal js-modal"
                        id="<?php echo esc_attr($modalId); ?>"
                        aria-hidden="true">
                        <div class="modal__overlay js-modal-close"></div>

                        <div class="modal__inner inner" role="dialog" aria-modal="true">
                            <button class="modal__close-button js-modal-close" type="button">
                                <span></span><span></span>close
                            </button>

                            <!-- ★モーダル内でスライドできるSwiper -->
                            <div class="modal__slider modal-slider swiper js-modal-swiper">
                                <div class="swiper-wrapper modal-slider__wrapper">
                                    <?php foreach ($subFacility['slider'] as $j => $slide) : ?>
                                        <?php
                                        $imgBase = esc_attr($slide['img']);
                                        $alt     = esc_attr($slide['alt'] ?? '');
                                        ?>
                                        <div class="swiper-slide modal-slider__slide">
                                            <div class="modal__img">
                                                <picture>
                                                    <source srcset="<?php echo $basePath . $imgBase; ?>.avif" type="image/avif">
                                                    <img src="<?php echo $basePath . $imgBase; ?>.jpg" alt="<?php echo $alt; ?>">
                                                </picture>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="modal-slider__prev swiper-button-prev"></div>
                            <div class="modal-slider__next swiper-button-next"></div>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="sub-faq layout-sub-faq" id="faq">
        <div class="sub-faq__title">
            <?php
            get_template_part(
                'parts/component/sub-title',
                null,
                [
                    'en' => 'FAQ',
                    'ja' => 'よくある質問',
                    'img' => 'img_sub-faq_title',
                    'alt' => '',
                    'modifier' => 'reverse',
                ]
            );
            ?>
        </div>
        <div class="sub-faq__inner inner">
            <?php
            $faqs = [
                [
                    'title' => "ペットに関して",
                    'faq' => [
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
                    ],
                ],
                [
                    'title' => "宿泊に関して",
                    'faq' => [
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
                    ],
                ],
                [
                    'title' => "お支払いに関して",
                    'faq' => [
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
                    ],
                ],
            ];
            ?>
            <?php foreach ($faqs as $i => $group) : ?>
                <div class="sub-faq__content js-faq-content">
                    <h3 class="sub-faq__content-title">
                        <?php echo esc_html($group['title']); ?>
                    </h3>
                    <ul class="sub-faq__list faq-list">
                        <?php foreach ($group['faq'] as $j => $item) : ?>
                            <li class="faq-list__item">
                                <p class="faq-list__item-question js-faq-question">
                                    <span>Q.</span>
                                    <?php echo wp_kses_post($item['q']); ?>
                                </p>
                                <p class="faq-list__item-answer">
                                    <span>A.</span>
                                    <?php echo wp_kses_post($item['a']); ?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="sub-access layout-sub-access" id="access">
        <div class="sub-access__title">
            <?php
            get_template_part(
                'parts/component/sub-title',
                null,
                [
                    'en' => 'Access',
                    'ja' => 'アクセス',
                    'img' => 'img_sub-access_title',
                    'alt' => '',
                    'modifier' => '',
                ]
            );
            ?>
        </div>
        <div class="sub-access__inner inner">
            <div class="sub-access__info-wrap">
                <dl class="sub-access__info">
                    <dt class="sub-access__ttle">住所</dt>
                    <dd class="sub-access__item">〒289-1305 千葉県山武市本須賀２８９</dd>
                </dl>
                <dl class="sub-access__info">
                    <dt class="sub-access__ttle">駐車場</dt>
                    <dd class="sub-access__item">敷地内に車を 2 台ほど駐車できるスペースがございます。<br>
                        ぜひご利用ください。</dd>
                </dl>
                <dl class="sub-access__info">
                    <dt class="sub-access__ttle">チェックイン</dt>
                    <dd class="sub-access__item">15:00 – 18:00<br>
                        ※18:00 を超える場合はご連絡ください。</dd>
                </dl>
                <dl class="sub-access__info">
                    <dt class="sub-access__ttle">チェックアウト</dt>
                    <dd class="sub-access__item">10:00</dd>
                </dl>
                <dl class="sub-access__info">
                    <dt class="sub-access__ttle">マップ</dt>
                    <dd class="sub-access__item">
                        <?php
                        get_template_part(
                            'parts/component/map-link',
                            null,
                        );
                        ?>
                    </dd>
                </dl>
            </div>
            <div class="sub-access__map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12984.522602860601!2d140.45967273029007!3d35.5504753769783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6022c3a86102d447%3A0x99f92cb5b57dbf03!2z44CSMjg5LTEzMDUg5Y2D6JGJ55yM5bGx5q2m5biC5pys6aCI6LOA77yS77yY77yZ!5e0!3m2!1sja!2sjp!4v1768439820204!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </section>
</main>

<?php get_footer(); ?>