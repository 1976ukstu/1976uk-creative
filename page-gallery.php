<?php
/**
 * Template Name: Gallery
 * 
 * Interactive Gallery Showcase - Demonstrating Dashboard Management System
 * Features 6-card grid layout with modern styling
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
        
        <!-- Gallery Page Content -->
        <div class="gallery-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Page header removed for cleaner look -->
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
            <!-- Interactive Gallery Showcase - 3x2 Grid -->
            <div class="gallery-showcase">
                
                <!-- Row 1 -->
                <div class="gallery-card">
                    <div class="gallery-image">
                        <div class="gallery-preview-thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-01.png');">
                            <div class="gallery-title-overlay">Creative Project 1</div>
                            <div class="gallery-hint">🎨 Dashboard Managed</div>
                        </div>
                        <div class="gallery-type-badge">Showcase</div>
                    </div>
                    <div class="gallery-info">
                        <h3 class="gallery-title">Creative Project 1</h3>
                        <p class="gallery-description">This gallery item can be easily updated through the dashboard system. Artists can change images, titles, and descriptions without touching code.</p>
                        <div class="gallery-meta"><strong>Updated:</strong> Via Dashboard System</div>
                        <div class="gallery-actions">
                            <button class="gallery-btn view-btn" onclick="viewGalleryItem(1)">
                                🔍 View Details
                            </button>
                            <a href="<?php echo esc_url( home_url( '/dashboard' ) ); ?>" class="gallery-btn edit-btn">
                                ⚙️ Edit via Dashboard
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="gallery-card">
                    <div class="gallery-image">
                        <div class="gallery-preview-thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-02.png');">
                            <div class="gallery-title-overlay">Creative Project 2</div>
                            <div class="gallery-hint">🎨 Dashboard Managed</div>
                        </div>
                        <div class="gallery-type-badge">Showcase</div>
                    </div>
                    <div class="gallery-info">
                        <h3 class="gallery-title">Creative Project 2</h3>
                        <p class="gallery-description">Another example of dashboard-managed content. Perfect for artists who want full control over their gallery without WordPress complexity.</p>
                        <div class="gallery-meta"><strong>Updated:</strong> Via Dashboard System</div>
                        <div class="gallery-actions">
                            <button class="gallery-btn view-btn" onclick="viewGalleryItem(2)">
                                🔍 View Details
                            </button>
                            <a href="<?php echo esc_url( home_url( '/dashboard' ) ); ?>" class="gallery-btn edit-btn">
                                ⚙️ Edit via Dashboard
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="gallery-card">
                    <div class="gallery-image">
                        <div class="gallery-preview-thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-03.png');">
                            <div class="gallery-title-overlay">Creative Project 3</div>
                            <div class="gallery-hint">🎨 Dashboard Managed</div>
                        </div>
                        <div class="gallery-type-badge">Showcase</div>
                    </div>
                    <div class="gallery-info">
                        <h3 class="gallery-title">Creative Project 3</h3>
                        <p class="gallery-description">Demonstrating how easy it is to maintain a professional gallery. Upload, edit, and publish - all through a beautiful interface.</p>
                        <div class="gallery-meta"><strong>Updated:</strong> Via Dashboard System</div>
                        <div class="gallery-actions">
                            <button class="gallery-btn view-btn" onclick="viewGalleryItem(3)">
                                🔍 View Details
                            </button>
                            <a href="<?php echo esc_url( home_url( '/dashboard' ) ); ?>" class="gallery-btn edit-btn">
                                ⚙️ Edit via Dashboard
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Row 2 -->
                <div class="gallery-card">
                    <div class="gallery-image">
                        <div class="gallery-preview-thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-04.png');">
                            <div class="gallery-title-overlay">Creative Project 4</div>
                            <div class="gallery-hint">🎨 Dashboard Managed</div>
                        </div>
                        <div class="gallery-type-badge">Showcase</div>
                    </div>
                    <div class="gallery-info">
                        <h3 class="gallery-title">Creative Project 4</h3>
                        <p class="gallery-description">The dashboard system makes gallery management incredibly simple. No more WordPress admin confusion - just beautiful, intuitive controls.</p>
                        <div class="gallery-meta"><strong>Updated:</strong> Via Dashboard System</div>
                        <div class="gallery-actions">
                            <button class="gallery-btn view-btn" onclick="viewGalleryItem(4)">
                                🔍 View Details
                            </button>
                            <a href="<?php echo esc_url( home_url( '/dashboard' ) ); ?>" class="gallery-btn edit-btn">
                                ⚙️ Edit via Dashboard
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="gallery-card">
                    <div class="gallery-image">
                        <div class="gallery-preview-thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-05.png');">
                            <div class="gallery-title-overlay">Creative Project 5</div>
                            <div class="gallery-hint">🎨 Dashboard Managed</div>
                        </div>
                        <div class="gallery-type-badge">Showcase</div>
                    </div>
                    <div class="gallery-info">
                        <h3 class="gallery-title">Creative Project 5</h3>
                        <p class="gallery-description">Perfect for photographers and artists who need professional gallery management without technical complexity. Simple, powerful, beautiful.</p>
                        <div class="gallery-meta"><strong>Updated:</strong> Via Dashboard System</div>
                        <div class="gallery-actions">
                            <button class="gallery-btn view-btn" onclick="viewGalleryItem(5)">
                                🔍 View Details
                            </button>
                            <a href="<?php echo esc_url( home_url( '/dashboard' ) ); ?>" class="gallery-btn edit-btn">
                                ⚙️ Edit via Dashboard
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="gallery-card">
                    <div class="gallery-image">
                        <div class="gallery-preview-thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-06.png');">
                            <div class="gallery-title-overlay">Creative Project 6</div>
                            <div class="gallery-hint">🎨 Dashboard Managed</div>
                        </div>
                        <div class="gallery-type-badge">Showcase</div>
                    </div>
                    <div class="gallery-info">
                        <h3 class="gallery-title">Creative Project 6</h3>
                        <p class="gallery-description">The final showcase piece demonstrates the complete dashboard system. From upload to publish, everything just works beautifully.</p>
                        <div class="gallery-meta"><strong>Updated:</strong> Via Dashboard System</div>
                        <div class="gallery-actions">
                            <button class="gallery-btn view-btn" onclick="viewGalleryItem(6)">
                                🔍 View Details
                            </button>
                            <a href="<?php echo esc_url( home_url( '/dashboard' ) ); ?>" class="gallery-btn edit-btn">
                                ⚙️ Edit via Dashboard
                            </a>
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
                    <div class="demo-action">
                        <a href="<?php echo esc_url( home_url( '/dashboard' ) ); ?>" class="dashboard-access-btn">
                            <span class="btn-icon">⚙️</span>
                            <span class="btn-text">Access Dashboard Demo</span>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </main>
</div>

<style>
/* ==========================================================================
   GALLERY SHOWCASE STYLES - MATCHING WEBSITES PAGE AESTHETIC
   ========================================================================== */

.gallery-content {
    padding: 20px 0;
}

/* Page header styles removed */

/* Enhanced 3x2 Grid Layout */
.gallery-showcase {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin: 50px 0;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    /* Add deeper background for card depth */
    background: linear-gradient(135deg, 
        rgba(102, 126, 234, 0.08) 0%, 
        rgba(118, 75, 162, 0.08) 25%,
        rgba(255, 154, 158, 0.05) 50%,
        rgba(250, 208, 196, 0.05) 75%,
        rgba(102, 126, 234, 0.08) 100%
    );
    padding: 40px 30px;
    border-radius: 25px;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

/* Enhanced Gallery Cards */
.gallery-card {
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
}

.gallery-card:hover {
    transform: translateY(-8px);
    box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.25),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.22) 0%, 
        rgba(255, 255, 255, 0.12) 100%
    );
    border-color: rgba(255, 255, 255, 0.3);
}

.gallery-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.gallery-preview-thumb {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    position: relative;
    transition: transform 0.4s ease;
}

.gallery-card:hover .gallery-preview-thumb {
    transform: scale(1.05);
}

.gallery-title-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
    color: white;
    padding: 20px 15px 10px 15px;
    font-weight: 500;
    font-size: 1.1em;
}

.gallery-hint {
    position: absolute;
    top: 10px;
    left: 10px;
    background: rgba(102, 126, 234, 0.9);
    color: white;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 0.8em;
    font-weight: 600;
    backdrop-filter: blur(5px);
    transform: translateY(-30px);
    opacity: 0;
    transition: all 0.3s ease;
}

.gallery-card:hover .gallery-hint {
    transform: translateY(0);
    opacity: 1;
}

.gallery-type-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(255, 255, 255, 0.9);
    color: #333;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 0.8em;
    font-weight: 600;
}

.gallery-info {
    padding: 25px;
    color: white;
}

.gallery-title {
    font-size: 1.4em;
    margin: 0 0 15px 0;
    font-weight: 600;
    color: #ffffff;
}

.gallery-description {
    color: #f0f0f0;
    line-height: 1.6;
    margin-bottom: 15px;
    font-size: 0.95em;
}

.gallery-meta {
    color: #e0e0e0;
    font-size: 0.85em;
    margin-bottom: 20px;
    font-style: italic;
}

.gallery-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.gallery-btn {
    padding: 8px 16px;
    border: none;
    border-radius: 20px;
    font-size: 0.85em;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.view-btn {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.view-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
}

.edit-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.edit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

/* Dashboard Demo Section */
.dashboard-demo-section {
    margin: 80px 0 40px 0;
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto;
}

.demo-card {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.20) 0%, 
        rgba(255, 255, 255, 0.12) 100%
    );
    border-radius: 25px;
    padding: 40px;
    backdrop-filter: blur(25px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 
        0 12px 40px rgba(0, 0, 0, 0.15),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
    text-align: center;
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
}

.btn-icon {
    font-size: 1.2em;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .gallery-showcase {
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }
}

@media (max-width: 768px) {
    .gallery-showcase {
        grid-template-columns: 1fr;
        gap: 20px;
        margin: 30px 10px;
    }
    
    .gallery-card {
        margin: 0 10px;
    }
    
    .demo-card {
        padding: 30px 20px;
        margin: 0 10px;
    }
    
    .demo-features {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 2em;
    }
    
    .gallery-actions {
        flex-direction: column;
    }
    
    .gallery-btn {
        justify-content: center;
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
                    <a href="<?php echo esc_url( home_url( '/dashboard' ) ); ?>" class="gallery-btn edit-btn">⚙️ Try Dashboard</a>
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

<?php get_footer(); ?>