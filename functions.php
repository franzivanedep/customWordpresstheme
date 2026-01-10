<?php
/**
 * Twenty Twenty functions and definitions
 */

function twentytwenty_theme_support() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background', array( 'default-color' => 'f5efe0' ) );
	global $content_width;
	if ( ! isset( $content_width ) ) { $content_width = 580; }
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array( 'height' => 90, 'width' => 120, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	$loader = new TwentyTwenty_Script_Loader();
	if ( version_compare( $GLOBALS['wp_version'], '6.3', '<' ) ) {
		add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );
	}
}
add_action( 'after_setup_theme', 'twentytwenty_theme_support' );

/**
 * REQUIRED FILES
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/class-twentytwenty-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';
require get_template_directory() . '/classes/class-twentytwenty-customize.php';
require get_template_directory() . '/classes/class-twentytwenty-separator-control.php';
require get_template_directory() . '/classes/class-twentytwenty-walker-comment.php';
require get_template_directory() . '/classes/class-twentytwenty-walker-page.php';
require get_template_directory() . '/classes/class-twentytwenty-script-loader.php';
require get_template_directory() . '/classes/class-twentytwenty-non-latin-languages.php';
require get_template_directory() . '/inc/custom-css.php';

function twentytwenty_register_styles() {
	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'twentytwenty-style', get_stylesheet_uri(), array(), $theme_version );
	wp_enqueue_style( 'twentytwenty-fonts', get_theme_file_uri( '/assets/css/font-inter.css' ), array(), $theme_version, 'all' );
	$customizer_css = twentytwenty_get_customizer_css( 'front-end' );
	if ( $customizer_css ) { wp_add_inline_style( 'twentytwenty-style', $customizer_css ); }
}
add_action( 'wp_enqueue_scripts', 'twentytwenty_register_styles' );

function twentytwenty_menus() {
	register_nav_menus( array(
		'primary'  => __( 'Desktop Horizontal Menu', 'twentytwenty' ),
		'mobile'   => __( 'Mobile Menu', 'twentytwenty' ),
		'footer'   => __( 'Footer Menu', 'twentytwenty' ),
	) );
}
add_action( 'init', 'twentytwenty_menus' );

/**
 * FIXED: Re-adding the missing function that caused the error
 */
function twentytwenty_get_elements_array() {
	$elements = array(
		'content' => array(
			'accent' => array('color' => array('.color-accent'), 'background-color' => array('button', '.button')),
			'text' => array('color' => array('body', '.entry-title a')),
		),
		'header-footer' => array(
			'background' => array('background-color' => array('#site-header', '#site-footer')),
		),
	);
	return apply_filters( 'twentytwenty_get_elements_array', $elements );
}

function twentytwenty_get_color_for_area( $area = 'content', $context = 'text' ) {
	$settings = get_theme_mod( 'accent_accessible_colors', array( 'content' => array( 'text' => '#000000', 'accent' => '#cd2653' ) ) );
	return isset( $settings[ $area ][ $context ] ) ? $settings[ $area ][ $context ] : false;
}

// ---------------------------------------------------------
// PHOENIX HEADER SETTINGS (Customizer)
// ---------------------------------------------------------

function phoenix_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'phoenix_header_section', array( 'title' => 'Phoenix Header Settings', 'priority' => 30 ) );

    $wp_customize->add_setting( 'phoenix_site_title', array( 'default' => 'Phoenix' ) );
    $wp_customize->add_control( 'phoenix_site_title', array( 'label' => 'Site Title', 'section' => 'phoenix_header_section' ) );

    $wp_customize->add_setting( 'phoenix_primary_color', array( 'default' => '#00b37e' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'phoenix_primary_color', array( 'label' => 'Accent Color', 'section' => 'phoenix_header_section' ) ) );

    $wp_customize->add_setting( 'phoenix_login_text', array( 'default' => 'Inloggen' ) );
    $wp_customize->add_control( 'phoenix_login_text', array( 'label' => 'Login Button Text', 'section' => 'phoenix_header_section' ) );

    $wp_customize->add_setting( 'phoenix_cta_text', array( 'default' => 'Probeer gratis' ) );
    $wp_customize->add_control( 'phoenix_cta_text', array( 'label' => 'CTA Button Text', 'section' => 'phoenix_header_section' ) );
}
add_action( 'customize_register', 'phoenix_customize_register' );

// ---------------------------------------------------------
// PHOENIX HOME PAGE SETTINGS (Customizer)
// ---------------------------------------------------------
