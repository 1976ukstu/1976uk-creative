<?php
/**
 * Direct Dashboard Debug (no WordPress template system)
 */

// Include WordPress functions
require_once('../../../wp-load.php');

// Force no caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

$theme_path = get_template_directory();
$theme_uri = get_template_directory_uri();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard v2.0 Direct Debug</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            color: white;
            padding: 20px; 
            margin: 0;
            min-height: 100vh;
        }
        .debug-section { 
            background: rgba(255,255,255,0.1); 
            backdrop-filter: blur(10px);
            padding: 20px; 
            margin: 15px 0; 
            border-radius: 15px; 
            border: 1px solid rgba(255,255,255,0.2);
        }
        .success { color: #4ade80; }
        .error { color: #f87171; }
        .warning { color: #fbbf24; }
        pre { 
            background: rgba(0,0,0,0.2); 
            padding: 15px; 
            border-radius: 8px; 
            overflow-x: auto; 
            border: 1px solid rgba(255,255,255,0.1);
        }
        .btn {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 25px;
            margin: 5px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.3);
        }
        .btn:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-2px);
        }
        h1 { text-align: center; font-size: 2.5em; margin-bottom: 30px; text-shadow: 0 2px 4px rgba(0,0,0,0.3); }
        h3 { color: #e5e7eb; margin-top: 0; }
    </style>
</head>
<body>
    <h1>🔍 Dashboard v2.0 Direct Debug</h1>
    
    <div class="debug-section">
        <h3>📍 Current Location</h3>
        <p><strong>File Path:</strong> <code><?php echo __FILE__; ?></code></p>
        <p><strong>URL:</strong> <code><?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?></code></p>
        <p><strong>WordPress Loaded:</strong> <span class="success">✅ YES</span></p>
    </div>
    
    <div class="debug-section">
        <h3>📁 WordPress Paths</h3>
        <p><strong>Theme Directory:</strong> <code><?php echo $theme_path; ?></code></p>
        <p><strong>Theme URI:</strong> <code><?php echo $theme_uri; ?></code></p>
        <p><strong>Home URL:</strong> <code><?php echo home_url(); ?></code></p>
        <p><strong>Site URL:</strong> <code><?php echo site_url(); ?></code></p>
    </div>
    
    <div class="debug-section">
        <h3>📄 Critical Files Check</h3>
        <?php
        $files_to_check = [
            'Main Template' => $theme_path . '/page-dashboard-v2.php',
            'Simple Template' => $theme_path . '/page-dashboard-simple.php',
            'Config File' => $theme_path . '/dashboard-v2/assets/includes/dashboard-config.php',
            'Functions File' => $theme_path . '/dashboard-v2/assets/includes/dashboard-functions.php',
            'Core CSS' => $theme_path . '/dashboard-v2/assets/css/dashboard-core.css',
            'Cards CSS' => $theme_path . '/dashboard-v2/assets/css/dashboard-cards.css',
            'Upload CSS' => $theme_path . '/dashboard-v2/assets/css/dashboard-upload.css',
            'Core JS' => $theme_path . '/dashboard-v2/assets/js/dashboard-core.js',
            'Upload JS' => $theme_path . '/dashboard-v2/assets/js/dashboard-upload.js',
            'Utils JS' => $theme_path . '/dashboard-v2/assets/js/dashboard-utils.js'
        ];
        
        $all_exist = true;
        foreach ($files_to_check as $name => $path) {
            $exists = file_exists($path);
            if (!$exists) $all_exist = false;
            $class = $exists ? 'success' : 'error';
            $status = $exists ? '✅' : '❌';
            $size = $exists ? ' (' . number_format(filesize($path)) . ' bytes)' : '';
            echo "<p class='{$class}'><strong>{$name}:</strong> {$status} {$size}</p>";
        }
        ?>
        
        <div style="margin-top: 20px; padding: 15px; background: <?php echo $all_exist ? 'rgba(74, 222, 128, 0.2)' : 'rgba(248, 113, 113, 0.2)'; ?>; border-radius: 8px;">
            <?php if ($all_exist): ?>
                <p class="success"><strong>🎉 All files exist! The issue is likely with WordPress page registration or CSS loading.</strong></p>
            <?php else: ?>
                <p class="error"><strong>⚠️ Some files are missing! Please upload all dashboard-v2 files.</strong></p>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="debug-section">
        <h3>🔗 Test CSS Loading</h3>
        <?php
        $css_files = [
            'dashboard-core.css',
            'dashboard-cards.css', 
            'dashboard-upload.css'
        ];
        
        foreach ($css_files as $file) {
            $url = $theme_uri . '/dashboard-v2/assets/css/' . $file;
            echo "<p><strong>{$file}:</strong></p>";
            echo "<p><code>{$url}</code></p>";
            echo "<p><a href='{$url}' target='_blank' class='btn'>🔗 Test Direct Link</a></p>";
            echo "<hr style='border: 1px solid rgba(255,255,255,0.1); margin: 15px 0;'>";
        }
        ?>
    </div>
    
        <div class="debug-section">
        <h3>🚀 Dashboard Tests</h3>
        <p><a href="<?php echo home_url('/dashboard-v2'); ?>" class="btn" target="_blank">🎯 Test Main Dashboard</a></p>
        <p><a href="<?php echo home_url('/dashboard-simple'); ?>" class="btn" target="_blank">🔧 Test Simple Dashboard</a></p>
        <p><a href="<?php echo home_url('/dashboard-working'); ?>" class="btn" target="_blank">⚡ Test Working Dashboard</a></p>
        <p><a href="<?php echo home_url('/gallery'); ?>" class="btn" target="_blank">🎨 View Gallery</a></p>
        <p><a href="<?php echo home_url(); ?>" class="btn" target="_blank">🏠 Back to Home</a></p>
        
        <div style="margin-top: 20px; padding: 15px; background: rgba(255,255,255,0.1); border-radius: 8px; border: 1px solid rgba(255,255,255,0.2);">
            <p><strong>💡 Pro Tip:</strong> All dashboard tests open in new windows so you can keep this debug page open for quick access!</p>
        </div>
    </div>
    
    <div class="debug-section">
        <h3>🔍 Live Performance Monitor</h3>
        <div id="performance-stats" style="font-family: monospace; background: rgba(0,0,0,0.3); padding: 15px; border-radius: 8px;">
            <p>🕐 <strong>Page Load Time:</strong> <span id="load-time">Calculating...</span></p>
            <p>💾 <strong>Memory Usage:</strong> <span id="memory-usage">Checking...</span></p>
            <p>🌐 <strong>Connection Speed:</strong> <span id="connection-speed">Testing...</span></p>
            <p>📱 <strong>Device Type:</strong> <span id="device-type">Detecting...</span></p>
        </div>
        <button class="btn" onclick="refreshStats()" style="margin-top: 10px;">🔄 Refresh Stats</button>
    </div>
    
    <div class="debug-section">
        <h3>📊 WordPress Info</h3>
        <p><strong>WP Version:</strong> <?php echo get_bloginfo('version'); ?></p>
        <p><strong>Active Theme:</strong> <?php echo get_template(); ?></p>
        <p><strong>PHP Version:</strong> <?php echo PHP_VERSION; ?></p>
        <p><strong>Current User:</strong> <?php echo wp_get_current_user()->user_login ?: 'Not logged in'; ?></p>
    </div>
    
    <div class="debug-section">
        <h3>⚡ Quick Fixes</h3>
        <p>1. <strong>Create WordPress pages:</strong> Go to WP Admin → Pages → Add New</p>
        <p>2. <strong>Page Title:</strong> "Dashboard v2.0" and "Dashboard Simple"</p>
        <p>3. <strong>Template:</strong> Select "Dashboard v2.0" and "Dashboard v2 Simple"</p>
        <p>4. <strong>Publish</strong> both pages</p>
        <p>5. <strong>Test again</strong> using the buttons above</p>
    </div>
    
    <script>
    // Performance monitoring and cool features
    function updatePerformanceStats() {
        // Page load time
        if (performance && performance.timing) {
            const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
            document.getElementById('load-time').textContent = loadTime + 'ms';
        }
        
        // Memory usage (if available)
        if (performance && performance.memory) {
            const memoryUsed = Math.round(performance.memory.usedJSHeapSize / 1024 / 1024);
            const memoryTotal = Math.round(performance.memory.totalJSHeapSize / 1024 / 1024);
            document.getElementById('memory-usage').textContent = memoryUsed + 'MB / ' + memoryTotal + 'MB';
        } else {
            document.getElementById('memory-usage').textContent = 'Not available';
        }
        
        // Connection speed estimation
        if (navigator.connection) {
            const connection = navigator.connection;
            document.getElementById('connection-speed').textContent = 
                (connection.effectiveType || 'Unknown') + ' (' + (connection.downlink || '?') + ' Mbps)';
        } else {
            document.getElementById('connection-speed').textContent = 'Detection not supported';
        }
        
        // Device type detection
        const isMobile = window.innerWidth <= 768;
        const isTablet = window.innerWidth > 768 && window.innerWidth <= 1024;
        const deviceType = isMobile ? '📱 Mobile' : isTablet ? '📱 Tablet' : '🖥️ Desktop';
        const resolution = window.screen.width + 'x' + window.screen.height;
        document.getElementById('device-type').textContent = deviceType + ' (' + resolution + ')';
    }
    
    function refreshStats() {
        updatePerformanceStats();
        
        // Add a little animation
        const statsDiv = document.getElementById('performance-stats');
        statsDiv.style.opacity = '0.5';
        setTimeout(() => {
            statsDiv.style.opacity = '1';
        }, 200);
    }
    
    // Initialize stats when page loads
    window.addEventListener('load', function() {
        setTimeout(updatePerformanceStats, 100);
    });
    
    // Update stats every 5 seconds
    setInterval(updatePerformanceStats, 5000);
    
    // Add some easter eggs
    let clickCount = 0;
    document.querySelector('h1').addEventListener('click', function() {
        clickCount++;
        if (clickCount === 5) {
            this.innerHTML = '🚀 DEBUG MASTER MODE ACTIVATED! 🚀';
            document.body.style.animation = 'rainbow 2s linear infinite';
            setTimeout(() => {
                this.innerHTML = '🔍 Dashboard v2.0 Direct Debug';
                document.body.style.animation = '';
                clickCount = 0;
            }, 3000);
        }
    });
    </script>
    
    <style>
    @keyframes rainbow {
        0% { filter: hue-rotate(0deg); }
        100% { filter: hue-rotate(360deg); }
    }
    
    .btn {
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(255,255,255,0.3);
    }
    
    #performance-stats {
        transition: opacity 0.3s ease;
    }
    
    /* Make it even more special */
    .debug-section:hover {
        transform: translateY(-2px);
        transition: transform 0.3s ease;
    }
    </style>
    
</body>
</html>