<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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
define( 'DB_NAME', 'sanfiago' );

/** MySQL database username */
define( 'DB_USER', 'sanfiago' );

/** MySQL database password */
define( 'DB_PASSWORD', 'BTkrxlhU2AFzRFRf' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'r,mQOB?7ik!yNk,t}+bYS&C9!c+^e9Ds:uCY$?4FWtB1,u;X:Zs^D>)>K73%>!IU' );
define( 'SECURE_AUTH_KEY',  '{jLqOS:=lHu<[)H5F19FaaTbD0D]V7ywJW#:^Fpm,|+d[{-2rV.Ig>9(KaN4F-(]' );
define( 'LOGGED_IN_KEY',    '[tm1|vLo&:bS)Bx;]X1[YLrhtk_t.Zzz09{7jwMbm$X+s+S*/Fs0~|>o8./V5I5P' );
define( 'NONCE_KEY',        'Au4Z%W#GO,G}GS.y3w<$/],Bmt61+55qooVXR)R0AY%_fjEcMn>tK7> nSdzMk{Y' );
define( 'AUTH_SALT',        '4FUFM@Q7CU&$W~|MVvA`A$5$XG]j@rJZ#W#{1@+9iIcr?X0!oF3d&hk, L0(MBzg' );
define( 'SECURE_AUTH_SALT', 'xKJTCm&stN~w]R{QGF6K.gn:/>S_`]ELn+,i.lpv|eBr]Z hH1Zp#w&rI}[E]-4O' );
define( 'LOGGED_IN_SALT',   'i+&yfyCnDV6pl5b@Ojg/NrOaz4u<P*xWD.1AwBA`l9UlC%?1VM4~0d!}~MUkM-*5' );
define( 'NONCE_SALT',       '<~-DF8HX>c*oOm}5]hH08gVj W0nLd,WB<hBAxTf&p!/x5piT392W I0PsV QE>~' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
