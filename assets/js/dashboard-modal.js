// Simple Dashboard Modal System - Performance Focused

/**
 * Open the dashboard modal
 */
function openDashboardModal() {
    try {
        const modal = document.getElementById('dashboardModal');
        if (modal) {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
            console.log('Dashboard opened');
        }
    } catch (error) {
        console.error('Error opening dashboard:', error);
    }
}

/**
 * Close the dashboard modal
 */
function closeDashboardModal() {
    try {
        const modal = document.getElementById('dashboardModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
            showDashboardGrid();
        }
    } catch (error) {
        console.error('Error closing dashboard:', error);
    }
}

/**
 * Show the main dashboard grid
 */
function showDashboardGrid() {
    try {
        const gridView = document.getElementById('dashboardGrid');
        const viewContent = document.getElementById('dashboardViewContent');
        
        if (gridView && viewContent) {
            gridView.style.display = 'block';
            viewContent.style.display = 'none';
            
            // Reset header
            const title = document.getElementById('dashboardTitle');
            const subtitle = document.getElementById('dashboardSubtitle');
            if (title) title.textContent = '🎨 Creative Dashboard';
            if (subtitle) subtitle.textContent = 'Analytics & Content Management';
        }
    } catch (error) {
        console.error('Error showing dashboard grid:', error);
    }
}

/**
 * Return to dashboard grid from individual view
 */
function returnToDashboardGrid() {
    showDashboardGrid();
}

/**
 * Load dashboard view - simplified
 */
function loadDashboardView(viewType) {
    try {
        const gridView = document.getElementById('dashboardGrid');
        const viewContent = document.getElementById('dashboardViewContent');
        const contentContainer = document.getElementById('viewContentContainer');
        
        if (!gridView || !viewContent || !contentContainer) {
            console.warn('Dashboard elements not found');
            return;
        }
        
        // Show simple loading
        contentContainer.innerHTML = '<div class="simple-loading">Loading ' + viewType + '...</div>';
        gridView.style.display = 'none';
        viewContent.style.display = 'block';
        
        // Update header
        updateDashboardHeader(viewType);
        
        // Load simple content
        setTimeout(() => {
            loadSimpleContent(viewType, contentContainer);
        }, 100);
        
    } catch (error) {
        console.error('Error loading dashboard view:', error);
    }
}

/**
 * Update dashboard header
 */
function updateDashboardHeader(viewType) {
    const title = document.getElementById('dashboardTitle');
    const subtitle = document.getElementById('dashboardSubtitle');
    
    const titles = {
        'analytics': ['📊 Analytics', 'Site performance data'],
        'gallery': ['🎨 Gallery', 'Media management'],
        'portfolio': ['🖥️ Portfolio', 'Work showcase'],
        'data-extraction': ['📁 Data Tools', 'Content analysis'],
        'settings': ['⚙️ Settings', 'Site configuration'],
        'contact': ['💬 Contact', 'Client messages']
    };
    
    const info = titles[viewType] || ['🎨 Dashboard', 'Management tools'];
    if (title) title.textContent = info[0];
    if (subtitle) subtitle.textContent = info[1];
}

/**
 * Load simple content without complex fetching
 */
function loadSimpleContent(viewType, container) {
    if (viewType === 'analytics') {
        loadRealAnalytics(container);
    } else if (viewType === 'gallery') {
        loadGalleryManagement(container);
    } else if (viewType === 'data-extraction') {
        loadDataExtraction(container);
    } else {
        const content = {
            'portfolio': `
                <h3>🖥️ Portfolio Builder</h3>
                <p>Portfolio creation and management tools.</p>
                <button class="simple-btn">New Portfolio</button>
            `,
            'settings': `
                <h3>⚙️ Site Settings</h3>
                <p>Configuration options for your creative site.</p>
                <button class="simple-btn">General Settings</button>
            `,
            'contact': `
                <h3>💬 Contact Center</h3>
                <div class="simple-stats">
                    <div class="stat">Recent: 5</div>
                    <div class="stat">Pending: 2</div>
                    <div class="stat">Total: 47</div>
                </div>
            `
        };
        container.innerHTML = content[viewType] || '<p>Content not available</p>';
    }
}

/**
 * Load real WordPress analytics data
 */
function loadRealAnalytics(container) {
    container.innerHTML = `
        <h3>📊 Real Analytics Dashboard</h3>
        <div id="analyticsLoader" class="simple-loading">Loading real data...</div>
        <div id="analyticsContent" style="display: none;">
            <div class="analytics-grid">
                <div class="analytics-section">
                    <h4>📈 WordPress Stats</h4>
                    <div class="simple-metrics">
                        <div class="metric">
                            <h4>Total Posts</h4>
                            <p id="totalPosts">-</p>
                        </div>
                        <div class="metric">
                            <h4>Published Pages</h4>
                            <p id="totalPages">-</p>
                        </div>
                        <div class="metric">
                            <h4>Media Files</h4>
                            <p id="totalMedia">-</p>
                        </div>
                        <div class="metric">
                            <h4>Total Comments</h4>
                            <p id="totalComments">-</p>
                        </div>
                    </div>
                </div>
                
                <div class="analytics-section">
                    <h4>🌐 Site Kit Analytics</h4>
                    <div class="simple-metrics">
                        <div class="metric">
                            <h4>Page Views (30d)</h4>
                            <p id="pageViews">-</p>
                        </div>
                        <div class="metric">
                            <h4>Unique Visitors</h4>
                            <p id="uniqueVisitors">-</p>
                        </div>
                        <div class="metric">
                            <h4>Bounce Rate</h4>
                            <p id="bounceRate">-</p>
                        </div>
                        <div class="metric">
                            <h4>Avg. Session</h4>
                            <p id="avgSession">-</p>
                        </div>
                    </div>
                </div>
                
                <div class="analytics-section">
                    <h4>🎨 Creative Content</h4>
                    <div class="simple-metrics">
                        <div class="metric">
                            <h4>Gallery Items</h4>
                            <p id="galleryCount">-</p>
                        </div>
                        <div class="metric">
                            <h4>Portfolio Projects</h4>
                            <p id="portfolioCount">-</p>
                        </div>
                        <div class="metric">
                            <h4>Recent Updates</h4>
                            <p id="recentUpdates">-</p>
                        </div>
                        <div class="metric">
                            <h4>Contact Forms</h4>
                            <p id="contactForms">-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Load real data via AJAX
    fetchRealAnalytics();
}

/**
 * Load gallery management with upload cards
 */
function loadGalleryManagement(container) {
    container.innerHTML = `
        <h3>🎨 Gallery Management</h3>
        <div class="gallery-upload-grid">
            <!-- Image Upload Card -->
            <div class="upload-card">
                <div class="upload-card-header">
                    <h4>📸 Image Upload</h4>
                    <span class="upload-count" id="imageCount">0 images</span>
                </div>
                <div class="upload-zone" onclick="triggerImageUpload()">
                    <div class="upload-icon">📷</div>
                    <p>Drop images here or click to browse</p>
                    <small>JPG, PNG, GIF, WebP</small>
                </div>
                <input type="file" id="imageUploader" multiple accept="image/*" style="display: none;" onchange="handleImageUpload(event)">
                <div class="upload-actions">
                    <button class="simple-btn" onclick="triggerImageUpload()">Browse Images</button>
                    <button class="simple-btn" onclick="viewMediaLibrary('images')">View Library</button>
                </div>
            </div>
            
            <!-- Video Upload Card -->
            <div class="upload-card">
                <div class="upload-card-header">
                    <h4>🎬 Video Upload</h4>
                    <span class="upload-count" id="videoCount">0 videos</span>
                </div>
                <div class="upload-zone" onclick="triggerVideoUpload()">
                    <div class="upload-icon">🎥</div>
                    <p>Drop videos here or click to browse</p>
                    <small>MP4, MOV, AVI, WebM</small>
                </div>
                <input type="file" id="videoUploader" multiple accept="video/*" style="display: none;" onchange="handleVideoUpload(event)">
                <div class="upload-actions">
                    <button class="simple-btn" onclick="triggerVideoUpload()">Browse Videos</button>
                    <button class="simple-btn" onclick="viewMediaLibrary('videos')">View Library</button>
                </div>
            </div>
        </div>
        
        <!-- Recent Uploads -->
        <div class="recent-uploads">
            <h4>📁 Recent Uploads</h4>
            <div id="recentUploadsGrid" class="recent-grid">
                <p>No recent uploads</p>
            </div>
        </div>
    `;
    
    // Load current media counts
    fetchMediaCounts();
}

/**
 * Load data extraction tools
 */
function loadDataExtraction(container) {
    container.innerHTML = `
        <h3>📁 Live Media Extraction</h3>
        <div class="extraction-tools">
            <div class="url-input-section">
                <input type="url" id="extractionUrl" placeholder="https://example.com" class="extraction-input">
                <button class="simple-btn" onclick="extractLiveMedia()">🔍 Extract Media</button>
            </div>
            
            <div class="extraction-options">
                <label><input type="checkbox" id="extractImages" checked> 📸 Extract Images</label>
                <label><input type="checkbox" id="extractVideos" checked> 🎬 Extract Videos</label>
                <label><input type="checkbox" id="liveOnly" checked> ✅ Live Content Only</label>
            </div>
        </div>
        
        <div id="extractionResults" class="extraction-results">
            <p class="extraction-hint">Enter a website URL above to extract live images and videos</p>
        </div>
        
        <div id="extractionProgress" class="extraction-progress" style="display: none;">
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill"></div>
            </div>
            <p id="progressText">Analyzing website...</p>
        </div>
    `;
}

/**
 * Fetch real WordPress analytics via AJAX
 */
function fetchRealAnalytics() {
    // WordPress AJAX call for real data
    fetch(window.location.origin + '/wp-admin/admin-ajax.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=get_dashboard_analytics'
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('analyticsLoader').style.display = 'none';
        document.getElementById('analyticsContent').style.display = 'block';
        
        // Update WordPress stats
        document.getElementById('totalPosts').textContent = data.posts || '0';
        document.getElementById('totalPages').textContent = data.pages || '0';
        document.getElementById('totalMedia').textContent = data.media || '0';
        document.getElementById('totalComments').textContent = data.comments || '0';
        
        // Update creative content stats
        document.getElementById('galleryCount').textContent = data.gallery || '0';
        document.getElementById('portfolioCount').textContent = data.portfolio || '0';
        document.getElementById('recentUpdates').textContent = data.recent || '0';
        document.getElementById('contactForms').textContent = data.contacts || '0';
        
        // Site Kit data (if available)
        if (data.sitekit) {
            document.getElementById('pageViews').textContent = data.sitekit.pageviews || 'N/A';
            document.getElementById('uniqueVisitors').textContent = data.sitekit.users || 'N/A';
            document.getElementById('bounceRate').textContent = data.sitekit.bounce_rate || 'N/A';
            document.getElementById('avgSession').textContent = data.sitekit.avg_session || 'N/A';
        }
    })
    .catch(error => {
        document.getElementById('analyticsLoader').innerHTML = 'Analytics data temporarily unavailable';
        console.log('Analytics fetch info:', error);
    });
}

/**
 * Gallery Upload Functions
 */
function triggerImageUpload() {
    document.getElementById('imageUploader').click();
}

function triggerVideoUpload() {
    document.getElementById('videoUploader').click();
}

function handleImageUpload(event) {
    const files = event.target.files;
    if (files.length > 0) {
        uploadToWordPress(files, 'image');
    }
}

function handleVideoUpload(event) {
    const files = event.target.files;
    if (files.length > 0) {
        uploadToWordPress(files, 'video');
    }
}

function uploadToWordPress(files, type) {
    const formData = new FormData();
    formData.append('action', 'upload_dashboard_media');
    formData.append('media_type', type);
    
    for (let i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
    }
    
    // Show upload progress
    const progressDiv = document.createElement('div');
    progressDiv.innerHTML = `<p>Uploading ${files.length} ${type}(s)...</p>`;
    document.getElementById('recentUploadsGrid').prepend(progressDiv);
    
    fetch(window.location.origin + '/wp-admin/admin-ajax.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        progressDiv.remove();
        if (data.success) {
            refreshRecentUploads();
            fetchMediaCounts();
            alert(`${files.length} ${type}(s) uploaded successfully!`);
        } else {
            alert('Upload failed: ' + (data.message || 'Unknown error'));
        }
    })
    .catch(error => {
        progressDiv.remove();
        alert('Upload error occurred');
        console.log('Upload error:', error);
    });
}

function viewMediaLibrary(type) {
    // Open WordPress media library in new tab
    window.open('/wp-admin/upload.php?mode=list', '_blank');
}

function fetchMediaCounts() {
    fetch(window.location.origin + '/wp-admin/admin-ajax.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=get_media_counts'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('imageCount').textContent = `${data.images} images`;
            document.getElementById('videoCount').textContent = `${data.videos} videos`;
        }
    })
    .catch(error => console.log('Media count fetch info:', error));
}

function refreshRecentUploads() {
    fetch(window.location.origin + '/wp-admin/admin-ajax.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=get_recent_uploads'
    })
    .then(response => response.json())
    .then(data => {
        const grid = document.getElementById('recentUploadsGrid');
        if (data.success && data.uploads.length > 0) {
            grid.innerHTML = data.uploads.map(upload => `
                <div class="recent-item">
                    <img src="${upload.thumbnail}" alt="${upload.title}" />
                    <span>${upload.title}</span>
                </div>
            `).join('');
        } else {
            grid.innerHTML = '<p>No recent uploads</p>';
        }
    })
    .catch(error => console.log('Recent uploads fetch info:', error));
}

/**
 * Data Extraction Functions
 */
function extractLiveMedia() {
    console.log('Extract function called!'); // Debug log
    
    const url = document.getElementById('extractionUrl').value;
    console.log('URL entered:', url); // Debug log
    
    if (!url || !url.startsWith('http')) {
        alert('Please enter a valid URL starting with http:// or https://');
        return;
    }
    
    console.log('Making AJAX call...'); // Debug log
    
    // Show progress
    document.getElementById('extractionProgress').style.display = 'block';
    document.getElementById('extractionResults').innerHTML = '';
    
    // Make extraction request
    fetch(window.location.origin + '/wp-admin/admin-ajax.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `action=extract_live_media&url=${encodeURIComponent(url)}`
    })
    .then(response => response.json())
    .then(data => {
        console.log('Response received:', data); // Debug log
        document.getElementById('extractionProgress').style.display = 'none';
        
        if (data.success) {
            console.log('Success data:', data.data); // Debug the actual data
            console.log('About to call displayExtractionResults with:', data.data);
            displayExtractionResults(data.data);
            console.log('displayExtractionResults called');
        } else {
            alert('Extraction failed: ' + (data.data || 'Unknown error'));
        }
    })
    .catch(error => {
        console.error('Extraction error:', error);
        document.getElementById('extractionProgress').style.display = 'none';
        alert('Network error occurred');
    });
}

function displayExtractionResults(data) {
    console.log('=== DISPLAY FUNCTION CALLED ===');
    console.log('Data received:', data);
    
    const resultsDiv = document.getElementById('extractionResults');
    console.log('Results div found:', !!resultsDiv);
    
    if (!resultsDiv) {
        console.error('Results div not found!');
        return;
    }
    
    // Force test display for debugging
    if (data && data.images && Array.isArray(data.images)) {
        console.log('Images array found:', data.images.length, 'items');
        
        let html = '<div class="extraction-summary">';
        html += `<h4>🎯 SUCCESS! Found Media</h4>`;
        html += `<p>Found ${data.images.length} test images</p>`;
        html += '</div>';
        
        html += '<div class="extracted-section"><h5>📸 Test Images:</h5><div class="extracted-grid">';
        data.images.forEach((img, index) => {
            console.log('Processing image', index, img);
            html += `<div class="extracted-item">`;
            html += `<p>Test Image ${index + 1}</p>`;
            html += `<span>${img.alt || 'Test image'}</span>`;
            html += `</div>`;
        });
        html += '</div></div>';
        
        console.log('Setting HTML:', html);
        resultsDiv.innerHTML = html;
        console.log('HTML set successfully');
    } else {
        console.log('No valid image data found');
        resultsDiv.innerHTML = '<p class="no-results">Debug: No image array found</p>';
    }
}

// Simple styles for dashboard content
const simpleStyles = `
<style>
.simple-loading {
    text-align: center;
    color: #ffffff;
    font-size: 1.1rem;
    padding: 40px;
}

.simple-metrics, .simple-stats {
    display: flex;
    gap: 20px;
    margin: 20px 0;
    flex-wrap: wrap;
}

.metric, .stat {
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    flex: 1;
    min-width: 120px;
}

.metric h4 {
    color: #ffffff;
    margin: 0 0 10px 0;
    font-size: 1rem;
}

.metric p {
    color: #00ff88;
    font-size: 1.5rem;
    font-weight: bold;
    margin: 0;
}

.stat {
    color: #ffffff;
    font-weight: 500;
}

.simple-btn {
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    padding: 12px 24px;
    border-radius: 8px;
    cursor: pointer;
    margin: 10px 5px;
    transition: background 0.1s ease;
}

.simple-btn:hover {
    background: rgba(255, 255, 255, 0.25);
}

.simple-input {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    padding: 12px 16px;
    border-radius: 8px;
    margin: 10px 5px;
    width: 250px;
}

.simple-input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

h3 {
    color: #ffffff;
    margin-bottom: 20px;
}

p {
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.5;
}

/* Analytics Grid */
.analytics-grid {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.analytics-section h4 {
    color: #ffffff;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

/* Gallery Upload Grid */
.gallery-upload-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
    margin-bottom: 30px;
}

@media (max-width: 768px) {
    .gallery-upload-grid {
        grid-template-columns: 1fr;
    }
}

.upload-card {
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 15px;
    padding: 20px;
    text-align: center;
}

.upload-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.upload-card-header h4 {
    color: #ffffff;
    margin: 0;
}

.upload-count {
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.9rem;
}

.upload-zone {
    background: rgba(255, 255, 255, 0.05);
    border: 2px dashed rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    padding: 30px 15px;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-bottom: 15px;
}

.upload-zone:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(0, 150, 255, 0.5);
}

.upload-icon {
    font-size: 2.5rem;
    margin-bottom: 15px;
}

.upload-zone p {
    margin: 0 0 10px 0;
    color: #ffffff;
}

.upload-zone small {
    color: rgba(255, 255, 255, 0.6);
}

.upload-actions {
    display: flex;
    gap: 10px;
    justify-content: center;
    flex-wrap: wrap;
}

/* Recent Uploads */
.recent-uploads h4 {
    color: #ffffff;
    margin-bottom: 15px;
}

.recent-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 15px;
}

.recent-item {
    text-align: center;
}

.recent-item img {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 8px;
}

.recent-item span {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.85rem;
    display: block;
}

/* Data Extraction Styles */
.extraction-tools {
    background: rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
}

.url-input-section {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    align-items: center;
}

.extraction-input {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    padding: 12px 16px;
    border-radius: 8px;
    flex: 1;
    min-width: 300px;
}

.extraction-input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

.extraction-options {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.extraction-options label {
    color: rgba(255, 255, 255, 0.9);
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
}

.extraction-options input[type="checkbox"] {
    margin: 0;
}

.extraction-progress {
    background: rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    padding: 20px;
    margin: 20px 0;
}

.progress-bar {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    height: 8px;
    margin-bottom: 15px;
    overflow: hidden;
}

.progress-fill {
    background: linear-gradient(90deg, #00ff88, #00ccff);
    height: 100%;
    width: 0%;
    transition: width 0.3s ease;
}

.extraction-results {
    margin-top: 20px;
}

.extraction-summary {
    background: rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
}

.extraction-summary h4 {
    color: #ffffff;
    margin: 0 0 10px 0;
}

.extracted-section {
    margin-bottom: 25px;
}

.extracted-section h5 {
    color: #ffffff;
    margin-bottom: 15px;
}

.extracted-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 15px;
}

.extracted-item {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 8px;
    padding: 10px;
    text-align: center;
}

.extracted-item img, .extracted-item video {
    width: 100%;
    max-height: 120px;
    object-fit: cover;
    border-radius: 6px;
    margin-bottom: 8px;
}

.extracted-item span {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.85rem;
    display: block;
}

.extraction-hint, .no-results, .error {
    text-align: center;
    padding: 30px;
    color: rgba(255, 255, 255, 0.7);
}

.error {
    color: #ff6b6b;
}
</style>
`;

// Inject simple styles
document.head.insertAdjacentHTML('beforeend', simpleStyles);

/**
 * Get view information for header updates
 */
function getDashboardViewInfo(viewType) {
    const viewInfoMap = {
        'analytics': {
            title: '📊 Analytics Dashboard',
            subtitle: 'Real-time site metrics and performance data'
        },
        'gallery': {
            title: '🎨 Gallery Manager',
            subtitle: 'Organize and manage your creative portfolio'
        },
        'portfolio': {
            title: '🖥️ Portfolio Builder',
            subtitle: 'Craft your creative presentations'
        },
        'data-extraction': {
            title: '📁 Data Extraction',
            subtitle: 'Website analysis and content extraction'
        },
        'settings': {
            title: '⚙️ Site Settings',
            subtitle: 'Configure your creative workspace'
        },
        'contact': {
            title: '💬 Contact Center',
            subtitle: 'Client communication and inquiries'
        }
    };
    
    return viewInfoMap[viewType] || {
        title: '🎨 Dashboard',
        subtitle: 'Creative management tools'
    };
}

/**
 * Load analytics content from the dashboard theme
 */
async function loadAnalyticsContent() {
    try {
        // If we have preloaded content, use it
        if (dashboardContent.analytics) {
            return dashboardContent.analytics;
        }
        
        // Otherwise, fetch from the dashboard theme
        const response = await fetch(window.location.origin + '/wp-content/themes/dashboard-theme/parts/analytics-content.php');
        if (response.ok) {
            const content = await response.text();
            dashboardContent.analytics = content;
            return content;
        } else {
            throw new Error('Failed to load analytics content');
        }
    } catch (error) {
        console.error('Error loading analytics:', error);
        return `
            <div class="dashboard-placeholder">
                <h3>📊 Analytics Dashboard</h3>
                <p>Real-time analytics integration coming soon!</p>
                <div class="placeholder-metrics">
                    <div class="metric-card">
                        <h4>Page Views</h4>
                        <p class="metric-value">Loading...</p>
                    </div>
                    <div class="metric-card">
                        <h4>Unique Visitors</h4>
                        <p class="metric-value">Loading...</p>
                    </div>
                    <div class="metric-card">
                        <h4>Bounce Rate</h4>
                        <p class="metric-value">Loading...</p>
                    </div>
                </div>
            </div>
        `;
    }
}

/**
 * Load gallery content
 */
async function loadGalleryContent() {
    try {
        if (dashboardContent.gallery) {
            return dashboardContent.gallery;
        }
        
        const response = await fetch(window.location.origin + '/wp-content/themes/dashboard-theme/parts/gallery-content.php');
        if (response.ok) {
            const content = await response.text();
            dashboardContent.gallery = content;
            return content;
        } else {
            throw new Error('Failed to load gallery content');
        }
    } catch (error) {
        console.error('Error loading gallery:', error);
        return `
            <div class="dashboard-placeholder">
                <h3>🎨 Gallery Manager</h3>
                <p>Creative portfolio management tools</p>
                <div class="placeholder-gallery">
                    <div class="gallery-upload-zone">
                        <p>Drag & drop images here</p>
                        <button class="upload-btn">Browse Files</button>
                    </div>
                </div>
            </div>
        `;
    }
}

/**
 * Load portfolio content
 */
async function loadPortfolioContent() {
    return `
        <div class="dashboard-placeholder">
            <h3>🖥️ Portfolio Builder</h3>
            <p>Create stunning presentations of your work</p>
            <div class="portfolio-tools">
                <button class="tool-btn">New Portfolio</button>
                <button class="tool-btn">Edit Existing</button>
                <button class="tool-btn">Portfolio Templates</button>
            </div>
        </div>
    `;
}

/**
 * Load data extraction content
 */
async function loadDataExtractionContent() {
    try {
        if (dashboardContent.dataExtraction) {
            return dashboardContent.dataExtraction;
        }
        
        const response = await fetch(window.location.origin + '/wp-content/themes/dashboard-theme/parts/data-extraction-content.php');
        if (response.ok) {
            const content = await response.text();
            dashboardContent.dataExtraction = content;
            return content;
        } else {
            throw new Error('Failed to load data extraction content');
        }
    } catch (error) {
        console.error('Error loading data extraction:', error);
        return `
            <div class="dashboard-placeholder">
                <h3>📁 Data Extraction</h3>
                <p>Website analysis and content extraction tools</p>
                <div class="extraction-tools">
                    <input type="url" placeholder="Enter website URL..." class="url-input">
                    <button class="extract-btn">Extract Data</button>
                </div>
            </div>
        `;
    }
}

/**
 * Load settings content
 */
async function loadSettingsContent() {
    return `
        <div class="dashboard-placeholder">
            <h3>⚙️ Site Settings</h3>
            <p>Configure your creative workspace</p>
            <div class="settings-sections">
                <div class="setting-group">
                    <h4>General Settings</h4>
                    <p>Basic site configuration</p>
                </div>
                <div class="setting-group">
                    <h4>Display Options</h4>
                    <p>Customize your site appearance</p>
                </div>
                <div class="setting-group">
                    <h4>Performance</h4>
                    <p>Optimize site speed and caching</p>
                </div>
            </div>
        </div>
    `;
}

/**
 * Load contact content
 */
async function loadContactContent() {
    return `
        <div class="dashboard-placeholder">
            <h3>💬 Contact Center</h3>
            <p>Manage client communications and inquiries</p>
            <div class="contact-stats">
                <div class="stat-card">
                    <h4>Recent Inquiries</h4>
                    <p class="stat-value">12</p>
                </div>
                <div class="stat-card">
                    <h4>Pending Responses</h4>
                    <p class="stat-value">3</p>
                </div>
                <div class="stat-card">
                    <h4>This Month</h4>
                    <p class="stat-value">45</p>
                </div>
            </div>
        </div>
    `;
}

/**
 * Initialize view-specific scripts after content loads
 */
function initializeViewScripts(viewType) {
    switch(viewType) {
        case 'analytics':
            // Initialize analytics charts/graphs
            if (typeof initializeAnalyticsCharts === 'function') {
                initializeAnalyticsCharts();
            }
            break;
        case 'gallery':
            // Initialize gallery drag & drop
            if (typeof initializeGalleryUpload === 'function') {
                initializeGalleryUpload();
            }
            break;
        case 'data-extraction':
            // Initialize data extraction tools
            if (typeof initializeDataExtraction === 'function') {
                initializeDataExtraction();
            }
            break;
    }
}

/**
 * Preload dashboard content sections for faster switching
 */
async function loadDashboardContentSections() {
    try {
        // Try to preload key sections
        const sections = ['analytics', 'gallery', 'data-extraction'];
        
        for (const section of sections) {
            try {
                await loadDashboardView(section);
            } catch (error) {
                console.log('Could not preload section:', section);
            }
        }
    } catch (error) {
        console.log('Dashboard content preloading not available');
    }
}

// Placeholder styles for dashboard content
const dashboardPlaceholderStyles = `
<style>
.dashboard-placeholder {
    text-align: center;
    padding: 40px 20px;
}

.dashboard-placeholder h3 {
    color: #ffffff;
    font-size: 2rem;
    margin-bottom: 15px;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
}

.dashboard-placeholder p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.1rem;
    margin-bottom: 30px;
}

.placeholder-metrics, .portfolio-tools, .extraction-tools, .contact-stats, .settings-sections {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 30px;
}

.metric-card, .stat-card, .setting-group {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    padding: 20px;
    min-width: 150px;
    backdrop-filter: blur(10px);
}

.metric-card h4, .stat-card h4, .setting-group h4 {
    color: #ffffff;
    margin: 0 0 10px 0;
    font-size: 1rem;
}

.metric-value, .stat-value {
    color: #00ff88;
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0;
}

.tool-btn, .extract-btn, .upload-btn {
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    padding: 12px 24px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 500;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.tool-btn:hover, .extract-btn:hover, .upload-btn:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
}

.url-input {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    padding: 12px 20px;
    border-radius: 10px;
    width: 300px;
    margin-right: 15px;
    backdrop-filter: blur(10px);
}

.url-input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

.gallery-upload-zone {
    background: rgba(255, 255, 255, 0.08);
    border: 2px dashed rgba(255, 255, 255, 0.3);
    border-radius: 15px;
    padding: 40px;
    text-align: center;
    color: rgba(255, 255, 255, 0.8);
}

.dashboard-loading {
    text-align: center;
    color: #ffffff;
    font-size: 1.2rem;
    padding: 40px;
}

.dashboard-error {
    text-align: center;
    color: #ff6b6b;
    font-size: 1.1rem;
    padding: 40px;
}
</style>
`;

// Inject placeholder styles
document.head.insertAdjacentHTML('beforeend', dashboardPlaceholderStyles);