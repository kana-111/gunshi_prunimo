<?php
$en = $args['en'] ?? '';
$ja = $args['ja'] ?? '';
$modifier = $args['modifier'] ?? '';

$classes = 'title';
if ($modifier) {
    $classes .= ' title--' . esc_attr($modifier);
}
?>

<hgroup class="<?php echo esc_attr($classes); ?>">
    <h2><?php echo esc_html($en); ?></h2>
    <p><?php echo wp_kses_post($ja); ?></p>
</hgroup>