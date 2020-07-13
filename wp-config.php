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
define( 'DB_NAME', 'infinum_wp_test_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '>#*kpw{XR]`lpJJN,*CnV7%A[mMnZu>DIZY>-!JRXNUJ7|{-ZEXRXu8pgL31EK|m' );
define( 'SECURE_AUTH_KEY',  '8A7P)`P+`C`(Uk]-J1ncL@0y@+G2-. XC_f%mE?iv7y<[En:_I<NSjfCc71%Y|]k' );
define( 'LOGGED_IN_KEY',    '{M,`hK<7*>()*T[+X_7k*G(C/P|YTT*CKniaGCJk{q4kv{[`vtE[h*LE`UAO]!qr' );
define( 'NONCE_KEY',        'p~a 3.jCkMcKY(Y1!bR^/TAi_/B@>5r$Fr-MY7DUYRlH8{EjXOrU0 Z4zz<Lx8n?' );
define( 'AUTH_SALT',        'E$h[sQ6v<m)&8+B#0gcv2aA`82SWV+0<T8amb?(mU08yOd)orX=GYS(jAYK1CN2r' );
define( 'SECURE_AUTH_SALT', 'xqTWviD-VmX23)k,0LrD(*&<k2,5%,0QHJ8tvMVWaN<}}nL{8vb5P wB0LLB_r0$' );
define( 'LOGGED_IN_SALT',   '$30Lv| /s1nvpY=3bL2&M5Rp3~)l/v:,l8B*SB5U3bIO}(j~mIdC2K|$n?<tze?1' );
define( 'NONCE_SALT',       'E9}<OXl #A(4ZV;>tLo.&+sgU}!54uvFHu)#92<)`_=8DIqSyM58pcd~DW5kR)5U' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_uniduck_theme_ver1_';

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
