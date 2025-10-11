# 🚀 1976uk Creative Lab - Git Workflow

**Professional Development Strategy for Your Creative Playground**

## 📋 Branch Structure

### **`main` Branch**
- **Purpose:** Production-ready code
- **Protection:** Stable, tested features only
- **Deployment:** Ready for live showcase
- **Access:** Merge only via Pull Requests

### **`development` Branch** 
- **Purpose:** Integration branch for new features
- **Testing:** All features tested here first
- **Usage:** Daily development work
- **Merge:** Features merged here before `main`

### **Feature Branches**
- **Pattern:** `feature/description` (e.g., `feature/portfolio-lightbox`)
- **Purpose:** Individual feature development
- **Lifecycle:** Create → Develop → Test → Merge to `development`

## 🔧 Workflow Process

### **1. Starting New Work**
```bash
# Switch to development and pull latest
git checkout development
git pull origin development

# Create feature branch
git checkout -b feature/your-feature-name
```

### **2. Development Work**
```bash
# Regular commits with clear messages
git add .
git commit -m "✨ Add portfolio lightbox functionality"
git push origin feature/your-feature-name
```

### **3. Feature Complete**
```bash
# Switch back to development
git checkout development
git pull origin development

# Merge feature (or create PR on GitHub)
git merge feature/your-feature-name
git push origin development

# Clean up feature branch
git branch -d feature/your-feature-name
git push origin --delete feature/your-feature-name
```

### **4. Ready for Production**
```bash
# Create PR from development → main on GitHub
# After review and testing, merge to main
```

## 🎯 Commit Message Standards

### **Format:**
```
🎨 Type: Short description

Optional longer description explaining the change
```

### **Types:**
- `✨` `:sparkles:` New features
- `🐛` `:bug:` Bug fixes  
- `🎨` `:art:` Style/UI improvements
- `♻️` `:recycle:` Refactoring
- `📝` `:memo:` Documentation
- `🚀` `:rocket:` Performance
- `🔧` `:wrench:` Configuration
- `🗑️` `:wastebasket:` Removing code

## 📁 Current Repository Status

✅ **Repository:** `1976ukstu/1976uk-creative`  
✅ **Main Branch:** Clean production foundation  
✅ **Development Branch:** Ready for daily work  
✅ **Remote:** Connected and tracking  

## 🎨 Development Ideas Pipeline

### **Phase 1: Content Foundation**
- [ ] Add ACF Free field groups
- [ ] Populate portfolio with sample work
- [ ] Test contact form functionality
- [ ] Add real about page content

### **Phase 2: Feature Enhancement**
- [ ] Portfolio lightbox improvements
- [ ] Project filtering system
- [ ] Admin dashboard features
- [ ] CSS optimization

### **Phase 3: Creative Experiments**
- [ ] Animation effects
- [ ] Interactive elements
- [ ] Custom layouts
- [ ] Performance optimization

## 🚦 Quick Commands Reference

```bash
# Check current status
git status

# Switch to development for daily work
git checkout development

# Create new feature
git checkout -b feature/feature-name

# Quick commit
git add . && git commit -m "✨ Your change description"

# Push current branch
git push origin $(git branch --show-current)

# Clean merged branches
git branch -d feature-name
```

---

**Your Git workflow is now professional and ready for creative development!** 🎉

*Setup completed: October 11, 2025*