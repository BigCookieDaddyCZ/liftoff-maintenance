# LiftOff Maintenance Plugin - Installation Guide

## Table of Contents

1. [System Requirements](#system-requirements)
2. [Installation Methods](#installation-methods)
3. [Initial Setup](#initial-setup)
4. [Configuration](#configuration)
5. [Troubleshooting](#troubleshooting)
6. [Uninstallation](#uninstallation)

## System Requirements

### Minimum Requirements

- **WordPress Version:** 5.0 or higher
- **PHP Version:** 7.4 or higher
- **MySQL Version:** 5.6 or higher (or MariaDB 10.1+)
- **Memory Limit:** 128MB or higher
- **Disk Space:** 5MB free space

### Recommended Requirements

- **WordPress Version:** 6.0 or higher
- **PHP Version:** 8.0 or higher
- **MySQL Version:** 8.0 or higher (or MariaDB 10.4+)
- **Memory Limit:** 256MB or higher
- **Disk Space:** 10MB free space

### Browser Compatibility

- **Chrome:** 60+ ✅
- **Firefox:** 55+ ✅
- **Safari:** 12+ ✅
- **Edge:** 79+ ✅
- **Internet Explorer:** Not supported ❌

## Installation Methods

### Method 1: WordPress Admin Dashboard (Recommended)

1. **Download the Plugin**
   - Download the latest version from the official source
   - Ensure you have the `liftoff-maintenance.zip` file

2. **Upload via WordPress Admin**
   - Log in to your WordPress admin dashboard
   - Navigate to `Plugins` → `Add New`
   - Click `Upload Plugin` button
   - Choose the `liftoff-maintenance.zip` file
   - Click `Install Now`

3. **Activate the Plugin**
   - After installation, click `Activate Plugin`
   - You'll see a success message confirming activation

### Method 2: FTP Upload

1. **Extract the Plugin**
   - Extract the `liftoff-maintenance.zip` file
   - You should see a `liftoff-maintenance` folder

2. **Upload via FTP**
   - Connect to your website via FTP client
   - Navigate to `/wp-content/plugins/` directory
   - Upload the entire `liftoff-maintenance` folder

3. **Activate via WordPress Admin**
   - Log in to WordPress admin dashboard
   - Navigate to `Plugins` → `Installed Plugins`
   - Find "LiftOff Maintenance" and click `Activate`

### Method 3: WP-CLI (Advanced Users)

```bash
# Install the plugin
wp plugin install liftoff-maintenance.zip

# Activate the plugin
wp plugin activate liftoff-maintenance

# Verify installation
wp plugin list --status=active
```

## Initial Setup

### Step 1: Access Plugin Settings

1. After activation, you'll see "LiftOff" in your WordPress admin menu
2. Click on "LiftOff" to access the plugin settings
3. You'll be taken to the main configuration page

### Step 2: Basic Configuration

1. **Set Page Title**
   - Enter your desired maintenance page title
   - Default: "Maintenance Mode"

2. **Configure Heading**
   - Set the main heading visitors will see
   - Default: "We'll be back soon!"

3. **Write Your Message**
   - Craft a message explaining the maintenance
   - Keep it friendly and informative

4. **Set Launch Date**
   - Choose when your site will be back online
   - Use the date/time picker for accuracy

### Step 3: Choose Countdown Format

- **Full Format:** Separate boxes for days, hours, minutes, seconds
- **Compact Format:** Digital clock style display

### Step 4: Save Initial Settings

- Click "Save Settings" to apply your configuration
- You'll see a success message confirming the save

## Configuration

### Themes Tab

#### Static Gradient Themes
- 13 beautiful gradient themes available
- Instant preview when selecting
- Professional and modern designs

#### Animated Themes
- 4 dynamic animated backgrounds
- Eye-catching visual effects
- Optimized for performance

### Customize Tab

#### Logo/Branding
1. **Upload Custom Logo**
   - Click "Upload Logo" button
   - Select image from media library
   - Adjust logo size (50-300px)
   - Preview changes instantly

2. **Hide Branding**
   - Toggle "Show logo/branding" to hide all logos
   - Useful for minimal designs

#### Colors
1. **Background Color**
   - Override theme background
   - Use color picker for precision

2. **Text Color**
   - Ensure good contrast
   - Test readability

3. **Accent Color**
   - Used for highlights and buttons
   - Complements your brand

#### Typography
1. **Font Family**
   - Choose from web-safe fonts
   - Google Fonts integration

2. **Font Size**
   - Range: 12-24px
   - Responsive scaling

3. **Font Weight**
   - Normal, bold, or light
   - Affects visual hierarchy

4. **Text Alignment**
   - Left, center, or right
   - Affects overall layout

#### Progress Bar
1. **Enable Progress Bar**
   - Toggle visibility
   - Automatically calculates progress

2. **Customize Colors**
   - Foreground color (progress)
   - Background color (track)

#### Social Media Integration
1. **Enable Social Icons**
   - Toggle social media section

2. **Add Social URLs**
   - Facebook, Twitter, Instagram
   - LinkedIn, YouTube
   - Email address

3. **Conditional Display**
   - Icons only show if URLs provided
   - Clean, uncluttered appearance

### Advanced Tab

#### Access Control
1. **Allowed IP Addresses**
   - Whitelist specific IPs
   - One IP per line
   - Supports IP ranges

2. **Search Engine Access**
   - Allow/block search engine crawlers
   - Important for SEO considerations

#### Custom Code
1. **Custom CSS**
   - Add your own styles
   - Override default appearance
   - Advanced customization

2. **Custom JavaScript**
   - Add interactive features
   - Analytics tracking
   - Custom functionality

#### Browser Settings
1. **Custom Favicon**
   - Upload custom favicon
   - Supports ICO, PNG, JPG
   - Preview functionality

2. **Browser Tab Text**
   - Custom text for browser tabs
   - Falls back to page title

## Post-Installation Checklist

### ✅ Essential Tasks

- [ ] Plugin activated successfully
- [ ] Basic settings configured
- [ ] Launch date set
- [ ] Theme selected
- [ ] Test maintenance page display
- [ ] Verify admin access still works

### ✅ Recommended Tasks

- [ ] Upload custom logo
- [ ] Configure social media links
- [ ] Set up progress bar
- [ ] Add custom favicon
- [ ] Test on mobile devices
- [ ] Configure access control
- [ ] Add custom CSS/JS if needed

### ✅ Testing

1. **Frontend Testing**
   - Open your site in incognito/private mode
   - Verify maintenance page displays
   - Test countdown functionality
   - Check mobile responsiveness

2. **Admin Testing**
   - Ensure admin access works
   - Test all plugin settings
   - Verify changes save correctly

3. **Cross-Browser Testing**
   - Test in multiple browsers
   - Check for visual consistency
   - Verify functionality works

## Troubleshooting

### Common Issues

#### Issue: Plugin Won't Activate

**Possible Causes:**
- PHP version too old
- WordPress version incompatible
- Plugin conflicts
- Insufficient permissions

**Solutions:**
1. Check PHP version (must be 7.4+)
2. Update WordPress to latest version
3. Deactivate other plugins temporarily
4. Check file permissions (755 for folders, 644 for files)

#### Issue: Maintenance Page Not Showing

**Possible Causes:**
- Caching plugins
- CDN caching
- Server-side caching
- Plugin not properly activated

**Solutions:**
1. Clear all caches
2. Purge CDN cache
3. Check plugin activation status
4. Test in incognito mode

#### Issue: Admin Access Blocked

**Possible Causes:**
- IP not whitelisted
- Session issues
- Plugin conflict

**Solutions:**
1. Add your IP to allowed list
2. Clear browser cookies
3. Access via different browser
4. Deactivate plugin via FTP if necessary

#### Issue: Countdown Not Working

**Possible Causes:**
- JavaScript disabled
- Date format issues
- Timezone problems

**Solutions:**
1. Enable JavaScript in browser
2. Check date format (YYYY-MM-DD HH:MM)
3. Verify timezone settings
4. Clear browser cache

#### Issue: Images Not Loading

**Possible Causes:**
- File permissions
- Path issues
- Media library problems

**Solutions:**
1. Check file permissions
2. Re-upload images
3. Regenerate thumbnails
4. Check WordPress media settings

### Debug Mode

Enable debug mode for troubleshooting:

```php
// Add to wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('LIFTOFF_DEBUG', true);
```

### Getting Help

1. **Check Documentation**
   - Read DOCUMENTATION.md
   - Review API.md for developers
   - Check CHANGELOG.md for updates

2. **Community Support**
   - WordPress.org support forums
   - Plugin-specific support channels

3. **Professional Support**
   - Contact plugin developers
   - Hire WordPress developer

## Uninstallation

### Method 1: WordPress Admin

1. **Deactivate Plugin**
   - Go to `Plugins` → `Installed Plugins`
   - Find "LiftOff Maintenance"
   - Click "Deactivate"

2. **Delete Plugin**
   - After deactivation, click "Delete"
   - Confirm deletion when prompted
   - All plugin files will be removed

### Method 2: FTP Removal

1. **Deactivate via Admin** (if possible)
2. **Connect via FTP**
3. **Navigate to** `/wp-content/plugins/`
4. **Delete** `liftoff-maintenance` folder

### Method 3: WP-CLI

```bash
# Deactivate plugin
wp plugin deactivate liftoff-maintenance

# Delete plugin
wp plugin delete liftoff-maintenance
```

### Clean Uninstallation

The plugin automatically removes its database options when deleted through WordPress admin. If you want to manually clean up:

```sql
-- Remove all plugin options
DELETE FROM wp_options WHERE option_name LIKE 'liftoff_%';
```

### Data Backup

Before uninstalling, consider backing up your settings:

1. **Export Settings**
   - Note down your configuration
   - Save custom CSS/JS code
   - Backup uploaded images

2. **Database Backup**
   - Create full database backup
   - Export plugin-specific options

## Security Considerations

### File Permissions

- **Folders:** 755 or 750
- **Files:** 644 or 640
- **wp-config.php:** 600

### Regular Updates

- Keep WordPress updated
- Update plugins regularly
- Monitor security advisories

### Access Control

- Use strong admin passwords
- Limit admin access
- Configure IP whitelisting
- Enable two-factor authentication

## Performance Optimization

### Caching

- Configure caching plugins properly
- Exclude maintenance page from cache
- Use CDN for static assets

### Image Optimization

- Optimize uploaded images
- Use appropriate file formats
- Compress images before upload

### Code Optimization

- Minify custom CSS/JS
- Remove unused code
- Optimize database queries

This installation guide provides comprehensive instructions for setting up the LiftOff Maintenance Plugin. Follow the steps carefully and refer to the troubleshooting section if you encounter any issues.