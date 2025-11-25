<?php
/**
 * Template Name: Theme Adjustments
 * 
 * Creative Control Center - Theme Customization & Settings
 * Features live preview controls for colors, animations, and layout
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
            <a href="<?php echo esc_url( home_url( '/adjustments' ) ); ?>">Adjustments</a>
        </div>
    </div>
</div>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        
        <!-- Theme Adjustments Content -->
        <div class="adjustments-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Beautiful Page Header -->
                    <div class="adjustments-header">
                        <div class="adjustments-title">
                            <h1>🎨 Theme Adjustments</h1>
                        </div>
                        <div class="adjustments-subtitle">
                            Live customization controls for your creative workspace
                        </div>
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
            <!-- Adjustments Section with Test Layout -->
            <div class="adjustments-section">
                <h2>🎛️ Creative Controls</h2>
                <p>Customize your site's appearance with live preview controls</p>
                
                <!-- Test Layout - 3 Cards with Perfect 40px Margins -->
                <div class="adjustments-gallery-grid">
                    
                    <!-- Card 1 - Page Color Picker -->
                    <div class="adjustments-card color-picker-card">
                        <!-- Card Preview Section -->
                        <div class="card-preview color-preview">
                            <div class="color-demo-area">
                                <div class="current-gradient"></div>
                                <div class="color-overlay">
                                    <span class="preview-label">🎨 Live Preview</span>
                                </div>
                            </div>
                        </div>
                        <!-- Text Info Section -->
                        <div class="card-info">
                            <h4 class="card-title">Background Colors</h4>
                            <p class="card-description">Customize your site's background gradient and color scheme with live preview.</p>
                            <div class="color-controls">
                                <label for="primary-color">Primary Color:</label>
                                <input type="color" id="primary-color" value="#f8f9fa" onchange="updateBackgroundColors()">
                                <label for="secondary-color">Secondary Color:</label>
                                <input type="color" id="secondary-color" value="#adb5bd" onchange="updateBackgroundColors()">
                            </div>
                            <div class="card-meta">
                                <span class="update-status">🎨 Live</span>
                                <span class="update-time">Color Picker</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 2 - Animation Controls -->
                    <div class="adjustments-card animation-card">
                        <!-- Card Preview Section -->
                        <div class="card-preview animation-preview">
                            <div class="stripe-demo-area">
                                <div class="demo-stripe"></div>
                                <div class="animation-overlay">
                                    <span class="preview-label">⚡ Animation Demo</span>
                                </div>
                            </div>
                        </div>
                        <!-- Text Info Section -->
                        <div class="card-info">
                            <h4 class="card-title">Tech Stripe Animation</h4>
                            <p class="card-description">Adjust the width, speed, and intensity of the animated tech stripes.</p>
                            <div class="animation-controls">
                                <label for="stripe-width">Stripe Width:</label>
                                <input type="range" id="stripe-width" min="1" max="5" value="2" onchange="updateStripeWidth(this.value)">
                                <span id="width-value">2px</span>
                                
                                <label for="stripe-speed">Animation Speed:</label>
                                <input type="range" id="stripe-speed" min="10" max="50" value="25" onchange="updateStripeSpeed(this.value)">
                                <span id="speed-value">25s</span>
                            </div>
                            <div class="card-meta">
                                <span class="update-status">⚡ Active</span>
                                <span class="update-time">Animation</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 3 - Layout Controls -->
                    <div class="adjustments-card layout-card">
                        <!-- Card Preview Section -->
                        <div class="card-preview layout-preview">
                            <div class="layout-demo-area">
                                <div class="demo-cards">
                                    <div class="mini-card"></div>
                                    <div class="mini-card"></div>
                                    <div class="mini-card"></div>
                                </div>
                                <div class="layout-overlay">
                                    <span class="preview-label">📐 Layout Demo</span>
                                </div>
                            </div>
                        </div>
                        <!-- Text Info Section -->
                        <div class="card-info">
                            <h4 class="card-title">Layout Controls</h4>
                            <p class="card-description">Adjust card spacing, margins, and responsive breakpoints for optimal display.</p>
                            <div class="layout-controls">
                                <label for="card-gap">Card Gap:</label>
                                <input type="range" id="card-gap" min="15" max="60" value="25" onchange="updateCardGap(this.value)">
                                <span id="gap-value">25px</span>
                                
                                <label for="container-margin">Screen Margin:</label>
                                <input type="range" id="container-margin" min="20" max="80" value="40" onchange="updateContainerMargin(this.value)">
                                <span id="margin-value">40px</span>
                            </div>
                            <div class="card-meta">
                                <span class="update-status">📐 Responsive</span>
                                <span class="update-time">Layout</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Control Panel -->
                <div class="control-panel">
                    <button class="control-btn save-btn" onclick="saveAdjustments()">
                        💾 Save Changes
                    </button>
                    <button class="control-btn reset-btn" onclick="resetToDefaults()">
                        🔄 Reset to Defaults
                    </button>
                    <button class="control-btn preview-btn" onclick="togglePreviewMode()">
                        👁️ Preview Mode
                    </button>
                </div>
                
            </div>
            
        </div>
        
    </main>
</div>

<script>
// Live Theme Adjustment Functions
function updateBackgroundColors() {
    const primary = document.getElementById('primary-color').value;
    const secondary = document.getElementById('secondary-color').value;
    
    // Update the current gradient preview
    const gradientDemo = document.querySelector('.current-gradient');
    gradientDemo.style.background = `linear-gradient(135deg, ${primary} 0%, ${secondary} 100%)`;
    
    // Apply to actual background (optional - for live preview)
    // document.querySelector('.future-tech-background').style.background = `linear-gradient(135deg, ${primary} 0%, ${secondary} 100%)`;
    
    console.log('Background colors updated:', primary, secondary);
}

function updateStripeWidth(value) {
    document.getElementById('width-value').textContent = value + 'px';
    
    // Update demo stripe
    const demoStripe = document.querySelector('.demo-stripe');
    demoStripe.style.height = value + 'px';
    
    // Apply to actual stripes (optional - for live preview)
    // const stripes = document.querySelectorAll('.tech-stripe');
    // stripes.forEach(stripe => stripe.style.height = value + 'px');
    
    console.log('Stripe width updated:', value + 'px');
}

function updateStripeSpeed(value) {
    document.getElementById('speed-value').textContent = value + 's';
    
    // Update demo stripe animation
    const demoStripe = document.querySelector('.demo-stripe');
    demoStripe.style.animationDuration = value + 's';
    
    console.log('Stripe speed updated:', value + 's');
}

function updateCardGap(value) {
    document.getElementById('gap-value').textContent = value + 'px';
    
    // Update demo cards
    const demoCards = document.querySelector('.demo-cards');
    demoCards.style.gap = value + 'px';
    
    // Apply to actual galleries (optional - for live preview)
    // const galleries = document.querySelectorAll('.dashboard-gallery-grid, .adjustments-gallery-grid');
    // galleries.forEach(gallery => gallery.style.gap = value + 'px');
    
    console.log('Card gap updated:', value + 'px');
}

function updateContainerMargin(value) {
    document.getElementById('margin-value').textContent = value + 'px';
    console.log('Container margin updated:', value + 'px');
}

function saveAdjustments() {
    // Here we would save the current settings to WordPress options
    alert('💾 Adjustments saved! (Feature to be implemented)');
    console.log('Saving adjustments...');
}

function resetToDefaults() {
    // Reset all controls to default values
    document.getElementById('primary-color').value = '#f8f9fa';
    document.getElementById('secondary-color').value = '#adb5bd';
    document.getElementById('stripe-width').value = '2';
    document.getElementById('stripe-speed').value = '25';
    document.getElementById('card-gap').value = '25';
    document.getElementById('container-margin').value = '40';
    
    // Update displays
    updateBackgroundColors();
    updateStripeWidth(2);
    updateStripeSpeed(25);
    updateCardGap(25);
    updateContainerMargin(40);
    
    alert('🔄 Reset to defaults!');
}

function togglePreviewMode() {
    // Toggle preview mode (hide/show controls)
    const controls = document.querySelectorAll('.color-controls, .animation-controls, .layout-controls');
    controls.forEach(control => {
        control.style.display = control.style.display === 'none' ? 'block' : 'none';
    });
    
    console.log('Preview mode toggled');
}

// Initialize on load
document.addEventListener('DOMContentLoaded', function() {
    updateBackgroundColors();
    updateStripeWidth(2);
    updateStripeSpeed(25);
    updateCardGap(25);
    updateContainerMargin(40);
});
</script>

<style>
/* Adjustments Page Specific Styles */
.adjustments-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    color: white;
}

.adjustments-header {
    text-align: center;
    margin-bottom: 40px;
    padding: 40px 20px;
}

.adjustments-title h1 {
    color: #ffffff;
    font-size: 3em;
    margin: 0 0 15px 0;
    font-weight: 600;
    text-shadow: 0 3px 10px rgba(0, 0, 0, 0.7);
}

.adjustments-subtitle {
    color: #f0f0f0;
    font-size: 1.4em;
    margin: 0;
    font-weight: 400;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.6);
}

/* TEST LAYOUT - Perfect 40px Margins */
.adjustments-section {
    background: rgba(255, 255, 255, 0.12);
    border-radius: 20px;
    padding: 40px;
    margin-bottom: 30px;
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
}

.adjustments-section h2 {
    color: #ffffff;
    font-size: 1.8em;
    margin: 0 0 10px 0;
    font-weight: 500;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
}

.adjustments-section p {
    color: #e8e8e8;
    font-size: 1.1em;
    margin-bottom: 30px;
    text-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

/* Test Grid Layout */
.adjustments-gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    margin-top: 30px;
    margin-bottom: 40px;
}

/* Test Cards */
.adjustments-card {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.adjustments-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    background: rgba(255, 255, 255, 0.2);
}

.card-preview {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.color-demo-area, .stripe-demo-area, .layout-demo-area {
    width: 100%;
    height: 100%;
    position: relative;
}

.current-gradient {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #f8f9fa 0%, #adb5bd 100%);
}

.demo-stripe {
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(45deg, 
        transparent 0%, 
        rgba(33, 150, 243, 0.6) 15%,
        rgba(76, 175, 80, 0.7) 25%,
        rgba(244, 67, 54, 0.6) 35%,
        rgba(255, 255, 255, 0.9) 50%,
        rgba(244, 67, 54, 0.6) 65%,
        rgba(76, 175, 80, 0.7) 75%,
        rgba(33, 150, 243, 0.6) 85%,
        transparent 100%
    );
    animation: demoStripeMove 25s linear infinite;
}

@keyframes demoStripeMove {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.demo-cards {
    display: flex;
    gap: 15px;
    padding: 20px;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.mini-card {
    width: 40px;
    height: 60px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    border: 1px solid rgba(255, 255, 255, 0.4);
}

.color-overlay, .animation-overlay, .layout-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.adjustments-card:hover .color-overlay,
.adjustments-card:hover .animation-overlay,
.adjustments-card:hover .layout-overlay {
    opacity: 1;
}

.preview-label {
    color: white;
    font-weight: 600;
    font-size: 1.1em;
}

/* Card Content */
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
    margin-top: 15px;
}

.update-status {
    color: #4ade80;
    font-weight: 500;
}

.update-time {
    color: #d1d5db;
}

/* Control Styles */
.color-controls, .animation-controls, .layout-controls {
    margin: 15px 0;
}

.color-controls label, .animation-controls label, .layout-controls label {
    display: block;
    color: #ffffff;
    font-size: 0.9em;
    margin: 10px 0 5px 0;
}

.color-controls input[type="color"], 
.animation-controls input[type="range"],
.layout-controls input[type="range"] {
    width: 100%;
    margin-bottom: 10px;
}

.color-controls input[type="color"] {
    height: 40px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    background: transparent;
}

/* Control Panel */
.control-panel {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 30px;
}

.control-btn {
    background: rgba(255, 255, 255, 0.9);
    border: none;
    padding: 12px 20px;
    border-radius: 25px;
    color: #333;
    font-size: 1em;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.control-btn:hover {
    background: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.save-btn:hover {
    background: #10b981;
    color: white;
}

.reset-btn:hover {
    background: #f59e0b;
    color: white;
}

.preview-btn:hover {
    background: #3b82f6;
    color: white;
}

/* LARGE DESKTOP TEST - Nuclear Option - Override Everything */
@media (min-width: 1250px) {
    /* Prevent any horizontal overflow first */
    html, body {
        overflow-x: hidden !important;
    }
    
    /* Force the page template to break free of constraints */
    body.page-template-page-adjustments .site-main,
    body.page-template-page-adjustments #main,
    body.page-template-page-adjustments #primary .site-main,
    body.page-template-page-adjustments .content-area .site-main {
        max-width: none !important;
        width: 100vw !important;
        margin: 0 !important;
        padding: 200px 40px 40px 40px !important; /* Top, Right, Bottom, Left */
        box-sizing: border-box !important;
        position: relative !important;
    }
    
    .adjustments-content {
        max-width: none !important;
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        box-sizing: border-box !important;
    }
    
    .adjustments-section {
        width: 100%;
        max-width: none;
        margin: 0;
        padding: 50px 40px; /* Add back the 40px horizontal padding for internal spacing */
        box-sizing: border-box;
    }
    
    .adjustments-gallery-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        width: 100%;
        box-sizing: border-box;
    }
    
    /* Debug borders - remove these once working */
    
    body.page-template-page-adjustments .site-main {
        border: 2px solid red !important;
    }
    .adjustments-section {
        border: 2px solid blue !important;
    }
    .adjustments-gallery-grid {
        border: 2px solid green !important;
    }
}

/* Responsive Design */
@media (max-width: 1024px) {
    .adjustments-gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .adjustments-content {
        padding: 10px;
    }
    
    .adjustments-section {
        padding: 25px 20px;
    }
    
    .adjustments-gallery-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .adjustments-title h1 {
        font-size: 2.2em;
    }
    
    .control-panel {
        flex-direction: column;
        align-items: center;
    }
    
    .control-btn {
        width: 100%;
        max-width: 250px;
        justify-content: center;
    }
}
</style>

<?php get_footer(); ?>