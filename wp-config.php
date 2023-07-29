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
define( 'DB_NAME', 'gy_business' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '+uPimNjpD%zEery#BQ1yPBNRsp9|C/5Q06<0-YtjL3#P+H!$g)6Q7a&3; W k?|_');
define('SECURE_AUTH_KEY',  'Y-RH/yuAk@ c|QED6=3N$0RPZycF!Mr{<zSW|C*%kH1BM. c5ej5!>+ ZIXh9%] ');
define('LOGGED_IN_KEY',    'wpo+-4l)wJfXyOgPDRerZv+$BAlk8f>`$?$ ,;l^Qrig@SrHN 4dD;QevIi8[@v]');
define('NONCE_KEY',        'g]X;BEkOm?Lt@Y,VItEz*);15:{D&&uC7e9|(j(+iL9Pz+0Ob1uWZ* |7eo$<})/');
define('AUTH_SALT',        '-o:4i3Ur!8lhx8hH5ALwxNyN>LL>]{|sWm##3/@9;-rVBug<kK_v7SfgHN1!DGf+');
define('SECURE_AUTH_SALT', 'e6I=aath253=[1j_J{fE2Nj[[Ll@mA&I(+<2)CLTb^Cx@$ mPrYs|I?Mfb[~|!8?');
define('LOGGED_IN_SALT',   '_v[y0z@}8vMrVf%9C,_4KX+k=PGsy;|AeBj@ZI+Y,0O!n}2LVoD4HU?P+f|TAaBZ');
define('NONCE_SALT',       'DBqfKhkonoWGcYcF2F4}~]OP&Aygp[Z-,/@PE|+L|^WQl}|?{xh9`K:D{:U+EY(N');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'gy_business_';

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
