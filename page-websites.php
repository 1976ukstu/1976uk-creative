<?php
/**
 * Template Name: Websites
 * 
 * Interactive Web Gallery - Showcase of professional website development
 * Features 96% viewport live previews and enhanced card design
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
        
        <!-- Websites Gallery Content with Beautiful Dashboard Styling -->
        <div class="dashboard-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Beautiful Page Header -->
                    <div class="dashboard-header">
                        <div class="dashboard-title">
                            <h1>🌐 Professional Websites</h1>
                        </div>
                        <div class="dashboard-subtitle">
                            Modern WordPress development with stunning design and functionality
                        </div>
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
            <!-- Dashboard Section for Websites -->
            <div class="dashboard-section">
                <h2>🌐 Website Portfolio</h2>
                <p>Interactive previews of professional websites crafted with modern technology</p>
                
                <!-- 2x2 Website Portfolio Grid -->
                <div class="websites-2x2-grid">
                
                    <!-- Top Row -->
                    <!-- Dragica Carlin - Top Left -->
                    <div class="dashboard-card website-card-2x2">
                        <div class="card-preview">
                            <div class="site-preview-thumb dragica-preview" onclick="openSitePreview('dragicacarlin', 'https://dragicacarlin.com', 'Professional Art Portfolio - Dragica Carlin')">
                                <!-- Preview will show actual website screenshot -->
                            </div>
                            <div class="card-overlay">
                                <button class="card-action-btn" onclick="openSitePreview('dragicacarlin', 'https://dragicacarlin.com', 'Professional Art Portfolio - Dragica Carlin')">🌐 Live Preview</button>
                                <a href="https://dragicacarlin.com" class="card-action-btn" target="_blank">🔗 Visit Site</a>
                            </div>
                        </div>
                        <div class="card-info">
                            <h4 class="card-title">Dragica Carlin</h4>
                            <p class="card-description">Professional artist portfolio with ACF Pro galleries and responsive design</p>
                            <div class="card-meta">
                                <span class="update-status">✅ Live</span>
                                <span class="update-time">Art Portfolio</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Ben Stockley - Top Right -->
                    <div class="dashboard-card website-card-2x2">
                        <div class="card-preview">
                            <div class="site-preview-thumb ben-preview" onclick="openSitePreview('benstockley', 'https://benstockley.com', 'Ben Stockley - Filmmaker Portfolio')">
                                <!-- Preview will show actual website screenshot -->
                            </div>
                            <div class="card-overlay">
                                <button class="card-action-btn" onclick="openSitePreview('benstockley', 'https://benstockley.com', 'Ben Stockley - Filmmaker Portfolio')">🌐 Live Preview</button>
                                <a href="https://benstockley.com" class="card-action-btn" target="_blank">🔗 Visit Site</a>
                            </div>
                        </div>
                        <div class="card-info">
                            <h4 class="card-title">Ben Stockley</h4>
                            <p class="card-description">Dynamic filmmaker portfolio showcasing video work and creative projects</p>
                            <div class="card-meta">
                                <span class="update-status">✅ Live</span>
                                <span class="update-time">Film Portfolio</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bottom Row -->
                    <!-- Reds Plastering - Bottom Left -->
                    <div class="dashboard-card website-card-2x2">
                        <div class="card-preview">
                            <div class="site-preview-thumb reds-preview" onclick="openSitePreview('redsplastering', 'https://redsplastering.co.uk', 'Reds Plastering - Trade Services')">
                                <!-- Preview will show actual website screenshot -->
                            </div>
                            <div class="card-overlay">
                                <button class="card-action-btn" onclick="openSitePreview('redsplastering', 'https://redsplastering.co.uk', 'Reds Plastering - Trade Services')">🌐 Live Preview</button>
                                <a href="https://redsplastering.co.uk" class="card-action-btn" target="_blank">🔗 Visit Site</a>
                            </div>
                        </div>
                        <div class="card-info">
                            <h4 class="card-title">Reds Plastering</h4>
                            <p class="card-description">Professional trade services website with contact systems and business info</p>
                            <div class="card-meta">
                                <span class="update-status">✅ Live</span>
                                <span class="update-time">Trade Services</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- David Austen - Bottom Right -->
                    <div class="dashboard-card website-card-2x2">
                        <div class="card-preview">
                            <div class="site-preview-thumb austen-preview" onclick="openSitePreview('davidausten', 'https://davidaustenstudio.com', 'David Austen Studio - Artist Portfolio')">
                                <!-- Preview will show actual website screenshot -->
                            </div>
                            <div class="card-overlay">
                                <button class="card-action-btn" onclick="openSitePreview('davidausten', 'https://davidaustenstudio.com', 'David Austen Studio - Artist Portfolio')">🌐 Live Preview</button>
                                <a href="https://davidaustenstudio.com" class="card-action-btn" target="_blank">🔗 Visit Site</a>
                            </div>
                        </div>
                        <div class="card-info">
                            <h4 class="card-title">David Austen</h4>
                            <p class="card-description">Artist studio website with gallery management and exhibition information</p>
                            <div class="card-meta">
                                <span class="update-status">✅ Live</span>
                                <span class="update-time">Art Studio</span>
                            </div>
                        </div>
                    </div>
                
            </div>
            
        </div>
        
    </main>
</div>

<!-- Site Preview Modal - Reusing existing modal system -->
<div id="sitePreviewModal" class="site-preview-modal" onclick="closeSitePreview()">
    <div class="preview-modal-content" onclick="event.stopPropagation()">
        <div class="preview-modal-header">
            <div class="preview-info">
                <h3 id="previewTitle">Site Preview</h3>
                <span id="previewUrl" class="preview-url"></span>
            </div>
            <div class="preview-controls">
                <button id="externalLinkBtn" class="control-btn" title="Open in new tab">
                    <span>🔗</span>
                </button>
                <button class="control-btn mobile-toggle" onclick="toggleMobileView()" title="Toggle mobile view">
                    <span>📱</span>
                </button>
                <button class="control-btn close-btn" onclick="closeSitePreview()" title="Close preview">
                    <span>×</span>
                </button>
            </div>
        </div>
        <div class="preview-iframe-container">
            <iframe id="sitePreviewFrame" src="" frameborder="0" allowfullscreen></iframe>
            <div id="loadingIndicator" class="loading-indicator">
                <div class="spinner"></div>
                <p>Loading site preview...</p>
            </div>
        </div>
    </div>
</div>

<script>
// Site Preview Functions (Enhanced for Website Gallery)
function openSitePreview(projectId, url, title) {
    const modal = document.getElementById('sitePreviewModal');
    const iframe = document.getElementById('sitePreviewFrame');
    const titleElement = document.getElementById('previewTitle');
    const urlElement = document.getElementById('previewUrl');
    const externalBtn = document.getElementById('externalLinkBtn');
    const loadingIndicator = document.getElementById('loadingIndicator');
    
    // Set content
    titleElement.textContent = title;
    urlElement.textContent = url;
    externalBtn.onclick = () => window.open(url, '_blank');
    
    // Show modal
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    
    // Special handling for Reds Plastering only - use screenshots due to hosting restrictions
    if (projectId === 'redsplastering') {
        loadingIndicator.style.display = 'none';
        
        // Replace iframe container with screenshot display
        iframe.style.display = 'none';
        
        // Create screenshot display
        const screenshotDiv = document.createElement('div');
        screenshotDiv.className = 'screenshot-preview';
        screenshotDiv.innerHTML = `
            <img id="redsScreenshot" 
                 src="<?php echo get_template_directory_uri(); ?>/images/reds-plastering-large.png" 
                 alt="Reds Plastering Website Desktop View" 
                 class="reds-screenshot desktop-view" />
            <p class="screenshot-note">📸 Website Screenshot Preview - <a href="${url}" target="_blank">Visit live site</a></p>
        `;
        
        iframe.parentNode.appendChild(screenshotDiv);
        
        // Set initial mobile button state
        const mobileBtn = document.querySelector('.mobile-toggle span');
        mobileBtn.textContent = '📱';
        
        // Set up mobile toggle functionality for Reds Plastering
        window.redsToggleMobile = function() {
            const screenshot = document.getElementById('redsScreenshot');
            const mobileBtn = document.querySelector('.mobile-toggle');
            
            if (screenshot.src.includes('large.png')) {
                // Switch to mobile view
                screenshot.src = '<?php echo get_template_directory_uri(); ?>/images/reds-plastering-mobile.png';
                screenshot.alt = 'Reds Plastering Website Mobile View';
                screenshot.className = 'reds-screenshot mobile-view';
                mobileBtn.style.background = 'rgba(102, 126, 234, 0.8)';
                mobileBtn.style.color = 'white';
                mobileBtn.querySelector('span').textContent = '💻';
            } else {
                // Switch back to desktop view
                screenshot.src = '<?php echo get_template_directory_uri(); ?>/images/reds-plastering-large.png';
                screenshot.alt = 'Reds Plastering Website Desktop View';
                screenshot.className = 'reds-screenshot desktop-view';
                mobileBtn.style.background = '';
                mobileBtn.style.color = '';
                mobileBtn.querySelector('span').textContent = '📱';
            }
        };
        
        return;
    }
    
    // Normal iframe loading for other sites
    loadingIndicator.style.display = 'flex';
    
    iframe.onload = () => {
        loadingIndicator.style.display = 'none';
    };
    
    iframe.onerror = () => {
        loadingIndicator.innerHTML = '<p>Site preview unavailable. <a href="' + url + '" target="_blank">Visit site directly</a></p>';
    };
    
    iframe.src = url;
}

function closeSitePreview() {
    const modal = document.getElementById('sitePreviewModal');
    const iframe = document.getElementById('sitePreviewFrame');
    
    modal.style.display = 'none';
    iframe.src = '';
    
    // Clean up Reds Plastering specific elements
    const screenshotPreview = document.querySelector('.screenshot-preview');
    if (screenshotPreview) {
        screenshotPreview.remove();
    }
    
    // Show iframe again (in case it was hidden for Reds)
    iframe.style.display = 'block';
    
    // Clean up the mobile toggle function
    if (window.redsToggleMobile) {
        delete window.redsToggleMobile;
    }
    
    // Reset mobile button icon
    const mobileBtn = document.querySelector('.mobile-toggle span');
    if (mobileBtn) {
        mobileBtn.textContent = '📱';
    }
    
    document.body.style.overflow = 'auto';
}

function toggleMobileView() {
    // Check if we're viewing Reds Plastering screenshots
    if (window.redsToggleMobile) {
        window.redsToggleMobile();
        return;
    }
    
    // Check if we're viewing a screenshot (any site with screenshots)
    const siteScreenshot = document.getElementById('siteScreenshot');
    if (siteScreenshot) {
        // For screenshots, just show a message that it's a static preview
        const btn = document.querySelector('.mobile-toggle span');
        btn.textContent = '�'; // Camera icon to show it's a screenshot
        
        // You could add mobile screenshot switching here later if needed
        return;
    }
    
    // Normal iframe mobile toggle for sites without screenshots
    const iframe = document.getElementById('sitePreviewFrame');
    const container = iframe.parentElement;
    
    container.classList.toggle('mobile-view');
    
    const btn = document.querySelector('.mobile-toggle span');
    if (container.classList.contains('mobile-view')) {
        btn.textContent = '💻';
    } else {
        btn.textContent = '📱';
    }
}

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeSitePreview();
    }
});

// Add hover effects for cards
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.website-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

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
body.page-template-page-websites {
    margin: 0 !important;
    padding: 0 !important;
    min-height: 100vh;
    position: relative;
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

/* 2x2 Website Portfolio Grid - NEW LAYOUT */
.websites-2x2-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    gap: 30px;
    margin-top: 30px;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}

.website-card-2x2 {
    aspect-ratio: 1.1/1; /* Adjusted for taller preview area */
    min-height: 450px; /* Increased to accommodate 250px preview + content */
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
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
    background: rgba(255, 255, 255, 0.2);
}

.dashboard-card:hover .card-preview {
    box-shadow: 
        inset 0 0 0 1px rgba(255, 255, 255, 0.2),
        0 8px 25px rgba(0, 0, 0, 0.3),
        0 2px 6px rgba(0, 0, 0, 0.15);
}

.featured-site {
    border-color: rgba(103, 126, 234, 0.5);
    box-shadow: 0 8px 32px rgba(103, 126, 234, 0.2);
}

.featured-site:hover {
    border-color: rgba(103, 126, 234, 0.8);
    box-shadow: 0 20px 60px rgba(103, 126, 234, 0.3);
}

.card-preview {
    position: relative;
    height: 250px; /* Increased from 200px for better proportion */
    overflow: hidden;
    border-radius: 15px 15px 0 0; /* Round top corners */
    box-shadow: 
        inset 0 0 0 1px rgba(255, 255, 255, 0.1),
        0 4px 15px rgba(0, 0, 0, 0.2),
        0 1px 3px rgba(0, 0, 0, 0.1);
    background: rgba(0, 0, 0, 0.02);
    backdrop-filter: blur(2px);
}

.card-image, .site-preview-thumb {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    background-size: cover;
    background-position: center;
    filter: brightness(1) contrast(1.05) saturate(1.1);
}

.dashboard-card:hover .card-image,
.dashboard-card:hover .site-preview-thumb {
    transform: scale(1.05);
    filter: brightness(1.1) contrast(1.1) saturate(1.2);
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

/* Website Screenshot Backgrounds */
.dragica-preview {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/dragica-screenshot.jpg') !important;
}

.ben-preview {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/ben-screenshot.jpg') !important;
}

.reds-preview {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/reds-plastering-large.png') !important;
}

.digital-preview {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/digital-screenshot.jpg') !important;
}

.urban-preview {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/urban-screenshot.jpg') !important;
}

.austen-preview {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/austen-screenshot.jpg') !important;
}

/* Modal Styles - Enhanced for websites */
.site-preview-modal {
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
    background: rgba(0, 0, 0, 0.05);
    border-bottom: 2px solid rgba(0, 0, 0, 0.1);
}

.preview-info h3 {
    margin: 0;
    color: #333;
    font-size: 1.4em;
    font-weight: 600;
}

.preview-url {
    color: #666;
    font-size: 0.9em;
    margin-top: 5px;
    display: block;
    font-weight: 500;
}

.preview-controls {
    display: flex;
    gap: 12px;
}

.control-btn {
    background: rgba(255, 255, 255, 0.9);
    border: 2px solid rgba(0, 0, 0, 0.1);
    border-radius: 50%;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1.3em;
}

.control-btn:hover {
    background: rgba(0, 0, 0, 0.1);
    transform: scale(1.1);
    border-color: rgba(0, 0, 0, 0.2);
}

.close-btn:hover {
    background: rgba(255, 82, 82, 0.9);
    color: white;
    border-color: rgba(255, 82, 82, 0.8);
}

.preview-iframe-container {
    flex: 1;
    position: relative;
    background: #f8f9fa;
}

#sitePreviewFrame {
    width: 100%;
    height: 100%;
    border: none;
    background: white;
}

.preview-iframe-container.mobile-view #sitePreviewFrame {
    width: 375px;
    height: 100%;
    margin: 0 auto;
    display: block;
    border-left: 3px solid #333;
    border-right: 3px solid #333;
    border-radius: 25px;
}

.loading-indicator {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: white;
    z-index: 10;
}

.spinner {
    width: 60px;
    height: 60px;
    border: 6px solid #f3f3f3;
    border-top: 6px solid #667eea;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loading-indicator p {
    margin-top: 25px;
    color: #666;
    font-size: 1.2em;
    font-weight: 500;
}

/* Screenshot Preview Styles for sites that can't be embedded */
.screenshot-preview {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
    padding: 20px;
    box-sizing: border-box;
}

.reds-screenshot {
    max-width: 90%;
    max-height: 80%;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    margin-bottom: 15px;
    object-fit: contain;
    transition: all 0.3s ease;
}

.reds-screenshot.mobile-view {
    max-width: 50%;
    max-height: 70%;
}

.screenshot-note {
    color: #666;
    font-size: 0.9em;
    text-align: center;
    margin: 0;
    max-width: 80%;
}

.screenshot-note a {
    color: #007cba;
    text-decoration: none;
    font-weight: 500;
}

.screenshot-note a:hover {
    text-decoration: underline;
}

/* Responsive Design */

/* Large Desktop Enhancement - Bigger cards, maintain 40px screen margins */
@media (min-width: 1250px) {
    .dashboard-gallery-grid {
        grid-template-columns: repeat(3, 1fr); /* Keep exactly 3 cards */
        gap: 40px; /* Larger gaps between the bigger cards */
    }
    
    .websites-2x2-grid {
        gap: 40px;
        max-width: 1400px;
    }
    
    .website-card-2x2 {
        min-height: 450px;
    }
}

@media (max-width: 1024px) {
    .dashboard-gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .websites-2x2-grid {
        gap: 20px;
        /* Keep 2x2 layout on tablet */
    }
    
    .website-card-2x2 {
        min-height: 350px;
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
    
    .websites-2x2-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
        gap: 20px;
    }
    
    .website-card-2x2 {
        min-height: 300px;
    }
    
    .dashboard-title h1 {
        font-size: 2.2em;
    }
    
    .reds-screenshot {
        max-width: 95%;
        max-height: 70%;
    }
    
    .reds-screenshot.mobile-view {
        max-width: 60%;
        max-height: 75%;
    }
    
    .screenshot-note {
        font-size: 0.8em;
        max-width: 95%;
    }
}
</style>

<?php get_footer(); ?>