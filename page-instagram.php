
<?php
/**
 * Template Name: Instagram Page
 */

// Add ACF color picker background for non-home pages
if (!is_front_page() && !is_home()) {
	$bg_colour = get_field('background_colour_instagram'); // Use this field name
	if ($bg_colour) {
		echo '<style>body.page { background-color: ' . esc_attr($bg_colour) . ' !important; }</style>';
	}
}

get_header();
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
	<main id="main" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<div style="text-align:center; margin: 2em 0;">
				<a href="https://www.instagram.com/dragicacarlin/" target="_blank" rel="noopener" class="instagram-link-btn" style="display:inline-block; padding:0.75em 2em; background:#e1306c; color:#fff; border-radius:2em; font-weight:bold; text-decoration:none; font-size:1.2em; box-shadow:0 2px 8px rgba(0,0,0,0.08); transition:background 0.2s;">
					<span style="vertical-align:middle; margin-right:0.5em;">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"></line></svg>
					</span>
					Follow on Instagram
				</a>
			</div>
		<?php endwhile; ?>
	</main>
</div>

<?php get_footer(); ?>
