<?php
/**
 * Template Name: Dashboard v2.0
 * 
 * Revolutionary Gallery Management Dashboard - Modular Architecture
 * Version: 2.0.0
 * Created: 28 October 2025
 * 
 * Features:
 * - Clean, modular file structure
 * - Optimized performance (under 300 lines)
 * - Professional architecture
 * - Easy to maintain and extend
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

<div class="dashboard-v2-container">
<!-- Dashboard v2.0 - Modular Architecture -->
<div id="dashboard-v2" class="dashboard-wrapper">
    
    <!-- Dashboard Header -->
    <header class="dashboard-header">
        <div class="dashboard-title">
            <h1>🎨 Creative Dashboard v2.0</h1>
            <p class="dashboard-subtitle">Professional gallery management with modular architecture</p>
        </div>
        <div class="dashboard-status">
            <span class="status-indicator online"></span>
            <span class="status-text">System Ready</span>
            <span class="version-badge">v2.0.0</span>
        </div>
    </header>
    
    <!-- Dashboard Navigation Tabs -->
    <nav class="dashboard-nav" role="tablist">
        <div class="nav-tabs">
            <button class="nav-tab active" data-tab="gallery" role="tab" aria-selected="true">
                <span class="tab-icon">🎨</span>
                <span class="tab-text">Gallery Management</span>
            </button>
            <button class="nav-tab" data-tab="upload" role="tab" aria-selected="false">
                <span class="tab-icon">📁</span>
                <span class="tab-text">Upload Files</span>
            </button>
            <button class="nav-tab" data-tab="settings" role="tab" aria-selected="false">
                <span class="tab-icon">⚙️</span>
                <span class="tab-text">Settings</span>
            </button>
        </div>
        <div class="nav-actions">
            <button class="nav-action-btn" onclick="Dashboard.logout()">
                🔒 Logout
            </button>
        </div>
    </nav>
    
    <!-- Dashboard Content Area -->
    <main class="dashboard-content">
        
        <!-- Gallery Management Tab -->
        <section id="gallery-section" class="dashboard-section active" role="tabpanel">
            <?php $dashboard->render_gallery_management(); ?>
        </section>
        
        <!-- File Upload Tab -->
        <section id="upload-section" class="dashboard-section" role="tabpanel">
            <?php $dashboard->render_file_uploads(); ?>
        </section>
        
        <!-- Settings Tab -->
        <section id="settings-section" class="dashboard-section" role="tabpanel">
            <?php $dashboard->render_settings(); ?>
        </section>
        
    </main>
    
</div>
</div>

<!-- Floating Action Buttons -->
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

<!-- Universal Menu (if needed) -->
<button class="universal-hamburger" aria-label="Open menu">
    <span></span>
    <span></span>
    <span></span>
</button>

<div class="universal-menu-modal">
    <div class="universal-menu-content">
        <div class="universal-menu-header">
            <h3>Navigation</h3>
            <button class="universal-close-button" aria-label="Close menu">×</button>
        </div>
        <div class="universal-menu-items">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <a href="<?php echo esc_url(home_url('/websites')); ?>">Websites</a>
            <a href="<?php echo esc_url(home_url('/gallery')); ?>">Gallery</a>
            <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a>
        </div>
    </div>
</div>

<?php
// Load modular CSS files
$dashboard->enqueue_styles();

// Load modular JavaScript files
$dashboard->enqueue_scripts();

get_footer();
?>