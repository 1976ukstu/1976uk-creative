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
                // Websites Page
                $websites_page = get_page_by_path('websites');
                if ($websites_page) {
                    echo '<div class="menu-card" onclick="window.location.href=\'' . esc_url( home_url( '/websites' ) ) . '\'">';
                    echo '<div class="menu-card-icon">🌐</div>';
                    echo '<h4>Websites</h4>';
                    echo '<p>Interactive web development gallery</p>';
                    echo '</div>';
                }
                
                // Gallery Page
                $gallery_page = get_page_by_path('gallery');
                if ($gallery_page) {
                    echo '<div class="menu-card" onclick="window.location.href=\'' . esc_url( home_url( '/gallery' ) ) . '\'">';
                    echo '<div class="menu-card-icon">🎨</div>';
                    echo '<h4>Gallery</h4>';
                    echo '<p>Dashboard-managed creative showcase</p>';
                    echo '</div>';
                }
                
                // Contact Page
                $contact_page = get_page_by_path('contact');
                if ($contact_page) {
                    echo '<div class="menu-card" onclick="window.location.href=\'' . esc_url( home_url( '/contact' ) ) . '\'">';
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