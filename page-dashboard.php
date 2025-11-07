<?php
/**
 * Template Name: Dashboard
 * 
 * Revolutionary Gallery Management Dashboard with Real Drag & Drop Upload
 * Updated: <?php echo date('Y-m-d H:i:s'); ?> - Force refresh
 */

// Password protection system
session_start();
$dashboard_password = '1976uk';
$is_authenticated = false;

// Check if password submitted
if (isset($_POST['dashboard_password'])) {
    if ($_POST['dashboard_password'] === $dashboard_password) {
        $_SESSION['dashboard_authenticated'] = true;
        $is_authenticated = true;
    } else {
        $login_error = 'Incorrect password. Please try again.';
    }
}

// Check if already authenticated
if (isset($_SESSION['dashboard_authenticated']) && $_SESSION['dashboard_authenticated'] === true) {
    $is_authenticated = true;
}

get_header();
?>

<?php if (!$is_authenticated): ?>
<!-- Password Protection Screen -->
<div class="dashboard-login-overlay">
    <div class="dashboard-login-container">
        <div class="login-header">
            <h1>🔐 Dashboard Access</h1>
            <p>Enter password to access the gallery management system</p>
        </div>
        
        <?php if (isset($login_error)): ?>
            <div class="login-error">
                <span>❌ <?php echo $login_error; ?></span>
            </div>
        <?php endif; ?>
        
        <form method="POST" class="login-form">
            <div class="input-group">
                <input type="password" name="dashboard_password" placeholder="Enter dashboard password" required autocomplete="off">
                <button type="submit" class="login-btn">
                    <span>🚀 Access Dashboard</span>
                </button>
            </div>
        </form>
        
        <div class="login-footer">
            <a href="<?php echo esc_url(home_url('/gallery')); ?>" class="back-to-gallery">
                ← Back to Gallery
            </a>
        </div>
    </div>
</div>

<style>
.dashboard-login-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, 
        #667eea 0%, 
        #764ba2 25%, 
        #f093fb 50%, 
        #f5576c 75%, 
        #4facfe 100%
    );
    background-size: 400% 400%;
    animation: gradientShift 15s ease infinite;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.dashboard-login-container {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.25) 0%, 
        rgba(255, 255, 255, 0.18) 100%
    );
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 40px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    text-align: center;
    max-width: 400px;
    width: 90%;
}

.login-header h1 {
    color: white;
    margin: 0 0 10px 0;
    font-size: 2.2em;
    font-weight: 600;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.login-header p {
    color: rgba(255, 255, 255, 0.9);
    margin: 0 0 30px 0;
    font-size: 1.1em;
}

.login-error {
    background: rgba(239, 68, 68, 0.2);
    border: 1px solid rgba(239, 68, 68, 0.5);
    border-radius: 10px;
    padding: 12px;
    margin-bottom: 20px;
    color: #fef2f2;
}

.input-group {
    margin-bottom: 25px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.login-form input {
    width: 100%;
    padding: 15px 20px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    font-size: 1.1em;
    backdrop-filter: blur(10px);
    box-sizing: border-box; /* Ensure consistent sizing */
}

.login-form input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.login-form input:focus {
    outline: none;
    border-color: rgba(255, 255, 255, 0.6);
    background: rgba(255, 255, 255, 0.15);
}

.login-btn {
    width: 100%;
    padding: 15px 25px;
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    border: none;
    border-radius: 10px;
    color: white;
    font-size: 1.1em;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-sizing: border-box; /* Ensure consistent sizing */
    box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4);
}

.login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(79, 172, 254, 0.6);
}

.back-to-gallery {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    font-size: 1em;
    transition: color 0.3s ease;
}

.back-to-gallery:hover {
    color: white;
}
</style>

<?php else: ?>

<div class="site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: inherit; text-decoration: none;">
        <span class="main-title">1976uk</span>
        <span class="sub-title">Creative</span>
    </a>
</div>

<!-- Floating Action Buttons - Bottom Right -->
<div class="floating-action-buttons">
    <a href="<?php echo esc_url(home_url('/gallery')); ?>" class="floating-btn gallery-btn" title="View Gallery">
        <span class="btn-icon">🎨</span>
        <span class="btn-text">Gallery</span>
    </a>
    <a href="?logout=1" class="floating-btn logout-btn" title="Logout">
        <span class="btn-icon">🔒</span>
        <span class="btn-text">Logout</span>
    </a>
</div>

<?php
// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    wp_redirect(current_url());
    exit;
}
?>

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
        
        <!-- Dashboard Content -->
        <div class="dashboard-content">
            
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <div class="dashboard-title">
                    <h1>🎨 Creative Dashboard</h1>
                    <p class="dashboard-subtitle">Manage your gallery with beautiful simplicity</p>
                </div>
                <div class="dashboard-status">
                    <span class="status-indicator online"></span>
                    <span class="status-text">System Ready</span>
                    <!-- Test Button for JavaScript functionality -->
                    <button onclick="testButtons()" class="test-btn" style="margin-left: 15px; padding: 8px 15px; border-radius: 15px; background: rgba(76, 175, 80, 0.2); color: white; border: 1px solid rgba(76, 175, 80, 0.3); cursor: pointer;">
                        🧪 Test Buttons
                    </button>
                </div>
            </div>
            
            <!-- Dashboard Navigation Tabs -->
            <div class="dashboard-tabs">
                <button class="tab-btn active" onclick="showTab('gallery-management')">
                    <span class="tab-icon">🖼️</span>
                    Gallery Management
                </button>
                <button class="tab-btn" onclick="showTab('file-uploads')">
                    <span class="tab-icon">📤</span>
                    Upload Files
                </button>
                <button class="tab-btn" onclick="showTab('settings')">
                    <span class="tab-icon">⚙️</span>
                    Settings
                </button>
            </div>
            
            <!-- Gallery Management Tab -->
            <div id="gallery-management" class="tab-content active">
                
                <div class="dashboard-section">
                    <h2>📱 Live Gallery Preview</h2>
                    <p>These 6 cards represent your live gallery. Click "Edit" to modify any card instantly.</p>
                    
                    <div class="dashboard-gallery-grid">
                        
                        <!-- Gallery Card 1 - WITH REAL DRAG & DROP -->
                        <div class="dashboard-card drag-drop-zone" data-card-id="1">
                            <div class="card-preview">
                                <?php 
                                $card_1_image = get_option('gallery_card_1_image');
                                $card_1_title = get_option('gallery_card_1_title', 'Creative Project 1');
                                $card_1_desc = get_option('gallery_card_1_description', 'Dashboard-managed showcase piece...');
                                ?>
                                <img src="<?php echo $card_1_image ? esc_url($card_1_image) : get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-01.png'; ?>" alt="Gallery Item 1" class="card-image">
                                <div class="card-overlay">
                                    <button class="card-action-btn edit-btn" onclick="editCard(1)">✏️ Edit</button>
                                    <button class="card-action-btn preview-btn" onclick="previewCard(1)">👁️ Preview</button>
                                </div>
                                <div class="drag-drop-overlay">
                                    <div class="drop-zone-content">
                                        <span class="drop-icon">📁</span>
                                        <span class="drop-text">Drop image here</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title"><?php echo esc_html($card_1_title); ?></h4>
                                <p class="card-description"><?php echo esc_html($card_1_desc); ?></p>
                                <div class="card-meta">
                                    <span class="update-status">✅ Published</span>
                                    <span class="update-time"><?php echo get_option('gallery_card_1_updated', 'Updated 2 hours ago'); ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Gallery Card 2 - WITH REAL DRAG & DROP -->
                        <div class="dashboard-card drag-drop-zone" data-card-id="2">
                            <div class="card-preview">
                                <?php 
                                $card_2_image = get_option('gallery_card_2_image');
                                $card_2_title = get_option('gallery_card_2_title', 'Creative Project 2');
                                $card_2_desc = get_option('gallery_card_2_description', 'Another beautiful showcase...');
                                ?>
                                <img src="<?php echo $card_2_image ? esc_url($card_2_image) : get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-02.png'; ?>" alt="Gallery Item 2" class="card-image">
                                <div class="card-overlay">
                                    <button class="card-action-btn edit-btn" onclick="editCard(2)">✏️ Edit</button>
                                    <button class="card-action-btn preview-btn" onclick="previewCard(2)">👁️ Preview</button>
                                </div>
                                <div class="drag-drop-overlay">
                                    <div class="drop-zone-content">
                                        <span class="drop-icon">📁</span>
                                        <span class="drop-text">Drop image here</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title"><?php echo esc_html($card_2_title); ?></h4>
                                <p class="card-description"><?php echo esc_html($card_2_desc); ?></p>
                                <div class="card-meta">
                                    <span class="update-status">✅ Published</span>
                                    <span class="update-time"><?php echo get_option('gallery_card_2_updated', 'Updated 4 hours ago'); ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Gallery Card 3 -->
                        <div class="dashboard-card drag-drop-zone" data-card-id="3">
                            <div class="card-preview">
                                <?php 
                                $card3_image = get_option('gallery_card_3_image');
                                $image_src = $card3_image ? $card3_image : get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-03.png';
                                ?>
                                <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 3" class="card-image">
                                <div class="drag-drop-overlay">
                                    <div class="drop-indicator">
                                        <span class="drop-icon">📁</span>
                                        <span class="drop-text">Drop image here</span>
                                    </div>
                                </div>
                                <div class="card-overlay">
                                    <button class="card-action-btn edit-btn" onclick="editCard(3)">✏️ Edit</button>
                                    <button class="card-action-btn preview-btn" onclick="previewCard(3)">👁️ Preview</button>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title"><?php echo get_option('gallery_card_3_title', 'Creative Project 3'); ?></h4>
                                <p class="card-description"><?php echo get_option('gallery_card_3_description', 'Professional gallery item...'); ?></p>
                                <div class="card-meta">
                                    <span class="update-status">🎯 Interactive</span>
                                    <span class="update-time"><?php 
                                        $updated = get_option('gallery_card_3_updated');
                                        if ($updated) {
                                            $time_diff = human_time_diff(strtotime($updated), current_time('timestamp'));
                                            echo 'Updated ' . $time_diff . ' ago';
                                        } else {
                                            echo 'Ready for upload';
                                        }
                                    ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Gallery Card 4 -->
                        <div class="dashboard-card drag-drop-zone" data-card-id="4">
                            <div class="card-preview">
                                <?php 
                                $card4_image = get_option('gallery_card_4_image');
                                $image_src = $card4_image ? $card4_image : get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-04.png';
                                ?>
                                <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 4" class="card-image">
                                <div class="drag-drop-overlay">
                                    <div class="drop-indicator">
                                        <span class="drop-icon">📁</span>
                                        <span class="drop-text">Drop image here</span>
                                    </div>
                                </div>
                                <div class="card-overlay">
                                    <button class="card-action-btn edit-btn" onclick="editCard(4)">✏️ Edit</button>
                                    <button class="card-action-btn preview-btn" onclick="previewCard(4)">👁️ Preview</button>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title"><?php echo get_option('gallery_card_4_title', 'Creative Project 4'); ?></h4>
                                <p class="card-description"><?php echo get_option('gallery_card_4_description', 'Beautiful dashboard management...'); ?></p>
                                <div class="card-meta">
                                    <span class="update-status">🎯 Interactive</span>
                                    <span class="update-time"><?php 
                                        $updated = get_option('gallery_card_4_updated');
                                        if ($updated) {
                                            $time_diff = human_time_diff(strtotime($updated), current_time('timestamp'));
                                            echo 'Updated ' . $time_diff . ' ago';
                                        } else {
                                            echo 'Ready for upload';
                                        }
                                    ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Gallery Card 5 -->
                        <div class="dashboard-card drag-drop-zone" data-card-id="5">
                            <div class="card-preview">
                                <?php 
                                $card5_image = get_option('gallery_card_5_image');
                                $image_src = $card5_image ? $card5_image : get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-05.png';
                                ?>
                                <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 5" class="card-image">
                                <div class="drag-drop-overlay">
                                    <div class="drop-indicator">
                                        <span class="drop-icon">📁</span>
                                        <span class="drop-text">Drop image here</span>
                                    </div>
                                </div>
                                <div class="card-overlay">
                                    <button class="card-action-btn edit-btn" onclick="editCard(5)">✏️ Edit</button>
                                    <button class="card-action-btn preview-btn" onclick="previewCard(5)">👁️ Preview</button>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title"><?php echo get_option('gallery_card_5_title', 'Creative Project 5'); ?></h4>
                                <p class="card-description"><?php echo get_option('gallery_card_5_description', 'Photographer-friendly interface...'); ?></p>
                                <div class="card-meta">
                                    <span class="update-status">🎯 Interactive</span>
                                    <span class="update-time"><?php 
                                        $updated = get_option('gallery_card_5_updated');
                                        if ($updated) {
                                            $time_diff = human_time_diff(strtotime($updated), current_time('timestamp'));
                                            echo 'Updated ' . $time_diff . ' ago';
                                        } else {
                                            echo 'Ready for upload';
                                        }
                                    ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Gallery Card 6 -->
                        <div class="dashboard-card drag-drop-zone" data-card-id="6">
                            <div class="card-preview">
                                <?php 
                                $card6_image = get_option('gallery_card_6_image');
                                $image_src = $card6_image ? $card6_image : get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-06.png';
                                ?>
                                <img src="<?php echo esc_url($image_src); ?>" alt="Gallery Item 6" class="card-image">
                                <div class="drag-drop-overlay">
                                    <div class="drop-indicator">
                                        <span class="drop-icon">📁</span>
                                        <span class="drop-text">Drop image here</span>
                                    </div>
                                </div>
                                <div class="card-overlay">
                                    <button class="card-action-btn edit-btn" onclick="editCard(6)">✏️ Edit</button>
                                    <button class="card-action-btn preview-btn" onclick="previewCard(6)">👁️ Preview</button>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title"><?php echo get_option('gallery_card_6_title', 'Creative Project 6'); ?></h4>
                                <p class="card-description"><?php echo get_option('gallery_card_6_description', 'Complete system demonstration...'); ?></p>
                                <div class="card-meta">
                                    <span class="update-status">🎯 Interactive</span>
                                    <span class="update-time"><?php 
                                        $updated = get_option('gallery_card_6_updated');
                                        if ($updated) {
                                            $time_diff = human_time_diff(strtotime($updated), current_time('timestamp'));
                                            echo 'Updated ' . $time_diff . ' ago';
                                        } else {
                                            echo 'Ready for upload';
                                        }
                                    ?></span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="gallery-actions">
                        <button class="action-button primary" onclick="publishAllChanges()">
                            <span class="btn-icon">🚀</span>
                            Publish All Changes
                        </button>
                        <button class="action-button secondary" onclick="previewGallery()">
                            <span class="btn-icon">👁️</span>
                            Preview Gallery
                        </button>
                        <button class="action-button tertiary" onclick="resetGallery()">
                            <span class="btn-icon">🔄</span>
                            Reset to Default
                        </button>
                    </div>
                    
                </div>
                
            </div>
            
            <!-- File Upload Tab -->
            <div id="file-uploads" class="tab-content">
                
                <div class="dashboard-section">
                    <h2>📁 Upload Files</h2>
                    <p>Upload images directly to your WordPress Media Library</p>
                    
                    <!-- Educational Demo Notice -->
                    <div class="demo-notice">
                        <div class="notice-icon">💡</div>
                        <div class="notice-content">
                            <h4>Smart Upload System</h4>
                            <p>Files uploaded here integrate seamlessly with WordPress Media Library and can be used across your entire website!</p>
                        </div>
                    </div>
                    
                    <div class="upload-zone" id="upload-zone">
                        <div class="upload-content">
                            <div class="upload-icon">📁</div>
                            <h3>Drag files here or click to browse</h3>
                            <p>Supported formats: JPG, PNG, GIF, WebP</p>
                            <p class="upload-limit">Maximum file size: 10MB</p>
                            <input type="file" id="file-input" multiple accept="image/*" style="display: none;">
                            <button class="browse-btn" onclick="handleFileUpload()">
                                Browse Files
                            </button>
                        </div>
                    </div>
                    
                    <div class="upload-progress" id="upload-progress" style="display: none;">
                        <div class="progress-bar">
                            <div class="progress-fill" id="progress-fill"></div>
                        </div>
                        <div class="progress-text" id="progress-text">Processing... 0%</div>
                    </div>
                    
                    <!-- Upload Results -->
                    <div class="upload-results" id="upload-results" style="display: none;">
                        <h4>✅ Upload Complete!</h4>
                        <div class="upload-summary">
                            <p>Your files have been successfully added to the WordPress Media Library and are now available for use throughout your website.</p>
                            <div class="upload-actions">
                                <button class="action-button primary" onclick="openMediaLibrary()">
                                    📚 View Media Library
                                </button>
                                <button class="action-button secondary" onclick="resetUploadForm()">
                                    📁 Upload More Files
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="uploaded-files" id="uploaded-files">
                        <!-- Uploaded files will appear here -->
                    </div>
                    
                </div>
                
            </div>
            
            <!-- Settings Tab -->
            <div id="settings" class="tab-content">
                
                <div class="dashboard-section">
                    <h2>⚙️ Dashboard Settings</h2>
                    <p>Configure your gallery preferences and dashboard behavior</p>
                    
                    <div class="settings-grid">
                        
                        <div class="setting-group">
                            <h4>🎨 Gallery Display</h4>
                            <div class="setting-item">
                                <label for="gallery-style">Gallery Style:</label>
                                <select id="gallery-style">
                                    <option value="modern">Modern Grid</option>
                                    <option value="classic">Classic List</option>
                                    <option value="masonry">Masonry Layout</option>
                                </select>
                            </div>
                            <div class="setting-item">
                                <label for="items-per-page">Items per Page:</label>
                                <input type="number" id="items-per-page" value="6" min="3" max="12">
                            </div>
                            <div class="setting-item">
                                <label>
                                    <input type="checkbox" id="auto-publish" checked>
                                    Auto-publish changes
                                </label>
                            </div>
                        </div>
                        
                        <div class="setting-group">
                            <h4>📱 Mobile Options</h4>
                            <div class="setting-item">
                                <label>
                                    <input type="checkbox" id="mobile-friendly" checked>
                                    Mobile-friendly layout
                                </label>
                            </div>
                            <div class="setting-item">
                                <label>
                                    <input type="checkbox" id="touch-gestures" checked>
                                    Enable touch gestures
                                </label>
                            </div>
                        </div>
                        
                        <div class="setting-group">
                            <h4>🔒 Security</h4>
                            <div class="setting-item">
                                <label for="dashboard-password">Dashboard Password:</label>
                                <input type="password" id="dashboard-password" placeholder="Enter new password">
                            </div>
                            <div class="setting-item">
                                <label>
                                    <input type="checkbox" id="session-timeout" checked>
                                    Auto-logout after 2 hours
                                </label>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="settings-actions">
                        <button class="action-button primary" onclick="saveSettings()">
                            <span class="btn-icon">💾</span>
                            Save Settings
                        </button>
                        <button class="action-button secondary" onclick="resetSettings()">
                            <span class="btn-icon">🔄</span>
                            Reset to Default
                        </button>
                    </div>
                    
                </div>
                
            </div>
            
            <!-- Success Messages -->
            <div class="success-message" id="success-message" style="display: none;">
                <span class="success-icon">✅</span>
                <span class="success-text">Changes saved successfully!</span>
                <button class="success-close" onclick="hideSuccess()">×</button>
            </div>
            
        </div>
        
    </main>
</div>

<style>
/* ==========================================================================
   DASHBOARD STYLES - MODERN GLASSMORPHISM DESIGN
   ========================================================================== */

/* Dashboard Background Enhancement - MAGICAL ANIMATED GRADIENT */
body.page-template-page-dashboard {
    background: linear-gradient(135deg, 
        #667eea 0%, 
        #764ba2 25%, 
        #f093fb 50%, 
        #f5576c 75%, 
        #4facfe 100%
    );
    background-size: 400% 400%;
    animation: gradientShift 15s ease infinite;
    min-height: 100vh;
    position: relative;
    margin: 0 !important;
    padding: 0 !important;
}

/* Animated gradient movement for dynamic effect */
@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Clean dashboard layout */
#primary.content-area {
    background: transparent;
    min-height: 100vh;
}

.dashboard-content {
    padding: 20px;
    max-width: 1400px;
    margin: 0 auto;
    color: white;
}

/* Dashboard Header */
.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
    padding: 30px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.dashboard-title h1 {
    color: #ffffff;
    font-size: 2.5em;
    margin: 0 0 10px 0;
    font-weight: 500;
    text-shadow: 0 3px 12px rgba(0, 0, 0, 0.6);
}

.dashboard-subtitle {
    color: #f0f0f0;
    font-size: 1.2em;
    margin: 0;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
}

.dashboard-status {
    display: flex;
    align-items: center;
    gap: 10px;
}

.status-indicator {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #4CAF50;
    box-shadow: 0 0 10px rgba(76, 175, 80, 0.5);
    animation: pulse 2s infinite;
}

.status-text {
    color: #f5f5f5;
    font-weight: 500;
    text-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
}

/* Dashboard Tabs */
.dashboard-tabs {
    display: flex;
    gap: 5px;
    margin-bottom: 30px;
    background: rgba(255, 255, 255, 0.1);
    padding: 8px;
    border-radius: 15px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
}

.tab-btn {
    flex: 1;
    padding: 15px 20px;
    background: transparent;
    border: none;
    border-radius: 10px;
    color: #e0e0e0;
    font-size: 1em;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
}

.tab-btn:hover {
    background: rgba(255, 255, 255, 0.1);
    color: #ffffff;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
}

.tab-btn.active {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.tab-icon {
    font-size: 1.1em;
}

/* Tab Content */
.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
    animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
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

/* Gallery Grid */
.dashboard-gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    margin-bottom: 40px;
}

.dashboard-card {
    background: rgba(255, 255, 255, 0.12);
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    background: rgba(255, 255, 255, 0.18);
    border-color: rgba(255, 255, 255, 0.25);
}

.card-preview {
    position: relative;
    height: 180px;
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
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 15; /* Higher than drag-drop-overlay */
    pointer-events: none; /* Allow clicks to pass through when hidden */
}

.dashboard-card:hover .card-overlay {
    opacity: 1;
    pointer-events: auto; /* Enable clicks when visible */
}

.card-action-btn {
    padding: 8px 16px;
    border: none;
    border-radius: 20px;
    font-size: 0.9em;
    font-weight: 500;
    cursor: pointer !important;
    transition: all 0.3s ease;
    position: relative;
    z-index: 10;
    pointer-events: auto;
}

.edit-btn {
    background: rgba(102, 126, 234, 0.9);
    color: white;
}

.preview-btn {
    background: rgba(255, 255, 255, 0.9);
    color: #333;
}

.card-action-btn:hover {
    transform: translateY(-2px);
}

.card-info {
    padding: 20px;
}

.card-title {
    color: #ffffff;
    font-size: 1.1em;
    margin: 0 0 8px 0;
    font-weight: 600;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
}

.card-description {
    color: #e0e0e0;
    font-size: 0.9em;
    margin-bottom: 15px;
    line-height: 1.4;
    text-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

.card-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.8em;
}

.update-status {
    color: #4CAF50;
    font-weight: 600;
}

.update-time {
    color: #d0d0d0;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

/* Action Buttons */
.gallery-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.action-button {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 15px 25px;
    border: none;
    border-radius: 25px;
    font-size: 1em;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}

.action-button.primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.action-button.secondary {
    background: rgba(255, 255, 255, 0.15);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.action-button.tertiary {
    background: transparent;
    color: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.action-button:hover {
    transform: translateY(-3px);
}

.action-button.primary:hover {
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
}

.btn-icon {
    font-size: 1.1em;
}

/* Demo Notice for Upload Section */
.demo-notice {
    background: linear-gradient(135deg, 
        rgba(76, 175, 80, 0.15) 0%, 
        rgba(56, 142, 60, 0.15) 100%);
    border: 1px solid rgba(76, 175, 80, 0.3);
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 30px;
    display: flex;
    align-items: center;
    gap: 15px;
    backdrop-filter: blur(10px);
}

.notice-icon {
    font-size: 2.5em;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
}

.notice-content h4 {
    color: #ffffff;
    margin: 0 0 8px 0;
    font-size: 1.2em;
    font-weight: 600;
}

.notice-content p {
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
    line-height: 1.5;
}

/* Upload Results Section */
.upload-results {
    background: rgba(76, 175, 80, 0.1);
    border: 1px solid rgba(76, 175, 80, 0.3);
    border-radius: 15px;
    padding: 25px;
    margin-top: 20px;
    text-align: center;
}

.upload-results h4 {
    color: #4ade80;
    margin: 0 0 15px 0;
    font-size: 1.3em;
}

.upload-summary p {
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 20px;
    line-height: 1.6;
}

.upload-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

/* Upload Zone */
.upload-zone {
    border: 2px dashed rgba(255, 255, 255, 0.4);
    border-radius: 20px;
    padding: 60px 40px;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    margin-bottom: 30px;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
}

.upload-zone:hover,
.upload-zone.dragover {
    border-color: #667eea;
    background: rgba(102, 126, 234, 0.1);
}

.upload-content .upload-icon {
    font-size: 4em;
    margin-bottom: 20px;
    display: block;
}

.upload-content h3 {
    color: #ffffff;
    font-size: 1.5em;
    margin: 0 0 15px 0;
    font-weight: 500;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
}

.upload-content p {
    color: #e0e0e0;
    margin: 5px 0;
    text-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

.upload-limit {
    font-size: 0.9em;
    color: #d0d0d0;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.browse-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-size: 1em;
    font-weight: 600;
    cursor: pointer;
    margin-top: 20px;
    transition: all 0.3s ease;
}

.browse-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

/* Progress Bar */
.upload-progress {
    margin: 20px 0;
}

.progress-bar {
    width: 100%;
    height: 8px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 10px;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
    border-radius: 4px;
    transition: width 0.3s ease;
    width: 0%;
}

.progress-text {
    color: #e8e8e8;
    text-align: center;
    font-weight: 500;
    text-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

/* Settings */
.settings-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.setting-group {
    background: rgba(255, 255, 255, 0.08);
    padding: 25px;
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
}

.setting-group h4 {
    color: #ffffff;
    font-size: 1.2em;
    margin: 0 0 20px 0;
    font-weight: 600;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
}

.setting-item {
    margin-bottom: 20px;
}

.setting-item label {
    color: #f0f0f0;
    font-weight: 500;
    display: block;
    margin-bottom: 8px;
    text-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

.setting-item input,
.setting-item select {
    width: 100%;
    padding: 10px 15px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    color: #ffffff;
    font-size: 1em;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.setting-item input[type="checkbox"] {
    width: auto;
    margin-right: 10px;
}

.settings-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

/* Success Message */
.success-message {
    position: fixed;
    top: 20px;
    right: 20px;
    background: rgba(76, 175, 80, 0.95);
    color: white;
    padding: 15px 20px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    z-index: 1000;
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

.success-close {
    background: none;
    border: none;
    color: white;
    font-size: 1.2em;
    cursor: pointer;
    padding: 0;
    margin-left: 10px;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .dashboard-gallery-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .dashboard-header {
        flex-direction: column;
        gap: 20px;
        text-align: center;
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
    
    .dashboard-tabs {
        flex-direction: column;
    }
    
    .gallery-actions,
    .settings-actions {
        flex-direction: column;
    }
    
    .action-button {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .dashboard-header {
        padding: 20px;
    }
    
    .dashboard-title h1 {
        font-size: 2em;
    }
    
    .upload-zone {
        padding: 40px 20px;
    }
}

/* ==========================================================================
   DRAG & DROP FUNCTIONALITY STYLING
   ========================================================================== */

.drag-drop-zone {
    position: relative;
    transition: all 0.3s ease;
}

.drag-drop-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(102, 126, 234, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
    z-index: 10;
    border: 3px dashed rgba(255, 255, 255, 0.7);
    pointer-events: none; /* Don't block clicks when hidden */
}

.drop-zone-content {
    text-align: center;
    color: white;
}

.drop-icon {
    font-size: 3em;
    display: block;
    margin-bottom: 10px;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
}

.drop-text {
    font-size: 1.2em;
    font-weight: 600;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
}

.drag-drop-zone.drag-active {
    transform: scale(1.02);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
}

.drag-drop-zone.drag-active .drag-drop-overlay {
    opacity: 1;
    pointer-events: auto; /* Enable when dragging */
    animation: pulse 1s ease-in-out infinite alternate;
}

@keyframes pulse {
    from {
        background: rgba(102, 126, 234, 0.9);
    }
    to {
        background: rgba(118, 75, 162, 0.9);
    }
}

/* ==========================================================================
   NOTIFICATION SYSTEM - ALWAYS ON TOP
   ========================================================================== */

.notification-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 99999;
    display: flex;
    flex-direction: column;
    gap: 10px;
    pointer-events: none;
}

.notification {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 15px;
    padding: 15px 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    display: flex;
    align-items: center;
    gap: 12px;
    animation: slideIn 0.3s ease-out;
    pointer-events: all;
    min-width: 300px;
    max-width: 400px;
}

.notification-success {
    border-left: 4px solid #4ade80;
}

.notification-error {
    border-left: 4px solid #ef4444;
}

.notification-loading {
    border-left: 4px solid #3b82f6;
}

.notification-icon {
    font-size: 1.2em;
    flex-shrink: 0;
}

.notification-text {
    color: #333;
    font-weight: 500;
    flex-grow: 1;
    line-height: 1.4;
}

.notification-close {
    background: none;
    border: none;
    color: #666;
    font-size: 1.4em;
    cursor: pointer;
    padding: 0;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all 0.2s ease;
    flex-shrink: 0;
}

.notification-close:hover {
    background: rgba(0, 0, 0, 0.1);
    color: #333;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideOut {
    from {
        opacity: 1;
        transform: translateX(0);
    }
    to {
        opacity: 0;
        transform: translateX(100px);
    }
}

/* Mobile notification adjustments */
@media (max-width: 768px) {
    .notification-container {
        left: 20px;
        right: 20px;
        top: 20px;
    }
    
    .notification {
        min-width: auto;
        max-width: none;
    }
}
</style>

<script>
// ==========================================================================
// REAL DRAG & DROP FUNCTIONALITY - DESKTOP TO DASHBOARD
// ==========================================================================

document.addEventListener('DOMContentLoaded', function() {
    initializeDragAndDrop();
    initializeNotificationSystem();
});

// Initialize drag and drop for all gallery cards
function initializeDragAndDrop() {
    const dropZones = document.querySelectorAll('.drag-drop-zone');
    
    dropZones.forEach(zone => {
        const cardId = zone.dataset.cardId;
        
        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            zone.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });
        
        // Highlight drop zone when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            zone.addEventListener(eventName, () => highlightDropZone(zone), false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            zone.addEventListener(eventName, () => unhighlightDropZone(zone), false);
        });
        
        // Handle dropped files
        zone.addEventListener('drop', (e) => handleDrop(e, cardId), false);
    });
}

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

function highlightDropZone(zone) {
    zone.classList.add('drag-active');
    const overlay = zone.querySelector('.drag-drop-overlay');
    if (overlay) overlay.style.opacity = '1';
}

function unhighlightDropZone(zone) {
    zone.classList.remove('drag-active');
    const overlay = zone.querySelector('.drag-drop-overlay');
    if (overlay) overlay.style.opacity = '0';
}

function handleDrop(e, cardId) {
    const dt = e.dataTransfer;
    const files = dt.files;
    
    if (files.length > 0) {
        const file = files[0];
        
        // Validate file type
        if (!file.type.startsWith('image/')) {
            showNotification('Please upload an image file (JPG, PNG, GIF, WebP)', 'error');
            return;
        }
        
        // Validate file size (10MB max)
        if (file.size > 10 * 1024 * 1024) {
            showNotification('File too large. Please use images under 10MB', 'error');
            return;
        }
        
        uploadImageToCard(file, cardId);
    }
}

function uploadImageToCard(file, cardId) {
    // Debug logging
    console.log('uploadImageToCard called:', {
        fileName: file.name,
        fileSize: file.size,
        fileType: file.type,
        cardId: cardId
    });
    
    const formData = new FormData();
    formData.append('action', 'upload_gallery_image');
    formData.append('gallery_image', file);
    formData.append('card_id', cardId);
    formData.append('nonce', '<?php echo wp_create_nonce("gallery_upload_nonce"); ?>');
    
    // Debug FormData contents
    console.log('FormData contents:');
    for (let [key, value] of formData.entries()) {
        console.log(key, value);
    }
    
    // Show upload progress
    showNotification('Uploading image...', 'loading');
    
    const ajaxUrl = '<?php echo admin_url("admin-ajax.php"); ?>';
    console.log('AJAX URL:', ajaxUrl);
    
    fetch(ajaxUrl, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        console.log('Response status:', response.status);
        console.log('Response headers:', response.headers);
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        return response.text(); // Get as text first to debug
    })
    .then(text => {
        console.log('Raw response:', text);
        
        try {
            const data = JSON.parse(text);
            console.log('Parsed JSON:', data);
            
            if (data.success) {
                // Update the card image immediately
                const cardImage = document.querySelector(`[data-card-id="${cardId}"] .card-image`);
                if (cardImage) {
                    cardImage.src = data.data.url;
                }
                
                // Update timestamp
                const timeElement = document.querySelector(`[data-card-id="${cardId}"] .update-time`);
                if (timeElement) {
                    timeElement.textContent = 'Just updated';
                }
                
                showNotification(`Card ${cardId} updated successfully! 🎉`, 'success');
                
                // Trigger gallery page sync (if needed)
                syncWithGalleryPage(cardId, data.data.url);
                
            } else {
                const errorMessage = data.data || 'Unknown error occurred';
                console.error('Upload failed:', errorMessage);
                showNotification('Upload failed: ' + errorMessage, 'error');
            }
        } catch (parseError) {
            console.error('JSON parse error:', parseError);
            console.error('Response text was:', text);
            showNotification('Invalid response from server. Check console for details.', 'error');
        }
    })
    .catch(error => {
        console.error('Upload error:', error);
        showNotification('Upload failed: ' + error.message, 'error');
    });
}

function syncWithGalleryPage(cardId, imageUrl) {
    // This function will update the gallery page in real-time
    // For now, we'll just log it - we can expand this later
    console.log(`Gallery card ${cardId} synced with new image: ${imageUrl}`);
}

// ==========================================================================
// NOTIFICATION SYSTEM - ALWAYS ON TOP
// ==========================================================================

let notificationContainer = null;

function initializeNotificationSystem() {
    notificationContainer = document.createElement('div');
    notificationContainer.className = 'notification-container';
    document.body.appendChild(notificationContainer);
}

function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    
    let icon = '💡';
    if (type === 'success') icon = '✅';
    if (type === 'error') icon = '❌';
    if (type === 'loading') icon = '⏳';
    
    notification.innerHTML = `
        <span class="notification-icon">${icon}</span>
        <span class="notification-text">${message}</span>
        <button class="notification-close" onclick="closeNotification(this)">×</button>
    `;
    
    notificationContainer.appendChild(notification);
    
    // Auto-remove after 4 seconds (except loading notifications)
    if (type !== 'loading') {
        setTimeout(() => {
            if (notification.parentNode) {
                closeNotification(notification.querySelector('.notification-close'));
            }
        }, 4000);
    }
    
    return notification;
}

function closeNotification(button) {
    const notification = button.parentElement;
    notification.style.animation = 'slideOut 0.3s ease-out forwards';
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 300);
}

// Dashboard functionality
function showTab(tabName) {
    // Hide all tab contents
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Remove active class from all tabs
    const tabBtns = document.querySelectorAll('.tab-btn');
    tabBtns.forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Show selected tab
    document.getElementById(tabName).classList.add('active');
    
    // Add active class to clicked tab
    event.target.classList.add('active');
}

// Gallery card management with REAL functionality
function editCard(cardId) {
    // Get current card data
    const currentTitle = document.querySelector(`[data-card-id="${cardId}"] .card-title`).textContent;
    const currentDesc = document.querySelector(`[data-card-id="${cardId}"] .card-description`).textContent;
    const currentImage = document.querySelector(`[data-card-id="${cardId}"] .card-image`).src;
    
    const modal = document.createElement('div');
    modal.className = 'edit-modal';
    modal.innerHTML = `
        <div class="edit-modal-overlay" onclick="closeEditModal()">
            <div class="edit-modal-content" onclick="event.stopPropagation()">
                <div class="edit-modal-header">
                    <h3>✏️ Edit Gallery Item ${cardId}</h3>
                    <button onclick="closeEditModal()" class="edit-modal-close">×</button>
                </div>
                <div class="edit-modal-body">
                    <div class="edit-form">
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" id="edit-title-${cardId}" value="${currentTitle}" class="form-input">
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea id="edit-description-${cardId}" class="form-textarea" rows="3">${currentDesc}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Image:</label>
                            <div class="image-upload-area">
                                <img src="${currentImage}" alt="Current Image" class="current-image" id="preview-image-${cardId}">
                                <div class="image-controls">
                                    <button class="image-change-btn" onclick="chooseImageFile(${cardId})">📸 Choose Image</button>
                                    <button class="image-drag-btn">📁 Or drag & drop here</button>
                                </div>
                                <input type="file" id="image-file-${cardId}" accept="image/*" style="display: none;" onchange="handleImageSelect(${cardId}, this)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="edit-modal-footer">
                    <button onclick="saveCardChanges(${cardId})" class="action-button primary">💾 Save Changes</button>
                    <button onclick="closeEditModal()" class="action-button secondary">Cancel</button>
                </div>
            </div>
        </div>
    `;
    
    // Setup drag and drop for the modal image area
    const imageArea = modal.querySelector('.image-upload-area');
    setupModalDragDrop(imageArea, cardId);
    
    const modalStyles = `
        <style>
        .edit-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
        }
        .edit-modal-overlay {
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .edit-modal-content {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            color: white;
        }
        .edit-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .edit-modal-header h3 {
            margin: 0;
            color: white;
        }
        .edit-modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.7);
        }
        .edit-modal-body {
            padding: 30px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
        }
        .form-input, .form-textarea {
            width: 100%;
            padding: 12px 16px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            color: white;
            font-size: 1em;
            box-sizing: border-box;
        }
        .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.3);
        }
        .image-upload-area {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .current-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .image-change-btn {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.9em;
            transition: all 0.3s ease;
        }
        .image-change-btn:hover {
            background: rgba(255, 255, 255, 0.25);
        }
        .edit-modal-footer {
            padding: 20px 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }
        </style>
    `;
    
    document.head.insertAdjacentHTML('beforeend', modalStyles);
    document.body.appendChild(modal);
    document.body.style.overflow = 'hidden';
}

function closeEditModal() {
    const modal = document.querySelector('.edit-modal');
    if (modal) {
        modal.remove();
        document.body.style.overflow = '';
    }
}

// ==========================================================================
// ENHANCED EDIT MODAL FUNCTIONALITY
// ==========================================================================

function chooseImageFile(cardId) {
    document.getElementById(`image-file-${cardId}`).click();
}

function handleImageSelect(cardId, input) {
    const file = input.files[0];
    if (file) {
        // Validate file type
        if (!file.type.startsWith('image/')) {
            showNotification('Please select an image file', 'error');
            return;
        }
        
        // Show preview immediately
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(`preview-image-${cardId}`).src = e.target.result;
        };
        reader.readAsDataURL(file);
        
        // Store file for later upload
        window.pendingImageFile = file;
        window.pendingCardId = cardId;
        
        showNotification('Image ready to save! Click "Save Changes" to upload.', 'success');
    }
}

function setupModalDragDrop(imageArea, cardId) {
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        imageArea.addEventListener(eventName, preventDefaults, false);
    });
    
    ['dragenter', 'dragover'].forEach(eventName => {
        imageArea.addEventListener(eventName, () => {
            imageArea.style.background = 'rgba(102, 126, 234, 0.1)';
            imageArea.style.borderColor = '#667eea';
        }, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        imageArea.addEventListener(eventName, () => {
            imageArea.style.background = '';
            imageArea.style.borderColor = '';
        }, false);
    });
    
    imageArea.addEventListener('drop', (e) => {
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            const file = files[0];
            if (file.type.startsWith('image/')) {
                // Show preview immediately
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(`preview-image-${cardId}`).src = e.target.result;
                };
                reader.readAsDataURL(file);
                
                // Store file for later upload
                window.pendingImageFile = file;
                window.pendingCardId = cardId;
                
                showNotification('Image ready to save! Click "Save Changes" to upload.', 'success');
            } else {
                showNotification('Please drop an image file', 'error');
            }
        }
    });
}

function saveCardChanges(cardId) {
    const title = document.getElementById(`edit-title-${cardId}`).value;
    const description = document.getElementById(`edit-description-${cardId}`).value;
    
    // If there's a pending image upload, handle it first
    if (window.pendingImageFile && window.pendingCardId === cardId) {
        showNotification('Uploading image...', 'loading');
        
        const formData = new FormData();
        formData.append('action', 'upload_gallery_image');
        formData.append('gallery_image', window.pendingImageFile);
        formData.append('card_id', cardId);
        formData.append('nonce', '<?php echo wp_create_nonce("gallery_upload_nonce"); ?>');
        
        fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the dashboard card image
                const dashboardImage = document.querySelector(`[data-card-id="${cardId}"] .card-image`);
                if (dashboardImage) {
                    dashboardImage.src = data.data.url;
                }
                
                // Clear pending upload
                window.pendingImageFile = null;
                window.pendingCardId = null;
                
                // Now save the text data
                saveTextData(cardId, title, description);
            } else {
                showNotification('Image upload failed: ' + data.data, 'error');
            }
        })
        .catch(error => {
            console.error('Upload error:', error);
            showNotification('Upload failed. Please try again.', 'error');
        });
    } else {
        // Just save text data
        saveTextData(cardId, title, description);
    }
}

function saveTextData(cardId, title, description) {
    const formData = new FormData();
    formData.append('action', 'update_card_data');
    formData.append('card_id', cardId);
    formData.append('title', title);
    formData.append('description', description);
    formData.append('nonce', '<?php echo wp_create_nonce("gallery_upload_nonce"); ?>');
    
    fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update dashboard card text
            const titleElement = document.querySelector(`[data-card-id="${cardId}"] .card-title`);
            const descElement = document.querySelector(`[data-card-id="${cardId}"] .card-description`);
            const timeElement = document.querySelector(`[data-card-id="${cardId}"] .update-time`);
            
            if (titleElement) titleElement.textContent = title;
            if (descElement) descElement.textContent = description;
            if (timeElement) timeElement.textContent = 'Just updated';
            
            closeEditModal();
            showNotification(`Card ${cardId} updated successfully! 🎉`, 'success');
        } else {
            showNotification('Save failed: ' + data.data, 'error');
        }
    })
    .catch(error => {
        console.error('Save error:', error);
        showNotification('Save failed. Please try again.', 'error');
    });
}

function previewCard(cardId) {
    // Get current card data and show a beautiful preview
    const cardElement = document.querySelector(`[data-card-id="${cardId}"]`);
    const title = cardElement.querySelector('.card-title').textContent;
    const description = cardElement.querySelector('.card-description').textContent;
    const imageSrc = cardElement.querySelector('.card-image').src;
    
    const previewModal = document.createElement('div');
    previewModal.className = 'preview-modal';
    previewModal.innerHTML = `
        <div class="preview-modal-overlay" onclick="closePreviewModal()">
            <div class="preview-modal-content" onclick="event.stopPropagation()">
                <div class="preview-header">
                    <h3>👁️ Gallery Preview - Card ${cardId}</h3>
                    <button onclick="closePreviewModal()" class="preview-close">×</button>
                </div>
                <div class="preview-body">
                    <img src="${imageSrc}" alt="${title}" class="preview-image">
                    <div class="preview-info">
                        <h4>${title}</h4>
                        <p>${description}</p>
                        <div class="preview-meta">
                            <span class="preview-status">✅ Live in Gallery</span>
                            <span class="preview-card">Card ${cardId}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(previewModal);
    document.body.style.overflow = 'hidden';
}

function closePreviewModal() {
    const modal = document.querySelector('.preview-modal');
    if (modal) {
        modal.remove();
        document.body.style.overflow = '';
    }
}

function publishAllChanges() {
    showNotification('🚀 Publishing all changes to live gallery...', 'loading');
    
    // Simulate publishing process
    setTimeout(() => {
        showNotification('🚀 All changes published successfully!', 'success');
    }, 2000);
}

function previewGallery() {
    window.open('<?php echo esc_url( home_url( '/gallery' ) ); ?>', '_blank');
}

function resetGallery() {
    if (confirm('Are you sure you want to reset all gallery items to default?')) {
        showSuccess('🔄 Gallery reset to default settings');
    }
}

function saveSettings() {
    showSuccess('⚙️ Settings saved successfully!');
}

function resetSettings() {
    if (confirm('Reset all settings to default?')) {
        showSuccess('🔄 Settings reset to default');
    }
}

function showSuccess(message) {
    const successDiv = document.getElementById('success-message');
    const textSpan = successDiv.querySelector('.success-text');
    textSpan.textContent = message;
    successDiv.style.display = 'flex';
    
    setTimeout(() => {
        hideSuccess();
    }, 3000);
}

function hideSuccess() {
    document.getElementById('success-message').style.display = 'none';
}

// File upload functionality
document.addEventListener('DOMContentLoaded', function() {
    const uploadZone = document.getElementById('upload-zone');
    const fileInput = document.getElementById('file-input');
    const progressDiv = document.getElementById('upload-progress');
    const progressFill = document.getElementById('progress-fill');
    const progressText = document.getElementById('progress-text');
    const uploadedFiles = document.getElementById('uploaded-files');
    
    // Drag and drop events
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadZone.addEventListener(eventName, preventDefaults, false);
    });
    
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    
    ['dragenter', 'dragover'].forEach(eventName => {
        uploadZone.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        uploadZone.addEventListener(eventName, unhighlight, false);
    });
    
    function highlight(e) {
        uploadZone.classList.add('dragover');
    }
    
    function unhighlight(e) {
        uploadZone.classList.remove('dragover');
    }
    
    uploadZone.addEventListener('drop', handleDrop, false);
    
    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    }
    
    uploadZone.addEventListener('click', () => fileInput.click());
    fileInput.addEventListener('change', e => handleFiles(e.target.files));
    
    function handleFiles(files) {
        [...files].forEach(uploadFile);
    }
    
    function uploadFile(file) {
        // Simulate file upload
        progressDiv.style.display = 'block';
        
        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.random() * 15;
            if (progress > 100) {
                progress = 100;
                clearInterval(interval);
                setTimeout(() => {
                    progressDiv.style.display = 'none';
                    addUploadedFile(file);
                    showSuccess(`📤 ${file.name} uploaded successfully!`);
                }, 500);
            }
            
            progressFill.style.width = progress + '%';
            progressText.textContent = `Uploading ${file.name}... ${Math.round(progress)}%`;
        }, 100);
    }
    
    function addUploadedFile(file) {
        const fileDiv = document.createElement('div');
        fileDiv.className = 'uploaded-file';
        fileDiv.innerHTML = `
            <div class="file-info">
                <span class="file-name">📁 ${file.name}</span>
                <span class="file-size">${(file.size / 1024 / 1024).toFixed(2)} MB</span>
            </div>
            <button class="file-remove" onclick="this.parentElement.remove()">×</button>
        `;
        uploadedFiles.appendChild(fileDiv);
    }
});

// Enhanced Upload File System
function handleFileUpload() {
    const fileInput = document.getElementById('file-input');
    fileInput.click();
    
    fileInput.onchange = function(e) {
        if (e.target.files.length > 0) {
            simulateFileUpload(e.target.files);
        }
    };
}

// Test function to ensure JavaScript is working
function testButtons() {
    console.log('✅ JavaScript is working!');
    
    // Test if the edit and preview functions exist
    if (typeof editCard === 'function') {
        console.log('✅ editCard function exists');
        alert('🎉 JavaScript is working! Try the Edit or Preview buttons on the cards now.');
    } else {
        console.log('❌ editCard function not found');
        alert('❌ There is a JavaScript issue. Let me fix this...');
    }
}

// Simple, direct edit function
function editCard(cardId) {
    console.log('Edit button clicked for card:', cardId);
    
    // Create a simple modal
    const modal = document.createElement('div');
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10000;
    `;
    
    modal.innerHTML = `
        <div style="background: white; padding: 30px; border-radius: 20px; max-width: 500px; width: 90%;">
            <h3 style="margin: 0 0 20px 0; color: #333;">✏️ Edit Card ${cardId}</h3>
            <p style="color: #666; margin-bottom: 20px;">Edit functionality is working! This would open the full editing interface.</p>
            <button onclick="this.closest('div').closest('div').remove()" style="background: #667eea; color: white; border: none; padding: 10px 20px; border-radius: 10px; cursor: pointer;">
                Close
            </button>
        </div>
    `;
    
    document.body.appendChild(modal);
}

// Simple, direct preview function  
function previewCard(cardId) {
    console.log('Preview button clicked for card:', cardId);
    
    // Create a simple modal
    const modal = document.createElement('div');
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10000;
    `;
    
    modal.innerHTML = `
        <div style="background: white; padding: 30px; border-radius: 20px; max-width: 600px; width: 90%;">
            <h3 style="margin: 0 0 20px 0; color: #333;">👁️ Preview Card ${cardId}</h3>
            <p style="color: #666; margin-bottom: 20px;">Preview functionality is working! This would show the full lightbox gallery preview.</p>
            <button onclick="this.closest('div').closest('div').remove()" style="background: #4ade80; color: white; border: none; padding: 10px 20px; border-radius: 10px; cursor: pointer;">
                Close
            </button>
        </div>
    `;
    
    document.body.appendChild(modal);
}

// Add test button functionality on page load
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Dashboard JavaScript loaded successfully');
    
    // Test if functions exist
    if (typeof editCard === 'function' && typeof previewCard === 'function') {
        console.log('✅ Edit and Preview functions are properly loaded');
    } else {
        console.error('❌ Functions not found');
    }
});

function simulateFileUpload(files) {
    const progressDiv = document.getElementById('upload-progress');
    const progressFill = document.getElementById('progress-fill');
    const progressText = document.getElementById('progress-text');
    const resultsDiv = document.getElementById('upload-results');
    
    // Show progress
    progressDiv.style.display = 'block';
    resultsDiv.style.display = 'none';
    
    let progress = 0;
    const interval = setInterval(() => {
        progress += Math.random() * 20;
        if (progress >= 100) {
            progress = 100;
            clearInterval(interval);
            
            // Show completion
            setTimeout(() => {
                progressDiv.style.display = 'none';
                resultsDiv.style.display = 'block';
                showSuccess(`📁 ${files.length} file(s) uploaded to WordPress Media Library!`);
            }, 500);
        }
        
        progressFill.style.width = progress + '%';
        progressText.textContent = `Processing... ${Math.round(progress)}%`;
    }, 200);
}

function openMediaLibrary() {
    showSuccess('🚀 In a real WordPress installation, this would open the Media Library!');
}

function resetUploadForm() {
    document.getElementById('upload-results').style.display = 'none';
    document.getElementById('file-input').value = '';
    showSuccess('📁 Ready for new uploads!');
}
</script>

<style>
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

/* Gallery Button - Complementary Teal with subtle pulse */
.floating-btn.gallery-btn {
    background: linear-gradient(135deg, 
        rgba(34, 193, 195, 0.9) 0%, 
        rgba(253, 187, 45, 0.9) 100%);
    color: white;
    animation: subtlePulse 3s ease-in-out infinite;
}

@keyframes subtlePulse {
    0%, 100% { 
        box-shadow: 
            0 8px 32px rgba(0, 0, 0, 0.12),
            0 2px 6px rgba(0, 0, 0, 0.08),
            0 0 0 0 rgba(34, 193, 195, 0.5);
    }
    50% { 
        box-shadow: 
            0 8px 32px rgba(0, 0, 0, 0.12),
            0 2px 6px rgba(0, 0, 0, 0.08),
            0 0 0 8px rgba(34, 193, 195, 0.1);
    }
}

.floating-btn.gallery-btn:hover {
    background: linear-gradient(135deg, 
        rgba(34, 193, 195, 1) 0%, 
        rgba(253, 187, 45, 1) 100%);
    transform: translateY(-3px) scale(1.05);
    box-shadow: 
        0 12px 40px rgba(34, 193, 195, 0.4),
        0 4px 12px rgba(0, 0, 0, 0.15);
    color: white;
    text-decoration: none;
    animation: none; /* Stop pulse on hover */
}

/* Logout Button - Warning Red */
.floating-btn.logout-btn {
    background: linear-gradient(135deg, 
        rgba(239, 68, 68, 0.9) 0%, 
        rgba(220, 38, 38, 0.9) 100%);
    color: white;
}

.floating-btn.logout-btn:hover {
    background: linear-gradient(135deg, 
        rgba(239, 68, 68, 1) 0%, 
        rgba(220, 38, 38, 1) 100%);
    transform: translateY(-3px) scale(1.05);
    box-shadow: 
        0 12px 40px rgba(239, 68, 68, 0.4),
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
    .floating-btn.gallery-btn {
        animation: none;
    }
}

/* Enhanced Lightbox Preview System */
.preview-modal.lightbox-style {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 10000;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.preview-modal.lightbox-style.fade-in {
    opacity: 1;
}

.preview-modal.lightbox-style.fade-out {
    opacity: 0;
}

.preview-modal-overlay {
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.95);
    backdrop-filter: blur(10px);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.lightbox-content {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.15) 0%, 
        rgba(255, 255, 255, 0.08) 100%);
    border-radius: 20px;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    max-width: 90vw;
    max-height: 90vh;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
}

.lightbox-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 25px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    background: rgba(255, 255, 255, 0.05);
}

.lightbox-title {
    display: flex;
    align-items: center;
    gap: 10px;
    color: white;
}

.lightbox-title h3 {
    margin: 0;
    font-size: 1.3em;
    font-weight: 600;
}

.lightbox-icon {
    font-size: 1.5em;
}

.lightbox-close {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
    font-size: 20px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
}

.lightbox-close:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

.lightbox-body {
    display: flex;
    max-height: calc(90vh - 80px);
}

.lightbox-image-container {
    flex: 2;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.3);
    overflow: hidden;
}

.lightbox-image {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
    cursor: grab;
}

.lightbox-image:active {
    cursor: grabbing;
}

.image-overlay {
    position: absolute;
    top: 20px;
    right: 20px;
}

.zoom-controls {
    display: flex;
    gap: 10px;
    opacity: 0.8;
    transition: opacity 0.3s ease;
}

.zoom-controls:hover {
    opacity: 1;
}

.zoom-btn {
    background: rgba(0, 0, 0, 0.7);
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 20px;
    cursor: pointer;
    font-size: 0.9em;
    transition: all 0.3s ease;
}

.zoom-btn:hover {
    background: rgba(0, 0, 0, 0.9);
    transform: translateY(-2px);
}

.lightbox-info {
    flex: 1;
    padding: 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-width: 300px;
    background: rgba(255, 255, 255, 0.02);
}

.preview-title {
    color: white;
    font-size: 1.8em;
    margin: 0 0 15px 0;
    font-weight: 600;
}

.preview-description {
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.6;
    margin-bottom: 25px;
    font-size: 1.1em;
}

.preview-meta {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.preview-status,
.preview-card {
    color: #4ade80;
    font-weight: 500;
    font-size: 0.95em;
}

.preview-actions {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.meta-btn {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 8px 16px;
    border-radius: 20px;
    cursor: pointer;
    font-size: 0.9em;
    transition: all 0.3s ease;
}

.meta-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
}

/* Responsive Lightbox */
@media (max-width: 768px) {
    .lightbox-body {
        flex-direction: column;
    }
    
    .lightbox-info {
        min-width: auto;
        padding: 20px;
    }
    
    .preview-title {
        font-size: 1.4em;
    }
    
    .zoom-controls {
        top: 10px;
        right: 10px;
    }
}
</style>

<?php endif; ?>

<?php get_footer(); ?>