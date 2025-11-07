<?php
/**
 * Template Name: Gallery
 * 
 * Interactive Gallery Showcase - Demonstrating Dashboard Management System
 * Features 6-card grid layout with modern styling
 */
get_header();
?>

<!-- Future Tech Ice Stone Background -->
<div class="future-tech-background">
    <div class="tech-stripes">
        <div class="tech-stripe stripe-1"></div>
        <div class="tech-stripe stripe-2"></div>
        <div class="tech-stripe stripe-3"></div>
        <div class="tech-stripe stripe-4"></div>
        <div class="tech-stripe stripe-5"></div>
        <div class="tech-stripe stripe-6"></div>
    </div>
</div>

<div class="site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: inherit; text-decoration: none;">
        <span class="main-title">1976uk</span>
        <span class="sub-title">Creative</span>
    </a>
</div>

<!-- Floating Action Buttons - Bottom Right -->
<div class="floating-action-buttons">
    <!-- Removed Dashboard Simple button as requested -->
    <a href="<?php echo esc_url(home_url('/dashboard-working')); ?>" class="floating-btn working-btn" title="Access Pro Dashboard v2.0">
        <span class="btn-icon">�</span>
        <span class="btn-text">Dashboard Pro</span>
    </a>
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="floating-btn contact-btn" title="Contact Us">
        <span class="btn-icon">📧</span>
        <span class="btn-text">Contact</span>
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
                <h2>📱 Live Gallery Showcase</h2>
                <p>All 6 cards are now fully managed through the dashboard system with real-time drag & drop uploads and cross-device compatibility!</p>
                
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
                            
                            $image_src = $card1_image ? $card1_image : get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-01.png';
                            ?>
                            <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 1" class="card-image">
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
                            <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 2" class="card-image">
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
                            <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 3" class="card-image">
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
                            <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 4" class="card-image">
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
                            <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 5" class="card-image">
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
                            <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 6" class="card-image">
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

/* Dashboard Demo Section - IMPROVED BOTTOM SPACING */
.dashboard-demo-section {
    margin: 60px auto 80px auto; /* Increased bottom margin */
    max-width: 1000px;
    padding: 0 20px 40px 20px; /* Added bottom padding */
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
    background: rgba(255, 255, 255, 0.05);
    padding: 25px 20px;
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
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
@media (max-width: 768px) {
    .demo-card {
        padding: 30px 20px;
        margin: 0 10px 40px 10px;
    }
    
    .demo-features {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .demo-header h2 {
        font-size: 2em;
    }
    
    .demo-header p {
        font-size: 1.1em;
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
</style>

<?php get_footer(); ?>