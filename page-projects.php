<?php
/**
 * Template Name: Projects
 * 
 * Custom template for Projects page - showcase development work and creative projects
 * Uses standard WordPress content + ACF Free repeater fields
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
        
        <!-- Projects Page Content -->
        <div class="projects-content">
            
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
                    
                    <!-- Projects Grid -->
                    <?php if (have_rows('project_items')) : ?>
                        <div class="projects-grid">
                            <?php while (have_rows('project_items')) : the_row(); 
                                $image = get_sub_field('project_image');
                                $title = get_sub_field('project_title');
                                $description = get_sub_field('project_description');
                                $tech_stack = get_sub_field('tech_stack');
                                $project_link = get_sub_field('project_link');
                                $github_link = get_sub_field('github_link');
                                $project_type = get_sub_field('project_type'); // web, app, design, etc.
                            ?>
                                <div class="project-card <?php echo esc_attr($project_type); ?>-project">
                                    <?php if ($image) : ?>
                                        <div class="project-image">
                                            <img src="<?php echo esc_url($image['url']); ?>" 
                                                 alt="<?php echo esc_attr($image['alt']); ?>"
                                                 onclick="openLightbox('<?php echo esc_url($image['url']); ?>', '<?php echo esc_js($title); ?>', '<?php echo esc_js($description); ?>')">
                                            <?php if ($project_type) : ?>
                                                <div class="project-type-badge"><?php echo esc_html($project_type); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="project-info">
                                        <?php if ($title) : ?>
                                            <h3 class="project-title"><?php echo esc_html($title); ?></h3>
                                        <?php endif; ?>
                                        
                                        <?php if ($description) : ?>
                                            <p class="project-description"><?php echo esc_html($description); ?></p>
                                        <?php endif; ?>
                                        
                                        <?php if ($tech_stack) : ?>
                                            <div class="tech-stack">
                                                <strong>Tech:</strong> <?php echo esc_html($tech_stack); ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="project-links">
                                            <?php if ($project_link) : ?>
                                                <a href="<?php echo esc_url($project_link); ?>" class="project-link" target="_blank">
                                                    <span>🌐</span> View Live
                                                </a>
                                            <?php endif; ?>
                                            
                                            <?php if ($github_link) : ?>
                                                <a href="<?php echo esc_url($github_link); ?>" class="github-link" target="_blank">
                                                    <span>📂</span> View Code
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <div class="no-projects">
                            <p>Development projects coming soon! This is your experimental playground.</p>
                            <div class="placeholder-projects">
                                <div class="project-card web-project">
                                    <div class="project-image">
                                        <div class="placeholder-img clickable-preview" onclick="openSitePreview('dragicacarlin', 'https://dragicacarlin.com', 'Professional Art Portfolio')">
                                            🎨 Art Portfolio Site
                                        </div>
                                        <div class="project-type-badge">WordPress</div>
                                    </div>
                                    <div class="project-info">
                                        <h3 class="project-title">Professional Art Portfolio</h3>
                                        <p class="project-description">Complete art portfolio website with ACF Pro galleries, responsive design, and professional Git workflow.</p>
                                        <div class="tech-stack"><strong>Tech:</strong> WordPress, ACF Pro, CSS Grid, Git</div>
                                        <div class="project-links">
                                            <button class="project-link preview-btn" onclick="openSitePreview('dragicacarlin', 'https://dragicacarlin.com', 'Professional Art Portfolio')">
                                                🌐 Live Preview
                                            </button>
                                            <a href="https://dragicacarlin.com" class="external-link" target="_blank">
                                                🔗 Visit Site
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="project-card dashboard-project">
                                    <div class="project-image">
                                        <div class="placeholder-img clickable-preview" onclick="openDevelopmentPreview('dashboard', 'Content Management Dashboard')">
                                            🛠️ Content Dashboard
                                        </div>
                                        <div class="project-type-badge">Development</div>
                                    </div>
                                    <div class="project-info">
                                        <h3 class="project-title">Artist Management Dashboard</h3>
                                        <p class="project-description">Comprehensive content and portfolio management system for creative professionals.</p>
                                        <div class="tech-stack"><strong>Tech:</strong> PHP, WordPress API, Custom Development</div>
                                        <div class="project-links">
                                            <button class="project-link preview-btn" onclick="openDevelopmentPreview('dashboard', 'Content Management Dashboard')">
                                                🔍 View Concept
                                            </button>
                                            <span class="github-link development-status">🚧 In Development</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="project-card creative-project">
                                    <div class="project-image">
                                        <div class="placeholder-img clickable-preview" onclick="openLocalPreview('1976uk-creative', 'Experimental Creative Lab')">
                                            🌟 1976uk Creative
                                        </div>
                                        <div class="project-type-badge">Portfolio</div>
                                    </div>
                                    <div class="project-info">
                                        <h3 class="project-title">Personal Creative Lab</h3>
                                        <p class="project-description">Experimental development playground built on proven foundation with modern workflow.</p>
                                        <div class="tech-stack"><strong>Tech:</strong> WordPress, ACF Free, VS Code, Git</div>
                                        <div class="project-links">
                                            <button class="project-link preview-btn" onclick="openLocalPreview('1976uk-creative', 'Experimental Creative Lab')">
                                                🏠 Current Site
                                            </button>
                                            <span class="project-link active-status">🔄 Active Development</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
        </div>
        
    </main>
</div>

<!-- Site Preview Modal - 96% Viewport Coverage -->
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

<!-- Development Preview Modal -->
<div id="developmentPreviewModal" class="development-preview-modal" onclick="closeDevelopmentPreview()">
    <div class="dev-modal-content" onclick="event.stopPropagation()">
        <div class="dev-modal-header">
            <h3 id="devPreviewTitle">Development Concept</h3>
            <button class="control-btn close-btn" onclick="closeDevelopmentPreview()">
                <span>×</span>
            </button>
        </div>
        <div class="dev-preview-content">
            <div id="devPreviewContent" class="development-mockup">
                <!-- Dynamic content loaded here -->
            </div>
        </div>
    </div>
</div>

<script>
// Site Preview Functions
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
    
    // Load iframe
    iframe.onload = () => {
        loadingIndicator.style.display = 'none';
    };
    iframe.src = url;
}

function openLocalPreview(projectId, title) {
    // For local development, show current site
    const currentUrl = window.location.origin;
    openSitePreview(projectId, currentUrl, title);
}

function openDevelopmentPreview(projectId, title) {
    const modal = document.getElementById('developmentPreviewModal');
    const titleElement = document.getElementById('devPreviewTitle');
    const contentElement = document.getElementById('devPreviewContent');
    
    titleElement.textContent = title;
    
    // Load development mockup content
    if (projectId === 'dashboard') {
        contentElement.innerHTML = `
            <div class="mockup-container">
                <div class="mockup-header">
                    <h4>🛠️ Content Management Dashboard</h4>
                    <p class="mockup-subtitle">Comprehensive artist portfolio management system</p>
                </div>
                <div class="mockup-features">
                    <div class="feature-grid">
                        <div class="feature-card">
                            <h5>📊 Analytics Dashboard</h5>
                            <p>Real-time portfolio performance metrics and visitor insights</p>
                        </div>
                        <div class="feature-card">
                            <h5>🎨 Gallery Management</h5>
                            <p>Drag-and-drop gallery organization with metadata management</p>
                        </div>
                        <div class="feature-card">
                            <h5>📝 Content Editor</h5>
                            <p>Advanced content management with version control</p>
                        </div>
                        <div class="feature-card">
                            <h5>🔧 Site Settings</h5>
                            <p>Theme customization and configuration management</p>
                        </div>
                    </div>
                </div>
                <div class="mockup-timeline">
                    <h5>Development Timeline</h5>
                    <ul>
                        <li>✅ Requirements Analysis</li>
                        <li>✅ System Architecture Design</li>
                        <li>🔄 Backend API Development</li>
                        <li>⏳ Frontend Interface Design</li>
                        <li>⏳ Testing & Integration</li>
                    </ul>
                </div>
            </div>
        `;
    }
    
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeSitePreview() {
    const modal = document.getElementById('sitePreviewModal');
    const iframe = document.getElementById('sitePreviewFrame');
    
    modal.style.display = 'none';
    iframe.src = '';
    document.body.style.overflow = 'auto';
}

function closeDevelopmentPreview() {
    const modal = document.getElementById('developmentPreviewModal');
    modal.style.display = 'none';
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

// Close modals with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeSitePreview();
        closeDevelopmentPreview();
    }
});

// Legacy functions for compatibility
function openLightbox(imageSrc, title, description) {
    // Redirect to development preview for now
    openDevelopmentPreview('legacy', title || 'Project Preview');
}

function closeLightbox() {
    closeDevelopmentPreview();
}
</script>

<style>
/* Projects Page Specific Styles */
.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 30px;
}

.project-card {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.project-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

.project-image {
    position: relative;
    aspect-ratio: 16/9;
    overflow: hidden;
}

.project-image img,
.placeholder-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.placeholder-img {
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    font-size: 1.5em;
    font-weight: bold;
}

.clickable-preview {
    cursor: pointer;
    position: relative;
}

.clickable-preview::after {
    content: '🔍 Preview';
    position: absolute;
    bottom: 10px;
    right: 10px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.8em;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.clickable-preview:hover::after {
    opacity: 1;
}

.project-image:hover img,
.project-image:hover .placeholder-img {
    transform: scale(1.05);
}

.project-type-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.8em;
    text-transform: uppercase;
}

.project-info {
    padding: 20px;
}

.project-title {
    color: white;
    margin: 0 0 10px 0;
    font-size: 1.4em;
}

.project-description {
    color: rgba(255, 255, 255, 0.9);
    margin: 0 0 15px 0;
    line-height: 1.5;
}

.tech-stack {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9em;
    margin: 10px 0 15px 0;
}

.project-links {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.project-link,
.github-link,
.external-link {
    color: white;
    text-decoration: none;
    padding: 8px 15px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 20px;
    transition: all 0.3s ease;
    font-size: 0.9em;
    background: none;
    cursor: pointer;
    font-family: inherit;
}

.preview-btn {
    background: rgba(103, 126, 234, 0.8);
    border-color: rgba(103, 126, 234, 1);
}

.preview-btn:hover {
    background: rgba(103, 126, 234, 1);
    transform: translateY(-2px);
}

.project-link:hover,
.github-link:hover,
.external-link:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.6);
}

.development-status,
.active-status {
    background: rgba(255, 193, 7, 0.2);
    border-color: rgba(255, 193, 7, 0.8);
    color: #ffd700;
}

.placeholder-projects {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 20px;
}

.no-projects {
    text-align: center;
    color: rgba(255, 255, 255, 0.9);
    margin-top: 40px;
}

.no-projects p {
    font-size: 1.2em;
    margin-bottom: 30px;
}

/* ==========================================================================
   SITE PREVIEW MODAL STYLES - 96% VIEWPORT COVERAGE
   ========================================================================== */

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
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: scale(0.9) translateY(20px);
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
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.preview-info h3 {
    margin: 0;
    color: #333;
    font-size: 1.4em;
}

.preview-url {
    color: #666;
    font-size: 0.9em;
    margin-top: 5px;
    display: block;
}

.preview-controls {
    display: flex;
    gap: 10px;
}

.control-btn {
    background: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1.2em;
}

.control-btn:hover {
    background: rgba(0, 0, 0, 0.1);
    transform: scale(1.1);
}

.close-btn:hover {
    background: rgba(255, 82, 82, 0.8);
    color: white;
}

.preview-iframe-container {
    flex: 1;
    position: relative;
    background: #f5f5f5;
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
    width: 50px;
    height: 50px;
    border: 5px solid #f3f3f3;
    border-top: 5px solid #667eea;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loading-indicator p {
    margin-top: 20px;
    color: #666;
    font-size: 1.1em;
}

/* ==========================================================================
   DEVELOPMENT PREVIEW MODAL STYLES
   ========================================================================== */

.development-preview-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 10000;
    backdrop-filter: blur(10px);
}

.dev-modal-content {
    width: 90%;
    max-width: 800px;
    max-height: 90%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
    animation: modalSlideIn 0.3s ease-out;
}

.dev-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 25px 30px;
    background: rgba(0, 0, 0, 0.2);
}

.dev-modal-header h3 {
    margin: 0;
    color: white;
    font-size: 1.4em;
}

.dev-preview-content {
    flex: 1;
    padding: 30px;
    overflow-y: auto;
    color: white;
}

.mockup-container {
    max-width: 100%;
}

.mockup-header h4 {
    font-size: 1.6em;
    margin: 0 0 10px 0;
    color: white;
}

.mockup-subtitle {
    color: rgba(255, 255, 255, 0.9);
    margin: 0 0 30px 0;
    font-size: 1.1em;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.feature-card {
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.feature-card h5 {
    margin: 0 0 10px 0;
    color: white;
    font-size: 1.1em;
}

.feature-card p {
    margin: 0;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.5;
}

.mockup-timeline {
    margin-top: 30px;
    padding: 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
}

.mockup-timeline h5 {
    margin: 0 0 15px 0;
    color: white;
    font-size: 1.2em;
}

.mockup-timeline ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.mockup-timeline li {
    padding: 8px 0;
    color: rgba(255, 255, 255, 0.9);
    font-size: 1em;
}

/* Responsive Design */
@media (max-width: 768px) {
    .preview-modal-content {
        width: 98%;
        height: 98%;
    }
    
    .preview-modal-header {
        padding: 15px 20px;
    }
    
    .preview-info h3 {
        font-size: 1.2em;
    }
    
    .control-btn {
        width: 35px;
        height: 35px;
        font-size: 1em;
    }
    
    .dev-modal-content {
        width: 95%;
        max-height: 95%;
    }
    
    .dev-preview-content {
        padding: 20px;
    }
    
    .feature-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
}
</style>

<?php get_footer(); ?>