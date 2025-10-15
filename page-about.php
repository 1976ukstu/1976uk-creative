<?php
/**
 * Template Name: About
 * 
 * About page for 1976uk Creative - your story and journey
 */
get_header();
?>

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
            <a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About</a>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a>
        </div>
    </div>
</div>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        
        <!-- About Page Content -->
        <div class="about-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Page Title -->
                    <div class="page-header">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </div>
                    
                    <!-- About Grid Layout -->
                    <div class="about-grid">
                        
                        <!-- Main About Content -->
                        <div class="about-main">
                            <?php if (get_the_content()) : ?>
                                <div class="about-intro">
                                    <?php the_content(); ?>
                                </div>
                            <?php else : ?>
                                <div class="about-intro">
                                    <h2>Welcome to 1976uk Creative</h2>
                                    <p>This is your creative playground - a space for experimentation, learning, and building amazing things without production pressure.</p>
                                    
                                    <h3>The Journey</h3>
                                    <p>From photography production workflows to professional web development, this site represents a journey of creative evolution and technical growth.</p>
                                    
                                    <h3>What You'll Find Here</h3>
                                    <p>Development experiments, creative projects, and the ongoing exploration of what's possible when art meets technology.</p>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Skills/Interests Section (ACF Free repeater) -->
                            <?php if (have_rows('skills_interests')) : ?>
                                <div class="skills-section">
                                    <h3>Skills & Interests</h3>
                                    <div class="skills-grid">
                                        <?php while (have_rows('skills_interests')) : the_row(); 
                                            $skill_title = get_sub_field('skill_title');
                                            $skill_description = get_sub_field('skill_description');
                                            $skill_level = get_sub_field('skill_level'); // beginner, intermediate, advanced
                                        ?>
                                            <div class="skill-item <?php echo esc_attr($skill_level); ?>">
                                                <h4><?php echo esc_html($skill_title); ?></h4>
                                                <?php if ($skill_description) : ?>
                                                    <p><?php echo esc_html($skill_description); ?></p>
                                                <?php endif; ?>
                                                <?php if ($skill_level) : ?>
                                                    <span class="skill-level"><?php echo esc_html($skill_level); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Side Info -->
                        <div class="about-sidebar">
                            
                            <!-- Profile Image (optional) -->
                            <?php 
                            $profile_image = get_field('profile_image');
                            if ($profile_image) : ?>
                                <div class="profile-image">
                                    <img src="<?php echo esc_url($profile_image['url']); ?>" 
                                         alt="<?php echo esc_attr($profile_image['alt']); ?>">
                                </div>
                            <?php endif; ?>
                            
                            <!-- Quick Facts -->
                            <div class="quick-facts">
                                <h3>Quick Facts</h3>
                                <ul>
                                    <li><strong>Domain:</strong> 1976uk.com (established years ago)</li>
                                    <li><strong>Focus:</strong> Creative development & experimentation</li>
                                    <li><strong>Current Project:</strong> Artist management dashboard</li>
                                    <li><strong>Recently Completed:</strong> Dragica Carlin art portfolio</li>
                                    <li><strong>Workflow:</strong> Professional Git, LocalWP, VS Code</li>
                                </ul>
                            </div>
                            
                            <!-- Timeline (ACF Free repeater) -->
                            <?php if (have_rows('timeline_items')) : ?>
                                <div class="timeline-section">
                                    <h3>Journey Timeline</h3>
                                    <div class="timeline">
                                        <?php while (have_rows('timeline_items')) : the_row(); 
                                            $year = get_sub_field('year');
                                            $event = get_sub_field('event');
                                        ?>
                                            <div class="timeline-item">
                                                <div class="timeline-year"><?php echo esc_html($year); ?></div>
                                                <div class="timeline-event"><?php echo esc_html($event); ?></div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="timeline-section">
                                    <h3>Recent Milestones</h3>
                                    <div class="timeline">
                                        <div class="timeline-item">
                                            <div class="timeline-year">2025</div>
                                            <div class="timeline-event">Launched professional WordPress development workflow</div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="timeline-year">2025</div>
                                            <div class="timeline-event">Completed Dragica Carlin art portfolio</div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="timeline-year">2025</div>
                                            <div class="timeline-event">Implemented ACF Pro gallery systems</div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="timeline-year">Est.</div>
                                            <div class="timeline-event">Acquired 1976uk.com domain</div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
        </div>
        
    </main>
</div>

<style>
/* ==========================================================================
   ABOUT PAGE MODERN STYLING - MATCHING SITE AESTHETIC
   ========================================================================== */

.about-content {
    padding: 200px 20px 60px 20px;
    max-width: 1200px;
    margin: 0 auto;
    color: rgba(255, 255, 255, 0.9);
}

/* Page Header */
.page-header {
    text-align: center;
    margin-bottom: 60px;
}

.page-title {
    font-family: 'Poppins', sans-serif;
    font-size: 3.5em;
    font-weight: 600;
    color: white;
    margin: 0;
    background: linear-gradient(135deg, #ffffff 0%, #e8e8e8 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(0 4px 15px rgba(0, 0, 0, 0.4));
    letter-spacing: -1px;
}

/* About Grid Layout */
.about-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 60px;
    margin-top: 40px;
}

@media (max-width: 1024px) {
    .about-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .about-content {
        padding: 180px 15px 40px 15px;
    }
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2.8em;
    }
    
    .about-content {
        padding: 160px 15px 40px 15px;
    }
    
    .about-grid {
        gap: 30px;
    }
}

/* Main About Content */
.about-main {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 40px;
    -webkit-backdrop-filter: blur(15px);
    backdrop-filter: blur(15px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.about-intro h2 {
    font-family: 'Poppins', sans-serif;
    font-size: 2.2em;
    font-weight: 600;
    color: white;
    margin: 0 0 20px 0;
    background: linear-gradient(135deg, #ffffff 0%, #e8e8e8 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.about-intro h3 {
    font-family: 'Poppins', sans-serif;
    font-size: 1.6em;
    font-weight: 500;
    color: white;
    margin: 30px 0 15px 0;
    background: linear-gradient(135deg, #ffffff 0%, #e8e8e8 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.about-intro h2:first-child {
    margin-top: 0;
}

.about-intro p {
    font-family: 'Inter', sans-serif;
    line-height: 1.7;
    margin-bottom: 20px;
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.1em;
}

/* Skills Section */
.skills-section {
    margin-top: 50px;
    padding-top: 40px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.skills-section h3 {
    font-family: 'Poppins', sans-serif;
    color: white;
    margin-bottom: 25px;
    font-size: 1.8em;
    font-weight: 600;
}

.skills-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}

.skill-item {
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    padding: 25px;
    position: relative;
    transition: all 0.3s ease;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
}

.skill-item:hover {
    background: rgba(255, 255, 255, 0.12);
    border-color: rgba(255, 255, 255, 0.25);
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.skill-item h4 {
    font-family: 'Poppins', sans-serif;
    color: white;
    margin: 0 0 12px 0;
    font-size: 1.2em;
    font-weight: 500;
}

.skill-item p {
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    font-size: 0.95em;
    line-height: 1.5;
}

.skill-level {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 0.75em;
    text-transform: uppercase;
    padding: 6px 12px;
    border-radius: 15px;
    font-weight: 600;
    letter-spacing: 0.5px;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.skill-item.beginner .skill-level {
    background: rgba(52, 152, 219, 0.8);
    border-color: rgba(52, 152, 219, 1);
}

.skill-item.intermediate .skill-level {
    background: rgba(241, 196, 15, 0.8);
    border-color: rgba(241, 196, 15, 1);
}

.skill-item.advanced .skill-level {
    background: rgba(46, 204, 113, 0.8);
    border-color: rgba(46, 204, 113, 1);
}

/* About Sidebar */
.about-sidebar {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.profile-image {
    text-align: center;
    margin-bottom: 10px;
}

.profile-image img {
    width: 100%;
    max-width: 280px;
    border-radius: 25px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.profile-image img:hover {
    transform: scale(1.02);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.3);
}

.quick-facts,
.timeline-section {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 30px;
    -webkit-backdrop-filter: blur(15px);
    backdrop-filter: blur(15px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.quick-facts:hover,
.timeline-section:hover {
    background: rgba(255, 255, 255, 0.12);
    border-color: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
}

.quick-facts h3,
.timeline-section h3 {
    font-family: 'Poppins', sans-serif;
    color: white;
    margin: 0 0 20px 0;
    font-size: 1.4em;
    font-weight: 600;
    background: linear-gradient(135deg, #ffffff 0%, #e8e8e8 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.quick-facts ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.quick-facts li {
    margin-bottom: 12px;
    font-size: 0.95em;
    padding: 8px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    line-height: 1.4;
}

.quick-facts li:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.quick-facts strong {
    color: white;
    font-weight: 600;
}

/* Timeline */
.timeline {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.timeline-item {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    padding: 15px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
}

.timeline-item:last-child {
    border-bottom: none;
}

.timeline-item:hover {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 15px;
    margin: 0 -15px;
}

.timeline-year {
    color: white;
    font-weight: 700;
    min-width: 60px;
    font-size: 0.95em;
    background: rgba(255, 255, 255, 0.1);
    padding: 6px 12px;
    border-radius: 10px;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.timeline-event {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.95em;
    line-height: 1.5;
    flex: 1;
}

/* Mobile Responsive */
@media (max-width: 480px) {
    .about-main {
        padding: 25px;
    }
    
    .page-title {
        font-size: 2.2em;
    }
    
    .skills-grid {
        grid-template-columns: 1fr;
    }
    
    .timeline-item {
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
    }
    
    .timeline-year {
        min-width: auto;
        align-self: flex-start;
    }
}
</style>

<?php get_footer(); ?>