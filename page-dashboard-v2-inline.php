<?php
/**
 * Template Name: Dashboard v2.0 Inline
 * 
 * Backup version with inline CSS for testing
 */

// Load dashboard configuration and functions
require_once get_template_directory() . '/dashboard-v2/assets/includes/dashboard-config.php';
require_once get_template_directory() . '/dashboard-v2/assets/includes/dashboard-functions.php';

// Initialize dashboard security and session management
$dashboard = new DashboardV2();

// Handle authentication
if (!$dashboard->is_authenticated()) {
    $dashboard->render_login_screen();
    return;
}

// Handle logout request
if (isset($_GET['logout'])) {
    $dashboard->logout();
    wp_redirect(get_permalink());
    exit;
}

get_header();
?>

<style>
/* Critical inline CSS for testing */
body { margin: 0; padding: 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
.dashboard-v2-container { max-width: 1400px; margin: 0 auto; padding: 20px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
.dashboard-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 15px; margin-bottom: 30px; text-align: center; }
.dashboard-header h1 { margin: 0 0 10px 0; font-size: 2.5rem; font-weight: 700; }
.dashboard-subtitle { font-size: 1.1rem; opacity: 0.9; margin: 0; }
.dashboard-nav { background: white; border-radius: 15px; padding: 20px; margin-bottom: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
.nav-tabs { display: flex; gap: 15px; border-bottom: 2px solid #f0f0f0; margin-bottom: 20px; }
.nav-tab { padding: 12px 20px; background: none; border: none; cursor: pointer; font-size: 1rem; color: #666; border-radius: 8px 8px 0 0; transition: all 0.3s ease; }
.nav-tab.active { color: #667eea; background: #f8f9ff; border-bottom: 2px solid #667eea; }
.dashboard-section { background: white; border-radius: 15px; padding: 30px; margin-bottom: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); display: none; }
.dashboard-section.active { display: block; animation: fadeIn 0.5s ease; }
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
.gallery-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; margin-top: 20px; }
.gallery-card { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); border: 1px solid #f0f0f0; transition: all 0.3s ease; }
.gallery-card:hover { transform: translateY(-5px); box-shadow: 0 8px 30px rgba(0,0,0,0.15); }
.card-preview { position: relative; height: 250px; overflow: hidden; background: #f8f9fa; }
.card-image { width: 100%; height: 100%; object-fit: cover; }
.card-info { padding: 20px; }
.card-title { margin: 0 0 8px 0; font-size: 1.3rem; font-weight: 600; color: #333; }
.card-description { margin: 0 0 15px 0; color: #666; font-size: 0.95rem; }
.card-meta { display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem; padding-top: 15px; border-top: 1px solid #f0f0f0; }
.update-status { color: #10b981; font-weight: 500; }
.update-time { color: #888; }
</style>

<div class="dashboard-v2-container">
    <div class="dashboard-wrapper">
        
        <!-- Dashboard Header -->
        <header class="dashboard-header">
            <h1>🎨 Creative Dashboard v2.0</h1>
            <p class="dashboard-subtitle">Professional gallery management with modular architecture</p>
        </header>
        
        <!-- Dashboard Navigation -->
        <nav class="dashboard-nav">
            <div class="nav-tabs">
                <button class="nav-tab active" data-tab="gallery" onclick="switchTab('gallery')">
                    🎨 Gallery Management
                </button>
                <button class="nav-tab" data-tab="upload" onclick="switchTab('upload')">
                    📁 Upload Files
                </button>
                <button class="nav-tab" data-tab="settings" onclick="switchTab('settings')">
                    ⚙️ Settings
                </button>
            </div>
        </nav>
        
        <!-- Gallery Section -->
        <section id="gallery-section" class="dashboard-section active">
            <?php $dashboard->render_gallery_management(); ?>
        </section>
        
        <!-- Upload Section -->
        <section id="upload-section" class="dashboard-section">
            <?php $dashboard->render_file_uploads(); ?>
        </section>
        
        <!-- Settings Section -->
        <section id="settings-section" class="dashboard-section">
            <?php $dashboard->render_settings(); ?>
        </section>
        
    </div>
</div>

<script>
function switchTab(tabName) {
    // Update tab buttons
    document.querySelectorAll('.nav-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    document.querySelector(`[data-tab="${tabName}"]`).classList.add('active');
    
    // Update sections
    document.querySelectorAll('.dashboard-section').forEach(section => {
        section.classList.remove('active');
    });
    document.getElementById(`${tabName}-section`).classList.add('active');
}
</script>

<?php get_footer(); ?>