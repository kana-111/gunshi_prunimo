<?php
$en = $args['en'] ?? '';
$ja = $args['ja'] ?? '';
$img = $args['img'] ?? '';
$alt = $args['alt'] ?? '';
$modifier = $args['modifier'] ?? '';

$classes = 'sub-title';
if ($modifier) {
    $classes .= ' sub-title--' . esc_attr($modifier);
}
?>


<div class="<?php echo esc_attr($classes); ?>">
    <div class="sub-title__inner inner">
        <div class="sub-title__image">
            <picture>
                <source
                    srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/<?php echo esc_html($img); ?>.avif"
                    type="image/avif">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/<?php echo esc_html($img); ?>.jpg"
                    alt="<?php echo esc_html($alt); ?>">
            </picture>
        </div>
        <hgroup class="sub-title__ttl">
            <h2><?php echo esc_html($ja); ?></h2>
            <p><?php echo esc_html($en); ?></p>
        </hgroup>
    </div>
</div>