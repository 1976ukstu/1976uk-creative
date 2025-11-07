/**
 * Dashboard v2.0 Upload JavaScript
 * Professional file upload functionality
 * Version: 2.0.0
 */

// Upload module
Dashboard.Upload = {
  // Upload state
  state: {
    activeUploads: [],
    totalFiles: 0,
    completedFiles: 0,
    failedFiles: 0,
  },

  // Initialize upload functionality
  init() {
    console.log('📁 Initializing upload module');
    this.setupFileInput();
    this.bindUploadEvents();
  },

  // Setup hidden file input
  setupFileInput() {
    let fileInput = document.getElementById('dashboard-file-input');

    if (!fileInput) {
      fileInput = document.createElement('input');
      fileInput.type = 'file';
      fileInput.id = 'dashboard-file-input';
      fileInput.multiple = true;
      fileInput.accept = 'image/*';
      fileInput.style.display = 'none';
      document.body.appendChild(fileInput);
    }

    fileInput.addEventListener('change', (e) => {
      if (e.target.files.length > 0) {
        this.handleFiles(Array.from(e.target.files));
        e.target.value = ''; // Reset for future uploads
      }
    });
  },

  // Bind upload-related events
  bindUploadEvents() {
    // Browse button click
    const browseBtn = document.querySelector('.browse-btn');
    if (browseBtn) {
      browseBtn.addEventListener('click', () => {
        this.triggerFileInput();
      });
    }

    // Upload zone click
    const uploadZone = document.getElementById('upload-zone');
    if (uploadZone) {
      uploadZone.addEventListener('click', () => {
        this.triggerFileInput();
      });
    }
  },

  // Trigger file input
  triggerFileInput() {
    const fileInput = document.getElementById('dashboard-file-input');
    if (fileInput) {
      fileInput.click();
    }
  },

  // Handle multiple files
  handleFiles(files) {
    console.log(`📁 Processing ${files.length} files for upload`);

    // Reset state
    this.state = {
      activeUploads: [],
      totalFiles: files.length,
      completedFiles: 0,
      failedFiles: 0,
    };

    // Validate all files first
    const validFiles = files.filter((file) => this.validateFile(file));

    if (validFiles.length === 0) {
      Dashboard.showError('No valid files to upload');
      return;
    }

    if (validFiles.length !== files.length) {
      Dashboard.showError(
        `${files.length - validFiles.length} files were skipped due to validation errors`
      );
    }

    // Show progress interface
    this.showUploadProgress();

    // Start uploads
    validFiles.forEach((file, index) => {
      setTimeout(() => {
        this.uploadFile(file);
      }, index * 100); // Stagger uploads slightly
    });
  },

  // Validate individual file
  validateFile(file) {
    // Check file size
    if (file.size > Dashboard.config.maxFileSize) {
      console.warn(`❌ File too large: ${file.name} (${this.formatFileSize(file.size)})`);
      return false;
    }

    // Check file type
    if (!Dashboard.config.allowedTypes.includes(file.type)) {
      console.warn(`❌ File type not allowed: ${file.name} (${file.type})`);
      return false;
    }

    return true;
  },

  // Show upload progress interface
  showUploadProgress() {
    const progressContainer = document.querySelector('.upload-progress');
    if (progressContainer) {
      progressContainer.classList.add('active');
      this.updateProgressDisplay();
    }
  },

  // Hide upload progress interface
  hideUploadProgress() {
    const progressContainer = document.querySelector('.upload-progress');
    if (progressContainer) {
      setTimeout(() => {
        progressContainer.classList.remove('active');
      }, 2000); // Keep visible for 2 seconds after completion
    }
  },

  // Update progress display
  updateProgressDisplay() {
    const { totalFiles, completedFiles, failedFiles } = this.state;
    const progressPercentage =
      totalFiles > 0 ? ((completedFiles + failedFiles) / totalFiles) * 100 : 0;

    // Update progress bar
    const progressBar = document.querySelector('.progress-bar');
    if (progressBar) {
      progressBar.style.width = `${progressPercentage}%`;
    }

    // Update stats
    const progressStats = document.querySelector('.progress-stats');
    if (progressStats) {
      progressStats.textContent = `${completedFiles + failedFiles} of ${totalFiles} files`;
    }

    // Update individual file status
    this.updateFilesList();
  },

  // Update files list display
  updateFilesList() {
    const filesContainer = document.querySelector('.upload-files');
    if (!filesContainer) return;

    filesContainer.innerHTML = '';

    this.state.activeUploads.forEach((upload) => {
      const fileDiv = document.createElement('div');
      fileDiv.className = 'upload-file';
      fileDiv.innerHTML = `
                <div class="file-icon">${this.getFileIcon(upload.file.type)}</div>
                <div class="file-info">
                    <div class="file-name">${upload.file.name}</div>
                    <div class="file-size">${this.formatFileSize(upload.file.size)}</div>
                </div>
                <div class="file-status ${upload.status}">
                    ${this.getStatusText(upload.status)}
                </div>
            `;
      filesContainer.appendChild(fileDiv);
    });
  },

  // Upload individual file
  async uploadFile(file) {
    const uploadId = Date.now() + Math.random();

    // Add to active uploads
    const upload = {
      id: uploadId,
      file: file,
      status: 'uploading',
      progress: 0,
    };

    this.state.activeUploads.push(upload);
    this.updateProgressDisplay();

    try {
      // Simulate upload process (replace with actual upload logic)
      await this.simulateUpload(upload);

      // Mark as successful
      upload.status = 'success';
      this.state.completedFiles++;

      console.log(`✅ Upload successful: ${file.name}`);
    } catch (error) {
      // Mark as failed
      upload.status = 'error';
      this.state.failedFiles++;

      console.error(`❌ Upload failed: ${file.name}`, error);
    }

    this.updateProgressDisplay();

    // Check if all uploads are complete
    if (this.state.completedFiles + this.state.failedFiles >= this.state.totalFiles) {
      this.onAllUploadsComplete();
    }
  },

  // Simulate upload process (replace with actual upload)
  async simulateUpload(upload) {
    return new Promise((resolve, reject) => {
      let progress = 0;

      const interval = setInterval(() => {
        progress += Math.random() * 20;
        upload.progress = Math.min(progress, 100);

        if (progress >= 100) {
          clearInterval(interval);

          // Simulate random failures (5% chance)
          if (Math.random() < 0.05) {
            reject(new Error('Simulated upload failure'));
          } else {
            resolve();
          }
        }
      }, 200);
    });
  },

  // Handle completion of all uploads
  onAllUploadsComplete() {
    console.log(
      `🎉 All uploads complete. Success: ${this.state.completedFiles}, Failed: ${this.state.failedFiles}`
    );

    // Show completion message
    if (this.state.failedFiles === 0) {
      this.showSuccess(`Successfully uploaded ${this.state.completedFiles} files!`);
    } else {
      this.showSuccess(
        `Uploaded ${this.state.completedFiles} files. ${this.state.failedFiles} failed.`
      );
    }

    // Hide progress after delay
    this.hideUploadProgress();

    // Reset upload zone
    this.resetUploadZone();
  },

  // Show success message
  showSuccess(message) {
    let successDiv = document.querySelector('.upload-success');

    if (!successDiv) {
      successDiv = document.createElement('div');
      successDiv.className = 'upload-success';

      const uploadSection = document.getElementById('upload-section');
      if (uploadSection) {
        uploadSection.appendChild(successDiv);
      }
    }

    successDiv.innerHTML = `
            <span class="upload-success-icon">✅</span>
            ${message}
        `;

    successDiv.classList.add('active');

    // Auto-remove after 5 seconds
    setTimeout(() => {
      successDiv.classList.remove('active');
    }, 5000);
  },

  // Reset upload zone to initial state
  resetUploadZone() {
    const uploadZone = document.getElementById('upload-zone');
    if (uploadZone) {
      uploadZone.classList.remove('drag-over');
    }

    // Clear any upload errors
    const uploadError = document.querySelector('.upload-error');
    if (uploadError) {
      uploadError.classList.remove('active');
    }
  },

  // Get file icon based on type
  getFileIcon(fileType) {
    if (fileType.startsWith('image/')) {
      return '🖼️';
    }
    return '📄';
  },

  // Get status text
  getStatusText(status) {
    switch (status) {
      case 'uploading':
        return 'Uploading...';
      case 'success':
        return 'Complete';
      case 'error':
        return 'Failed';
      default:
        return 'Pending';
    }
  },

  // Format file size for display
  formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';

    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));

    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
  },
};

// Auto-initialize when upload section becomes active
Dashboard.initUploadSection = function () {
  console.log('📁 Initializing upload section');
  Dashboard.Upload.init();
  this.setupFileUpload();
};

// Setup file upload (called from core)
Dashboard.setupFileUpload = function () {
  if (!Dashboard.Upload.initialized) {
    Dashboard.Upload.init();
    Dashboard.Upload.initialized = true;
  }
};

// Handle file upload (called from core)
Dashboard.handleFileUpload = function (files = null) {
  if (files) {
    Dashboard.Upload.handleFiles(files);
  } else {
    Dashboard.Upload.triggerFileInput();
  }
};

// Expose upload module
window.DashboardUpload = Dashboard.Upload;
