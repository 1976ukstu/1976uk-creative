# 🚀 Setup Guide: 1976uk-creative

**Your New Experimental Creative Lab**  
**Date:** October 4, 2025  
**Cloned From:** Dragica Carlin v2.0.0 (Production Perfect)

---

## 📋 **Step-by-Step Setup Instructions**

Follow these steps to create your new `1976uk-creative` site in LocalWP:

---

## **PART 1: Create New LocalWP Site**

### **Step 1: Open LocalWP**
1. Launch LocalWP application
2. Click the **"+"** button (bottom left) to add a new site

### **Step 2: Site Name & Domain**
**Site Name:** `1976uk-creative`  
**Local Domain:** `1976uk-creative.local`

Click **Continue**

### **Step 3: Environment Setup**
Choose **Preferred** environment:
- **PHP Version:** 8.0.x or higher (same as Dragica site)
- **Web Server:** nginx
- **Database:** MySQL 8.0.x

Click **Continue**

### **Step 4: WordPress Setup**
- **WordPress Username:** (your choice - suggest `1976uk` or `stuart`)
- **WordPress Password:** (create a secure password)
- **WordPress Email:** (your 1976uk.com email)

Click **Add Site**

### **Step 5: Wait for Installation**
LocalWP will:
- ✅ Download WordPress
- ✅ Create database
- ✅ Configure environment
- ✅ Install WordPress

**Status:** Site will appear in your LocalWP sidebar when ready!

---

## **PART 2: Verify WordPress Installation**

### **Step 6: Start the Site**
1. Click on `1976uk-creative` in LocalWP sidebar
2. Click **Start Site** (if not already running)
3. Wait for green "Running" status

### **Step 7: Access WordPress**
Click **WP Admin** button in LocalWP to open:
- URL: `https://1976uk-creative.local/wp-admin`
- Login with credentials from Step 4

**🎉 WordPress is now running!**

---

## **PART 3: Prepare for Theme Clone**

### **Step 8: Check Theme Path**
In LocalWP, right-click `1976uk-creative` → **Reveal in Finder**

This will open:
```
/Users/sh10-8/Local Sites/1976uk-creative/
```

Navigate to theme directory:
```
/Users/sh10-8/Local Sites/1976uk-creative/app/public/wp-content/themes/
```

**Note this path** - we'll copy our theme here!

---

## **PART 4: Install ACF Pro Plugin**

### **Step 9: Install ACF Pro**
Since ACF Pro is a premium plugin, you'll need to:

**Option A: Install from WordPress Admin**
1. Go to WP Admin → Plugins → Add New
2. Search for "Advanced Custom Fields"
3. Install **Advanced Custom Fields** (free version for now)
4. Activate the plugin

**Option B: Copy from Dragica Site**
If you have ACF Pro license:
1. In Finder, navigate to Dragica's plugins folder:
   ```
   /Users/sh10-8/Local Sites/dragica-carlin/app/public/wp-content/plugins/
   ```
2. Copy the `advanced-custom-fields-pro` folder
3. Paste into your new site's plugins folder:
   ```
   /Users/sh10-8/Local Sites/1976uk-creative/app/public/wp-content/plugins/
   ```
4. Go to WP Admin → Plugins → Activate ACF Pro

---

## **PART 5: Ready for Theme Clone!**

### **Step 10: Confirmation Checklist**
Before I clone the theme, confirm:

- [ ] LocalWP site `1976uk-creative` created
- [ ] Site is running (green status in LocalWP)
- [ ] You can access WP Admin
- [ ] ACF plugin installed (free or Pro)
- [ ] Theme directory path confirmed

---

## **NEXT: I'll Clone the Theme**

Once you confirm the above checklist, I'll:

1. **Clone Dragica's theme** to your new site
2. **Rebrand everything** to `1976uk-creative`
3. **Setup fresh Git repository** (clean history)
4. **Create GitHub repository** for your new site
5. **Document all changes** for your reference

---

## **What Happens Next?**

### **Theme Files We'll Clone:**
- ✅ All gallery templates (ACF Gallery system)
- ✅ Responsive CSS (optimized layouts)
- ✅ Lightbox functionality
- ✅ Professional Git workflow setup
- ✅ Deployment infrastructure

### **Theme Files We'll Customize:**
- 🎨 Theme name: `1976uk-creative-theme`
- 🎨 Site title: "1976uk Creative Lab"
- 🎨 Branding and styling (your preferences)
- 🎨 Content placeholders (your content)

### **Features We'll Add:**
- 🧪 Dashboard integration
- 🧪 Full-screen lightbox enhancement
- 🧪 Experimental features space
- 🧪 Your creative ideas!

---

## **Commands You'll Run (After Site Creation):**

I'll guide you through these, but here's a preview:

```bash
# Navigate to new theme directory
cd "/Users/sh10-8/Local Sites/1976uk-creative/app/public/wp-content/themes/"

# I'll clone the files here
# Then setup Git repository
git init
git add .
git commit -m "Initial commit: Clone from Dragica v2.0.0 foundation"

# Create GitHub repository (via GitHub.com)
# Then connect local to remote
git remote add origin https://github.com/1976ukstu/1976uk-creative.git
git push -u origin main
```

---

## **Your Action Items:**

### **🎯 Right Now:**
1. **Open LocalWP**
2. **Create new site** following Steps 1-4
3. **Wait for installation** to complete
4. **Start the site** and verify WordPress loads
5. **Install ACF** (free version is fine to start)
6. **Reply "Ready!"** when site is running

### **📸 Optional - Send Screenshot:**
If you want to confirm you're on the right track:
- Take a screenshot of LocalWP showing your new site
- Take a screenshot of WP Admin dashboard

---

## **Questions I Might Ask:**

- What's the exact path to your new theme directory?
- Did ACF install successfully?
- Can you access the WordPress admin?
- Any errors during installation?

---

## **Troubleshooting:**

**Site won't start?**
- Try "Restart" button in LocalWP
- Check for port conflicts (other sites running?)

**Can't access WP Admin?**
- Make sure site is "Running" (green status)
- Try clicking "Open Site" first, then "WP Admin"

**ACF won't install?**
- Free version is fine for now
- We can upgrade to Pro later if needed

---

## **After Site Creation:**

Once you say "Ready!", I'll:
1. Create terminal commands to clone theme files
2. Guide you through Git setup
3. Help create GitHub repository
4. Get you coding in your new creative lab!

---

**🎉 This is exciting! Let's build your experimental playground!**

