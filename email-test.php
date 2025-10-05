<?php
/**
 * Email Test Diagnostic Page
 * Access this by going to: yoursite.com/wp-content/themes/mycustomtheme/email-test.php
 */

// Only allow admins to access this
session_start();
$is_admin_logged_in = false;

// Simple check if WordPress is available
if (file_exists('../../../../wp-config.php')) {
    require_once('../../../../wp-config.php');
    require_once(ABSPATH . 'wp-includes/wp-db.php');
    require_once(ABSPATH . 'wp-includes/pluggable.php');
    
    if (function_exists('current_user_can') && current_user_can('administrator')) {
        $is_admin_logged_in = true;
    }
}

if (!$is_admin_logged_in) {
    die('Access denied. Please log in as administrator.');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Email Test Diagnostic</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 20px; }
        .test-result { padding: 10px; margin: 10px 0; border-radius: 5px; }
        .success { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; }
        .error { background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; }
        .info { background: #d1ecf1; border: 1px solid #bee5eb; color: #0c5460; }
        button { background: #007cba; color: white; border: none; padding: 10px 20px; border-radius: 3px; cursor: pointer; margin: 5px; }
        button:hover { background: #005a87; }
    </style>
</head>
<body>
    <h1>Email Diagnostic Tool</h1>
    
    <?php if (isset($_POST['test_wp_mail'])): ?>
        <div class="test-result <?php 
        $wp_result = wp_mail('stuart@1976uk.com', 'WordPress Mail Test - ' . date('H:i:s'), 
            'This is a test email sent via wp_mail() at ' . date('Y-m-d H:i:s'));
        echo $wp_result ? 'success' : 'error';
        ?>">
            <strong>wp_mail() Test:</strong> 
            <?php echo $wp_result ? 'SUCCESS - Email sent!' : 'FAILED - Check logs'; ?>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_POST['test_php_mail'])): ?>
        <div class="test-result <?php 
        $headers = "From: Email Test <noreply@" . $_SERVER['HTTP_HOST'] . ">\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $php_result = mail('stuart@1976uk.com', 'PHP Mail Test - ' . date('H:i:s'), 
            'This is a test email sent via PHP mail() at ' . date('Y-m-d H:i:s'), $headers);
        echo $php_result ? 'success' : 'error';
        ?>">
            <strong>PHP mail() Test:</strong> 
            <?php echo $php_result ? 'SUCCESS - Email sent!' : 'FAILED - Server issue'; ?>
        </div>
    <?php endif; ?>
    
    <div class="info">
        <h3>Current Configuration:</h3>
        <p><strong>Server:</strong> <?php echo $_SERVER['SERVER_NAME']; ?></p>
        <p><strong>PHP Version:</strong> <?php echo PHP_VERSION; ?></p>
        <p><strong>mail() function:</strong> <?php echo function_exists('mail') ? 'Available ✓' : 'Not Available ✗'; ?></p>
        <p><strong>Sendmail Path:</strong> <?php echo ini_get('sendmail_path') ?: 'Not set'; ?></p>
        <p><strong>SMTP:</strong> <?php echo ini_get('SMTP') ?: 'localhost'; ?></p>
        <p><strong>Site URL:</strong> <?php echo home_url(); ?></p>
    </div>
    
    <form method="post">
        <button type="submit" name="test_wp_mail">Test WordPress wp_mail()</button>
        <button type="submit" name="test_php_mail">Test PHP mail()</button>
    </form>
    
    <div class="info">
        <h3>Troubleshooting Guide:</h3>
        <ul>
            <li><strong>Both tests fail:</strong> Server mail configuration issue</li>
            <li><strong>PHP mail() works, wp_mail() fails:</strong> WordPress/plugin conflict</li>
            <li><strong>Both tests succeed but no email received:</strong> Spam filtering or hosting restrictions</li>
        </ul>
        
        <h4>Common Solutions:</h4>
        <ol>
            <li><strong>Install WP Mail SMTP plugin</strong> - Use proper SMTP service</li>
            <li><strong>Check hosting mail limits</strong> - Some hosts block/limit outgoing mail</li>
            <li><strong>Verify domain DNS records</strong> - SPF, DKIM, DMARC setup</li>
            <li><strong>Use transactional email service</strong> - SendGrid, Mailgun, etc.</li>
        </ol>
    </div>
</body>
</html>