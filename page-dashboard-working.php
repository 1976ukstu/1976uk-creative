<?php
/**
 * Template Name: Dashboard v2 Working
 * 
 * Hybrid version - uses modular functions but with fallback content
 */

// Load dashboard configuration and functions
require_once get_template_directory() . '/dashboard-v2/assets/includes/dashboard-config.php';
require_once get_template_directory() . '/dashboard-v2/assets/includes/dashboard-functions.php';

// Initialize dashboard
$dashboard = new DashboardV2();

// Handle authentication
if (!$dashboard->is_authenticated()) {
    $dashboard->render_login_screen();
    return;
}

// Handle logout
if (isset($_GET['logout'])) {
    $dashboard->logout();
    wp_redirect(home_url('/gallery'));
    exit;
}

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

<div class="dashboard-v2-container">
    
    <!-- Site Title and Navigation (matching other pages) -->
    <div class="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: inherit; text-decoration: none;">
            <span class="main-title">1976uk</span>
            <span class="sub-title">Creative</span>
        </a>
    </div>

    <button class="universal-hamburger logout-hamburger" aria-label="Navigation menu" onclick="toggleDashboardMenu()">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <!-- Dashboard Navigation Modal -->
    <div id="dashboardMenuModal" class="dashboard-menu-modal" style="display: none;">
        <div class="dashboard-menu-content">
            <div class="dashboard-menu-header">
                <h3>Navigation</h3>
                <button class="dashboard-close-button" onclick="closeDashboardMenu()">×</button>
            </div>
            <div class="dashboard-menu-items">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">🏠 Home</a>
                <a href="<?php echo esc_url( home_url( '/websites' ) ); ?>">🌐 Websites</a>
                <a href="<?php echo esc_url( home_url( '/gallery' ) ); ?>">🎨 Gallery</a>
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">📧 Contact</a>
                <div class="menu-divider"></div>
                <button onclick="logout()" class="logout-menu-item">🔒 Logout</button>
            </div>
        </div>
    </div>
    
    <div class="dashboard-wrapper">
        
        <!-- Dashboard Header -->
        <header class="dashboard-header">
            <h1>🎨 Creative Dashboard v2.0</h1>
            <p class="dashboard-subtitle">Professional gallery management with modular architecture</p>
            <div class="dashboard-status">
                <span class="status-indicator"></span>
                <span class="status-text">System Ready</span>
                <span class="version-badge">v2.0.0</span>
            </div>
        </header>
        
        <!-- Gallery Section -->
        <section id="gallery-section" class="dashboard-section active">
            <h2>🎨 Gallery Management</h2>
            <p>Professional gallery management with drag & drop functionality</p>
            
            <div class="gallery-grid">
                <?php for ($i = 1; $i <= 6; $i++): 
                    $title = get_option("gallery_card_{$i}_title", "Creative Project {$i}");
                    $description = get_option("gallery_card_{$i}_description", "Dashboard-managed showcase piece demonstrating professional gallery management capabilities...");
                    $image = get_option("gallery_card_{$i}_image", get_template_directory_uri() . "/images/gallery/gallery-gimp-800x900-0{$i}.png");
                ?>
                    <div class="gallery-card" data-card-id="<?php echo $i; ?>">
                        <div class="card-preview">
                            <img src="<?php echo esc_url($image); ?>" alt="Gallery Item <?php echo $i; ?>" class="card-image">
                            <div class="card-overlay">
                                <button class="card-action-btn edit-btn" onclick="DashboardPro.editCard(<?php echo $i; ?>)">
                                    🎨 Edit Pro
                                </button>
                                <button class="card-action-btn preview-btn" onclick="DashboardPro.previewCard(<?php echo $i; ?>)">
                                    👁️ Preview Pro
                                </button>
                            </div>
                        </div>
                        <div class="card-info">
                            <h4 class="card-title"><?php echo esc_html($title); ?></h4>
                            <p class="card-description"><?php echo esc_html($description); ?></p>
                            <div class="card-meta">
                                <span class="update-status">✅ Published</span>
                                <span class="update-time">Ready for updates</span>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </section>
        
        <!-- Upload Section -->
        <section id="upload-section" class="dashboard-section">
            <h2>📁 Upload Files</h2>
            <p>Upload images directly to your WordPress Media Library</p>
            
            <div class="demo-notice">
                <div class="notice-icon">💡</div>
                <div class="notice-content">
                    <h4>Professional Upload System</h4>
                    <p>Files uploaded here integrate seamlessly with WordPress Media Library!</p>
                </div>
            </div>
            
            <div class="upload-zone" onclick="Dashboard.handleFileUpload()">
                <div class="upload-content">
                    <div class="upload-icon">📁</div>
                    <h3>Drag files here or click to browse</h3>
                    <p>Supported formats: JPG, PNG, GIF, WebP</p>
                    <button class="browse-btn">Browse Files</button>
                </div>
            </div>
        </section>
        
        <!-- Settings Section -->
        <section id="settings-section" class="dashboard-section">
            <h2>⚙️ Dashboard Settings</h2>
            <p>Configure your gallery preferences and dashboard behavior</p>
            
            <div class="settings-grid">
                <div class="setting-group">
                    <h4>🎨 Gallery Display</h4>
                    <select style="width: 100%; padding: 8px;">
                        <option>Modern Grid</option>
                        <option>Classic List</option>
                    </select>
                </div>
                <div class="setting-group">
                    <h4>🔒 Security</h4>
                    <label><input type="checkbox" checked> Secure authentication</label>
                </div>
            </div>
        </section>
        
    </div>
</div>

<!-- Advanced Pro Modals -->
<!-- Image Editor Pro Modal -->
<div id="imageEditorModal" class="pro-modal" style="display: none;">
    <div class="pro-modal-content">
        <div class="pro-modal-header">
            <h3>🎨 Professional Image Editor</h3>
            <button class="pro-close-btn" onclick="DashboardPro.closeEditor()">&times;</button>
        </div>
        <div class="pro-modal-body">
            <div class="editor-layout">
                <!-- Image Preview Section -->
                <div class="image-preview-section">
                    <div class="preview-container">
                        <img id="editingImage" src="" alt="Editing Image" class="preview-image">
                        <div class="preview-controls">
                            <button class="preview-toggle" onclick="DashboardPro.toggleBeforeAfter()">
                                <span id="toggleText">👁️ Show Original</span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Editing Controls Section -->
                <div class="editing-controls-section">
                    <h4>🔧 Image Adjustments</h4>
                    
                    <!-- Brightness Control -->
                    <div class="control-group">
                        <label for="brightnessSlider">☀️ Brightness</label>
                        <input type="range" id="brightnessSlider" min="-100" max="100" value="0" 
                               oninput="DashboardPro.updateFilter('brightness', this.value)">
                        <span id="brightnessValue">0</span>
                    </div>
                    
                    <!-- Contrast Control -->
                    <div class="control-group">
                        <label for="contrastSlider">🔳 Contrast</label>
                        <input type="range" id="contrastSlider" min="0" max="200" value="100" 
                               oninput="DashboardPro.updateFilter('contrast', this.value)">
                        <span id="contrastValue">100%</span>
                    </div>
                    
                    <!-- Saturation Control -->
                    <div class="control-group">
                        <label for="saturationSlider">🌈 Saturation</label>
                        <input type="range" id="saturationSlider" min="0" max="200" value="100" 
                               oninput="DashboardPro.updateFilter('saturation', this.value)">
                        <span id="saturationValue">100%</span>
                    </div>
                    
                    <!-- Hue Control -->
                    <div class="control-group">
                        <label for="hueSlider">🎨 Hue</label>
                        <input type="range" id="hueSlider" min="0" max="360" value="0" 
                               oninput="DashboardPro.updateFilter('hue', this.value)">
                        <span id="hueValue">0°</span>
                    </div>
                    
                    <!-- Blur Control -->
                    <div class="control-group">
                        <label for="blurSlider">🌫️ Blur</label>
                        <input type="range" id="blurSlider" min="0" max="10" value="0" step="0.1"
                               oninput="DashboardPro.updateFilter('blur', this.value)">
                        <span id="blurValue">0px</span>
                    </div>
                    
                    <!-- Quick Presets -->
                    <div class="preset-controls">
                        <h5>✨ Quick Presets</h5>
                        <button class="preset-btn" onclick="DashboardPro.applyPreset('vivid')">🔥 Vivid</button>
                        <button class="preset-btn" onclick="DashboardPro.applyPreset('vintage')">📸 Vintage</button>
                        <button class="preset-btn" onclick="DashboardPro.applyPreset('grayscale')">⚫ B&W</button>
                        <button class="preset-btn" onclick="DashboardPro.applyPreset('sepia')">🟤 Sepia</button>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="editor-actions">
                        <button class="reset-btn" onclick="DashboardPro.resetFilters()">🔄 Reset</button>
                        <button class="save-btn" onclick="DashboardPro.saveChanges()">💾 Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Preview Pro Modal -->
<div id="previewProModal" class="pro-modal" style="display: none;">
    <div class="pro-modal-content preview-modal">
        <div class="pro-modal-header">
            <h3>👁️ Professional Preview</h3>
            <button class="pro-close-btn" onclick="DashboardPro.closePreview()">&times;</button>
        </div>
        <div class="pro-modal-body">
            <div class="preview-layout">
                <div class="preview-image-container">
                    <img id="previewImage" src="" alt="Preview Image" class="full-preview-image">
                    <div class="preview-info-overlay">
                        <div class="preview-info">
                            <h4 id="previewTitle">Gallery Item</h4>
                            <p id="previewDescription">Description</p>
                            <div class="preview-meta">
                                <span id="previewStatus">✅ Published</span>
                                <span id="previewTime">Ready for display</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="preview-actions">
                    <button class="preview-action-btn" onclick="DashboardPro.editFromPreview()">
                        🎨 Edit This Image
                    </button>
                    <button class="preview-action-btn" onclick="DashboardPro.downloadImage()">
                        📥 Download
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Dashboard Pro - Advanced Image Editing System
const DashboardPro = {
    currentCard: null,
    originalImageSrc: '',
    currentFilters: {
        brightness: 0,
        contrast: 100,
        saturation: 100,
        hue: 0,
        blur: 0
    },
    
    // Open Image Editor
    editCard: function(cardId) {
        this.currentCard = cardId;
        const card = document.querySelector(`[data-card-id="${cardId}"]`);
        const img = card.querySelector('.card-image');
        this.originalImageSrc = img.src;
        
        // Set up editor
        document.getElementById('editingImage').src = img.src;
        document.getElementById('imageEditorModal').style.display = 'flex';
        
        // Reset filters
        this.resetFilters();
        
        console.log(`🎨 Opening Pro Editor for Card ${cardId}`);
    },
    
    // Open Advanced Preview
    previewCard: function(cardId) {
        const card = document.querySelector(`[data-card-id="${cardId}"]`);
        const img = card.querySelector('.card-image');
        const title = card.querySelector('.card-title').textContent;
        const description = card.querySelector('.card-description').textContent;
        
        // Set up preview
        document.getElementById('previewImage').src = img.src;
        document.getElementById('previewTitle').textContent = title;
        document.getElementById('previewDescription').textContent = description;
        document.getElementById('previewProModal').style.display = 'flex';
        
        console.log(`👁️ Opening Pro Preview for Card ${cardId}`);
    },
    
    // Update image filters in real-time
    updateFilter: function(filterType, value) {
        const img = document.getElementById('editingImage');
        this.currentFilters[filterType] = value;
        
        // Update display value
        const valueSpan = document.getElementById(`${filterType}Value`);
        switch(filterType) {
            case 'brightness':
                valueSpan.textContent = value;
                break;
            case 'contrast':
                valueSpan.textContent = value + '%';
                break;
            case 'saturation':
                valueSpan.textContent = value + '%';
                break;
            case 'hue':
                valueSpan.textContent = value + '°';
                break;
            case 'blur':
                valueSpan.textContent = value + 'px';
                break;
        }
        
        // Apply filters
        this.applyFilters();
    },
    
    // Apply all filters to image
    applyFilters: function() {
        const img = document.getElementById('editingImage');
        const filters = this.currentFilters;
        
        const filterString = `
            brightness(${1 + filters.brightness/100})
            contrast(${filters.contrast}%)
            saturate(${filters.saturation}%)
            hue-rotate(${filters.hue}deg)
            blur(${filters.blur}px)
        `;
        
        img.style.filter = filterString;
    },
    
    // Quick preset filters
    applyPreset: function(preset) {
        switch(preset) {
            case 'vivid':
                this.setFilters({brightness: 10, contrast: 120, saturation: 150, hue: 0, blur: 0});
                break;
            case 'vintage':
                this.setFilters({brightness: -10, contrast: 90, saturation: 80, hue: 20, blur: 0});
                break;
            case 'grayscale':
                this.setFilters({brightness: 0, contrast: 100, saturation: 0, hue: 0, blur: 0});
                break;
            case 'sepia':
                this.setFilters({brightness: 5, contrast: 95, saturation: 80, hue: 30, blur: 0});
                break;
        }
    },
    
    // Set multiple filters at once
    setFilters: function(filters) {
        Object.keys(filters).forEach(key => {
            this.currentFilters[key] = filters[key];
            document.getElementById(`${key}Slider`).value = filters[key];
            this.updateFilter(key, filters[key]);
        });
    },
    
    // Reset all filters
    resetFilters: function() {
        this.setFilters({brightness: 0, contrast: 100, saturation: 100, hue: 0, blur: 0});
    },
    
    // Toggle between original and edited
    toggleBeforeAfter: function() {
        const img = document.getElementById('editingImage');
        const toggleText = document.getElementById('toggleText');
        
        if (img.style.filter) {
            // Show original
            img.style.filter = 'none';
            toggleText.textContent = '🎨 Show Edited';
        } else {
            // Show edited
            this.applyFilters();
            toggleText.textContent = '👁️ Show Original';
        }
    },
    
    // Save changes (for now just shows confirmation)
    saveChanges: function() {
        // In a real implementation, this would save to server
        alert(`✅ Changes saved for Gallery Card ${this.currentCard}!\n\nFilters applied:\n` +
              `• Brightness: ${this.currentFilters.brightness}\n` +
              `• Contrast: ${this.currentFilters.contrast}%\n` +
              `• Saturation: ${this.currentFilters.saturation}%\n` +
              `• Hue: ${this.currentFilters.hue}°\n` +
              `• Blur: ${this.currentFilters.blur}px`);
        
        this.closeEditor();
    },
    
    // Edit from preview modal
    editFromPreview: function() {
        this.closePreview();
        this.editCard(this.currentCard || 1);
    },
    
    // Download image (placeholder)
    downloadImage: function() {
        alert('📥 Download functionality would be implemented here!');
    },
    
    // Close editor modal
    closeEditor: function() {
        document.getElementById('imageEditorModal').style.display = 'none';
        this.currentCard = null;
    },
    
    // Close preview modal
    closePreview: function() {
        document.getElementById('previewProModal').style.display = 'none';
    }
};

// Close modals when clicking outside
window.addEventListener('click', function(event) {
    const editorModal = document.getElementById('imageEditorModal');
    const previewModal = document.getElementById('previewProModal');
    
    if (event.target === editorModal) {
        DashboardPro.closeEditor();
    }
    if (event.target === previewModal) {
        DashboardPro.closePreview();
    }
});

// Keyboard shortcuts
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        DashboardPro.closeEditor();
        DashboardPro.closePreview();
    }
});

// Logout Function
function logout() {
    window.location.href = '<?php echo esc_url(add_query_arg('logout', '1', get_permalink())); ?>';
}

// Dashboard Navigation Functions
function toggleDashboardMenu() {
    const modal = document.getElementById('dashboardMenuModal');
    if (modal) {
        modal.style.display = modal.style.display === 'none' ? 'flex' : 'none';
    }
}

function closeDashboardMenu() {
    const modal = document.getElementById('dashboardMenuModal');
    if (modal) {
        modal.style.display = 'none';
    }
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modal = document.getElementById('dashboardMenuModal');
    const hamburger = document.querySelector('.logout-hamburger');
    
    if (modal && modal.style.display === 'flex') {
        if (!modal.querySelector('.dashboard-menu-content').contains(event.target) && 
            !hamburger.contains(event.target)) {
            closeDashboardMenu();
        }
    }
});

// Close modal with escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeDashboardMenu();
    }
});

console.log('🚀 Dashboard Pro v2.0 - Advanced Image Editing System Loaded!');
</script>

<style>
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
    opacity: 0.4;
}

.tech-stripe {
    position: absolute;
    background: linear-gradient(45deg, 
        transparent 0%, 
        rgba(255, 255, 255, 0.6) 30%, 
        rgba(66, 133, 244, 0.3) 45%,    /* Subtle blue flow */
        rgba(255, 255, 255, 0.8) 50%,   /* Bright center like light on glass */
        rgba(52, 168, 83, 0.3) 55%,     /* Gentle green flow */
        rgba(255, 255, 255, 0.6) 70%, 
        transparent 100%
    );
    height: 2px;
    width: 100%;
    animation: techStripeMove 20s linear infinite;
    box-shadow: 0 0 3px rgba(255, 255, 255, 0.5);
}

.tech-stripe.stripe-1 { top: 8%; animation-delay: 0s; }
.tech-stripe.stripe-2 { top: 22%; animation-delay: -5s; }
.tech-stripe.stripe-3 { top: 36%; animation-delay: -10s; }
.tech-stripe.stripe-4 { top: 52%; animation-delay: -15s; }
.tech-stripe.stripe-5 { top: 68%; animation-delay: -20s; }
.tech-stripe.stripe-6 { top: 84%; animation-delay: -3s; }

@keyframes techStripeMove {
    0% { transform: translateX(-100%) rotate(45deg) scaleY(1); opacity: 0; }
    10% { opacity: 0.4; }
    50% { opacity: 0.7; transform: translateX(0%) rotate(45deg) scaleY(1.3); }
    90% { opacity: 0.4; }
    100% { transform: translateX(100%) rotate(45deg) scaleY(1); opacity: 0; }
}

/* Enhanced Dashboard Container for Tech Aesthetic */
.dashboard-v2-container {
    min-height: 100vh;
    position: relative;
    z-index: 1;
}

/* CSS RESET for Dashboard - Prevent External Conflicts */
.dashboard-v2-container * {
    box-sizing: border-box;
}

/* Force 3-column layout regardless of external CSS */
.dashboard-v2-container .gallery-grid {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 25px !important;
    width: 100% !important;
    margin: 30px 0 0 0 !important;
    padding: 0 !important;
}

/* Site Title Styling - Positioned 18px from top */
.site-title {
    font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
    font-weight: 400;
    position: absolute;
    top: 18px; /* Exactly 18px from top as requested */
    left: 2%;
    background: linear-gradient(135deg, #ffffff 0%, #e8e8e8 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    padding: 0px 0px;
    border-radius: 8px;
    font-size: 75px;
    z-index: 10;
    letter-spacing: 1px;
    line-height: 0.8;
    text-align: left;
    transition: all 0.3s ease;
    cursor: pointer;
    filter: drop-shadow(0 4px 15px rgba(0, 0, 0, 0.4));
}

.site-title:hover {
    background: linear-gradient(135deg, #ffffff 0%, #d0d0d0 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    transform: translateY(-2px);
    filter: drop-shadow(0 6px 20px rgba(0, 0, 0, 0.5));
}

.site-title .main-title {
    font-size: 120px;
    font-weight: 800;
    line-height: 0.85;
    display: block;
    letter-spacing: -2px;
    text-align: left;
}

.site-title .sub-title {
    font-size: 60px !important;
    font-weight: 300 !important;
    line-height: 0.8 !important;
    display: block !important;
    visibility: visible !important;
    text-align: left !important;
    margin-top: -5px !important;
    letter-spacing: 3px !important;
    opacity: 0.95 !important;
    overflow: visible !important;
    height: auto !important;
    min-height: 48px !important;
    position: relative !important;
    z-index: 10 !important;
    color: #ffffff !important;
    background: linear-gradient(135deg, #ffffff 0%, #e8e8e8 100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    background-clip: text !important;
    -webkit-text-stroke: 0.5px rgba(255, 255, 255, 0.1);
}

/* Navigation Hamburger Styling - Better positioned */
.logout-hamburger {
    position: absolute;
    top: 15%; /* Moved down from 2% to give title space */
    right: 2%;
    width: 50px;
    height: 50px;
    background: rgba(0, 150, 255, 0.9); /* Blue for navigation */
    border: none;
    border-radius: 12px;
    cursor: pointer;
    z-index: 10;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 150, 255, 0.3);
}

.logout-hamburger:hover {
    background: rgba(0, 150, 255, 1);
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 6px 20px rgba(0, 150, 255, 0.4);
}

.logout-hamburger span {
    display: block;
    width: 25px;
    height: 3px;
    background: white;
    border-radius: 2px;
    transition: all 0.3s ease;
}

.logout-hamburger:hover span {
    background: #fff;
    box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
}

/* Dashboard Navigation Modal */
.dashboard-menu-modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(15px);
    z-index: 2000;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding-top: 100px;
}

.dashboard-menu-content {
    background: rgba(20, 20, 30, 0.95);
    border: 2px solid rgba(0, 150, 255, 0.3);
    border-radius: 20px;
    padding: 30px;
    min-width: 320px;
    backdrop-filter: blur(20px);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.dashboard-menu-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    border-bottom: 2px solid rgba(0, 150, 255, 0.3);
    padding-bottom: 15px;
}

.dashboard-menu-header h3 {
    margin: 0;
    color: #ffffff;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 1.4em;
}

.dashboard-close-button {
    background: none;
    border: none;
    color: #ffffff;
    font-size: 2em;
    cursor: pointer;
    line-height: 1;
    padding: 5px;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.dashboard-close-button:hover {
    background: rgba(255, 50, 50, 0.3);
    transform: scale(1.1);
}

.dashboard-menu-items {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.dashboard-menu-items a,
.logout-menu-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 18px 25px;
    color: #ffffff;
    text-decoration: none;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    font-family: 'Poppins', sans-serif;
    font-weight: 500;
    font-size: 1.1em;
    transition: all 0.3s ease;
    cursor: pointer;
}

.dashboard-menu-items a:hover,
.logout-menu-item:hover {
    background: rgba(0, 150, 255, 0.2);
    border-color: rgba(0, 150, 255, 0.5);
    transform: translateX(8px);
    box-shadow: 0 5px 15px rgba(0, 150, 255, 0.3);
}

.menu-divider {
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(0, 150, 255, 0.5), transparent);
    margin: 15px 0;
}

.logout-menu-item {
    background: rgba(255, 50, 50, 0.2);
    border-color: rgba(255, 50, 50, 0.4);
}

.logout-menu-item:hover {
    background: rgba(255, 50, 50, 0.4);
    border-color: rgba(255, 50, 50, 0.6);
    box-shadow: 0 5px 15px rgba(255, 50, 50, 0.3);
}

/* Dashboard Layout - Aligned with Gallery and Websites pages */
.dashboard-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 320px 20px 20px 20px; /* Double the top padding for more space */
    color: white;
}

.dashboard-header {
    text-align: center;
    margin-bottom: 40px;
    padding: 40px 20px;
}

.dashboard-header h1 {
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

/* Gallery Grid - 3 Cards Across (matching Gallery page) - FORCE OVERRIDE */
.gallery-grid {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 25px !important;
    margin-top: 30px !important;
    width: 100% !important;
}

/* Override any existing grid layouts */
.dashboard-gallery-grid,
.gallery-grid {
    grid-template-columns: repeat(3, 1fr) !important;
}

/* Gallery Cards - Professional Glassmorphism */
.gallery-card {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.gallery-card:hover {
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

.gallery-card:hover .card-image {
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

.gallery-card:hover .card-overlay {
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

/* Responsive Design - FORCE OVERRIDE */
@media (max-width: 1024px) {
    .gallery-grid,
    .dashboard-gallery-grid {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 20px !important;
    }
}

@media (max-width: 768px) {
    .dashboard-wrapper {
        padding: 100px 15px 20px 15px !important;
    }
    
    .dashboard-section {
        padding: 25px 20px !important;
    }
    
    .gallery-grid,
    .dashboard-gallery-grid {
        grid-template-columns: 1fr !important;
        gap: 20px !important;
    }
    
    .site-title .main-title {
        font-size: 70px !important;
    }
    
    .site-title .sub-title {
        font-size: 35px !important;
    }
}
/* ==========================================================================
   DASHBOARD PRO v2.0 - ADVANCED STYLING
   Professional image editing interface with glassmorphism design
   ========================================================================== */

/* Pro Modal Base Styles */
.pro-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10000;
    animation: modalFadeIn 0.3s ease-out;
}

@keyframes modalFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.pro-modal-content {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    width: 96vw; /* 96% of viewport width - matches website preview */
    height: 96vh; /* 96% of viewport height - matches website preview */
    max-width: none; /* Remove max-width constraint */
    display: flex;
    flex-direction: column;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.3);
    animation: modalSlideUp 0.4s ease-out;
}

@keyframes modalSlideUp {
    from { transform: translateY(50px) scale(0.95); opacity: 0; }
    to { transform: translateY(0) scale(1); opacity: 1; }
}

/* Modal Header */
.pro-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 25px 30px;
    border-bottom: 2px solid rgba(0, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.8);
    border-radius: 25px 25px 0 0;
}

.pro-modal-header h3 {
    margin: 0;
    color: #333;
    font-size: 1.8em;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
}

.pro-close-btn {
    background: none;
    border: none;
    font-size: 2em;
    color: #666;
    cursor: pointer;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.pro-close-btn:hover {
    background: rgba(255, 82, 82, 0.1);
    color: #ff5252;
    transform: scale(1.1);
}

/* Modal Body */
.pro-modal-body {
    flex: 1;
    padding: 30px;
    overflow-y: auto;
}

/* Image Editor Layout */
.editor-layout {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
    height: 100%;
}

/* Image Preview Section */
.image-preview-section {
    display: flex;
    flex-direction: column;
    background: rgba(248, 249, 250, 0.8);
    border-radius: 20px;
    padding: 25px;
    border: 2px solid rgba(0, 0, 0, 0.05);
}

.preview-container {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
}

.preview-image {
    max-width: 100%;
    max-height: 70%;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.preview-controls {
    margin-top: 20px;
}

.preview-toggle {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 25px;
    cursor: pointer;
    font-weight: 600;
    font-size: 1em;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.preview-toggle:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

/* Editing Controls Section */
.editing-controls-section {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    padding: 25px;
    border: 2px solid rgba(0, 0, 0, 0.05);
    backdrop-filter: blur(10px);
}

.editing-controls-section h4 {
    margin: 0 0 25px 0;
    color: #333;
    font-size: 1.4em;
    font-weight: 600;
    text-align: center;
}

/* Control Groups */
.control-group {
    margin-bottom: 25px;
}

.control-group label {
    display: block;
    margin-bottom: 10px;
    color: #555;
    font-weight: 600;
    font-size: 1.1em;
}

.control-group input[type="range"] {
    width: 100%;
    height: 8px;
    background: linear-gradient(to right, #ddd, #667eea);
    border-radius: 5px;
    outline: none;
    margin-bottom: 8px;
    cursor: pointer;
}

.control-group input[type="range"]::-webkit-slider-thumb {
    appearance: none;
    width: 20px;
    height: 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0 3px 10px rgba(102, 126, 234, 0.3);
    transition: all 0.3s ease;
}

.control-group input[type="range"]::-webkit-slider-thumb:hover {
    transform: scale(1.2);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.5);
}

.control-group span {
    color: #667eea;
    font-weight: 700;
    font-size: 1.1em;
    text-align: center;
    display: block;
}

/* Preset Controls */
.preset-controls {
    margin: 30px 0;
    text-align: center;
}

.preset-controls h5 {
    margin-bottom: 15px;
    color: #333;
    font-size: 1.2em;
}

.preset-btn {
    background: rgba(102, 126, 234, 0.1);
    border: 2px solid rgba(102, 126, 234, 0.3);
    color: #667eea;
    padding: 8px 15px;
    margin: 5px;
    border-radius: 20px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
}

.preset-btn:hover {
    background: rgba(102, 126, 234, 0.2);
    border-color: rgba(102, 126, 234, 0.5);
    transform: translateY(-2px);
}

/* Editor Actions */
.editor-actions {
    display: flex;
    gap: 15px;
    margin-top: 30px;
}

.reset-btn, .save-btn {
    flex: 1;
    padding: 15px;
    border: none;
    border-radius: 15px;
    font-weight: 600;
    font-size: 1.1em;
    cursor: pointer;
    transition: all 0.3s ease;
}

.reset-btn {
    background: rgba(255, 152, 0, 0.1);
    color: #ff9800;
    border: 2px solid rgba(255, 152, 0, 0.3);
}

.reset-btn:hover {
    background: rgba(255, 152, 0, 0.2);
    transform: translateY(-2px);
}

.save-btn {
    background: linear-gradient(135deg, #4caf50 0%, #45a049 100%);
    color: white;
    box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
}

.save-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.4);
}

/* Preview Modal Specific Styles - 96% viewport sizing */
.preview-modal .pro-modal-content {
    width: 96vw; /* 96% of viewport width */
    height: 96vh; /* 96% of viewport height */
    max-width: none; /* Remove max-width constraint */
}

.preview-layout {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.preview-image-container {
    flex: 1;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(248, 249, 250, 0.5);
    border-radius: 15px;
    overflow: hidden;
}

.full-preview-image {
    max-width: 100%;
    max-height: 100%;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.preview-info-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
    color: white;
    padding: 30px;
    backdrop-filter: blur(10px);
}

.preview-info h4 {
    margin: 0 0 10px 0;
    font-size: 1.8em;
    font-weight: 600;
}

.preview-info p {
    margin: 0 0 15px 0;
    opacity: 0.9;
    line-height: 1.5;
}

.preview-meta {
    display: flex;
    gap: 20px;
    font-size: 0.9em;
}

.preview-actions {
    display: flex;
    gap: 15px;
    margin-top: 25px;
    justify-content: center;
}

.preview-action-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 25px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.preview-action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .editor-layout {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .pro-modal-content {
        width: 98%;
        height: 95%;
    }
}

@media (max-width: 768px) {
    .pro-modal-header {
        padding: 20px;
    }
    
    .pro-modal-body {
        padding: 20px;
    }
    
    .editor-actions {
        flex-direction: column;
    }
    
    .preview-info-overlay {
        padding: 20px;
    }
    
    .preview-actions {
        flex-direction: column;
    }
}
</style>

<?php
// Self-contained Dashboard Pro v2.0 - No external CSS/JS conflicts
// $dashboard->enqueue_styles(); // Removed to prevent conflicts
// $dashboard->enqueue_scripts(); // Removed to prevent conflicts

get_footer();
?>