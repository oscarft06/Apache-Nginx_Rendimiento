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
define( 'DB_NAME', 'wordpress_nginx' );

/** Database username */
define( 'DB_USER', 'wp_user' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

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
define( 'AUTH_KEY',         'BVq9q8L!h<g/zdctJM^@e~T^.{OJg(RHLSf~O[VLI(B/>t8XN2P+,0}fq0W+Ci4(' );
define( 'SECURE_AUTH_KEY',  '>z3&W!c8>0rpV`6M:?:vFeGoyabp#ojwS*a.t:RVS@Uq8k/vT;%nW{w^IBh>wr<A' );
define( 'LOGGED_IN_KEY',    '-ps4s#V{(:) { Njf(rPr64Im UdTqA!_v=^du;cSvYQKI:qo,y%A:2tsj#RQ9.o' );
define( 'NONCE_KEY',        'Arp[}5rXWc<h;6DJeRJUSeH50gOdN)[^9`{+tx<U_JUPh`j4=Z 4/T6C9XpW;8k0' );
define( 'AUTH_SALT',        'vCi86DHPhVi5Jz!:NBpApV^h!}~_N{aeN9_}v1POB.)qd2[Ayp|A#4*XW9fj7C){' );
define( 'SECURE_AUTH_SALT', 'p]Ev}F(HvkvW`q?!cR%s_;..Kqyvnw|6Xw+`.97=B1W5CMdT!lc_r-%c9z6Hc[Si' );
define( 'LOGGED_IN_SALT',   'Vbmws.Rr7}OVwDmxSX7YDRy}5;`<e{9srVtYF9>QDZnFdSf:$}kHQ^~Jfup%Tq>P' );
define( 'NONCE_SALT',       'iEj]n6G>n@1*<e|m=CZ,oEu[i ac;GitI>eC9Kon8m9;d qJ8PbA0qRCI)IK{RF[' );

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
