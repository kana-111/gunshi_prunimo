<?php
$url = $args['url'] ?? '';
$text = $args['text'] ?? '';
$modifier = $args['modifier'] ?? '';

$classes = 'button';
if ($modifier) {
    $classes .= ' button--' . esc_attr($modifier);
}
?>

<a class="<?php echo esc_attr($classes); ?>" href="<?php echo esc_url(home_url('/')) ?><?php echo esc_attr($url); ?>">
    <?php echo esc_attr($text); ?>
</a>