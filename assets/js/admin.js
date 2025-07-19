/**
 * LiftOff Maintenance - Admin JavaScript
 */

(function($) {
    'use strict';

    // Initialize when document is ready
    $(document).ready(function() {
        LiftOffAdmin.init();
    });

    // Main admin object
    const LiftOffAdmin = {
        
        // Initialize all functionality
        init: function() {
            this.bindEvents();
            this.initColorPickers();
            this.initTabs();
            this.updateCheckboxText();
            this.initMediaUploader();
            this.initBackgroundMediaUpload();
            this.initCustomizeForm();
            this.initAdvancedForm();
            this.initThemeCategories();
        },

        // Bind event listeners
        bindEvents: function() {
            // Form submission
            $('#liftoff-settings-form').on('submit', this.handleFormSubmit.bind(this));
            
            // Quick toggle maintenance mode
            $('#toggle-maintenance').on('click', this.quickToggleMaintenance.bind(this));
            
            // Color picker changes
            $('.color-input').on('input', this.handleColorChange.bind(this));
            
            // Tab navigation
            $('.tab-button').on('click', this.handleTabClick.bind(this));
            
            // Checkbox changes
            $('input[name="maintenance_enabled"]').on('change', this.updateCheckboxText.bind(this));
            
            // Conditional section toggles
            $('input[type="checkbox"]').on('change', this.handleConditionalSections.bind(this));
            
            // Progress bar toggle
            $('#progress-bar-toggle').on('change', this.handleProgressBarToggle.bind(this));
            
            // Social icons toggle
            $('#social-icons-toggle').on('change', this.handleSocialIconsToggle.bind(this));
            
            // Theme selection
            $('.theme-option').on('click', this.handleThemeSelect.bind(this));
            
            // Range input updates
            $(document).on('input', '.range-input', function() {
                const value = $(this).val();
                $(this).siblings('.range-value').find('span').text(value);
            });
            
            // Background type toggle
            $('#background_type').on('change', function() {
                const selectedType = $(this).val();
                $('#background-image-settings, #background-video-settings').hide();
                
                if (selectedType === 'image') {
                    $('#background-image-settings').show();
                } else if (selectedType === 'video') {
                    $('#background-video-settings').show();
                }
            });
        },

        // Initialize color pickers
        initColorPickers: function() {
            $('.color-input').each(function() {
                const $colorInput = $(this);
                const $textInput = $colorInput.siblings('.color-text');
                
                // Update text input when color changes
                $colorInput.on('input', function() {
                    $textInput.val(this.value.toUpperCase());
                });
                
                // Update color input when text changes
                $textInput.on('input', function() {
                    const color = this.value;
                    if (/^#[0-9A-F]{6}$/i.test(color)) {
                        $colorInput.val(color);
                    }
                });
            });
        },

        // Handle form submission
        handleFormSubmit: function(e) {
            e.preventDefault();
            
            const $form = $(e.target);
            const $submitBtn = $form.find('button[type="submit"]');
            
            // Show loading state
            this.setButtonLoading($submitBtn, true);
            
            // Prepare form data
            const formData = {
                action: 'liftoff_save_settings',
                nonce: liftoff_ajax.nonce,
                maintenance_enabled: $('input[name="maintenance_enabled"]').is(':checked') ? '1' : '0',
                page_title: $('input[name="page_title"]').val(),
                page_heading: $('input[name="page_heading"]').val(),
                page_message: $('textarea[name="page_message"]').val(),
                launch_date: $('input[name="launch_date"]').val(),
                background_color: $('input[name="background_color"]').val(),
                text_color: $('input[name="text_color"]').val(),
                accent_color: $('input[name="accent_color"]').val()
            };
            
            // Send AJAX request
            $.ajax({
                url: liftoff_ajax.ajax_url,
                type: 'POST',
                data: formData,
                success: (response) => {
                    if (response.success) {
                        this.showNotification(response.data, 'success');
                        this.updateStatusIndicator();
                        this.updateQuickToggleButton();
                    } else {
                        this.showNotification('Failed to save settings. Please try again.', 'error');
                    }
                    this.setButtonLoading($submitBtn, false);
                },
                error: () => {
                    this.showNotification('Error saving settings. Please try again.', 'error');
                    this.setButtonLoading($submitBtn, false);
                }
            });
        },

        // Initialize background media uploader
         initBackgroundMediaUpload: function() {
             if (typeof wp !== 'undefined' && wp.media) {
                 // Background image uploader
                 $('#upload-background-image-btn').on('click', function(e) {
                     e.preventDefault();
                     
                     const mediaUploader = wp.media({
                         title: 'Select Background Image',
                         button: {
                             text: 'Use this image'
                         },
                         multiple: false,
                         library: {
                             type: 'image'
                         }
                     });
                     
                     mediaUploader.on('select', function() {
                         const attachment = mediaUploader.state().get('selection').first().toJSON();
                         $('#background_image').val(attachment.id);
                         $('#background-image-preview').html(`<img src="${attachment.url}" alt="Background Preview" style="max-width: 200px; max-height: 150px;">`).show();
                         $('#remove-background-image-btn').show();
                     });
                     
                     mediaUploader.open();
                 });
                 
                 // Remove background image
                 $('#remove-background-image-btn').on('click', function(e) {
                     e.preventDefault();
                     $('#background_image').val('');
                     $('#background-image-preview').empty().hide();
                     $(this).hide();
                 });
                 
                 // Background video uploader
                 $('#upload-background-video-btn').on('click', function(e) {
                     e.preventDefault();
                     
                     const mediaUploader = wp.media({
                         title: 'Select Background Video',
                         button: {
                             text: 'Use this video'
                         },
                         multiple: false,
                         library: {
                             type: 'video'
                         }
                     });
                     
                     mediaUploader.on('select', function() {
                         const attachment = mediaUploader.state().get('selection').first().toJSON();
                         $('#background_video').val(attachment.id);
                         $('#background-video-preview').html(`<video width="200" height="112" controls><source src="${attachment.url}" type="video/mp4">Your browser does not support the video tag.</video>`).show();
                         $('#remove-background-video-btn').show();
                     });
                     
                     mediaUploader.open();
                 });
                 
                 // Remove background video
                 $('#remove-background-video-btn').on('click', function(e) {
                     e.preventDefault();
                     $('#background_video').val('');
                     $('#background-video-preview').empty().hide();
                     $(this).hide();
                 });
             }
         },

        // Quick toggle maintenance mode
        quickToggleMaintenance: function(e) {
            e.preventDefault();
            
            const $checkbox = $('input[name="maintenance_enabled"]');
            const $button = $(e.target).closest('.quick-action');
            
            // Toggle the checkbox
            $checkbox.prop('checked', !$checkbox.is(':checked')).trigger('change');
            
            // Submit the form automatically
            $('#liftoff-settings-form').trigger('submit');
        },

        // Handle color input changes
        handleColorChange: function(e) {
            const $input = $(e.target);
            const $textInput = $input.siblings('.color-text');
            $textInput.val($input.val().toUpperCase());
        },

        // Initialize tabs
        initTabs: function() {
            // Show first tab by default
            this.showTab('general');
        },
        
        // Handle tab clicks
        handleTabClick: function(e) {
            e.preventDefault();
            const $button = $(e.target);
            const tabId = $button.data('tab');
            
            // Update active tab button
            $('.tab-button').removeClass('active');
            $button.addClass('active');
            
            // Show corresponding tab content
            this.showTab(tabId);
        },
        
        // Show specific tab
        showTab: function(tabId) {
            $('.tab-content').removeClass('active');
            $(`#${tabId}-tab`).addClass('active');
        },
        
        // Handle theme selection
        handleThemeSelect: function(e) {
            const $option = $(e.target).closest('.theme-option');
            
            $('.theme-option').removeClass('active');
            $option.addClass('active');
            
            const themeValue = $option.data('theme');
            $('input[name="liftoff_theme"]').val(themeValue);
            
            // Auto-save theme selection
            this.saveThemeSelection(themeValue);
        },
        
        // Initialize theme categories
        initThemeCategories: function() {
            // Handle category tab switching
            $('.category-tab').on('click', function() {
                const category = $(this).data('category');
                
                // Update active tab
                $('.category-tab').removeClass('active');
                $(this).addClass('active');
                
                // Show/hide theme grids
                $('.theme-grid').hide();
                $('#' + category + '-themes').show();
            });
            
            // Initialize with static themes visible
            $('#static-themes').show();
            $('#animated-themes').hide();
        },
        
        // Theme color definitions
        themeColors: {
            'dark-professional': { background: '#1e3c72', text: '#ffffff', accent: '#4CAF50' },
            'light-minimal': { background: '#f5f7fa', text: '#333333', accent: '#007cba' },
            'gradient-blue': { background: '#667eea', text: '#ffffff', accent: '#FFD700' },
            'sunset-orange': { background: '#ff9a9e', text: '#2c3e50', accent: '#e74c3c' },
            'ocean-teal': { background: '#2E8B57', text: '#ffffff', accent: '#20B2AA' },
            'purple-rain': { background: '#8360c3', text: '#ffffff', accent: '#f39c12' },
            'midnight-city': { background: '#232526', text: '#ecf0f1', accent: '#3498db' },
            'forest-green': { background: '#134e5e', text: '#ffffff', accent: '#27ae60' },
            'cherry-blossom': { background: '#ffecd2', text: '#2c3e50', accent: '#e91e63' },
            'royal-blue': { background: '#1e3c72', text: '#ffffff', accent: '#f1c40f' },
            'cosmic-purple': { background: '#667eea', text: '#ffffff', accent: '#e74c3c' },
            'golden-hour': { background: '#f093fb', text: '#ffffff', accent: '#ffd700' },
            'arctic-blue': { background: '#74b9ff', text: '#ffffff', accent: '#00cec9' },
            'floating-particles': { background: '#667eea', text: '#ffffff', accent: '#FFD700' },
            'wave-motion': { background: '#2E8B57', text: '#ffffff', accent: '#20B2AA' },
            'matrix-rain': { background: '#0f0f23', text: '#00ff00', accent: '#00ff00' },
            'aurora-lights': { background: '#232526', text: '#ffffff', accent: '#00ff96' },
            'geometric-shapes': { background: '#1e3c72', text: '#ffffff', accent: '#f39c12' }
        },

        // Save theme selection
        saveThemeSelection: function(themeValue) {
            // Update color fields with theme colors
            this.updateColorFieldsFromTheme(themeValue);
            
            // Get theme colors for saving
            const themeColors = this.themeColors[themeValue];
            
            $.ajax({
                url: liftoff_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'liftoff_save_theme',
                    nonce: liftoff_ajax.nonce,
                    theme: themeValue,
                    background_color: themeColors ? themeColors.background : '',
                    text_color: themeColors ? themeColors.text : '',
                    accent_color: themeColors ? themeColors.accent : ''
                },
                success: (response) => {
                    if (response.success) {
                        this.showNotification('Theme selected successfully!', 'success');
                    } else {
                        this.showNotification('Failed to save theme selection.', 'error');
                    }
                },
                error: () => {
                    this.showNotification('Error saving theme selection.', 'error');
                }
            });
        },

        // Update color input fields with theme colors
        updateColorFieldsFromTheme: function(themeValue) {
            const themeColors = this.themeColors[themeValue];
            if (themeColors) {
                // Update background color
                $('#background_color').val(themeColors.background);
                $('#background_color').siblings('.color-text').val(themeColors.background);
                
                // Update text color
                $('#text_color').val(themeColors.text);
                $('#text_color').siblings('.color-text').val(themeColors.text);
                
                // Update accent color
                $('#accent_color').val(themeColors.accent);
                $('#accent_color').siblings('.color-text').val(themeColors.accent);
            }
        },
        
        // Update checkbox text based on state
        updateCheckboxText: function() {
            const isEnabled = $('input[name="maintenance_enabled"]').is(':checked');
            const $statusIndicator = $('.status-indicator');
            const $statusText = $('.status-text');
            
            if (isEnabled) {
                $statusIndicator.addClass('active');
                $statusText.text('Maintenance Mode Active');
            } else {
                $statusIndicator.removeClass('active');
                $statusText.text('Maintenance Mode Inactive');
            }
        },
        
        // Handle conditional sections show/hide
         handleConditionalSections: function(e) {
             const $checkbox = $(e.target);
             const checkboxId = $checkbox.attr('id');
             let targetId = '';
             
             // Map checkbox IDs to their corresponding settings sections
             if (checkboxId === 'countdown-toggle') {
                 targetId = 'countdown-settings';
             } else if (checkboxId === 'logo-toggle') {
                 targetId = 'logo-settings';
             }
             
             if (targetId) {
                 const $targetSection = $('#' + targetId);
                 if ($targetSection.length) {
                     if ($checkbox.is(':checked')) {
                         $targetSection.show();
                     } else {
                         $targetSection.hide();
                     }
                 }
             }
         },

        // Update status indicator in header
        updateStatusIndicator: function() {
            const isEnabled = $('input[name="maintenance_enabled"]').is(':checked');
            const $indicator = $('.status-indicator');
            const $text = $('.status-text');
            
            if (isEnabled) {
                $indicator.addClass('active');
                $text.text('Maintenance Mode Active');
            } else {
                $indicator.removeClass('active');
                $text.text('Maintenance Mode Inactive');
            }
        },

        // Update quick toggle button
        updateQuickToggleButton: function() {
            const isEnabled = $('input[name="maintenance_enabled"]').is(':checked');
            const $button = $('#toggle-maintenance');
            const $icon = $button.find('.action-icon svg');
            const $text = $button.find('.action-text');
            
            if (isEnabled) {
                $icon.css('opacity', '1');
                $text.text('Disable Maintenance');
            } else {
                $icon.css('opacity', '0.5');
                $text.text('Enable Maintenance');
            }
        },

        // Set button loading state
        setButtonLoading: function($button, loading) {
            if (loading) {
                $button.addClass('loading').prop('disabled', true);
            } else {
                $button.removeClass('loading').prop('disabled', false);
            }
        },

        // Show notification
        showNotification: function(message, type = 'success') {
            const $notification = $('#liftoff-notification');
            const $icon = $notification.find('.notification-icon');
            const $message = $notification.find('.notification-message');
            
            // Set message and type
            $message.text(message);
            $icon.removeClass('error').addClass(type === 'error' ? 'error' : '');
            
            // Show notification
            $notification.addClass('show');
            
            // Hide after 4 seconds
            setTimeout(() => {
                $notification.removeClass('show');
            }, 4000);
        },

        // Utility function to validate hex color
        isValidHexColor: function(color) {
            return /^#[0-9A-F]{6}$/i.test(color);
        },

        // Utility function to format date for datetime-local input
        formatDateForInput: function(date) {
            if (!date) return '';
            const d = new Date(date);
            const year = d.getFullYear();
            const month = String(d.getMonth() + 1).padStart(2, '0');
            const day = String(d.getDate()).padStart(2, '0');
            const hours = String(d.getHours()).padStart(2, '0');
            const minutes = String(d.getMinutes()).padStart(2, '0');
            return `${year}-${month}-${day}T${hours}:${minutes}`;
        },

        // Initialize WordPress media uploader
         initMediaUploader: function() {
             if (typeof wp !== 'undefined' && wp.media) {
                 // Logo uploader
                 $('#upload-logo-btn').on('click', function(e) {
                     e.preventDefault();
                     
                     const mediaUploader = wp.media({
                         title: 'Select Logo',
                         button: {
                             text: 'Use this logo'
                         },
                         multiple: false,
                         library: {
                             type: 'image'
                         }
                     });
                     
                     mediaUploader.on('select', function() {
                         const attachment = mediaUploader.state().get('selection').first().toJSON();
                         $('#custom_logo').val(attachment.id);
                         $('#logo-preview').html(`<img src="${attachment.url}" alt="Logo Preview">`);
                         $('#remove-logo-btn').show();
                     });
                     
                     mediaUploader.open();
                 });
                 
                 // Remove logo
                 $('#remove-logo-btn').on('click', function(e) {
                     e.preventDefault();
                     $('#custom_logo').val('');
                     $('#logo-preview').empty();
                     $(this).hide();
                 });
                 
                 // Favicon uploader
                 $('#upload-favicon-btn').on('click', function(e) {
                     e.preventDefault();
                     
                     const mediaUploader = wp.media({
                         title: 'Select Favicon',
                         button: {
                             text: 'Use this favicon'
                         },
                         multiple: false,
                         library: {
                             type: 'image'
                         }
                     });
                     
                     mediaUploader.on('select', function() {
                         const attachment = mediaUploader.state().get('selection').first().toJSON();
                         $('#custom_favicon').val(attachment.id);
                         $('#favicon-preview').html(`<img src="${attachment.url}" alt="Favicon Preview" style="max-width: 32px; max-height: 32px;">`);
                         $('#remove-favicon-btn').show();
                     });
                     
                     mediaUploader.open();
                 });
                 
                 // Remove favicon
                 $('#remove-favicon-btn').on('click', function(e) {
                     e.preventDefault();
                     $('#custom_favicon').val('');
                     $('#favicon-preview').empty();
                     $(this).hide();
                 });
             }
         },

        // Initialize customize form submission
         initCustomizeForm: function() {
             $('#liftoff-customize-form').on('submit', function(e) {
                 e.preventDefault();
                 
                 const $form = $(this);
                 const $button = $form.find('button[type="submit"]');
                 const $spinner = $button.find('.btn-spinner');
                 const $text = $button.find('.btn-text');
                 
                 // Show loading state
                 $button.prop('disabled', true);
                 $spinner.addClass('active');
                 $text.text('Saving...');
                 
                 // Submit form data
                 $.ajax({
                     url: ajaxurl,
                     type: 'POST',
                     data: {
                         action: 'liftoff_save_customize',
                         nonce: $('#liftoff_nonce').val(),
                         form_data: $form.serialize()
                     },
                     success: function(response) {
                         if (response.success) {
                             $text.text('Saved!');
                             setTimeout(function() {
                                 $text.text('Save Customization');
                                 $button.prop('disabled', false);
                                 $spinner.removeClass('active');
                             }, 2000);
                         } else {
                             alert('Error saving settings: ' + (response.data || 'Unknown error'));
                             $text.text('Save Customization');
                             $button.prop('disabled', false);
                             $spinner.removeClass('active');
                         }
                     },
                     error: function() {
                         alert('Error saving settings. Please try again.');
                         $text.text('Save Customization');
                         $button.prop('disabled', false);
                         $spinner.removeClass('active');
                     }
                 });
             });
         },
         
         // Handle progress bar toggle
         handleProgressBarToggle: function() {
             const $toggle = $('#progress-bar-toggle');
             const $settings = $('#progress-bar-settings');
             
             if ($toggle.is(':checked')) {
                 $settings.slideDown(300);
             } else {
                 $settings.slideUp(300);
             }
         },
         
         // Handle social icons toggle
         handleSocialIconsToggle: function() {
             const $toggle = $('#social-icons-toggle');
             const $settings = $('#social-icons-settings');
             
             if ($toggle.is(':checked')) {
                 $settings.slideDown(300);
             } else {
                 $settings.slideUp(300);
             }
         },
         
         // Initialize advanced form submission
         initAdvancedForm: function() {
             $('#liftoff-advanced-form').on('submit', function(e) {
                 e.preventDefault();
                 
                 const $form = $(this);
                 const $button = $form.find('button[type="submit"]');
                 const $spinner = $button.find('.btn-spinner');
                 const $text = $button.find('.btn-text');
                 
                 // Show loading state
                 $button.prop('disabled', true);
                 $spinner.addClass('active');
                 $text.text('Saving...');
                 
                 // Submit form data
                 $.ajax({
                     url: ajaxurl,
                     type: 'POST',
                     data: {
                         action: 'liftoff_save_advanced',
                         nonce: $('#liftoff_nonce').val(),
                         form_data: $form.serialize()
                     },
                     success: function(response) {
                         if (response.success) {
                             $text.text('Saved!');
                             setTimeout(function() {
                                 $text.text('Save Advanced Settings');
                                 $button.prop('disabled', false);
                                 $spinner.removeClass('active');
                             }, 2000);
                         } else {
                             alert('Error saving settings: ' + (response.data || 'Unknown error'));
                             $text.text('Save Advanced Settings');
                             $button.prop('disabled', false);
                             $spinner.removeClass('active');
                         }
                     },
                     error: function() {
                         alert('Error saving settings. Please try again.');
                         $text.text('Save Advanced Settings');
                         $button.prop('disabled', false);
                         $spinner.removeClass('active');
                     }
                 });
             });
         }
    };

    // Make LiftOffAdmin globally available
    window.LiftOffAdmin = LiftOffAdmin;

})(jQuery);

// Additional utility functions

// Debounce function for performance
function debounce(func, wait, immediate) {
    let timeout;
    return function executedFunction() {
        const context = this;
        const args = arguments;
        const later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        const callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

// Smooth scroll to element
function smoothScrollTo(element, duration = 500) {
    const target = document.querySelector(element);
    if (!target) return;
    
    const targetPosition = target.offsetTop;
    const startPosition = window.pageYOffset;
    const distance = targetPosition - startPosition;
    let startTime = null;
    
    function animation(currentTime) {
        if (startTime === null) startTime = currentTime;
        const timeElapsed = currentTime - startTime;
        const run = ease(timeElapsed, startPosition, distance, duration);
        window.scrollTo(0, run);
        if (timeElapsed < duration) requestAnimationFrame(animation);
    }
    
    function ease(t, b, c, d) {
        t /= d / 2;
        if (t < 1) return c / 2 * t * t + b;
        t--;
        return -c / 2 * (t * (t - 2) - 1) + b;
    }
    
    requestAnimationFrame(animation);
}

// Copy to clipboard function
function copyToClipboard(text) {
    if (navigator.clipboard && window.isSecureContext) {
        return navigator.clipboard.writeText(text);
    } else {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = text;
        textArea.style.position = 'fixed';
        textArea.style.left = '-999999px';
        textArea.style.top = '-999999px';
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        return new Promise((resolve, reject) => {
            document.execCommand('copy') ? resolve() : reject();
            textArea.remove();
        });
    }
}