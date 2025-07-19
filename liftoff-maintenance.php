<?php
/**
 * Plugin Name: LiftOff Maintenance
 * Plugin URI: https://example.com/liftoff-maintenance
 * Description: A modern, professional coming soon and maintenance mode plugin for WordPress with a sleek admin interface.
 * Version: 2.1.0
 * Author: Resillio
 * License: GPL v2 or later
 * Text Domain: liftoff-maintenance
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('LIFTOFF_PLUGIN_URL', plugin_dir_url(__FILE__));
define('LIFTOFF_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('LIFTOFF_VERSION', '2.1.0');

// Main plugin class
class LiftOffMaintenance {
    
    public function __construct() {
        add_action('init', array($this, 'init'));
        add_action('admin_menu', array($this, 'admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
        add_action('template_redirect', array($this, 'maintenance_mode'));
        add_action('admin_bar_menu', array($this, 'admin_bar_menu'), 100);
        add_action('wp_enqueue_scripts', array($this, 'admin_bar_styles'));
        add_action('admin_enqueue_scripts', array($this, 'admin_bar_styles'));
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
    }
    
    public function init() {
        load_plugin_textdomain('liftoff-maintenance', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }
    
    public function admin_menu() {
        add_menu_page(
            __('LiftOff Maintenance', 'liftoff-maintenance'),
            __('LiftOff', 'liftoff-maintenance'),
            'manage_options',
            'liftoff-maintenance',
            array($this, 'admin_page'),
            'dashicons-shield-alt',
            30
        );
    }
    
    public function admin_scripts($hook) {
        if ($hook !== 'toplevel_page_liftoff-maintenance') {
            return;
        }
        
        wp_enqueue_style('liftoff-admin', LIFTOFF_PLUGIN_URL . 'assets/css/admin.css', array(), LIFTOFF_VERSION);
        wp_enqueue_script('liftoff-admin', LIFTOFF_PLUGIN_URL . 'assets/js/admin.js', array('jquery'), LIFTOFF_VERSION, true);
        
        wp_localize_script('liftoff-admin', 'liftoff_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('liftoff_nonce')
        ));
    }
    
    public function admin_page() {
        include LIFTOFF_PLUGIN_PATH . 'includes/admin-page.php';
    }
    
    public function maintenance_mode() {
        if (is_admin() || current_user_can('manage_options')) {
            return;
        }
        
        $maintenance_enabled = get_option('liftoff_maintenance_enabled', false);
        
        if ($maintenance_enabled) {
            status_header(503);
            include LIFTOFF_PLUGIN_PATH . 'templates/maintenance-page.php';
            exit;
        }
    }
    
    public function activate() {
        // Set default options
        add_option('liftoff_maintenance_enabled', false);
        add_option('liftoff_page_title', 'Coming Soon');
        add_option('liftoff_page_heading', 'We\'re launching soon');
        add_option('liftoff_page_message', 'Our website is under construction. We\'ll be here soon with our new awesome site.');
        add_option('liftoff_launch_date', '');
        add_option('liftoff_background_color', '#1a1a1a');
        add_option('liftoff_text_color', '#ffffff');
        add_option('liftoff_accent_color', '#007cba');
        
        // Footer default options
        add_option('liftoff_show_footer', '1');
        add_option('liftoff_footer_text', '© 2024 Made with ❤️ by Resillio');
        add_option('liftoff_footer_link_url', 'https://www.fiverr.com/sellers/thboundlessmind/edit');
        add_option('liftoff_footer_link_text', 'Resillio');
    }
    
    public function deactivate() {
        // Disable maintenance mode on deactivation
        update_option('liftoff_maintenance_enabled', false);
    }
    
    public function admin_bar_menu($wp_admin_bar) {
        if (!current_user_can('manage_options')) {
            return;
        }
        
        $maintenance_enabled = get_option('liftoff_maintenance_enabled', false);
        $status_text = $maintenance_enabled ? __('ON', 'liftoff-maintenance') : __('OFF', 'liftoff-maintenance');
        $status_class = $maintenance_enabled ? 'liftoff-status-on' : 'liftoff-status-off';
        
        $wp_admin_bar->add_menu(array(
            'id' => 'liftoff-maintenance',
            'title' => '<span class="ab-icon dashicons-shield-alt"></span><span class="ab-label">Maintenance: <span class="' . $status_class . '">' . $status_text . '</span></span>',
            'href' => admin_url('admin.php?page=liftoff-maintenance'),
            'meta' => array(
                'title' => __('LiftOff Maintenance Mode', 'liftoff-maintenance')
            )
        ));
        
        // Add toggle submenu
        $toggle_text = $maintenance_enabled ? __('Disable Maintenance', 'liftoff-maintenance') : __('Enable Maintenance', 'liftoff-maintenance');
        $wp_admin_bar->add_menu(array(
            'parent' => 'liftoff-maintenance',
            'id' => 'liftoff-toggle',
            'title' => $toggle_text,
            'href' => '#',
            'meta' => array(
                'class' => 'liftoff-admin-bar-toggle',
                'onclick' => 'liftoffToggleMaintenance(); return false;'
            )
        ));
        
        // Add settings submenu
        $wp_admin_bar->add_menu(array(
            'parent' => 'liftoff-maintenance',
            'id' => 'liftoff-settings',
            'title' => __('Settings', 'liftoff-maintenance'),
            'href' => admin_url('admin.php?page=liftoff-maintenance')
        ));
    }
    
    public function admin_bar_styles() {
        if (!is_admin_bar_showing() || !current_user_can('manage_options')) {
            return;
        }
        ?>
        <style type="text/css">
            #wp-admin-bar-liftoff-maintenance .ab-icon:before {
                content: "\f332";
                top: 2px;
            }
            #wp-admin-bar-liftoff-maintenance .liftoff-status-on {
                color: #00a32a;
                font-weight: bold;
            }
            #wp-admin-bar-liftoff-maintenance .liftoff-status-off {
                color: #d63638;
                font-weight: bold;
            }
            #wp-admin-bar-liftoff-maintenance .ab-label {
                margin-left: 5px;
            }
        </style>
        <script type="text/javascript">
            function liftoffToggleMaintenance() {
                if (typeof jQuery === 'undefined') return;
                
                var data = {
                    action: 'liftoff_toggle_maintenance',
                    nonce: '<?php echo wp_create_nonce('liftoff_admin_bar_nonce'); ?>'
                };
                
                jQuery.post(ajaxurl, data, function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Error: ' + (response.data || 'Unknown error'));
                    }
                });
            }
        </script>
        <?php
    }
}

// AJAX handlers
add_action('wp_ajax_liftoff_save_settings', 'liftoff_save_settings');
add_action('wp_ajax_liftoff_save_customize', 'liftoff_save_customize_callback');
add_action('wp_ajax_liftoff_save_advanced', 'liftoff_save_advanced_callback');
add_action('wp_ajax_liftoff_disable_maintenance', 'liftoff_disable_maintenance_callback');
add_action('wp_ajax_liftoff_postpone_countdown', 'liftoff_postpone_countdown_callback');
add_action('wp_ajax_liftoff_toggle_maintenance', 'liftoff_toggle_maintenance_callback');
add_action('wp_ajax_nopriv_liftoff_disable_maintenance', 'liftoff_disable_maintenance_callback');
add_action('wp_ajax_nopriv_liftoff_postpone_countdown', 'liftoff_postpone_countdown_callback');

function liftoff_save_settings() {
    check_ajax_referer('liftoff_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    
    $settings = array(
        'liftoff_maintenance_enabled' => sanitize_text_field($_POST['maintenance_enabled']),
        'liftoff_page_title' => sanitize_text_field($_POST['page_title']),
        'liftoff_page_heading' => sanitize_text_field($_POST['page_heading']),
        'liftoff_page_message' => sanitize_textarea_field($_POST['page_message']),
        'liftoff_launch_date' => sanitize_text_field($_POST['launch_date']),
        'liftoff_background_color' => sanitize_hex_color($_POST['background_color']),
        'liftoff_text_color' => sanitize_hex_color($_POST['text_color']),
        'liftoff_accent_color' => sanitize_hex_color($_POST['accent_color']),
        'liftoff_show_countdown' => sanitize_text_field($_POST['show_countdown'] ?? ''),
        'liftoff_countdown_text' => sanitize_text_field($_POST['countdown_text'] ?? 'Launching in:'),
        'liftoff_countdown_format' => sanitize_text_field($_POST['countdown_format'] ?? 'full'),
        'liftoff_custom_css_text' => sanitize_textarea_field($_POST['custom_css_text'] ?? ''),
        'liftoff_font_family' => sanitize_text_field($_POST['font_family'] ?? 'default'),
        'liftoff_show_logo' => sanitize_text_field($_POST['show_logo'] ?? ''),
        'liftoff_custom_logo' => absint($_POST['custom_logo'] ?? 0),
        'liftoff_logo_max_width' => absint($_POST['logo_max_width'] ?? 200),
        'liftoff_heading_font_size' => sanitize_text_field($_POST['liftoff_heading_font_size'] ?? '2.5'),
        'liftoff_heading_font_weight' => sanitize_text_field($_POST['liftoff_heading_font_weight'] ?? '600'),
        'liftoff_message_font_size' => sanitize_text_field($_POST['liftoff_message_font_size'] ?? '1.1'),
        'liftoff_text_align' => sanitize_text_field($_POST['liftoff_text_align'] ?? 'center'),
        'liftoff_countdown_style' => sanitize_text_field($_POST['liftoff_countdown_style'] ?? 'modern'),
        'liftoff_custom_css' => sanitize_textarea_field($_POST['liftoff_custom_css'] ?? '')
    );
    
    foreach ($settings as $key => $value) {
        update_option($key, $value);
    }
    
    wp_send_json_success(__('Settings saved successfully!', 'liftoff-maintenance'));
}

function liftoff_save_customize_callback() {
    check_ajax_referer('liftoff_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    // Parse form data
    parse_str($_POST['form_data'], $form_data);
    
    // Save color settings
    update_option('liftoff_background_color', sanitize_hex_color($form_data['background_color'] ?? '#1a1a1a'));
    update_option('liftoff_text_color', sanitize_hex_color($form_data['text_color'] ?? '#ffffff'));
    update_option('liftoff_accent_color', sanitize_hex_color($form_data['accent_color'] ?? '#007cba'));
    
    // Save text customization settings
    update_option('liftoff_heading_font_size', sanitize_text_field($form_data['heading_font_size'] ?? '48'));
    update_option('liftoff_heading_font_weight', sanitize_text_field($form_data['heading_font_weight'] ?? '700'));
    update_option('liftoff_message_font_size', sanitize_text_field($form_data['message_font_size'] ?? '18'));
    update_option('liftoff_text_align', sanitize_text_field($form_data['text_align'] ?? 'center'));
    update_option('liftoff_font_family', sanitize_text_field($form_data['font_family'] ?? 'default'));
    
    // Save countdown settings
    update_option('liftoff_show_countdown', isset($form_data['show_countdown']) ? '1' : '0');
    update_option('liftoff_countdown_text', sanitize_text_field($form_data['countdown_text'] ?? 'Launching in:'));
    update_option('liftoff_countdown_format', sanitize_text_field($form_data['countdown_format'] ?? 'full'));
    update_option('liftoff_countdown_style', sanitize_text_field($form_data['countdown_style'] ?? 'default'));
    update_option('liftoff_countdown_expiry_action', sanitize_text_field($form_data['countdown_expiry_action'] ?? 'nothing'));
    
    // Save logo settings
    update_option('liftoff_show_logo', isset($form_data['show_logo']) ? '1' : '0');
    update_option('liftoff_custom_logo', sanitize_text_field($form_data['custom_logo'] ?? ''));
    update_option('liftoff_logo_max_width', sanitize_text_field($form_data['logo_max_width'] ?? '200'));
    
    // Save progress bar settings
    update_option('liftoff_show_progress_bar', isset($form_data['show_progress_bar']) ? '1' : '0');
    update_option('liftoff_progress_bar_color', sanitize_hex_color($form_data['progress_bar_color'] ?? '#667eea'));
    update_option('liftoff_progress_bar_bg_color', sanitize_hex_color($form_data['progress_bar_bg_color'] ?? '#333333'));
    
    // Save social icons settings
    update_option('liftoff_show_social_icons', isset($form_data['show_social_icons']) ? '1' : '0');
    update_option('liftoff_facebook_url', esc_url_raw($form_data['facebook_url'] ?? ''));
    update_option('liftoff_twitter_url', esc_url_raw($form_data['twitter_url'] ?? ''));
    update_option('liftoff_instagram_url', esc_url_raw($form_data['instagram_url'] ?? ''));
    update_option('liftoff_linkedin_url', esc_url_raw($form_data['linkedin_url'] ?? ''));
    update_option('liftoff_youtube_url', esc_url_raw($form_data['youtube_url'] ?? ''));
    update_option('liftoff_email_address', sanitize_email($form_data['email_address'] ?? ''));
    
    // Save background media settings
    update_option('liftoff_background_type', sanitize_text_field($form_data['background_type'] ?? 'color'));
    update_option('liftoff_background_image', absint($form_data['background_image'] ?? 0));
    update_option('liftoff_background_size', sanitize_text_field($form_data['background_size'] ?? 'cover'));
    update_option('liftoff_background_position', sanitize_text_field($form_data['background_position'] ?? 'center center'));
    update_option('liftoff_background_overlay', sanitize_text_field($form_data['background_overlay'] ?? '0.3'));
    update_option('liftoff_background_video', absint($form_data['background_video'] ?? 0));
    update_option('liftoff_video_muted', isset($form_data['video_muted']) ? '1' : '0');
    update_option('liftoff_video_loop', isset($form_data['video_loop']) ? '1' : '0');
    update_option('liftoff_video_overlay', sanitize_text_field($form_data['video_overlay'] ?? '0.4'));
    
    // Save browser settings
    update_option('liftoff_custom_favicon', absint($form_data['custom_favicon'] ?? 0));
    update_option('liftoff_browser_tab_text', sanitize_text_field($form_data['browser_tab_text'] ?? ''));
    
    wp_send_json_success('Settings saved successfully');
}

// AJAX handler for saving advanced settings
function liftoff_save_advanced_callback() {
    check_ajax_referer('liftoff_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    // Parse form data
    parse_str($_POST['form_data'], $form_data);
    
    // Save access control settings
    update_option('liftoff_allowed_ips', sanitize_textarea_field($form_data['allowed_ips'] ?? ''));
    update_option('liftoff_allow_search_engines', isset($form_data['allow_search_engines']) ? '1' : '0');
    
    // Save custom code settings
    update_option('liftoff_custom_css', sanitize_textarea_field($form_data['custom_css'] ?? ''));
    update_option('liftoff_custom_js', sanitize_textarea_field($form_data['custom_js'] ?? ''));
    
    // Save browser settings
    update_option('liftoff_custom_favicon', absint($form_data['custom_favicon'] ?? 0));
    update_option('liftoff_browser_tab_text', sanitize_text_field($form_data['browser_tab_text'] ?? ''));
    
    // Save footer settings
    update_option('liftoff_show_footer', isset($form_data['show_footer']) ? '1' : '0');
    update_option('liftoff_footer_text', sanitize_text_field($form_data['footer_text'] ?? ''));
    update_option('liftoff_footer_link_url', esc_url_raw($form_data['footer_link_url'] ?? ''));
    update_option('liftoff_footer_link_text', sanitize_text_field($form_data['footer_link_text'] ?? ''));
    
    wp_send_json_success('Advanced settings saved successfully');
}

// AJAX handler for saving theme selection
function liftoff_save_theme_callback() {
    check_ajax_referer('liftoff_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    if (isset($_POST['theme'])) {
        update_option('liftoff_theme', sanitize_text_field($_POST['theme']));
        
        // Also save the theme colors if provided
        if (isset($_POST['background_color']) && !empty($_POST['background_color'])) {
            update_option('liftoff_background_color', sanitize_hex_color($_POST['background_color']));
        }
        if (isset($_POST['text_color']) && !empty($_POST['text_color'])) {
            update_option('liftoff_text_color', sanitize_hex_color($_POST['text_color']));
        }
        if (isset($_POST['accent_color']) && !empty($_POST['accent_color'])) {
            update_option('liftoff_accent_color', sanitize_hex_color($_POST['accent_color']));
        }
        
        wp_send_json_success('Theme saved successfully!');
    } else {
        wp_send_json_error('No theme specified.');
    }
}
add_action('wp_ajax_liftoff_save_theme', 'liftoff_save_theme_callback');

// Handle countdown expiry - disable maintenance mode
function liftoff_disable_maintenance_callback() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'liftoff_nonce')) {
        wp_die('Security check failed');
    }
    
    // Disable maintenance mode
    update_option('liftoff_maintenance_enabled', '0');
    
    wp_send_json_success('Maintenance mode disabled');
}

// Handle countdown postpone
function liftoff_postpone_countdown_callback() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'liftoff_nonce')) {
        wp_die('Security check failed');
    }
    
    $new_date = sanitize_text_field($_POST['new_date']);
    
    if (!empty($new_date) && is_numeric($new_date)) {
        // Convert timestamp to date format for storage
        $new_launch_date = date('Y-m-d H:i:s', intval($new_date));
        update_option('liftoff_launch_date', $new_launch_date);
        
        wp_send_json_success('Countdown postponed');
    } else {
        wp_send_json_error('Invalid date provided');
    }
}

// AJAX handler for admin bar toggle
function liftoff_toggle_maintenance_callback() {
    check_ajax_referer('liftoff_admin_bar_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized');
    }
    
    $current_status = get_option('liftoff_maintenance_enabled', false);
    $new_status = $current_status ? '0' : '1';
    
    update_option('liftoff_maintenance_enabled', $new_status);
    
    $status_text = $new_status === '1' ? 'enabled' : 'disabled';
    wp_send_json_success('Maintenance mode ' . $status_text);
}

// Initialize the plugin
new LiftOffMaintenance();
?>