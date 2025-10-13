<?php
/**
 * Template Name: Contact
 * 
 * Clean contact page for 1976uk Creative
 * Professional contact form with email functionality
 */
get_header();
?>

<div class="site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: inherit; text-decoration: none;">
        <span class="main-title">1976uk</span>
        <span class="sub-title">Creative</span>
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
        'fallback_cb'    => 'creative_lab_side_fallback_menu',
    ) );
    ?>
</div>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        
        <!-- Contact Page Content -->
        <div class="contact-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Contact Form Section -->
                    <div class="contact-form-section">
                        
                        <!-- Main Contact Card -->
                        <div class="contact-main-card">
                            <div class="contact-card-header">
                                <h2>Let's Create Something Amazing</h2>
                                <p>Interested in collaborating on a project? Have a development idea or need technical consultation? I'd love to hear from you.</p>
                            </div>
                            
                            <!-- WordPress Content (if any contact form plugins are used) -->
                            <?php if (get_the_content()) : ?>
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Main Contact Form -->
                            <div class="contact-form-main">
                                <?php
                                // Handle form submission
                                if (isset($_POST['artist_contact_form_submitted'])) {
                                    $name = sanitize_text_field($_POST['name']);
                                    $email = sanitize_email($_POST['email']);
                                    $subject = sanitize_text_field($_POST['subject']);
                                    $project_type = sanitize_text_field($_POST['project-type']);
                                    $message = sanitize_textarea_field($_POST['message']);
                                    
                                    if (!empty($name) && !empty($email) && !empty($message)) {
                                        $email_subject = !empty($subject) ? $subject : 'New Contact Form Submission';
                                        if (!empty($project_type)) {
                                            $email_subject .= ' (' . $project_type . ')';
                                        }
                                        
                                        $email_message = "Name: {$name}\n";
                                        $email_message .= "Email: {$email}\n";
                                        if (!empty($project_type)) {
                                            $email_message .= "Project Type: {$project_type}\n";
                                        }
                                        $email_message .= "\nMessage:\n{$message}";
                                        
                                        $headers = array(
                                            'Content-Type: text/plain; charset=UTF-8',
                                            'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
                                            'Reply-To: ' . $name . ' <' . $email . '>'
                                        );
                                        
                                        $sent = wp_mail(get_option('admin_email'), $email_subject, $email_message, $headers);
                                        
                                        if ($sent) {
                                            wp_redirect(add_query_arg('contact_status', 'success', get_permalink()));
                                            exit;
                                        } else {
                                            wp_redirect(add_query_arg('contact_status', 'error', get_permalink()));
                                            exit;
                                        }
                                    }
                                }
                                
                                // Display status messages
                                $status = $_GET['contact_status'] ?? '';
                                if ($status === 'success') {
                                    echo '<div class="contact-success-message">Thank you! Your message has been sent successfully.</div>';
                                } elseif ($status === 'error') {
                                    echo '<div class="contact-error-message">Sorry, there was a problem sending your message. Please try again later.</div>';
                                }
                                ?>
                                
                                <form class="artist-contact-form" action="<?php echo esc_url(get_permalink()); ?>" method="post">
                                    <input type="hidden" name="artist_contact_form_submitted" value="1">
                                    
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" id="name" name="name" required 
                                                   value="<?php echo isset($_POST['name']) ? esc_attr($_POST['name']) : ''; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" id="email" name="email" required 
                                                   value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" id="subject" name="subject" 
                                               value="<?php echo isset($_POST['subject']) ? esc_attr($_POST['subject']) : ''; ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="project-type">Project Type</label>
                                        <select id="project-type" name="project-type">
                                            <option value="">Select a project type</option>
                                            <option value="web-development" <?php selected($_POST['project-type'] ?? '', 'web-development'); ?>>Web Development</option>
                                            <option value="wordpress-site" <?php selected($_POST['project-type'] ?? '', 'wordpress-site'); ?>>WordPress Site</option>
                                            <option value="dashboard-system" <?php selected($_POST['project-type'] ?? '', 'dashboard-system'); ?>>Dashboard/Management System</option>
                                            <option value="creative-project" <?php selected($_POST['project-type'] ?? '', 'creative-project'); ?>>Creative Project</option>
                                            <option value="collaboration" <?php selected($_POST['project-type'] ?? '', 'collaboration'); ?>>Collaboration</option>
                                            <option value="consultation" <?php selected($_POST['project-type'] ?? '', 'consultation'); ?>>Technical Consultation</option>
                                            <option value="other" <?php selected($_POST['project-type'] ?? '', 'other'); ?>>Other</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="message">Message *</label>
                                        <textarea id="message" name="message" rows="6" required 
                                                  placeholder="Tell me about your project idea, requirements, timeline, or any questions you have..."><?php echo isset($_POST['message']) ? esc_textarea($_POST['message']) : ''; ?></textarea>
                                    </div>
                                    
                                    <button type="submit" class="contact-submit-btn">Send Message</button>
                                </form>
                            </div>
                        </div>
                        
                        <?php if (current_user_can('administrator')): ?>
                        <!-- Admin Email Test Section -->
                        <div class="admin-email-test">
                            <h3>🔧 Email Test (Admin Only)</h3>
                            
                            <?php if (isset($_POST['test_email_now'])): ?>
                                <?php
                                $error_message = '';
                                add_action('wp_mail_failed', function($wp_error) use (&$error_message) {
                                    $error_message = $wp_error->get_error_message();
                                });
                                
                                $test_result = wp_mail(get_option('admin_email'), 'Email Test - ' . date('H:i:s'), 
                                    'Test email sent from contact page at ' . date('Y-m-d H:i:s') . "\n\nIf you receive this, your email is working!");
                                ?>
                                <div class="test-result <?php echo $test_result ? 'success' : 'error'; ?>">
                                    <strong>Test Result:</strong> <?php echo $test_result ? '✅ wp_mail() returned SUCCESS!' : '❌ wp_mail() returned FAILED!'; ?>
                                    <?php if (!$test_result && $error_message): ?>
                                        <br><strong>Error:</strong> <?php echo esc_html($error_message); ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (isset($_POST['test_php_mail'])): ?>
                                <?php
                                $headers = "From: " . get_bloginfo('name') . " <noreply@" . parse_url(home_url(), PHP_URL_HOST) . ">\r\n";
                                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                                $php_result = mail(get_option('admin_email'), 'PHP Mail Test - ' . date('H:i:s'), 
                                    'Direct PHP mail() test sent at ' . date('Y-m-d H:i:s'), $headers);
                                ?>
                                <div class="test-result <?php echo $php_result ? 'success' : 'error'; ?>">
                                    <strong>PHP mail() Test:</strong> <?php echo $php_result ? '✅ Server CAN send emails!' : '❌ Server CANNOT send emails!'; ?>
                                </div>
                            <?php endif; ?>

                            <form method="post" class="email-test-form">
                                <button type="submit" name="test_email_now" class="test-btn primary">
                                    📧 Test WordPress Mail
                                </button>
                                <button type="submit" name="test_php_mail" class="test-btn secondary">
                                    🔧 Test Server Mail
                                </button>
                            </form>
                            
                            <div class="debug-info">
                                <strong>Debug Info:</strong><br>
                                Server: <?php echo $_SERVER['SERVER_NAME']; ?><br>
                                PHP mail(): <?php echo function_exists('mail') ? '✅ Available' : '❌ Not Available'; ?><br>
                                Admin Email: <?php echo get_option('admin_email'); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
        </div>
        
    </main>
</div>

<style>
/* Clean Contact Page Styling */
.contact-content {
    min-height: 80vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
}

.contact-form-section {
    width: 100%;
    max-width: 800px;
}

.contact-main-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    color: #333;
    margin-bottom: 30px;
}

.contact-card-header {
    text-align: center;
    margin-bottom: 30px;
}

.contact-card-header h2 {
    color: #333;
    font-size: 2em;
    margin: 0 0 15px 0;
    font-weight: 300;
}

.contact-card-header p {
    color: #666;
    font-size: 1.1em;
    line-height: 1.5;
    margin: 0;
}

.entry-content {
    margin-bottom: 20px;
}

.artist-contact-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
    color: #333;
    font-weight: 500;
    font-size: 0.95em;
}

.form-group input,
.form-group select,
.form-group textarea {
    background: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    padding: 12px 15px;
    color: #333;
    font-size: 1em;
    transition: all 0.3s ease;
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: rgba(0, 0, 0, 0.5);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #667eea;
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.form-group select {
    cursor: pointer;
}

.form-group select option {
    background: #fff;
    color: #333;
}

.form-group textarea {
    resize: vertical;
    min-height: 120px;
    line-height: 1.5;
}

.contact-submit-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 25px;
    padding: 15px 40px;
    font-size: 1.1em;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    align-self: center;
    margin-top: 10px;
}

.contact-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
}

.contact-submit-btn:active {
    transform: translateY(0);
}

.contact-success-message,
.contact-error-message {
    padding: 15px;
    border-radius: 10px;
    text-align: center;
    font-weight: 600;
    margin-bottom: 20px;
}

.contact-success-message {
    background: rgba(46, 204, 113, 0.2);
    border: 1px solid rgba(46, 204, 113, 0.5);
    color: #27ae60;
}

.contact-error-message {
    background: rgba(231, 76, 60, 0.2);
    border: 1px solid rgba(231, 76, 60, 0.5);
    color: #c0392b;
}

/* Admin Email Test Styling */
.admin-email-test {
    background: rgba(0, 124, 186, 0.1);
    border: 2px solid rgba(0, 124, 186, 0.5);
    border-radius: 15px;
    padding: 25px;
    backdrop-filter: blur(5px);
}

.admin-email-test h3 {
    color: #007cba;
    margin: 0 0 15px 0;
}

.email-test-form {
    margin: 15px 0;
}

.test-btn {
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    margin-right: 15px;
    margin-bottom: 10px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.test-btn.primary {
    background: linear-gradient(135deg, #007cba 0%, #0056a3 100%);
    color: white;
}

.test-btn.secondary {
    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
    color: white;
}

.test-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(0, 124, 186, 0.3);
}

.test-result {
    padding: 10px;
    margin: 10px 0;
    border-radius: 8px;
    font-size: 0.9em;
}

.test-result.success {
    background: rgba(46, 204, 113, 0.2);
    border: 1px solid rgba(46, 204, 113, 0.5);
    color: #27ae60;
}

.test-result.error {
    background: rgba(231, 76, 60, 0.2);
    border: 1px solid rgba(231, 76, 60, 0.5);
    color: #c0392b;
}

.debug-info {
    font-size: 0.8em;
    color: #666;
    margin-top: 15px;
    line-height: 1.4;
}

/* Responsive Design */
@media (max-width: 600px) {
    .form-row {
        grid-template-columns: 1fr;
        gap: 15px;
    }
}

@media (max-width: 768px) {
    .contact-main-card {
        padding: 30px 25px;
        margin: 20px;
    }
    
    .contact-card-header h2 {
        font-size: 1.6em;
    }
    
    .contact-card-header p {
        font-size: 1em;
    }
    
    .contact-content {
        padding: 20px 10px;
        min-height: 70vh;
    }
}

@media (max-width: 480px) {
    .contact-main-card {
        padding: 25px 20px;
        border-radius: 15px;
    }
    
    .form-group input,
    .form-group select,
    .form-group textarea {
        padding: 10px 12px;
    }
    
    .contact-submit-btn {
        padding: 12px 30px;
        font-size: 1em;
    }
}
</style>

<?php get_footer(); ?>