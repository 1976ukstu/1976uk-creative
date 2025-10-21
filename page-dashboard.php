<?php
/**
 * Template Name: Dashboard
 * 
 * Artist Dashboard - Revolutionary Content Management System
 * Simple, beautiful, powerful gallery management
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
                        
                        <!-- Gallery Card 1 -->
                        <div class="dashboard-card" data-card-id="1">
                            <div class="card-preview">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-01.png" alt="Gallery Item 1" class="card-image">
                                <div class="card-overlay">
                                    <button class="card-action-btn edit-btn" onclick="editCard(1)">✏️ Edit</button>
                                    <button class="card-action-btn preview-btn" onclick="previewCard(1)">👁️ Preview</button>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title">Creative Project 1</h4>
                                <p class="card-description">Dashboard-managed showcase piece...</p>
                                <div class="card-meta">
                                    <span class="update-status">✅ Published</span>
                                    <span class="update-time">Updated 2 hours ago</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Gallery Card 2 -->
                        <div class="dashboard-card" data-card-id="2">
                            <div class="card-preview">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-02.png" alt="Gallery Item 2" class="card-image">
                                <div class="card-overlay">
                                    <button class="card-action-btn edit-btn" onclick="editCard(2)">✏️ Edit</button>
                                    <button class="card-action-btn preview-btn" onclick="previewCard(2)">👁️ Preview</button>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title">Creative Project 2</h4>
                                <p class="card-description">Another beautiful showcase...</p>
                                <div class="card-meta">
                                    <span class="update-status">✅ Published</span>
                                    <span class="update-time">Updated 4 hours ago</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Gallery Card 3 -->
                        <div class="dashboard-card" data-card-id="3">
                            <div class="card-preview">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-03.png" alt="Gallery Item 3" class="card-image">
                                <div class="card-overlay">
                                    <button class="card-action-btn edit-btn" onclick="editCard(3)">✏️ Edit</button>
                                    <button class="card-action-btn preview-btn" onclick="previewCard(3)">👁️ Preview</button>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title">Creative Project 3</h4>
                                <p class="card-description">Professional gallery item...</p>
                                <div class="card-meta">
                                    <span class="update-status">✅ Published</span>
                                    <span class="update-time">Updated 1 day ago</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Gallery Card 4 -->
                        <div class="dashboard-card" data-card-id="4">
                            <div class="card-preview">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-04.png" alt="Gallery Item 4" class="card-image">
                                <div class="card-overlay">
                                    <button class="card-action-btn edit-btn" onclick="editCard(4)">✏️ Edit</button>
                                    <button class="card-action-btn preview-btn" onclick="previewCard(4)">👁️ Preview</button>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title">Creative Project 4</h4>
                                <p class="card-description">Beautiful dashboard management...</p>
                                <div class="card-meta">
                                    <span class="update-status">✅ Published</span>
                                    <span class="update-time">Updated 2 days ago</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Gallery Card 5 -->
                        <div class="dashboard-card" data-card-id="5">
                            <div class="card-preview">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-05.png" alt="Gallery Item 5" class="card-image">
                                <div class="card-overlay">
                                    <button class="card-action-btn edit-btn" onclick="editCard(5)">✏️ Edit</button>
                                    <button class="card-action-btn preview-btn" onclick="previewCard(5)">👁️ Preview</button>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title">Creative Project 5</h4>
                                <p class="card-description">Photographer-friendly interface...</p>
                                <div class="card-meta">
                                    <span class="update-status">✅ Published</span>
                                    <span class="update-time">Updated 3 days ago</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Gallery Card 6 -->
                        <div class="dashboard-card" data-card-id="6">
                            <div class="card-preview">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-06.png" alt="Gallery Item 6" class="card-image">
                                <div class="card-overlay">
                                    <button class="card-action-btn edit-btn" onclick="editCard(6)">✏️ Edit</button>
                                    <button class="card-action-btn preview-btn" onclick="previewCard(6)">👁️ Preview</button>
                                </div>
                            </div>
                            <div class="card-info">
                                <h4 class="card-title">Creative Project 6</h4>
                                <p class="card-description">Complete system demonstration...</p>
                                <div class="card-meta">
                                    <span class="update-status">✅ Published</span>
                                    <span class="update-time">Updated 1 week ago</span>
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
                    <h2>📤 Drag & Drop File Upload</h2>
                    <p>Simply drag images from your computer into the drop zone below</p>
                    
                    <div class="upload-zone" id="upload-zone">
                        <div class="upload-content">
                            <div class="upload-icon">📁</div>
                            <h3>Drag files here or click to browse</h3>
                            <p>Supported formats: JPG, PNG, GIF, WebP</p>
                            <p class="upload-limit">Maximum file size: 10MB</p>
                            <input type="file" id="file-input" multiple accept="image/*" style="display: none;">
                            <button class="browse-btn" onclick="document.getElementById('file-input').click()">
                                Browse Files
                            </button>
                        </div>
                    </div>
                    
                    <div class="upload-progress" id="upload-progress" style="display: none;">
                        <div class="progress-bar">
                            <div class="progress-fill" id="progress-fill"></div>
                        </div>
                        <div class="progress-text" id="progress-text">Uploading... 0%</div>
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

/* Dashboard Background Enhancement */
body.page-template-page-dashboard {
    background: 
        radial-gradient(circle at 25% 25%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 75% 75%, rgba(118, 75, 162, 0.1) 0%, transparent 50%),
        linear-gradient(135deg, 
            rgba(102, 126, 234, 0.15) 0%, 
            rgba(118, 75, 162, 0.15) 25%,
            rgba(255, 154, 158, 0.1) 50%,
            rgba(250, 208, 196, 0.1) 75%,
            rgba(102, 126, 234, 0.15) 100%
        );
    background-attachment: fixed;
    min-height: 100vh;
    position: relative;
}

body.page-template-page-dashboard::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 1px 1px, rgba(255,255,255,0.15) 1px, transparent 0);
    background-size: 20px 20px;
    pointer-events: none;
    z-index: -1;
    opacity: 0.3;
}

#primary.content-area {
    background: rgba(0, 0, 0, 0.02);
    backdrop-filter: blur(1px);
    min-height: 100vh;
}

.dashboard-content {
    padding: 20px 0;
    max-width: 1400px;
    margin: 0 auto;
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
}

.dashboard-card:hover .card-overlay {
    opacity: 1;
}

.card-action-btn {
    padding: 8px 16px;
    border: none;
    border-radius: 20px;
    font-size: 0.9em;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
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
</style>

<script>
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

// Gallery card management
function editCard(cardId) {
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
                            <input type="text" id="edit-title-${cardId}" value="Creative Project ${cardId}" class="form-input">
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea id="edit-description-${cardId}" class="form-textarea" rows="3">This is a demonstration of the dashboard editing capabilities. Easy to use, beautiful interface.</textarea>
                        </div>
                        <div class="form-group">
                            <label>Image:</label>
                            <div class="image-upload-area">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/gallery/gallery-gimp-800x900-0${cardId}.png" alt="Current Image" class="current-image">
                                <button class="image-change-btn" onclick="changeImage(${cardId})">📸 Change Image</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="edit-modal-footer">
                    <button onclick="saveCard(${cardId})" class="action-button primary">💾 Save Changes</button>
                    <button onclick="closeEditModal()" class="action-button secondary">Cancel</button>
                </div>
            </div>
        </div>
    `;
    
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

function previewCard(cardId) {
    showSuccess(`🔍 Previewing Gallery Item ${cardId}`);
    // In a real implementation, this would show a preview of the card
}

function changeImage(cardId) {
    showSuccess(`📸 Image upload feature would open here for Card ${cardId}`);
}

function saveCard(cardId) {
    // Simulate saving
    setTimeout(() => {
        closeEditModal();
        showSuccess(`💾 Gallery Item ${cardId} saved successfully!`);
    }, 500);
}

function publishAllChanges() {
    showSuccess('🚀 All changes published successfully!');
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
</script>

<?php get_footer(); ?>