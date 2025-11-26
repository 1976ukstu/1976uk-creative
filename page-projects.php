<?php
/**
 * Template Name: Projects
 * 
 * Projects page for 1976uk Creative - subdomain strategy and development roadmap
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
        
        <!-- Projects Content with Dashboard Styling -->
        <div class="dashboard-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Beautiful Page Header - Gallery Style -->
                    <div class="dashboard-header">
                        <div class="dashboard-title">
                            <h1>🚀 Development Projects & Strategy</h1>
                        </div>
                        <div class="dashboard-subtitle">
                            Subdomain architecture, development roadmap, and innovative project concepts
                        </div>
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
            <!-- Dashboard Section for Projects Strategy -->
            <div class="dashboard-section">
                <h2>🛠️ Project Innovation Hub</h2>
                <p>Strategic development initiatives and creative technology concepts</p>
                    
                    <!-- Projects Grid Layout -->
                    <div class="projects-grid">
                        
                        <!-- Main Projects Content -->
                        <div class="projects-main">
                            <?php if (get_the_content()) : ?>
                                <div class="projects-intro">
                                    <?php the_content(); ?>
                                </div>
                            <?php else : ?>
                                <div class="projects-intro">
                                    <h2>🌟 Subdomain Strategy Concepts</h2>
                                    <p>Exploring innovative architecture with specialized subdomain applications for enhanced user experience and technical excellence. Each concept represents a focused development initiative.</p>
                                    
                                    <h3>🏗️ Architecture Vision</h3>
                                    <p>Multi-domain approach enabling specialized functionality while maintaining cohesive branding and user experience. Technical innovation meets strategic planning.</p>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Project Concepts -->
                            <div class="project-concepts">
                                <h3>💡 Strategic Development Concepts</h3>
                                
                                <div class="concepts-grid">
                                    <div class="project-concept-card">
                                        <div class="concept-header">
                                            <h4>🎛️ dashboard.1976uk.com</h4>
                                            <span class="concept-status">Planning</span>
                                        </div>
                                        <p><strong>Vision:</strong> Professional content management and analytics dashboard for creative professionals.</p>
                                        <p><strong>Features:</strong> Gallery management, performance metrics, client portal, content scheduling.</p>
                                        <div class="concept-tech">
                                            <strong>Tech Stack:</strong> WordPress API, Custom PHP, Advanced Analytics
                                        </div>
                                    </div>
                                    
                                    <div class="project-concept-card">
                                        <div class="concept-header">
                                            <h4>🛠️ apps.1976uk.com</h4>
                                            <span class="concept-status">Concept</span>
                                        </div>
                                        <p><strong>Vision:</strong> Specialized application hub featuring custom tools and experimental interfaces.</p>
                                        <p><strong>Features:</strong> Development utilities, client tools, portfolio generators, creative experiments.</p>
                                        <div class="concept-tech">
                                            <strong>Tech Stack:</strong> React/Vue.js, Node.js, Progressive Web App
                                        </div>
                                    </div>
                                    
                                    <div class="project-concept-card">
                                        <div class="concept-header">
                                            <h4>📊 analytics.1976uk.com</h4>
                                            <span class="concept-status">Research</span>
                                        </div>
                                        <p><strong>Vision:</strong> Advanced performance monitoring and user experience analytics platform.</p>
                                        <p><strong>Features:</strong> Real-time metrics, conversion tracking, user journey analysis, custom reports.</p>
                                        <div class="concept-tech">
                                            <strong>Tech Stack:</strong> Custom Analytics, Data Visualization, API Integration
                                        </div>
                                    </div>
                                    
                                    <div class="project-concept-card">
                                        <div class="concept-header">
                                            <h4>🎨 lab.1976uk.com</h4>
                                            <span class="concept-status">Active</span>
                                        </div>
                                        <p><strong>Vision:</strong> Experimental development playground and innovation showcase.</p>
                                        <p><strong>Features:</strong> Code experiments, design prototypes, technical blog, open source projects.</p>
                                        <div class="concept-tech">
                                            <strong>Tech Stack:</strong> Current WordPress Foundation, Advanced CSS, JavaScript
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Development Timeline -->
                            <div class="development-timeline">
                                <h3>📅 Development Roadmap</h3>
                                
                                <div class="timeline-container">
                                    <div class="timeline-phase">
                                        <div class="phase-header">
                                            <h4>Phase 1: Foundation (Current)</h4>
                                            <span class="phase-status active">In Progress</span>
                                        </div>
                                        <ul class="phase-tasks">
                                            <li>✅ Core site architecture with glassmorphism design</li>
                                            <li>✅ Gallery system with WordPress media integration</li>
                                            <li>✅ Responsive 2x2 grid implementation</li>
                                            <li>🔄 Hub pages template foundation (About, Portfolio, Projects)</li>
                                            <li>⏳ Content population and professional copywriting</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="timeline-phase">
                                        <div class="phase-header">
                                            <h4>Phase 2: Subdomain Architecture</h4>
                                            <span class="phase-status planned">Planned</span>
                                        </div>
                                        <ul class="phase-tasks">
                                            <li>⏳ Domain strategy and SSL configuration</li>
                                            <li>⏳ Dashboard subdomain development (dashboard.1976uk.com)</li>
                                            <li>⏳ Applications hub planning (apps.1976uk.com)</li>
                                            <li>⏳ Cross-domain authentication system</li>
                                            <li>⏳ API architecture for subdomain communication</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="timeline-phase">
                                        <div class="phase-header">
                                            <h4>Phase 3: Advanced Features</h4>
                                            <span class="phase-status future">Future</span>
                                        </div>
                                        <ul class="phase-tasks">
                                            <li>⏳ Custom analytics implementation</li>
                                            <li>⏳ Client portal and project management</li>
                                            <li>⏳ Progressive Web App conversion</li>
                                            <li>⏳ Advanced performance optimization</li>
                                            <li>⏳ Mobile application companion</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Projects Sidebar -->
                        <div class="projects-sidebar">
                            
                            <!-- Technical Specifications -->
                            <div class="tech-specs">
                                <h3>⚡ Technical Approach</h3>
                                <ul>
                                    <li><strong>Architecture:</strong> Modular subdomain strategy</li>
                                    <li><strong>Foundation:</strong> Proven WordPress base</li>
                                    <li><strong>Scaling:</strong> API-first development</li>
                                    <li><strong>Performance:</strong> Progressive optimization</li>
                                    <li><strong>Security:</strong> Cross-domain authentication</li>
                                    <li><strong>Innovation:</strong> Experimental features</li>
                                </ul>
                            </div>
                            
                            <!-- Current Projects Status -->
                            <div class="projects-status">
                                <h3>📈 Development Status</h3>
                                <div class="status-list">
                                    <div class="status-item">
                                        <div class="status-name">Core Foundation</div>
                                        <div class="status-progress active">85%</div>
                                    </div>
                                    <div class="status-item">
                                        <div class="status-name">Hub Pages Template</div>
                                        <div class="status-progress active">70%</div>
                                    </div>
                                    <div class="status-item">
                                        <div class="status-name">Content Strategy</div>
                                        <div class="status-progress planning">40%</div>
                                    </div>
                                    <div class="status-item">
                                        <div class="status-name">Dashboard Concept</div>
                                        <div class="status-progress planning">25%</div>
                                    </div>
                                    <div class="status-item">
                                        <div class="status-name">Apps Hub Planning</div>
                                        <div class="status-progress future">15%</div>
                                    </div>
                                    <div class="status-item">
                                        <div class="status-name">Analytics Integration</div>
                                        <div class="status-progress future">10%</div>
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
/* Override text shadows for crisp white subtitles - Projects page specific */
.projects-intro h3,
.projects-intro h2,
.project-concepts h4,
.project-concept-card h4,
.dashboard-content h3,
.dashboard-content h2,
.projects-content h3,
.projects-content h2 {
    text-shadow: none !important;
    color: #ffffff !important;
    font-weight: 600 !important;
}

/* Broader override for any shadowy text in dashboard content */
.dashboard-content * {
    text-shadow: none !important;
}

/* Projects Grid Layout - matches About page structure */
.projects-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 60px;
    margin-top: 40px;
}

/* Main Projects Content */
.projects-main {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 40px;
    -webkit-backdrop-filter: blur(15px);
    backdrop-filter: blur(15px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

/* Projects Sidebar */
.projects-sidebar {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.tech-specs,
.projects-status {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 30px;
    -webkit-backdrop-filter: blur(15px);
    backdrop-filter: blur(15px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

/* Project Concept Cards */
.concepts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-top: 25px;
}

.project-concept-card {
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    padding: 25px;
    transition: all 0.3s ease;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
}

.project-concept-card:hover {
    background: rgba(255, 255, 255, 0.12);
    border-color: rgba(255, 255, 255, 0.25);
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.concept-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 15px;
}

.concept-status {
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

.concept-tech {
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    font-size: 0.9em;
    color: rgba(255, 255, 255, 0.8);
}

/* Development Timeline */
.timeline-container {
    display: flex;
    flex-direction: column;
    gap: 25px;
    margin-top: 25px;
}

.timeline-phase {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    padding: 20px;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
}

.phase-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.phase-header h4 {
    margin: 0;
    color: white;
    font-size: 1.2em;
}

.phase-status {
    font-size: 0.8em;
    padding: 4px 12px;
    border-radius: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.phase-status.active {
    background: rgba(46, 204, 113, 0.8);
    color: white;
}

.phase-status.planned {
    background: rgba(52, 152, 219, 0.8);
    color: white;
}

.phase-status.future {
    background: rgba(155, 89, 182, 0.8);
    color: white;
}

.phase-tasks {
    list-style: none;
    padding: 0;
    margin: 0;
}

.phase-tasks li {
    padding: 6px 0;
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.95em;
    line-height: 1.4;
}

/* Tech Specs List */
.tech-specs ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.tech-specs li {
    margin-bottom: 12px;
    font-size: 0.95em;
    padding: 8px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    line-height: 1.4;
}

.tech-specs li:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.tech-specs strong {
    color: white;
    font-weight: 600;
}

/* Status Progress */
.status-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.status-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.status-item:last-child {
    border-bottom: none;
}

.status-name {
    font-size: 0.9em;
    color: rgba(255, 255, 255, 0.9);
}

.status-progress {
    font-size: 0.8em;
    padding: 4px 8px;
    border-radius: 8px;
    font-weight: 600;
    min-width: 45px;
    text-align: center;
}

.status-progress.active {
    background: rgba(46, 204, 113, 0.8);
    color: white;
}

.status-progress.planning {
    background: rgba(52, 152, 219, 0.8);
    color: white;
}

.status-progress.future {
    background: rgba(155, 89, 182, 0.8);
    color: white;
}

/* Responsive */
@media (max-width: 1024px) {
    .projects-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
}

@media (max-width: 768px) {
    .concepts-grid {
        grid-template-columns: 1fr;
    }
    
    .timeline-container {
        gap: 20px;
    }
    
    .phase-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
}
</style>

<?php get_footer(); ?>