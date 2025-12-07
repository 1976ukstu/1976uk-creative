<?php
/**
 * Dashboard v2.0 Configuration
 * 
 * Centralized configuration and settings for the modular dashboard system
 * Version: 2.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Dashboard v2.0 Configuration Class
 */
class DashboardV2Config {
    
    // Dashboard version
    const VERSION = '2.0.0';
    
    // Dashboard settings - Use stronger password in production
    const PASSWORD = '1976uk_Creative_Dashboard_2024!';
    const SESSION_KEY = 'dashboard_v2_authenticated';
    const CARDS_COUNT = 6;
    
    // File paths
    public static function get_css_path() {
        return get_template_directory_uri() . '/dashboard-v2/assets/css/';
    }
    
    public static function get_js_path() {
        return get_template_directory_uri() . '/dashboard-v2/assets/js/';
    }
    
    public static function get_includes_path() {
        return get_template_directory() . '/dashboard-v2/assets/includes/';
    }
    
    // Gallery card configuration
    public static function get_card_defaults() {
        return [
            1 => [
                'title' => 'Creative Project 1',
                'description' => 'Dashboard-managed showcase piece demonstrating professional gallery management...',
                'image' => get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-01.png'
            ],
            2 => [
                'title' => 'Creative Project 2',
                'description' => 'Another example of dashboard-managed content with instant editing capabilities...',
                'image' => get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-02.png'
            ],
            3 => [
                'title' => 'Creative Project 3',
                'description' => 'Professional gallery item managed through dashboard interface...',
                'image' => get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-03.png'
            ],
            4 => [
                'title' => 'Creative Project 4',
                'description' => 'The dashboard system makes gallery management incredibly simple and beautiful...',
                'image' => get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-04.png'
            ],
            5 => [
                'title' => 'Creative Project 5',
                'description' => 'Photographer-friendly interface with professional workflow integration...',
                'image' => get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-05.png'
            ],
            6 => [
                'title' => 'Creative Project 6',
                'description' => 'Complete system demonstration showcasing full dashboard capabilities...',
                'image' => get_template_directory_uri() . '/images/gallery/gallery-gimp-800x900-06.png'
            ]
        ];
    }
    
    // CSS files to load
    public static function get_css_files() {
        return [
            'dashboard-core.css',
            'dashboard-cards.css',
            'dashboard-upload.css'
        ];
    }
    
    // JavaScript files to load
    public static function get_js_files() {
        return [
            'dashboard-core.js',
            'dashboard-upload.js',
            'dashboard-utils.js'
        ];
    }
}
?>