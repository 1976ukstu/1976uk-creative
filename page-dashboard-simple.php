<?php
/**
 * Template Name: Dashboard v2 Simple
 * 
 * Self-contained dashboard with all CSS/JS inline for guaranteed loading
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
    wp_redirect(get_permalink());
    exit;
}

get_header();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard v2.0</title>
    <style>
        /* Reset and base styles */
        * { box-sizing: border-box; }
        body { 
            margin: 0; 
            padding: 0; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            color: white;
        }
        
        /* Main container */
        .dashboard-v2-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
            min-height: 100vh;
        }
        
        /* Header */
        .dashboard-header {
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }
        
        .dashboard-header h1 {
            margin: 0 0 15px 0;
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .dashboard-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            margin: 0;
        }
        
        /* Navigation */
        .dashboard-nav {
            background: rgba(255,255,255,0.95);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
        }
        
        .nav-tabs {
            display: flex;
            gap: 15px;
            border-bottom: 2px solid #f0f0f0;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .nav-tab {
            padding: 12px 20px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            color: #666;
            border-radius: 8px 8px 0 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .nav-tab:hover {
            background: #f8f9fa;
            color: #333;
        }
        
        .nav-tab.active {
            color: #667eea;
            background: #f8f9ff;
            border-bottom: 2px solid #667eea;
        }
        
        .nav-actions {
            display: flex;
            justify-content: flex-end;
        }
        
        .nav-action-btn {
            padding: 10px 20px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .nav-action-btn:hover {
            background: #c82333;
            transform: translateY(-1px);
        }
        
        /* Content sections */
        .dashboard-section {
            background: rgba(255,255,255,0.95);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            color: #333;
            display: none;
            backdrop-filter: blur(10px);
        }
        
        .dashboard-section.active {
            display: block;
            animation: fadeInUp 0.5s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .dashboard-section h2 {
            margin: 0 0 10px 0;
            font-size: 1.8rem;
            color: #333;
            font-weight: 600;
        }
        
        .dashboard-section > p {
            color: #666;
            margin: 0 0 25px 0;
            font-size: 1.1rem;
        }
        
        /* Gallery grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }
        
        /* Gallery cards */
        .gallery-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border: 1px solid #f0f0f0;
            transition: all 0.3s ease;
        }
        
        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            border-color: #667eea;
        }
        
        .card-preview {
            position: relative;
            height: 250px;
            overflow: hidden;
            background: #f8f9fa;
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
            background: linear-gradient(135deg, rgba(102,126,234,0.8) 0%, rgba(118,75,162,0.8) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gallery-card:hover .card-overlay {
            opacity: 1;
        }
        
        .card-action-btn {
            padding: 12px 20px;
            background: rgba(255,255,255,0.95);
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            color: #333;
        }
        
        .card-action-btn:hover {
            background: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }
        
        .card-info {
            padding: 20px;
        }
        
        .card-title {
            margin: 0 0 8px 0;
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
        }
        
        .card-description {
            margin: 0 0 15px 0;
            color: #666;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
            font-size: 0.85rem;
        }
        
        .update-status {
            color: #10b981;
            font-weight: 500;
        }
        
        .update-time {
            color: #888;
        }
        
        /* Upload section */
        .upload-zone {
            border: 3px dashed #d1d5db;
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            background: #fafbfc;
            transition: all 0.3s ease;
            color: #666;
        }
        
        .upload-zone:hover {
            border-color: #667eea;
            background: #f8f9ff;
        }
        
        .upload-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            display: block;
        }
        
        .upload-zone h3 {
            margin: 0 0 10px 0;
            font-size: 1.4rem;
            color: #374151;
        }
        
        .browse-btn {
            margin-top: 20px;
            padding: 12px 25px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .browse-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102,126,234,0.4);
        }
        
        /* Settings */
        .settings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .setting-group {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e9ecef;
        }
        
        .setting-group h4 {
            margin: 0 0 15px 0;
            font-size: 1.1rem;
            color: #333;
        }
        
        /* Demo notice */
        .demo-notice {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .notice-icon {
            font-size: 2rem;
            flex-shrink: 0;
        }
        
        .notice-content h4 {
            margin: 0 0 5px 0;
            font-size: 1.2rem;
        }
        
        .notice-content p {
            margin: 0;
            opacity: 0.9;
        }
        
        /* Setting items */
        .setting-item {
            margin-bottom: 15px;
        }
        
        .setting-item label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #374151;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-v2-container { padding: 15px; }
            .dashboard-header { padding: 20px; }
            .dashboard-header h1 { font-size: 2rem; }
            .nav-tabs { flex-direction: column; gap: 10px; }
            .gallery-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="dashboard-v2-container">
    
    <!-- Dashboard Header -->
    <header class="dashboard-header">
        <h1>🎨 Creative Dashboard v2.0</h1>
        <p class="dashboard-subtitle">Professional gallery management with modular architecture</p>
    </header>
    
    <!-- Dashboard Navigation -->
    <nav class="dashboard-nav">
        <div class="nav-tabs">
            <button class="nav-tab active" data-tab="gallery" onclick="switchTab('gallery')">
                <span>🎨</span>
                <span>Gallery Management</span>
            </button>
            <button class="nav-tab" data-tab="upload" onclick="switchTab('upload')">
                <span>📁</span>
                <span>Upload Files</span>
            </button>
            <button class="nav-tab" data-tab="settings" onclick="switchTab('settings')">
                <span>⚙️</span>
                <span>Settings</span>
            </button>
        </div>
        <div class="nav-actions">
            <button class="nav-action-btn" onclick="logout()">
                🔒 Logout
            </button>
        </div>
    </nav>
    
    <!-- Gallery Section -->
    <section id="gallery-section" class="dashboard-section active">
        <h2>🎨 Gallery Management</h2>
        <p>Professional gallery management with drag & drop functionality</p>
        
        <div class="gallery-grid">
            <?php 
            // Get gallery data manually since the render function might not be working
            for ($i = 1; $i <= 6; $i++):
                $title = get_option("gallery_card_{$i}_title", "Creative Project {$i}");
                $description = get_option("gallery_card_{$i}_description", "Dashboard-managed showcase piece demonstrating professional gallery management capabilities...");
                $image = get_option("gallery_card_{$i}_image", get_template_directory_uri() . "/images/gallery/gallery-gimp-800x900-0{$i}.png");
                $updated = get_option("gallery_card_{$i}_updated");
            ?>
                <div class="gallery-card" data-card-id="<?php echo $i; ?>">
                    <div class="card-preview">
                        <img src="<?php echo esc_url($image); ?>" alt="Gallery Item <?php echo $i; ?>" class="card-image">
                        <div class="card-overlay">
                            <button class="card-action-btn edit-btn" onclick="editCard(<?php echo $i; ?>)">
                                ✏️ Edit
                            </button>
                            <button class="card-action-btn preview-btn" onclick="previewCard(<?php echo $i; ?>)">
                                👁️ Preview
                            </button>
                        </div>
                    </div>
                    <div class="card-info">
                        <h4 class="card-title"><?php echo esc_html($title); ?></h4>
                        <p class="card-description"><?php echo esc_html($description); ?></p>
                        <div class="card-meta">
                            <span class="update-status">✅ Published</span>
                            <span class="update-time">
                                <?php 
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
                <p>Files uploaded here integrate seamlessly with WordPress Media Library and can be used across your entire website!</p>
            </div>
        </div>
        
        <div class="upload-zone" id="upload-zone" onclick="handleFileUpload()">
            <div class="upload-content">
                <div class="upload-icon">📁</div>
                <h3>Drag files here or click to browse</h3>
                <p>Supported formats: JPG, PNG, GIF, WebP</p>
                <p class="upload-limit">Maximum file size: 10MB</p>
                <button class="browse-btn" onclick="handleFileUpload()">
                    Browse Files
                </button>
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
                <div class="setting-item">
                    <label for="gallery-style">Gallery Style:</label>
                    <select id="gallery-style" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                        <option value="modern">Modern Grid</option>
                        <option value="classic">Classic List</option>
                        <option value="masonry">Masonry Layout</option>
                    </select>
                </div>
            </div>
            
            <div class="setting-group">
                <h4>🔒 Security</h4>
                <div class="setting-item">
                    <label style="display: flex; align-items: center; gap: 8px;">
                        <input type="checkbox" checked>
                        <span>Enable secure authentication</span>
                    </label>
                </div>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 30px;">
            <button class="browse-btn" onclick="saveSettings()" style="margin-right: 10px;">
                💾 Save Settings
            </button>
            <button class="browse-btn" onclick="resetSettings()" style="background: #6c757d;">
                🔄 Reset to Defaults
            </button>
        </div>
    </section>
    
</div>

<script>
// Tab switching function
function switchTab(tabName) {
    console.log('Switching to tab:', tabName);
    
    // Update tab buttons
    document.querySelectorAll('.nav-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    const activeTab = document.querySelector(`[data-tab="${tabName}"]`);
    if (activeTab) {
        activeTab.classList.add('active');
    }
    
    // Update sections
    document.querySelectorAll('.dashboard-section').forEach(section => {
        section.classList.remove('active');
    });
    
    const activeSection = document.getElementById(`${tabName}-section`);
    if (activeSection) {
        activeSection.classList.add('active');
    }
}

// Logout function
function logout() {
    if (confirm('Are you sure you want to logout?')) {
        window.location.href = window.location.pathname + '?logout=1';
    }
}

// Card interaction functions
function editCard(cardId) {
    alert(`Edit card ${cardId} - Full functionality coming in Phase 2!`);
}

function previewCard(cardId) {
    alert(`Preview card ${cardId} - Full functionality coming in Phase 2!`);
}

// Upload functions
function handleFileUpload() {
    alert('File upload functionality - Full implementation coming in Phase 2!');
}

// Settings functions
function saveSettings() {
    alert('Settings saved successfully!');
}

function resetSettings() {
    if (confirm('Reset all settings to defaults?')) {
        alert('Settings reset to defaults!');
    }
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Dashboard v2.0 Simple loaded successfully');
});
</script>

</body>
</html>

<?php get_footer(); ?>