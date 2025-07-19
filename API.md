# LiftOff Maintenance Plugin API Documentation

## Overview

This document provides comprehensive API documentation for developers who want to extend, customize, or integrate with the LiftOff Maintenance Plugin.

## Table of Contents

1. [WordPress Hooks](#wordpress-hooks)
2. [Filters](#filters)
3. [Actions](#actions)
4. [Database Options](#database-options)
5. [JavaScript Events](#javascript-events)
6. [CSS Classes](#css-classes)
7. [PHP Functions](#php-functions)
8. [AJAX Endpoints](#ajax-endpoints)
9. [Integration Examples](#integration-examples)

## WordPress Hooks

### Filters

#### `liftoff_maintenance_page_title`

Filters the maintenance page title before display.

```php
apply_filters('liftoff_maintenance_page_title', $page_title);
```

**Parameters:**
- `$page_title` (string) - The current page title

**Example:**
```php
function custom_maintenance_title($title) {
    return 'Custom ' . $title;
}
add_filter('liftoff_maintenance_page_title', 'custom_maintenance_title');
```

#### `liftoff_maintenance_message`

Filters the maintenance message before display.

```php
apply_filters('liftoff_maintenance_message', $message);
```

**Parameters:**
- `$message` (string) - The maintenance message

#### `liftoff_custom_css`

Filters the custom CSS before output.

```php
apply_filters('liftoff_custom_css', $custom_css);
```

**Parameters:**
- `$custom_css` (string) - The custom CSS code

#### `liftoff_custom_js`

Filters the custom JavaScript before output.

```php
apply_filters('liftoff_custom_js', $custom_js);
```

**Parameters:**
- `$custom_js` (string) - The custom JavaScript code

#### `liftoff_social_icons`

Filters the social media icons array.

```php
apply_filters('liftoff_social_icons', $social_icons);
```

**Parameters:**
- `$social_icons` (array) - Array of social media platforms and URLs

**Example:**
```php
function add_custom_social_icon($icons) {
    $icons['discord'] = get_option('liftoff_discord_url', '');
    return $icons;
}
add_filter('liftoff_social_icons', 'add_custom_social_icon');
```

### Actions

#### `liftoff_maintenance_head`

Fires in the head section of the maintenance page.

```php
do_action('liftoff_maintenance_head');
```

**Example:**
```php
function add_custom_meta_tags() {
    echo '<meta name="robots" content="noindex, nofollow">';
}
add_action('liftoff_maintenance_head', 'add_custom_meta_tags');
```

#### `liftoff_maintenance_footer`

Fires in the footer section of the maintenance page.

```php
do_action('liftoff_maintenance_footer');
```

#### `liftoff_before_countdown`

Fires before the countdown timer display.

```php
do_action('liftoff_before_countdown');
```

#### `liftoff_after_countdown`

Fires after the countdown timer display.

```php
do_action('liftoff_after_countdown');
```

#### `liftoff_settings_saved`

Fires after settings are successfully saved.

```php
do_action('liftoff_settings_saved', $settings_type);
```

**Parameters:**
- `$settings_type` (string) - Type of settings saved ('general', 'customize', 'advanced')

## Database Options

### Core Settings

| Option Name | Type | Description | Default |
|-------------|------|-------------|----------|
| `liftoff_page_title` | string | Page title | 'Maintenance Mode' |
| `liftoff_heading` | string | Main heading | 'We'll be back soon!' |
| `liftoff_message` | string | Maintenance message | 'We are currently...' |
| `liftoff_launch_date` | string | Launch date (Y-m-d H:i) | '' |
| `liftoff_countdown_format` | string | Countdown format | 'full' |

### Visual Customization

| Option Name | Type | Description | Default |
|-------------|------|-------------|----------|
| `liftoff_theme` | string | Selected theme | 'gradient-1' |
| `liftoff_custom_logo` | int | Logo attachment ID | 0 |
| `liftoff_show_logo` | bool | Show logo/branding | true |
| `liftoff_logo_size` | int | Logo size (px) | 150 |
| `liftoff_background_color` | string | Background color | '#667eea' |
| `liftoff_text_color` | string | Text color | '#ffffff' |
| `liftoff_accent_color` | string | Accent color | '#f093fb' |
| `liftoff_font_family` | string | Font family | 'Inter' |
| `liftoff_font_size` | int | Font size | 16 |
| `liftoff_font_weight` | string | Font weight | 'normal' |
| `liftoff_text_align` | string | Text alignment | 'center' |

### Social Media

| Option Name | Type | Description | Default |
|-------------|------|-------------|----------|
| `liftoff_show_social_icons` | bool | Show social icons | false |
| `liftoff_facebook_url` | string | Facebook URL | '' |
| `liftoff_twitter_url` | string | Twitter URL | '' |
| `liftoff_instagram_url` | string | Instagram URL | '' |
| `liftoff_linkedin_url` | string | LinkedIn URL | '' |
| `liftoff_youtube_url` | string | YouTube URL | '' |
| `liftoff_email_address` | string | Email address | '' |

### Progress Bar

| Option Name | Type | Description | Default |
|-------------|------|-------------|----------|
| `liftoff_show_progress_bar` | bool | Show progress bar | false |
| `liftoff_progress_bar_color` | string | Progress bar color | '#4CAF50' |
| `liftoff_progress_bar_bg_color` | string | Progress bar background | '#e0e0e0' |

### Advanced Settings

| Option Name | Type | Description | Default |
|-------------|------|-------------|----------|
| `liftoff_allowed_ips` | string | Allowed IP addresses | '' |
| `liftoff_allow_search_engines` | bool | Allow search engine access | false |
| `liftoff_custom_css` | string | Custom CSS code | '' |
| `liftoff_custom_js` | string | Custom JavaScript code | '' |
| `liftoff_custom_favicon` | int | Custom favicon attachment ID | 0 |
| `liftoff_browser_tab_text` | string | Browser tab text | '' |

### Countdown Expiry Actions

| Option Name | Type | Description | Default |
|-------------|------|-------------|----------|
| `liftoff_countdown_expiry_action` | string | Action when countdown reaches zero | 'do_nothing' |

### Footer Settings

| Option Name | Type | Description | Default |
|-------------|------|-------------|----------|
| `liftoff_show_footer` | bool | Show footer on maintenance page | true |
| `liftoff_footer_text` | string | Footer text/copyright message | '© 2024 Made with ❤️ by Resillio' |
| `liftoff_footer_link_url` | string | Footer link URL | 'https://www.fiverr.com/s/resillio' |
| `liftoff_footer_link_text` | string | Footer link text | 'Resillio' |
| `liftoff_allow_search_engines` | bool | Allow search engines | false |
| `liftoff_custom_css` | string | Custom CSS code | '' |
| `liftoff_custom_js` | string | Custom JavaScript | '' |
| `liftoff_custom_favicon` | int | Favicon attachment ID | 0 |
| `liftoff_browser_tab_text` | string | Browser tab text | '' |

## JavaScript Events

### Custom Events

The plugin triggers custom JavaScript events that you can listen to:

#### `liftoff:countdown:tick`

Fired every second during countdown updates.

```javascript
document.addEventListener('liftoff:countdown:tick', function(e) {
    console.log('Time remaining:', e.detail.timeRemaining);
});
```

#### `liftoff:countdown:complete`

Fired when the countdown reaches zero.

```javascript
document.addEventListener('liftoff:countdown:complete', function(e) {
    console.log('Countdown completed!');
    // Custom action when countdown finishes
});
```

#### `liftoff:progress:update`

Fired when progress bar updates.

```javascript
document.addEventListener('liftoff:progress:update', function(e) {
    console.log('Progress:', e.detail.percentage + '%');
});
```

### Global JavaScript Objects

#### `LiftOffConfig`

Global configuration object available in the maintenance page:

```javascript
window.LiftOffConfig = {
    launchDate: '2024-12-31 23:59',
    countdownFormat: 'full',
    showProgressBar: true,
    theme: 'gradient-1'
};
```

## CSS Classes

### Main Container Classes

| Class | Description |
|-------|-------------|
| `.liftoff-container` | Main container wrapper |
| `.liftoff-content` | Content area |
| `.liftoff-header` | Header section |
| `.liftoff-footer` | Footer section |

### Theme Classes

| Class | Description |
|-------|-------------|
| `.theme-gradient-1` to `.theme-gradient-13` | Static gradient themes |
| `.theme-animated-1` to `.theme-animated-4` | Animated themes |

### Component Classes

| Class | Description |
|-------|-------------|
| `.liftoff-logo` | Logo container |
| `.liftoff-heading` | Main heading |
| `.liftoff-message` | Message text |
| `.liftoff-countdown` | Countdown container |
| `.countdown-box` | Individual countdown unit |
| `.countdown-number` | Countdown number |
| `.countdown-label` | Countdown label |
| `.liftoff-progress` | Progress bar container |
| `.progress-bar` | Progress bar element |
| `.liftoff-social` | Social icons container |
| `.social-icon` | Individual social icon |

## PHP Functions

### Public Functions

#### `liftoff_is_maintenance_mode()`

Checks if maintenance mode is active.

```php
function liftoff_is_maintenance_mode() {
    // Implementation
    return true; // or false
}
```

#### `liftoff_get_setting($option_name, $default = '')`

Retrieves a plugin setting with fallback.

```php
function liftoff_get_setting($option_name, $default = '') {
    return get_option('liftoff_' . $option_name, $default);
}
```

#### `liftoff_update_setting($option_name, $value)`

Updates a plugin setting.

```php
function liftoff_update_setting($option_name, $value) {
    return update_option('liftoff_' . $option_name, $value);
}
```

## AJAX Endpoints

### Available Endpoints

#### `wp_ajax_liftoff_save_settings`

Saves general plugin settings.

**Action:** `liftoff_save_settings`
**Method:** POST
**Nonce:** `liftoff_nonce`

#### `wp_ajax_liftoff_save_customize`

Saves customization settings.

**Action:** `liftoff_save_customize`
**Method:** POST
**Nonce:** `liftoff_nonce`

#### `wp_ajax_liftoff_save_advanced`

Saves advanced settings.

**Action:** `liftoff_save_advanced`
**Method:** POST
**Nonce:** `liftoff_nonce`

#### `wp_ajax_liftoff_disable_maintenance`

Disables maintenance mode (countdown expiry action).

**Action:** `liftoff_disable_maintenance`
**Method:** POST
**Nonce:** `liftoff_nonce`
**Access:** Public (works for non-logged-in users)

#### `wp_ajax_nopriv_liftoff_disable_maintenance`

Disables maintenance mode for non-logged-in users.

**Action:** `liftoff_disable_maintenance`
**Method:** POST
**Nonce:** `liftoff_nonce`

#### `wp_ajax_liftoff_postpone_countdown`

Postpones countdown timer (countdown expiry action).

**Action:** `liftoff_postpone_countdown`
**Method:** POST
**Nonce:** `liftoff_nonce`
**Parameters:**
- `hours` (int) - Number of hours to postpone (1, 6, 12, or 24)
**Access:** Public (works for non-logged-in users)

#### `wp_ajax_nopriv_liftoff_postpone_countdown`

Postpones countdown timer for non-logged-in users.

**Action:** `liftoff_postpone_countdown`
**Method:** POST
**Nonce:** `liftoff_nonce`
**Parameters:**
- `hours` (int) - Number of hours to postpone

#### `wp_ajax_liftoff_toggle_maintenance`

Toggles maintenance mode from admin bar.

**Action:** `liftoff_toggle_maintenance`
**Method:** POST
**Nonce:** `liftoff_admin_bar_nonce`
**Capability:** `manage_options`

### AJAX Request Example

```javascript
jQuery.ajax({
    url: ajaxurl,
    type: 'POST',
    data: {
        action: 'liftoff_save_settings',
        nonce: liftoff_ajax.nonce,
        form_data: formData
    },
    success: function(response) {
        if (response.success) {
            console.log('Settings saved successfully');
        }
    }
});
```

## Integration Examples

### Adding Custom Theme

```php
// Add custom theme to theme list
function add_custom_liftoff_theme($themes) {
    $themes['custom-theme'] = 'My Custom Theme';
    return $themes;
}
add_filter('liftoff_available_themes', 'add_custom_liftoff_theme');

// Add CSS for custom theme
function custom_liftoff_theme_css() {
    if (get_option('liftoff_theme') === 'custom-theme') {
        echo '<style>
            .theme-custom-theme {
                background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            }
        </style>';
    }
}
add_action('liftoff_maintenance_head', 'custom_liftoff_theme_css');
```

### Custom Countdown Format

```php
// Add custom countdown format
function custom_countdown_display($countdown_html, $format) {
    if ($format === 'custom') {
        // Custom countdown HTML
        $countdown_html = '<div class="custom-countdown">Custom format</div>';
    }
    return $countdown_html;
}
add_filter('liftoff_countdown_html', 'custom_countdown_display', 10, 2);
```

### Integration with Other Plugins

```php
// Integration with WooCommerce
function liftoff_woocommerce_integration() {
    if (class_exists('WooCommerce')) {
        // Disable maintenance mode for shop managers
        if (current_user_can('manage_woocommerce')) {
            return false;
        }
    }
    return true;
}
add_filter('liftoff_show_maintenance_page', 'liftoff_woocommerce_integration');
```

### Custom Social Media Platform

```php
// Add Discord to social media options
function add_discord_social_option($social_icons) {
    $discord_url = get_option('liftoff_discord_url', '');
    if (!empty($discord_url)) {
        $social_icons['discord'] = $discord_url;
    }
    return $social_icons;
}
add_filter('liftoff_social_icons', 'add_discord_social_option');

// Add Discord field to admin
function add_discord_admin_field() {
    // Add field to admin form
}
add_action('liftoff_social_fields', 'add_discord_admin_field');
```

## Security Considerations

### Nonce Verification

All AJAX requests include nonce verification:

```php
if (!wp_verify_nonce($_POST['nonce'], 'liftoff_nonce')) {
    wp_die('Security check failed');
}
```

### Data Sanitization

All user inputs are sanitized:

```php
$page_title = sanitize_text_field($_POST['page_title']);
$custom_css = wp_strip_all_tags($_POST['custom_css']);
$allowed_ips = sanitize_textarea_field($_POST['allowed_ips']);
```

### Capability Checks

Admin functions require proper capabilities:

```php
if (!current_user_can('manage_options')) {
    wp_die('Insufficient permissions');
}
```

## Performance Notes

- Settings are cached using WordPress transients
- CSS and JavaScript are minified in production
- Images are optimized and served with proper headers
- Database queries are optimized and cached

## Browser Compatibility

- Modern browsers (Chrome 60+, Firefox 55+, Safari 12+, Edge 79+)
- Progressive enhancement for older browsers
- Graceful degradation for JavaScript-disabled environments
- Mobile-first responsive design

## Debugging

### Debug Mode

Enable debug mode by adding to wp-config.php:

```php
define('LIFTOFF_DEBUG', true);
```

### Debug Functions

```php
// Log debug information
function liftoff_debug_log($message) {
    if (defined('LIFTOFF_DEBUG') && LIFTOFF_DEBUG) {
        error_log('LiftOff Debug: ' . $message);
    }
}

// Check plugin status
function liftoff_debug_status() {
    return [
        'version' => LIFTOFF_VERSION,
        'active' => liftoff_is_maintenance_mode(),
        'theme' => get_option('liftoff_theme'),
        'launch_date' => get_option('liftoff_launch_date')
    ];
}
```

This API documentation provides comprehensive information for developers who want to extend or integrate with the LiftOff Maintenance Plugin. For additional support or questions, please refer to the main documentation or contact the development team.