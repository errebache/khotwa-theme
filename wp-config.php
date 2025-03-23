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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',          '7s[kEj;.v6s hg?KTvNw]ZNJ1`CAe6G3rMO`$JtLls/A(KtZAfjDY{R~t_T#lWAu' );
define( 'SECURE_AUTH_KEY',   ',o3^YEkt^;eO8,j-[8;3KY*l(F<@EES{)[)UDIUVd|oqv_*|JutsLY17dydG}509' );
define( 'LOGGED_IN_KEY',     'vwu$&?N2)ZBW.mls{>)ZdVS),;>]^NUbLy)<=H7&)Wc5N*h}-BS,bzg9dCFF SV(' );
define( 'NONCE_KEY',         'YD&*-l|2Ig}Q[qP;@ m`HyGVa)<3?YpQD/15jb,`Dt%4V{xKbjw9knr9+m.anI9g' );
define( 'AUTH_SALT',         '?/Dm,%D-J@l/+9d3*wJ04If*?##<A&xAWU?&|ttfb,kX%Z3C96v^-A @##}^hbvH' );
define( 'SECURE_AUTH_SALT',  's6wyGdJyi{;:^m c-dd:LAn0TNqW3,SR! RKRNI?0FiIuX?RQ^R)VQcW6Sz%0n](' );
define( 'LOGGED_IN_SALT',    'Po<xwn~%T75 yQe]-t;T<|&dY41hsHMF&nG|?57@Fe~*JV3uNsIiT(~}4io!ANsm' );
define( 'NONCE_SALT',        'qk`)<N+5;ul_U&l[]#1Q@Ps3Y5# <U>y,iLp#ot;|2u]ZSJ.d#cB.DC$N(Wig3Tk' );
define( 'WP_CACHE_KEY_SALT', 'J%!3]jyrPXd%r8z[OI08~22&}lkKOB0<8,&gRQj rRxPI:~r_h{sF^%_n&lW[+v5' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/* Add any custom values between this line and the "stop editing" line. */

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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
