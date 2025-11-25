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

<?php
// Include the enhanced universal menu
get_template_part('template-parts/enhanced-universal-menu');
?>

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

<?php get_footer(); ?>