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
    <div class="drawer__container"></div>
  </div>