<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get plugin settings
$page_title = get_option('liftoff_page_title', 'Maintenance Mode');
$heading = get_option('liftoff_heading', 'We\'ll be back soon!');
$message = get_option('liftoff_message', 'We\'re currently performing scheduled maintenance. Please check back later.');
$launch_date = get_option('liftoff_launch_date', '');
$show_countdown = get_option('liftoff_show_countdown', '1');
$countdown_text = get_option('liftoff_countdown_text', 'Launching in:');
$countdown_format = get_option('liftoff_countdown_format', 'full');
$custom_css_text = get_option('liftoff_custom_css_text', '');
$font_family = get_option('liftoff_font_family', 'default');
$show_logo = get_option('liftoff_show_logo', '0');
$custom_logo = get_option('liftoff_custom_logo', '');
$logo_max_width = get_option('liftoff_logo_max_width', '200');

// Progress bar settings
$show_progress_bar = get_option('liftoff_show_progress_bar', '1');
$progress_bar_color = get_option('liftoff_progress_bar_color', '#667eea');
$progress_bar_bg_color = get_option('liftoff_progress_bar_bg_color', '#333333');

// Social icons settings
$show_social_icons = get_option('liftoff_show_social_icons', '1');
$facebook_url = get_option('liftoff_facebook_url', '');
$twitter_url = get_option('liftoff_twitter_url', '');
$instagram_url = get_option('liftoff_instagram_url', '');
$linkedin_url = get_option('liftoff_linkedin_url', '');
$youtube_url = get_option('liftoff_youtube_url', '');
$email_address = get_option('liftoff_email_address', '');

// Footer settings
$show_footer = get_option('liftoff_show_footer', '1');
$footer_text = get_option('liftoff_footer_text', '© 2024 Made with ❤️ by Resillio');
$footer_link_url = get_option('liftoff_footer_link_url', 'https://www.fiverr.com/sellers/thboundlessmind/edit');
$footer_link_text = get_option('liftoff_footer_link_text', 'Resillio');

// Browser settings
$custom_favicon = get_option('liftoff_custom_favicon', '');
$browser_tab_text = get_option('liftoff_browser_tab_text', '');

// Background media settings
$background_type = get_option('liftoff_background_type', 'color');
$background_image = get_option('liftoff_background_image', '');
$background_size = get_option('liftoff_background_size', 'cover');
$background_position = get_option('liftoff_background_position', 'center center');
$background_overlay = get_option('liftoff_background_overlay', '0.3');
$background_video = get_option('liftoff_background_video', '');
$video_muted = get_option('liftoff_video_muted', '1');
$video_loop = get_option('liftoff_video_loop', '1');
$video_overlay = get_option('liftoff_video_overlay', '0.4');

// Text customization settings
$heading_font_size = get_option('liftoff_heading_font_size', '48');
$heading_font_weight = get_option('liftoff_heading_font_weight', '700');
$message_font_size = get_option('liftoff_message_font_size', '18');
$text_align = get_option('liftoff_text_align', 'center');

// Countdown style
$countdown_style = get_option('liftoff_countdown_style', 'default');

// Get selected theme
$selected_theme = get_option('liftoff_theme', 'dark-professional');

// Get individual color settings (these should override theme colors when customized)
$custom_background_color = get_option('liftoff_background_color', '');
$custom_text_color = get_option('liftoff_text_color', '');
$custom_accent_color = get_option('liftoff_accent_color', '');

// Theme styles
$theme_styles = [
    'dark-professional' => [
        'background' => 'linear-gradient(135deg, #1e3c72 0%, #2a5298 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#4CAF50'
    ],
    'light-minimal' => [
        'background' => 'linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%)',
        'text_color' => '#333333',
        'accent_color' => '#007cba'
    ],
    'gradient-blue' => [
        'background' => 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#FFD700'
    ],
    'sunset-orange' => [
        'background' => 'linear-gradient(135deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%)',
        'text_color' => '#2c3e50',
        'accent_color' => '#e74c3c'
    ],
    'ocean-teal' => [
        'background' => 'linear-gradient(135deg, #2E8B57 0%, #48D1CC 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#20B2AA'
    ],
    'purple-rain' => [
        'background' => 'linear-gradient(135deg, #8360c3 0%, #2ebf91 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#f39c12'
    ],
    'midnight-city' => [
        'background' => 'linear-gradient(135deg, #232526 0%, #414345 100%)',
        'text_color' => '#ecf0f1',
        'accent_color' => '#3498db'
    ],
    'forest-green' => [
        'background' => 'linear-gradient(135deg, #134e5e 0%, #71b280 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#27ae60'
    ],
    'cherry-blossom' => [
        'background' => 'linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%)',
        'text_color' => '#2c3e50',
        'accent_color' => '#e91e63'
    ],
    'royal-blue' => [
        'background' => 'linear-gradient(135deg, #1e3c72 0%, #2a5298 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#f1c40f'
    ],
    'cosmic-purple' => [
        'background' => 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#e74c3c'
    ],
    'golden-hour' => [
        'background' => 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#ffd700'
    ],
    'arctic-blue' => [
        'background' => 'linear-gradient(135deg, #74b9ff 0%, #0984e3 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#00cec9'
    ],
    'floating-particles' => [
        'background' => 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#FFD700',
        'animated' => true
    ],
    'wave-motion' => [
        'background' => 'linear-gradient(135deg, #2E8B57 0%, #48D1CC 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#20B2AA',
        'animated' => true
    ],
    'matrix-rain' => [
        'background' => 'linear-gradient(135deg, #0f0f23 0%, #1a1a2e 100%)',
        'text_color' => '#00ff00',
        'accent_color' => '#00ff00',
        'animated' => true
    ],
    'aurora-lights' => [
        'background' => 'linear-gradient(135deg, #232526 0%, #414345 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#00ff96',
        'animated' => true
    ],
    'geometric-shapes' => [
        'background' => 'linear-gradient(135deg, #1e3c72 0%, #2a5298 100%)',
        'text_color' => '#ffffff',
        'accent_color' => '#f39c12',
        'animated' => true
    ]
];

// Apply theme colors first, then override with custom colors if they exist
$current_theme = isset($theme_styles[$selected_theme]) ? $theme_styles[$selected_theme] : null;
if ($current_theme) {
    $background_color = $current_theme['background'];
    $text_color = $current_theme['text_color'];
    $accent_color = $current_theme['accent_color'];
} else {
    // Fallback defaults if no theme
    $background_color = '#1a1a1a';
    $text_color = '#ffffff';
    $accent_color = '#007cba';
}

// Override with custom colors if they have been set
if (!empty($custom_background_color)) {
    $background_color = $custom_background_color;
}
if (!empty($custom_text_color)) {
    $text_color = $custom_text_color;
}
if (!empty($custom_accent_color)) {
    $accent_color = $custom_accent_color;
}

// Custom CSS
$custom_css = get_option('liftoff_custom_css', '');

// Font family mapping
$font_families = array(
    'default' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif',
    'arial' => 'Arial, sans-serif',
    'helvetica' => 'Helvetica, Arial, sans-serif',
    'georgia' => 'Georgia, serif',
    'times' => '"Times New Roman", Times, serif',
    'roboto' => '"Roboto", sans-serif',
    'opensans' => '"Open Sans", sans-serif'
);
$selected_font = $font_families[$font_family] ?? $font_families['default'];

// Calculate if we should show countdown
$show_countdown = !empty($launch_date) && strtotime($launch_date) > time();
$launch_timestamp = $show_countdown ? strtotime($launch_date) : 0;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title><?php echo esc_html(!empty($browser_tab_text) ? $browser_tab_text : $page_title . ' - ' . get_bloginfo('name')); ?></title>
    
    <?php if (!empty($custom_favicon)): ?>
        <?php $favicon_url = wp_get_attachment_image_url($custom_favicon, 'full'); ?>
        <?php if ($favicon_url): ?>
    <link rel="icon" type="image/x-icon" href="<?php echo esc_url($favicon_url); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url($favicon_url); ?>">
        <?php endif; ?>
    <?php endif; ?>
    
    <!-- Preload critical resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php if ($font_family === 'roboto'): ?>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <?php elseif ($font_family === 'opensans'): ?>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php else: ?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php endif; ?>
    
    <style>
        :root {
            --bg-color: <?php echo esc_attr($background_color); ?>;
            --text-color: <?php echo esc_attr($text_color); ?>;
            --accent-color: <?php echo esc_attr($accent_color); ?>;
            --accent-rgb: <?php echo implode(', ', sscanf($accent_color, '#%02x%02x%02x')); ?>;
            <?php if ($background_type === 'image' && !empty($background_image)): ?>
            --overlay-opacity: <?php echo esc_attr($background_overlay); ?>;
            <?php elseif ($background_type === 'video' && !empty($background_video)): ?>
            --overlay-opacity: <?php echo esc_attr($video_overlay); ?>;
            <?php endif; ?>
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: <?php echo esc_attr($selected_font); ?>;
            <?php if ($background_type === 'image' && !empty($background_image)): ?>
                <?php $bg_image_url = wp_get_attachment_image_url($background_image, 'full'); ?>
                <?php if ($bg_image_url): ?>
            background-image: url('<?php echo esc_url($bg_image_url); ?>');
            background-size: <?php echo esc_attr($background_size); ?>;
            background-position: <?php echo esc_attr($background_position); ?>;
            background-repeat: no-repeat;
            background-attachment: fixed;
                <?php endif; ?>
            <?php elseif ($background_type === 'video'): ?>
            background: #000;
            <?php elseif ($current_theme): ?>
            background: <?php echo esc_attr($background_color); ?>;
            <?php else: ?>
            background: var(--bg-color);
            <?php endif; ?>
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Background video styles */
        .background-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -2;
        }
        
        /* Background overlay */
        .background-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, var(--overlay-opacity));
            z-index: -1;
        }
        
        .maintenance-container {
            text-align: center;
            max-width: 600px;
            width: 100%;
            position: relative;
            z-index: 2;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .logo {
            margin-bottom: 40px;
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards;
        }
        
        .logo svg {
            width: 80px;
            height: 80px;
            filter: drop-shadow(0 4px 12px rgba(var(--accent-rgb), 0.3));
        }
        
        .main-heading {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.1;
            opacity: 0;
            animation: fadeInUp 0.8s ease 0.2s forwards;
            background: linear-gradient(135deg, var(--text-color) 0%, rgba(var(--accent-rgb), 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .main-message {
            font-size: 1.25rem;
            font-weight: 400;
            line-height: 1.6;
            margin-bottom: 40px;
            opacity: 0.9;
            opacity: 0;
            animation: fadeInUp 0.8s ease 0.4s forwards;
        }
        
        .countdown-container {
            margin-bottom: 40px;
            opacity: 0;
            animation: fadeInUp 0.8s ease 0.6s forwards;
        }
        
        .countdown-container .countdown-label {
            font-size: 1.1rem;
            margin-bottom: 20px;
            opacity: 0.9;
            font-weight: 500;
        }
        
        .countdown {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        
        .countdown-item {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 20px 16px;
            min-width: 80px;
            position: relative;
            overflow: hidden;
        }
        
        .countdown-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--accent-color), transparent);
            animation: shimmer 2s infinite;
        }
        
        .countdown-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--accent-color);
            display: block;
            line-height: 1;
        }
        
        .countdown-item .countdown-label {
            font-size: 0.875rem;
            font-weight: 500;
            opacity: 0.8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 8px;
        }
        
        .countdown-compact {
            font-size: 3rem;
            font-weight: 700;
            color: var(--accent-color);
            font-family: 'Courier New', monospace;
            letter-spacing: 2px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 20px 30px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .countdown-days-only {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 30px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .countdown-days-only .countdown-number {
            font-size: 4rem;
            margin-bottom: 10px;
        }
        
        .countdown-days-only .countdown-label {
             font-size: 1.2rem;
         }
         
         /* Logo Styles */
         .maintenance-logo {
             margin-bottom: 30px;
             text-align: center;
         }
         
         .maintenance-logo img {
             max-width: <?php echo esc_attr($logo_max_width); ?>px;
             height: auto;
             display: block;
             margin: 0 auto;
         }
         
         /* Text Customization */
         .maintenance-heading {
             font-size: <?php echo esc_attr($heading_font_size); ?>px;
             font-weight: <?php echo esc_attr($heading_font_weight); ?>;
             text-align: <?php echo esc_attr($text_align); ?>;
             <?php if ($font_family !== 'default'): ?>
             font-family: <?php echo esc_attr($selected_font); ?>;
             <?php endif; ?>
         }
         
         .maintenance-message {
             font-size: <?php echo esc_attr($message_font_size); ?>px;
             text-align: <?php echo esc_attr($text_align); ?>;
             <?php if ($font_family !== 'default'): ?>
             font-family: <?php echo esc_attr($selected_font); ?>;
             <?php endif; ?>
         }
         
         /* Countdown Styles */
         .countdown-timer.style-boxes .countdown-item {
             background: rgba(255, 255, 255, 0.1);
             border: 2px solid var(--accent-color);
             border-radius: 8px;
             padding: 15px 10px;
             margin: 0 5px;
             min-width: 80px;
         }
         
         .countdown-timer.style-circles .countdown-item {
             background: rgba(255, 255, 255, 0.1);
             border: 2px solid var(--accent-color);
             border-radius: 50%;
             padding: 20px;
             margin: 0 10px;
             width: 100px;
             height: 100px;
             display: flex;
             flex-direction: column;
             justify-content: center;
             align-items: center;
         }
         
         .countdown-timer.style-minimal .countdown-item {
             background: none;
             border: none;
             border-bottom: 2px solid var(--accent-color);
             padding: 10px 5px;
             margin: 0 10px;
             min-width: 60px;
         }
         
         .countdown-timer.style-minimal .countdown-number {
             font-weight: 300;
         }
         
         .countdown-timer.style-minimal .countdown-label {
             font-size: 12px;
             text-transform: uppercase;
             letter-spacing: 1px;
         }
         
         .progress-bar {
            width: 100%;
            height: 4px;
            background: <?php echo esc_attr($progress_bar_bg_color); ?>;
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 40px;
            opacity: 0;
            animation: fadeInUp 0.8s ease 0.8s forwards;
        }
        
        .progress-fill {
             height: 100%;
             background: <?php echo esc_attr($progress_bar_color); ?>;
             border-radius: 2px;
             width: 0%;
             transition: width 1s ease;
         }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 16px;
            opacity: 0;
            animation: fadeInUp 0.8s ease 1s forwards;
        }
        
        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--text-color);
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .social-link:hover {
            background: var(--accent-color);
            border-color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(var(--accent-rgb), 0.3);
        }
        
        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 0.1;
        }
        
        /* Footer Styles */
        .maintenance-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            padding: 20px;
            z-index: 10;
        }
        
        .footer-content {
            color: <?php echo esc_attr($text_color); ?>;
            font-size: 14px;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }
        
        .footer-content:hover {
            opacity: 1;
        }
        
        .footer-content a {
            color: <?php echo esc_attr($accent_color); ?>;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-content a:hover {
            color: <?php echo esc_attr($text_color); ?>;
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .maintenance-footer {
                padding: 10px;
            }
            
            .footer-content {
                font-size: 12px;
            }
        }
        

        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes progressAnimation {
            to {
                width: 65%;
            }
        }
        
        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }
        

        
        @media (max-width: 768px) {
            .countdown {
                gap: 12px;
            }
            
            .countdown-item {
                padding: 16px 12px;
                min-width: 70px;
            }
            
            .countdown-number {
                font-size: 1.5rem;
            }
            
            .main-message {
                font-size: 1.125rem;
            }
        }
        
        @media (max-width: 480px) {
            .countdown {
                gap: 8px;
            }
            
            .countdown-item {
                padding: 12px 8px;
                min-width: 60px;
            }
            
            .countdown-number {
                font-size: 1.25rem;
            }
            
            .countdown-label {
                font-size: 0.75rem;
            }
        }
        
        /* Custom CSS */
        <?php if (!empty($custom_css_text)): ?>
        <?php echo wp_strip_all_tags($custom_css_text); ?>
        <?php endif; ?>
        
        /* Animated Theme Effects */
        <?php if (isset($current_theme['animated']) && $current_theme['animated']): ?>
            <?php if ($selected_theme === 'floating-particles'): ?>
                .maintenance-container::before {
                    content: '';
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-image: 
                        radial-gradient(2px 2px at 20px 30px, rgba(255,255,255,0.8), transparent),
                        radial-gradient(2px 2px at 40px 70px, rgba(255,255,255,0.6), transparent),
                        radial-gradient(1px 1px at 90px 40px, rgba(255,255,255,0.9), transparent),
                        radial-gradient(1px 1px at 130px 80px, rgba(255,255,255,0.4), transparent),
                        radial-gradient(2px 2px at 160px 30px, rgba(255,255,255,0.7), transparent);
                    background-repeat: repeat;
                    background-size: 200px 100px;
                    animation: particles-float 20s linear infinite;
                    pointer-events: none;
                    z-index: 1;
                }
                @keyframes particles-float {
                    0% { transform: translateY(100vh); }
                    100% { transform: translateY(-100px); }
                }
            <?php elseif ($selected_theme === 'wave-motion'): ?>
                .maintenance-container::before {
                    content: '';
                    position: fixed;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    height: 100px;
                    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
                    animation: waves-move 4s ease-in-out infinite;
                    pointer-events: none;
                    z-index: 1;
                }
                @keyframes waves-move {
                    0%, 100% { transform: translateX(-100%) scaleY(1); }
                    50% { transform: translateX(100%) scaleY(2); }
                }
            <?php elseif ($selected_theme === 'matrix-rain'): ?>
                .maintenance-container::before {
                    content: '';
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: repeating-linear-gradient(
                        90deg,
                        transparent,
                        transparent 20px,
                        rgba(0, 255, 0, 0.1) 20px,
                        rgba(0, 255, 0, 0.1) 22px
                    );
                    animation: matrix-scroll 3s linear infinite;
                    pointer-events: none;
                    z-index: 1;
                }
                @keyframes matrix-scroll {
                    0% { transform: translateY(-100%); }
                    100% { transform: translateY(100%); }
                }
            <?php elseif ($selected_theme === 'aurora-lights'): ?>
                .maintenance-container::before {
                    content: '';
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(
                        45deg,
                        transparent 30%,
                        rgba(0, 255, 150, 0.3) 50%,
                        rgba(255, 0, 150, 0.3) 70%,
                        transparent 90%
                    );
                    animation: aurora-dance 6s ease-in-out infinite;
                    pointer-events: none;
                    z-index: 1;
                }
                @keyframes aurora-dance {
                    0%, 100% { transform: translateX(-50px) rotate(-2deg); opacity: 0.7; }
                    50% { transform: translateX(50px) rotate(2deg); opacity: 1; }
                }
            <?php elseif ($selected_theme === 'geometric-shapes'): ?>
                .maintenance-container::before {
                    content: '';
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    width: 100px;
                    height: 100px;
                    border: 3px solid rgba(255, 255, 255, 0.3);
                    transform: translate(-50%, -50%);
                    animation: geometric-rotate 4s linear infinite;
                    pointer-events: none;
                    z-index: 1;
                }
                .maintenance-container::after {
                    content: '';
                    position: fixed;
                    top: 30%;
                    right: 20%;
                    width: 60px;
                    height: 60px;
                    border-radius: 50%;
                    border: 2px solid rgba(255, 255, 255, 0.2);
                    animation: geometric-float 5s ease-in-out infinite;
                    pointer-events: none;
                    z-index: 1;
                }
                @keyframes geometric-rotate {
                    0% { transform: translate(-50%, -50%) rotate(0deg) scale(1); }
                    50% { transform: translate(-50%, -50%) rotate(180deg) scale(1.3); }
                    100% { transform: translate(-50%, -50%) rotate(360deg) scale(1); }
                }
                @keyframes geometric-float {
                    0%, 100% { transform: translateY(0px); }
                    50% { transform: translateY(-30px); }
                }
            <?php endif; ?>
            
            .maintenance-container {
                position: relative;
                z-index: 2;
            }
        <?php endif; ?>
        
        /* Additional Custom CSS */
        <?php if (!empty($custom_css)): ?>
        <?php echo wp_strip_all_tags($custom_css); ?>
        <?php endif; ?>
    </style>
</head>
<body>
    <?php if ($background_type === 'video' && !empty($background_video)): ?>
        <?php $bg_video_url = wp_get_attachment_url($background_video); ?>
        <?php if ($bg_video_url): ?>
    <video class="background-video" autoplay <?php echo $video_muted === '1' ? 'muted' : ''; ?> <?php echo $video_loop === '1' ? 'loop' : ''; ?> playsinline>
        <source src="<?php echo esc_url($bg_video_url); ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
        <?php endif; ?>
    <?php endif; ?>
    
    <?php if (($background_type === 'image' && !empty($background_image)) || ($background_type === 'video' && !empty($background_video))): ?>
    <div class="background-overlay"></div>
    <?php endif; ?>
    
    <div class="maintenance-container">
        <?php if ($show_logo === '1'): ?>
            <?php if (!empty($custom_logo)): ?>
                <?php $logo_url = wp_get_attachment_image_url($custom_logo, 'full'); ?>
                <?php if ($logo_url): ?>
                    <div class="maintenance-logo">
                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="logo">
                    <svg viewBox="0 0 80 80" fill="none">
                        <defs>
                            <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="<?php echo esc_attr($accent_color); ?>"/>
                                <stop offset="100%" stop-color="<?php echo esc_attr($accent_color); ?>" stop-opacity="0.6"/>
                            </linearGradient>
                        </defs>
                        <path d="M40 10L60 25V70H20V25L40 10Z" fill="url(#logoGradient)"/>
                        <path d="M40 10L50 17.5V62.5H30V17.5L40 10Z" fill="<?php echo esc_attr($text_color); ?>" opacity="0.9"/>
                        <circle cx="40" cy="35" r="3" fill="<?php echo esc_attr($accent_color); ?>"/>
                    </svg>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
        <h1 class="main-heading maintenance-heading"><?php echo esc_html($heading); ?></h1>
         <p class="main-message maintenance-message"><?php echo esc_html($message); ?></p>
        
        <?php if ($show_countdown == '1' && !empty($launch_date)): ?>
             <div class="countdown-container countdown-timer style-<?php echo esc_attr($countdown_style); ?>">
                 <div class="countdown-label"><?php echo esc_html($countdown_text); ?></div>
                 <div class="countdown countdown-<?php echo esc_attr($countdown_format); ?>" id="countdown">
                <?php if ($countdown_format === 'compact'): ?>
                    <div class="countdown-compact" id="countdown-compact">00:00:00:00</div>
                <?php elseif ($countdown_format === 'days_only'): ?>
                    <div class="countdown-days-only">
                        <span class="countdown-number" id="days">00</span>
                        <span class="countdown-label">Days</span>
                    </div>
                <?php else: ?>
                    <div class="countdown-item">
                        <span class="countdown-number" id="days">00</span>
                        <span class="countdown-label">Days</span>
                    </div>
                    <div class="countdown-item">
                        <span class="countdown-number" id="hours">00</span>
                        <span class="countdown-label">Hours</span>
                    </div>
                    <div class="countdown-item">
                        <span class="countdown-number" id="minutes">00</span>
                        <span class="countdown-label">Minutes</span>
                    </div>
                    <div class="countdown-item">
                        <span class="countdown-number" id="seconds">00</span>
                        <span class="countdown-label">Seconds</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if ($show_progress_bar === '1'): ?>
        <div class="progress-bar">
            <div class="progress-fill" id="progress-fill"></div>
        </div>
        <?php endif; ?>
        
        <?php if ($show_social_icons === '1'): ?>
        <div class="social-links">
            <?php if (!empty($facebook_url)): ?>
            <a href="<?php echo esc_url($facebook_url); ?>" class="social-link" aria-label="Facebook" target="_blank" rel="noopener">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
            </a>
            <?php endif; ?>
            
            <?php if (!empty($twitter_url)): ?>
            <a href="<?php echo esc_url($twitter_url); ?>" class="social-link" aria-label="Twitter" target="_blank" rel="noopener">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
            </a>
            <?php endif; ?>
            
            <?php if (!empty($instagram_url)): ?>
            <a href="<?php echo esc_url($instagram_url); ?>" class="social-link" aria-label="Instagram" target="_blank" rel="noopener">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
            </a>
            <?php endif; ?>
            
            <?php if (!empty($linkedin_url)): ?>
            <a href="<?php echo esc_url($linkedin_url); ?>" class="social-link" aria-label="LinkedIn" target="_blank" rel="noopener">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
            </a>
            <?php endif; ?>
            
            <?php if (!empty($youtube_url)): ?>
            <a href="<?php echo esc_url($youtube_url); ?>" class="social-link" aria-label="YouTube" target="_blank" rel="noopener">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
            </a>
            <?php endif; ?>
            
            <?php if (!empty($email_address)): ?>
            <a href="mailto:<?php echo esc_attr($email_address); ?>" class="social-link" aria-label="Email">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-.904.732-1.636 1.636-1.636h.91L12 10.09l9.455-6.269h.909c.904 0 1.636.732 1.636 1.636z"/>
                </svg>
            </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    
    <?php if ($show_footer === '1'): ?>
    <footer class="maintenance-footer">
        <div class="footer-content">
            <?php 
            // Replace the link text in footer with actual link
            $footer_display = str_replace(
                $footer_link_text, 
                '<a href="' . esc_url($footer_link_url) . '" target="_blank" rel="noopener">' . esc_html($footer_link_text) . '</a>', 
                esc_html($footer_text)
            );
            echo $footer_display;
            ?>
        </div>
    </footer>
    <?php endif; ?>
    
    <?php if ($show_countdown): ?>
    <script>
        // Countdown functionality
        const launchDate = new Date(<?php echo $launch_timestamp * 1000; ?>).getTime();
        const expiryAction = '<?php echo esc_js(get_option('liftoff_countdown_expiry_action', 'nothing')); ?>';
        let countdownExpired = false;
        
        function handleCountdownExpiry() {
            if (countdownExpired) return;
            countdownExpired = true;
            
            switch (expiryAction) {
                case 'disable_maintenance':
                    // Send AJAX request to disable maintenance mode
                    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'action=liftoff_disable_maintenance&nonce=<?php echo wp_create_nonce('liftoff_nonce'); ?>'
                    }).then(() => {
                        window.location.reload();
                    });
                    break;
                case 'postpone_1hour':
                    postponeCountdown(1);
                    break;
                case 'postpone_6hours':
                    postponeCountdown(6);
                    break;
                case 'postpone_1day':
                    postponeCountdown(24);
                    break;
                case 'postpone_1week':
                    postponeCountdown(168);
                    break;
                default:
                    // Do nothing
                    break;
            }
        }
        
        function postponeCountdown(hours) {
            const newDate = new Date(Date.now() + (hours * 60 * 60 * 1000));
            const newTimestamp = Math.floor(newDate.getTime() / 1000);
            
            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=liftoff_postpone_countdown&new_date=${newTimestamp}&nonce=<?php echo wp_create_nonce('liftoff_nonce'); ?>`
            }).then(() => {
                window.location.reload();
            });
        }
        
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = launchDate - now;
            
            if (distance < 0) {
                document.getElementById('countdown').innerHTML = '<div class="countdown-item"><span class="countdown-number">00</span><span class="countdown-label">Launched!</span></div>';
                updateProgressBar(100);
                handleCountdownExpiry();
                return;
            }
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            document.getElementById('days').textContent = String(days).padStart(2, '0');
            document.getElementById('hours').textContent = String(hours).padStart(2, '0');
            document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
            document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
            
            // Update progress bar based on countdown
            const totalTime = launchDate - new Date('<?php echo date('c'); ?>').getTime();
            const elapsed = totalTime - distance;
            const progress = Math.min((elapsed / totalTime) * 100, 100);
            updateProgressBar(progress);
        }
        
        function updateCountdownCompact() {
            const now = new Date().getTime();
            const distance = launchDate - now;
            
            if (distance < 0) {
                document.getElementById('countdown-compact').textContent = '00:00:00:00';
                handleCountdownExpiry();
                return;
            }
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            const timeString = `${String(days).padStart(2, '0')}:${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            document.getElementById('countdown-compact').textContent = timeString;
        }
        
        function updateCountdownDaysOnly() {
            const now = new Date().getTime();
            const distance = launchDate - now;
            
            if (distance < 0) {
                document.getElementById('days').textContent = '00';
                handleCountdownExpiry();
                return;
            }
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            document.getElementById('days').textContent = String(days).padStart(2, '0');
        }
        
        // Progress bar update function
        function updateProgressBar(percentage) {
            const progressFill = document.getElementById('progress-fill');
            if (progressFill) {
                progressFill.style.width = percentage + '%';
            }
        }
        
        // Determine which countdown function to use
        const countdownFormat = '<?php echo esc_js($countdown_format); ?>';
        
        if (countdownFormat === 'compact') {
            updateCountdownCompact();
            setInterval(updateCountdownCompact, 1000);
        } else if (countdownFormat === 'days_only') {
            updateCountdownDaysOnly();
            setInterval(updateCountdownDaysOnly, 1000);
        } else {
            // Default full countdown
            updateCountdown();
            setInterval(updateCountdown, 1000);
        }
        
        // Initialize progress bar
        updateProgressBar(0);
    </script>
    <?php endif; ?>
</body>
</html>