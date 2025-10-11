<?php get_header(); ?>
<?php
// Set background image for home page - no ACF dependency
$bg_image_url = get_template_directory_uri() . '/images/1976uk-creative-bg.webp';
echo '<style>body.home { 
    background-image: url(' . esc_url($bg_image_url) . '); 
    background-size: cover; 
    background-position: center; 
    background-attachment: fixed;
}</style>';
?>

<div class="site-title">
    1976uk<br>Creative
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