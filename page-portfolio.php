<?php
/**
 * Template Name: Portfolio
 * 
 * Portfolio page for 1976uk Creative - external profiles and professional presence
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
        
        <!-- Portfolio Content with Dashboard Styling -->
        <div class="dashboard-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Beautiful Page Header - Gallery Style -->
                    <div class="dashboard-header">
                        <div class="dashboard-title">
                            <h1>💼 Creative Technologist Portfolio</h1>
                        </div>
                        <div class="dashboard-subtitle">
                            Professional profiles, client work, and creative development showcase
                        </div>
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
            <!-- Dashboard Section for Portfolio Links -->
            <div class="dashboard-section">
                <h2>🌟 Professional Presence</h2>
                <p>External portfolio links and professional profiles</p>
                    
                    <!-- Portfolio Grid Layout -->
                    <div class="portfolio-grid">
                        
                        <!-- Main Portfolio Content -->
                        <div class="portfolio-main">
                            <?php if (get_the_content()) : ?>
                                <div class="portfolio-intro">
                                    <?php the_content(); ?>
                                </div>
                            <?php else : ?>
                                <div class="portfolio-intro">
                                    <h2>🚀 External Portfolio Links</h2>
                                    <p>Connect with professional profiles, client testimonials, and live project showcases across multiple platforms. Each link represents a different aspect of creative technology expertise.</p>
                                    
                                    <h3>🎯 Professional Network</h3>
                                    <p>Established presence on key professional platforms with proven track record in WordPress development, creative design, and technical problem-solving. Portfolio demonstrates range from individual projects to enterprise solutions.</p>
                                </div>
                            <?php endif; ?>
                            
                            <!-- External Portfolio Links -->
                            <div class="portfolio-links">
                                <h3>🔗 Portfolio Platforms</h3>
                                
                                <div class="links-grid">
                                    <div class="portfolio-link-card">
                                        <div class="link-header">
                                            <h4>💼 Upwork Profile</h4>
                                            <span class="link-type">Freelance Platform</span>
                                        </div>
                                        <p>Professional freelance profile showcasing client projects, testimonials, and technical expertise. Specialized in WordPress development and creative problem-solving.</p>
                                        <div class="link-action">
                                            <a href="#" target="_blank" rel="noopener noreferrer" class="portfolio-btn">
                                                View Profile →
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="portfolio-link-card">
                                        <div class="link-header">
                                            <h4>📂 GitHub Repository</h4>
                                            <span class="link-type">Code Portfolio</span>
                                        </div>
                                        <p>Open source projects, development experiments, and code examples. Features advanced WordPress themes, JavaScript innovations, and technical documentation.</p>
                                        <div class="link-action">
                                            <a href="#" target="_blank" rel="noopener noreferrer" class="portfolio-btn">
                                                Browse Code →
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="portfolio-link-card">
                                        <div class="link-header">
                                            <h4>💻 LinkedIn Profile</h4>
                                            <span class="link-type">Professional Network</span>
                                        </div>
                                        <p>Professional background, recommendations, and industry connections. Focus on creative technology, WordPress development, and innovative digital solutions.</p>
                                        <div class="link-action">
                                            <a href="#" target="_blank" rel="noopener noreferrer" class="portfolio-btn">
                                                Connect →
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="portfolio-link-card">
                                        <div class="link-header">
                                            <h4>🎨 Behance Portfolio</h4>
                                            <span class="link-type">Creative Showcase</span>
                                        </div>
                                        <p>Visual design portfolio featuring UI/UX work, branding projects, and creative development solutions. Demonstrates design thinking and aesthetic execution.</p>
                                        <div class="link-action">
                                            <a href="#" target="_blank" rel="noopener noreferrer" class="portfolio-btn">
                                                View Work →
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Client Testimonials Section -->
                            <div class="testimonials-section">
                                <h3>💬 Client Success Stories</h3>
                                
                                <div class="testimonials-grid">
                                    <div class="testimonial-card">
                                        <div class="testimonial-quote">
                                            <p>"Outstanding WordPress development with innovative glassmorphism design. Delivered exactly what we envisioned for our creative portfolio."</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <strong>Creative Agency Client</strong>
                                            <span>Portfolio Website Project</span>
                                        </div>
                                    </div>
                                    
                                    <div class="testimonial-card">
                                        <div class="testimonial-quote">
                                            <p>"Exceptional technical problem-solving and performance optimization. The modal system works flawlessly across all devices."</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <strong>Professional Artist</strong>
                                            <span>Gallery Website Development</span>
                                        </div>
                                    </div>
                                    
                                    <div class="testimonial-card">
                                        <div class="testimonial-quote">
                                            <p>"Clean code, professional workflow, and innovative solutions. Transformed our vision into a high-performance reality."</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <strong>Business Client</strong>
                                            <span>Custom WordPress Development</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Portfolio Sidebar -->
                        <div class="portfolio-sidebar">
                            
                            <!-- Portfolio Stats -->
                            <div class="portfolio-stats">
                                <h3>📊 Portfolio Statistics</h3>
                                <ul>
                                    <li><strong>Projects Completed:</strong> 25+ WordPress websites</li>
                                    <li><strong>Client Satisfaction:</strong> 100% positive feedback</li>
                                    <li><strong>Specialization:</strong> Creative portfolio sites</li>
                                    <li><strong>Technical Focus:</strong> Performance optimization</li>
                                    <li><strong>Design Approach:</strong> Glassmorphism & modern UI</li>
                                    <li><strong>Development Style:</strong> Clean, maintainable code</li>
                                </ul>
                            </div>
                            
                            <!-- Skills & Services -->
                            <div class="services-section">
                                <h3>🛠️ Available Services</h3>
                                <div class="services-list">
                                    <div class="service-item">
                                        <div class="service-name">WordPress Development</div>
                                        <div class="service-level">Expert</div>
                                    </div>
                                    <div class="service-item">
                                        <div class="service-name">Custom Theme Creation</div>
                                        <div class="service-level">Advanced</div>
                                    </div>
                                    <div class="service-item">
                                        <div class="service-name">Performance Optimization</div>
                                        <div class="service-level">Advanced</div>
                                    </div>
                                    <div class="service-item">
                                        <div class="service-name">Glassmorphism Design</div>
                                        <div class="service-level">Signature</div>
                                    </div>
                                    <div class="service-item">
                                        <div class="service-name">Responsive Development</div>
                                        <div class="service-level">Expert</div>
                                    </div>
                                    <div class="service-item">
                                        <div class="service-name">Creative Problem Solving</div>
                                        <div class="service-level">Innovation</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
            
            </div>
            
        </div>
        
    </main>
</div>

<style>
/* Override text shadows for crisp white subtitles - Portfolio page specific */
.portfolio-intro h3,
.portfolio-intro h2,
.portfolio-links h4,
.portfolio-link-card h4,
.dashboard-content h3,
.dashboard-content h2,
.portfolio-content h3,
.portfolio-content h2 {
    text-shadow: none !important;
    color: #ffffff !important;
    font-weight: 600 !important;
}

/* Broader override for any shadowy text in dashboard content */
.dashboard-content * {
    text-shadow: none !important;
}

/* Portfolio Grid Layout - matches About page structure */
.portfolio-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 60px;
    margin-top: 40px;
}

/* Main Portfolio Content */
.portfolio-main {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 40px;
    -webkit-backdrop-filter: blur(15px);
    backdrop-filter: blur(15px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

/* Portfolio Sidebar */
.portfolio-sidebar {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.portfolio-stats,
.services-section {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 30px;
    -webkit-backdrop-filter: blur(15px);
    backdrop-filter: blur(15px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

/* Portfolio Link Cards */
.links-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-top: 25px;
}

.portfolio-link-card {
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    padding: 25px;
    transition: all 0.3s ease;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
}

.portfolio-link-card:hover {
    background: rgba(255, 255, 255, 0.12);
    border-color: rgba(255, 255, 255, 0.25);
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.link-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 15px;
}

.link-type {
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

.portfolio-btn {
    display: inline-block;
    padding: 12px 20px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 15px;
    color: white;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    margin-top: 15px;
}

.portfolio-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-1px);
}

/* Testimonials */
.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 25px;
}

.testimonial-card {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    padding: 20px;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
}

.testimonial-author {
    margin-top: 15px;
    text-align: right;
}

.testimonial-author span {
    display: block;
    font-size: 0.9em;
    color: rgba(255, 255, 255, 0.7);
    margin-top: 4px;
}

/* Services */
.services-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.service-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.service-level {
    font-size: 0.8em;
    padding: 4px 8px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    font-weight: 600;
}

/* Portfolio Stats List */
.portfolio-stats ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.portfolio-stats li {
    margin-bottom: 12px;
    font-size: 0.95em;
    padding: 8px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    line-height: 1.4;
}

.portfolio-stats li:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.portfolio-stats strong {
    color: white;
    font-weight: 600;
}

/* Responsive */
@media (max-width: 1024px) {
    .portfolio-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
}

@media (max-width: 768px) {
    .links-grid {
        grid-template-columns: 1fr;
    }
    
    .testimonials-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>