<?php
// --- Enhanced Contact Form Handler with Gmail Forwarding & Spam Protection ---
add_action('init', function() {
    if (
        isset($_POST['artist_contact_form_submitted']) &&
        isset($_POST['name'], $_POST['email'], $_POST['message']) &&
        !empty($_POST['name']) &&
        !empty($_POST['email']) &&
        !empty($_POST['message'])
    ) {
        // Basic spam protection
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
        
        // Simple honeypot check (add hidden field to form)
        if (!empty($_POST['website'])) {
            error_log('Spam detected (honeypot triggered) from IP: ' . $ip);
            wp_safe_redirect(add_query_arg('contact_status', 'error', wp_get_referer()));
            exit;
        }
        
        // Rate limiting - only allow 1 submission per minute per IP
        $submission_key = 'contact_submission_' . md5($ip);
        $last_submission = get_transient($submission_key);
        if ($last_submission) {
            error_log('Rate limit exceeded from IP: ' . $ip);
            wp_safe_redirect(add_query_arg('contact_status', 'error', wp_get_referer()));
            exit;
        }
        set_transient($submission_key, time(), 60); // 1 minute cooldown
        
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject'] ?? '');
        $project_type = sanitize_text_field($_POST['project-type'] ?? '');
        $message = sanitize_textarea_field($_POST['message']);
        
        // Additional spam detection
        $spam_words = ['hello world', 'test', 'generic', 'lorem ipsum', 'click here', 'free money'];
        $combined_text = strtolower($name . ' ' . $subject . ' ' . $message);
        foreach ($spam_words as $spam_word) {
            if (strpos($combined_text, $spam_word) !== false) {
                error_log('Potential spam detected (keyword: ' . $spam_word . ') from: ' . $email);
                // Still process but flag as suspicious
                $subject = '[SUSPICIOUS] ' . $subject;
                break;
            }
        }
        
        // Log form submission attempt
        error_log('Contact form submitted by: ' . $name . ' (' . $email . ') from IP: ' . $ip);
        
        // Multiple recipients - both cPanel webmail AND Gmail
        $recipients = array(
            'stuart@1976uk.com',     // Your cPanel email
            'your-gmail@gmail.com'   // Add your Gmail address here
        );
        
        $mail_subject = ($subject ? $subject . ' - ' : '') . '1976uk Website Contact Form';
        $body = "=== 1976uk WEBSITE CONTACT FORM ===\n\n";
        $body .= "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Project Type: $project_type\n";
        $body .= "Subject: $subject\n\n";
        $body .= "Message:\n" . $message . "\n\n";
        $body .= "=== TECHNICAL INFO ===\n";
        $body .= "IP Address: $ip\n";
        $body .= "User Agent: $user_agent\n";
        $body .= "Submitted: " . date('Y-m-d H:i:s') . "\n";
        
        // Enhanced headers for better deliverability
        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'Reply-To: ' . $name . ' <' . $email . '>',
            'From: 1976uk Creative <noreply@' . parse_url(home_url(), PHP_URL_HOST) . '>',
            'X-Mailer: 1976uk Creative Contact Form',
            'X-Originating-IP: ' . $ip
        );
        
        $success_count = 0;
        if (is_email($email)) {
            // Send to all recipients
            foreach ($recipients as $recipient) {
                error_log('Attempting to send email to: ' . $recipient);
                
                $individual_success = wp_mail($recipient, $mail_subject, $body, $headers);
                
                if ($individual_success) {
                    error_log('Email sent successfully to: ' . $recipient);
                    $success_count++;
                } else {
                    error_log('Email failed to: ' . $recipient);
                    
                    // Try fallback with PHP mail()
                    $php_headers = implode("\r\n", array(
                        "From: 1976uk Creative <noreply@" . parse_url(home_url(), PHP_URL_HOST) . ">",
                        "Reply-To: " . $name . " <" . $email . ">",
                        "Content-Type: text/plain; charset=UTF-8",
                        "X-Mailer: 1976uk Creative Contact Form",
                        "X-Originating-IP: " . $ip
                    ));
                    
                    $php_success = mail($recipient, $mail_subject, $body, $php_headers);
                    if ($php_success) {
                        error_log('PHP mail() backup successful to: ' . $recipient);
                        $success_count++;
                    } else {
                        error_log('PHP mail() backup failed to: ' . $recipient);
                    }
                }
            }
        } else {
            error_log('Invalid email address provided: ' . $email);
        }
        
        // Determine overall success
        $overall_success = $success_count > 0;
        
        // Redirect back to the form page with status
        $contact_page_url = get_permalink(get_page_by_path('contact'));
        $redirect_url = add_query_arg([
            'contact_status' => $overall_success ? 'success' : 'error',
        ], wp_get_referer() ?: $contact_page_url);
        
        error_log('Redirecting to: ' . $redirect_url . ' with status: ' . ($overall_success ? 'success' : 'error') . ' (sent to ' . $success_count . ' recipients)');
        
        wp_safe_redirect($redirect_url);
        exit;
    }
});

// --- Fixed Email Configuration - Use PHP Mail Instead of SMTP ---
// Since server can send emails but SMTP fails, use PHP mail() directly
function configure_wp_mail_php() {
    add_action('phpmailer_init', 'configure_phpmailer_php_mail');
}
add_action('init', 'configure_wp_mail_php');

function configure_phpmailer_php_mail($phpmailer) {
    // Use PHP mail() function instead of SMTP since server supports it
    $phpmailer->isMail(); // This tells PHPMailer to use PHP mail() instead of SMTP
    
    // Set proper From address using your domain
    $domain = parse_url(home_url(), PHP_URL_HOST);
    $phpmailer->From = 'noreply@' . $domain;
    $phpmailer->FromName = get_bloginfo('name');
    
    // Set proper encoding
    $phpmailer->CharSet = 'UTF-8';
    $phpmailer->Encoding = '8bit';
    
    // Disable SMTP completely
    $phpmailer->SMTPDebug = 0;
    
    // Add some basic headers for better deliverability
    $phpmailer->addCustomHeader('X-Mailer', 'WordPress via PHP mail()');
}

// Add email testing functionality to admin
function add_email_test_to_admin() {
    if (current_user_can('administrator') && isset($_GET['test_email']) && $_GET['test_email'] === 'send') {
        $test_result = wp_mail('stuart@1976uk.com', 'Test Email from ' . get_bloginfo('name'), 
            'This is a test email sent at ' . date('Y-m-d H:i:s') . ' to verify email functionality.');
        
        add_action('admin_notices', function() use ($test_result) {
            $class = $test_result ? 'notice-success' : 'notice-error';
            $message = $test_result ? 'Test email sent successfully!' : 'Test email failed to send. Check error logs.';
            echo '<div class="notice ' . $class . ' is-dismissible"><p>' . $message . '</p></div>';
        });
    }
}
add_action('admin_init', 'add_email_test_to_admin');

// Add email test button to admin bar
function add_email_test_admin_bar($wp_admin_bar) {
    if (current_user_can('administrator')) {
        $wp_admin_bar->add_node(array(
            'id' => 'test_email',
            'title' => 'Test Email',
            'href' => admin_url('?test_email=send'),
        ));
    }
}
add_action('admin_bar_menu', 'add_email_test_admin_bar', 999);

/**
 * Functions and definitions for the 1976uk Artist Theme
 *
 * This file is responsible for setting up the theme, including registering menus,
 * sidebars, and other theme features.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Theme setup function
function artist_theme_setup() {
    // Add support for automatic feed links
    add_theme_support( 'automatic-feed-links' );

    // Add support for title tag
    add_theme_support( 'title-tag' );

    // Add support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add theme support for menus
    add_theme_support( 'menus' );
    
    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'artist-theme' ),
        'side-panel' => __( 'Side Panel Menu', 'artist-theme' ),
    ) );
    
    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
}
add_action( 'after_setup_theme', 'artist_theme_setup' );

// Register Custom Post Type for Weekly Updates
function create_weekly_updates_post_type() {
    $labels = array(
        'name'                  => _x( 'Weekly Updates', 'Post Type General Name', 'artist-theme' ),
        'singular_name'         => _x( 'Weekly Update', 'Post Type Singular Name', 'artist-theme' ),
        'menu_name'             => __( 'This Week...', 'artist-theme' ),
        'name_admin_bar'        => __( 'Weekly Update', 'mycustomtheme' ),
        'archives'              => __( 'Weekly Archives', 'mycustomtheme' ),
        'attributes'            => __( 'Weekly Attributes', 'mycustomtheme' ),
        'parent_item_colon'     => __( 'Parent Weekly Update:', 'mycustomtheme' ),
        'all_items'             => __( 'All Weekly Updates', 'mycustomtheme' ),
        'add_new_item'          => __( 'Add New Weekly Update', 'mycustomtheme' ),
        'add_new'               => __( 'Add New', 'mycustomtheme' ),
        'new_item'              => __( 'New Weekly Update', 'mycustomtheme' ),
        'edit_item'             => __( 'Edit Weekly Update', 'mycustomtheme' ),
        'update_item'           => __( 'Update Weekly Update', 'mycustomtheme' ),
        'view_item'             => __( 'View Weekly Update', 'mycustomtheme' ),
        'view_items'            => __( 'View Weekly Updates', 'mycustomtheme' ),
        'search_items'          => __( 'Search Weekly Updates', 'mycustomtheme' ),
        'not_found'             => __( 'Not found', 'mycustomtheme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'mycustomtheme' ),
        'featured_image'        => __( 'Weekly Image', 'mycustomtheme' ),
        'set_featured_image'    => __( 'Set weekly image', 'mycustomtheme' ),
        'remove_featured_image' => __( 'Remove weekly image', 'mycustomtheme' ),
        'use_featured_image'    => __( 'Use as weekly image', 'mycustomtheme' ),
        'insert_into_item'      => __( 'Insert into weekly update', 'mycustomtheme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this weekly update', 'mycustomtheme' ),
        'items_list'            => __( 'Weekly updates list', 'mycustomtheme' ),
        'items_list_navigation' => __( 'Weekly updates list navigation', 'mycustomtheme' ),
        'filter_items_list'     => __( 'Filter weekly updates list', 'mycustomtheme' ),
    );
    
    $args = array(
        'label'                 => __( 'Weekly Update', 'mycustomtheme' ),
        'description'           => __( 'Weekly artistic updates and insights', 'mycustomtheme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-calendar-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Enables Gutenberg editor and mobile app support
        'rest_base'             => 'weekly-updates', // Custom REST API endpoint
        'rest_controller_class' => 'WP_REST_Posts_Controller', // Use standard posts controller
    );
    
    register_post_type( 'weekly_update', $args );
}
add_action( 'init', 'create_weekly_updates_post_type', 0 );

// Ensure Weekly Updates appear in mobile app
function ensure_weekly_updates_in_rest_api() {
    // Force refresh of rewrite rules to ensure REST endpoints work
    if ( get_option( 'weekly_updates_rest_refresh' ) !== 'done' ) {
        flush_rewrite_rules();
        update_option( 'weekly_updates_rest_refresh', 'done' );
    }
}
add_action( 'init', 'ensure_weekly_updates_in_rest_api', 1 );

// Add custom capabilities for Weekly Updates
function add_weekly_updates_capabilities() {
    $role = get_role( 'administrator' );
    if ( $role ) {
        $role->add_cap( 'edit_weekly_updates' );
        $role->add_cap( 'edit_others_weekly_updates' );
        $role->add_cap( 'publish_weekly_updates' );
        $role->add_cap( 'read_private_weekly_updates' );
        $role->add_cap( 'delete_weekly_updates' );
        $role->add_cap( 'delete_private_weekly_updates' );
        $role->add_cap( 'delete_published_weekly_updates' );
        $role->add_cap( 'delete_others_weekly_updates' );
        $role->add_cap( 'edit_private_weekly_updates' );
        $role->add_cap( 'edit_published_weekly_updates' );
    }
}
add_action( 'admin_init', 'add_weekly_updates_capabilities' );

// Enqueue scripts and styles
function artist_theme_scripts() {
    // Enqueue Google Fonts (proper way, not @import)
    wp_enqueue_style( 'artist-theme-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null );

    // Enqueue main stylesheet with version for cache busting
    wp_enqueue_style( 'artist-theme-style', get_stylesheet_uri(), array('artist-theme-fonts'), '1.0.2' );

    // Enqueue additional styles
    wp_enqueue_style( 'artist-theme-custom-style', get_template_directory_uri() . '/assets/css/style.css', array('artist-theme-style'), '1.0.2' );

    // Enqueue JavaScript file
    wp_enqueue_script( 'artist-theme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0.3', true );
}
add_action( 'wp_enqueue_scripts', 'artist_theme_scripts' );

// Only remove specific problematic styles, keep accessibility ones
function artist_theme_clean_styles() {
    // Only remove block library styles if not using Gutenberg blocks
    // This keeps accessibility styles while removing potential @import issues
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'artist_theme_clean_styles', 1 );

// Custom menu fallback for 1976uk Creative (Production: Websites + Contact only)
function creative_lab_fallback_menu() {
    echo '<nav class="home-menu"><ul>';
    
    // Websites Page - Primary focus for launch
    $websites_page = get_page_by_path('websites');
    if ($websites_page) {
        echo '<li><a href="' . get_permalink($websites_page->ID) . '">Websites</a></li>';
    }
    
    // Contact Page - Essential for business
    $contact_page = get_page_by_path('contact');
    if ($contact_page) {
        echo '<li><a href="' . get_permalink($contact_page->ID) . '">Contact</a></li>';
    }
    
    echo '</ul></nav>';
}

// Custom side menu fallback for other pages (Production: Websites + Contact only)
function creative_lab_side_fallback_menu() {
    echo '<ul class="side-menu">';
    
    // Websites Page - Interactive gallery showcase
    $websites_page = get_page_by_path('websites');
    if ($websites_page) {
        echo '<li><a href="' . get_permalink($websites_page->ID) . '">Websites</a></li>';
    }
    
    // Contact Page - Business inquiries
    $contact_page = get_page_by_path('contact');
    if ($contact_page) {
        echo '<li><a href="' . get_permalink($contact_page->ID) . '">Contact</a></li>';
    }
    
    echo '</ul>';
}

// Additional custom functions can be added below
?>