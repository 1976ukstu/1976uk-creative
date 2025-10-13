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
        
        <!-- Websites Gallery Content -->
        <div class="websites-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Page Header -->
                    <div class="page-header">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        <?php if (get_the_content()) : ?>
                            <div class="page-intro">
                                <?php the_content(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
            <!-- Interactive Website Gallery - 3x2 Grid -->
            <div class="websites-gallery">
                
                <!-- Row 1 -->
                <div class="website-card featured-site">
                    <div class="website-image">
                        <div class="site-preview-thumb dragica-thumb" onclick="openSitePreview('dragicacarlin', 'https://dragicacarlin.com', 'Professional Art Portfolio - Dragica Carlin')">
                            <div class="site-title-overlay">dragicacarlin.com</div>
                            <div class="preview-hint">🔍 Live Preview</div>
                        </div>
                        <div class="site-type-badge">WordPress</div>
                    </div>
                    <div class="website-info">
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
                    <div class="website-image">
                        <div class="site-preview-thumb ben-thumb" onclick="openSitePreview('benstockley', 'https://benstockley.com', 'Ben Stockley - Filmmaker Portfolio')">
                            <div class="site-title-overlay">benstockley.com</div>
                            <div class="preview-hint">🔍 Live Preview</div>
                        </div>
                        <div class="site-type-badge">Portfolio</div>
                    </div>
                    <div class="website-info">
                        <h3 class="website-title">Ben Stockley - Filmmaker</h3>
                        <p class="website-description">Dynamic filmmaker portfolio showcasing professional video work, commercial projects, and creative collaborations.</p>
                        <div class="tech-stack"><strong>Tech:</strong> WordPress, Custom Theme, Video Integration, Responsive Design</div>
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
                    <div class="website-image">
                        <div class="site-preview-thumb reds-thumb" onclick="openSitePreview('redsplastering', 'https://redsplastering.co.uk', 'Reds Plastering - Trade Services')">
                            <div class="site-title-overlay">redsplastering.co.uk</div>
                            <div class="preview-hint">🔍 Live Preview</div>
                        </div>
                        <div class="site-type-badge">Business</div>
                    </div>
                    <div class="website-info">
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
                    <div class="website-image">
                        <div class="site-preview-thumb digital-thumb" onclick="openSitePreview('digitald', 'https://digitald.website', 'Digital D - Creative Digital Solutions')">
                            <div class="site-title-overlay">digitald.website</div>
                            <div class="preview-hint">🔍 Live Preview</div>
                        </div>
                        <div class="site-type-badge">Digital</div>
                    </div>
                    <div class="website-info">
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
                    <div class="website-image">
                        <div class="site-preview-thumb urban-thumb" onclick="openSitePreview('oururban', 'https://oururban.1976uk.com', 'Our Urban - Community Platform')">
                            <div class="site-title-overlay">oururban.1976uk.com</div>
                            <div class="preview-hint">🔍 Live Preview</div>
                        </div>
                        <div class="site-type-badge">Community</div>
                    </div>
                    <div class="website-info">
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
                    <div class="website-image">
                        <div class="site-preview-thumb austen-thumb" onclick="openSitePreview('davidausten', 'https://davidaustenstudio.com', 'David Austen Studio - Artist Portfolio')">
                            <div class="site-title-overlay">davidaustenstudio.com</div>
                            <div class="preview-hint">🔍 Live Preview</div>
                        </div>
                        <div class="site-type-badge">Art Studio</div>
                    </div>
                    <div class="website-info">
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
            
            <!-- Portfolio Summary -->
            <div class="portfolio-summary">
                <h3>Web Development Portfolio</h3>
                <p>A showcase of professional website development projects spanning multiple industries - from artist portfolios and filmmaker showcases to business websites and community platforms. Each site features custom WordPress development, responsive design, and tailored functionality to meet specific client needs.</p>
                <div class="skills-highlight">
                    <span class="skill-tag">WordPress Development</span>
                    <span class="skill-tag">Custom Themes</span>
                    <span class="skill-tag">ACF Integration</span>
                    <span class="skill-tag">Responsive Design</span>
                    <span class="skill-tag">Performance Optimization</span>
                    <span class="skill-tag">SEO Implementation</span>
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
    
    // Show modal and loading
    modal.style.display = 'flex';
    loadingIndicator.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    
    // Load iframe with error handling
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
    document.body.style.overflow = 'auto';
}

function toggleMobileView() {
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

.page-header {
    text-align: center;
    margin-bottom: 50px;
}

.page-title {
    color: white;
    font-size: 2.5em;
    margin: 0 0 20px 0;
    font-weight: 300;
}

.page-intro {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.2em;
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto;
}

/* Enhanced 3x2 Grid Layout */
.websites-gallery {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin: 50px 0;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}

/* Enhanced Website Cards with Better Visibility */
.website-card {
    background: rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    overflow: hidden;
    border: 2px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease;
    backdrop-filter: blur(10px);
    position: relative;
}

.website-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
    border-color: rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.12);
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
}

/* Unique gradients for each site */
.dragica-thumb { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%); }
.ben-thumb { background: linear-gradient(135deg, #4834d4 0%, #686de0 100%); }
.reds-thumb { background: linear-gradient(135deg, #c0392b 0%, #e74c3c 100%); }
.digital-thumb { background: linear-gradient(135deg, #00cec9 0%, #00b894 100%); }
.urban-thumb { background: linear-gradient(135deg, #2d3436 0%, #636e72 100%); }
.austen-thumb { background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%); }

.site-title-overlay {
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

/* Website Info Section */
.website-info {
    padding: 25px;
}

.website-title {
    color: white;
    margin: 0 0 12px 0;
    font-size: 1.3em;
    font-weight: 600;
}

.website-description {
    color: rgba(255, 255, 255, 0.9);
    margin: 0 0 15px 0;
    line-height: 1.6;
    font-size: 0.95em;
}

.tech-stack {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9em;
    margin: 15px 0 20px 0;
    padding: 10px 0;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
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
    padding: 10px 18px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 25px;
    transition: all 0.3s ease;
    font-size: 0.9em;
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
@media (max-width: 1024px) {
    .websites-gallery {
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }
}

@media (max-width: 768px) {
    .websites-gallery {
        grid-template-columns: 1fr;
        gap: 20px;
        margin: 30px 20px;
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