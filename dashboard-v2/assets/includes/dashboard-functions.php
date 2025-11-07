<?php
/**
 * Dashboard v2.0 Core Functions
 * 
 * Clean, modular functions for dashboard functionality
 * Version: 2.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Dashboard v2.0 Main Class
 */
class DashboardV2 {
    
    private $config;
    
    public function __construct() {
        $this->config = new DashboardV2Config();
        $this->init_session();
    }
    
    /**
     * Initialize secure session management
     */
    private function init_session() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    /**
     * Check if user is authenticated
     */
    public function is_authenticated() {
        // Check for password submission
        if (isset($_POST['dashboard_password'])) {
            if ($_POST['dashboard_password'] === DashboardV2Config::PASSWORD) {
                $_SESSION[DashboardV2Config::SESSION_KEY] = true;
                return true;
            } else {
                $this->login_error = 'Incorrect password. Please try again.';
                return false;
            }
        }
        
        // Check existing session
        return isset($_SESSION[DashboardV2Config::SESSION_KEY]) && 
               $_SESSION[DashboardV2Config::SESSION_KEY] === true;
    }
    
    /**
     * Render beautiful login screen
     */
    public function render_login_screen() {
        ?>
        <div class="dashboard-login-overlay">
            <div class="dashboard-login-container">
                <div class="login-header">
                    <h1>🔐 Dashboard v2.0 Access</h1>
                    <p>Enter password to access the professional gallery management system</p>
                </div>
                
                <?php if (isset($this->login_error)): ?>
                    <div class="login-error">
                        <span>❌ <?php echo $this->login_error; ?></span>
                    </div>
                <?php endif; ?>
                
                <form method="POST" class="login-form">
                    <div class="input-group">
                        <input type="password" name="dashboard_password" placeholder="Enter dashboard password" required autocomplete="off">
                        <button type="submit" class="login-btn">
                            <span>🚀 Access Dashboard v2.0</span>
                        </button>
                    </div>
                </form>
                
                <div class="login-footer">
                    <a href="<?php echo esc_url(home_url('/gallery')); ?>" class="back-to-gallery">
                        ← Back to Gallery
                    </a>
                    <span class="version-info">Dashboard v2.0 - Modular Architecture</span>
                </div>
            </div>
        </div>
        
        <style>
        /* Glassmorphism Login Styles */
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
        
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 25px;
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
            box-sizing: border-box;
        }
        
        .login-form input::placeholder {
            color: rgba(255, 255, 255, 0.7);
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
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4);
        }
        
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 172, 254, 0.6);
        }
        
        .login-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9em;
        }
        
        .back-to-gallery {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }
        
        .version-info {
            color: rgba(255, 255, 255, 0.6);
        }
        </style>
        <?php
    }
    
    /**
     * Logout user
     */
    public function logout() {
        session_destroy();
    }
    
    /**
     * Render Gallery Management Section
     */
    public function render_gallery_management() {
        ?>
        <div class="dashboard-section">
            <h2>🎨 Gallery Management</h2>
            <p>Professional gallery management with drag & drop functionality</p>
            
            <div class="gallery-grid">
                <?php for ($i = 1; $i <= DashboardV2Config::CARDS_COUNT; $i++): ?>
                    <?php $this->render_gallery_card($i); ?>
                <?php endfor; ?>
            </div>
        </div>
        <?php
    }
    
    /**
     * Render individual gallery card
     */
    private function render_gallery_card($card_id) {
        $defaults = DashboardV2Config::get_card_defaults();
        $card_data = $defaults[$card_id];
        
        // Get saved data or use defaults
        $title = get_option("gallery_card_{$card_id}_title", $card_data['title']);
        $description = get_option("gallery_card_{$card_id}_description", $card_data['description']);
        $image = get_option("gallery_card_{$card_id}_image", $card_data['image']);
        ?>
        <div class="gallery-card" data-card-id="<?php echo $card_id; ?>">
            <div class="card-preview">
                <img src="<?php echo esc_url($image); ?>" alt="Gallery Item <?php echo $card_id; ?>" class="card-image">
                <div class="card-overlay">
                    <button class="card-action-btn edit-btn" onclick="Dashboard.editCard(<?php echo $card_id; ?>)">
                        ✏️ Edit
                    </button>
                    <button class="card-action-btn preview-btn" onclick="Dashboard.previewCard(<?php echo $card_id; ?>)">
                        👁️ Preview
                    </button>
                </div>
                <div class="drag-drop-overlay">
                    <div class="drop-zone-content">
                        <span class="drop-icon">📁</span>
                        <span class="drop-text">Drop image here</span>
                    </div>
                </div>
            </div>
            <div class="card-info">
                <h4 class="card-title"><?php echo esc_html($title); ?></h4>
                <p class="card-description"><?php echo esc_html($description); ?></p>
                <div class="card-meta">
                    <span class="update-status">✅ Published</span>
                    <span class="update-time">
                        <?php 
                        $updated = get_option("gallery_card_{$card_id}_updated");
                        if ($updated) {
                            echo 'Updated ' . human_time_diff(strtotime($updated), current_time('timestamp')) . ' ago';
                        } else {
                            echo 'Ready for updates';
                        }
                        ?>
                    </span>
                </div>
            </div>
        </div>
        <?php
    }
    
    /**
     * Render File Upload Section
     */
    public function render_file_uploads() {
        ?>
        <div class="dashboard-section">
            <h2>📁 Upload Files</h2>
            <p>Upload images directly to your WordPress Media Library</p>
            
            <div class="demo-notice">
                <div class="notice-icon">💡</div>
                <div class="notice-content">
                    <h4>Professional Upload System</h4>
                    <p>Files uploaded here integrate seamlessly with WordPress Media Library and can be used across your entire website!</p>
                </div>
            </div>
            
            <div class="upload-zone" id="upload-zone">
                <div class="upload-content">
                    <div class="upload-icon">📁</div>
                    <h3>Drag files here or click to browse</h3>
                    <p>Supported formats: JPG, PNG, GIF, WebP</p>
                    <p class="upload-limit">Maximum file size: 10MB</p>
                    <button class="browse-btn" onclick="Dashboard.handleFileUpload()">
                        Browse Files
                    </button>
                </div>
            </div>
        </div>
        <?php
    }
    
    /**
     * Render Settings Section
     */
    public function render_settings() {
        ?>
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
                </div>
                
                <div class="setting-group">
                    <h4>🔒 Security</h4>
                    <div class="setting-item">
                        <label>
                            <input type="checkbox" checked>
                            Enable secure authentication
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="settings-actions">
                <button class="action-button primary" onclick="Dashboard.saveSettings()">
                    💾 Save Settings
                </button>
                <button class="action-button secondary" onclick="Dashboard.resetSettings()">
                    🔄 Reset to Defaults
                </button>
            </div>
        </div>
        <?php
    }
    
    /**
     * Enqueue modular CSS files
     */
    public function enqueue_styles() {
        $css_files = DashboardV2Config::get_css_files();
        $css_path = DashboardV2Config::get_css_path();
        
        foreach ($css_files as $file) {
            $file_path = $css_path . $file;
            echo "<link rel='stylesheet' href='{$file_path}?v=" . DashboardV2Config::VERSION . "' type='text/css' media='all' />\n";
        }
    }
    
    /**
     * Enqueue modular JavaScript files
     */
    public function enqueue_scripts() {
        $js_files = DashboardV2Config::get_js_files();
        $js_path = DashboardV2Config::get_js_path();
        
        foreach ($js_files as $file) {
            $file_path = $js_path . $file;
            echo "<script src='{$file_path}?v=" . DashboardV2Config::VERSION . "'></script>\n";
        }
    }
}
?>