# LiftOff Maintenance Plugin By Resillio

🚀 **A powerful WordPress maintenance mode plugin with beautiful themes, countdown timers, and advanced customization options.**

[![Version](https://img.shields.io/badge/version-2.0.0-blue.svg)](https://github.com/bigcookiedaddycz/liftoff-maintenance)
[![WordPress](https://img.shields.io/badge/wordpress-5.0%2B-blue.svg)](https://wordpress.org/)
[![License](https://img.shields.io/badge/license-GPL%20v2%2B-green.svg)](https://www.gnu.org/licenses/gpl-2.0.html)

## ✨ Features

### 🎨 **Visual Customization**
- **17 Pre-built Themes** including animated backgrounds
- **Custom Color Controls** for complete visual control
- **Typography Options** with multiple font families
- **Logo & Branding** with upload and visibility controls
- **Custom CSS & JavaScript** support

### ⏰ **Countdown & Progress**
- **Countdown Timer** with multiple display formats
- **Progress Bar** with smooth animations
- **Launch Date** scheduling
- **Real-time Updates** without page refresh
- **Countdown Expiry Actions** - automatically disable maintenance mode or postpone countdown when timer reaches zero

### 🔗 **Social Integration**
- **Social Media Icons** (Facebook, Twitter, Instagram, LinkedIn, YouTube)
- **Email Contact** integration
- **Toggle Visibility** controls
- **Custom URLs** for each platform

### 🛠️ **Advanced Settings**
- **Access Control** with IP whitelisting
- **Search Engine Access** controls
- **Custom Favicon** upload
- **Browser Tab Text** customization
- **Footer Settings** with customizable copyright and "Made with ❤️" message
- **Admin Bar Integration** with quick maintenance mode toggle
- **Responsive Design** for all devices

## 🚀 Quick Start

### Installation

1. **Download** the plugin ZIP file
2. **Upload** to WordPress via Plugins > Add New > Upload Plugin
3. **Activate** the plugin
4. **Configure** via LiftOff menu in WordPress admin

### Basic Setup

1. Go to **LiftOff** in your WordPress admin
2. Set your **page title, heading, and message**
3. Choose a **theme** from 17 available options
4. Set a **launch date** (optional)
5. **Enable maintenance mode**

## 📋 Requirements

- **WordPress:** 5.0 or higher
- **PHP:** 7.4 or higher
- **Browser Support:** Modern browsers (Chrome 60+, Firefox 55+, Safari 12+, Edge 79+)

## 🎨 Available Themes

### Static Themes
- Dark Professional
- Light Minimal
- Gradient Blue
- Sunset Orange
- Ocean Teal
- Purple Rain
- Midnight City
- Forest Green
- Cherry Blossom
- Royal Blue
- Cosmic Purple
- Golden Hour
- Arctic Blue

### Animated Themes
- Floating Particles
- Wave Motion
- Matrix Rain
- Aurora Lights
- Geometric Shapes

## 📖 Documentation

For detailed documentation, configuration guides, and troubleshooting, see [DOCUMENTATION.md](DOCUMENTATION.md).

## 🔧 Configuration

### General Settings
- Page title and heading
- Maintenance message
- Launch date with countdown
- Basic styling options

### Themes
- Choose from 17 pre-built themes
- Static and animated options
- One-click theme switching

### Customize
- Text customization (fonts, sizes, alignment)
- Countdown settings and formats
- Logo upload and branding
- Progress bar with custom colors
- Social media integration

### Advanced
- IP-based access control
- Search engine access settings
- Custom CSS and JavaScript
- Favicon and browser tab customization
- Footer settings with customizable text and links
- Countdown expiry actions (disable maintenance, postpone timer)

## 🛠️ Development

### File Structure
```
liftoff-maintenance/
├── liftoff-maintenance.php     # Main plugin file
├── README.md                   # This file
├── DOCUMENTATION.md            # Detailed documentation
├── assets/
│   ├── css/admin.css          # Admin styles
│   └── js/admin.js            # Admin scripts
├── includes/
│   └── admin-page.php         # Admin interface
└── templates/
    └── maintenance-page.php   # Frontend template
```

### Hooks & Filters

```php
// Actions
do_action('liftoff_before_maintenance_page');
do_action('liftoff_after_maintenance_page');
do_action('liftoff_maintenance_enabled');
do_action('liftoff_maintenance_disabled');

// Filters
apply_filters('liftoff_maintenance_content', $content);
apply_filters('liftoff_allowed_ips', $ips);
apply_filters('liftoff_countdown_end_action', $action);
```

## 📝 Changelog

### Version 2.1.0
- ✨ **NEW:** Countdown expiry actions - automatically disable maintenance mode or postpone countdown
- ✨ **NEW:** Footer settings with customizable copyright and "Made with ❤️" message
- ✨ **NEW:** Admin bar integration with quick maintenance mode toggle
- ✨ **NEW:** Sticky footer positioning at bottom of page
- 🔧 **IMPROVED:** Enhanced AJAX handling for countdown actions
- 🔧 **IMPROVED:** Better responsive design for footer
- 🔧 **IMPROVED:** Security with nonce verification for all AJAX calls

### Version 2.0.0
- ✨ **NEW:** Custom favicon upload and management
- ✨ **NEW:** Browser tab text customization
- ✨ **NEW:** Social media icons integration
- ✨ **NEW:** Progress bar with countdown integration
- ✨ **NEW:** Complete logo visibility control
- 🔧 **IMPROVED:** Advanced settings organization
- 🔧 **IMPROVED:** Form handling and validation
- 🔧 **IMPROVED:** Admin interface responsiveness
- 📝 **UPDATED:** Plugin author to Resillio
- 📚 **UPDATED:** Enhanced documentation

## 🤝 Contributing

We welcome contributions! Please feel free to submit issues, feature requests, or pull requests.

## 📄 License

This plugin is licensed under the GPL v2 or later.

```
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
```

## 🆘 Support

For support, please:
1. Check the [documentation](DOCUMENTATION.md)
2. Review the troubleshooting section
3. Submit an issue with detailed information

---

**LiftOff Maintenance Plugin v2.0.0**  
*Created by Resillio*

## Features

### 🎨 Modern Design
- Clean, professional interface that matches WordPress admin design
- Non-colorful, minimalist aesthetic
- Responsive design that works on all devices
- Beautiful maintenance page with animated elements

### ⚙️ Admin Panel
- Intuitive settings interface
- Real-time status indicator
- Quick toggle for maintenance mode
- Color customization with live preview
- Form validation and AJAX saving

### 🚀 Maintenance Page Features
- Customizable heading and message
- Optional countdown timer
- Animated background elements
- Social media links
- Progress bar animation
- Mobile-responsive design

### 🛠️ Technical Features
- Clean, semantic code
- WordPress coding standards compliant
- Secure with nonce verification
- Translation ready
- Lightweight and fast

## Installation

1. Upload the `liftoff-maintenance` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to 'LiftOff' in your WordPress admin menu to configure settings

## Configuration

### General Settings
- **Enable Maintenance Mode**: Toggle to activate/deactivate maintenance mode
- **Page Title**: Set the browser title for the maintenance page
- **Main Heading**: The main headline visitors will see
- **Message**: Description text below the heading
- **Launch Date**: Optional countdown timer target date

### Design Settings
- **Background Color**: Customize the page background
- **Text Color**: Set the main text color
- **Accent Color**: Choose the accent color for highlights and buttons

## File Structure

```
liftoff-maintenance/
├── liftoff-maintenance.php     # Main plugin file
├── includes/
│   └── admin-page.php          # Admin interface template
├── templates/
│   └── maintenance-page.php    # Frontend maintenance page
├── assets/
│   ├── css/
│   │   └── admin.css          # Admin panel styles
│   └── js/
│       └── admin.js           # Admin panel JavaScript
└── README.md                   # This file
```

## Customization

### Styling
The maintenance page can be customized through the admin panel color settings. For advanced customization, you can modify the CSS in `templates/maintenance-page.php`.

### Functionality
The plugin is built with hooks and filters for easy extension. Key functions:

- `liftoff_save_settings()` - Handles AJAX form submissions
- `maintenance_mode()` - Controls when maintenance page is displayed
- `admin_scripts()` - Enqueues admin assets

### Hooks
- `liftoff_before_maintenance_page` - Fires before maintenance page content
- `liftoff_after_maintenance_page` - Fires after maintenance page content

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Modern browser with JavaScript enabled

## Security

- All user inputs are sanitized and validated
- AJAX requests use WordPress nonces
- Capability checks ensure only authorized users can modify settings
- No direct file access allowed

## Performance

- Lightweight codebase
- Minimal database queries
- Optimized CSS and JavaScript
- No external dependencies

## Troubleshooting

### Maintenance page not showing
1. Ensure maintenance mode is enabled in settings
2. Check if you're logged in as an administrator (admins bypass maintenance mode)
3. Clear any caching plugins

### Admin panel not loading
1. Check for JavaScript errors in browser console
2. Ensure jQuery is loaded
3. Verify file permissions

### Styling issues
1. Check for theme conflicts
2. Clear browser cache
3. Verify CSS files are loading correctly

## Changelog

### Version 1.0.0
- Initial release
- Modern admin interface
- Responsive maintenance page
- Countdown timer functionality
- Color customization
- AJAX form handling

## License

This plugin is licensed under the GPL v2 or later.

## Support

For support and feature requests, please contact the plugin author or visit the plugin documentation.

## Credits

- Built with WordPress best practices
- Uses Inter font from Google Fonts
- Icons from custom SVG set
- Animations using CSS3 transitions

---

**LiftOff Maintenance** - Professional maintenance mode for WordPress
