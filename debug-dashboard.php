<?php
/**
 * Dashboard v2.0 Debug - Check File Loading
 */

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
    <title>Dashboard v2.0 Debug</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .debug-section { background: white; padding: 20px; margin: 10px 0; border-radius: 10px; }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        .warning { color: #ffc107; }
        pre { background: #f8f9fa; padding: 10px; border-radius: 5px; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>🔍 Dashboard v2.0 Debug</h1>
    
    <div class="debug-section">
        <h3>📁 File Locations</h3>
        <p><strong>Theme Path:</strong> <code><?php echo $theme_path; ?></code></p>
        <p><strong>Theme URI:</strong> <code><?php echo $theme_uri; ?></code></p>
    </div>
    
    <div class="debug-section">
        <h3>📄 File Existence Check</h3>
        <?php
        $files_to_check = [
            'page-dashboard-v2.php' => $theme_path . '/page-dashboard-v2.php',
            'dashboard-config.php' => $theme_path . '/dashboard-v2/assets/includes/dashboard-config.php',
            'dashboard-functions.php' => $theme_path . '/dashboard-v2/assets/includes/dashboard-functions.php',
            'dashboard-core.css' => $theme_path . '/dashboard-v2/assets/css/dashboard-core.css',
            'dashboard-cards.css' => $theme_path . '/dashboard-v2/assets/css/dashboard-cards.css',
            'dashboard-upload.css' => $theme_path . '/dashboard-v2/assets/css/dashboard-upload.css',
            'dashboard-core.js' => $theme_path . '/dashboard-v2/assets/js/dashboard-core.js',
            'dashboard-upload.js' => $theme_path . '/dashboard-v2/assets/js/dashboard-upload.js',
            'dashboard-utils.js' => $theme_path . '/dashboard-v2/assets/js/dashboard-utils.js'
        ];
        
        foreach ($files_to_check as $name => $path) {
            $exists = file_exists($path);
            $class = $exists ? 'success' : 'error';
            $status = $exists ? '✅ EXISTS' : '❌ MISSING';
            echo "<p class='{$class}'><strong>{$name}:</strong> {$status} - <code>{$path}</code></p>";
        }
        ?>
    </div>
    
    <div class="debug-section">
        <h3>🔗 CSS URLs</h3>
        <?php
        $css_files = ['dashboard-core.css', 'dashboard-cards.css', 'dashboard-upload.css'];
        foreach ($css_files as $file) {
            $url = $theme_uri . '/dashboard-v2/assets/css/' . $file;
            echo "<p><strong>{$file}:</strong><br><code>{$url}</code></p>";
            echo "<p><a href='{$url}' target='_blank'>Test Link</a></p><hr>";
        }
        ?>
    </div>
    
    <div class="debug-section">
        <h3>🎯 Actions</h3>
        <p><a href="/dashboard-v2" style="background: #007cba; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">🚀 Try Dashboard v2.0</a></p>
        <p><a href="/gallery" style="background: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">🎨 View Gallery</a></p>
    </div>
    
    <div class="debug-section">
        <h3>🔧 WordPress Info</h3>
        <p><strong>WordPress Version:</strong> <?php echo get_bloginfo('version'); ?></p>
        <p><strong>Theme Name:</strong> <?php echo get_template(); ?></p>
        <p><strong>Site URL:</strong> <?php echo home_url(); ?></p>
    </div>
    
</body>
</html>