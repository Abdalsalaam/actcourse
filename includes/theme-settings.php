<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Hook to add the menu page
add_action( 'admin_menu', 'actcourse_register_settings_page' );

/**
 * Register the custom menu page
 */
function actcourse_register_settings_page() {
	add_menu_page(
		__( 'Act Settings', 'textdomain' ), // Page title
		__( 'Act Settings', 'textdomain' ), // Menu title
		'manage_options',                   // Capability
		'actcourse-settings',               // Menu slug
		'actcourse_settings_page_content',  // Callback function to render the page
		'dashicons-admin-generic',          // Icon URL or Dashicons class
		25                                  // Position in the menu
	);
}

/**
 * Callback function to render the content of the custom settings page
 */
function actcourse_settings_page_content() {
	?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Act Settings', 'textdomain' ); ?></h1>
        <form method="post" action="">
			<?php
			settings_fields( 'actcourse_options_group' );
			do_settings_sections( 'actcourse-settings' );
			submit_button();
			?>
        </form>
    </div>
	<?php
}

// Hook to initialize the settings
add_action( 'admin_init', 'actcourse_register_settings' );

/**
 * Register the settings for the Act Settings page
 */
function actcourse_register_settings() {
	register_setting(
		'actcourse_options_group',
		'actcourse_setting_name',
		array(
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_email',
			'default'           => ''
		)
	);

	add_settings_section(
		'actcourse_section',
		__( 'Act Settings Section', 'textdomain' ),
		'actcourse_section_callback',
		'actcourse-settings'
	);

	add_settings_field(
		'actcourse_setting_field',
		__( 'Custom Text Field', 'textdomain' ),
		'actcourse_setting_field_callback',
		'actcourse-settings',
		'actcourse_section'
	);
}

/**
 * Callback function for the section description
 */
function actcourse_section_callback() {
	echo '<p>' . esc_html__( 'Enter your settings below:', 'textdomain' ) . '</p>';
}

/**
 * Callback function to render the setting field
 */
function actcourse_setting_field_callback() {
	$value = get_option( 'actcourse_setting_name' );
	?>
    <input type="text" name="actcourse_setting_name" value="<?php echo esc_attr( $value ); ?>" class="regular-text">
	<?php
}