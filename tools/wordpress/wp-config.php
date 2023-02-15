<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Comp4-WordPress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'cZLZZ:KuE/j6l{XFvY%wBZ~?A5blno;lrT&ipaDk]0(3D6@i<0)Kd-~#:aeei41^' );
define( 'SECURE_AUTH_KEY',  '~3X(~nD^^L1j~A>{JV3Ylq@jx4[.$Hbn^3BJptb6A{_wvUUW;*U71Tnh)W&k/ L&' );
define( 'LOGGED_IN_KEY',    'JA+Y)nCPJ{{RcA&?`c6%7`U2gTuiyrXoJ +[J_V)jMjQQhm`~Uu;HRbWrcPy[.0P' );
define( 'NONCE_KEY',        'bkb{E;w8_?CeA`5@xDSe1=bi9<xz{9g+2](GVd#GK~Ph|yLBB&67D;7qqk?s}<f&' );
define( 'AUTH_SALT',        'bGQj3So#Z>G_B,@-]}h)($ O]mM 42pLdYowIha%:u&8>ZDua0U;sP(IXn7E;mS*' );
define( 'SECURE_AUTH_SALT', '%{Ju#kO^`~eAwJ(@oU>tSV&* bGYm~)gKL{g(5T55*QDdsAQK+++oC(8oCy$|Wq6' );
define( 'LOGGED_IN_SALT',   'F6JA_}6B[c-5{wZVxgHD:[f}[IhV[*G/8?1#~U_31,I-/;Rc-1^_0Qmj`L:|0]W9' );
define( 'NONCE_SALT',       'dM(26C`M{i>er?2o%(PMg5<Q.KH?NVEa+#mYNW8y<h<?gEUA|wF-6#Q&oSY##s(s' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
