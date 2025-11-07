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
        <span class="main-title">1976uk</span>
        <span class="sub-title">Creative</span>
    </a>
</div>

<button class="universal-hamburger" aria-label="Open menu">
    <span></span>
    <span></span>
    <span></span>
</button>

<!-- Universal Menu Modal -->
<div class="universal-menu-modal">
    <div class="universal-menu-content">
        <div class="universal-menu-header">
            <h3>Navigation</h3>
            <button class="universal-close-button" aria-label="Close menu">×</button>
        </div>
        <div class="universal-menu-items">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <a href="<?php echo esc_url( home_url( '/websites' ) ); ?>">Websites</a>
            <a href="<?php echo esc_url( home_url( '/gallery' ) ); ?>">Gallery</a>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a>
        </div>
    </div>
</div>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        
        <!-- Portfolio Content with Beautiful Styling -->
        <div class="dashboard-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Beautiful Page Header -->
                    <div class="dashboard-header">
                        <div class="dashboard-title">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <?php if (get_the_content()) : ?>
                            <div class="dashboard-subtitle">
                                <?php the_content(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Dashboard Section for Portfolio -->
                    <div class="dashboard-section">
                        <h2>🌐 Website Portfolio</h2>
                        <p>Professional websites crafted with modern technology and beautiful design</p>
                        
                        <!-- Portfolio Grid -->
                        <?php if (have_rows('portfolio_items')) : ?>
                            <div class="dashboard-gallery-grid">
                                <?php while (have_rows('portfolio_items')) : the_row(); 
                                    $image = get_sub_field('portfolio_image');
                                    $title = get_sub_field('portfolio_title');
                                    $description = get_sub_field('portfolio_description');
                                    $link = get_sub_field('portfolio_link');
                                ?>
                                    <div class="dashboard-card">
                                        <?php if ($image) : ?>
                                            <div class="card-preview">
                                                <img src="<?php echo esc_url($image['url']); ?>" 
                                                     alt="<?php echo esc_attr($image['alt']); ?>"
                                                     class="card-image"
                                                     onclick="openLightbox('<?php echo esc_url($image['url']); ?>', '<?php echo esc_js($title); ?>', '<?php echo esc_js($description); ?>')">
                                                <div class="card-overlay">
                                                    <?php if ($link) : ?>
                                                        <a href="<?php echo esc_url($link); ?>" class="card-action-btn" target="_blank">🌐 Visit Site</a>
                                                    <?php endif; ?>
                                                    <button class="card-action-btn preview-btn" onclick="openLightbox('<?php echo esc_url($image['url']); ?>', '<?php echo esc_js($title); ?>', '<?php echo esc_js($description); ?>')">👁️ Preview</button>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="card-info">
                                            <?php if ($title) : ?>
                                                <h4 class="card-title"><?php echo esc_html($title); ?></h4>
                                            <?php endif; ?>
                                            
                                            <?php if ($description) : ?>
                                                <p class="card-description"><?php echo esc_html($description); ?></p>
                                            <?php endif; ?>
                                            
                                            <div class="card-meta">
                                                <span class="update-status">✅ Live</span>
                                                <span class="update-time">Professional Site</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else : ?>
                            <div class="dashboard-section" style="text-align: center; padding: 60px 40px;">
                                <h3 style="color: #ffffff; margin-bottom: 20px;">🚀 Portfolio Coming Soon</h3>
                                <p style="color: #f0f0f0; font-size: 1.1em;">Amazing websites are being added to the portfolio. Check back soon to see our latest work!</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    
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

<style>
/* ==========================================================================
   BEAUTIFUL BACKGROUND GRADIENT - MATCHING GALLERY AESTHETIC
   ========================================================================== */

/* Add stunning background gradient to body for better visibility */
body.page-template-page-portfolio {
    background: linear-gradient(135deg, 
        #667eea 0%, 
        #764ba2 25%, 
        #f093fb 50%, 
        #f5576c 75%, 
        #4facfe 100%
    );
    background-size: 400% 400%;
    animation: gradientShift 15s ease infinite;
    min-height: 100vh;
    position: relative;
    margin: 0 !important;
    padding: 0 !important;
}

/* Animated gradient movement for dynamic effect */
@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* DASHBOARD LAYOUT - COPY FROM WORKING GALLERY */
.dashboard-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    color: white;
}

.dashboard-header {
    text-align: center;
    margin-bottom: 40px;
    padding: 40px 20px;
}

.dashboard-title h1 {
    color: #ffffff;
    font-size: 3em;
    margin: 0 0 15px 0;
    font-weight: 600;
    text-shadow: 0 3px 10px rgba(0, 0, 0, 0.7);
}

.dashboard-subtitle {
    color: #f0f0f0;
    font-size: 1.4em;
    margin: 0;
    font-weight: 400;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.6);
}

/* Dashboard Sections */
.dashboard-section {
    background: rgba(255, 255, 255, 0.12);
    border-radius: 20px;
    padding: 40px;
    margin-bottom: 30px;
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
}

.dashboard-section h2 {
    color: #ffffff;
    font-size: 1.8em;
    margin: 0 0 10px 0;
    font-weight: 500;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
}

.dashboard-section p {
    color: #e8e8e8;
    font-size: 1.1em;
    margin-bottom: 30px;
    text-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

/* Gallery Grid - DASHBOARD STYLE */
.dashboard-gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    margin-top: 30px;
}

/* Dashboard Cards - WORKING LAYOUT */
.dashboard-card {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    background: rgba(255, 255, 255, 0.2);
}

.card-preview {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.card-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
    cursor: pointer;
}

.dashboard-card:hover .card-image {
    transform: scale(1.05);
}

.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    gap: 10px;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.dashboard-card:hover .card-overlay {
    opacity: 1;
}

.card-action-btn {
    background: rgba(255, 255, 255, 0.9);
    border: none;
    padding: 8px 16px;
    border-radius: 20px;
    color: #333;
    font-size: 0.9em;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.card-action-btn:hover {
    background: white;
    transform: translateY(-2px);
    color: #333;
    text-decoration: none;
}

.card-info {
    padding: 20px;
}

.card-title {
    color: #ffffff;
    font-size: 1.3em;
    margin: 0 0 10px 0;
    font-weight: 600;
}

.card-description {
    color: #e0e0e0;
    font-size: 0.95em;
    line-height: 1.5;
    margin-bottom: 15px;
}

.card-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.85em;
}

.update-status {
    color: #4ade80;
    font-weight: 500;
}

.update-time {
    color: #d1d5db;
}

/* Enhanced Lightbox Styling */
.lightbox {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    backdrop-filter: blur(5px);
    justify-content: center;
    align-items: center;
}

.lightbox-content {
    position: relative;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 30px;
    max-width: 90%;
    max-height: 90%;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.lightbox-close {
    position: absolute;
    top: 15px;
    right: 20px;
    color: #333;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
    background: rgba(255, 255, 255, 0.8);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.lightbox-close:hover {
    background: rgba(255, 255, 255, 1);
    transform: scale(1.1);
}

#lightbox-image {
    width: 100%;
    max-width: 600px;
    height: auto;
    border-radius: 15px;
    margin-bottom: 20px;
}

.lightbox-info {
    text-align: center;
    color: #333;
}

.lightbox-info h3 {
    margin: 0 0 10px 0;
    font-size: 1.5em;
    font-weight: 600;
}

.lightbox-info p {
    margin: 0;
    font-size: 1.1em;
    line-height: 1.6;
    color: #666;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .dashboard-gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .dashboard-content {
        padding: 10px;
    }
    
    .dashboard-section {
        padding: 25px 20px;
    }
    
    .dashboard-gallery-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .dashboard-title h1 {
        font-size: 2.2em;
    }
    
    .lightbox-content {
        margin: 20px;
        padding: 20px;
    }
}
</style>

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