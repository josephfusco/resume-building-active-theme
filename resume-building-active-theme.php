<?php
/**
 * Plugin Name:    Resume Building Active Theme
 * Plugin URI:     http://github.com/josephfusco/resume-building-active-theme
 * Description:    Quickly jump back into building an active Upfront theme from the admin toolbar.
 * Version:        1.1
 * Author:         Joseph Fusco
 * Author URI:     http://josephfus.co/
 * License:        GPLv2 or later
 * License URI:    http://www.gnu.org/licenses/gpl-2.0.html
 */

function rbat_add_toolbar_items( $admin_bar ){

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$theme = wp_get_theme();
	$theme_template = $theme->get( 'Template' );
	$active_theme_dir = basename( get_stylesheet_directory_uri() );

	// only show if upfront theme is active
	if( $theme_template == 'upfront' ){

		$admin_bar->add_menu( array(
			'id'    => 'resume-building-active-theme',
			'title' =>  '<span class="ab-icon dashicons-hammer" style="top:1px"></span>Resume Building ' . $theme,
			'href'  => home_url( '/create_new/' . $active_theme_dir ),
			'meta'  => array(
				'title' => 'Resume Building ' . $theme,
			)
		));

	}

}

add_action( 'admin_bar_menu', 'rbat_add_toolbar_items', 100 );
