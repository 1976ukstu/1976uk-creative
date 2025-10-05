<?php
/**
 * Template Name: Custom Commissions and Murals Page
 */

// Include gallery functions
require_once get_template_directory() . '/gallery-functions.php';

get_header();
// Add ACF color picker background for non-home pages
if (!is_front_page() && !is_home()) {
    $bg_colour = get_field('background_colour_commissions'); // Use a unique field name for this page
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
            
                        <div class="paintings-grid">
                            <?php 
                            // Try ACF Pro Gallery field first
                            $gallery = get_field('commissions_and_murals_acf');
                            if ($gallery): ?>
                                <?php foreach ($gallery as $image): 
                                  // ACF Pro Gallery provides full image array
                                  $image_id = $image['ID'];
                                  $title = $image['title'] ?: get_the_title($image_id);
                                  $caption = $image['caption'] ?: wp_get_attachment_caption($image_id);
                                  $description = $image['description'] ?: get_post_field('post_content', $image_id);
                                  $alt = $image['alt'] ?: get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                ?>
                                    <div class="painting-item painting-details">
                                        <a href="<?php echo esc_url($image['url']); ?>" class="lightbox-trigger"
                                            data-title="<?php echo esc_attr($title); ?>"
                                            data-caption="<?php echo esc_attr($caption); ?>"
                                            data-description="<?php echo esc_attr($description); ?>"
                                            data-alt="<?php echo esc_attr($alt); ?>">
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($alt); ?>" />
                                        </a>
                                        <?php if ($title): ?><p><?php echo esc_html($title); ?></p><?php endif; ?>
                                        <?php if ($caption): ?><p><?php echo esc_html($caption); ?></p><?php endif; ?>
                                        <?php if ($description): ?><p><?php echo esc_html($description); ?></p><?php endif; ?>
                                        <?php if ($alt): ?><p class="painting-alt"><?php echo esc_html($alt); ?></p><?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            
                            <?php 
                            // Fallback to old repeater field for backward compatibility
                            elseif( have_rows('commissions_and_murals') ): ?>
                                <?php while( have_rows('commissions_and_murals') ): the_row();
                                    $image = get_sub_field('image');
                                    if ($image) {
                                        $image_id = $image['ID'];
                                        $title = get_the_title($image_id);
                                        $caption = wp_get_attachment_caption($image_id);
                                        $description = get_post_field('post_content', $image_id);
                                        $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                ?>
                                    <div class="painting-item painting-details">
                                        <a href="<?php echo esc_url($image['url']); ?>" class="lightbox-trigger"
                                            data-title="<?php echo esc_attr($title); ?>"
                                            data-caption="<?php echo esc_attr($caption); ?>"
                                            data-description="<?php echo esc_attr($description); ?>"
                                            data-alt="<?php echo esc_attr($alt); ?>">
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($alt); ?>" />
                                        </a>
                                        <?php if ($title): ?><p><?php echo esc_html($title); ?></p><?php endif; ?>
                                        <?php if ($caption): ?><p><?php echo esc_html($caption); ?></p><?php endif; ?>
                                        <?php if ($description): ?><p><?php echo esc_html($description); ?></p><?php endif; ?>
                                        <?php if ($alt): ?><p class="painting-alt"><?php echo esc_html($alt); ?></p><?php endif; ?>
                                    </div>
                                <?php } endwhile; ?>
                            
                            <?php else: ?>
                                <p>No gallery images found. Please add images using the Commissions and Murals ACF Gallery field in the page editor.</p>
                            <?php endif; ?>
                        </div>
            
        <?php endwhile; ?>
    </main>
</div>

<?php get_footer(); ?>