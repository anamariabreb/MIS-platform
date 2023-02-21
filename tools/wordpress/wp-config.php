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
define( 'DB_NAME', 'Comp4-wordpress-shop' );

/** Database username */
define( 'DB_USER', 'anamaria' );

/** Database password */
define( 'DB_PASSWORD', 'testing123' );

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
define( 'AUTH_KEY',         '}c<sa5d r]N3$vz(Z?VxD+rA3&$[M*(W,6M`(lf?K~LlC0V>qC4np/#a !(F|$DR' );
define( 'SECURE_AUTH_KEY',  'w(G~x?qn %_)R%@S=&.B_%[uSs|cC6nkvS.G[a[d*8P$`@QG*L2 <w9}6[K8@k&)' );
define( 'LOGGED_IN_KEY',    'Qn-q(9]s_luUj4oRFIr1eMP)AyF~cA9Y$t3]XsPs2T|!:[iGe<7t00yZyxX&]-5U' );
define( 'NONCE_KEY',        'Gs;ojO6G3_lWt[,[s6yd#Tx9sbR/eH;hV V58s34ebB_hsvK+=PnydaP@wf+-O1n' );
define( 'AUTH_SALT',        'mo&Cf?vCeIsB4/(++&3[]`iCu)Pmc`%Ff@YERT@l?pq!=TPdC8<<@LF$vW.fdmUV' );
define( 'SECURE_AUTH_SALT', '7H?42hj4)E5]XX8*1S|boYtfB7qQLmZ){y]emOWe@c%ou<3dq*q$Z=x&oUY;U-wr' );
define( 'LOGGED_IN_SALT',   '[7r~*ht,u^86*Y)XZK[eDhQ4M}LNBJsTC~qAv9ROr=S)rx1jCbr};6)oG@&*W{2d' );
define( 'NONCE_SALT',       'S,F}/Oqs=@G|>Abhz~JR.jM h^aiV5~+8,&%dNpV CE@{vxe|2ked_yc<g#;xUlv' );

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

/* Add any custom values between this line and the "stop editing" line. */

define( 'FS_METHOD', 'direct' );

/* That's all, stop editing! Happy publishing. */