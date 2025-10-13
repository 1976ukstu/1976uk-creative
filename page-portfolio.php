<?php
/**
 * Template Name: Portfolio
 * 
 * Custom template for Portfolio page with 3-card responsive grid
 * Uses ACF Free repeater fields for flexible content management
 */
get_header();
?>

<div class="site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: inherit; text-decoration: none;">
        1976uk<br>Creative
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
        'fallback_cb'    => 'creative_lab_side_fallback_menu',
    ) );
    ?>
</div>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        
        <!-- Portfolio Page Content -->
        <div class="portfolio-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Page Title -->
                    <div class="page-header">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        <?php if (get_the_content()) : ?>
                            <div class="page-intro">
                                <?php the_content(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Portfolio Grid -->
                    <?php if (have_rows('portfolio_items')) : ?>
                        <div class="portfolio-grid">
                            <?php while (have_rows('portfolio_items')) : the_row(); 
                                $image = get_sub_field('portfolio_image');
                                $title = get_sub_field('portfolio_title');
                                $description = get_sub_field('portfolio_description');
                                $link = get_sub_field('portfolio_link');
                            ?>
                                <div class="portfolio-card">
                                    <?php if ($image) : ?>
                                        <div class="portfolio-image">
                                            <img src="<?php echo esc_url($image['url']); ?>" 
                                                 alt="<?php echo esc_attr($image['alt']); ?>"
                                                 onclick="openLightbox('<?php echo esc_url($image['url']); ?>', '<?php echo esc_js($title); ?>', '<?php echo esc_js($description); ?>')">
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="portfolio-info">
                                        <?php if ($title) : ?>
                                            <h3 class="portfolio-title"><?php echo esc_html($title); ?></h3>
                                        <?php endif; ?>
                                        
                                        <?php if ($description) : ?>
                                            <p class="portfolio-description"><?php echo esc_html($description); ?></p>
                                        <?php endif; ?>
                                        
                                        <?php if ($link) : ?>
                                            <a href="<?php echo esc_url($link); ?>" class="portfolio-link" target="_blank">
                                                View Project
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <div class="no-portfolio-items">
                            <p>No portfolio items to display yet. Add some content in the WordPress admin!</p>
                        </div>
                    <?php endif; ?>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
        </div>
        
    </main>
</div>

<!-- Lightbox for Portfolio Images -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <div class="lightbox-content" onclick="event.stopPropagation()">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img id="lightbox-image" src="" alt="">
        <div class="lightbox-info">
            <h3 id="lightbox-title"></h3>
            <p id="lightbox-description"></p>
        </div>
    </div>
</div>

<script>
function openLightbox(imageSrc, title, description) {
    document.getElementById('lightbox').style.display = 'flex';
    document.getElementById('lightbox-image').src = imageSrc;
    document.getElementById('lightbox-title').textContent = title || '';
    document.getElementById('lightbox-description').textContent = description || '';
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close lightbox with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeLightbox();
    }
});
</script>

<?php get_footer(); ?>