# LiftOff Maintenance Plugin Documentation

## Overview

LiftOff is a comprehensive WordPress maintenance mode plugin that allows you to create beautiful, customizable maintenance pages while your website is under construction or maintenance. With advanced theming options, countdown timers, progress bars, and social media integration, LiftOff provides everything you need to keep your visitors informed and engaged.

**Version:** 2.1.0  
**Author:** Resillio  
**Requires:** WordPress 5.0+  
**Tested up to:** WordPress 6.4  
**License:** GPL v2 or later

## Features

### 🎨 **Visual Customization**
- **17 Pre-built Themes** including static gradients and animated backgrounds
- **Custom Color Controls** for background, text, and accent colors
- **Typography Options** with multiple font families and sizing controls
- **Logo & Branding** with custom logo upload and visibility controls
- **Custom CSS & JavaScript** support for advanced customization

### ⏰ **Countdown & Progress**
- **Countdown Timer** with multiple display formats (full/compact)
- **Progress Bar** with customizable colors and smooth animations
- **Launch Date** scheduling with automatic countdown calculation
- **Real-time Updates** without page refresh
- **Countdown Expiry Actions** - automatically disable maintenance mode or postpone countdown when timer reaches zero

### 🔗 **Social Integration**
- **Social Media Icons** for Facebook, Twitter, Instagram, LinkedIn, YouTube
- **Email Contact** integration
- **Toggle Visibility** for social icons section
- **Custom URLs** for each social platform

### 🛠️ **Advanced Settings**
- **Access Control** with IP whitelisting
- **Search Engine Access** controls
- **Custom Favicon** upload and management
- **Browser Tab Text** customization
- **Footer Settings** with customizable copyright and "Made with ❤️" message
- **Admin Bar Integration** with quick maintenance mode toggle
- **Responsive Design** for all devices

## Installation

### Method 1: WordPress Admin Dashboard
1. Download the plugin ZIP file
2. Go to **Plugins > Add New** in your WordPress admin
3. Click **Upload Plugin** and select the ZIP file
4. Click **Install Now** and then **Activate**

### Method 2: FTP Upload
1. Extract the plugin ZIP file
2. Upload the `liftoff-maintenance` folder to `/wp-content/plugins/`
3. Go to **Plugins** in WordPress admin and activate LiftOff

### Method 3: Manual Installation
1. Download and extract the plugin
2. Copy the plugin folder to your WordPress plugins directory
3. Activate through the WordPress admin interface

## Getting Started

### Quick Setup
1. After activation, go to **LiftOff** in your WordPress admin menu
2. Configure basic settings in the **General** tab:
   - Page title and heading
   - Maintenance message
   - Launch date (optional)
3. Choose a theme from the **Themes** tab
4. Enable maintenance mode using the toggle switch
5. Visit your site to see the maintenance page

### Basic Configuration

#### General Settings
- **Page Title:** The main title displayed on your maintenance page
- **Heading:** Large heading text for visitors
- **Message:** Detailed message explaining the maintenance
- **Launch Date:** Set a specific date/time for automatic countdown
- **Show Countdown:** Toggle countdown timer visibility

## Detailed Configuration

### Themes Tab

Choose from 17 professionally designed themes:

#### Static Themes
- **Dark Professional** - Corporate dark gradient
- **Light Minimal** - Clean light gradient
- **Gradient Blue** - Modern blue-purple gradient
- **Sunset Orange** - Warm orange-pink gradient
- **Ocean Teal** - Cool teal gradient
- **Purple Rain** - Vibrant purple-green gradient
- **Midnight City** - Dark urban theme
- **Forest Green** - Nature-inspired green gradient
- **Cherry Blossom** - Soft pink gradient
- **Royal Blue** - Classic blue gradient
- **Cosmic Purple** - Space-inspired purple
- **Golden Hour** - Warm golden gradient
- **Arctic Blue** - Cool arctic-inspired theme

#### Animated Themes
- **Floating Particles** - Animated particle effects
- **Wave Motion** - Flowing wave animations
- **Matrix Rain** - Matrix-style falling code
- **Aurora Lights** - Northern lights animation
- **Geometric Shapes** - Moving geometric patterns

### Customize Tab

#### Text Customization
- **Heading Font Size:** 24px - 72px range
- **Heading Font Weight:** 300 (Light) to 900 (Black)
- **Message Font Size:** 12px - 32px range
- **Text Alignment:** Left, Center, Right
- **Font Family:** Default, Arial, Helvetica, Georgia, Times New Roman, Roboto, Open Sans

#### Countdown Settings
- **Show Countdown:** Enable/disable countdown display
- **Countdown Text:** Custom label for countdown section
- **Countdown Format:** 
  - **Full:** Separate boxes for Days, Hours, Minutes, Seconds
  - **Compact:** Single digital clock format (DD:HH:MM:SS)
- **Countdown Style:** Visual styling options

#### Logo & Branding
- **Show Logo/Branding:** Master toggle for all logo display
- **Custom Logo Upload:** Replace default logo with your own
- **Logo Max Width:** Control logo size (50px - 500px)
- **Logo Preview:** Real-time preview of uploaded logo

#### Progress Bar
- **Show Progress Bar:** Enable/disable progress bar
- **Foreground Color:** Progress bar fill color
- **Background Color:** Progress bar track color
- **Animation:** Smooth progress animation based on countdown

#### Social Icons
- **Show Social Icons:** Master toggle for social media section
- **Platform URLs:**
  - Facebook
  - Twitter
  - Instagram
  - LinkedIn
  - YouTube
  - Email Address
- **Conditional Display:** Icons only appear if URLs are provided

### Advanced Tab

#### Access Control
- **Allowed IP Addresses:** 
  - Enter IP addresses that can bypass maintenance mode
  - One IP per line
  - Supports both IPv4 and IPv6
  - Example: `192.168.1.1` or `2001:db8::1`
- **Allow Search Engine Access:** 
  - Enable to allow search engines to crawl during maintenance
  - Helps maintain SEO rankings

#### Custom Code
- **Custom CSS:**
  - Add custom styles to override theme defaults
  - Target specific classes:
    - `.maintenance-container` - Main container
    - `.main-heading` - Page heading
    - `.main-message` - Message text
    - `.countdown` - Countdown timer
    - `.progress-bar` - Progress bar
    - `.social-links` - Social media icons
- **Custom JavaScript:**
  - Add custom functionality
  - Access to jQuery library
  - Execute after page load

#### Browser Settings
- **Custom Favicon:**
  - Upload ICO, PNG, or JPG files
  - Recommended sizes: 16x16px, 32x32px, or 64x64px
  - Automatic preview generation
  - Easy remove/replace functionality
- **Browser Tab Text:**
  - Custom text for browser tab title
  - Falls back to page title if empty
  - Useful for branding consistency

#### Countdown Expiry Actions
- **When Countdown Reaches Zero:**
  - **Do Nothing:** Keep maintenance page active (default)
  - **Disable Maintenance Mode:** Automatically turn off maintenance mode
  - **Postpone for 1 Hour:** Extend countdown by 1 hour
  - **Postpone for 6 Hours:** Extend countdown by 6 hours
  - **Postpone for 12 Hours:** Extend countdown by 12 hours
  - **Postpone for 24 Hours:** Extend countdown by 24 hours
- **Automatic Execution:** Actions trigger when countdown reaches zero
- **AJAX Processing:** Seamless execution without page refresh
- **Security:** Nonce verification for all actions

#### Footer Settings
- **Show Footer:** Toggle footer visibility on maintenance page
- **Footer Text:** Customizable copyright and message text
  - Default: "© 2024 Made with ❤️ by Resillio"
  - Supports HTML formatting
  - Year automatically updates
- **Footer Link URL:** Custom URL for footer link
  - Default: Resillio Fiverr profile
  - Can link to any website
- **Footer Link Text:** Custom text for the clickable link
  - Default: "Resillio"
  - Appears within the footer message
- **Positioning:** Sticky footer at bottom of page
- **Responsive Design:** Adapts to all screen sizes

#### Admin Bar Integration
- **Quick Toggle:** Maintenance mode switch in WordPress admin bar
- **Status Display:** Shows current maintenance status (ON/OFF)
- **Color Coding:** Visual indicators for maintenance state
- **Submenu Options:**
  - Toggle maintenance mode on/off
  - Quick access to plugin settings
- **Permissions:** Respects user capabilities
- **AJAX Functionality:** Instant toggle without page reload
- **Security:** Nonce verification for all actions

## Usage Examples

### Example 1: Product Launch
```
Page Title: "Something Amazing is Coming"
Heading: "Get Ready for Our New Product!"
Message: "We're putting the finishing touches on something incredible. Sign up below to be the first to know when we launch."
Launch Date: Set to product release date
Theme: "Cosmic Purple" with animated effects
Social Icons: Enabled with company social media links
```

### Example 2: Website Maintenance
```
Page Title: "Scheduled Maintenance"
Heading: "We'll Be Right Back"
Message: "We're performing scheduled maintenance to improve your experience. We'll be back online shortly."
Launch Date: Set to maintenance completion time
Theme: "Dark Professional" for corporate look
Progress Bar: Enabled to show maintenance progress
```

### Example 3: Coming Soon Page
```
Page Title: "Coming Soon"
Heading: "Our New Website is Almost Ready"
Message: "We're working hard to bring you an amazing new experience. Stay tuned!"
Theme: "Aurora Lights" for dynamic feel
Countdown: Enabled with launch date
Custom Logo: Company logo uploaded
```

## Customization Guide

### CSS Customization

Add custom styles in the Advanced > Custom CSS section:

```css
/* Custom heading style */
.main-heading {
    font-family: 'Georgia', serif;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

/* Custom countdown styling */
.countdown-item {
    border-radius: 20px;
    background: rgba(255,255,255,0.1);
}

/* Custom social icons */
.social-links a {
    transform: scale(1.2);
    transition: transform 0.3s ease;
}

.social-links a:hover {
    transform: scale(1.4);
}
```

### JavaScript Customization

Add custom functionality in Advanced > Custom JavaScript:

```javascript
// Custom countdown completion action
jQuery(document).ready(function($) {
    // Check if countdown has ended
    if (window.countdownEnded) {
        $('.main-message').html('We\'re live! <a href="/">Visit our site</a>');
    }
    
    // Custom animation on load
    $('.maintenance-container').fadeIn(1000);
});
```

## Troubleshooting

### Common Issues

#### Maintenance Page Not Showing
1. **Check if maintenance mode is enabled** in the General tab
2. **Verify you're not logged in as admin** - admins bypass maintenance mode
3. **Clear browser cache** and try incognito/private browsing
4. **Check for plugin conflicts** by deactivating other plugins temporarily

#### Countdown Timer Not Working
1. **Verify launch date is set** and in the future
2. **Check timezone settings** in WordPress General Settings
3. **Ensure JavaScript is enabled** in the browser
4. **Check browser console** for JavaScript errors

#### Custom Logo Not Displaying
1. **Verify logo toggle is enabled** in Customize tab
2. **Check image file format** (JPG, PNG, GIF supported)
3. **Ensure image is uploaded** to WordPress media library
4. **Check file permissions** on uploads directory

#### Social Icons Not Appearing
1. **Enable social icons toggle** in Customize tab
2. **Add URLs for desired platforms** - empty URLs won't show icons
3. **Use complete URLs** including http:// or https://
4. **Check for theme conflicts** that might hide icons

#### Progress Bar Not Animating
1. **Enable progress bar** in Customize tab
2. **Set a launch date** for progress calculation
3. **Check browser compatibility** - requires modern browsers
4. **Verify countdown is active** - progress bar follows countdown

### Performance Issues

#### Slow Loading
1. **Optimize uploaded images** (logo, favicon) for web
2. **Minimize custom CSS/JS** code
3. **Choose static themes** over animated ones for better performance
4. **Check hosting server** performance

#### Browser Compatibility
- **Supported Browsers:** Chrome 60+, Firefox 55+, Safari 12+, Edge 79+
- **Mobile Support:** iOS Safari 12+, Chrome Mobile 60+
- **Fallbacks:** Basic styling for older browsers

## Developer Information

### Hooks and Filters

#### Actions
```php
// Before maintenance page loads
do_action('liftoff_before_maintenance_page');

// After maintenance page loads
do_action('liftoff_after_maintenance_page');

// When maintenance mode is enabled
do_action('liftoff_maintenance_enabled');

// When maintenance mode is disabled
do_action('liftoff_maintenance_disabled');
```

#### Filters
```php
// Modify maintenance page content
apply_filters('liftoff_maintenance_content', $content);

// Modify allowed IPs
apply_filters('liftoff_allowed_ips', $ips);

// Modify countdown end behavior
apply_filters('liftoff_countdown_end_action', $action);
```

### Database Options

The plugin stores settings in WordPress options table:

```php
// General settings
get_option('liftoff_maintenance_enabled');
get_option('liftoff_page_title');
get_option('liftoff_heading');
get_option('liftoff_message');
get_option('liftoff_launch_date');

// Customization
get_option('liftoff_theme');
get_option('liftoff_show_countdown');
get_option('liftoff_show_logo');
get_option('liftoff_custom_logo');
get_option('liftoff_show_progress_bar');
get_option('liftoff_show_social_icons');

// Advanced settings
get_option('liftoff_custom_favicon');
get_option('liftoff_browser_tab_text');
get_option('liftoff_allowed_ips');
get_option('liftoff_custom_css');
get_option('liftoff_custom_js');
```

### File Structure

```
liftoff-maintenance/
├── liftoff-maintenance.php     # Main plugin file
├── README.md                   # Basic readme
├── DOCUMENTATION.md            # This documentation
├── assets/
│   ├── css/
│   │   └── admin.css          # Admin interface styles
│   └── js/
│       └── admin.js           # Admin interface scripts
├── includes/
│   └── admin-page.php         # Admin page template
└── templates/
    └── maintenance-page.php   # Frontend maintenance page
```

## Changelog

### Version 2.0.0
- **NEW:** Custom favicon upload and management
- **NEW:** Browser tab text customization
- **NEW:** Social media icons integration (Facebook, Twitter, Instagram, LinkedIn, YouTube, Email)
- **NEW:** Progress bar with countdown integration
- **NEW:** Logo visibility toggle (complete on/off control)
- **IMPROVED:** Advanced settings organization
- **IMPROVED:** Form handling and validation
- **IMPROVED:** Admin interface responsiveness
- **UPDATED:** Plugin author to Resillio
- **UPDATED:** Enhanced documentation

### Version 1.x
- Initial release with basic maintenance mode functionality
- Theme system implementation
- Countdown timer features
- Basic customization options

## Support

### Getting Help
1. **Check this documentation** for common solutions
2. **Review troubleshooting section** for known issues
3. **Test with default theme** to isolate conflicts
4. **Check WordPress and PHP versions** for compatibility

### Reporting Issues
When reporting issues, please include:
- WordPress version
- PHP version
- Active theme name
- List of active plugins
- Browser and version
- Detailed description of the issue
- Steps to reproduce
- Screenshots if applicable

### Feature Requests
We welcome feature requests and suggestions for improving LiftOff. Please provide:
- Clear description of the requested feature
- Use case or scenario where it would be helpful
- Any relevant examples or mockups

## License

LiftOff Maintenance Plugin is licensed under the GPL v2 or later.

```
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
```

---

**LiftOff Maintenance Plugin v2.0.0**  
*Created by Resillio*  
*Documentation last updated: January 2025*