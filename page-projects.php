<?php
/**
 * Template Name: Projects
 * 
 * Custom template for Projects page - showcase development work and creative projects
 * Uses standard WordPress content + ACF Free repeater fields
 */
get_header();
?>

<div class="site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: inherit; text-decoration: none;">
        1976uk<br>Creative
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
        
        <!-- Projects Page Content -->
        <div class="projects-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Page Title -->
                    <div class="page-header">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        <?php if (get_the_content()) : ?>
                            <div class="page-intro">
                                <?php the_content(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Projects Grid -->
                    <?php if (have_rows('project_items')) : ?>
                        <div class="projects-grid">
                            <?php while (have_rows('project_items')) : the_row(); 
                                $image = get_sub_field('project_image');
                                $title = get_sub_field('project_title');
                                $description = get_sub_field('project_description');
                                $tech_stack = get_sub_field('tech_stack');
                                $project_link = get_sub_field('project_link');
                                $github_link = get_sub_field('github_link');
                                $project_type = get_sub_field('project_type'); // web, app, design, etc.
                            ?>
                                <div class="project-card <?php echo esc_attr($project_type); ?>-project">
                                    <?php if ($image) : ?>
                                        <div class="project-image">
                                            <img src="<?php echo esc_url($image['url']); ?>" 
                                                 alt="<?php echo esc_attr($image['alt']); ?>"
                                                 onclick="openLightbox('<?php echo esc_url($image['url']); ?>', '<?php echo esc_js($title); ?>', '<?php echo esc_js($description); ?>')">
                                            <?php if ($project_type) : ?>
                                                <div class="project-type-badge"><?php echo esc_html($project_type); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="project-info">
                                        <?php if ($title) : ?>
                                            <h3 class="project-title"><?php echo esc_html($title); ?></h3>
                                        <?php endif; ?>
                                        
                                        <?php if ($description) : ?>
                                            <p class="project-description"><?php echo esc_html($description); ?></p>
                                        <?php endif; ?>
                                        
                                        <?php if ($tech_stack) : ?>
                                            <div class="tech-stack">
                                                <strong>Tech:</strong> <?php echo esc_html($tech_stack); ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="project-links">
                                            <?php if ($project_link) : ?>
                                                <a href="<?php echo esc_url($project_link); ?>" class="project-link" target="_blank">
                                                    <span>🌐</span> View Live
                                                </a>
                                            <?php endif; ?>
                                            
                                            <?php if ($github_link) : ?>
                                                <a href="<?php echo esc_url($github_link); ?>" class="github-link" target="_blank">
                                                    <span>📂</span> View Code
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <div class="no-projects">
                            <p>Development projects coming soon! This is your experimental playground.</p>
                            <div class="placeholder-projects">
                                <div class="project-card web-project">
                                    <div class="project-image">
                                        <div class="placeholder-img">🎨 Art Portfolio Site</div>
                                        <div class="project-type-badge">WordPress</div>
                                    </div>
                                    <div class="project-info">
                                        <h3 class="project-title">Professional Art Portfolio</h3>
                                        <p class="project-description">Complete art portfolio website with ACF Pro galleries, responsive design, and professional Git workflow.</p>
                                        <div class="tech-stack"><strong>Tech:</strong> WordPress, ACF Pro, CSS Grid, Git</div>
                                        <div class="project-links">
                                            <span class="project-link">✅ Production Live</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="project-card dashboard-project">
                                    <div class="project-image">
                                        <div class="placeholder-img">🛠️ Content Dashboard</div>
                                        <div class="project-type-badge">Development</div>
                                    </div>
                                    <div class="project-info">
                                        <h3 class="project-title">Artist Management Dashboard</h3>
                                        <p class="project-description">Comprehensive content and portfolio management system for creative professionals.</p>
                                        <div class="tech-stack"><strong>Tech:</strong> PHP, WordPress API, Custom Development</div>
                                        <div class="project-links">
                                            <span class="github-link">🚧 In Development</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="project-card creative-project">
                                    <div class="project-image">
                                        <div class="placeholder-img">🌟 1976uk Creative</div>
                                        <div class="project-type-badge">Portfolio</div>
                                    </div>
                                    <div class="project-info">
                                        <h3 class="project-title">Personal Creative Lab</h3>
                                        <p class="project-description">Experimental development playground built on proven foundation with modern workflow.</p>
                                        <div class="tech-stack"><strong>Tech:</strong> WordPress, ACF Free, VS Code, Git</div>
                                        <div class="project-links">
                                            <span class="project-link">🔄 Active Development</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
        </div>
        
    </main>
</div>

<!-- Lightbox for Project Images -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <div class="lightbox-content" onclick="event.stopPropagation()">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img id="lightbox-image" src="" alt="">
        <div class="lightbox-info">
            <h3 id="lightbox-title"></h3>
            <p id="lightbox-description"></p>
        </div>
    </div>
</div>

<script>
function openLightbox(imageSrc, title, description) {
    document.getElementById('lightbox').style.display = 'flex';
    document.getElementById('lightbox-image').src = imageSrc;
    document.getElementById('lightbox-title').textContent = title || '';
    document.getElementById('lightbox-description').textContent = description || '';
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close lightbox with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeLightbox();
    }
});
</script>

<style>
/* Projects Page Specific Styles */
.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 30px;
}

.project-card {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.project-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

.project-image {
    position: relative;
    aspect-ratio: 16/9;
    overflow: hidden;
}

.project-image img,
.placeholder-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.placeholder-img {
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    font-size: 1.5em;
    font-weight: bold;
}

.project-image:hover img,
.project-image:hover .placeholder-img {
    transform: scale(1.05);
}

.project-type-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.8em;
    text-transform: uppercase;
}

.project-info {
    padding: 20px;
}

.project-title {
    color: white;
    margin: 0 0 10px 0;
    font-size: 1.4em;
}

.project-description {
    color: rgba(255, 255, 255, 0.9);
    margin: 0 0 15px 0;
    line-height: 1.5;
}

.tech-stack {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9em;
    margin: 10px 0 15px 0;
}

.project-links {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.project-link,
.github-link {
    color: white;
    text-decoration: none;
    padding: 8px 15px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 20px;
    transition: all 0.3s ease;
    font-size: 0.9em;
}

.project-link:hover,
.github-link:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.6);
}

.placeholder-projects {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 20px;
}

.no-projects {
    text-align: center;
    color: rgba(255, 255, 255, 0.9);
    margin-top: 40px;
}

.no-projects p {
    font-size: 1.2em;
    margin-bottom: 30px;
}
</style>

<?php get_footer(); ?>