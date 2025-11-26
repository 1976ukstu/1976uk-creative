<?php
/**
 * Template Name: About
 * 
 * About page for 1976uk Creative - your story and journey
 */
get_header();
?>

<!-- Man of Steel Gradient Background -->
<div class="man-of-steel-gradient"></div>

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
        
        <!-- About Content with Dashboard Styling -->
        <div class="dashboard-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Beautiful Page Header - Gallery Style -->
                    <div class="dashboard-header">
                        <div class="dashboard-title">
                            <h1>🎨 Technical Excellence & Innovation</h1>
                        </div>
                        <div class="dashboard-subtitle">
                            Advanced WordPress development, performance optimization, and innovative problem-solving
                        </div>
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
            <!-- Dashboard Section for Technical Showcase -->
            <div class="dashboard-section">
                <h2>💻 Professional Development Portfolio</h2>
                <p>Innovative technical solutions and advanced WordPress engineering</p>
                    
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
                                    <h2>🚀 Technical Excellence & Innovation</h2>
                                    <p>This site represents advanced WordPress development, performance optimization, and innovative problem-solving. Built on proven architecture with cutting-edge frontend technologies and professional development practices.</p>
                                    
                                    <h3>🎨 Signature Development Innovations</h3>
                                    <p><strong>Glassmorphism Panel System:</strong> Custom CSS implementation featuring multi-layer depth effects, advanced backdrop-filter blur, and responsive transparency management. Creates premium aesthetic with optimal performance.</p>
                                    
                                    <p><strong>96% Viewport Modal System:</strong> Professional-grade image and content viewing experience with smooth animations, keyboard navigation, and mobile-optimized responsive scaling.</p>
                                    
                                    <p><strong>Performance-First Architecture:</strong> Strategic removal of resource-heavy animations in favor of smooth, stable user experiences. Optimized for MacBook performance while maintaining visual excellence.</p>
                                    
                                    <h3>🛠️ Technical Problem-Solving</h3>
                                    <p><strong>WordPress Media Library Integration:</strong> Seamless connection between custom gallery systems and WordPress native media management. Dynamic content loading with intelligent fallback systems.</p>
                                    
                                    <p><strong>Responsive 2x2 Grid Architecture:</strong> Professional layout system adapting from desktop 2x2 display to mobile single-column, maintaining visual hierarchy and user experience consistency.</p>
                                    
                                    <p><strong>Clean Code Practices:</strong> Modular CSS architecture, performance-safe JavaScript implementation, and WordPress best practices compliance throughout.</p>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Technical Features Showcase -->
                            <div class="technical-features">
                                <h3>💻 Featured Technical Implementations</h3>
                                
                                <div class="feature-grid">
                                    <div class="feature-card">
                                        <h4>🎨 Glassmorphism System</h4>
                                        <p><strong>Innovation:</strong> Multi-layer CSS implementation with backdrop-filter blur, rgba transparency management, and responsive scaling.</p>
                                        <p><strong>Result:</strong> Premium aesthetic with optimal performance across all devices.</p>
                                    </div>
                                    
                                    <div class="feature-card">
                                        <h4>🔍 Modal Architecture</h4>
                                        <p><strong>Solution:</strong> 96% viewport system with smooth animations, keyboard navigation, and mobile optimization.</p>
                                        <p><strong>Impact:</strong> Professional gallery experience without performance conflicts.</p>
                                    </div>
                                    
                                    <div class="feature-card">
                                        <h4>📱 Responsive Grid</h4>
                                        <p><strong>Design:</strong> 2x2 desktop layout transforming to single-column mobile with consistent visual hierarchy.</p>
                                        <p><strong>Benefit:</strong> Seamless user experience across all screen sizes.</p>
                                    </div>
                                    
                                    <div class="feature-card">
                                        <h4>⚡ WordPress Integration</h4>
                                        <p><strong>Achievement:</strong> Native Media Library connection with dynamic content loading and intelligent fallbacks.</p>
                                        <p><strong>Value:</strong> Content management efficiency with developer-grade reliability.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Skills/Interests Section (ACF Free repeater) -->
                            <?php if (have_rows('skills_interests')) : ?>
                                <div class="skills-section">
                                    <h3>🛠️ Development Skills & Interests</h3>
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
                            <?php else : ?>
                                <div class="skills-section">
                                    <h3>🛠️ Core Development Technologies</h3>
                                    <div class="skills-grid">
                                        <div class="skill-item advanced">
                                            <h4>WordPress Development</h4>
                                            <p>Custom theme architecture, advanced CSS, performance optimization</p>
                                            <span class="skill-level">Advanced</span>
                                        </div>
                                        <div class="skill-item advanced">
                                            <h4>Frontend Technologies</h4>
                                            <p>HTML5, CSS3, JavaScript, responsive design, glassmorphism effects</p>
                                            <span class="skill-level">Advanced</span>
                                        </div>
                                        <div class="skill-item intermediate">
                                            <h4>Performance Optimization</h4>
                                            <p>MacBook compatibility, resource management, smooth animations</p>
                                            <span class="skill-level">Intermediate</span>
                                        </div>
                                        <div class="skill-item advanced">
                                            <h4>Professional Workflow</h4>
                                            <p>Git version control, LocalWP development, VS Code environment</p>
                                            <span class="skill-level">Advanced</span>
                                        </div>
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
                            
                            <!-- Technical Specifications -->
                            <div class="quick-facts">
                                <h3>⚡ Technical Specifications</h3>
                                <ul>
                                    <li><strong>Architecture:</strong> Custom WordPress theme with modular CSS</li>
                                    <li><strong>Performance:</strong> Optimized for MacBook compatibility</li>
                                    <li><strong>Responsive Design:</strong> Mobile-first with 768px, 1024px breakpoints</li>
                                    <li><strong>Modal System:</strong> 96% viewport with backdrop-filter blur</li>
                                    <li><strong>Integration:</strong> WordPress Media Library native connection</li>
                                    <li><strong>Code Quality:</strong> Professional Git workflow, VS Code development</li>
                                    <li><strong>Innovation:</strong> Glassmorphism panels with multi-layer shadows</li>
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
                                    <h3>🚀 Development Milestones</h3>
                                    <div class="timeline">
                                        <div class="timeline-item">
                                            <div class="timeline-year">Nov 2025</div>
                                            <div class="timeline-event">Implemented 2x2 grid architecture with WordPress media integration</div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="timeline-year">Nov 2025</div>
                                            <div class="timeline-event">Developed 96% viewport modal system with performance optimization</div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="timeline-year">Oct 2025</div>
                                            <div class="timeline-event">Created glassmorphism panel system with advanced CSS techniques</div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="timeline-year">Oct 2025</div>
                                            <div class="timeline-event">Solved WordPress lightbox duplication with custom JavaScript intervention</div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="timeline-year">Oct 2025</div>
                                            <div class="timeline-event">Completed Dragica Carlin professional artist website</div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="timeline-year">2025</div>
                                            <div class="timeline-event">Established professional Git workflow and development environment</div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    </div>
                    
                </div>
            
            </div>
            
        </div>
        
    </main>
</div>

<?php get_footer(); ?>