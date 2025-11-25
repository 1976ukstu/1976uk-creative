<?php
/**
 * Template Name: Gallery
 * 
 * Interactive Gallery Showcase - Demonstrating Dashboard Management System
 * Features 6-card grid layout with modern styling
 */
get_header();
?>

<!-- Future Tech Ice Stone Background - TEMPORARILY COMMENTED OUT FOR PERFORMANCE -->
<!-- <div class="future-tech-background">
    <div class="tech-stripes">
        <div class="tech-stripe stripe-1"></div>
        <div class="tech-stripe stripe-2"></div>
        <div class="tech-stripe stripe-3"></div>
        <div class="tech-stripe stripe-4"></div>
        <div class="tech-stripe stripe-5"></div>
        <div class="tech-stripe stripe-6"></div>
    </div>
</div> -->

<!-- Simple Gentle Gradient Background (Temporary) -->
<div class="gentle-gradient-background"></div>

<div class="site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: inherit; text-decoration: none;">
        <span class="main-title">1976uk</span>
        <span class="sub-title">Creative</span>
    </a>
</div>

<!-- Floating Action Buttons - Removed dashboard button for system stability -->
<!-- Clean gallery page - dashboard functionality moved to future subdomain solution -->

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
        
        <!-- Gallery Page Content -->
        <div class="dashboard-content">
            
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <div class="dashboard-title">
                    <h1>🎨 Creative Gallery</h1>
                    <p class="dashboard-subtitle">Showcase powered by our revolutionary dashboard system</p>
                </div>
            </div>
            
            <!-- Gallery Management Section -->
            <div class="dashboard-section">
                <div class="gallery-section-header">
                    <div class="gallery-header-content">
                        <h2>📱 Live Gallery Showcase</h2>
                        <p>All 6 cards are now fully managed through the dashboard system with real-time drag & drop uploads and cross-device compatibility!</p>
                    </div>
                    <!-- Upload Images button moved to Dashboard page -->
                    <div class="gallery-header-actions">
                        <!-- Upload functionality now available on Dashboard page -->
                    </div>
                </div>
                
                <div class="dashboard-gallery-grid">
                    
                    <!-- Gallery Card 1 - Dashboard Managed -->
                    <div class="dashboard-card" data-card-id="1">
                        <div class="card-preview">
                            <?php 
                            // Get dashboard-managed image for Card 1
                            $card1_image = get_option('gallery_card_1_image');
                            $card1_title = get_option('gallery_card_1_title', 'Creative Project 1');
                            $card1_description = get_option('gallery_card_1_description', 'Dashboard-managed showcase piece demonstrating the power of our management system...');
                            $card1_updated = get_option('gallery_card_1_updated');
                            
                            $image_src = $card1_image ? $card1_image : get_template_directory_uri() . '/images/gallery/gallery-01.png';
                            ?>
                            <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 1" class="card-image lightbox-trigger" 
                                 data-lightbox-src="<?php echo esc_url($image_src); ?>" 
                                 data-lightbox-title="<?php echo esc_attr($card1_title); ?>"
                                 data-lightbox-description="<?php echo esc_attr($card1_description); ?>"
                                 onclick="openLightbox(this)">
                            <!-- Buttons commented out for gallery display only
                            <div class="card-overlay">
                                <button class="card-action-btn edit-btn" onclick="editCard(1)">✏️ Edit</button>
                                <button class="card-action-btn preview-btn" onclick="previewCard(1)">👁️ Preview</button>
                            </div>
                            -->
                        </div>
                        <div class="card-info">
                            <h4 class="card-title"><?php echo esc_html($card1_title); ?></h4>
                            <p class="card-description"><?php echo esc_html($card1_description); ?></p>
                            <div class="card-meta">
                                <span class="update-status">🎯 Dashboard Managed</span>
                                <span class="update-time"><?php 
                                    if ($card1_updated) {
                                        $time_diff = human_time_diff(strtotime($card1_updated), current_time('timestamp'));
                                        echo 'Updated ' . $time_diff . ' ago';
                                    } else {
                                        echo 'Ready for dashboard updates';
                                    }
                                ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Gallery Card 2 - Dashboard Managed -->
                    <div class="dashboard-card" data-card-id="2">
                        <div class="card-preview">
                            <?php 
                            // Get dashboard-managed image for Card 2
                            $card2_image = get_option('gallery_card_2_image');
                            $card2_title = get_option('gallery_card_2_title', 'Creative Project 2');
                            $card2_description = get_option('gallery_card_2_description', 'Another example of dashboard-managed content with instant editing capabilities...');
                            $card2_updated = get_option('gallery_card_2_updated');
                            
                            $image_src = $card2_image ? $card2_image : get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-02.png';
                            ?>
                            <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 2" class="card-image lightbox-trigger" 
                                 data-lightbox-src="<?php echo esc_url($image_src); ?>" 
                                 data-lightbox-title="<?php echo esc_attr($card2_title); ?>"
                                 data-lightbox-description="<?php echo esc_attr($card2_description); ?>"
                                 onclick="openLightbox(this)">
                            <!-- Buttons commented out for gallery display only
                            <div class="card-overlay">
                                <button class="card-action-btn edit-btn" onclick="editCard(2)">✏️ Edit</button>
                                <button class="card-action-btn preview-btn" onclick="previewCard(2)">👁️ Preview</button>
                            </div>
                            -->
                        </div>
                        <div class="card-info">
                            <h4 class="card-title"><?php echo esc_html($card2_title); ?></h4>
                            <p class="card-description"><?php echo esc_html($card2_description); ?></p>
                            <div class="card-meta">
                                <span class="update-status">🎯 Dashboard Managed</span>
                                <span class="update-time"><?php 
                                    if ($card2_updated) {
                                        $time_diff = human_time_diff(strtotime($card2_updated), current_time('timestamp'));
                                        echo 'Updated ' . $time_diff . ' ago';
                                    } else {
                                        echo 'Ready for dashboard updates';
                                    }
                                ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Gallery Card 3 - Dashboard Managed -->
                    <div class="dashboard-card" data-card-id="3">
                        <div class="card-preview">
                            <?php 
                            // Get dashboard-managed image for Card 3
                            $card3_image = get_option('gallery_card_3_image');
                            $card3_title = get_option('gallery_card_3_title', 'Creative Project 3');
                            $card3_description = get_option('gallery_card_3_description', 'Professional gallery item managed through dashboard...');
                            $card3_updated = get_option('gallery_card_3_updated');
                            
                            $image_src = $card3_image ? $card3_image : get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-03.png';
                            ?>
                            <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 3" class="card-image lightbox-trigger" 
                                 data-lightbox-src="<?php echo esc_url($image_src); ?>" 
                                 data-lightbox-title="<?php echo esc_attr($card3_title); ?>"
                                 data-lightbox-description="<?php echo esc_attr($card3_description); ?>"
                                 onclick="openLightbox(this)">
                            <!-- Buttons commented out for gallery display only
                            <div class="card-overlay">
                                <button class="card-action-btn edit-btn" onclick="editCard(3)">✏️ Edit</button>
                                <button class="card-action-btn preview-btn" onclick="previewCard(3)">👁️ Preview</button>
                            </div>
                            -->
                        </div>
                        <div class="card-info">
                            <h4 class="card-title"><?php echo esc_html($card3_title); ?></h4>
                            <p class="card-description"><?php echo esc_html($card3_description); ?></p>
                            <div class="card-meta">
                                <span class="update-status">🎯 Dashboard Managed</span>
                                <span class="update-time"><?php 
                                    if ($card3_updated) {
                                        $time_diff = human_time_diff(strtotime($card3_updated), current_time('timestamp'));
                                        echo 'Updated ' . $time_diff . ' ago';
                                    } else {
                                        echo 'Ready for dashboard updates';
                                    }
                                ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Gallery Card 4 - Dashboard Managed -->
                    <div class="dashboard-card" data-card-id="4">
                        <div class="card-preview">
                            <?php 
                            // Get dashboard-managed image for Card 4
                            $card4_image = get_option('gallery_card_4_image');
                            $card4_title = get_option('gallery_card_4_title', 'Creative Project 4');
                            $card4_description = get_option('gallery_card_4_description', 'The dashboard system makes gallery management incredibly simple and beautiful...');
                            $card4_updated = get_option('gallery_card_4_updated');
                            
                            $image_src = $card4_image ? $card4_image : get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-04.png';
                            ?>
                            <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 4" class="card-image lightbox-trigger" 
                                 data-lightbox-src="<?php echo esc_url($image_src); ?>" 
                                 data-lightbox-title="<?php echo esc_attr($card4_title); ?>"
                                 data-lightbox-description="<?php echo esc_attr($card4_description); ?>"
                                 onclick="openLightbox(this)">
                            <!-- Buttons commented out for gallery display only
                            <div class="card-overlay">
                                <button class="card-action-btn edit-btn" onclick="editCard(4)">✏️ Edit</button>
                                <button class="card-action-btn preview-btn" onclick="previewCard(4)">👁️ Preview</button>
                            </div>
                            -->
                        </div>
                        <div class="card-info">
                            <h4 class="card-title"><?php echo esc_html($card4_title); ?></h4>
                            <p class="card-description"><?php echo esc_html($card4_description); ?></p>
                            <div class="card-meta">
                                <span class="update-status">🎯 Dashboard Managed</span>
                                <span class="update-time"><?php 
                                    if ($card4_updated) {
                                        $time_diff = human_time_diff(strtotime($card4_updated), current_time('timestamp'));
                                        echo 'Updated ' . $time_diff . ' ago';
                                    } else {
                                        echo 'Ready for dashboard updates';
                                    }
                                ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Gallery Card 5 - Dashboard Managed -->
                    <div class="dashboard-card" data-card-id="5">
                        <div class="card-preview">
                            <?php 
                            // Get dashboard-managed image for Card 5
                            $card5_image = get_option('gallery_card_5_image');
                            $card5_title = get_option('gallery_card_5_title', 'Creative Project 5');
                            $card5_description = get_option('gallery_card_5_description', 'Photographer-friendly interface with professional workflow integration...');
                            $card5_updated = get_option('gallery_card_5_updated');
                            
                            $image_src = $card5_image ? $card5_image : get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-05.png';
                            ?>
                            <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 5" class="card-image lightbox-trigger" 
                                 data-lightbox-src="<?php echo esc_url($image_src); ?>" 
                                 data-lightbox-title="<?php echo esc_attr($card5_title); ?>"
                                 data-lightbox-description="<?php echo esc_attr($card5_description); ?>"
                                 onclick="openLightbox(this)">
                            <!-- Buttons commented out for gallery display only
                            <div class="card-overlay">
                                <button class="card-action-btn edit-btn" onclick="editCard(5)">✏️ Edit</button>
                                <button class="card-action-btn preview-btn" onclick="previewCard(5)">👁️ Preview</button>
                            </div>
                            -->
                        </div>
                        <div class="card-info">
                            <h4 class="card-title"><?php echo esc_html($card5_title); ?></h4>
                            <p class="card-description"><?php echo esc_html($card5_description); ?></p>
                            <div class="card-meta">
                                <span class="update-status">🎯 Dashboard Managed</span>
                                <span class="update-time"><?php 
                                    if ($card5_updated) {
                                        $time_diff = human_time_diff(strtotime($card5_updated), current_time('timestamp'));
                                        echo 'Updated ' . $time_diff . ' ago';
                                    } else {
                                        echo 'Ready for dashboard updates';
                                    }
                                ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Gallery Card 6 - Dashboard Managed -->
                    <div class="dashboard-card" data-card-id="6">
                        <div class="card-preview">
                            <?php 
                            // Get dashboard-managed image for Card 6
                            $card6_image = get_option('gallery_card_6_image');
                            $card6_title = get_option('gallery_card_6_title', 'Creative Project 6');
                            $card6_description = get_option('gallery_card_6_description', 'Complete system demonstration showcasing full dashboard capabilities...');
                            $card6_updated = get_option('gallery_card_6_updated');
                            
                            $image_src = $card6_image ? $card6_image : get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-06.png';
                            ?>
                            <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 6" class="card-image lightbox-trigger" 
                                 data-lightbox-src="<?php echo esc_url($image_src); ?>" 
                                 data-lightbox-title="<?php echo esc_attr($card6_title); ?>"
                                 data-lightbox-description="<?php echo esc_attr($card6_description); ?>"
                                 onclick="openLightbox(this)">
                            <!-- Buttons commented out for gallery display only
                            <div class="card-overlay">
                                <button class="card-action-btn edit-btn" onclick="editCard(6)">✏️ Edit</button>
                                <button class="card-action-btn preview-btn" onclick="previewCard(6)">👁️ Preview</button>
                            </div>
                            -->
                        </div>
                        <div class="card-info">
                            <h4 class="card-title"><?php echo esc_html($card6_title); ?></h4>
                            <p class="card-description"><?php echo esc_html($card6_description); ?></p>
                            <div class="card-meta">
                                <span class="update-status">🎯 Dashboard Managed</span>
                                <span class="update-time"><?php 
                                    if ($card6_updated) {
                                        $time_diff = human_time_diff(strtotime($card6_updated), current_time('timestamp'));
                                        echo 'Updated ' . $time_diff . ' ago';
                                    } else {
                                        echo 'Ready for dashboard updates';
                                    }
                                ?></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <!-- 96% Viewport Lightbox Modal - Matching Dashboard Design Philosophy -->
            <div id="galleryLightbox" class="gallery-lightbox-modal" style="display: none;">
                <div class="lightbox-backdrop" onclick="closeLightbox()"></div>
                
                <div class="lightbox-content">
                    <!-- Lightbox Header -->
                    <div class="lightbox-header">
                        <div class="lightbox-title-section">
                            <h3 id="lightboxTitle">Gallery Image</h3>
                            <p id="lightboxDescription">Image description</p>
                        </div>
                        <div class="lightbox-controls">
                            <button class="lightbox-btn prev-btn" onclick="navigateLightbox(-1)" title="Previous Image">
                                <span>‹</span>
                            </button>
                            <button class="lightbox-btn next-btn" onclick="navigateLightbox(1)" title="Next Image">
                                <span>›</span>
                            </button>
                            <button class="lightbox-btn close-btn" onclick="closeLightbox()" title="Close Lightbox">
                                <span>×</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Lightbox Image Container -->
                    <div class="lightbox-image-container">
                        <img id="lightboxImage" src="" alt="" class="lightbox-image">
                        <div class="lightbox-loading" id="lightboxLoading">
                            <div class="loading-spinner"></div>
                        </div>
                    </div>
                    
                    <!-- Lightbox Footer -->
                    <div class="lightbox-footer">
                        <div class="lightbox-counter">
                            <span id="lightboxCounter">1 / 6</span>
                        </div>
                        <div class="lightbox-actions">
                            <button class="lightbox-action-btn" onclick="toggleFullscreen()" title="Toggle Fullscreen">
                                📺 Fullscreen
                            </button>
                            <button class="lightbox-action-btn" onclick="downloadImage()" title="Download Image">
                                💾 Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Upload Section - Drag & Drop Functionality -->
            <div id="galleryUploadSection" class="gallery-upload-section" style="display: none;">
                <div class="upload-header">
                    <h2>📤 Upload New Gallery Images</h2>
                    <p>Drag and drop images or click to select files</p>
                    <button class="upload-toggle-btn" onclick="toggleUploadSection(false)">← Back to Gallery</button>
                </div>
                
                <div class="upload-container">
                    <!-- Drag & Drop Zone -->
                    <div id="dropZone" class="drop-zone">
                        <div class="drop-zone-content">
                            <div class="drop-icon">📁</div>
                            <h3>Drop images here or click to browse</h3>
                            <p>Supports JPG, PNG, WebP • Max 5MB per file</p>
                            <input type="file" id="fileInput" multiple accept="image/*" style="display: none;">
                            <button class="browse-btn" onclick="document.getElementById('fileInput').click()">
                                Choose Files
                            </button>
                        </div>
                        <div class="drop-zone-active" style="display: none;">
                            <div class="drop-active-content">
                                <div class="drop-icon-active">⬇️</div>
                                <h3>Drop your images now!</h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Upload Progress -->
                    <div id="uploadProgress" class="upload-progress" style="display: none;">
                        <div class="progress-header">
                            <h4>Uploading Images...</h4>
                            <span id="progressText">0 / 0</span>
                        </div>
                        <div class="progress-bar">
                            <div id="progressFill" class="progress-fill"></div>
                        </div>
                    </div>
                    
                    <!-- Preview Grid -->
                    <div id="previewGrid" class="preview-grid"></div>
                    
                    <!-- Upload Actions -->
                    <div id="uploadActions" class="upload-actions" style="display: none;">
                        <button class="action-btn save-btn" onclick="saveUploadedImages()">
                            💾 Save to Gallery
                        </button>
                        <button class="action-btn cancel-btn" onclick="clearUploads()">
                            🗑️ Clear All
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Dashboard Demo Section -->
            <div class="dashboard-demo-section">
                <div class="demo-card">
                    <div class="demo-header">
                        <h2>🚀 Experience the Dashboard</h2>
                        <p>See how easy gallery management can be with our revolutionary dashboard system</p>
                    </div>
                    <div class="demo-features">
                        <div class="feature-item">
                            <span class="feature-icon">📤</span>
                            <h4>Drag & Drop Upload</h4>
                            <p>Simply drag images from your computer directly into the dashboard</p>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">✏️</span>
                            <h4>Instant Editing</h4>
                            <p>Change titles, descriptions, and images with immediate live preview</p>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">🔒</span>
                            <h4>Secure Access</h4>
                            <p>Password-protected dashboard keeps your content safe and private</p>
                        </div>
                    </div>
                    <!-- Removed Dashboard Simple button as requested -->
                </div>
            </div>
            
        </div>
        
    </main>
</div>

<style>
/* Global Body Styling for Proper Background Rendering */
body {
    margin: 0;
    padding: 0;
    min-height: 100vh;
    font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
    overflow-x: hidden;
}

/* ==========================================================================
   FUTURE TECH ICE STONE BACKGROUND - SOPHISTICATED AESTHETIC
   Low-key future tech ice cold stone look with animated lines
   ========================================================================== */

/* Future Tech Ice Stone Background */
.future-tech-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background: linear-gradient(135deg, 
        #f8f9fa 0%,     /* Clean ice white */
        #e9ecef 25%,    /* Subtle grey */
        #dee2e6 50%,    /* Stone grey */
        #ced4da 75%,    /* Darker stone */
        #adb5bd 100%    /* Steel finish */
    );
    overflow: hidden;
}

.tech-stripes {
    position: absolute;
    top: 0;
    left: 0;
    width: 200%;
    height: 200%;
    opacity: 0.6; /* More pronounced as requested */
}

.tech-stripe {
    position: absolute;
    background: linear-gradient(45deg, 
        transparent 0%, 
        rgba(33, 150, 243, 0.4) 15%,    /* Strong blue */
        rgba(76, 175, 80, 0.5) 25%,     /* Vibrant green */
        rgba(244, 67, 54, 0.4) 35%,     /* Bold red */
        rgba(255, 255, 255, 0.8) 50%,   /* Bright center */
        rgba(244, 67, 54, 0.4) 65%,     /* Bold red */
        rgba(76, 175, 80, 0.5) 75%,     /* Vibrant green */
        rgba(33, 150, 243, 0.4) 85%,    /* Strong blue */
        transparent 100%
    );
    height: 2px; /* Thicker for more pronounced effect */
    width: 100%;
    animation: techStripeMove 25s linear infinite;
    box-shadow: 
        0 0 4px rgba(33, 150, 243, 0.3),
        0 0 8px rgba(76, 175, 80, 0.2),
        0 0 6px rgba(244, 67, 54, 0.2);
}

.tech-stripe.stripe-1 { top: 8%; animation-delay: 0s; }
.tech-stripe.stripe-2 { top: 22%; animation-delay: -5s; }
.tech-stripe.stripe-3 { top: 36%; animation-delay: -10s; }
.tech-stripe.stripe-4 { top: 52%; animation-delay: -15s; }
.tech-stripe.stripe-5 { top: 68%; animation-delay: -20s; }
.tech-stripe.stripe-6 { top: 84%; animation-delay: -3s; }

@keyframes techStripeMove {
    0% { transform: translateX(-100%) rotate(45deg) scaleY(1); opacity: 0; }
    10% { opacity: 0.3; }
    50% { opacity: 0.6; transform: translateX(0%) rotate(45deg) scaleY(1.2); }
    90% { opacity: 0.3; }
    100% { transform: translateX(100%) rotate(45deg) scaleY(1); opacity: 0; }
}

/* Enhanced body styling for tech aesthetic */
body.page-template-page-gallery {
    margin: 0 !important;
    padding: 0 !important;
    min-height: 100vh;
    position: relative;
}

/* DASHBOARD LAYOUT - COPY FROM WORKING DASHBOARD */
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
}

.card-action-btn:hover {
    background: white;
    transform: translateY(-2px);
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
    margin-top: 10px;
    padding-top: 10px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
    width: 100%;
    /* Defensive positioning */
    float: none !important;
    clear: both;
}

.update-status {
    color: #4ade80;
    font-weight: 500;
    /* Ensure proper positioning */
    position: relative;
    display: inline-block;
    float: none !important;
}

.update-time {
    color: #d1d5db;
    /* Ensure proper positioning */
    position: relative;
    display: inline-block;
    float: none !important;
}

/* Fix any potential card info positioning */
.card-info {
    position: relative;
    padding: 20px;
    /* Ensure it's not floating */
    float: none !important;
    clear: both;
    width: 100%;
}

/* Responsive Design */

/* Large Desktop Enhancement - Bigger cards, maintain 40px screen margins */
@media (min-width: 1250px) {
    .dashboard-gallery-grid {
        grid-template-columns: repeat(3, 1fr); /* Keep exactly 3 cards */
        gap: 40px; /* Larger gaps between the bigger cards */
    }
}

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
}

/* ==========================================================================
   DEMO SECTION STYLING - BOTTOM AREA CLEANUP
   ========================================================================== */

/* Dashboard Demo Section - MATCH GALLERY CARDS CONTAINER WIDTH */
.dashboard-demo-section {
    margin: 60px auto 80px auto;
    max-width: 1200px; /* Match gallery cards container width */
    width: 90%; /* Match gallery cards responsiveness */
    padding: 0 20px 40px 20px;
}

.demo-card {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.15) 0%, 
        rgba(255, 255, 255, 0.08) 100%
    );
    border-radius: 25px;
    padding: 50px 40px 50px 40px; /* Increased bottom padding */
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
    text-align: center;
    margin-bottom: 60px; /* Increased margin */
    /* Better blending with background */
    position: relative;
    overflow: hidden;
}

/* Add a subtle overlay to help blend with background */
.demo-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, 
        rgba(33, 150, 243, 0.05) 0%,
        rgba(69, 183, 209, 0.05) 50%,
        rgba(150, 206, 180, 0.05) 100%
    );
    pointer-events: none;
    border-radius: 25px;
}

/* Ensure content area has proper spacing */
#primary.content-area {
    padding-bottom: 60px;
}

/* Footer spacing fix */
.site-main {
    margin-bottom: 40px;
}

.demo-header h2 {
    color: #ffffff;
    font-size: 2.4em;
    margin: 0 0 15px 0;
    font-weight: 600;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.6);
}

.demo-header p {
    color: #f8f8f8;
    font-size: 1.3em;
    margin-bottom: 40px;
    font-weight: 500;
    text-shadow: 0 1px 4px rgba(0, 0, 0, 0.5);
}

.demo-features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.feature-item {
    text-align: center;
    /* Enhanced glassmorphism like contact form squares */
    background: rgba(255, 255, 255, 0.15);
    padding: 30px 25px;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(15px);
    box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 
        0 15px 40px rgba(0, 0, 0, 0.15),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
}

.feature-icon {
    font-size: 3em;
    display: block;
    margin-bottom: 15px;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
}

.feature-item h4 {
    color: #ffffff;
    font-size: 1.3em;
    margin: 0 0 12px 0;
    font-weight: 700;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
}

.feature-item p {
    color: #f5f5f5;
    line-height: 1.6;
    margin: 0;
    font-size: 1.05em;
    font-weight: 500;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
}

.demo-action {
    margin-top: 30px;
}

.dashboard-access-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 18px 35px;
    border-radius: 25px;
    text-decoration: none;
    font-size: 1.1em;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.dashboard-access-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
    color: white;
    text-decoration: none;
}

.btn-icon {
    font-size: 1.2em;
}

/* Additional responsive styles for demo section */
/* Responsive breakpoints to match gallery cards */
@media (max-width: 1024px) {
    .dashboard-demo-section {
        width: 95%;
    }
    
    .demo-features {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 25px;
    }
}

@media (max-width: 768px) {
    .dashboard-demo-section {
        margin: 40px auto 60px auto;
        width: 95%;
        padding: 0 15px 30px 15px;
    }
    
    .demo-card {
        padding: 30px 20px;
        border-radius: 15px;
    }
    
    .demo-features {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .feature-item {
        padding: 25px 20px;
        border-radius: 15px;
    }
    
    .demo-header h2 {
        font-size: 2em;
    }
    
    .demo-header p {
        font-size: 1.1em;
    }
}

@media (max-width: 480px) {
    .dashboard-demo-section {
        width: 98%;
        padding: 0 10px 20px 10px;
    }
    
    .demo-card {
        padding: 25px 15px;
    }
    
    .feature-item {
        padding: 20px 15px;
    }
}
</style>

<script>
// Gallery interaction functions
function viewGalleryItem(itemId) {
    // Create a simple modal to show gallery item details
    const modal = document.createElement('div');
    modal.className = 'gallery-modal';
    modal.innerHTML = `
        <div class="gallery-modal-overlay" onclick="closeGalleryModal()">
            <div class="gallery-modal-content" onclick="event.stopPropagation()">
                <div class="gallery-modal-header">
                    <h3>Creative Project ${itemId}</h3>
                    <button onclick="closeGalleryModal()" class="gallery-modal-close">×</button>
                </div>
                <div class="gallery-modal-body">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-0${itemId}.png" alt="Creative Project ${itemId}" style="width: 100%; border-radius: 10px; margin-bottom: 20px;">
                    <p>This is a demonstration of how gallery items can be viewed in detail. In the full dashboard system, all content here would be manageable through the beautiful admin interface.</p>
                    <p><strong>Dashboard Features:</strong></p>
                    <ul>
                        <li>Drag & drop image replacement</li>
                        <li>Instant text editing</li>
                        <li>Live preview updates</li>
                        <li>One-click publishing</li>
                    </ul>
                </div>
                <div class="gallery-modal-footer">
                    <a href="<?php echo esc_url( home_url( '/dashboard-v2' ) ); ?>" class="gallery-btn edit-btn">⚙️ Try Dashboard v2.0</a>
                    <button onclick="closeGalleryModal()" class="gallery-btn view-btn">Close</button>
                </div>
            </div>
        </div>
    `;
    
    // Add modal styles
    const modalStyles = `
        <style>
        .gallery-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
        }
        .gallery-modal-overlay {
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .gallery-modal-content {
            background: white;
            border-radius: 20px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
        }
        .gallery-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 30px;
            border-bottom: 1px solid #eee;
        }
        .gallery-modal-header h3 {
            margin: 0;
            color: #333;
        }
        .gallery-modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
        }
        .gallery-modal-body {
            padding: 30px;
            color: #333;
        }
        .gallery-modal-footer {
            padding: 20px 30px;
            border-top: 1px solid #eee;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        </style>
    `;
    
    document.head.insertAdjacentHTML('beforeend', modalStyles);
    document.body.appendChild(modal);
    document.body.style.overflow = 'hidden';
}

function closeGalleryModal() {
    const modal = document.querySelector('.gallery-modal');
    if (modal) {
        modal.remove();
        document.body.style.overflow = '';
    }
}
</script>

<style>
/* Hide footer on gallery page to prevent gradient break */
body.page-template-page-gallery footer,
body.page-template-page-gallery .site-footer {
    display: none !important;
}

/* Ensure page content extends to full height */
body.page-template-page-gallery {
    margin: 0;
    padding: 0;
}

/* Floating Action Buttons - Bottom Right Corner */
.floating-action-buttons {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    gap: 15px;
    align-items: flex-end;
}

.floating-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 20px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95em;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.12),
        0 2px 6px rgba(0, 0, 0, 0.08);
    position: relative;
    overflow: hidden;
    min-width: 130px;
    justify-content: center;
    /* Accessibility improvements */
    outline: none;
    cursor: pointer;
}

.floating-btn:focus {
    box-shadow: 
        0 0 0 3px rgba(255, 255, 255, 0.3),
        0 8px 32px rgba(0, 0, 0, 0.12),
        0 2px 6px rgba(0, 0, 0, 0.08);
}

/* Dashboard Button - Primary Purple with subtle pulse */
.floating-btn.dashboard-btn {
    background: linear-gradient(135deg, 
        rgba(103, 58, 183, 0.9) 0%, 
        rgba(63, 81, 181, 0.9) 100%);
    color: white;
    animation: subtlePulse 3s ease-in-out infinite;
}

@keyframes subtlePulse {
    0%, 100% { 
        box-shadow: 
            0 8px 32px rgba(0, 0, 0, 0.12),
            0 2px 6px rgba(0, 0, 0, 0.08),
            0 0 0 0 rgba(103, 58, 183, 0.5);
    }
    50% { 
        box-shadow: 
            0 8px 32px rgba(0, 0, 0, 0.12),
            0 2px 6px rgba(0, 0, 0, 0.08),
            0 0 0 8px rgba(103, 58, 183, 0.1);
    }
}

.floating-btn.dashboard-btn:hover {
    background: linear-gradient(135deg, 
        rgba(103, 58, 183, 1) 0%, 
        rgba(63, 81, 181, 1) 100%);
    transform: translateY(-3px) scale(1.05);
    box-shadow: 
        0 12px 40px rgba(103, 58, 183, 0.4),
        0 4px 12px rgba(0, 0, 0, 0.15);
    color: white;
    text-decoration: none;
    animation: none; /* Stop pulse on hover */
}

/* Working Dashboard Button - Professional Teal */
.floating-btn.working-btn {
    background: linear-gradient(135deg, 
        rgba(20, 184, 166, 0.9) 0%, 
        rgba(5, 150, 105, 0.9) 100%);
    color: white;
}

.floating-btn.working-btn:hover {
    background: linear-gradient(135deg, 
        rgba(20, 184, 166, 1) 0%, 
        rgba(5, 150, 105, 1) 100%);
    transform: translateY(-3px) scale(1.05);
    box-shadow: 
        0 12px 40px rgba(20, 184, 166, 0.4),
        0 4px 12px rgba(0, 0, 0, 0.15);
    color: white;
    text-decoration: none;
}

/* Contact Button - Complementary Green */
.floating-btn.contact-btn {
    background: linear-gradient(135deg, 
        rgba(76, 175, 80, 0.9) 0%, 
        rgba(56, 142, 60, 0.9) 100%);
    color: white;
}

.floating-btn.contact-btn:hover {
    background: linear-gradient(135deg, 
        rgba(76, 175, 80, 1) 0%, 
        rgba(56, 142, 60, 1) 100%);
    transform: translateY(-3px) scale(1.05);
    box-shadow: 
        0 12px 40px rgba(76, 175, 80, 0.4),
        0 4px 12px rgba(0, 0, 0, 0.15);
    color: white;
    text-decoration: none;
}

/* Button Icons and Text */
.floating-btn .btn-icon {
    font-size: 1.1em;
    filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.2));
}

.floating-btn .btn-text {
    font-weight: 600;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

/* Subtle animation on load */
.floating-action-buttons {
    animation: slideInFromRight 0.6s ease-out;
}

@keyframes slideInFromRight {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Responsive Design for Floating Buttons */
@media (max-width: 768px) {
    .floating-action-buttons {
        bottom: 20px;
        right: 20px;
        gap: 12px;
    }
    
    .floating-btn {
        padding: 12px 16px;
        font-size: 0.9em;
        min-width: 110px;
    }
    
    .floating-btn .btn-icon {
        font-size: 1em;
    }
}

@media (max-width: 480px) {
    .floating-action-buttons {
        bottom: 15px;
        right: 15px;
        gap: 10px;
    }
    
    .floating-btn {
        padding: 10px 14px;
        font-size: 0.85em;
        min-width: 100px;
    }
    
    /* On very small screens, show only icons */
    .floating-btn .btn-text {
        display: none;
    }
    
    .floating-btn {
        min-width: 50px;
        padding: 12px;
        border-radius: 50%;
        aspect-ratio: 1;
        justify-content: center;
    }
    
    .floating-btn .btn-icon {
        font-size: 1.2em;
    }
    
    /* Remove pulse animation on small screens */
    .floating-btn.dashboard-btn {
        animation: none;
    }
}

/* ==========================================================================
   GALLERY UPLOAD SYSTEM - DRAG & DROP FUNCTIONALITY
   Professional image upload with glassmorphism design
   ========================================================================== */

/* Gallery Section Header with Upload Button */
.gallery-section-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 30px;
    gap: 20px;
}

.gallery-header-content {
    flex: 1;
}

.gallery-header-content h2 {
    margin: 0 0 10px 0;
}

.gallery-header-content p {
    margin: 0;
}

.gallery-header-actions {
    flex-shrink: 0;
}

.gallery-action-btn {
    background: linear-gradient(135deg, rgba(0, 150, 255, 0.9), rgba(0, 100, 200, 0.9));
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    font-family: 'Poppins', sans-serif;
}

.gallery-action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 150, 255, 0.4);
    background: linear-gradient(135deg, rgba(0, 150, 255, 1), rgba(0, 100, 200, 1));
}

/* Upload Section */
.gallery-upload-section {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 30px;
    margin-bottom: 40px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.upload-header {
    text-align: center;
    margin-bottom: 30px;
}

.upload-header h2 {
    color: #333;
    margin: 0 0 10px 0;
    font-family: 'Poppins', sans-serif;
}

.upload-header p {
    color: #666;
    margin: 0 0 20px 0;
}

.upload-toggle-btn {
    background: rgba(100, 100, 100, 0.2);
    color: #555;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Poppins', sans-serif;
}

.upload-toggle-btn:hover {
    background: rgba(100, 100, 100, 0.3);
    transform: translateX(-3px);
}

/* Drag & Drop Zone */
.drop-zone {
    position: relative;
    background: rgba(255, 255, 255, 0.1);
    border: 2px dashed rgba(0, 150, 255, 0.3);
    border-radius: 15px;
    padding: 60px 30px;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    margin-bottom: 30px;
}

.drop-zone:hover {
    border-color: rgba(0, 150, 255, 0.6);
    background: rgba(0, 150, 255, 0.05);
}

.drop-zone.drag-over {
    border-color: rgba(0, 150, 255, 0.8);
    background: rgba(0, 150, 255, 0.1);
    transform: scale(1.02);
}

.drop-zone-content .drop-icon {
    font-size: 4em;
    margin-bottom: 20px;
}

.drop-zone-content h3 {
    color: #333;
    margin: 0 0 10px 0;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
}

.drop-zone-content p {
    color: #666;
    margin: 0 0 20px 0;
    font-size: 0.9em;
}

.browse-btn {
    background: linear-gradient(135deg, rgba(0, 150, 255, 0.2), rgba(0, 100, 200, 0.2));
    color: #0066cc;
    border: 1px solid rgba(0, 150, 255, 0.3);
    padding: 12px 24px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
    font-family: 'Poppins', sans-serif;
}

.browse-btn:hover {
    background: linear-gradient(135deg, rgba(0, 150, 255, 0.3), rgba(0, 100, 200, 0.3));
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 150, 255, 0.3);
}

/* Drop Zone Active State */
.drop-zone-active {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 150, 255, 0.15);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.drop-active-content .drop-icon-active {
    font-size: 5em;
    margin-bottom: 15px;
    animation: bounce 0.6s infinite alternate;
}

@keyframes bounce {
    0% { transform: translateY(0); }
    100% { transform: translateY(-10px); }
}

.drop-active-content h3 {
    color: #0066cc;
    font-weight: 700;
    font-size: 1.4em;
}

/* Upload Progress */
.upload-progress {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
}

.progress-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.progress-header h4 {
    color: #333;
    margin: 0;
    font-family: 'Poppins', sans-serif;
}

.progress-header span {
    color: #666;
    font-weight: 600;
}

.progress-bar {
    background: rgba(200, 200, 200, 0.3);
    height: 8px;
    border-radius: 4px;
    overflow: hidden;
}

.progress-fill {
    background: linear-gradient(90deg, #0096ff, #00d4ff);
    height: 100%;
    border-radius: 4px;
    transition: width 0.3s ease;
    width: 0%;
}

/* Preview Grid */
.preview-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.preview-item {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.preview-image {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 10px;
}

.preview-info h5 {
    color: #333;
    margin: 0 0 5px 0;
    font-size: 0.9em;
    font-family: 'Poppins', sans-serif;
}

.preview-info p {
    color: #666;
    margin: 0;
    font-size: 0.8em;
}

/* Upload Actions */
.upload-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.action-btn {
    padding: 12px 24px;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Poppins', sans-serif;
}

.save-btn {
    background: linear-gradient(135deg, rgba(76, 175, 80, 0.9), rgba(56, 142, 60, 0.9));
    color: white;
}

.save-btn:hover {
    background: linear-gradient(135deg, rgba(76, 175, 80, 1), rgba(56, 142, 60, 1));
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
}

.cancel-btn {
    background: rgba(255, 50, 50, 0.2);
    color: #cc3333;
    border: 1px solid rgba(255, 50, 50, 0.3);
}

.cancel-btn:hover {
    background: rgba(255, 50, 50, 0.3);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 50, 50, 0.3);
}

/* Responsive Design for Upload System */
@media (max-width: 768px) {
    .gallery-section-header {
        flex-direction: column;
        gap: 15px;
    }
    
    .gallery-header-actions {
        align-self: stretch;
    }
    
    .gallery-action-btn {
        width: 100%;
        justify-content: center;
    }
    
    .drop-zone {
        padding: 40px 20px;
    }
    
    .upload-actions {
        flex-direction: column;
    }
    
    .action-btn {
        width: 100%;
    }
}

/* ==========================================================================
   96% VIEWPORT LIGHTBOX - MATCHING DASHBOARD DESIGN PHILOSOPHY
   Professional glassmorphism lightbox with immersive viewing experience
   ========================================================================== */

/* Lightbox Modal - 96% Viewport Philosophy */
.gallery-lightbox-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: lightboxFadeIn 0.3s ease-out;
}

@keyframes lightboxFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Lightbox Backdrop */
.lightbox-backdrop {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    backdrop-filter: blur(15px);
}

/* Lightbox Content - 96% Viewport Sizing */
.lightbox-content {
    position: relative;
    width: 96vw;
    height: 96vh;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-shadow: 
        0 25px 50px rgba(0, 0, 0, 0.5),
        0 0 0 1px rgba(255, 255, 255, 0.2);
    animation: lightboxSlideIn 0.4s ease-out;
}

@keyframes lightboxSlideIn {
    from {
        transform: scale(0.9) translateY(20px);
        opacity: 0;
    }
    to {
        transform: scale(1) translateY(0);
        opacity: 1;
    }
}

/* Lightbox Header */
.lightbox-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 25px 30px 20px 30px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.lightbox-title-section h3 {
    margin: 0 0 8px 0;
    color: #333;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 1.4em;
}

.lightbox-title-section p {
    margin: 0;
    color: #666;
    font-size: 0.95em;
    line-height: 1.4;
}

.lightbox-controls {
    display: flex;
    gap: 10px;
    align-items: center;
}

.lightbox-btn {
    width: 45px;
    height: 45px;
    border: none;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    color: #333;
    font-size: 1.8em;
    font-weight: 300;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.lightbox-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.lightbox-btn.close-btn:hover {
    background: rgba(255, 50, 50, 0.2);
    color: #ff3333;
}

/* Lightbox Image Container - Fixed sizing */
.lightbox-image-container {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    position: relative;
    overflow: hidden;
    min-height: 0; /* Allow flex shrinking */
}

.lightbox-image {
    width: auto;
    height: auto;
    max-width: 90%; /* Prevent image from being too large */
    max-height: 90%; /* Prevent image from being too large */
    object-fit: contain;
    border-radius: 15px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    transition: opacity 0.3s ease; /* Remove transform transition that might cause issues */
}

/* Loading Spinner */
.lightbox-loading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: none;
}

.loading-spinner {
    width: 50px;
    height: 50px;
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-top: 4px solid #007cba;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Lightbox Footer */
.lightbox-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 30px 25px 30px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.lightbox-counter {
    color: #666;
    font-weight: 500;
    font-family: 'Poppins', sans-serif;
}

.lightbox-actions {
    display: flex;
    gap: 15px;
}

.lightbox-action-btn {
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    background: rgba(0, 124, 186, 0.1);
    color: #007cba;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Poppins', sans-serif;
    border: 1px solid rgba(0, 124, 186, 0.2);
}

.lightbox-action-btn:hover {
    background: rgba(0, 124, 186, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 124, 186, 0.3);
}

/* Responsive Design for Lightbox */
@media (max-width: 768px) {
    .lightbox-content {
        width: 98vw;
        height: 98vh;
    }
    
    .lightbox-header {
        padding: 20px 20px 15px 20px;
    }
    
    .lightbox-title-section h3 {
        font-size: 1.2em;
    }
    
    .lightbox-btn {
        width: 40px;
        height: 40px;
        font-size: 1.5em;
    }
    
    .lightbox-footer {
        padding: 15px 20px 20px 20px;
    }
    
    .lightbox-actions {
        gap: 10px;
    }
    
    .lightbox-action-btn {
        padding: 8px 15px;
        font-size: 0.9em;
    }
}

/* Lightbox Trigger Styling */
.lightbox-trigger {
    cursor: pointer;
    transition: all 0.3s ease;
}

.lightbox-trigger:hover {
    transform: scale(1.05);
    filter: brightness(1.1);
}
</style>

<script>
// ==========================================================================
// GALLERY UPLOAD SYSTEM - DRAG & DROP FUNCTIONALITY
// Professional image upload with real-time preview and progress tracking
// ==========================================================================

let uploadedFiles = [];
let uploadProgress = 0;

// Initialize Upload System
document.addEventListener('DOMContentLoaded', function() {
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    const dropZoneContent = dropZone.querySelector('.drop-zone-content');
    const dropZoneActive = dropZone.querySelector('.drop-zone-active');
    
    // Drag and Drop Events
    dropZone.addEventListener('click', () => fileInput.click());
    
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('drag-over');
        dropZoneContent.style.display = 'none';
        dropZoneActive.style.display = 'flex';
    });
    
    dropZone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        if (!dropZone.contains(e.relatedTarget)) {
            dropZone.classList.remove('drag-over');
            dropZoneContent.style.display = 'block';
            dropZoneActive.style.display = 'none';
        }
    });
    
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('drag-over');
        dropZoneContent.style.display = 'block';
        dropZoneActive.style.display = 'none';
        
        const files = e.dataTransfer.files;
        handleFiles(files);
    });
    
    // File Input Change
    fileInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });
    
    console.log('📤 Gallery Upload System Initialized!');
});

// Toggle Upload Section
function toggleUploadSection(show) {
    const gallerySection = document.querySelector('.dashboard-section');
    const uploadSection = document.getElementById('galleryUploadSection');
    
    if (show) {
        gallerySection.style.display = 'none';
        uploadSection.style.display = 'block';
    } else {
        gallerySection.style.display = 'block';
        uploadSection.style.display = 'none';
        clearUploads();
    }
}

// Handle Selected/Dropped Files
function handleFiles(files) {
    const validFiles = Array.from(files).filter(file => {
        // Check file type
        if (!file.type.startsWith('image/')) {
            alert(`${file.name} is not an image file.`);
            return false;
        }
        
        // Check file size (5MB limit)
        if (file.size > 5 * 1024 * 1024) {
            alert(`${file.name} is too large. Max size is 5MB.`);
            return false;
        }
        
        return true;
    });
    
    if (validFiles.length > 0) {
        processFiles(validFiles);
    }
}

// Process Valid Files
function processFiles(files) {
    const progressSection = document.getElementById('uploadProgress');
    const progressFill = document.getElementById('progressFill');
    const progressText = document.getElementById('progressText');
    const previewGrid = document.getElementById('previewGrid');
    const uploadActions = document.getElementById('uploadActions');
    
    // Show progress
    progressSection.style.display = 'block';
    uploadActions.style.display = 'none';
    
    let processedCount = 0;
    const totalFiles = files.length;
    
    progressText.textContent = `0 / ${totalFiles}`;
    
    files.forEach((file, index) => {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            // Create preview item
            const previewItem = document.createElement('div');
            previewItem.className = 'preview-item';
            previewItem.innerHTML = `
                <img src="${e.target.result}" alt="${file.name}" class="preview-image">
                <div class="preview-info">
                    <h5>${file.name}</h5>
                    <p>${formatFileSize(file.size)}</p>
                </div>
            `;
            
            previewGrid.appendChild(previewItem);
            
            // Store file data
            uploadedFiles.push({
                name: file.name,
                size: file.size,
                data: e.target.result,
                file: file
            });
            
            processedCount++;
            const progress = (processedCount / totalFiles) * 100;
            progressFill.style.width = `${progress}%`;
            progressText.textContent = `${processedCount} / ${totalFiles}`;
            
            // Show actions when complete
            if (processedCount === totalFiles) {
                setTimeout(() => {
                    progressSection.style.display = 'none';
                    uploadActions.style.display = 'flex';
                }, 500);
            }
        };
        
        reader.readAsDataURL(file);
    });
}

// Format File Size
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Save Uploaded Images (Mock function - would integrate with your backend)
function saveUploadedImages() {
    if (uploadedFiles.length === 0) {
        alert('No images to save!');
        return;
    }
    
    // Show saving progress
    const progressSection = document.getElementById('uploadProgress');
    const progressFill = document.getElementById('progressFill');
    const progressText = document.getElementById('progressText');
    const uploadActions = document.getElementById('uploadActions');
    
    progressSection.style.display = 'block';
    uploadActions.style.display = 'none';
    
    progressFill.style.width = '0%';
    progressText.textContent = 'Saving images...';
    
    // Simulate save progress
    let saveProgress = 0;
    const saveInterval = setInterval(() => {
        saveProgress += 20;
        progressFill.style.width = `${saveProgress}%`;
        
        if (saveProgress >= 100) {
            clearInterval(saveInterval);
            
            setTimeout(() => {
                alert(`Successfully saved ${uploadedFiles.length} images to gallery!`);
                toggleUploadSection(false);
                
                // Optional: Refresh page to show new images
                // window.location.reload();
            }, 500);
        }
    }, 200);
    
    console.log('📤 Uploaded Files:', uploadedFiles);
    
    // TODO: Integrate with WordPress media library or custom upload handler
    // This is where you would send the files to your server
}

// Clear All Uploads
function clearUploads() {
    uploadedFiles = [];
    document.getElementById('previewGrid').innerHTML = '';
    document.getElementById('uploadProgress').style.display = 'none';
    document.getElementById('uploadActions').style.display = 'none';
    document.getElementById('fileInput').value = '';
}

console.log('📤 Gallery Upload System Ready!');

// ==========================================================================
// 96% VIEWPORT LIGHTBOX FUNCTIONALITY - PROFESSIONAL GALLERY EXPERIENCE
// Matching Dashboard Pro design philosophy with immersive image viewing
// ==========================================================================

let currentLightboxIndex = 0;
let lightboxImages = [];

// Initialize Lightbox System on Page Load
document.addEventListener('DOMContentLoaded', function() {
    // Collect all lightbox images
    const triggers = document.querySelectorAll('.lightbox-trigger');
    triggers.forEach((trigger, index) => {
        lightboxImages.push({
            src: trigger.dataset.lightboxSrc,
            title: trigger.dataset.lightboxTitle,
            description: trigger.dataset.lightboxDescription,
            element: trigger
        });
    });
    
    console.log('🖼️ Gallery Lightbox Pro v1.0 - 96% Viewport System Initialized!');
});

// Open Lightbox Function
function openLightbox(element) {
    const modal = document.getElementById('galleryLightbox');
    const image = document.getElementById('lightboxImage');
    const title = document.getElementById('lightboxTitle');
    const description = document.getElementById('lightboxDescription');
    const counter = document.getElementById('lightboxCounter');
    const loading = document.getElementById('lightboxLoading');
    
    // Find current image index
    const imageSrc = element.dataset.lightboxSrc;
    currentLightboxIndex = lightboxImages.findIndex(img => img.src === imageSrc);
    
    // Show modal with better scroll prevention
    modal.style.display = 'flex';
    
    // Better scroll prevention that won't cause freezing
    const scrollY = window.scrollY;
    document.body.style.position = 'fixed';
    document.body.style.top = `-${scrollY}px`;
    document.body.style.width = '100%';
    
    // Show loading spinner
    loading.style.display = 'block';
    image.style.opacity = '0';
    
    // Load image with proper sizing
    const imageObj = new Image();
    imageObj.onload = function() {
        // Hide loading spinner
        loading.style.display = 'none';
        
        // Set image source and ensure it displays at proper size
        image.src = imageObj.src;
        image.style.opacity = '1';
        image.style.maxWidth = '90%';
        image.style.maxHeight = '90%';
        image.style.width = 'auto';
        image.style.height = 'auto';
        
        // Update content
        title.textContent = lightboxImages[currentLightboxIndex].title;
        description.textContent = lightboxImages[currentLightboxIndex].description;
        counter.textContent = `${currentLightboxIndex + 1} / ${lightboxImages.length}`;
        
        // Force layout recalculation
        setTimeout(() => {
            image.style.display = 'block';
        }, 50);
    };
    
    imageObj.src = imageSrc;
    
    // Add escape key listener
    document.addEventListener('keydown', handleLightboxKeydown);
}

// Close Lightbox Function - Fixed page freezing
function closeLightbox() {
    const modal = document.getElementById('galleryLightbox');
    
    // Get the scroll position that was stored
    const scrollY = document.body.style.top;
    
    // Restore body styles immediately
    document.body.style.position = '';
    document.body.style.top = '';
    document.body.style.width = '';
    document.body.style.overflow = '';
    
    // Restore scroll position
    if (scrollY) {
        window.scrollTo(0, parseInt(scrollY || '0') * -1);
    }
    
    // Add closing animation
    modal.style.animation = 'lightboxFadeOut 0.3s ease-out';
    
    setTimeout(() => {
        modal.style.display = 'none';
        modal.style.animation = '';
        
        // Final cleanup - ensure everything is restored
        document.body.style.overflow = '';
        document.body.style.position = '';
        document.body.style.width = '';
        document.documentElement.style.overflow = '';
        
        // Re-enable any disabled elements
        const allClickableElements = document.querySelectorAll('a, button, .lightbox-trigger');
        allClickableElements.forEach(el => {
            el.style.pointerEvents = '';
        });
        
    }, 300);
    
    // Remove escape key listener
    document.removeEventListener('keydown', handleLightboxKeydown);
    
    // Force page refresh of interactive elements
    setTimeout(() => {
        window.dispatchEvent(new Event('resize'));
        
        // Double-check scroll is working
        document.body.style.overflow = 'visible';
        setTimeout(() => {
            document.body.style.overflow = '';
        }, 100);
    }, 350);
}

// Navigate Between Images
function navigateLightbox(direction) {
    currentLightboxIndex += direction;
    
    // Loop around
    if (currentLightboxIndex >= lightboxImages.length) {
        currentLightboxIndex = 0;
    } else if (currentLightboxIndex < 0) {
        currentLightboxIndex = lightboxImages.length - 1;
    }
    
    // Load new image
    const image = document.getElementById('lightboxImage');
    const title = document.getElementById('lightboxTitle');
    const description = document.getElementById('lightboxDescription');
    const counter = document.getElementById('lightboxCounter');
    const loading = document.getElementById('lightboxLoading');
    
    // Show loading
    loading.style.display = 'block';
    image.style.opacity = '0';
    
    // Load new image with proper sizing
    const imageObj = new Image();
    imageObj.onload = function() {
        loading.style.display = 'none';
        
        // Set image with proper sizing
        image.src = imageObj.src;
        image.style.opacity = '1';
        image.style.maxWidth = '90%';
        image.style.maxHeight = '90%';
        image.style.width = 'auto';
        image.style.height = 'auto';
        
        // Update content
        title.textContent = lightboxImages[currentLightboxIndex].title;
        description.textContent = lightboxImages[currentLightboxIndex].description;
        counter.textContent = `${currentLightboxIndex + 1} / ${lightboxImages.length}`;
        
        // Force layout recalculation
        setTimeout(() => {
            image.style.display = 'block';
        }, 50);
    };
    
    imageObj.src = lightboxImages[currentLightboxIndex].src;
}

// Keyboard Navigation
function handleLightboxKeydown(event) {
    switch(event.key) {
        case 'Escape':
            closeLightbox();
            break;
        case 'ArrowLeft':
            navigateLightbox(-1);
            break;
        case 'ArrowRight':
            navigateLightbox(1);
            break;
        case 'f':
        case 'F':
            toggleFullscreen();
            break;
    }
}

// Toggle Fullscreen Function
function toggleFullscreen() {
    const modal = document.getElementById('galleryLightbox');
    
    if (!document.fullscreenElement) {
        modal.requestFullscreen().catch(err => {
            console.log('Fullscreen not supported:', err);
        });
    } else {
        document.exitFullscreen();
    }
}

// Download Image Function
function downloadImage() {
    const currentImage = lightboxImages[currentLightboxIndex];
    const link = document.createElement('a');
    link.href = currentImage.src;
    link.download = currentImage.title.replace(/[^a-z0-9]/gi, '_').toLowerCase() + '.jpg';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Add CSS for fade out animation
const lightboxFadeOutCSS = `
@keyframes lightboxFadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
}
`;

// Inject fade out CSS
const styleSheet = document.createElement('style');
styleSheet.textContent = lightboxFadeOutCSS;
document.head.appendChild(styleSheet);

// Touch/Swipe Support for Mobile
let touchStartX = 0;
let touchEndX = 0;

document.addEventListener('touchstart', function(event) {
    if (document.getElementById('galleryLightbox').style.display === 'flex') {
        touchStartX = event.changedTouches[0].screenX;
    }
});

document.addEventListener('touchend', function(event) {
    if (document.getElementById('galleryLightbox').style.display === 'flex') {
        touchEndX = event.changedTouches[0].screenX;
        handleSwipe();
    }
});

function handleSwipe() {
    const swipeThreshold = 50;
    const diffX = touchStartX - touchEndX;
    
    if (Math.abs(diffX) > swipeThreshold) {
        if (diffX > 0) {
            // Swipe left - next image
            navigateLightbox(1);
        } else {
            // Swipe right - previous image
            navigateLightbox(-1);
        }
    }
}

console.log('🎨 Gallery Lightbox Pro - 96% Viewport Experience Ready!');
</script>

<?php get_footer(); ?>