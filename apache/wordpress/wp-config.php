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
define( 'DB_NAME', 'wordpress_apache' );

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
define( 'AUTH_KEY',         'N aDF_yC)W.PUhEBuOAL}/cXH9Y,v6Y<,n%oCQ9Lg?kslT7NP{IO)%tajcKdR60H' );
define( 'SECURE_AUTH_KEY',  ';_EId=2@}Aco^oFdn@XIwvinYyO,p6lD_%4JiuFTiq!q?SULM4Bi:J zH7cm6j-i' );
define( 'LOGGED_IN_KEY',    'NV$|^_Meb4It4iHnA%l[oP|Z0qb].V<{*?t?T+@Zoh6/B;gO=>*fP^%+gve(zy.d' );
define( 'NONCE_KEY',        'Dj)J s)zZDY^!%,In=ir^v.gCa}!cXPvL5uhn3BA2.b5XHWVL(T<Wv/z>h<;kz1]' );
define( 'AUTH_SALT',        'UHU1r?$E OiGzF4Merv:Uy6;3 m;%6C E4#!9p;H;g^EG&QDSy- &`18}&-$&UR(' );
define( 'SECURE_AUTH_SALT', 'GC(Mn!8D 7kr&^hZ.TLBif9#pdCC_JX/#vZD4o!?{z/~+]dZteI|hY*aGe;a~c#Z' );
define( 'LOGGED_IN_SALT',   '^a)%,H5-7pU13LDI<*69/Py$h3^7sSsam%~x<[hf5/0{Vo-uKaQJG2eJDY29aenj' );
define( 'NONCE_SALT',       'Xi{_3*37&?8axK=.6h9dWW+;/h|)vyHhpMN<mMD_KrB,-!0l -Vji;&MUHqa}OOH' );

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
