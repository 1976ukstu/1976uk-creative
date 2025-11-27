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
                        </div>
                        <div class="dashboard-subtitle">
                            Professional portfolio showcase powered by WordPress media library
                        </div>
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
            <!-- Dashboard Section for Gallery -->
            <div class="dashboard-section">
                <h2>🎨 Creative Portfolio</h2>
                <p>Interactive showcase of creative work directly from WordPress media library</p>
                
                <!-- 2x2 Gallery Portfolio Grid -->
                <div class="gallery-2x2-grid">
                
                <?php
                // Get first 4 images from WordPress media library
                $gallery_images = get_posts(array(
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image',
                    'post_status' => 'inherit',
                    'posts_per_page' => 4,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                
                if (!empty($gallery_images)) {
                    $positions = ['Top Left', 'Top Right', 'Bottom Left', 'Bottom Right'];
                    $counter = 0;
                    
                    foreach ($gallery_images as $image) {
                        $image_url = wp_get_attachment_image_url($image->ID, 'large');
                        $image_full = wp_get_attachment_image_url($image->ID, 'full');
                        $image_title = get_the_title($image->ID) ?: "Creative Work " . ($counter + 1);
                        $image_desc = wp_get_attachment_caption($image->ID) ?: "Professional creative showcase";
                        $position = $positions[$counter];
                        ?>
                        
                        <!-- Gallery Card <?php echo $counter + 1; ?> - <?php echo $position; ?> -->
                        <div class="dashboard-card gallery-card-2x2">
                            <div class="card-preview">
                                <div class="gallery-image-thumb" 
                                     style="background-image: url('<?php echo esc_url($image_url); ?>');" 
                                     onclick="openImageModal('<?php echo esc_js($image_full); ?>', '<?php echo esc_js($image_title); ?>', '<?php echo esc_js($image_desc); ?>')">
                                </div>
                                <div class="card-overlay">
                                    <button class="card-action-btn" onclick="openImageModal('<?php echo esc_js($image_full); ?>', '<?php echo esc_js($image_title); ?>', '<?php echo esc_js($image_desc); ?>')">🔍 View Full Size</button>
                                </div>
                                <!-- WordPress Integration Tooltip -->
                                <div class="wp-integration-tooltip">
                                    <span>📸 Image upload direct from WordPress Media Library</span>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title"><?php echo esc_html($image_title); ?></h4>
                                <p class="card-description"><?php echo esc_html($image_desc); ?></p>
                                <div class="card-meta">
                                    <span class="update-status">✅ Live</span>
                                    <span class="update-time">WordPress Media</span>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                        $counter++;
                        if ($counter >= 4) break;
                    }
                } else {
                    // Fallback message if no images found
                    echo '<div class="no-images-message"><p>📸 No images found in WordPress Media Library. Please upload some images to showcase your creative work!</p></div>';
                }
                                
                                $image_url = wp_get_attachment_image_url($image->ID, 'large');
                ?>
                
                </div>
            
            </div>
            
        </div>
        
    </main>
</div>

<!-- Image Preview Modal - Based on Website Modal System -->
<div id="imagePreviewModal" class="image-preview-modal" onclick="closeImagePreview()">
    <div class="preview-modal-content" onclick="event.stopPropagation()">
        <div class="preview-modal-header">
            <div class="preview-info">
                <h3 id="previewTitle">Image Preview</h3>
                <span id="previewDescription" class="preview-description"></span>
            </div>
            <div class="preview-controls">
                <button class="control-btn nav-btn" onclick="navigateGallery(-1)" title="Previous Image">
                    <span>‹</span>
                </button>
                <button class="control-btn nav-btn" onclick="navigateGallery(1)" title="Next Image">
                    <span>›</span>
                </button>
                <button class="control-btn close-btn" onclick="closeImagePreview()" title="Close preview">
                    <span>×</span>
                </button>
            </div>
        </div>
        <div class="preview-image-container">
            <img id="previewImage" src="" alt="" />
            <div id="loadingIndicator" class="loading-indicator" style="display: none;">
                <div class="spinner"></div>
                <p>Loading image...</p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

<style>
/* Gallery v2 - Professional 2x2 Layout with Website Modal System */

/* Global Body Styling */
body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

/* Dashboard Content Layout */
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

.dashboard-section {
    text-align: center;
    margin-bottom: 30px;
}

.dashboard-section h2 {
    color: #ffffff;
    font-size: 2em;
    margin: 0 0 10px 0;
    font-weight: 600;
}

.dashboard-section p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.1em;
    margin: 0 0 30px 0;
}

/* 2x2 Gallery Grid - Same as Websites */
.gallery-2x2-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    gap: 30px;
    margin-top: 30px;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}

/* Gallery Cards */
.gallery-card-2x2 {
    aspect-ratio: 1.2/1;
    min-height: 400px;
}

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
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.4);
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
}

.card-preview {
    position: relative;
    height: 70%; /* Maintain percentage for responsive design */
    min-height: 250px; /* Ensure minimum height matches websites */
    overflow: hidden;
    border-radius: 15px 15px 0 0; /* Round top corners */
    box-shadow: 
        inset 0 0 0 1px rgba(255, 255, 255, 0.1),
        0 4px 15px rgba(0, 0, 0, 0.2),
        0 1px 3px rgba(0, 0, 0, 0.1);
    background: rgba(0, 0, 0, 0.02);
    backdrop-filter: blur(2px);
}

.gallery-image-thumb {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    filter: brightness(1) contrast(1.05) saturate(1.1);
}

.dashboard-card:hover .card-preview {
    box-shadow: 
        inset 0 0 0 1px rgba(255, 255, 255, 0.2),
        0 8px 25px rgba(0, 0, 0, 0.3),
        0 2px 6px rgba(0, 0, 0, 0.15);
}

.dashboard-card:hover .gallery-image-thumb {
    transform: scale(1.05);
    filter: brightness(1.1) contrast(1.1) saturate(1.2);
}

/* Card Overlay */
.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.dashboard-card:hover .card-overlay {
    opacity: 1;
}

.card-action-btn {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 10px;
    padding: 12px 20px;
    color: white;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.95em;
    font-weight: 500;
}

.card-action-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-2px);
}

/* WordPress Integration Tooltip */
.wp-integration-tooltip {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.85em;
    opacity: 0;
    transition: opacity 0.3s ease;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    white-space: nowrap;
}

.dashboard-card:hover .wp-integration-tooltip {
    opacity: 1;
}

/* Card Info Section */
.card-info {
    padding: 20px;
    height: 30%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}

.card-title {
    color: #ffffff;
    font-size: 1.3em;
    margin: 0 0 10px 0;
    font-weight: 600;
}

.card-description {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.95em;
    margin: 0 0 10px 0;
    line-height: 1.4;
}

.card-meta {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.update-status, .update-time {
    font-size: 0.8em;
    color: rgba(255, 255, 255, 0.7);
}

/* No Images Message */
.no-images-message {
    grid-column: 1 / -1;
    text-align: center;
    padding: 60px 20px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    border: 2px dashed rgba(255, 255, 255, 0.3);
}

.no-images-message p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.2em;
    margin: 0;
}

/* Image Preview Modal - 96% Viewport System */
.image-preview-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.95);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 10000;
    backdrop-filter: blur(10px);
}

.preview-modal-content {
    width: 96%;
    height: 96%;
    background: rgba(255, 255, 255, 0.98);
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4);
    animation: modalSlideIn 0.4s ease-out;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: scale(0.95) translateY(20px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

.preview-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 30px;
    background: rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.preview-info h3 {
    margin: 0 0 5px 0;
    font-size: 1.5em;
    color: #333;
    font-weight: 600;
}

.preview-description {
    color: #666;
    font-size: 1em;
    margin: 0;
}

.preview-controls {
    display: flex;
    gap: 10px;
}

.control-btn {
    background: rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    width: 40px;
    height: 40px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}

.control-btn:hover {
    background: rgba(0, 0, 0, 0.2);
    transform: scale(1.1);
}

.nav-btn {
    font-size: 1.5em;
    font-weight: 300;
}

.nav-btn:hover {
    background: rgba(0, 123, 255, 0.1);
    border-color: rgba(0, 123, 255, 0.3);
    color: #007bff;
}

.preview-image-container {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px 20px 40px 20px; /* More bottom padding to prevent image cutoff */
    background: #f8f9fa;
}

.preview-image-container img {
    max-width: 85%; /* Slightly smaller to ensure better spacing */
    max-height: 85%; /* Slightly smaller to ensure proper bottom spacing */
    object-fit: contain;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

/* Responsive Design */
@media (min-width: 1250px) {
    .gallery-2x2-grid {
        gap: 40px;
        max-width: 1400px;
    }
    
    .gallery-card-2x2 {
        min-height: 450px;
    }
}

@media (max-width: 1024px) {
    .gallery-2x2-grid {
        gap: 20px;
    }
    
    .gallery-card-2x2 {
        min-height: 350px;
    }
}

@media (max-width: 768px) {
    .dashboard-content {
        padding: 20px 10px;
    }
    
    .gallery-2x2-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
        gap: 20px;
    }
    
    .gallery-card-2x2 {
        min-height: 300px;
    }
    
    .preview-modal-content {
        width: 95vw;
        height: 95vh;
    }
    
    .preview-modal-header {
        padding: 15px 20px;
    }
    
    .wp-integration-tooltip {
        font-size: 0.75em;
        padding: 6px 12px;
    }
}

@media (max-width: 480px) {
    .dashboard-section h2 {
        font-size: 1.5em;
    }
    
    .card-info {
        padding: 15px;
    }
    
    .card-title {
        font-size: 1.1em;
    }
    
    .card-description {
        font-size: 0.9em;
    }
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
// Image Preview Modal Functions - Based on Website Modal System
function openImageModal(imageUrl, title, description) {
    const modal = document.getElementById('imagePreviewModal');
    const image = document.getElementById('previewImage');
    const titleElement = document.getElementById('previewTitle');
    const descriptionElement = document.getElementById('previewDescription');
    const loadingIndicator = document.getElementById('loadingIndicator');
    
    if (modal && image && titleElement && descriptionElement) {
        // Set content
        titleElement.textContent = title || 'Gallery Image';
        descriptionElement.textContent = description || '';
        
        // Show loading indicator
        loadingIndicator.style.display = 'flex';
        image.style.display = 'none';
        
        // Load image
        image.onload = function() {
            loadingIndicator.style.display = 'none';
            image.style.display = 'block';
        };
        
        image.src = imageUrl;
        
        // Set current image index for navigation
        setCurrentImageIndex(imageUrl);
        
        // Show modal
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function closeImagePreview() {
    const modal = document.getElementById('imagePreviewModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
}

// Gallery navigation functionality
let currentImageIndex = 0;
let galleryImages = [];

// Initialize gallery images array on page load
document.addEventListener('DOMContentLoaded', function() {
    const imageElements = document.querySelectorAll('.gallery-image-thumb');
    galleryImages = Array.from(imageElements).map(thumb => {
        const card = thumb.closest('.dashboard-card');
        const title = card.querySelector('.card-title')?.textContent || 'Gallery Image';
        const description = card.querySelector('.card-description')?.textContent || '';
        
        // Extract the image URL from the background-image style
        const style = thumb.getAttribute('style') || '';
        const urlMatch = style.match(/background-image:\s*url\(['"]?([^'"]*?)['"]?\)/);
        const backgroundUrl = urlMatch ? urlMatch[1] : '';
        
        // Get the full size image URL from the onclick attribute
        const onclickAttr = thumb.getAttribute('onclick') || '';
        const fullUrlMatch = onclickAttr.match(/openImageModal\(['"]([^'"]*?)['"]?/);
        const fullUrl = fullUrlMatch ? fullUrlMatch[1] : backgroundUrl;
        
        return {
            url: fullUrl,
            title: title,
            description: description
        };
    });
});

// Navigate gallery function
function navigateGallery(direction) {
    console.log('Navigate called with direction:', direction);
    console.log('Gallery images count:', galleryImages.length);
    console.log('Current index:', currentImageIndex);
    
    if (galleryImages.length === 0) {
        console.log('No images found in gallery array');
        return;
    }
    
    currentImageIndex += direction;
    
    // Wrap around
    if (currentImageIndex >= galleryImages.length) {
        currentImageIndex = 0;
    } else if (currentImageIndex < 0) {
        currentImageIndex = galleryImages.length - 1;
    }
    
    console.log('New index:', currentImageIndex);
    
    const currentImage = galleryImages[currentImageIndex];
    if (currentImage) {
        console.log('Loading image:', currentImage.title);
        openImageModal(currentImage.url, currentImage.title, currentImage.description);
    }
}

// Update openImageModal to track current index
function setCurrentImageIndex(imageUrl) {
    const foundIndex = galleryImages.findIndex(img => img.url === imageUrl);
    currentImageIndex = foundIndex !== -1 ? foundIndex : 0;
    console.log('Set current index to:', currentImageIndex, 'for URL:', imageUrl);
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('imagePreviewModal');
    const isModalOpen = modal && modal.style.display === 'flex';
    
    if (!isModalOpen) return;
    
    if (e.key === 'Escape') {
        closeImagePreview();
    } else if (e.key === 'ArrowLeft') {
        navigateGallery(-1);
    } else if (e.key === 'ArrowRight') {
        navigateGallery(1);
    }
});
</script>