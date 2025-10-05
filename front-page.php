<?php get_header(); ?>
<?php
$bg_image = get_field('background_image');
if ($bg_image) {
    // Check if the field returned an array (the recommended setting) or just a URL string.
    $image_url = is_array($bg_image) ? $bg_image['url'] : $bg_image;
    
    if ($image_url) {
        echo '<style>body.home { background-image: url(' . esc_url($image_url) . '); background-size: cover; background-position: center; }</style>';
    }
}
?>

<div class="site-title">
    Dragica<br>Carlin
</div>

<!-- Permanent menu for home page - no hamburger needed -->
<div class="home-permanent-menu">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'side-panel',
        'menu_class'     => 'home-menu',
        'fallback_cb'    => false,
    ) );
    ?>
</div>

<?php get_footer(); ?>