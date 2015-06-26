<?php
/**
 * Shaped Pixels Theme Customizer
 *
 * @package Shaped Pixels
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shaped_pixels_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Add custom description to Site Title &amp; Tagline section.
	$wp_customize->get_section( 'title_tagline' )->description = __( 'I recommend a logo up to 450px in width and up to 67px in height so that it lines up with the menu.', 'shaped-pixels' );
	// Add custom description to Colour section.
	$wp_customize->get_section( 'colors' )->description = __( 'You can set the primary colours for most elements in this theme from here.', 'shaped-pixels' );
	// Add custom description to Background section.
	$wp_customize->get_section( 'background_image' )->description = __( 'Background may only be visible when using the boxed layout or on short pages.', 'shaped-pixels' );	
	
	
// Setting group for uploading logo
    $wp_customize->add_setting('shaped_pixels_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'option',
		'sanitize_callback' => 'shaped_pixels_sanitize_upload',
    ));
	
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'shaped_pixels_logo', array(
        'label'    => __('Your Logo', 'shaped-pixels'),
        'section'  => 'title_tagline',
        'settings' => 'shaped_pixels_logo',
		'priority' => 1,
    )));
		
// Setting group for logo positioning
	$wp_customize->add_setting( 'logo_margins', array(
		'default'        => '38px 0 0 0',
		'sanitize_callback' => 'shaped_pixels_sanitize_text',
	) );

	$wp_customize->add_control( 'logo_margins', array(
		'settings' => 'logo_margins',
		'label'    => __( 'Logo Margins', 'shaped-pixels' ),
		'section'  => 'title_tagline',		
		'type'     => 'text',
		'priority' => 2,
	) );
		
/**
 * This is a section called Basic Settings.
 * For miscellaneous options.
 */

	$wp_customize->add_section( 'basic_settings', array(
		'title'          => __( 'Basic Settings', 'shaped-pixels' ),
		'priority'       => 25,
	) );

// Setting for page width
	$wp_customize->add_setting( 'page_width', array(
		'default' => 'full',
		'sanitize_callback' => 'shaped_pixels_sanitize_pagewidth',
	) );
// Control for page width	
	$wp_customize->add_control( 'page_width', array(
	'label'   => __( 'Page Width', 'shaped-pixels' ),
	'section' => 'basic_settings',
	'priority'=> 1,
	'type'    => 'radio',
		'choices' => array(
			'full' 		=> __( 'Full Screen', 'shaped-pixels' ),
			'wide1600' 	=> __( '1600px Wide', 'shaped-pixels' ),
		),		
	));
// Setting for blog style
	$wp_customize->add_setting( 'blog_layout', array(
		'default' => 'rightsidebar',
		'sanitize_callback' => 'shaped_pixels_sanitize_bloglayout',
	) );
// Control for blog layout	
	$wp_customize->add_control( 'blog_layout', array(
	'label'   => __( 'Blog Layout', 'shaped-pixels' ),
	'section' => 'basic_settings',
	'priority' => 2,
	'type'    => 'radio',
		'choices' => array(
			'leftsidebar' => __( 'Left Sidebar', 'shaped-pixels' ),
			'rightsidebar' => __( 'Right Sidebar', 'shaped-pixels' ),
		),
	));
// Setting for blog style
	$wp_customize->add_setting( 'featured_image', array(
		'default' => 'smallthumbnail',
		'sanitize_callback' => 'shaped_pixels_sanitize_featuredimage',
	) );
// Control for blog layout	
	$wp_customize->add_control( 'featured_image', array(
	'label'   => __( 'Featured Image', 'shaped-pixels' ),
	'section' => 'basic_settings',
	'priority' => 3,
	'type'    => 'radio',
		'choices' => array(
			'smallthumbnail' => __( 'Small Featured Image', 'shaped-pixels' ),
			'bigthumbnail' => __( 'Big Featured Image', 'shaped-pixels' ),
		),
	));	

// Setting for content or excerpt
	$wp_customize->add_setting( 'excerpt_content', array(
		'default' => 'content',
		'sanitize_callback' => 'shaped_pixels_sanitize_excerpt',
	) );
// Control for Content or excerpt
	$wp_customize->add_control( 'excerpt_content', array(
    'label'   => __( 'Content or Excerpt', 'shaped-pixels' ),
    'section' => 'basic_settings',
    'type'    => 'radio',
        'choices' => array(
            'content' => __( 'Content', 'shaped-pixels' ),
            'excerpt' => __( 'Excerpt', 'shaped-pixels' ),	
        ),
	'priority'       => 4,
    ));

// Setting group for a excerpt
	$wp_customize->add_setting( 'excerpt_limit', array(
		'default'        => '50',
		'sanitize_callback' => 'shaped_pixels_sanitize_number',
	) );
	$wp_customize->add_control( 'excerpt_limit', array(
		'settings' => 'excerpt_limit',
		'label'    => __( 'Excerpt Length', 'shaped-pixels' ),
		'section'  => 'basic_settings',
		'type'     => 'text',
		'priority'       => 5,
	) );
		
// Setting group for a Copyright
	$wp_customize->add_setting( 'copyright', array(
		'default'        => 'Your Name',
		'sanitize_callback' => 'shaped_pixels_sanitize_text',
	) );

	$wp_customize->add_control( 'copyright', array(
		'settings' => 'copyright',
		'label'    => __( 'Your Copyright Name', 'shaped-pixels' ),
		'section'  => 'basic_settings',		
		'type'     => 'text',
		'priority' => 6,
	) );

// hide post edit links
	$wp_customize->add_setting( 'hide_edit', array(
	'sanitize_callback' => 'shaped_pixels_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_edit', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide Edit Links', 'shaped-pixels' ),
        'section' => 'basic_settings',
		'priority' => 7,
    ) );

// hide full post footer info
	$wp_customize->add_setting( 'hide_post_footer_info', array(
	'sanitize_callback' => 'shaped_pixels_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_post_footer_info', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide the Post Footer Info', 'shaped-pixels' ),
        'section' => 'basic_settings',
		'priority' => 8,
    ) );

// hide full post next and previous nav
	$wp_customize->add_setting( 'hide_post_footer_nav', array(
	'sanitize_callback' => 'shaped_pixels_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_post_footer_nav', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide the Post Footer Nav', 'shaped-pixels' ),
        'section' => 'basic_settings',
		'priority' => 9,
    ) );



	
/*
 * Colour Section.
 * Setting group for footer widgets background.
 */
	$wp_customize->add_setting( 'footergroup_bg', array(
		'default'        => '#b5704e',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footergroup_bg', array(
		'label'   => __( 'Footer Widgets Background', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'footergroup_bg',
		'priority' => 1,			
	) ) );
	
// Setting group for footer text colour.
	$wp_customize->add_setting( 'footergroup_text', array(
		'default'        => '#f3d7c9',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footergroup_text', array(
		'label'   => __( 'Footer Widgets Text', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'footergroup_text',
		'priority' => 2,			
	) ) );
// Setting group for footer list borders.
	$wp_customize->add_setting( 'footergroup_list', array(
		'default'        => '#c88e71',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footergroup_list', array(
		'label'   => __( 'Footer Widgets List Borders', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'footergroup_list',
		'priority' => 3,			
	) ) );	
		
// Setting group for footer widget titles.
	$wp_customize->add_setting( 'footerwidgets_titles', array(
		'default'        => '#f7ece7',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footerwidgets_titles', array(
		'label'   => __( 'Footer Widget Titles', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'footerwidgets_titles',
		'priority' => 4,			
	) ) );	
// Setting group for the footer copyright area.
	$wp_customize->add_setting( 'footer_bg', array(
		'default'        => '#000000',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg', array(
		'label'   => __( 'Footer Background', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'footer_bg',
		'priority' => 5,			
	) ) );	
// Setting group for the footer copyright area text.
	$wp_customize->add_setting( 'footer_text', array(
		'default'        => '#818488',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text', array(
		'label'   => __( 'Footer Copyright Text', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'footer_text',
		'priority' => 6,			
	) ) );	
// Setting group for links.
	$wp_customize->add_setting( 'link_colour', array(
		'default'        => '#c8842d',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour', array(
		'label'   => __( 'Link Colour', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'link_colour',
		'priority' => 7,			
	) ) );	
// Setting group for links.
	$wp_customize->add_setting( 'link_hover', array(
		'default'        => '#686868',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover', array(
		'label'   => __( 'Link Colour', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'link_hover',
		'priority' => 8,			
	) ) );
// Setting group for footer widget links.
	$wp_customize->add_setting( 'footergroup_links', array(
		'default'        => '#f3d7c9',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footergroup_links', array(
		'label'   => __( 'Footer Widget Links', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'footergroup_links',
		'priority' => 9,			
	) ) );
// Setting group for footer menu links.
	$wp_customize->add_setting( 'footermenu_links', array(
		'default'        => '#a0a0a0',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footermenu_links', array(
		'label'   => __( 'Footer Menu Links', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'footermenu_links',
		'priority' => 10,			
	) ) );
// Setting group for footer menu links on hover.
	$wp_customize->add_setting( 'footermenu_hover', array(
		'default'        => '#c7b596',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footermenu_hover', array(
		'label'   => __( 'Footer Menu Hover', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'footermenu_hover',
		'priority' => 11,			
	) ) );
// Setting group for social network icons.
	$wp_customize->add_setting( 'socialicons', array(
		'default'        => '#5d636a',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'socialicons', array(
		'label'   => __( 'Social Network Icons', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'socialicons',
		'priority' => 12,			
	) ) );
// Setting group for social network icons on hover.
	$wp_customize->add_setting( 'socialicons_hover', array(
		'default'        => '#a9aeb3',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'socialicons_hover', array(
		'label'   => __( 'Social Network Icons Hover', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'socialicons_hover',
		'priority' => 13,			
	) ) );
// Setting group for buttons and button types.
	$wp_customize->add_setting( 'buttoncolour', array(
		'default'        => '#b7bcc1',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'buttoncolour', array(
		'label'   => __( 'Button Colour', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'buttoncolour',
		'priority' => 14,			
	) ) );	
// Setting group for buttons and button type text.
	$wp_customize->add_setting( 'button_text', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_text', array(
		'label'   => __( 'Button Text', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'button_text',
		'priority' => 15,			
	) ) );	
// Setting group for buttons and button on hover.
	$wp_customize->add_setting( 'button_hover', array(
		'default'        => '#5d636a',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hover', array(
		'label'   => __( 'Button Hover Colour', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'button_hover',
		'priority' => 16,			
	) ) );	
// Setting group for buttons and button text on hover.
	$wp_customize->add_setting( 'button_hover_text', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hover_text', array(
		'label'   => __( 'Button Hover Text', 'shaped-pixels' ),
		'section' => 'colors',
		'settings'   => 'button_hover_text',
		'priority' => 17,			
	) ) );	
	

/**
 * This is a section called Navigation.
 * Change your primary menu styles here.
 */
 
// Setting group for the main menu link colour.
	$wp_customize->add_setting( 'nav_links', array(
		'default'        => '#686868',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_links', array(
		'label'   => __( 'Main Menu Links', 'shaped-pixels' ),
		'section' => 'nav',
		'settings'   => 'nav_links',
		'priority' => 1,			
	) ) );
// Setting group for the main menu links on hover.
	$wp_customize->add_setting( 'nav_hover', array(
		'default'        => '#d9a241',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_hover', array(
		'label'   => __( 'Main Menu Hover &amp; Active', 'shaped-pixels' ),
		'section' => 'nav',
		'settings'   => 'nav_hover',
		'priority' => 2,			
	) ) );
// Setting group for the submenu background.
	$wp_customize->add_setting( 'submenu_bg', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bg', array(
		'label'   => __( 'Submenu Background', 'shaped-pixels' ),
		'section' => 'nav',
		'settings'   => 'submenu_bg',
		'priority' => 3,			
	) ) );
// Setting group for the submenu top border.
	$wp_customize->add_setting( 'submenu_border', array(
		'default'        => '#b5704e',
		'sanitize_callback' => 'shaped_pixels_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_border', array(
		'label'   => __( 'Submenu Top Border', 'shaped-pixels' ),
		'section' => 'nav',
		'settings'   => 'submenu_border',
		'priority' => 4,			
	) ) );



















































	
	
	
	
	
	
	
	
}
add_action( 'customize_register', 'shaped_pixels_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shaped_pixels_customize_preview_js() {
	wp_enqueue_script( 'shaped_pixels_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'shaped_pixels_customize_preview_js' );



/**
 * This is our theme sanitization settings.
 * Remember to sanitize any additional theme settings you add to the customizer.
 */	
 
// adds sanitization callback function for numeric data : number
	function shaped_pixels_sanitize_number( $value ) {
		$value = (int) $value; // Force the value into integer type.
		return ( 0 < $value ) ? $value : null;
	}

// adds sanitization callback function : colors
	function shaped_pixels_sanitize_hex_color( $color ) {
		if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
			return '#' . $unhashed;
	
		return $color;
	}

// adds sanitization callback function : text 
	function shaped_pixels_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}


// adds sanitization callback function : url
	function shaped_pixels_sanitize_url( $value) {
		$value = esc_url( $value);
		return $value;
	}

// adds sanitization callback function : checkbox
	function shaped_pixels_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}	 
// adds sanitization callback function for uploading : uploader
	add_filter( 'shaped_pixels_sanitize_image', 'shaped_pixels_sanitize_upload' );
	add_filter( 'shaped_pixels_sanitize_file', 'shaped_pixels_sanitize_upload' );
	
	function shaped_pixels_sanitize_upload( $input ) {        
			$output = '';        
			$filetype = wp_check_filetype($input);       
			if ( $filetype["ext"] ) {        
					$output = $input;        
			}       
			return $output;
	}		

// adds sanitization callback function for the page width : radio
	function shaped_pixels_sanitize_pagewidth( $input ) {
		$valid = array(
			'full' 		=> __( 'Full Screen', 'shaped-pixels' ),
			'wide1600' 	=> __( '1600px Wide', 'shaped-pixels' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}	


// adds sanitization callback function for the blog layout : radio
	function shaped_pixels_sanitize_bloglayout( $input ) {
		$valid = array(
			'leftsidebar' => __( 'Left Sidebar', 'shaped-pixels' ),
			'rightsidebar' => __( 'Right Sidebar', 'shaped-pixels' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}	

// adds sanitization callback function for the blog featured image : radio
	function shaped_pixels_sanitize_featuredimage( $input ) {
		$valid = array(
			'smallthumbnail' => __( 'Small Featured Image', 'shaped-pixels' ),
			'bigthumbnail' => __( 'Big Featured Image', 'shaped-pixels' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}	

	
// adds sanitization callback function for the excerpt : radio
	function shaped_pixels_sanitize_excerpt( $input ) {
		$valid = array(
			'content' => __( 'Content', 'shaped-pixels' ),
			'excerpt' => __( 'Excerpt', 'shaped-pixels' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}	