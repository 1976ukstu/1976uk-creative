/**
 * Dashboard v2.0 Core JavaScript
 * Professional, modular JavaScript for dashboard functionality
 * Version: 2.0.0
 */

// Global Dashboard namespace
window.Dashboard = {
  // Configuration
  config: {
    version: '2.0.0',
    debug: false,
    ajaxUrl: '/wp-admin/admin-ajax.php',
    nonce: '',
    maxFileSize: 10 * 1024 * 1024, // 10MB
    allowedTypes: ['image/jpeg', 'image/png', 'image/gif', 'image/webp'],
  },

  // State management
  state: {
    currentTab: 'gallery',
    isUploading: false,
    uploadedFiles: [],
    dragCounter: 0,
  },

  // Initialize dashboard
  init() {
    console.log(`🚀 Dashboard v${this.config.version} initializing...`);

    this.bindEvents();
    this.initTabs();
    this.initDragDrop();
    this.loadSavedSettings();

    console.log('✅ Dashboard initialization complete');
  },

  // Bind all event listeners
  bindEvents() {
    // Tab navigation
    document.querySelectorAll('.nav-tab').forEach((tab) => {
      tab.addEventListener('click', (e) => {
        e.preventDefault();
        this.switchTab(tab.dataset.tab);
      });
    });

    // Navigation actions
    const logoutBtn = document.querySelector('[onclick="Dashboard.logout()"]');
    if (logoutBtn) {
      logoutBtn.addEventListener('click', (e) => {
        e.preventDefault();
        this.logout();
      });
    }

    // Settings form
    const settingsForm = document.getElementById('dashboard-settings');
    if (settingsForm) {
      settingsForm.addEventListener('submit', (e) => {
        e.preventDefault();
        this.saveSettings();
      });
    }

    // Keyboard shortcuts
    document.addEventListener('keydown', (e) => {
      if (e.ctrlKey || e.metaKey) {
        switch (e.key) {
          case '1':
            e.preventDefault();
            this.switchTab('gallery');
            break;
          case '2':
            e.preventDefault();
            this.switchTab('upload');
            break;
          case '3':
            e.preventDefault();
            this.switchTab('settings');
            break;
        }
      }
    });
  },

  // Initialize tab system
  initTabs() {
    const urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab') || 'gallery';
    this.switchTab(tab);
  },

  // Switch between tabs
  switchTab(tabName) {
    console.log(`🔄 Switching to ${tabName} tab`);

    // Update state
    this.state.currentTab = tabName;

    // Update tab buttons
    document.querySelectorAll('.nav-tab').forEach((tab) => {
      tab.classList.remove('active');
    });

    const activeTab = document.querySelector(`.nav-tab[data-tab="${tabName}"]`);
    if (activeTab) {
      activeTab.classList.add('active');
    }

    // Update sections
    document.querySelectorAll('.dashboard-section').forEach((section) => {
      section.classList.remove('active');
    });

    const activeSection = document.getElementById(`${tabName}-section`);
    if (activeSection) {
      activeSection.classList.add('active');
    }

    // Update URL without reload
    const url = new URL(window.location);
    url.searchParams.set('tab', tabName);
    window.history.replaceState({}, '', url);

    // Tab-specific initialization
    switch (tabName) {
      case 'gallery':
        this.initGallerySection();
        break;
      case 'upload':
        this.initUploadSection();
        break;
      case 'settings':
        this.initSettingsSection();
        break;
    }
  },

  // Initialize gallery section
  initGallerySection() {
    console.log('🎨 Initializing gallery section');

    // Add appear animation to cards
    document.querySelectorAll('.gallery-card').forEach((card, index) => {
      setTimeout(() => {
        card.classList.add('appear');
      }, index * 100);
    });
  },

  // Initialize upload section
  initUploadSection() {
    console.log('📁 Initializing upload section');
    this.setupFileUpload();
  },

  // Initialize settings section
  initSettingsSection() {
    console.log('⚙️ Initializing settings section');
    this.loadSettings();
  },

  // Initialize drag and drop
  initDragDrop() {
    // Gallery cards drag and drop
    document.querySelectorAll('.gallery-card').forEach((card) => {
      this.setupCardDragDrop(card);
    });

    // Upload zone drag and drop
    const uploadZone = document.getElementById('upload-zone');
    if (uploadZone) {
      this.setupUploadZoneDragDrop(uploadZone);
    }
  },

  // Setup drag and drop for gallery cards
  setupCardDragDrop(card) {
    const cardId = card.dataset.cardId;

    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach((eventName) => {
      card.addEventListener(eventName, (e) => {
        e.preventDefault();
        e.stopPropagation();
      });
    });

    // Highlight drop zone
    ['dragenter', 'dragover'].forEach((eventName) => {
      card.addEventListener(eventName, () => {
        card.classList.add('drag-over');
      });
    });

    ['dragleave', 'drop'].forEach((eventName) => {
      card.addEventListener(eventName, () => {
        card.classList.remove('drag-over');
      });
    });

    // Handle dropped files
    card.addEventListener('drop', (e) => {
      const files = Array.from(e.dataTransfer.files);
      if (files.length > 0) {
        this.handleCardImageUpload(cardId, files[0]);
      }
    });
  },

  // Setup drag and drop for upload zone
  setupUploadZoneDragDrop(uploadZone) {
    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach((eventName) => {
      uploadZone.addEventListener(eventName, (e) => {
        e.preventDefault();
        e.stopPropagation();
      });
    });

    // Highlight drop zone
    ['dragenter', 'dragover'].forEach((eventName) => {
      uploadZone.addEventListener(eventName, () => {
        uploadZone.classList.add('drag-over');
      });
    });

    ['dragleave', 'drop'].forEach((eventName) => {
      uploadZone.addEventListener(eventName, () => {
        uploadZone.classList.remove('drag-over');
      });
    });

    // Handle dropped files
    uploadZone.addEventListener('drop', (e) => {
      const files = Array.from(e.dataTransfer.files);
      if (files.length > 0) {
        this.handleFileUpload(files);
      }
    });
  },

  // Edit gallery card
  editCard(cardId) {
    console.log(`✏️ Editing card ${cardId}`);

    // Show edit modal (will be implemented in modals.js)
    if (typeof this.showEditModal === 'function') {
      this.showEditModal(cardId);
    } else {
      // Fallback: simple prompt for now
      const title = prompt('Enter new title:');
      if (title) {
        this.updateCardTitle(cardId, title);
      }
    }
  },

  // Preview gallery card
  previewCard(cardId) {
    console.log(`👁️ Previewing card ${cardId}`);

    // Show preview modal (will be implemented in modals.js)
    if (typeof this.showPreviewModal === 'function') {
      this.showPreviewModal(cardId);
    } else {
      // Fallback: simple alert for now
      alert(`Preview for card ${cardId} - Full modal coming soon!`);
    }
  },

  // Update card title
  updateCardTitle(cardId, title) {
    const card = document.querySelector(`[data-card-id="${cardId}"]`);
    if (card) {
      const titleElement = card.querySelector('.card-title');
      if (titleElement) {
        titleElement.textContent = title;
        this.saveCardData(cardId, { title });
      }
    }
  },

  // Save card data to server
  saveCardData(cardId, data) {
    console.log(`💾 Saving card ${cardId} data:`, data);

    // Show loading state
    const card = document.querySelector(`[data-card-id="${cardId}"]`);
    if (card) {
      card.classList.add('updating');
    }

    // Simulate API call (replace with actual AJAX)
    setTimeout(() => {
      if (card) {
        card.classList.remove('updating');
        card.classList.add('success');
        setTimeout(() => {
          card.classList.remove('success');
        }, 2000);
      }
      console.log(`✅ Card ${cardId} saved successfully`);
    }, 1000);
  },

  // Handle card image upload
  handleCardImageUpload(cardId, file) {
    console.log(`🖼️ Uploading image for card ${cardId}:`, file.name);

    if (!this.validateFile(file)) {
      return;
    }

    const card = document.querySelector(`[data-card-id="${cardId}"]`);
    if (card) {
      card.classList.add('updating');

      // Simulate upload (replace with actual upload)
      setTimeout(() => {
        const img = card.querySelector('.card-image');
        if (img && file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = (e) => {
            img.src = e.target.result;
          };
          reader.readAsDataURL(file);
        }

        card.classList.remove('updating');
        card.classList.add('success');
        setTimeout(() => {
          card.classList.remove('success');
        }, 2000);
      }, 1500);
    }
  },

  // Validate uploaded file
  validateFile(file) {
    if (file.size > this.config.maxFileSize) {
      this.showError(`File too large. Maximum size is ${this.config.maxFileSize / 1024 / 1024}MB`);
      return false;
    }

    if (!this.config.allowedTypes.includes(file.type)) {
      this.showError('File type not allowed. Please upload JPG, PNG, GIF, or WebP images.');
      return false;
    }

    return true;
  },

  // Show error message
  showError(message) {
    console.error('❌ Error:', message);

    // Create or update error display
    let errorDiv = document.querySelector('.dashboard-error');
    if (!errorDiv) {
      errorDiv = document.createElement('div');
      errorDiv.className = 'dashboard-error';
      document
        .querySelector('.dashboard-v2-container')
        .insertBefore(errorDiv, document.querySelector('.dashboard-nav'));
    }

    errorDiv.innerHTML = `
            <div class="error-content">
                <span class="error-icon">❌</span>
                <span class="error-message">${message}</span>
                <button class="error-close" onclick="this.parentElement.parentElement.remove()">×</button>
            </div>
        `;

    errorDiv.style.cssText = `
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            animation: slideDown 0.3s ease;
        `;

    // Auto-remove after 5 seconds
    setTimeout(() => {
      if (errorDiv.parentElement) {
        errorDiv.remove();
      }
    }, 5000);
  },

  // Logout function
  logout() {
    if (confirm('Are you sure you want to logout?')) {
      console.log('🔐 Logging out...');
      window.location.href = window.location.pathname + '?logout=1';
    }
  },

  // Load saved settings
  loadSavedSettings() {
    const saved = localStorage.getItem('dashboard-settings');
    if (saved) {
      try {
        const settings = JSON.parse(saved);
        this.applySettings(settings);
      } catch (e) {
        console.warn('⚠️ Could not load saved settings:', e);
      }
    }
  },

  // Apply settings
  applySettings(settings) {
    console.log('⚙️ Applying settings:', settings);
    // Settings application logic here
  },

  // Debug helper
  log(...args) {
    if (this.config.debug) {
      console.log('🔍 Dashboard Debug:', ...args);
    }
  },
};

// Initialize when DOM is ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    Dashboard.init();
  });
} else {
  Dashboard.init();
}

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
  module.exports = Dashboard;
}
