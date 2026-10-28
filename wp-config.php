<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mywordpress' );

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
define( 'AUTH_KEY',         'YsEjayVpeOn7+CnDhj7,X;>o(#Zz`<6O/M6G~vkISUw}5kmvl<~%H@r$!N$;$;3L' );
define( 'SECURE_AUTH_KEY',  'X>Ac0+riWWF)>EXHU|E^y]UW/(8FM-`lyUxr^Xt/w]#YiKS[En=}bL/8|=hQx(o0' );
define( 'LOGGED_IN_KEY',    'fsEWkAFBQ,OGpNra-JHS#LNW^Y~$Pn)pPlGVr:]^11B0Vd`FeEYECK1|^:%c!CuJ' );
define( 'NONCE_KEY',        '35%5B/156IBE?7:41&3?nIYW9u($P|$G$)5~bR!7oyKxxIlX;0oG&NBt|eg|%wC@' );
define( 'AUTH_SALT',        '%)j#mCLT$C^1s#d0-0D>Kt{H5r(kbIK^a]NN3X/fj/;W?Dq( ~q0G9a>Lb83pFAZ' );
define( 'SECURE_AUTH_SALT', '`-$>hz^`tBTVFmqZMFj)$h1>Q9oK]7G 21?D8=Cquw%(#/]Br^uQHP&3!J3-/^Cw' );
define( 'LOGGED_IN_SALT',   '<Suh|%HPt+*J=XvOt(:mnU!E.j`XpFy@f?o{)Du=1ynx[~qMcV_@t=/9aWoWm.[r' );
define( 'NONCE_SALT',       'tH2z|u{T$G<hEquBYEp1fCo)jlOCPRx^5#MS%@lG1`2* 1j@]MQ$+.3#=<29I }/' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
