<?php get_header(); ?>
<?php
// Set background image for home page - no ACF dependency
$bg_image_url = get_template_directory_uri() . '/images/1976uk-creative-bg.webp';
echo '<style>body.home { 
    background-image: url(' . esc_url($bg_image_url) . '); 
    background-size: cover; 
    background-position: center; 
    background-attachment: fixed;
}</style>';
?>

<div class="site-title">
    <span class="main-title">1976uk</span>
    <span class="sub-title">Creative</span>
</div>

<!-- Hamburger Menu Button -->
<button class="hamburger home-hamburger" aria-label="Open menu">
    <span></span>
    <span></span>
    <span></span>
</button>

<!-- Modal-Style Menu Overlay (like Dashboard popup) -->
<div id="homeMenuModal" class="home-menu-modal" onclick="closeHomeMenu()">
    <div class="home-menu-content" onclick="event.stopPropagation()">
        <div class="home-menu-header">
            <h3>🌟 1976uk Creative Navigation</h3>
            <button class="menu-close-btn" onclick="closeHomeMenu()">
                <span>×</span>
            </button>
        </div>
        <div class="home-menu-body">
            <div class="menu-grid">
                <?php
                // Portfolio Page
                $portfolio_page = get_page_by_path('portfolio');
                if ($portfolio_page) {
                    echo '<div class="menu-card" onclick="window.location.href=\'' . get_permalink($portfolio_page->ID) . '\'">';
                    echo '<div class="menu-card-icon">🎨</div>';
                    echo '<h4>Portfolio</h4>';
                    echo '<p>Creative work and project showcases</p>';
                    echo '</div>';
                }
                
                // Projects Page  
                $projects_page = get_page_by_path('projects');
                if ($projects_page) {
                    echo '<div class="menu-card" onclick="window.location.href=\'' . get_permalink($projects_page->ID) . '\'">';
                    echo '<div class="menu-card-icon">🚀</div>';
                    echo '<h4>Projects</h4>';
                    echo '<p>Development experiments and innovations</p>';
                    echo '</div>';
                }
                
                // Websites Page
                $websites_page = get_page_by_path('websites');
                if ($websites_page) {
                    echo '<div class="menu-card" onclick="window.location.href=\'' . get_permalink($websites_page->ID) . '\'">';
                    echo '<div class="menu-card-icon">🌐</div>';
                    echo '<h4>Websites</h4>';
                    echo '<p>Interactive web development gallery</p>';
                    echo '</div>';
                }
                
                // About Page
                $about_page = get_page_by_path('about');
                if ($about_page) {
                    echo '<div class="menu-card" onclick="window.location.href=\'' . get_permalink($about_page->ID) . '\'">';
                    echo '<div class="menu-card-icon">👋</div>';
                    echo '<h4>About</h4>';
                    echo '<p>Background and creative journey</p>';
                    echo '</div>';
                }
                
                // Contact Page
                $contact_page = get_page_by_path('contact');
                if ($contact_page) {
                    echo '<div class="menu-card" onclick="window.location.href=\'' . get_permalink($contact_page->ID) . '\'">';
                    echo '<div class="menu-card-icon">📧</div>';
                    echo '<h4>Contact</h4>';
                    echo '<p>Get in touch for collaborations</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
// Home Menu Modal Functions
function openHomeMenu() {
    const modal = document.getElementById('homeMenuModal');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeHomeMenu() {
    const modal = document.getElementById('homeMenuModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Hamburger click handler
document.querySelector('.home-hamburger').addEventListener('click', openHomeMenu);

// Close with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeHomeMenu();
    }
});
</script>

<?php get_footer(); ?>