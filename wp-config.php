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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wunderman' );

/** MySQL database username */
define( 'DB_USER', 'wundermanU' );

/** MySQL database password */
define( 'DB_PASSWORD', 'zPYpa7JRWlwooXeR' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '(9DQMkw|+]$/ 3IvR@>-f.k~jAK}Q%CMSzVf_$Fd5%zhHs|z)RWe:zY-Q?J$r>lv' );
define( 'SECURE_AUTH_KEY',  'kIVzU_6`.l<mA}uu.w&E2,C41DkTr]H|+@:n$ lq.=a1^Dwo_3T}(m`MmEy`=zgX' );
define( 'LOGGED_IN_KEY',    'nDuj~~~M&=(x{6n#~W^I0;clC!%W*l SmhahG0C .kJK^_`Q4.kfGx4o^ F91S!J' );
define( 'NONCE_KEY',        '.w8dSfMY|M=EN%79i<j,(c|-*++p2IteH`<my=JMGC+LFO)a7-0SVJ)E,Z`Kxk?Y' );
define( 'AUTH_SALT',        ':>$3#?/[ /OKkh1Ha{d~wuY[i=|{wScGj%DDr4qu.lYAmW>v7h2jj/rk,0S{YGM!' );
define( 'SECURE_AUTH_SALT', 'l$dAJXhW=<oym5RN%unx{d|tPT(3 -dkH.M1u%VgCp8w%UYBBab.8>~S9%f9j%.-' );
define( 'LOGGED_IN_SALT',   ':pYA/p7f()GcSv`yO]OlxORI}l-z(Mw3mdJkfmCY@QDA2*fD#E_y:nZ<w2;e,AeO' );
define( 'NONCE_SALT',       'eW3LI55AzNg[Yd^:#{-97ktN4IMC{Ma+GD_8~<iqAd4ryh9 MCqv6}t:flNlF?4K' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wm_';

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
