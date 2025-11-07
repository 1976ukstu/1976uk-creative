/**
 * Dashboard v2.0 Utility Functions
 * Shared utilities and helper functions
 * Version: 2.0.0
 */

// Utility functions namespace
Dashboard.Utils = {
  // Initialize utilities
  init() {
    console.log('🔧 Initializing utility functions');
    this.setupGlobalHelpers();
    this.setupPerformanceMonitoring();
  },

  // Setup global helper functions
  setupGlobalHelpers() {
    // Add global utilities to Dashboard
    Dashboard.formatDate = this.formatDate;
    Dashboard.formatFileSize = this.formatFileSize;
    Dashboard.debounce = this.debounce;
    Dashboard.throttle = this.throttle;
    Dashboard.generateId = this.generateId;
    Dashboard.sanitizeHtml = this.sanitizeHtml;
  },

  // Setup performance monitoring
  setupPerformanceMonitoring() {
    if (Dashboard.config.debug) {
      this.monitorPerformance();
    }
  },

  // Format date for display
  formatDate(date, options = {}) {
    const defaultOptions = {
      year: 'numeric',
      month: 'short',
      day: 'numeric',
      hour: '2-digit',
      minute: '2-digit',
    };

    const formatOptions = { ...defaultOptions, ...options };

    if (typeof date === 'string') {
      date = new Date(date);
    }

    return date.toLocaleDateString('en-US', formatOptions);
  },

  // Format relative time (e.g., "2 hours ago")
  formatRelativeTime(date) {
    if (typeof date === 'string') {
      date = new Date(date);
    }

    const now = new Date();
    const diffMs = now - date;
    const diffMins = Math.floor(diffMs / 60000);
    const diffHours = Math.floor(diffMins / 60);
    const diffDays = Math.floor(diffHours / 24);

    if (diffMins < 1) {
      return 'Just now';
    } else if (diffMins < 60) {
      return `${diffMins} minute${diffMins > 1 ? 's' : ''} ago`;
    } else if (diffHours < 24) {
      return `${diffHours} hour${diffHours > 1 ? 's' : ''} ago`;
    } else if (diffDays < 30) {
      return `${diffDays} day${diffDays > 1 ? 's' : ''} ago`;
    } else {
      return this.formatDate(date, { year: 'numeric', month: 'short', day: 'numeric' });
    }
  },

  // Format file size
  formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';

    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));

    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
  },

  // Debounce function calls
  debounce(func, wait, immediate = false) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        timeout = null;
        if (!immediate) func(...args);
      };
      const callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func(...args);
    };
  },

  // Throttle function calls
  throttle(func, limit) {
    let inThrottle;
    return function (...args) {
      if (!inThrottle) {
        func.apply(this, args);
        inThrottle = true;
        setTimeout(() => (inThrottle = false), limit);
      }
    };
  },

  // Generate unique ID
  generateId(prefix = 'id') {
    return `${prefix}_${Date.now()}_${Math.random().toString(36).substr(2, 9)}`;
  },

  // Sanitize HTML to prevent XSS
  sanitizeHtml(str) {
    const temp = document.createElement('div');
    temp.textContent = str;
    return temp.innerHTML;
  },

  // Validate email address
  validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  },

  // Validate URL
  validateUrl(url) {
    try {
      new URL(url);
      return true;
    } catch {
      return false;
    }
  },

  // Copy text to clipboard
  async copyToClipboard(text) {
    try {
      await navigator.clipboard.writeText(text);
      Dashboard.showSuccess('Copied to clipboard!');
      return true;
    } catch (err) {
      console.error('Failed to copy:', err);
      // Fallback for older browsers
      const textArea = document.createElement('textarea');
      textArea.value = text;
      document.body.appendChild(textArea);
      textArea.select();
      try {
        document.execCommand('copy');
        Dashboard.showSuccess('Copied to clipboard!');
        return true;
      } catch (fallbackErr) {
        Dashboard.showError('Failed to copy to clipboard');
        return false;
      } finally {
        document.body.removeChild(textArea);
      }
    }
  },

  // Get URL parameters
  getUrlParams() {
    return new URLSearchParams(window.location.search);
  },

  // Update URL parameter without reload
  updateUrlParam(key, value) {
    const url = new URL(window.location);
    if (value === null || value === undefined) {
      url.searchParams.delete(key);
    } else {
      url.searchParams.set(key, value);
    }
    window.history.replaceState({}, '', url);
  },

  // Storage helpers
  storage: {
    set(key, value, expiry = null) {
      const item = {
        value: value,
        timestamp: Date.now(),
        expiry: expiry,
      };
      localStorage.setItem(`dashboard_${key}`, JSON.stringify(item));
    },

    get(key, defaultValue = null) {
      try {
        const item = JSON.parse(localStorage.getItem(`dashboard_${key}`));
        if (!item) return defaultValue;

        // Check expiry
        if (item.expiry && Date.now() > item.expiry) {
          localStorage.removeItem(`dashboard_${key}`);
          return defaultValue;
        }

        return item.value;
      } catch {
        return defaultValue;
      }
    },

    remove(key) {
      localStorage.removeItem(`dashboard_${key}`);
    },

    clear() {
      Object.keys(localStorage).forEach((key) => {
        if (key.startsWith('dashboard_')) {
          localStorage.removeItem(key);
        }
      });
    },
  },

  // Performance monitoring
  performance: {
    marks: {},

    mark(name) {
      this.marks[name] = performance.now();
    },

    measure(name, startMark) {
      const endTime = performance.now();
      const startTime = this.marks[startMark];
      if (startTime) {
        const duration = endTime - startTime;
        console.log(`⏱️ ${name}: ${duration.toFixed(2)}ms`);
        return duration;
      }
    },
  },

  // Animation helpers
  animate(element, keyframes, options = {}) {
    const defaultOptions = {
      duration: 300,
      easing: 'ease',
      fill: 'forwards',
    };

    return element.animate(keyframes, { ...defaultOptions, ...options });
  },

  // Fade in animation
  fadeIn(element, duration = 300) {
    return this.animate(element, [{ opacity: 0 }, { opacity: 1 }], { duration });
  },

  // Fade out animation
  fadeOut(element, duration = 300) {
    return this.animate(element, [{ opacity: 1 }, { opacity: 0 }], { duration });
  },

  // Slide down animation
  slideDown(element, duration = 300) {
    const height = element.scrollHeight;
    return this.animate(
      element,
      [
        { height: '0px', opacity: 0 },
        { height: `${height}px`, opacity: 1 },
      ],
      { duration }
    );
  },

  // Slide up animation
  slideUp(element, duration = 300) {
    return this.animate(
      element,
      [
        { height: `${element.scrollHeight}px`, opacity: 1 },
        { height: '0px', opacity: 0 },
      ],
      { duration }
    );
  },

  // Device detection
  device: {
    isMobile() {
      return window.innerWidth <= 768;
    },

    isTablet() {
      return window.innerWidth > 768 && window.innerWidth <= 1024;
    },

    isDesktop() {
      return window.innerWidth > 1024;
    },

    isTouchDevice() {
      return 'ontouchstart' in window || navigator.maxTouchPoints > 0;
    },
  },

  // Monitor performance
  monitorPerformance() {
    // Log page load performance
    window.addEventListener('load', () => {
      setTimeout(() => {
        const perf = performance.getEntriesByType('navigation')[0];
        console.log(`📊 Page Load Performance:
                    DNS: ${(perf.domainLookupEnd - perf.domainLookupStart).toFixed(2)}ms
                    Connect: ${(perf.connectEnd - perf.connectStart).toFixed(2)}ms
                    Response: ${(perf.responseEnd - perf.responseStart).toFixed(2)}ms
                    DOM Content: ${(
                      perf.domContentLoadedEventEnd - perf.domContentLoadedEventStart
                    ).toFixed(2)}ms
                    Load Complete: ${(perf.loadEventEnd - perf.loadEventStart).toFixed(2)}ms
                    Total: ${(perf.loadEventEnd - perf.navigationStart).toFixed(2)}ms
                `);
      }, 0);
    });

    // Monitor memory usage (if available)
    if (performance.memory) {
      setInterval(() => {
        const memory = performance.memory;
        if (memory.usedJSHeapSize > memory.jsHeapSizeLimit * 0.9) {
          console.warn('⚠️ High memory usage detected');
        }
      }, 30000); // Check every 30 seconds
    }
  },

  // Error handling utilities
  handleError(error, context = 'Unknown') {
    console.error(`❌ Error in ${context}:`, error);

    // Log to external service in production
    if (!Dashboard.config.debug) {
      // Send to error logging service
      this.logError(error, context);
    }

    // Show user-friendly message
    Dashboard.showError('Something went wrong. Please try again.');
  },

  // Log error to external service
  logError(error, context) {
    // Implement error logging service integration
    console.log('📝 Error logged:', { error, context, timestamp: new Date().toISOString() });
  },
};

// Settings management
Dashboard.Settings = {
  defaults: {
    theme: 'light',
    galleryStyle: 'modern',
    autoSave: true,
    notifications: true,
    animationsEnabled: true,
  },

  load() {
    const saved = Dashboard.Utils.storage.get('settings', {});
    return { ...this.defaults, ...saved };
  },

  save(settings) {
    const current = this.load();
    const updated = { ...current, ...settings };
    Dashboard.Utils.storage.set('settings', updated);
    this.apply(updated);
    return updated;
  },

  apply(settings) {
    // Apply theme
    document.documentElement.setAttribute('data-theme', settings.theme);

    // Apply animations preference
    if (!settings.animationsEnabled) {
      document.documentElement.style.setProperty('--animation-duration', '0s');
    }

    console.log('⚙️ Settings applied:', settings);
  },

  reset() {
    Dashboard.Utils.storage.remove('settings');
    this.apply(this.defaults);
    return this.defaults;
  },
};

// Add settings methods to main Dashboard
Dashboard.loadSettings = function () {
  return Dashboard.Settings.load();
};

Dashboard.saveSettings = function (settings = null) {
  if (!settings) {
    // Collect from form
    const form = document.getElementById('dashboard-settings-form');
    if (form) {
      const formData = new FormData(form);
      settings = Object.fromEntries(formData.entries());
    }
  }

  if (settings) {
    Dashboard.Settings.save(settings);
    Dashboard.showSuccess('Settings saved successfully!');
  }
};

Dashboard.resetSettings = function () {
  if (confirm('Reset all settings to defaults?')) {
    Dashboard.Settings.reset();
    Dashboard.showSuccess('Settings reset to defaults!');

    // Reload form if visible
    const form = document.getElementById('dashboard-settings-form');
    if (form) {
      setTimeout(() => {
        location.reload();
      }, 1000);
    }
  }
};

// Initialize utilities
Dashboard.Utils.init();

// Expose utilities globally
window.DashboardUtils = Dashboard.Utils;
