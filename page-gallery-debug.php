<?php
/*
Template Name: Gallery Debug Page
*/
get_header(); ?>

<div style="font-family: Arial, sans-serif; padding: 20px; background: #f0f0f0; min-height: 100vh;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <h1 style="color: #333;">🔍 Gallery Images Debug Report</h1>
        <p><strong>Generated:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
        <p><strong>Site URL:</strong> <?php echo home_url(); ?></p>
        
        <div style="background: white; margin: 10px 0; padding: 15px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <h3>📁 WordPress Path Information</h3>
            <div style="font-family: monospace; background: #f8f8f8; padding: 10px; border-radius: 4px; margin: 5px 0; word-break: break-all;">
                <strong>Theme Directory:</strong> <?php echo get_template_directory(); ?>
            </div>
            <div style="font-family: monospace; background: #f8f8f8; padding: 10px; border-radius: 4px; margin: 5px 0; word-break: break-all;">
                <strong>Theme URI:</strong> <?php echo get_template_directory_uri(); ?>
            </div>
        </div>
        
        <?php for ($i = 1; $i <= 6; $i++): ?>
            <?php
            // Use the exact same logic as the gallery page
            $card_image = get_option("gallery_card_{$i}_image");
            $image_src = $card_image ? $card_image : get_template_directory_uri() . "/images/gallery/gallery-gimp-800x900-0{$i}.png";
            $file_path = get_template_directory() . "/images/gallery/gallery-gimp-800x900-0{$i}.png";
            $file_exists = file_exists($file_path);
            $file_size = $file_exists ? filesize($file_path) : 0;
            ?>
            
            <div style="background: white; margin: 10px 0; padding: 15px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <h3>Gallery Card <?php echo $i; ?></h3>
                
                <div style="font-family: monospace; background: #f8f8f8; padding: 10px; border-radius: 4px; margin: 5px 0;">
                    <strong>WordPress Option:</strong> <?php echo $card_image ? $card_image : 'Not set (using fallback)'; ?>
                </div>
                
                <div style="font-family: monospace; background: #f8f8f8; padding: 10px; border-radius: 4px; margin: 5px 0; word-break: break-all;">
                    <strong>Final URL:</strong> <?php echo esc_url($image_src); ?>
                </div>
                
                <div style="font-family: monospace; background: #f8f8f8; padding: 10px; border-radius: 4px; margin: 5px 0; word-break: break-all;">
                    <strong>File Path:</strong> <?php echo $file_path; ?>
                </div>
                
                <div style="font-family: monospace; background: #f8f8f8; padding: 10px; border-radius: 4px; margin: 5px 0;">
                    <strong>File Status:</strong> 
                    <span style="padding: 5px 10px; border-radius: 4px; color: white; font-weight: bold; background: <?php echo $file_exists ? '#4CAF50' : '#f44336'; ?>;">
                        <?php echo $file_exists ? "EXISTS (" . number_format($file_size) . " bytes)" : 'FILE NOT FOUND'; ?>
                    </span>
                </div>
                
                <?php if ($file_exists): ?>
                    <div style="font-family: monospace; background: #f8f8f8; padding: 10px; border-radius: 4px; margin: 5px 0;">
                        <strong>Image Preview:</strong><br>
                        <img src="<?php echo esc_url($image_src); ?>" alt="Gallery <?php echo $i; ?>" 
                             style="max-width: 200px; height: auto; border: 2px solid #ddd; margin: 10px 0; display: block;"
                             onerror="this.style.border='3px solid red'; this.alt='IMAGE FAILED TO LOAD';">
                    </div>
                    
                    <div style="font-family: monospace; background: #e8f5e8; padding: 10px; border-radius: 4px; margin: 5px 0;">
                        <strong>✅ This image should appear on the gallery page</strong>
                    </div>
                <?php else: ?>
                    <div style="font-family: monospace; background: #ffe8e8; padding: 10px; border-radius: 4px; margin: 5px 0;">
                        <strong>❌ This image will NOT appear on the gallery page</strong>
                    </div>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
        
        <div style="background: white; margin: 10px 0; padding: 15px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <h3>🔧 Quick Actions</h3>
            <p><a href="<?php echo home_url('/gallery'); ?>" style="background: #0073aa; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">→ View Gallery Page</a></p>
            <p><strong>If images show above but not on gallery page:</strong></p>
            <ul>
                <li>Hard refresh gallery page: <strong>Cmd+Shift+R</strong> (Mac) or <strong>Ctrl+Shift+R</strong> (PC)</li>
                <li>Clear browser cache completely</li>
                <li>Try opening gallery page in incognito/private mode</li>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>