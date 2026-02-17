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
                    'img' => 'img_title-introduction',
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
                'topText' => "自然と調和するよう計算された、美しい佇まい。",
                'bottomText' => "一棟貸しならではの独立した空間が、到着した瞬間から非日常へと誘います。
				周囲の景観に溶け込みながらも、確かな存在感を放つファサード。
				大切な家族と過ごす時間を守るための、静けさとプライバシーを備えた設計です。",
                'bg' => "bg_sub-facilities_facade01",
                'slider' => [
                    [
                        'img'  => 'bg_sub-facilities_facade01',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_facade02',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_facade03',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_facade04',
                        'alt'  => '',
                    ],
                ],
            ],
            [
                'titleEn' => "Living Dining",
                'titleJa' => "リビング・ダイニング",
                'topText' => "光と開放感に満ちた、くつろぎの中心となる空間。",
                'bottomText' => "大きな窓から広がる景色が、時間の流れをゆるやかに変えていきます。
				ペットも人も、同じ目線で寛げる広々としたリビング・ダイニング。
				会話を楽しみ、食事を囲み、何もしない贅沢を味わうための場所です。",
                'bg' => "bg_sub-facilities_living06",
                'slider' => [
                    [
                        'img'  => 'bg_sub-facilities_living01',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_living02',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_living03',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_living04',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_living05',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_living06',
                        'alt'  => '',
                    ],
                ],
            ],
            [
                'titleEn' => "Kitchen",
                'titleJa' => "キッチン",
                'topText' => "滞在を、より自由で豊かなものにするためのキッチン。",
                'bottomText' => "調理器具や設備を整え、長期滞在や特別な日の食事にも対応します。
				外食に縛られない、自分たちのペースで過ごす時間。
				ペットと離れることなく、日常の延長線上にある上質な滞在を叶えます。",
                'bg' => "bg_sub-facilities_kitchen01",
                'slider' => [
                    [
                        'img'  => 'bg_sub-facilities_kitchen01',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_kitchen02',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_kitchen03',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_kitchen04',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_kitchen05',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_kitchen06',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_kitchen07',
                        'alt'  => '',
                    ],
                ],
            ],

            [
                'titleEn' => "Bathroom",
                'titleJa' => "浴室・洗面・トイレ",
                'topText' => "清潔感と上質さを追求し、滞在中の快適さを静かに支えます。",
                'bottomText' => "余計な装飾を排したデザインと、使い勝手に配慮した設え。朝の支度から夜のリラックスタイムまで、日常以上の心地よさを感じていただけます。",
                'bg' => "bg_sub-facilities_bathroom05",
                'slider' => [
                    [
                        'img'  => 'bg_sub-facilities_bathroom01',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_bathroom02',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_bathroom03',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_bathroom04',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_bathroom05',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_bathroom06',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_bathroom07',
                        'alt'  => '',
                    ],
                ],
            ],
            [
                'titleEn' => "Dogrun",
                'titleJa' => "ドッグラン",
                'topText' => "共に過ごす時間そのものを豊かにするための庭",
                'bottomText' => "周囲を気にすることなく、自由に駆け回れるプライベートドッグラン。
				自然の風や光を感じながら、ペットが本来の表情を取り戻していく様子を、すぐそばで見守ることができます。",
                'bg' => "bg_sub-facilities_dogrun05",
                'slider' => [
                    [
                        'img'  => 'bg_sub-facilities_dogrun01',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun02',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun03',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun04',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun05',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun06',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun07',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun08',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun09',
                        'alt'  => '',
                    ],
                    [
                        'img'  => 'bg_sub-facilities_dogrun10',
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
                    'img' => 'img_title-faq',
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
                            'q' => 'どのようなペットが同伴可能ですか？',
                            'a' => '当施設では、基本的に犬の同伴が可能です。頭数・サイズ・犬種については事前に条件を設けておりますので、ご予約時にご確認ください。',
                        ],
                        [
                            'q' => 'ペット料金はかかりますか？',
                            'a' => 'ペット同伴に際して、別途料金をお願いする場合がございます。詳細はご予約時にご案内いたします。',
                        ],
                        [
                            'q' => '室内でペットと一緒に過ごせますか？',
                            'a' => 'はい、室内でもご一緒にお過ごしいただけます。寝具や家具の上で過ごす場合は、マットやカバーのご使用をお願いいたします。',
                        ],
                        [
                            'q' => 'ドッグラン（庭）は自由に利用できますか？',
                            'a' => 'ご宿泊中は、プライベートドッグランとして自由にご利用いただけます。安全管理は飼い主様の責任にてお願いいたします。',
                        ],
                    ],
                ],
                [
                    'title' => "宿泊に関して",
                    'faq' => [
                        [
                            'q' => '何名まで宿泊できますか？',
                            'a' => 'ご宿泊可能人数には上限がございます。詳細は施設概要ページまたはご予約時にご確認ください。',
                        ],
                        [
                            'q' => 'チェックイン・チェックアウトの時間を教えてください。',
                            'a' => 'チェックイン・チェックアウトの時間は事前にご案内しております。時間外のご利用をご希望の場合は、事前にご相談ください。',
                        ],
                        [
                            'q' => '連泊は可能ですか？',
                            'a' => 'はい、連泊も可能です。長期滞在をご希望の場合は、滞在内容に応じたご提案をいたします。',
                        ],
                        [
                            'q' => '食事の提供はありますか？',
                            'a' => '当施設では食事の提供は行っておりません。キッチンをご自由にご利用いただき、ご自身のペースでお過ごしください。',
                        ],
                    ],
                ],
                [
                    'title' => "お支払いに関して",
                    'faq' => [
                        [
                            'q' => '支払い方法を教えてください。',
                            'a' => 'お支払いは事前決済を基本としております。ご利用可能な決済方法は、ご予約時にご案内いたします。',
                        ],
                        [
                            'q' => '予約後に料金が変わることはありますか？',
                            'a' => '原則として、ご予約確定後の料金変更はございません。ただし、人数変更などがあった場合は再計算となる場合があります。',
                        ],
                        [
                            'q' => 'キャンセル料はいつから発生しますか？',
                            'a' => 'キャンセル料は、別途定めるキャンセルポリシーに基づき発生いたします。詳細はキャンセルポリシーページをご確認ください。',
                        ],
                        [
                            'q' => '領収書は発行できますか？',
                            'a' => 'はい、領収書の発行が可能です。ご希望の際は、ご予約時またはご宿泊後にお申し付けください。',
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
                    'img' => 'img_title-access',
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