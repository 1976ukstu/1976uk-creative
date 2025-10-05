<?php
/**
 * Template Name: Custom Text Page
 */
get_header();
// Add ACF color picker background for non-home pages
if (!is_front_page() && !is_home()) {
    $bg_colour = get_field('background_colour');
    if ($bg_colour) {
        echo '<style>body.page { background-color: ' . esc_attr($bg_colour) . ' !important; }</style>';
    }
}
?>

<div class="site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: inherit; text-decoration: none;">
        Dragica<br>Carlin
    </a>
</div>

<button class="hamburger" aria-label="Open menu">
    <span></span>
    <span></span>
    <span></span>
</button>

<div class="side-panel">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'side-panel',
        'menu_class'     => 'side-menu',
        'fallback_cb'    => false,
    ) );
    ?>
</div>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php while ( have_posts() ) : the_post(); ?>
            
            <!-- Text Page Content Structure -->
            <div class="text-page-content">
            
                
                <!-- WordPress Content (if you add content in admin) -->
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                
                <!-- 2x4 Grid Layout -->
                <div class="text-grid-container">
                  <?php if( have_rows('tiles') ): ?>
                    <?php while( have_rows('tiles') ): the_row();
                      $type = get_sub_field('type');
                      $content = get_sub_field('content');
                      $image = get_sub_field('image');
                    ?>
                      <div class="text-card <?php echo esc_attr($type); ?>-card">
                        <div class="text-card-inner">
                          <?php if ($type == 'text' && $content): ?>
                            <div class="text-content"><?php echo wp_kses_post($content); ?></div>
                          <?php elseif ($type == 'image' && $image): ?>
                            <div class="image-wrapper">
                              <img src="<?php echo esc_url($image['url']); ?>" alt="" />
                            </div>
                          <?php endif; ?>
                        </div>
                      </div>
                    <?php endwhile; ?>
                  <?php endif; ?>
                </div>
            </div> 
        <?php endwhile; ?>
    </main>
</div>

<?php get_footer(); ?>