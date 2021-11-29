<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'saasdoctor_register_required_plugins' );

function saasdoctor_register_required_plugins() {

	$plugins = array(

		array(
			'name' => esc_attr__('Saas Addon','saas-doctor'),
			'slug' => 'saas-doctor',
			'source' => get_template_directory_uri() . '/plugin/saas-doctor.zip',
			'required' => true,
			'version' => '1.0.0',
			'force_activation' => false,
			'force_deactivation' => false, 
			'external_url' => '',
		),
        array(
			'name' => esc_attr__('Revolution Slider','saas-doctor'),
			'slug' => 'revslider',
			'source' => get_template_directory_uri() . '/plugin/revslider.zip',
			'required' => true,
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
		),
		array(
			'name' => esc_attr__('Contact Form 7','saas-doctor'),
			'slug'=> 'contact-form-7', 
			'required' => true, 
			'force_activation'=> false,
			'force_deactivation' => false,
		),
        array(
			'name' => esc_attr__('Saas Demo Importer','saas-doctor'),
			'slug'=> 'one-click-demo-import',
			'required' => true,
			'force_activation'=> false,
			'force_deactivation' => false,
		),

		array(
			'name' => esc_attr__('Elementor','saas-doctor'),
			'slug' => 'elementor', 
			'required' => true, 
			'version' => '', 
			'force_activation' => false, 
			'force_deactivation' => false,
			'external_url' => '',
		),		
	);

    $config = array(
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true, 
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => true,
        'message'=> '',
    );

    tgmpa( $plugins, $config );

}