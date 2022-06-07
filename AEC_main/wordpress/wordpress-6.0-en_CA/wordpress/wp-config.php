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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'EjBt& nmx!J<.(lF{BX_onjCRlyCA{D!w{::knM,;x;~zyV}T8(ygfGW{;<xd{a0' );
define( 'SECURE_AUTH_KEY',  'hp8llfA*uyuLC`?Y<nD*a&mp(td!us(kAc,c|{eHAa]8S-:xo^cz/S3B3r6U#Cen' );
define( 'LOGGED_IN_KEY',    'Sdorl/F7wI3xc?tx^^lM5{?Ka#A~tJjX:7Da.DJOY}:]>6V$e1D;10u/iiVLc`2K' );
define( 'NONCE_KEY',        'X)aS=F%H1a0JvT8BLSdy!y0+H51|/kt.J^%0z~PA[Z8zUo,+ dg|v3s{S<mF5o[^' );
define( 'AUTH_SALT',        'LV5ivF}zob>udDqJWvQz>]PVx2^1Xl|j+$aDOeKpomu%)NH,5jOm6V4HtG]gf=A ' );
define( 'SECURE_AUTH_SALT', '68!z|>(wzyIwi5v[ynV<Mnc7HQEn`F>H[[gM$`{WH!.&VDsu{|<mNJGA>%twXxSt' );
define( 'LOGGED_IN_SALT',   '&(eC(SuENa$lY>(|ZeWhRl0|*|]m(_F]ynEn%MF.eMHf6fbiO,J|rUd~oW+b^&8#' );
define( 'NONCE_SALT',       '$|~p*jUgX$/!OKOV7>+X<f*hd_qO>XgS(binM;3HwMMuthBVBI@o^7Pv}Y.Ux7GE' );

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
