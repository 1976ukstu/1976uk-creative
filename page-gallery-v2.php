<?php
/**
 * Template Name: Gallery v2 - WordPress Media Library
 * 
 * Interactive Image Gallery - Showcase based on stable websites page structure
 * Features 96% viewport lightbox and WordPress media library integration
 */
get_header();
?>

<!-- Simple Gentle Gradient Background (Temporary) -->
<div class="gentle-gradient-background"></div>

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

<?php
// Include the enhanced universal menu
get_template_part('template-parts/enhanced-universal-menu');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        
        <!-- Gallery Content with Beautiful Dashboard Styling -->
        <div class="dashboard-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Beautiful Page Header -->
                    <div class="dashboard-header">
                        <div class="dashboard-title">
                            <h1>🎨 Creative Gallery</h1>
                            <p class="dashboard-subtitle">Professional portfolio showcase powered by WordPress media library</p>
                        </div>
                    </div>
                    
                    <!-- Gallery Grid -->
                    <div class="websites-grid">
                        
                        <?php
                        // Get images from WordPress media library
                        $gallery_images = get_posts(array(
                            'post_type' => 'attachment',
                            'post_mime_type' => 'image',
                            'post_status' => 'inherit',
                            'posts_per_page' => 6,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        ));
                        
                        // Define gallery items with fallback
                        $gallery_items = array();
                        
                        if (!empty($gallery_images)) {
                            // Use WordPress media library images
                            $counter = 1;
                            foreach ($gallery_images as $image) {
                                if ($counter > 6) break; // Limit to 6 images
                                
                                $image_url = wp_get_attachment_image_url($image->ID, 'large');
                                $image_full = wp_get_attachment_image_url($image->ID, 'full');
                                $image_title = get_the_title($image->ID) ?: "Gallery Image $counter";
                                $image_desc = wp_get_attachment_caption($image->ID) ?: "Creative work showcase";
                                
                                $gallery_items[] = array(
                                    'title' => $image_title,
                                    'description' => $image_desc,
                                    'image' => $image_url,
                                    'full_image' => $image_full,
                                    'id' => "gallery-$counter"
                                );
                                $counter++;
                            }
                        }
                        
                        // Fallback gallery items if no WordPress media found
                        if (empty($gallery_items)) {
                            $gallery_items = array(
                                array(
                                    'title' => 'Creative Design 1',
                                    'description' => 'Professional creative work showcase',
                                    'image' => get_template_directory_uri() . '/images/gallery/placeholder1.jpg',
                                    'full_image' => get_template_directory_uri() . '/images/gallery/placeholder1.jpg',
                                    'id' => 'gallery-1'
                                ),
                                array(
                                    'title' => 'Creative Design 2', 
                                    'description' => 'Innovative visual solutions',
                                    'image' => get_template_directory_uri() . '/images/gallery/placeholder2.jpg',
                                    'full_image' => get_template_directory_uri() . '/images/gallery/placeholder2.jpg',
                                    'id' => 'gallery-2'
                                ),
                                array(
                                    'title' => 'Creative Design 3',
                                    'description' => 'Modern design concepts',
                                    'image' => get_template_directory_uri() . '/images/gallery/placeholder3.jpg', 
                                    'full_image' => get_template_directory_uri() . '/images/gallery/placeholder3.jpg',
                                    'id' => 'gallery-3'
                                ),
                                array(
                                    'title' => 'Creative Design 4',
                                    'description' => 'Artistic visual storytelling',
                                    'image' => get_template_directory_uri() . '/images/gallery/placeholder4.jpg',
                                    'full_image' => get_template_directory_uri() . '/images/gallery/placeholder4.jpg',
                                    'id' => 'gallery-4'
                                ),
                                array(
                                    'title' => 'Creative Design 5',
                                    'description' => 'Contemporary creative solutions',
                                    'image' => get_template_directory_uri() . '/images/gallery/placeholder5.jpg',
                                    'full_image' => get_template_directory_uri() . '/images/gallery/placeholder5.jpg', 
                                    'id' => 'gallery-5'
                                ),
                                array(
                                    'title' => 'Creative Design 6',
                                    'description' => 'Portfolio masterpiece collection',
                                    'image' => get_template_directory_uri() . '/images/gallery/placeholder6.jpg',
                                    'full_image' => get_template_directory_uri() . '/images/gallery/placeholder6.jpg',
                                    'id' => 'gallery-6'
                                )
                            );
                        }
                        
                        // Display gallery items
                        foreach ($gallery_items as $item) :
                        ?>
                        
                        <div class="website-card" data-id="<?php echo esc_attr($item['id']); ?>">
                            <div class="card-preview" onclick="showImageLightbox('<?php echo esc_js($item['full_image']); ?>', '<?php echo esc_js($item['title']); ?>')" style="cursor: pointer;">
                                <img src="<?php echo esc_url($item['image']); ?>" 
                                     alt="<?php echo esc_attr($item['title']); ?>"
                                     loading="lazy">
                                
                                <!-- Simple Overlay -->
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h3><?php echo esc_html($item['title']); ?></h3>
                                        <p><?php echo esc_html($item['description']); ?></p>
                                        
                                        <div class="card-actions">
                                            <button class="action-btn" onclick="event.stopPropagation(); showImageLightbox('<?php echo esc_js($item['full_image']); ?>', '<?php echo esc_js($item['title']); ?>')">
                                                <span class="btn-icon">🔍</span>
                                                <span class="btn-text">View Full Size</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-info">
                                <h4><?php echo esc_html($item['title']); ?></h4>
                                <p><?php echo esc_html($item['description']); ?></p>
                            </div>
                        </div>
                        
                        <?php endforeach; ?>
                        
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
        </div>
        
    </main>
</div>

<!-- Enhanced Simple Lightbox -->
<div id="imageLightbox" class="simple-lightbox" onclick="closeImageLightbox()">
    <div class="lightbox-container" onclick="event.stopPropagation()">
        <img id="lightboxImg" src="" alt="">
        <div class="lightbox-title" id="lightboxTitle"></div>
        <!-- Controls removed to prevent mobile crashes -->
        <button class="lightbox-close" onclick="closeImageLightbox()">×</button>
    </div>
</div>

<?php get_footer(); ?>

<style>
/* Copy proven CSS from websites page with gallery-specific modifications */

/* Global Body Styling for Proper Background Rendering */
body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

/* ==========================================================================
   WEBSITES/GALLERY GRID SYSTEM - PROVEN AND STABLE
   ========================================================================== */

.dashboard-content {
    padding: 40px 20px;
    max-width: 1400px;
    margin: 0 auto;
}

.dashboard-header {
    text-align: center;
    margin-bottom: 50px;
    padding: 0 20px;
}

.dashboard-title h1 {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(2.5em, 5vw, 4em);
    font-weight: 700;
    color: #ffffff;
    margin: 0 0 15px 0;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.8);
}

.dashboard-subtitle {
    font-size: clamp(1.1em, 2.5vw, 1.4em);
    color: rgba(255, 255, 255, 0.9);
    font-weight: 400;
    margin: 0;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);
}

.websites-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    padding: 0 20px;
}

.website-card {
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.18);
    border-radius: 20px;
    padding: 20px;
    backdrop-filter: blur(20px);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
}

.website-card:hover {
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.3);
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.card-preview {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    margin-bottom: 20px;
    aspect-ratio: 16/10;
}

.card-preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(5px);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.website-card:hover .card-overlay {
    opacity: 1;
}

.overlay-content {
    text-align: center;
    color: white;
    padding: 20px;
}

.overlay-content h3 {
    font-size: 1.4em;
    margin: 0 0 10px 0;
    font-weight: 600;
}

.overlay-content p {
    font-size: 1em;
    margin: 0 0 20px 0;
    opacity: 0.9;
}

.card-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.action-btn {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 10px;
    padding: 10px 15px;
    color: white;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.9em;
    display: flex;
    align-items: center;
    gap: 8px;
}

.action-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-2px);
}

.card-info {
    text-align: center;
}

.card-info h4 {
    color: #ffffff;
    font-size: 1.3em;
    margin: 0 0 10px 0;
    font-weight: 600;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
}

.card-info p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1em;
    margin: 0;
    line-height: 1.5;
}

/* ==========================================================================
   SIMPLE IMAGE LIGHTBOX - GUARANTEED TO WORK
   ========================================================================== */

.simple-lightbox {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
}

.lightbox-container {
    position: relative;
    max-width: 95%;
    max-height: 95%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.lightbox-container img {
    max-width: 100%;
    max-height: 80vh;
    object-fit: contain;
    border-radius: 10px;
    transition: transform 0.3s ease;
    cursor: grab;
}

/* Removed complex styling to prevent mobile crashes */

.lightbox-title {
    position: absolute;
    bottom: -50px;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    font-size: 1.2em;
    text-align: center;
    font-weight: 600;
    background: rgba(0, 0, 0, 0.7);
    padding: 10px 20px;
    border-radius: 20px;
    backdrop-filter: blur(10px);
}

.lightbox-close {
    position: absolute;
    top: -40px;
    right: -40px;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    color: white;
    font-size: 24px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.lightbox-close:hover {
    background: rgba(255, 255, 255, 0.4);
    transform: scale(1.1);
}

/* ==========================================================================
   RESPONSIVE DESIGN
   ========================================================================== */

@media (max-width: 1200px) {
    .websites-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }
}

@media (max-width: 768px) {
    .lightbox-content {
        flex-direction: column;
        width: 95vw;
        height: 95vh;
    }
    
    .lightbox-info {
        width: 100%;
        height: auto;
        border-left: none;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .websites-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        padding: 0 10px;
    }
    
    .card-actions {
        flex-direction: column;
        gap: 10px;
    }
    
    .action-btn {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .dashboard-content {
        padding: 20px 10px;
    }
    
    .website-card {
        padding: 15px;
    }
    
    .card-preview {
        margin-bottom: 15px;
    }
}
</style>

<script>
// Ultra-Simple Lightbox - Mobile Safe
function showImageLightbox(imageUrl, title) {
    const lightbox = document.getElementById('imageLightbox');
    const img = document.getElementById('lightboxImg');
    const titleDiv = document.getElementById('lightboxTitle');
    
    if (lightbox && img) {
        img.src = imageUrl;
        titleDiv.textContent = title || '';
        lightbox.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function closeImageLightbox() {
    const lightbox = document.getElementById('imageLightbox');
    if (lightbox) {
        lightbox.style.display = 'none';
        document.body.style.overflow = '';
    }
}

// Only Escape key - no other controls to prevent conflicts
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && document.getElementById('imageLightbox').style.display === 'flex') {
        closeImageLightbox();
    }
});
</script>