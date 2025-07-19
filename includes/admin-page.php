<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get current settings
$maintenance_enabled = get_option('liftoff_maintenance_enabled', false);
$page_title = get_option('liftoff_page_title', 'Coming Soon');
$page_heading = get_option('liftoff_page_heading', 'We\'re launching soon');
$page_message = get_option('liftoff_page_message', 'Our website is under construction. We\'ll be here soon with our new awesome site.');
$launch_date = get_option('liftoff_launch_date', '');
$background_color = get_option('liftoff_background_color', '#1a1a1a');
$text_color = get_option('liftoff_text_color', '#ffffff');
$accent_color = get_option('liftoff_accent_color', '#007cba');
?>

<div class="wrap liftoff-admin">
    <div class="liftoff-header">
        <div class="liftoff-header-content">
            <div class="liftoff-logo">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <path d="M16 2L24 10V30H8V10L16 2Z" fill="#007cba"/>
                    <path d="M16 2L20 6V26H12V6L16 2Z" fill="#ffffff"/>
                </svg>
                <h1><?php _e('LiftOff Maintenance', 'liftoff-maintenance'); ?></h1>
            </div>
            <div class="liftoff-status">
                <span class="status-indicator <?php echo $maintenance_enabled ? 'active' : 'inactive'; ?>"></span>
                <span class="status-text">
                    <?php echo $maintenance_enabled ? __('Maintenance Mode Active', 'liftoff-maintenance') : __('Maintenance Mode Inactive', 'liftoff-maintenance'); ?>
                </span>
            </div>
        </div>
    </div>

    <div class="liftoff-tabs">
        <nav class="tab-nav">
            <button class="tab-button active" data-tab="general"><?php _e('General', 'liftoff-maintenance'); ?></button>
            <button class="tab-button" data-tab="customize"><?php _e('Customize', 'liftoff-maintenance'); ?></button>
            <button class="tab-button" data-tab="themes"><?php _e('Themes', 'liftoff-maintenance'); ?></button>
            <button class="tab-button" data-tab="advanced"><?php _e('Advanced', 'liftoff-maintenance'); ?></button>
        </nav>
    </div>

    <div class="liftoff-container">
        <div class="liftoff-main">
            <div class="liftoff-card tab-content active" id="general-tab">
                <div class="card-header">
                    <h2><?php _e('Settings', 'liftoff-maintenance'); ?></h2>
                    <p><?php _e('Configure your maintenance page settings', 'liftoff-maintenance'); ?></p>
                </div>
                
                <form id="liftoff-settings-form" class="liftoff-form">
                    <?php wp_nonce_field('liftoff_nonce', 'liftoff_nonce'); ?>
                    
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('General Settings', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="maintenance_enabled" value="1" <?php checked($maintenance_enabled, '1'); ?> class="checkbox-input">
                                <span class="checkbox-text"><?php _e('Enable Maintenance Mode', 'liftoff-maintenance'); ?></span>
                            </label>
                            <p class="form-description"><?php _e('When enabled, visitors will see the maintenance page instead of your website.', 'liftoff-maintenance'); ?></p>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Page Content', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="page_title"><?php _e('Page Title', 'liftoff-maintenance'); ?></label>
                                <input type="text" id="page_title" name="page_title" value="<?php echo esc_attr($page_title); ?>" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="page_heading"><?php _e('Main Heading', 'liftoff-maintenance'); ?></label>
                                <input type="text" id="page_heading" name="page_heading" value="<?php echo esc_attr($page_heading); ?>" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="page_message"><?php _e('Message', 'liftoff-maintenance'); ?></label>
                            <textarea id="page_message" name="page_message" rows="4" class="form-control"><?php echo esc_textarea($page_message); ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="launch_date"><?php _e('Launch Date (Optional)', 'liftoff-maintenance'); ?></label>
                            <input type="datetime-local" id="launch_date" name="launch_date" value="<?php echo esc_attr($launch_date); ?>" class="form-control">
                            <p class="form-description"><?php _e('Set a launch date to display a countdown timer.', 'liftoff-maintenance'); ?></p>
                        </div>
                    </div>



                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <span class="btn-text"><?php _e('Save Settings', 'liftoff-maintenance'); ?></span>
                            <span class="btn-spinner"></span>
                        </button>
                        
                        <a href="<?php echo home_url(); ?>" target="_blank" class="btn btn-secondary">
                            <?php _e('Preview Site', 'liftoff-maintenance'); ?>
                        </a>
                    </div>
                </form>
            </div>
            
            <div class="liftoff-card tab-content" id="customize-tab">
                <div class="card-header">
                    <h2><?php _e('Customize', 'liftoff-maintenance'); ?></h2>
                    <p><?php _e('Customize the appearance of your maintenance page', 'liftoff-maintenance'); ?></p>
                </div>
                
                <form id="liftoff-customize-form" class="liftoff-form">
                    <?php wp_nonce_field('liftoff_nonce', 'liftoff_nonce'); ?>
                    
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Design Settings', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-row color-row">
                            <div class="form-group">
                                <label for="background_color"><?php _e('Background Color', 'liftoff-maintenance'); ?></label>
                                <div class="color-input-wrapper">
                                    <input type="color" id="background_color" name="background_color" value="<?php echo esc_attr($background_color); ?>" class="color-input">
                                    <input type="text" value="<?php echo esc_attr($background_color); ?>" class="color-text form-control" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="text_color"><?php _e('Text Color', 'liftoff-maintenance'); ?></label>
                                <div class="color-input-wrapper">
                                    <input type="color" id="text_color" name="text_color" value="<?php echo esc_attr($text_color); ?>" class="color-input">
                                    <input type="text" value="<?php echo esc_attr($text_color); ?>" class="color-text form-control" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="accent_color"><?php _e('Accent Color', 'liftoff-maintenance'); ?></label>
                                <div class="color-input-wrapper">
                                    <input type="color" id="accent_color" name="accent_color" value="<?php echo esc_attr($accent_color); ?>" class="color-input">
                                    <input type="text" value="<?php echo esc_attr($accent_color); ?>" class="color-text form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Background Media', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-group">
                            <label for="background_type"><?php _e('Background Type', 'liftoff-maintenance'); ?></label>
                            <select id="background_type" name="background_type" class="form-control">
                                <option value="color" <?php selected(get_option('liftoff_background_type', 'color'), 'color'); ?>><?php _e('Color/Gradient (Theme)', 'liftoff-maintenance'); ?></option>
                                <option value="image" <?php selected(get_option('liftoff_background_type', 'color'), 'image'); ?>><?php _e('Custom Image', 'liftoff-maintenance'); ?></option>
                                <option value="video" <?php selected(get_option('liftoff_background_type', 'color'), 'video'); ?>><?php _e('Background Video', 'liftoff-maintenance'); ?></option>
                            </select>
                        </div>
                        
                        <div id="background-image-settings" style="display: <?php echo get_option('liftoff_background_type', 'color') === 'image' ? 'block' : 'none'; ?>;">
                            <div class="form-group">
                                <label for="background_image"><?php _e('Background Image', 'liftoff-maintenance'); ?></label>
                                <div class="media-upload-container">
                                    <input type="hidden" id="background_image" name="background_image" value="<?php echo esc_attr(get_option('liftoff_background_image', '')); ?>">
                                    <div class="media-preview" id="background-image-preview">
                                        <?php 
                                        $bg_image_id = get_option('liftoff_background_image', '');
                                        if ($bg_image_id) {
                                            $bg_image_url = wp_get_attachment_image_url($bg_image_id, 'medium');
                                            if ($bg_image_url) {
                                                echo '<img src="' . esc_url($bg_image_url) . '" alt="Background Preview">';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="media-buttons">
                                        <button type="button" class="btn btn-secondary" id="upload-background-image-btn"><?php _e('Select Image', 'liftoff-maintenance'); ?></button>
                                        <button type="button" class="btn btn-outline" id="remove-background-image-btn" style="<?php echo $bg_image_id ? '' : 'display:none;'; ?>"><?php _e('Remove', 'liftoff-maintenance'); ?></button>
                                    </div>
                                </div>
                                <p class="form-description"><?php _e('Upload a background image. Recommended: High resolution (1920x1080 or larger) for best quality.', 'liftoff-maintenance'); ?></p>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="background_size"><?php _e('Background Size', 'liftoff-maintenance'); ?></label>
                                    <select id="background_size" name="background_size" class="form-control">
                                        <option value="cover" <?php selected(get_option('liftoff_background_size', 'cover'), 'cover'); ?>><?php _e('Cover (Fill)', 'liftoff-maintenance'); ?></option>
                                        <option value="contain" <?php selected(get_option('liftoff_background_size', 'cover'), 'contain'); ?>><?php _e('Contain (Fit)', 'liftoff-maintenance'); ?></option>
                                        <option value="auto" <?php selected(get_option('liftoff_background_size', 'cover'), 'auto'); ?>><?php _e('Original Size', 'liftoff-maintenance'); ?></option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="background_position"><?php _e('Background Position', 'liftoff-maintenance'); ?></label>
                                    <select id="background_position" name="background_position" class="form-control">
                                        <option value="center center" <?php selected(get_option('liftoff_background_position', 'center center'), 'center center'); ?>><?php _e('Center', 'liftoff-maintenance'); ?></option>
                                        <option value="top center" <?php selected(get_option('liftoff_background_position', 'center center'), 'top center'); ?>><?php _e('Top', 'liftoff-maintenance'); ?></option>
                                        <option value="bottom center" <?php selected(get_option('liftoff_background_position', 'center center'), 'bottom center'); ?>><?php _e('Bottom', 'liftoff-maintenance'); ?></option>
                                        <option value="left center" <?php selected(get_option('liftoff_background_position', 'center center'), 'left center'); ?>><?php _e('Left', 'liftoff-maintenance'); ?></option>
                                        <option value="right center" <?php selected(get_option('liftoff_background_position', 'center center'), 'right center'); ?>><?php _e('Right', 'liftoff-maintenance'); ?></option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="background_overlay"><?php _e('Background Overlay Opacity', 'liftoff-maintenance'); ?></label>
                                <input type="range" id="background_overlay" name="background_overlay" value="<?php echo esc_attr(get_option('liftoff_background_overlay', '0.3')); ?>" min="0" max="1" step="0.1" class="form-control range-input">
                                <div class="range-value"><span id="overlay-value"><?php echo esc_attr(get_option('liftoff_background_overlay', '0.3')); ?></span></div>
                                <p class="form-description"><?php _e('Add a dark overlay to improve text readability over the background image.', 'liftoff-maintenance'); ?></p>
                            </div>
                        </div>
                        
                        <div id="background-video-settings" style="display: <?php echo get_option('liftoff_background_type', 'color') === 'video' ? 'block' : 'none'; ?>;">
                            <div class="form-group">
                                <label for="background_video"><?php _e('Background Video', 'liftoff-maintenance'); ?></label>
                                <div class="media-upload-container">
                                    <input type="hidden" id="background_video" name="background_video" value="<?php echo esc_attr(get_option('liftoff_background_video', '')); ?>">
                                    <div class="media-preview" id="background-video-preview">
                                        <?php 
                                        $bg_video_id = get_option('liftoff_background_video', '');
                                        if ($bg_video_id) {
                                            $bg_video_url = wp_get_attachment_url($bg_video_id);
                                            if ($bg_video_url) {
                                                echo '<video width="200" height="112" controls><source src="' . esc_url($bg_video_url) . '" type="video/mp4">Your browser does not support the video tag.</video>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="media-buttons">
                                        <button type="button" class="btn btn-secondary" id="upload-background-video-btn"><?php _e('Select Video', 'liftoff-maintenance'); ?></button>
                                        <button type="button" class="btn btn-outline" id="remove-background-video-btn" style="<?php echo $bg_video_id ? '' : 'display:none;'; ?>"><?php _e('Remove', 'liftoff-maintenance'); ?></button>
                                    </div>
                                </div>
                                <p class="form-description"><?php _e('Upload a background video (MP4 format recommended). Keep file size under 10MB for best performance.', 'liftoff-maintenance'); ?></p>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group checkbox-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" id="video_muted" name="video_muted" value="1" <?php checked(get_option('liftoff_video_muted', '1'), '1'); ?> class="checkbox-input">
                                        <span class="checkbox-text"><?php _e('Mute video (recommended)', 'liftoff-maintenance'); ?></span>
                                    </label>
                                </div>
                                
                                <div class="form-group checkbox-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" id="video_loop" name="video_loop" value="1" <?php checked(get_option('liftoff_video_loop', '1'), '1'); ?> class="checkbox-input">
                                        <span class="checkbox-text"><?php _e('Loop video', 'liftoff-maintenance'); ?></span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="video_overlay"><?php _e('Video Overlay Opacity', 'liftoff-maintenance'); ?></label>
                                <input type="range" id="video_overlay" name="video_overlay" value="<?php echo esc_attr(get_option('liftoff_video_overlay', '0.4')); ?>" min="0" max="1" step="0.1" class="form-control range-input">
                                <div class="range-value"><span id="video-overlay-value"><?php echo esc_attr(get_option('liftoff_video_overlay', '0.4')); ?></span></div>
                                <p class="form-description"><?php _e('Add a dark overlay to improve text readability over the background video.', 'liftoff-maintenance'); ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Countdown Timer', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="countdown-toggle" name="show_countdown" value="1" <?php checked(get_option('liftoff_show_countdown', '1'), '1'); ?> class="checkbox-input">
                                <span class="checkbox-text"><?php _e('Show countdown timer', 'liftoff-maintenance'); ?></span>
                            </label>
                        </div>
                        
                        <div id="countdown-settings" style="display: <?php echo get_option('liftoff_show_countdown', '1') === '1' ? 'block' : 'none'; ?>;">
                            <div class="form-group">
                                <label for="countdown_text"><?php _e('Countdown Label Text', 'liftoff-maintenance'); ?></label>
                                <input type="text" id="countdown_text" name="countdown_text" value="<?php echo esc_attr(get_option('liftoff_countdown_text', 'Launching in:')); ?>" placeholder="Launching in:" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="countdown_format"><?php _e('Countdown Format', 'liftoff-maintenance'); ?></label>
                                <select id="countdown_format" name="countdown_format" class="form-control">
                                    <option value="full" <?php selected(get_option('liftoff_countdown_format', 'full'), 'full'); ?>><?php _e('Days, Hours, Minutes, Seconds', 'liftoff-maintenance'); ?></option>
                                    <option value="compact" <?php selected(get_option('liftoff_countdown_format', 'full'), 'compact'); ?>><?php _e('DD:HH:MM:SS', 'liftoff-maintenance'); ?></option>
                                    <option value="days_only" <?php selected(get_option('liftoff_countdown_format', 'full'), 'days_only'); ?>><?php _e('Days Only', 'liftoff-maintenance'); ?></option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="countdown_style"><?php _e('Countdown Style', 'liftoff-maintenance'); ?></label>
                                <select id="countdown_style" name="countdown_style" class="form-control">
                                    <option value="default" <?php selected(get_option('liftoff_countdown_style', 'default'), 'default'); ?>><?php _e('Default', 'liftoff-maintenance'); ?></option>
                                    <option value="boxes" <?php selected(get_option('liftoff_countdown_style', 'default'), 'boxes'); ?>><?php _e('Boxes', 'liftoff-maintenance'); ?></option>
                                    <option value="circles" <?php selected(get_option('liftoff_countdown_style', 'default'), 'circles'); ?>><?php _e('Circles', 'liftoff-maintenance'); ?></option>
                                    <option value="minimal" <?php selected(get_option('liftoff_countdown_style', 'default'), 'minimal'); ?>><?php _e('Minimal', 'liftoff-maintenance'); ?></option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="countdown_expiry_action"><?php _e('When Countdown Reaches Zero', 'liftoff-maintenance'); ?></label>
                                <select id="countdown_expiry_action" name="countdown_expiry_action" class="form-control">
                                    <option value="nothing" <?php selected(get_option('liftoff_countdown_expiry_action', 'nothing'), 'nothing'); ?>><?php _e('Do Nothing', 'liftoff-maintenance'); ?></option>
                                    <option value="disable_maintenance" <?php selected(get_option('liftoff_countdown_expiry_action', 'nothing'), 'disable_maintenance'); ?>><?php _e('Disable Maintenance Mode', 'liftoff-maintenance'); ?></option>
                                    <option value="postpone_1hour" <?php selected(get_option('liftoff_countdown_expiry_action', 'nothing'), 'postpone_1hour'); ?>><?php _e('Postpone 1 Hour', 'liftoff-maintenance'); ?></option>
                                    <option value="postpone_6hours" <?php selected(get_option('liftoff_countdown_expiry_action', 'nothing'), 'postpone_6hours'); ?>><?php _e('Postpone 6 Hours', 'liftoff-maintenance'); ?></option>
                                    <option value="postpone_1day" <?php selected(get_option('liftoff_countdown_expiry_action', 'nothing'), 'postpone_1day'); ?>><?php _e('Postpone 1 Day', 'liftoff-maintenance'); ?></option>
                                    <option value="postpone_1week" <?php selected(get_option('liftoff_countdown_expiry_action', 'nothing'), 'postpone_1week'); ?>><?php _e('Postpone 1 Week', 'liftoff-maintenance'); ?></option>
                                </select>
                                <p class="form-description"><?php _e('Choose what happens automatically when the countdown timer reaches zero.', 'liftoff-maintenance'); ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Text Customization', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-group">
                            <label for="font_family"><?php _e('Font Family', 'liftoff-maintenance'); ?></label>
                            <select id="font_family" name="font_family" class="form-control">
                                <option value="default" <?php selected(get_option('liftoff_font_family', 'default'), 'default'); ?>><?php _e('Default (System)', 'liftoff-maintenance'); ?></option>
                                <option value="arial" <?php selected(get_option('liftoff_font_family', 'default'), 'arial'); ?>><?php _e('Arial', 'liftoff-maintenance'); ?></option>
                                <option value="helvetica" <?php selected(get_option('liftoff_font_family', 'default'), 'helvetica'); ?>><?php _e('Helvetica', 'liftoff-maintenance'); ?></option>
                                <option value="georgia" <?php selected(get_option('liftoff_font_family', 'default'), 'georgia'); ?>><?php _e('Georgia', 'liftoff-maintenance'); ?></option>
                                <option value="times" <?php selected(get_option('liftoff_font_family', 'default'), 'times'); ?>><?php _e('Times New Roman', 'liftoff-maintenance'); ?></option>
                                <option value="roboto" <?php selected(get_option('liftoff_font_family', 'default'), 'roboto'); ?>><?php _e('Roboto (Google Fonts)', 'liftoff-maintenance'); ?></option>
                                <option value="opensans" <?php selected(get_option('liftoff_font_family', 'default'), 'opensans'); ?>><?php _e('Open Sans (Google Fonts)', 'liftoff-maintenance'); ?></option>
                            </select>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="heading_font_size"><?php _e('Heading Font Size (px)', 'liftoff-maintenance'); ?></label>
                                <input type="number" id="heading_font_size" name="heading_font_size" value="<?php echo esc_attr(get_option('liftoff_heading_font_size', '48')); ?>" min="20" max="100" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="heading_font_weight"><?php _e('Heading Font Weight', 'liftoff-maintenance'); ?></label>
                                <select id="heading_font_weight" name="heading_font_weight" class="form-control">
                                    <option value="300" <?php selected(get_option('liftoff_heading_font_weight', '700'), '300'); ?>><?php _e('Light (300)', 'liftoff-maintenance'); ?></option>
                                    <option value="400" <?php selected(get_option('liftoff_heading_font_weight', '700'), '400'); ?>><?php _e('Normal (400)', 'liftoff-maintenance'); ?></option>
                                    <option value="500" <?php selected(get_option('liftoff_heading_font_weight', '700'), '500'); ?>><?php _e('Medium (500)', 'liftoff-maintenance'); ?></option>
                                    <option value="600" <?php selected(get_option('liftoff_heading_font_weight', '700'), '600'); ?>><?php _e('Semi-bold (600)', 'liftoff-maintenance'); ?></option>
                                    <option value="700" <?php selected(get_option('liftoff_heading_font_weight', '700'), '700'); ?>><?php _e('Bold (700)', 'liftoff-maintenance'); ?></option>
                                    <option value="800" <?php selected(get_option('liftoff_heading_font_weight', '700'), '800'); ?>><?php _e('Extra-bold (800)', 'liftoff-maintenance'); ?></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="message_font_size"><?php _e('Message Font Size (px)', 'liftoff-maintenance'); ?></label>
                                <input type="number" id="message_font_size" name="message_font_size" value="<?php echo esc_attr(get_option('liftoff_message_font_size', '18')); ?>" min="12" max="32" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="text_align"><?php _e('Text Alignment', 'liftoff-maintenance'); ?></label>
                                <select id="text_align" name="text_align" class="form-control">
                                    <option value="center" <?php selected(get_option('liftoff_text_align', 'center'), 'center'); ?>><?php _e('Center', 'liftoff-maintenance'); ?></option>
                                    <option value="left" <?php selected(get_option('liftoff_text_align', 'center'), 'left'); ?>><?php _e('Left', 'liftoff-maintenance'); ?></option>
                                    <option value="right" <?php selected(get_option('liftoff_text_align', 'center'), 'right'); ?>><?php _e('Right', 'liftoff-maintenance'); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Logo & Branding', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="logo-toggle" name="show_logo" value="1" <?php checked(get_option('liftoff_show_logo', '0'), '1'); ?> class="checkbox-input">
                                <span class="checkbox-text"><?php _e('Show logo/branding', 'liftoff-maintenance'); ?></span>
                            </label>
                        </div>
                        
                        <div id="logo-settings" style="display: <?php echo get_option('liftoff_show_logo', '0') === '1' ? 'block' : 'none'; ?>;">
                            <div class="form-group">
                                <label for="custom_logo"><?php _e('Custom Logo', 'liftoff-maintenance'); ?></label>
                                <div class="media-upload-container">
                                    <input type="hidden" id="custom_logo" name="custom_logo" value="<?php echo esc_attr(get_option('liftoff_custom_logo', '')); ?>">
                                    <div class="media-preview" id="logo-preview">
                                        <?php 
                                        $logo_id = get_option('liftoff_custom_logo', '');
                                        if ($logo_id) {
                                            $logo_url = wp_get_attachment_image_url($logo_id, 'medium');
                                            if ($logo_url) {
                                                echo '<img src="' . esc_url($logo_url) . '" alt="Logo Preview">';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="media-buttons">
                                        <button type="button" class="btn btn-secondary" id="upload-logo-btn"><?php _e('Select Logo', 'liftoff-maintenance'); ?></button>
                                        <button type="button" class="btn btn-outline" id="remove-logo-btn" style="<?php echo $logo_id ? '' : 'display:none;'; ?>"><?php _e('Remove', 'liftoff-maintenance'); ?></button>
                                    </div>
                                </div>
                                <p class="form-description"><?php _e('Upload a logo image from your WordPress media library. Recommended size: 200x80px or similar ratio.', 'liftoff-maintenance'); ?></p>
                            </div>
                            
                            <div class="form-group">
                                <label for="logo_max_width"><?php _e('Logo Max Width (px)', 'liftoff-maintenance'); ?></label>
                                <input type="number" id="logo_max_width" name="logo_max_width" value="<?php echo esc_attr(get_option('liftoff_logo_max_width', '200')); ?>" min="50" max="500" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Progress Bar', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="progress-bar-toggle" name="show_progress_bar" value="1" <?php checked(get_option('liftoff_show_progress_bar', '1'), '1'); ?> class="checkbox-input">
                                <span class="checkbox-text"><?php _e('Show progress bar (linked to countdown)', 'liftoff-maintenance'); ?></span>
                            </label>
                        </div>
                        
                        <div id="progress-bar-settings" style="display: <?php echo get_option('liftoff_show_progress_bar', '1') === '1' ? 'block' : 'none'; ?>;">
                            <div class="form-group">
                                <label for="progress_bar_color"><?php _e('Progress Bar Color', 'liftoff-maintenance'); ?></label>
                                <input type="color" id="progress_bar_color" name="progress_bar_color" value="<?php echo esc_attr(get_option('liftoff_progress_bar_color', '#667eea')); ?>" class="form-control color-picker">
                            </div>
                            
                            <div class="form-group">
                                <label for="progress_bar_bg_color"><?php _e('Progress Bar Background Color', 'liftoff-maintenance'); ?></label>
                                <input type="color" id="progress_bar_bg_color" name="progress_bar_bg_color" value="<?php echo esc_attr(get_option('liftoff_progress_bar_bg_color', '#333333')); ?>" class="form-control color-picker">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Social Icons', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="social-icons-toggle" name="show_social_icons" value="1" <?php checked(get_option('liftoff_show_social_icons', '1'), '1'); ?> class="checkbox-input">
                                <span class="checkbox-text"><?php _e('Show social media icons', 'liftoff-maintenance'); ?></span>
                            </label>
                        </div>
                        
                        <div id="social-icons-settings" style="display: <?php echo get_option('liftoff_show_social_icons', '1') === '1' ? 'block' : 'none'; ?>;">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="facebook_url"><?php _e('Facebook URL', 'liftoff-maintenance'); ?></label>
                                    <input type="url" id="facebook_url" name="facebook_url" value="<?php echo esc_attr(get_option('liftoff_facebook_url', '')); ?>" placeholder="https://facebook.com/yourpage" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="twitter_url"><?php _e('Twitter URL', 'liftoff-maintenance'); ?></label>
                                    <input type="url" id="twitter_url" name="twitter_url" value="<?php echo esc_attr(get_option('liftoff_twitter_url', '')); ?>" placeholder="https://twitter.com/youraccount" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="instagram_url"><?php _e('Instagram URL', 'liftoff-maintenance'); ?></label>
                                    <input type="url" id="instagram_url" name="instagram_url" value="<?php echo esc_attr(get_option('liftoff_instagram_url', '')); ?>" placeholder="https://instagram.com/youraccount" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="linkedin_url"><?php _e('LinkedIn URL', 'liftoff-maintenance'); ?></label>
                                    <input type="url" id="linkedin_url" name="linkedin_url" value="<?php echo esc_attr(get_option('liftoff_linkedin_url', '')); ?>" placeholder="https://linkedin.com/in/yourprofile" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="youtube_url"><?php _e('YouTube URL', 'liftoff-maintenance'); ?></label>
                                    <input type="url" id="youtube_url" name="youtube_url" value="<?php echo esc_attr(get_option('liftoff_youtube_url', '')); ?>" placeholder="https://youtube.com/yourchannel" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="email_address"><?php _e('Email Address', 'liftoff-maintenance'); ?></label>
                                    <input type="email" id="email_address" name="email_address" value="<?php echo esc_attr(get_option('liftoff_email_address', '')); ?>" placeholder="contact@yoursite.com" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <span class="btn-text"><?php _e('Save Customization', 'liftoff-maintenance'); ?></span>
                            <span class="btn-spinner"></span>
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="liftoff-card tab-content" id="themes-tab">
                <div class="card-header">
                    <h2><?php _e('Themes', 'liftoff-maintenance'); ?></h2>
                    <p><?php _e('Choose from pre-designed themes for your maintenance page', 'liftoff-maintenance'); ?></p>
                </div>
                
                <div class="liftoff-form">
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Theme Selection', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="theme-categories">
                            <div class="category-tabs">
                                <button class="category-tab active" data-category="static"><?php _e('Static Themes', 'liftoff-maintenance'); ?></button>
                                <button class="category-tab" data-category="animated"><?php _e('Animated Themes', 'liftoff-maintenance'); ?></button>
                            </div>
                            
                            <div class="theme-grid" id="static-themes">
                                <!-- Static Themes -->
                                <div class="theme-option active" data-theme="dark-professional">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);"></div>
                                    </div>
                                    <h4><?php _e('Dark Professional', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Clean dark theme with professional styling', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="light-minimal">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);"></div>
                                    </div>
                                    <h4><?php _e('Light Minimal', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Bright and clean minimal design', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="gradient-blue">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                                    </div>
                                    <h4><?php _e('Gradient Blue', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Modern gradient background with blue tones', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="sunset-orange">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #ff7e5f 0%, #feb47b 100%);"></div>
                                    </div>
                                    <h4><?php _e('Sunset Orange', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Warm sunset gradient with orange tones', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="ocean-teal">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);"></div>
                                    </div>
                                    <h4><?php _e('Ocean Teal', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Fresh ocean-inspired teal gradient', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="purple-rain">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #8360c3 0%, #2ebf91 100%);"></div>
                                    </div>
                                    <h4><?php _e('Purple Rain', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Vibrant purple to green gradient', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="midnight-city">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #232526 0%, #414345 100%);"></div>
                                    </div>
                                    <h4><?php _e('Midnight City', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Dark urban-inspired gradient theme', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="forest-green">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #134e5e 0%, #71b280 100%);"></div>
                                    </div>
                                    <h4><?php _e('Forest Green', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Natural forest-inspired green gradient', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="cherry-blossom">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);"></div>
                                    </div>
                                    <h4><?php _e('Cherry Blossom', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Soft pink and peach gradient theme', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="royal-blue">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);"></div>
                                    </div>
                                    <h4><?php _e('Royal Blue', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Deep royal blue gradient theme', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="cosmic-purple">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #667db6 0%, #0082c8 100%);"></div>
                                    </div>
                                    <h4><?php _e('Cosmic Purple', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Space-inspired purple to blue gradient', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="golden-hour">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);"></div>
                                    </div>
                                    <h4><?php _e('Golden Hour', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Warm golden hour pink gradient', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="arctic-blue">
                                    <div class="theme-preview">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);"></div>
                                    </div>
                                    <h4><?php _e('Arctic Blue', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Cool arctic-inspired blue gradient', 'liftoff-maintenance'); ?></p>
                                </div>
                            </div>
                            
                            <div class="theme-grid" id="animated-themes" style="display: none;">
                                <!-- Animated Themes -->
                                <div class="theme-option" data-theme="floating-particles">
                                    <div class="theme-preview animated">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); position: relative;">
                                            <div class="particles"></div>
                                        </div>
                                    </div>
                                    <h4><?php _e('Floating Particles', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Dark theme with floating particle animation', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="wave-motion">
                                    <div class="theme-preview animated">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); position: relative;">
                                            <div class="waves"></div>
                                        </div>
                                    </div>
                                    <h4><?php _e('Wave Motion', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Gradient background with animated waves', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="matrix-rain">
                                    <div class="theme-preview animated">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 100%); position: relative;">
                                            <div class="matrix-effect"></div>
                                        </div>
                                    </div>
                                    <h4><?php _e('Matrix Rain', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Dark theme with matrix-style falling code', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="aurora-lights">
                                    <div class="theme-preview animated">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); position: relative;">
                                            <div class="aurora"></div>
                                        </div>
                                    </div>
                                    <h4><?php _e('Aurora Lights', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Dark theme with animated aurora borealis effect', 'liftoff-maintenance'); ?></p>
                                </div>
                                
                                <div class="theme-option" data-theme="geometric-shapes">
                                    <div class="theme-preview animated">
                                        <div class="theme-bg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); position: relative;">
                                            <div class="geometric-animation"></div>
                                        </div>
                                    </div>
                                    <h4><?php _e('Geometric Shapes', 'liftoff-maintenance'); ?></h4>
                                    <p><?php _e('Modern theme with animated geometric patterns', 'liftoff-maintenance'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="liftoff-card tab-content" id="advanced-tab">
                <div class="card-header">
                    <h2><?php _e('Advanced', 'liftoff-maintenance'); ?></h2>
                    <p><?php _e('Advanced settings and configurations', 'liftoff-maintenance'); ?></p>
                </div>
                
                <form id="liftoff-advanced-form" class="liftoff-form">
                    <?php wp_nonce_field('liftoff_nonce', 'liftoff_nonce'); ?>
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Access Control', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-group">
                            <label for="allowed_ips"><?php _e('Allowed IP Addresses', 'liftoff-maintenance'); ?></label>
                            <textarea id="allowed_ips" name="allowed_ips" rows="3" class="form-control" placeholder="192.168.1.1\n10.0.0.1"></textarea>
                            <p class="form-description"><?php _e('Enter IP addresses that can bypass maintenance mode, one per line.', 'liftoff-maintenance'); ?></p>
                        </div>
                        
                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="search_engine_access" value="1" class="checkbox-input">
                                <span class="checkbox-text"><?php _e('Allow Search Engine Access', 'liftoff-maintenance'); ?></span>
                            </label>
                            <p class="form-description"><?php _e('Allow search engines to crawl your site during maintenance.', 'liftoff-maintenance'); ?></p>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Custom Code', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-group">
                            <label for="custom_css"><?php _e('Custom CSS', 'liftoff-maintenance'); ?></label>
                            <textarea id="custom_css" name="custom_css" rows="6" class="form-control code-editor" placeholder="/* Add your custom CSS here */"><?php echo esc_textarea(get_option('liftoff_custom_css', '')); ?></textarea>
                            <p class="form-description"><?php _e('Add custom CSS to style your maintenance page. Target classes: .maintenance-heading, .maintenance-message, .countdown-timer', 'liftoff-maintenance'); ?></p>
                        </div>
                        
                        <div class="form-group">
                            <label for="custom_js"><?php _e('Custom JavaScript', 'liftoff-maintenance'); ?></label>
                            <textarea id="custom_js" name="custom_js" rows="6" class="form-control code-editor" placeholder="// Add your custom JavaScript here"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Browser Settings', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-group">
                            <label for="custom_favicon"><?php _e('Custom Favicon', 'liftoff-maintenance'); ?></label>
                            <div class="media-upload-container">
                                <input type="hidden" id="custom_favicon" name="custom_favicon" value="<?php echo esc_attr(get_option('liftoff_custom_favicon', '')); ?>">
                                <div class="media-preview" id="favicon-preview">
                                    <?php 
                                    $favicon_id = get_option('liftoff_custom_favicon', '');
                                    if ($favicon_id) {
                                        $favicon_url = wp_get_attachment_image_url($favicon_id, 'thumbnail');
                                        if ($favicon_url) {
                                            echo '<img src="' . esc_url($favicon_url) . '" alt="Favicon Preview" style="max-width: 32px; max-height: 32px;">';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="media-buttons">
                                    <button type="button" class="btn btn-secondary" id="upload-favicon-btn"><?php _e('Select Favicon', 'liftoff-maintenance'); ?></button>
                                    <button type="button" class="btn btn-outline" id="remove-favicon-btn" style="<?php echo $favicon_id ? '' : 'display:none;'; ?>"><?php _e('Remove', 'liftoff-maintenance'); ?></button>
                                </div>
                            </div>
                            <p class="form-description"><?php _e('Upload a favicon image (ICO, PNG, or JPG). Recommended size: 32x32px or 16x16px.', 'liftoff-maintenance'); ?></p>
                        </div>
                        
                        <div class="form-group">
                            <label for="browser_tab_text"><?php _e('Browser Tab Text', 'liftoff-maintenance'); ?></label>
                            <input type="text" id="browser_tab_text" name="browser_tab_text" value="<?php echo esc_attr(get_option('liftoff_browser_tab_text', '')); ?>" placeholder="<?php _e('Custom text for browser tab', 'liftoff-maintenance'); ?>" class="form-control">
                            <p class="form-description"><?php _e('Custom text to display in the browser tab. Leave empty to use the page title.', 'liftoff-maintenance'); ?></p>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <div class="section-header">
                            <h3><?php _e('Footer Settings', 'liftoff-maintenance'); ?></h3>
                        </div>
                        
                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="show_footer" value="1" <?php checked(get_option('liftoff_show_footer', '1'), '1'); ?> class="checkbox-input">
                                <span class="checkbox-text"><?php _e('Show Footer', 'liftoff-maintenance'); ?></span>
                            </label>
                            <p class="form-description"><?php _e('Display a footer at the bottom of the maintenance page.', 'liftoff-maintenance'); ?></p>
                        </div>
                        
                        <div class="form-group">
                            <label for="footer_text"><?php _e('Footer Text', 'liftoff-maintenance'); ?></label>
                            <input type="text" id="footer_text" name="footer_text" value="<?php echo esc_attr(get_option('liftoff_footer_text', '© 2024 Made with ❤️ by Resillio')); ?>" class="form-control">
                            <p class="form-description"><?php _e('Customize the footer text. You can use HTML for links and formatting.', 'liftoff-maintenance'); ?></p>
                        </div>
                        
                        <div class="form-group">
                            <label for="footer_link_url"><?php _e('Footer Link URL', 'liftoff-maintenance'); ?></label>
                            <input type="url" id="footer_link_url" name="footer_link_url" value="<?php echo esc_attr(get_option('liftoff_footer_link_url', 'https://www.fiverr.com/sellers/thboundlessmind/edit')); ?>" placeholder="https://example.com" class="form-control">
                            <p class="form-description"><?php _e('URL to link when clicking on "Resillio" in the footer text.', 'liftoff-maintenance'); ?></p>
                        </div>
                        
                        <div class="form-group">
                            <label for="footer_link_text"><?php _e('Footer Link Text', 'liftoff-maintenance'); ?></label>
                            <input type="text" id="footer_link_text" name="footer_link_text" value="<?php echo esc_attr(get_option('liftoff_footer_link_text', 'Resillio')); ?>" class="form-control">
                            <p class="form-description"><?php _e('Text to display as the clickable link in the footer.', 'liftoff-maintenance'); ?></p>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <span class="btn-text"><?php _e('Save Advanced Settings', 'liftoff-maintenance'); ?></span>
                            <span class="btn-spinner"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="liftoff-sidebar">
            <div class="liftoff-card">
                <div class="card-header">
                    <h3><?php _e('Quick Actions', 'liftoff-maintenance'); ?></h3>
                </div>
                
                <div class="quick-actions">
                    <button type="button" class="quick-action" id="toggle-maintenance">
                        <span class="action-icon">
                            <?php if ($maintenance_enabled): ?>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 2L3 7v11h14V7l-7-5z"/>
                                </svg>
                            <?php else: ?>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 2L3 7v11h14V7l-7-5z" opacity="0.5"/>
                                </svg>
                            <?php endif; ?>
                        </span>
                        <span class="action-text">
                            <?php echo $maintenance_enabled ? __('Disable Maintenance', 'liftoff-maintenance') : __('Enable Maintenance', 'liftoff-maintenance'); ?>
                        </span>
                    </button>
                </div>
            </div>
            
            <div class="liftoff-card">
                <div class="card-header">
                    <h3><?php _e('Support', 'liftoff-maintenance'); ?></h3>
                </div>
                
                <div class="support-content">
                    <p><?php _e('Need help? Check out our documentation or contact support.', 'liftoff-maintenance'); ?></p>
                    <a href="#" class="support-link"><?php _e('Documentation', 'liftoff-maintenance'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="liftoff-notification" class="liftoff-notification">
    <div class="notification-content">
        <span class="notification-icon"></span>
        <span class="notification-message"></span>
    </div>
</div>