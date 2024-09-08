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
        <form method="post" action="options.php">
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
	// Add settings section
	add_settings_section(
		'actcourse_section',
		__( 'Act Settings Section', 'textdomain' ),
		'actcourse_section_callback',
		'actcourse-settings'
	);


	// Register phone field.
	register_setting(
		'actcourse_options_group',
		'actcourse_setting_email',
		array(
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_email',
			'default'           => ''
		)
	);

	// Add email field
	add_settings_field(
		'actcourse_setting_email_field',
		__( 'Email Address', 'textdomain' ),
		'actcourse_setting_email_field_callback',
		'actcourse-settings',
		'actcourse_section'
	);

	// Register phone field.
	register_setting(
		'actcourse_options_group',
		'actcourse_setting_phone',
		array(
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => ''
		)
	);

	// Add phone field
	add_settings_field(
		'actcourse_setting_phone_field',
		__( 'Phone Number', 'textdomain' ),
		'actcourse_setting_phone_field_callback',
		'actcourse-settings',
		'actcourse_section'
	);

	// Register address field.
	register_setting(
		'actcourse_options_group',
		'actcourse_setting_address',
		array(
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => ''
		)
	);

	// Add address field
	add_settings_field(
		'actcourse_setting_address_field',
		__( 'Address', 'textdomain' ),
		'actcourse_setting_address_field_callback',
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
 * Callback function to render the email field
 */
function actcourse_setting_email_field_callback() {
	$email = get_option( 'actcourse_setting_email' );
	?>
    <input type="email" name="actcourse_setting_email" value="<?php echo esc_attr( $email ); ?>" class="regular-text">
	<?php
}

/**
 * Callback function to render the phone field
 */
function actcourse_setting_phone_field_callback() {
	$phone = get_option( 'actcourse_setting_phone' );
	?>
    <input type="text" name="actcourse_setting_phone" value="<?php echo esc_attr( $phone ); ?>" class="regular-text">
	<?php
}

/**
 * Callback function to render the address field
 */
function actcourse_setting_address_field_callback() {
	$address = get_option( 'actcourse_setting_address' );
	?>
    <textarea name="actcourse_setting_address" class="large-text"><?php echo esc_textarea( $address ); ?></textarea>
	<?php
}
