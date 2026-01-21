<footer class="footer">
  <div class="footer__reservation">
    <?php
    get_template_part(
      'parts/component/button',
      null,
      [
        'url'      => '/',
        'text'     => 'ご予約はこちら',
        'modifier' => 'black',
      ]
    );
    ?>
  </div>
  <div class="footer__cta" id="contact">
    <a href="" class="footer__cta-link">
      <span>line</span>でお問い合わせ
    </a>
    <a href="<?php echo esc_url(home_url('/contact')) ?>" class="footer__cta-link">
      <span>メール</span>でお問い合わせ
    </a>
  </div>
  <div class="footer__contents bg-video">
    <div class="bg-video__container">
      <video class="js-bg-video" src="<?php echo get_template_directory_uri(); ?>/assets/images/bg_video.mp4" autoplay muted loop playsinline></video>
    </div>
    <div class="footer__contents-inner bg-video__inner inner">
      <?php
      $footerLinks = [
        [
          'url'  => '/',
          'text' => '利用案内',
        ],
        [
          'url'  => '/',
          'text' => '注意事項',
        ],
        [
          'url'  => '/',
          'text' => '宿泊約款',
        ],
        [
          'url'  => '/policy',
          'text' => 'プライバシーポリシー',
        ],
      ];
      ?>
      <div class="footer__links">
        <?php foreach ($footerLinks as $i => $footerLink) : ?>
          <?php
          get_template_part(
            'parts/component/button',
            null,
            [
              'url'      => $footerLink['url'],
              'text'     => $footerLink['text'],
              'modifier' => '',
            ]
          );
          ?>
        <?php endforeach; ?>
      </div>
      <div class="footer__info-wrap">
        <div class="footer__info">
          <div class="footer__logo">
            <a href="<?php echo esc_url(home_url('/')) ?>">
              <picture>
                <source
                  srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img_logo.avif"
                  type="image/avif">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img_logo.png"
                  alt="愛犬と泊まれる宿プルニモ">
              </picture>
            </a>
          </div>
          <div class="footer__address">
            <p class="footer__address-title">住所</p>
            <p class="footer__address-text">〒289-1305 千葉県山武市本須賀２８９</p>
            <?php
            get_template_part(
              'parts/component/map-link',
              null,
            );
            ?>
          </div>
        </div>
        <div class="footer__nav-wrap">
          <div class="footer__nav-reservation">
            <?php
            get_template_part(
              'parts/component/button',
              null,
              [
                'url'      => '/',
                'text'     => 'ご予約はこちら',
                'modifier' => 'sm',
              ]
            );
            ?>
          </div>
          <?php
          $footerNavs = [
            [
              'url'  => '/',
              'text' => 'Home',
            ],
            [
              'url'  => '/#concept',
              'text' => 'コンセプト',
            ],
            [
              'url'  => '/about/#facilities',
              'text' => '施設紹介',
            ],
            [
              'url'  => '/#reservation',
              'text' => '料金案内',
            ],
            [
              'url'  => '/about/#access',
              'text' => 'アクセス',
            ],
            [
              'url'  => '/about/#faq',
              'text' => 'よくある質問',
            ],
            [
              'url'  => '/news',
              'text' => 'ニュース',
            ],
          ];
          ?>
          <ul class="footer__nav footer-nav">
            <?php foreach ($footerNavs as $i => $footerNav) : ?>
              <li class="footer-nav__item">
                <a href="<?php echo esc_url($footerNav['url']); ?>">
                  <?php echo esc_html($footerNav['text']); ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <small class="footer__copy">
          &#169;Prunimo All rights reserved.
        </small>
      </div>
    </div>
  </div>

</footer>
<?php wp_footer(); ?>
</body>

</html>