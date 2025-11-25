<?php
/*
Gallery Images Debug - WordPress Compatible
Load WordPress to get proper URLs
*/

// Try to load WordPress
$wp_load_paths = array(
    '../../../wp-load.php',
    '../../../../wp-load.php', 
    '../../../../../wp-load.php'
);

$wp_loaded = false;
foreach ($wp_load_paths as $path) {
    if (file_exists(__DIR__ . '/' . $path)) {
        require_once(__DIR__ . '/' . $path);
        $wp_loaded = true;
        break;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gallery Images Debug</title>
    <style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f0f0f0; }
    .debug-card { background: white; margin: 10px 0; padding: 15px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .debug-image { max-width: 200px; height: auto; border: 2px solid #ddd; margin: 10px 0; display: block; }
    .debug-info { font-family: monospace; background: #f8f8f8; padding: 10px; border-radius: 4px; margin: 5px 0; word-break: break-all; }
    .status { padding: 5px 10px; border-radius: 4px; color: white; font-weight: bold; display: inline-block; }
    .working { background: #4CAF50; }
    .broken { background: #f44336; }
    </style>
</head>
<body>
    <h1>🔍 Gallery Images Debug Report</h1>
    <p><strong>Generated:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
    
    <?php 
    $base_path = __DIR__ . '/images/gallery/';
    
    // Use WordPress functions if available, otherwise fallback
    if ($wp_loaded && function_exists('get_template_directory_uri')) {
        $base_url = get_template_directory_uri() . '/images/gallery/';
        $site_url = home_url();
    } else {
        // Fallback for direct access
        $base_url = 'http://1976uk-creative.local/wp-content/themes/1976uk-creative-theme/images/gallery/';
        $site_url = 'http://1976uk-creative.local';
    }
    ?>
    
    <div class="debug-card">
        <h3>📁 Path Information</h3>
        <div class="debug-info">
            <strong>WordPress loaded:</strong> 
            <span class="status <?php echo $wp_loaded ? 'working' : 'broken'; ?>">
                <?php echo $wp_loaded ? 'YES' : 'NO'; ?>
            </span>
        </div>
        <div class="debug-info">
            <strong>Site URL:</strong> <?php echo $site_url; ?>
        </div>
        <div class="debug-info">
            <strong>Gallery folder path:</strong> <?php echo $base_path; ?>
        </div>
        <div class="debug-info">
            <strong>Gallery folder exists:</strong> 
            <span class="status <?php echo is_dir($base_path) ? 'working' : 'broken'; ?>">
                <?php echo is_dir($base_path) ? 'YES' : 'NO'; ?>
            </span>
        </div>
        <div class="debug-info">
            <strong>Image URL base:</strong> <?php echo $base_url; ?>
        </div>
    </div>
    
    <?php for ($i = 1; $i <= 6; $i++): ?>
        <?php
        $filename = "gallery-gimp-800x900-0{$i}.png";
        $file_path = $base_path . $filename;
        $file_url = $base_url . $filename;
        $file_exists = file_exists($file_path);
        $file_size = $file_exists ? filesize($file_path) : 0;
        $file_readable = $file_exists ? is_readable($file_path) : false;
        ?>
        
        <div class="debug-card">
            <h3>Gallery Card <?php echo $i; ?></h3>
            
            <div class="debug-info">
                <strong>Filename:</strong> <?php echo $filename; ?>
            </div>
            
            <div class="debug-info">
                <strong>Full Path:</strong> <?php echo $file_path; ?>
            </div>
            
            <div class="debug-info">
                <strong>Expected URL:</strong> <?php echo $file_url; ?>
            </div>
            
            <div class="debug-info">
                <strong>File Status:</strong> 
                <span class="status <?php echo $file_exists ? 'working' : 'broken'; ?>">
                    <?php echo $file_exists ? "EXISTS" : 'NOT FOUND'; ?>
                </span>
            </div>
            
            <?php if ($file_exists): ?>
                <div class="debug-info">
                    <strong>File Size:</strong> <?php echo number_format($file_size); ?> bytes
                </div>
                
                <div class="debug-info">
                    <strong>Readable:</strong> 
                    <span class="status <?php echo $file_readable ? 'working' : 'broken'; ?>">
                        <?php echo $file_readable ? 'YES' : 'NO'; ?>
                    </span>
                </div>
                
                <div class="debug-info">
                    <strong>Image Preview:</strong><br>
                    <img src="<?php echo $file_url; ?>" alt="Gallery <?php echo $i; ?>" class="debug-image" 
                         onerror="this.style.border='3px solid red'; this.alt='IMAGE FAILED TO LOAD';">
                </div>
            <?php endif; ?>
        </div>
    <?php endfor; ?>
    
    <div class="debug-card">
        <h3>� Quick Fix Test</h3>
        <p>If images show above but not on gallery page, try:</p>
        <ul>
            <li>Hard refresh gallery page: <strong>Cmd+Shift+R</strong></li>
            <li>Clear browser cache</li>
            <li>Check browser console for errors</li>
        </ul>
    </div>
</body>
</html>