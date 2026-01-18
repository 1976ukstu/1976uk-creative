<footer id="colophon" class="site-footer">
    <div class="site-info">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        <p><?php esc_html_e('Proudly powered by WordPress', 'artist-theme'); ?></p>
    </div><!-- .site-info -->
</footer><!-- #colophon -->

<!-- Dashboard Modal System - 96% Viewport with Funky Background -->
<div id="dashboardModal" class="dashboard-modal" onclick="closeDashboardModal()">
    <div class="dashboard-modal-content" onclick="event.stopPropagation()">
        <!-- Funky Background Layer -->
        <div class="dashboard-funky-background"></div>
        
        <!-- Dashboard Header -->
        <div class="dashboard-modal-header">
            <div class="dashboard-info">
                <h3 id="dashboardTitle">🎨 Creative Dashboard</h3>
                <span id="dashboardSubtitle" class="dashboard-subtitle">Analytics & Content Management</span>
            </div>
            <div class="dashboard-controls">
                <button class="control-btn close-btn" onclick="closeDashboardModal()" title="Close dashboard">
                    <span>×</span>
                </button>
            </div>
        </div>
        
        <!-- Dashboard Content Area -->
        <div id="dashboardContentArea" class="dashboard-content-area">
            <!-- Default view: 6-card grid -->
            <div id="dashboardGrid" class="dashboard-grid-view">
                <div class="dashboard-funky-grid">
                    
                    <!-- Analytics Card -->
                    <div class="dashboard-funky-card" onclick="loadDashboardView('analytics')">
                        <div class="card-frosted-content">
                            <div class="card-icon">📊</div>
                            <h4 class="card-title">Analytics</h4>
                            <p class="card-description">Real-time site metrics</p>
                        </div>
                    </div>
                    
                    <!-- Gallery Manager Card -->
                    <div class="dashboard-funky-card" onclick="loadDashboardView('gallery')">
                        <div class="card-frosted-content">
                            <div class="card-icon">🎨</div>
                            <h4 class="card-title">Gallery Manager</h4>
                            <p class="card-description">Media organization</p>
                        </div>
                    </div>
                    
                    <!-- Portfolio Builder Card -->
                    <div class="dashboard-funky-card" onclick="loadDashboardView('portfolio')">
                        <div class="card-frosted-content">
                            <div class="card-icon">🖥️</div>
                            <h4 class="card-title">Portfolio Builder</h4>
                            <p class="card-description">Content presentation</p>
                        </div>
                    </div>
                    
                    <!-- Data Extraction Card -->
                    <div class="dashboard-funky-card" onclick="loadDashboardView('data-extraction')">
                        <div class="card-frosted-content">
                            <div class="card-icon">📁</div>
                            <h4 class="card-title">Data Extraction</h4>
                            <p class="card-description">Website analysis</p>
                        </div>
                    </div>
                    
                    <!-- Site Settings Card -->
                    <div class="dashboard-funky-card" onclick="loadDashboardView('settings')">
                        <div class="card-frosted-content">
                            <div class="card-icon">⚙️</div>
                            <h4 class="card-title">Site Settings</h4>
                            <p class="card-description">Configuration</p>
                        </div>
                    </div>
                    
                    <!-- Contact Center Card -->
                    <div class="dashboard-funky-card" onclick="loadDashboardView('contact')">
                        <div class="card-frosted-content">
                            <div class="card-icon">💬</div>
                            <h4 class="card-title">Contact Center</h4>
                            <p class="card-description">Client communication</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <!-- Individual Dashboard Views (loaded dynamically) -->
            <div id="dashboardViewContent" class="dashboard-view-content" style="display: none;">
                <button class="dashboard-back-btn" onclick="returnToDashboardGrid()">
                    ← Back to Dashboard
                </button>
                <div id="viewContentContainer" class="view-content-container">
                    <!-- Content loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>