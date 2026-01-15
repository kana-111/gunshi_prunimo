<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">

  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:site_name" content="" />
  <meta property="og:description" content="" />

  <!-- <?php if (is_404()) : ?>
    <meta http-equiv="refresh" content=" 5; url=<?php echo esc_url(home_url("/")); ?>">
  <?php endif; ?> -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="header layout-header">
    <div class="header__inner inner">
      <div class="header__cta">
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
      <button class="header__hamburger hamburger js-hamburger">
        <span></span>
        <span></span>
        <span></span>
        <span class="hamburger__text">menu</span>
      </button>
    </div>
  </header>
  <div class="drawer layout-drawer js-drawer">
    <div class="drawer__container">
      <div class="drawer__wrap">
        <div class="drawer__inner inner">
          <div class="drawer__logo">
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
          <?php
          $headerNavs = [
            [
              'url'  => '/',
              'text' => 'Home',
            ],
            [
              'url'  => '/#concept',
              'text' => 'コンセプト',
            ],
            [
              'url'  => '/about#facilities',
              'text' => '施設紹介',
            ],
            [
              'url'  => '/#reservation',
              'text' => '料金案内',
            ],
            [
              'url'  => '/about#access',
              'text' => 'アクセス',
            ],
            [
              'url'  => '/about#faq',
              'text' => 'よくある質問',
            ],
            [
              'url'  => '/news',
              'text' => 'ニュース',
            ],
          ];
          ?>
          <ul class="drawer__nav">
            <?php foreach ($headerNavs as $i => $headerNav) : ?>
              <li class="drawer__nav-item">
                <a href="<?php echo esc_url($headerNav['url']); ?>"" class=" drawer__nav-link">
                  <?php echo esc_html($headerNav['text']); ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
          <div class="drawer__contact-wrap">
            <div class="drawer__contact">
              <?php
              get_template_part(
                'parts/component/button',
                null,
                [
                  'url'      => '/#contact',
                  'text'     => 'お問い合わせ',
                  'modifier' => '',
                ]
              );
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>