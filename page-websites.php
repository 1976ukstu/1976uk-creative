<?php
/**
 * Template Name: Websites
 * 
 * Interactive Web Gallery - Showcase of professional website development
 * Features 96% viewport live previews and enhanced card design
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
        
        <!-- Websites Gallery Content -->
        <div class="websites-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Page header removed for cleaner look -->
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
            <!-- Interactive Website Gallery - 3x2 Grid -->
            <div class="websites-gallery">
                
                <!-- Row 1 -->
                <div class="website-card featured-site">
                    <!-- Website Preview Section (NOW AT TOP) -->
                    <div class="website-preview-section">
                        <div class="site-preview-thumb dragica-preview" onclick="openSitePreview('dragicacarlin', 'https://dragicacarlin.com', 'Professional Art Portfolio - Dragica Carlin')">
                            <!-- Preview will show actual website screenshot -->
                        </div>
                    </div>
                    <!-- Text Info Section (NOW AT BOTTOM with solid color) -->
                    <div class="website-info dragica-color">
                        <div class="site-type-badge">WordPress</div>
                        <div class="site-title-overlay">dragicacarlin.com</div>
                        <div class="preview-hint">🔍 Live Preview</div>
                        <h3 class="website-title">Dragica Carlin - Art Portfolio</h3>
                        <p class="website-description">Professional artist portfolio with ACF Pro galleries, responsive design, and sophisticated content management system.</p>
                        <div class="tech-stack"><strong>Tech:</strong> WordPress, ACF Pro, CSS Grid, PHP, Responsive Design</div>
                        <div class="website-links">
                            <button class="website-link preview-btn" onclick="openSitePreview('dragicacarlin', 'https://dragicacarlin.com', 'Professional Art Portfolio - Dragica Carlin')">
                                🌐 Live Preview
                            </button>
                            <a href="https://dragicacarlin.com" class="external-link" target="_blank">
                                🔗 Visit Site
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="website-card">
                    <!-- Website Preview Section (NOW AT TOP) -->
                    <div class="website-preview-section">
                        <div class="site-preview-thumb ben-preview" onclick="openSitePreview('benstockley', 'https://benstockley.com', 'Ben Stockley - Filmmaker Portfolio')">
                            <!-- Preview will show actual website screenshot -->
                        </div>
                    </div>
                    <!-- Text Info Section (NOW AT BOTTOM with solid color) -->
                    <div class="website-info ben-color">
                        <div class="site-type-badge">Portfolio</div>
                        <div class="site-title-overlay">benstockley.com</div>
                        <div class="preview-hint">🔍 Live Preview</div>
                        <h3 class="website-title">Ben Stockley - Filmmaker</h3>
                        <p class="website-description">Dynamic filmmaker portfolio showcasing professional video work, commercial projects, and creative collaborations.</p>
                        <div class="tech-stack"><strong>Tech:</strong> WordPress, Video Integration, Responsive Design</div>
                        <div class="website-links">
                            <button class="website-link preview-btn" onclick="openSitePreview('benstockley', 'https://benstockley.com', 'Ben Stockley - Filmmaker Portfolio')">
                                🌐 Live Preview
                            </button>
                            <a href="https://benstockley.com" class="external-link" target="_blank">
                                🔗 Visit Site
                            </a>
                        </div>
                    </div>
                </div>
        
                <div class="website-card">
                    <!-- Website Preview Section (NOW AT TOP) -->
                    <div class="website-preview-section">
                        <div class="site-preview-thumb reds-preview" onclick="openSitePreview('redsplastering', 'https://redsplastering.co.uk', 'Reds Plastering - Trade Services')">
                            <!-- Preview will show actual website screenshot -->
                        </div>
                    </div>
                    <!-- Text Info Section (NOW AT BOTTOM with glassmorphism) -->
                    <div class="website-info reds-color">
                        <div class="site-type-badge">Business</div>
                        <div class="site-title-overlay">redsplastering.co.uk</div>
                        <div class="preview-hint">🔍 Live Preview</div>
                        <h3 class="website-title">Reds Plastering Services</h3>
                        <p class="website-description">Professional trade services website with service showcases, contact systems, and business information management.</p>
                        <div class="tech-stack"><strong>Tech:</strong> WordPress, Business Theme, Contact Forms, SEO Optimization</div>
                        <div class="website-links">
                            <button class="website-link preview-btn" onclick="openSitePreview('redsplastering', 'https://redsplastering.co.uk', 'Reds Plastering - Trade Services')">
                                🌐 Live Preview
                            </button>
                            <a href="https://redsplastering.co.uk" class="external-link" target="_blank">
                                🔗 Visit Site
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Row 2 -->
                <div class="website-card">
                    <!-- Website Preview Section (NOW AT TOP) -->
                    <div class="website-preview-section">
                        <div class="site-preview-thumb digital-preview" onclick="openSitePreview('digitald', 'https://digitald.website', 'Digital D - Creative Digital Solutions')">
                            <!-- Preview will show actual website screenshot -->
                        </div>
                    </div>
                    <!-- Text Info Section (NOW AT BOTTOM with glassmorphism) -->
                    <div class="website-info digital-color">
                        <div class="site-type-badge">Digital</div>
                        <div class="site-title-overlay">digitald.website</div>
                        <div class="preview-hint">🔍 Live Preview</div>
                        <h3 class="website-title">Digital D - Creative Solutions</h3>
                        <p class="website-description">Modern digital solutions website featuring creative services, portfolio showcase, and client collaboration tools.</p>
                        <div class="tech-stack"><strong>Tech:</strong> WordPress, Custom Development, Interactive Elements, Modern Design</div>
                        <div class="website-links">
                            <button class="website-link preview-btn" onclick="openSitePreview('digitald', 'https://digitald.website', 'Digital D - Creative Digital Solutions')">
                                🌐 Live Preview
                            </button>
                            <a href="https://digitald.website" class="external-link" target="_blank">
                                🔗 Visit Site
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="website-card">
                    <!-- Website Preview Section (NOW AT TOP) -->
                    <div class="website-preview-section">
                        <div class="site-preview-thumb urban-preview" onclick="openSitePreview('oururban', 'https://oururban.1976uk.com', 'Our Urban - Community Platform')">
                            <!-- Preview will show actual website screenshot -->
                        </div>
                    </div>
                    <!-- Text Info Section (NOW AT BOTTOM with glassmorphism) -->
                    <div class="website-info urban-color">
                        <div class="site-type-badge">Community</div>
                        <div class="site-title-overlay">oururban.1976uk.com</div>
                        <div class="preview-hint">🔍 Live Preview</div>
                        <h3 class="website-title">Our Urban - Community Platform</h3>
                        <p class="website-description">Community-focused platform for urban development, collaboration tools, and public engagement initiatives.</p>
                        <div class="tech-stack"><strong>Tech:</strong> WordPress, Community Features, User Management, Interactive Content</div>
                        <div class="website-links">
                            <button class="website-link preview-btn" onclick="openSitePreview('oururban', 'https://oururban.1976uk.com', 'Our Urban - Community Platform')">
                                🌐 Live Preview
                            </button>
                            <a href="https://oururban.1976uk.com" class="external-link" target="_blank">
                                🔗 Visit Site
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="website-card">
                    <!-- Website Preview Section (NOW AT TOP) -->
                    <div class="website-preview-section">
                        <div class="site-preview-thumb austen-preview" onclick="openSitePreview('davidausten', 'https://davidaustenstudio.com', 'David Austen Studio - Artist Portfolio')">
                            <!-- Preview will show actual website screenshot -->
                        </div>
                    </div>
                    <!-- Text Info Section (NOW AT BOTTOM with glassmorphism) -->
                    <div class="website-info austen-color">
                        <div class="site-type-badge">Art Studio</div>
                        <div class="site-title-overlay">davidaustenstudio.com</div>
                        <div class="preview-hint">🔍 Live Preview</div>
                        <h3 class="website-title">David Austen Studio</h3>
                        <p class="website-description">Professional artist studio website with gallery management, exhibition information, and optimized WordPress core.</p>
                        <div class="tech-stack"><strong>Tech:</strong> WordPress, Gallery Systems, Performance Optimization, Plugin Management</div>
                        <div class="website-links">
                            <button class="website-link preview-btn" onclick="openSitePreview('davidausten', 'https://davidaustenstudio.com', 'David Austen Studio - Artist Portfolio')">
                                🌐 Live Preview
                            </button>
                            <a href="https://davidaustenstudio.com" class="external-link" target="_blank">
                                🔗 Visit Site
                            </a>
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
                 alt="Reds Plastering Website View" 
                 class="reds-screenshot" />
            <p class="screenshot-note">� Website Screenshot Preview - <a href="${url}" target="_blank">Visit live site</a></p>
        `;
        
        iframe.parentNode.appendChild(screenshotDiv);
        
        // Set up mobile toggle functionality for Reds Plastering
        window.redsToggleMobile = function() {
            const screenshot = document.getElementById('redsScreenshot');
            const mobileBtn = document.querySelector('.mobile-toggle');
            
            if (screenshot.src.includes('large.png')) {
                // Switch to mobile view
                screenshot.src = '<?php echo get_template_directory_uri(); ?>/images/reds-plastering-small.png';
                screenshot.alt = 'Reds Plastering Website Mobile View';
                screenshot.className = 'reds-screenshot mobile-view';
                mobileBtn.style.background = 'rgba(102, 126, 234, 0.8)';
                mobileBtn.style.color = 'white';
            } else {
                // Switch back to desktop view
                screenshot.src = '<?php echo get_template_directory_uri(); ?>/images/reds-plastering-large.png';
                screenshot.alt = 'Reds Plastering Website Desktop View';
                screenshot.className = 'reds-screenshot desktop-view';
                mobileBtn.style.background = '';
                mobileBtn.style.color = '';
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
    
    document.body.style.overflow = 'auto';
}

function toggleMobileView() {
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
/* ==========================================================================
   WEBSITES GALLERY STYLES - ENHANCED 3x2 GRID
   ========================================================================== */

.websites-content {
    padding: 20px 0;
}

/* Page header styles removed */

/* Enhanced 3x2 Grid Layout - FORCE 3 COLUMNS */
.websites-showcase {
    display: grid !important;
    grid-template-columns: 1fr 1fr 1fr !important;
    grid-auto-rows: auto !important;
    gap: 25px !important;
    margin: 50px auto !important;
    max-width: 1200px !important;
    width: 90% !important;
    min-height: auto !important;
    /* Add deeper background for card depth */
    background: linear-gradient(135deg, 
        rgba(102, 126, 234, 0.08) 0%, 
        rgba(118, 75, 162, 0.08) 25%,
        rgba(255, 154, 158, 0.05) 50%,
        rgba(250, 208, 196, 0.05) 75%,
        rgba(102, 126, 234, 0.08) 100%
    ) !important;
    padding: 25px !important;
    border-radius: 25px;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    box-sizing: border-box !important;
}

/* FORCE 3-column layout on desktop - NUCLEAR OPTION */
@media (min-width: 768px) {
    .websites-showcase {
        display: grid !important;
        grid-template-columns: 1fr 1fr 1fr !important;
        grid-auto-rows: auto !important;
        gap: 25px !important;
        padding: 25px !important;
        width: 90% !important;
        max-width: 1200px !important;
    }
    .website-card {
        width: 100% !important;
        max-width: none !important;
        flex: none !important;
    }
}

/* Enhanced Website Cards - NEW LAYOUT: Info Top, Preview Bottom */
.website-card {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.15) 0%, 
        rgba(255, 255, 255, 0.08) 100%
    );
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.15),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
    transition: all 0.4s ease;
    backdrop-filter: blur(15px);
    position: relative;
    width: 100% !important;
    max-width: none !important;
    min-width: 0 !important;
    flex: none !important;
    display: flex;
    flex-direction: column;
}

.website-card:hover {
    transform: translateY(-8px);
    box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.25),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
    border-color: rgba(255, 255, 255, 0.3);
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.22) 0%, 
        rgba(255, 255, 255, 0.12) 100%
    );
}

.featured-site {
    border-color: rgba(103, 126, 234, 0.5);
    box-shadow: 0 8px 32px rgba(103, 126, 234, 0.2);
}

.featured-site:hover {
    border-color: rgba(103, 126, 234, 0.8);
    box-shadow: 0 20px 60px rgba(103, 126, 234, 0.3);
}

/* Website Image/Thumbnail Area */
.website-image {
    position: relative;
    aspect-ratio: 16/9;
    overflow: hidden;
}

.site-preview-thumb {
    width: 100%;
    height: 100%;
    cursor: pointer;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2em;
    font-weight: bold;
    color: white;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

/* Website Screenshot Backgrounds */
.dragica-preview {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/dragica-screenshot.jpg') !important;
}

.ben-preview {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/ben-screenshot.jpg') !important;
}

.reds-preview {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/reds-screenshot.jpg') !important;
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

/* OLD STYLES REMOVED - Now using website previews instead of solid gradients */

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

/* Responsive screenshot display */
@media (max-width: 768px) {
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

/* Preview text overlays - UPDATED STYLES */
    font-size: 1.1em;
    text-align: center;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.preview-hint {
    position: absolute;
    bottom: 15px;
    right: 15px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 8px 12px;
    border-radius: 20px;
    font-size: 0.9em;
    opacity: 0;
    transition: opacity 0.3s ease;
    font-weight: normal;
}

.site-preview-thumb:hover .preview-hint {
    opacity: 1;
}

.site-preview-thumb:hover {
    transform: scale(1.05);
}

.site-type-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 0.8em;
    text-transform: uppercase;
    font-weight: 600;
    backdrop-filter: blur(10px);
}

/* Website Info Section - NOW AT BOTTOM with solid color backgrounds */
.website-info {
    padding: 25px;
    position: relative;
    flex: 0 0 auto;
}

/* Colored backgrounds for each site - ENHANCED GLASSMORPHISM */
.dragica-color {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.3),
        0 2px 8px rgba(0, 0, 0, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.4);
    position: relative;
}

.dragica-color::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.25) 0%, 
        rgba(255, 255, 255, 0.1) 50%,
        rgba(255, 255, 255, 0.05) 100%
    );
    border-radius: inherit;
    pointer-events: none;
}

.ben-color {
    background: linear-gradient(135deg, #4834d4 0%, #686de0 100%);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.3),
        0 2px 8px rgba(0, 0, 0, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.4);
}

.reds-color {
    background: linear-gradient(135deg, #c0392b 0%, #e74c3c 100%);
}

.digital-color {
    background: linear-gradient(135deg, #00cec9 0%, #00b894 100%);
}

.urban-color {
    background: linear-gradient(135deg, #2d3436 0%, #636e72 100%);
}

.austen-color {
    background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
}

/* Website Preview Section - NOW AT TOP with actual website screenshots */
.website-preview-section {
    position: relative;
    height: 200px;
    overflow: hidden;
    flex: 1 1 auto;
}

.site-preview-thumb {
    width: 100%;
    height: 100%;
    position: relative;
    cursor: pointer;
    transition: all 0.3s ease;
    background-size: cover;
    background-position: center;
}

/* Placeholder backgrounds - REPLACE WITH YOUR UPLOADED IMAGES */
.dragica-preview {
    background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url('<?php echo get_template_directory_uri(); ?>/images/dragica-screenshot.jpg');
    background-size: cover;
    background-position: center;
}

.ben-preview {
    background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url('path-to-your-ben-screenshot.jpg');
    background-size: cover;
    background-position: center;
}

.reds-preview {
    background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url('<?php echo get_template_directory_uri(); ?>/images/reds-plastering-large.png');
    background-size: cover;
    background-position: center;
}

/* Preview Overlay for hover effects and text */
.preview-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(
        45deg,
        rgba(0, 0, 0, 0.1) 0%,
        rgba(0, 0, 0, 0.2) 50%,
        rgba(0, 0, 0, 0.1) 100%
    );
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
}

.site-preview-thumb:hover .preview-overlay {
    background: linear-gradient(
        45deg,
        rgba(0, 0, 0, 0.2) 0%,
        rgba(0, 0, 0, 0.4) 50%,
        rgba(0, 0, 0, 0.2) 100%
    );
}

.website-title {
    color: #ffffff;
    margin: 0 0 12px 0;
    font-size: 1.4em;
    font-weight: 600;
    text-shadow: 
        0 4px 8px rgba(0, 0, 0, 0.6),
        0 2px 4px rgba(0, 0, 0, 0.4),
        0 1px 2px rgba(0, 0, 0, 0.8);
    position: relative;
    z-index: 2;
}

.website-description {
    color: #f8f8f8;
    margin: 0 0 15px 0;
    line-height: 1.6;
    font-size: 1.05em;
    text-shadow: 
        0 3px 6px rgba(0, 0, 0, 0.5),
        0 1px 3px rgba(0, 0, 0, 0.7);
    position: relative;
    z-index: 2;
}

.tech-stack {
    color: #f0f0f0;
    font-size: 1.0em;
    margin: 15px 0 20px 0;
    padding: 10px 0;
    border-top: 1px solid rgba(255, 255, 255, 0.3);
    text-shadow: 
        0 2px 4px rgba(0, 0, 0, 0.5),
        0 1px 2px rgba(0, 0, 0, 0.7);
    position: relative;
    z-index: 2;
}

/* Site Type Badge - Enhanced glassmorphism */
.site-type-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.8em;
    text-transform: uppercase;
    font-weight: 600;
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 
        0 4px 12px rgba(0, 0, 0, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.4);
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
    z-index: 3;
}

/* Preview text overlays - Enhanced shadows */
.site-title-overlay {
    color: white;
    font-size: 1.1em;
    font-weight: 600;
    text-shadow: 
        0 4px 8px rgba(0, 0, 0, 0.8),
        0 2px 4px rgba(0, 0, 0, 0.6),
        0 1px 2px rgba(0, 0, 0, 0.9);
    margin-bottom: 8px;
    position: relative;
    z-index: 2;
}

.preview-hint {
    color: rgba(255, 255, 255, 0.95);
    font-size: 0.9em;
    text-shadow: 
        0 3px 6px rgba(0, 0, 0, 0.7),
        0 1px 3px rgba(0, 0, 0, 0.8);
    position: relative;
    z-index: 2;
}

/* Website Links */
.website-links {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.website-link,
.external-link {
    color: white;
    text-decoration: none;
    padding: 12px 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 25px;
    transition: all 0.3s ease;
    font-size: 1.0em;
    background: none;
    cursor: pointer;
    font-family: inherit;
    font-weight: 500;
}

.preview-btn {
    background: rgba(103, 126, 234, 0.8);
    border-color: rgba(103, 126, 234, 1);
}

.preview-btn:hover {
    background: rgba(103, 126, 234, 1);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(103, 126, 234, 0.4);
}

.external-link:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.6);
    transform: translateY(-2px);
}

/* Portfolio Summary */
.portfolio-summary {
    text-align: center;
    margin: 60px auto 40px;
    max-width: 800px;
    padding: 40px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
}

.portfolio-summary h3 {
    color: white;
    font-size: 1.8em;
    margin: 0 0 20px 0;
    font-weight: 300;
}

.portfolio-summary p {
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.7;
    font-size: 1.1em;
    margin-bottom: 30px;
}

.skills-highlight {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    justify-content: center;
}

.skill-tag {
    background: rgba(103, 126, 234, 0.3);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9em;
    border: 1px solid rgba(103, 126, 234, 0.5);
    font-weight: 500;
}

/* Responsive Design */
/* Tablet: 2 columns */
@media (max-width: 899px) and (min-width: 600px) {
    .websites-showcase {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 20px;
        padding: 25px 20px;
        width: 95%;
    }
}

/* Mobile: 1 column */
@media (max-width: 599px) {
    .websites-showcase {
        grid-template-columns: 1fr !important;
        gap: 20px;
        margin: 30px 10px;
        padding: 25px 15px;
        width: 95%;
    }
}
    
    .website-info {
        padding: 20px;
    }
    
    .website-title {
        font-size: 1.2em;
    }
    
    .page-title {
        font-size: 2em;
    }
    
    .portfolio-summary {
        margin: 40px 20px;
        padding: 30px 20px;
    }
    
    .skills-highlight {
        gap: 8px;
    }
    
    .skill-tag {
        font-size: 0.8em;
        padding: 6px 12px;
    }
}

@media (max-width: 480px) {
    .website-links {
        flex-direction: column;
    }
    
    .website-link,
    .external-link {
        text-align: center;
        width: 100%;
    }
}

/* Modal Styles - Reusing existing system with enhancements */
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
</style>

<?php get_footer(); ?>