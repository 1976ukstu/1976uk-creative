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
        'fallback_cb'    => 'creative_lab_side_fallback_menu',
    ) );
    ?>
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
/* About Page Specific Styles */
.about-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 40px;
    margin-top: 30px;
}

@media (max-width: 900px) {
    .about-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
}

.about-main {
    color: rgba(255, 255, 255, 0.9);
}

.about-intro h2,
.about-intro h3 {
    color: white;
    margin: 30px 0 15px 0;
}

.about-intro h2:first-child {
    margin-top: 0;
}

.about-intro p {
    line-height: 1.6;
    margin-bottom: 20px;
}

.skills-section {
    margin-top: 40px;
}

.skills-section h3 {
    color: white;
    margin-bottom: 20px;
}

.skills-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.skill-item {
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    position: relative;
}

.skill-item h4 {
    color: white;
    margin: 0 0 10px 0;
}

.skill-item p {
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    font-size: 0.9em;
}

.skill-level {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 0.7em;
    text-transform: uppercase;
    padding: 3px 8px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.2);
    color: white;
}

.skill-item.beginner .skill-level {
    background: rgba(52, 152, 219, 0.8);
}

.skill-item.intermediate .skill-level {
    background: rgba(241, 196, 15, 0.8);
}

.skill-item.advanced .skill-level {
    background: rgba(46, 204, 113, 0.8);
}

.about-sidebar {
    color: rgba(255, 255, 255, 0.9);
}

.profile-image {
    margin-bottom: 30px;
    text-align: center;
}

.profile-image img {
    width: 100%;
    max-width: 250px;
    border-radius: 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.quick-facts,
.timeline-section {
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    margin-bottom: 20px;
}

.quick-facts h3,
.timeline-section h3 {
    color: white;
    margin: 0 0 15px 0;
}

.quick-facts ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.quick-facts li {
    margin-bottom: 8px;
    font-size: 0.9em;
}

.quick-facts strong {
    color: rgba(255, 255, 255, 1);
}

.timeline {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.timeline-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 10px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.timeline-item:last-child {
    border-bottom: none;
}

.timeline-year {
    color: white;
    font-weight: bold;
    min-width: 50px;
    font-size: 0.9em;
}

.timeline-event {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9em;
    line-height: 1.4;
}
</style>

<?php get_footer(); ?>