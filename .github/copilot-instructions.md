# 1976uk Creative Theme - AI Coding Guide

## Overview
This is a custom WordPress creative portfolio theme focused on interactive galleries, professional websites showcase, and modular dashboard management systems. Built for creative professionals with emphasis on modern UI/UX patterns.

## Core Architecture

### Template Hierarchy & Page Structure
- **Custom page templates**: Use `page-{slug}.php` pattern (e.g., `page-websites.php`, `page-dashboard-v2.php`)
- **Modular dashboards**: Dashboard v2 uses separated concerns - config, functions, and assets in `dashboard-v2/` directory
- **Glassmorphism UI**: Consistent backdrop-filter blur effects with rgba transparency across components

### Contact System Integration
- Contact forms handled via `functions.php` with AJAX endpoints (`wp_ajax_*` actions)
- Email system configured for both cPanel webmail and Gmail forwarding
- Spam protection includes honeypot fields, rate limiting, and keyword detection
- Always check `$_POST['artist_contact_form_submitted']` for form handling

### Gallery & Media Management
- Gallery cards use WordPress options API: `get_option("gallery_card_{$id}_title")` pattern
- Drag & drop functionality via AJAX handlers in `functions.php`
- Image uploads integrate with WordPress Media Library using `wp_handle_upload()`
- Card data persistence follows pattern: `update_option('gallery_card_' . $card_id . '_field', $value)`

## Development Patterns

### Styling Conventions
- **Fonts**: Inter + Poppins via Google Fonts import in `style.css`
- **Color scheme**: Ice/stone backgrounds with animated tech stripes for visual interest
- **Component styling**: `.dashboard-card`, `.dashboard-section` classes for consistent UI
- **Responsive**: Mobile-first with breakpoints at 768px and 1024px

### JavaScript Architecture
- Inline JavaScript in templates for component-specific functionality
- Global functions use `Dashboard.*` namespace for dashboard features
- Modal systems follow pattern: show modal → populate content → handle cleanup on close

### Asset Management
- CSS/JS enqueued via `creative_theme_scripts()` function with version numbers for cache busting
- Modular CSS: Dashboard v2 loads separate files (`dashboard-core.css`, `dashboard-cards.css`)
- Local images stored in `/images/` directory with descriptive naming

## Key Integration Points

### WordPress Hooks & Actions
- Theme setup in `artist_theme_setup()` - registers menus, post thumbnails, custom logo
- Custom post type `weekly_update` for content management
- AJAX endpoints for gallery management: `upload_gallery_image`, `update_card_data`

### Authentication & Security
- Dashboard v2 uses session-based authentication with password protection
- Security checks via `wp_verify_nonce()` for AJAX requests
- Password defined in `DashboardV2Config::PASSWORD` constant

### External Services
- Website previews use iframe embedding with fallback to screenshots for restricted sites
- Email integration supports both WordPress `wp_mail()` and PHP `mail()` fallback

## Development Workflow

### File Organization
- Main theme files in root directory
- Dashboard v2 components in `dashboard-v2/assets/` subdirectories
- Project documentation in `project-journals/` and markdown files in root
- Production deployment configurations in `PRODUCTION-DEPLOYMENT-GUIDE.md`

### Debugging & Testing
- Error logging enabled throughout contact form processing
- Email testing via admin bar link: `?test_email=send`
- Dashboard functionality includes console logging for AJAX operations

### Performance Considerations
- Dashboard v2 designed to be under 300 lines per file for maintainability
- CSS uses efficient selectors and minimizes reflows
- Image optimization emphasized for gallery components

## Common Tasks

**Adding new gallery cards**: Extend `DashboardV2Config::CARDS_COUNT` and ensure AJAX handlers support new IDs

**Modifying contact form**: Update both form HTML in `page-contact.php` and handler in `functions.php`

**Styling components**: Use existing `.dashboard-*` classes and maintain glassmorphism aesthetic

**Adding page templates**: Follow `page-{slug}.php` naming and include proper header/footer calls

This theme emphasizes clean, modular architecture while maintaining WordPress best practices for creative portfolio websites.