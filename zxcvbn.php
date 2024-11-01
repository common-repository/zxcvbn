<?php
/*
Plugin Name: Zxcvbn - Better Password Strength
Plugin URI: http://ottopress.com/wordpress-plugins/zxcvbn/
Description: Implements the <a href="https://tech.dropbox.com/2012/04/zxcvbn-realistic-password-strength-estimation/">Zxcvbn</a> password strength indicator in WordPress, replacing the default strength indicator. Encourages your users to make strong passwords.
Version: 1.2
Author: Otto
Author URI: http://ottopress.com
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Copyright (C) 2013  Samuel Wood (otto@ottodestruct.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

// disable for WordPress 3.7 and up
global $wp_version;
if ( version_compare( $wp_version, '3.6.999', '>' ) ) {
	return;
}

add_action('admin_enqueue_scripts','zxcvbn_replace_pw_meter');
function zxcvbn_replace_pw_meter() {
	wp_register_script('zxcvbn-async', plugins_url('zxcvbn-async.js',__FILE__), array(), '1.0');
	wp_localize_script('zxcvbn-async', 'zxcvbnplugin', array( 'src' => plugins_url('zxcvbn.js',__FILE__) ) );
	wp_deregister_script('password-strength-meter');
	wp_register_script('password-strength-meter', plugins_url('pw-strength.js',__FILE__), array('zxcvbn-async'), '1.0');
	wp_localize_script( 'password-strength-meter', 'pwsL10n', array(
		'empty' => __('Strength indicator'),
		'short' => __('Very weak'),
		'bad' => __('Weak'),
		/* translators: password strength */
		'good' => _x('Medium', 'password strength'),
		'strong' => __('Strong'),
		'mismatch' => __('Mismatch')
	) );
}

