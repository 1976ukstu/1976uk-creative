
<?php
/**
 * Template Name: Contact Page Contact
 */

get_header();
// Add ACF color picker background for non-home pages
if (!is_front_page() && !is_home()) {
    $bg_colour = get_field('background_colour_contact'); // Use the correct field name for this page
    if ($bg_colour) {
        echo '<style>body.page { background-color: ' . esc_attr($bg_colour) . ' !important; }</style>';
    }
}
?>

<div class="site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: inherit; text-decoration: none;">
        Dragica<br>Carlin
    </a>
</div>

<button class="hamburger" aria-label="Open menu">
    <span></span>
    <span></span>
    <span></span>
</button>

<div class="side-panel">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'side-panel',
        'menu_class'     => 'side-menu',
        'fallback_cb'    => false,
    ) );
    ?>
</div>

<div id="primary" class="content-area">
    <main id="main" class="site-main video-bg-content">
        <?php while ( have_posts() ) : the_post(); ?>
            
            <!-- Contact Content with Video Background -->
            <div class="contact-video-bg-content">
                
                <!-- Main Contact Card -->
                <div class="contact-main-card">
                    <div class="contact-card-header">
                        <h2>Contact me for more information</h2>
                        <p>Please email me at <a href="mailto:dragicajanketiccarlin@gmail.com" target="_blank">dragicajanketiccarlin@gmail.com</a></p>
                        <p>or call me on <a href="tel:+447946127346">+44 7946 127346</a></p>
                    </div>
                    
                    <!-- Contact Form Section - COMMENTED OUT FOR FUTURE USE -->
                    <!-- 
                    <div class="contact-form-video-bg">
                        <!-- WordPress Content (for contact forms from admin) -->
                        <div class="entry-content">
                            <?php // the_content(); ?>
                        </div>
                        
                        <!-- Fallback Contact Form -->
                        <div class="contact-form-fallback">
                            <?php
                            /*
                            $status = $_GET['contact_status'] ?? '';
                            if ($status === 'success') {
                                echo '<div class="contact-success-message" style="color:green; font-weight:bold; margin-bottom:1em;">Thank you! Your message has been sent.</div>';
                            } elseif ($status === 'error') {
                                echo '<div class="contact-error-message" style="color:red; font-weight:bold; margin-bottom:1em;">Sorry, there was a problem sending your message. Please try again later.</div>';
                            }
                            */
                            ?>
                            <!--
                            <form class="artist-contact-form" action="<?php echo esc_url(get_permalink()); ?>" method="post">
                                <input type="hidden" name="artist_contact_form_submitted" value="1">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" id="name" name="name" required value="<?php echo isset($_POST['name']) ? esc_attr($_POST['name']) : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" name="subject" value="<?php echo isset($_POST['subject']) ? esc_attr($_POST['subject']) : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="project-type">Project Type</label>
                                    <select id="project-type" name="project-type">
                                        <option value="">Select a project type</option>
                                        <option value="commission" <?php selected($_POST['project-type'] ?? '', 'commission'); ?>>Custom Commission</option>
                                        <option value="mural" <?php selected($_POST['project-type'] ?? '', 'mural'); ?>>Mural Project</option>
                                        <option value="purchase" <?php selected($_POST['project-type'] ?? '', 'purchase'); ?>>Purchase Existing Work</option>
                                        <option value="collaboration" <?php selected($_POST['project-type'] ?? '', 'collaboration'); ?>>Collaboration</option>
                                        <option value="other" <?php selected($_POST['project-type'] ?? '', 'other'); ?>>Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea id="message" name="message" rows="6" required placeholder="Tell me about your vision, timeline, and any specific requirements..."><?php echo isset($_POST['message']) ? esc_textarea($_POST['message']) : ''; ?></textarea>
                                </div>
                                <button type="submit" class="contact-submit-btn">Send Message</button>
                            </form>
                            -->
                        </div>
                    </div>
                    
                </div>
                
                <!-- Admin Email Test Section - COMMENTED OUT FOR FUTURE USE -->
                <?php /*
                if (current_user_can('administrator')): ?>
                <div class="admin-email-test" style="background: #f0f0f0; border: 2px solid #007cba; border-radius: 5px; padding: 20px; margin: 20px 0;">
                    <h3 style="color: #007cba; margin-top: 0;">🔧 Email Test (Admin Only)</h3>
                    
                    <?php if (isset($_POST['test_email_now'])): ?>
                        <?php
                        // Capture PHPMailer errors
                        $error_message = '';
                        add_action('wp_mail_failed', function($wp_error) use (&$error_message) {
                            $error_message = $wp_error->get_error_message();
                        });
                        
                        $test_result = wp_mail('dragicajanketiccarlin@gmail.com', 'Email Test - ' . date('H:i:s'), 
                            'Test email sent from contact page at ' . date('Y-m-d H:i:s') . "\n\nIf you receive this, your email is working!");
                        ?>
                        <div style="padding: 10px; margin: 10px 0; border-radius: 3px; <?php 
                        echo $test_result ? 'background: #d4edda; color: #155724;' : 'background: #f8d7da; color: #721c24;';
                        ?>">
                            <strong>Test Result:</strong> <?php echo $test_result ? '✅ wp_mail() returned SUCCESS!' : '❌ wp_mail() returned FAILED!'; ?>
                            <?php if (!$test_result && $error_message): ?>
                                <br><strong>Error:</strong> <?php echo esc_html($error_message); ?>
                            <?php endif; ?>
                            <?php if (!$test_result): ?>
                                <br><strong>Common Causes:</strong>
                                <ul style="margin: 5px 0; padding-left: 20px; font-size: 12px;">
                                    <li>Hosting provider blocks outgoing mail</li>
                                    <li>No mail server configured</li>
                                    <li>Server firewall blocking port 25</li>
                                    <li>Missing sendmail/postfix issues</li>
                                </ul>
                                <strong>📋 Solution:</strong> Install WP Mail SMTP plugin or configure SMTP settings
                            <?php else: ?>
                                <br><small>Check your inbox for the test email. If wp_mail() succeeded but no email arrives, it's a server/hosting issue.</small>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($_POST['test_php_mail'])): ?>
                        <?php
                        $headers = "From: " . get_bloginfo('name') . " <noreply@" . parse_url(home_url(), PHP_URL_HOST) . ">\r\n";
                        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                        $php_result = mail('dragicajanketiccarlin@gmail.com', 'PHP Mail Test - ' . date('H:i:s'), 
                            'Direct PHP mail() test sent at ' . date('Y-m-d H:i:s'), $headers);
                        ?>
                        <div style="padding: 10px; margin: 10px 0; border-radius: 3px; <?php 
                        echo $php_result ? 'background: #d4edda; color: #155724;' : 'background: #f8d7da; color: #721c24;';
                        ?>">
                            <strong>PHP mail() Test:</strong> <?php echo $php_result ? '✅ Server CAN send emails!' : '❌ Server CANNOT send emails!'; ?>
                            <?php if ($php_result): ?>
                                <br><small>✅ Server mail works - WordPress configuration issue</small>
                            <?php else: ?>
                                <br><small>❌ Server mail blocked - hosting/server issue</small>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" style="margin: 10px 0;">
                        <button type="submit" name="test_email_now" style="background: #007cba; color: white; border: none; padding: 8px 15px; border-radius: 3px; cursor: pointer; margin-right: 10px;">
                            📧 Test WordPress Mail
                        </button>
                        <button type="submit" name="test_php_mail" style="background: #28a745; color: white; border: none; padding: 8px 15px; border-radius: 3px; cursor: pointer;">
                            🔧 Test Server Mail
                        </button>
                    </form>
                    
                    <div style="font-size: 12px; color: #666; margin-top: 10px;">
                        <strong>Debug Info:</strong><br>
                        Server: <?php echo $_SERVER['SERVER_NAME']; ?><br>
                        PHP mail(): <?php echo function_exists('mail') ? '✅ Available' : '❌ Not Available'; ?><br>
                        Admin Email: <?php echo get_option('admin_email'); ?>
                    </div>
                </div>
                <?php endif;
                */ ?>
            </div>
            
        <?php endwhile; ?>
    </main>
</div>

<?php get_footer(); ?>
