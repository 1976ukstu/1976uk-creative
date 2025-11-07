<?php
/**
 * Template Name: Contact v2.0 - Professional Edition
 * 
 * Enhanced contact page for 1976uk Creative
 * Professional glassmorphism design matching gallery/dashboard standards
 * Inspired by Dragica site copyright page with white stripe animation
 */
get_header();
?>

<!-- Animated White Stripe Background -->
<div class="contact-animated-background">
    <div class="white-stripes">
        <div class="stripe stripe-1"></div>
        <div class="stripe stripe-2"></div>
        <div class="stripe stripe-3"></div>
        <div class="stripe stripe-4"></div>
        <div class="stripe stripe-5"></div>
    </div>
</div>

<div class="site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: inherit; text-decoration: none;">
        <span class="main-title">1976uk</span>
        <span class="sub-title">Creative</span>
    </a>
</div>

<button class="universal-hamburger" aria-label="Open menu">
    <span></span>
    <span></span>
    <span></span>
</button>

<!-- Universal Menu Modal -->
<div class="universal-menu-modal">
    <div class="universal-menu-content">
        <div class="universal-menu-header">
            <h3>Navigation</h3>
            <button class="universal-close-button" aria-label="Close menu">×</button>
        </div>
        <div class="universal-menu-items">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <a href="<?php echo esc_url( home_url( '/websites' ) ); ?>">Websites</a>
            <a href="<?php echo esc_url( home_url( '/gallery' ) ); ?>">Gallery</a>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a>
        </div>
    </div>
</div>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        
        <!-- Enhanced Contact Page Content -->
        <div class="contact-v2-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Professional Contact Section -->
                    <div class="contact-professional-section">
                        
                        <!-- Main Contact Card - Dashboard Style -->
                        <div class="contact-professional-card">
                            <div class="contact-card-header-v2">
                                <div class="header-icon">💬</div>
                                <h1>Let's Create Something Extraordinary</h1>
                                <p class="header-subtitle">Ready to transform your digital vision into reality? Whether it's a stunning website, powerful dashboard system, or innovative web application – I'm here to bring your ideas to life with cutting-edge technology and creative excellence.</p>
                            </div>
                            
                            <!-- WordPress Content Integration -->
                            <?php if (get_the_content()) : ?>
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Professional Contact Form -->
                            <div class="contact-form-professional">
                                <?php
                                // Enhanced form processing
                                if (isset($_POST['artist_contact_form_submitted'])) {
                                    // Honeypot spam check
                                    if (!empty($_POST['website'])) {
                                        wp_redirect(add_query_arg('contact_status', 'spam', get_permalink()));
                                        exit;
                                    }
                                    
                                    $name = sanitize_text_field($_POST['name']);
                                    $email = sanitize_email($_POST['email']);
                                    $phone = sanitize_text_field($_POST['phone']);
                                    $company = sanitize_text_field($_POST['company']);
                                    $subject = sanitize_text_field($_POST['subject']);
                                    $project_type = sanitize_text_field($_POST['project-type']);
                                    $budget = sanitize_text_field($_POST['budget']);
                                    $timeline = sanitize_text_field($_POST['timeline']);
                                    $message = sanitize_textarea_field($_POST['message']);
                                    
                                    if (!empty($name) && !empty($email) && !empty($message)) {
                                        $email_subject = !empty($subject) ? $subject : 'New Project Inquiry - 1976uk Creative';
                                        if (!empty($project_type)) {
                                            $email_subject .= ' (' . $project_type . ')';
                                        }
                                        
                                        // Enhanced email content
                                        $email_message = "🚀 NEW PROJECT INQUIRY - 1976uk Creative\n";
                                        $email_message .= "=====================================\n\n";
                                        $email_message .= "📋 CONTACT DETAILS:\n";
                                        $email_message .= "Name: {$name}\n";
                                        $email_message .= "Email: {$email}\n";
                                        if (!empty($phone)) {
                                            $email_message .= "Phone: {$phone}\n";
                                        }
                                        if (!empty($company)) {
                                            $email_message .= "Company: {$company}\n";
                                        }
                                        
                                        $email_message .= "\n🎯 PROJECT DETAILS:\n";
                                        if (!empty($project_type)) {
                                            $email_message .= "Type: {$project_type}\n";
                                        }
                                        if (!empty($budget)) {
                                            $email_message .= "Budget: {$budget}\n";
                                        }
                                        if (!empty($timeline)) {
                                            $email_message .= "Timeline: {$timeline}\n";
                                        }
                                        
                                        $email_message .= "\n💬 MESSAGE:\n";
                                        $email_message .= "{$message}\n\n";
                                        $email_message .= "=====================================\n";
                                        $email_message .= "Sent from: " . home_url() . "\n";
                                        $email_message .= "Date: " . date('Y-m-d H:i:s T') . "\n";
                                        
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
                                    } else {
                                        wp_redirect(add_query_arg('contact_status', 'missing', get_permalink()));
                                        exit;
                                    }
                                }
                                
                                // Enhanced status messages
                                $status = $_GET['contact_status'] ?? '';
                                if ($status === 'success') {
                                    echo '<div class="contact-status success">
                                        <div class="status-icon">✅</div>
                                        <div class="status-content">
                                            <h3>Message Sent Successfully!</h3>
                                            <p>Thank you for reaching out! I\'ve received your project inquiry and will get back to you within 24 hours.</p>
                                        </div>
                                    </div>';
                                } elseif ($status === 'error') {
                                    echo '<div class="contact-status error">
                                        <div class="status-icon">❌</div>
                                        <div class="status-content">
                                            <h3>Delivery Failed</h3>
                                            <p>Sorry, there was a technical issue sending your message. Please try again or contact me directly.</p>
                                        </div>
                                    </div>';
                                } elseif ($status === 'missing') {
                                    echo '<div class="contact-status warning">
                                        <div class="status-icon">⚠️</div>
                                        <div class="status-content">
                                            <h3>Missing Information</h3>
                                            <p>Please fill in all required fields (Name, Email, and Message).</p>
                                        </div>
                                    </div>';
                                } elseif ($status === 'spam') {
                                    echo '<div class="contact-status error">
                                        <div class="status-icon">🛡️</div>
                                        <div class="status-content">
                                            <h3>Spam Detected</h3>
                                            <p>Your submission was flagged by our spam protection. Please try again.</p>
                                        </div>
                                    </div>';
                                }
                                ?>
                                
                                <form class="professional-contact-form" action="<?php echo esc_url(get_permalink()); ?>" method="post">
                                    <input type="hidden" name="artist_contact_form_submitted" value="1">
                                    
                                    <!-- Enhanced Honeypot -->
                                    <div class="honeypot-field">
                                        <label for="website">Website (leave blank)</label>
                                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                                    </div>
                                    
                                    <!-- Personal Information Section -->
                                    <div class="form-section">
                                        <h3>👤 Contact Information</h3>
                                        <div class="form-grid">
                                            <div class="form-group">
                                                <label for="name">Full Name *</label>
                                                <input type="text" id="name" name="name" required 
                                                       value="<?php echo isset($_POST['name']) ? esc_attr($_POST['name']) : ''; ?>"
                                                       placeholder="Your full name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email Address *</label>
                                                <input type="email" id="email" name="email" required 
                                                       value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>"
                                                       placeholder="your@email.com">
                                            </div>
                                        </div>
                                        <div class="form-grid">
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="tel" id="phone" name="phone" 
                                                       value="<?php echo isset($_POST['phone']) ? esc_attr($_POST['phone']) : ''; ?>"
                                                       placeholder="Optional contact number">
                                            </div>
                                            <div class="form-group">
                                                <label for="company">Company/Organization</label>
                                                <input type="text" id="company" name="company" 
                                                       value="<?php echo isset($_POST['company']) ? esc_attr($_POST['company']) : ''; ?>"
                                                       placeholder="Optional company name">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Project Details Section -->
                                    <div class="form-section">
                                        <h3>🎯 Project Details</h3>
                                        <div class="form-group">
                                            <label for="subject">Project Title</label>
                                            <input type="text" id="subject" name="subject" 
                                                   value="<?php echo isset($_POST['subject']) ? esc_attr($_POST['subject']) : ''; ?>"
                                                   placeholder="Brief title for your project">
                                        </div>
                                        
                                        <div class="form-grid">
                                            <div class="form-group">
                                                <label for="project-type">Project Type</label>
                                                <select id="project-type" name="project-type">
                                                    <option value="">Select project type</option>
                                                    <option value="website-design" <?php selected($_POST['project-type'] ?? '', 'website-design'); ?>>🌐 Website Design & Development</option>
                                                    <option value="dashboard-system" <?php selected($_POST['project-type'] ?? '', 'dashboard-system'); ?>>📊 Dashboard/Management System</option>
                                                    <option value="web-application" <?php selected($_POST['project-type'] ?? '', 'web-application'); ?>>⚡ Custom Web Application</option>
                                                    <option value="wordpress-site" <?php selected($_POST['project-type'] ?? '', 'wordpress-site'); ?>>🎨 WordPress Site</option>
                                                    <option value="e-commerce" <?php selected($_POST['project-type'] ?? '', 'e-commerce'); ?>>🛒 E-commerce Solution</option>
                                                    <option value="api-integration" <?php selected($_POST['project-type'] ?? '', 'api-integration'); ?>>🔗 API Integration</option>
                                                    <option value="maintenance" <?php selected($_POST['project-type'] ?? '', 'maintenance'); ?>>🔧 Website Maintenance</option>
                                                    <option value="consultation" <?php selected($_POST['project-type'] ?? '', 'consultation'); ?>>💡 Technical Consultation</option>
                                                    <option value="collaboration" <?php selected($_POST['project-type'] ?? '', 'collaboration'); ?>>🤝 Partnership/Collaboration</option>
                                                    <option value="other" <?php selected($_POST['project-type'] ?? '', 'other'); ?>>🎯 Other/Custom Project</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="budget">Budget Range</label>
                                                <select id="budget" name="budget">
                                                    <option value="">Select budget range</option>
                                                    <option value="under-1k" <?php selected($_POST['budget'] ?? '', 'under-1k'); ?>>💰 Under £1,000</option>
                                                    <option value="1k-5k" <?php selected($_POST['budget'] ?? '', '1k-5k'); ?>>💰 £1,000 - £5,000</option>
                                                    <option value="5k-10k" <?php selected($_POST['budget'] ?? '', '5k-10k'); ?>>💰 £5,000 - £10,000</option>
                                                    <option value="10k-25k" <?php selected($_POST['budget'] ?? '', '10k-25k'); ?>>💰 £10,000 - £25,000</option>
                                                    <option value="25k-plus" <?php selected($_POST['budget'] ?? '', '25k-plus'); ?>>💰 £25,000+</option>
                                                    <option value="discuss" <?php selected($_POST['budget'] ?? '', 'discuss'); ?>>💬 Let's Discuss</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="timeline">Project Timeline</label>
                                            <select id="timeline" name="timeline">
                                                <option value="">Select timeline</option>
                                                <option value="asap" <?php selected($_POST['timeline'] ?? '', 'asap'); ?>>🚀 ASAP/Urgent</option>
                                                <option value="1-month" <?php selected($_POST['timeline'] ?? '', '1-month'); ?>>📅 Within 1 Month</option>
                                                <option value="2-3-months" <?php selected($_POST['timeline'] ?? '', '2-3-months'); ?>>📅 2-3 Months</option>
                                                <option value="3-6-months" <?php selected($_POST['timeline'] ?? '', '3-6-months'); ?>>📅 3-6 Months</option>
                                                <option value="6-months-plus" <?php selected($_POST['timeline'] ?? '', '6-months-plus'); ?>>📅 6+ Months</option>
                                                <option value="flexible" <?php selected($_POST['timeline'] ?? '', 'flexible'); ?>>⏰ Flexible</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <!-- Message Section -->
                                    <div class="form-section">
                                        <h3>💬 Tell Me About Your Vision</h3>
                                        <div class="form-group">
                                            <label for="message">Project Description *</label>
                                            <textarea id="message" name="message" rows="8" required 
                                                      placeholder="Describe your project vision, specific requirements, target audience, key features, technical preferences, or any questions you have. The more detail you provide, the better I can understand and help with your project!"><?php echo isset($_POST['message']) ? esc_textarea($_POST['message']) : ''; ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="contact-submit-professional">
                                        <span class="btn-icon">🚀</span>
                                        <span class="btn-text">Send Project Inquiry</span>
                                        <span class="btn-arrow">→</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Professional Info Cards -->
                        <div class="contact-info-grid">
                            <div class="info-card response-card">
                                <div class="info-icon">⚡</div>
                                <h3>Quick Response</h3>
                                <p>I typically respond to project inquiries within 24 hours with initial thoughts and next steps.</p>
                            </div>
                            <div class="info-card process-card">
                                <div class="info-icon">🔄</div>
                                <h3>Collaborative Process</h3>
                                <p>Every project starts with a detailed discovery call to understand your vision and requirements.</p>
                            </div>
                            <div class="info-card quality-card">
                                <div class="info-icon">✨</div>
                                <h3>Quality Focused</h3>
                                <p>Professional development with modern technologies, responsive design, and exceptional user experience.</p>
                            </div>
                        </div>
                        
                        <?php if (current_user_can('administrator')): ?>
                        <!-- Enhanced Admin Email Test Section -->
                        <div class="admin-email-test-v2">
                            <div class="admin-header">
                                <h3>🔧 Email System Diagnostics (Admin Only)</h3>
                                <p>Advanced email testing and debugging tools for contact form functionality.</p>
                            </div>
                            
                            <?php if (isset($_POST['test_email_now'])): ?>
                                <?php
                                $error_message = '';
                                add_action('wp_mail_failed', function($wp_error) use (&$error_message) {
                                    $error_message = $wp_error->get_error_message();
                                });
                                
                                $test_result = wp_mail(get_option('admin_email'), 'Email Test - ' . date('H:i:s'), 
                                    'Test email sent from enhanced contact page at ' . date('Y-m-d H:i:s') . "\n\nIf you receive this, your WordPress email system is working!");
                                ?>
                                <div class="test-result <?php echo $test_result ? 'success' : 'error'; ?>">
                                    <div class="result-icon"><?php echo $test_result ? '✅' : '❌'; ?></div>
                                    <div class="result-content">
                                        <strong>WordPress Mail Test:</strong> <?php echo $test_result ? 'SUCCESS! wp_mail() function worked correctly.' : 'FAILED! wp_mail() function returned an error.'; ?>
                                        <?php if (!$test_result && $error_message): ?>
                                            <br><span class="error-detail">Error Details: <?php echo esc_html($error_message); ?></span>
                                        <?php endif; ?>
                                    </div>
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
                                    <div class="result-icon"><?php echo $php_result ? '✅' : '❌'; ?></div>
                                    <div class="result-content">
                                        <strong>Server Mail Test:</strong> <?php echo $php_result ? 'SUCCESS! Server can send emails directly.' : 'FAILED! Server cannot send emails.'; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="email-test-controls">
                                <form method="post" class="test-form">
                                    <button type="submit" name="test_email_now" class="test-btn primary">
                                        <span class="btn-icon">📧</span>
                                        Test WordPress Mail
                                    </button>
                                    <button type="submit" name="test_php_mail" class="test-btn secondary">
                                        <span class="btn-icon">🔧</span>
                                        Test Server Mail
                                    </button>
                                </form>
                            </div>
                            
                            <div class="debug-info-v2">
                                <h4>📊 System Information</h4>
                                <div class="debug-grid">
                                    <div class="debug-item">
                                        <strong>Server:</strong> <?php echo $_SERVER['SERVER_NAME']; ?>
                                    </div>
                                    <div class="debug-item">
                                        <strong>PHP mail():</strong> <?php echo function_exists('mail') ? '✅ Available' : '❌ Not Available'; ?>
                                    </div>
                                    <div class="debug-item">
                                        <strong>Admin Email:</strong> <?php echo get_option('admin_email'); ?>
                                    </div>
                                    <div class="debug-item">
                                        <strong>WordPress Version:</strong> <?php echo get_bloginfo('version'); ?>
                                    </div>
                                    <div class="debug-item">
                                        <strong>PHP Version:</strong> <?php echo PHP_VERSION; ?>
                                    </div>
                                    <div class="debug-item">
                                        <strong>Site URL:</strong> <?php echo home_url(); ?>
                                    </div>
                                </div>
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
/* ==========================================================================
   CONTACT PAGE v2.0 - PROFESSIONAL GLASSMORPHISM DESIGN
   Inspired by gallery and dashboard aesthetic with white stripe animation
   ========================================================================== */

/* Animated White Stripe Background - Dragica Style */
.contact-animated-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 25%, #dee2e6 50%, #ced4da 75%, #adb5bd 100%);
    overflow: hidden;
}

.white-stripes {
    position: absolute;
    top: 0;
    left: 0;
    width: 200%;
    height: 200%;
    opacity: 0.4;
}

.stripe {
    position: absolute;
    background: linear-gradient(45deg, transparent 0%, rgba(255, 255, 255, 0.6) 30%, rgba(255, 255, 255, 0.8) 50%, rgba(255, 255, 255, 0.6) 70%, transparent 100%);
    height: 2px;
    width: 100%;
    animation: stripeMove 20s linear infinite;
}

.stripe-1 { top: 10%; animation-delay: 0s; }
.stripe-2 { top: 25%; animation-delay: -4s; }
.stripe-3 { top: 40%; animation-delay: -8s; }
.stripe-4 { top: 60%; animation-delay: -12s; }
.stripe-5 { top: 80%; animation-delay: -16s; }

@keyframes stripeMove {
    0% { transform: translateX(-100%) rotate(45deg); }
    100% { transform: translateX(100%) rotate(45deg); }
}

/* Main Contact Content */
.contact-v2-content {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 120px 20px 60px 20px;
    position: relative;
    z-index: 1;
}

.contact-professional-section {
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
}

/* Professional Contact Card - Dashboard Style */
.contact-professional-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 30px;
    padding: 50px;
    margin-bottom: 50px;
    box-shadow: 
        0 25px 60px rgba(0, 0, 0, 0.1),
        0 8px 30px rgba(0, 0, 0, 0.05),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
    position: relative;
    overflow: hidden;
}

.contact-professional-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
}

/* Enhanced Header */
.contact-card-header-v2 {
    text-align: center;
    margin-bottom: 50px;
    position: relative;
}

.header-icon {
    font-size: 4em;
    margin-bottom: 20px;
    filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.1));
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.contact-card-header-v2 h1 {
    font-family: 'Poppins', sans-serif;
    font-size: 3.2em;
    font-weight: 600;
    color: #2c3e50;
    margin: 0 0 25px 0;
    line-height: 1.1;
    letter-spacing: -1px;
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.header-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 1.3em;
    color: #555;
    line-height: 1.6;
    max-width: 700px;
    margin: 0 auto;
    font-weight: 400;
}

/* Professional Form Styling */
.contact-form-professional {
    margin-top: 40px;
}

.professional-contact-form {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

/* Honeypot Field */
.honeypot-field {
    position: absolute;
    left: -9999px;
    top: -9999px;
    opacity: 0;
    visibility: hidden;
}

/* Form Sections */
.form-section {
    background: rgba(248, 249, 250, 0.6);
    border: 1px solid rgba(233, 236, 239, 0.8);
    border-radius: 20px;
    padding: 35px;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.form-section:hover {
    background: rgba(248, 249, 250, 0.8);
    border-color: rgba(233, 236, 239, 1);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
}

.form-section h3 {
    font-family: 'Poppins', sans-serif;
    font-size: 1.4em;
    color: #2c3e50;
    margin: 0 0 25px 0;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

/* Form Grid Layout */
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
    margin-bottom: 25px;
}

.form-grid:last-child {
    margin-bottom: 0;
}

/* Form Groups */
.form-group {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.form-group label {
    font-family: 'Inter', sans-serif;
    color: #2c3e50;
    font-weight: 600;
    font-size: 1em;
    letter-spacing: 0.5px;
}

.form-group input,
.form-group select,
.form-group textarea {
    background: rgba(255, 255, 255, 0.9);
    border: 2px solid rgba(233, 236, 239, 0.8);
    border-radius: 15px;
    padding: 15px 20px;
    color: #2c3e50;
    font-size: 1em;
    font-family: 'Inter', sans-serif;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: rgba(44, 62, 80, 0.5);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #667eea;
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    transform: translateY(-1px);
}

.form-group select {
    cursor: pointer;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23667eea' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 15px center;
    background-size: 20px;
    padding-right: 50px;
    appearance: none;
}

.form-group textarea {
    resize: vertical;
    min-height: 140px;
    line-height: 1.6;
}

/* Professional Submit Button */
.contact-submit-professional {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 25px;
    padding: 18px 45px;
    font-size: 1.2em;
    font-weight: 600;
    font-family: 'Inter', sans-serif;
    cursor: pointer;
    transition: all 0.3s ease;
    align-self: center;
    margin-top: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    position: relative;
    overflow: hidden;
}

.contact-submit-professional::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.contact-submit-professional:hover::before {
    left: 100%;
}

.contact-submit-professional:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
}

.contact-submit-professional:active {
    transform: translateY(-1px);
}

.btn-icon, .btn-arrow {
    font-size: 1.1em;
    transition: transform 0.3s ease;
}

.contact-submit-professional:hover .btn-arrow {
    transform: translateX(5px);
}

/* Status Messages */
.contact-status {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 30px;
    display: flex;
    align-items: center;
    gap: 20px;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 2px solid;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.contact-status.success {
    border-color: rgba(46, 204, 113, 0.5);
    background: rgba(46, 204, 113, 0.1);
}

.contact-status.error {
    border-color: rgba(231, 76, 60, 0.5);
    background: rgba(231, 76, 60, 0.1);
}

.contact-status.warning {
    border-color: rgba(241, 196, 15, 0.5);
    background: rgba(241, 196, 15, 0.1);
}

.status-icon {
    font-size: 2em;
    flex-shrink: 0;
}

.status-content h3 {
    margin: 0 0 5px 0;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
}

.status-content p {
    margin: 0;
    font-family: 'Inter', sans-serif;
    opacity: 0.9;
}

/* Professional Info Cards */
.contact-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
    margin-bottom: 50px;
}

.info-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 25px;
    padding: 35px;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}

.info-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    background: rgba(255, 255, 255, 0.95);
}

.info-icon {
    font-size: 3em;
    margin-bottom: 20px;
    filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.1));
}

.info-card h3 {
    font-family: 'Poppins', sans-serif;
    color: #2c3e50;
    margin: 0 0 15px 0;
    font-size: 1.3em;
    font-weight: 600;
}

.info-card p {
    font-family: 'Inter', sans-serif;
    color: #555;
    margin: 0;
    line-height: 1.6;
}

/* Enhanced Admin Section */
.admin-email-test-v2 {
    background: rgba(0, 123, 255, 0.1);
    border: 2px solid rgba(0, 123, 255, 0.3);
    border-radius: 25px;
    padding: 40px;
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    margin-top: 30px;
}

.admin-header h3 {
    color: #007bff;
    margin: 0 0 10px 0;
    font-family: 'Poppins', sans-serif;
    font-size: 1.5em;
    font-weight: 600;
}

.admin-header p {
    color: #555;
    margin: 0 0 25px 0;
    font-family: 'Inter', sans-serif;
}

.email-test-controls {
    margin: 25px 0;
}

.test-form {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.test-btn {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 15px;
    cursor: pointer;
    font-weight: 600;
    font-family: 'Inter', sans-serif;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 10px;
}

.test-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3);
}

.test-btn.secondary {
    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
}

.test-result {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    padding: 20px;
    margin: 15px 0;
    display: flex;
    align-items: center;
    gap: 15px;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

.test-result.success {
    border: 2px solid rgba(46, 204, 113, 0.5);
}

.test-result.error {
    border: 2px solid rgba(231, 76, 60, 0.5);
}

.result-icon {
    font-size: 1.5em;
    flex-shrink: 0;
}

.result-content {
    font-family: 'Inter', sans-serif;
    flex: 1;
}

.error-detail {
    color: #e74c3c;
    font-size: 0.9em;
    font-style: italic;
}

.debug-info-v2 {
    margin-top: 30px;
}

.debug-info-v2 h4 {
    color: #007bff;
    margin: 0 0 15px 0;
    font-family: 'Poppins', sans-serif;
    font-size: 1.2em;
}

.debug-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
}

.debug-item {
    background: rgba(255, 255, 255, 0.8);
    padding: 15px;
    border-radius: 10px;
    font-family: 'Inter', sans-serif;
    font-size: 0.9em;
    border: 1px solid rgba(0, 123, 255, 0.2);
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact-v2-content {
        padding: 100px 15px 40px 15px;
    }
    
    .contact-professional-card {
        padding: 30px 25px;
        border-radius: 20px;
    }
    
    .contact-card-header-v2 h1 {
        font-size: 2.2em;
    }
    
    .header-subtitle {
        font-size: 1.1em;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .form-section {
        padding: 25px 20px;
    }
    
    .contact-info-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .test-form {
        flex-direction: column;
    }
    
    .debug-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .contact-card-header-v2 h1 {
        font-size: 1.8em;
    }
    
    .header-icon {
        font-size: 3em;
    }
    
    .form-section {
        padding: 20px 15px;
    }
    
    .contact-submit-professional {
        padding: 15px 35px;
        font-size: 1.1em;
    }
    
    .white-stripes {
        opacity: 0.2;
    }
}

/* Animation Enhancements */
@media (prefers-reduced-motion: reduce) {
    .stripe,
    .header-icon,
    * {
        animation: none !important;
        transition: none !important;
    }
}
</style>

<?php get_footer(); ?>