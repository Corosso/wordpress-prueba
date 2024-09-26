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
define( 'AUTH_KEY',         'HdIAAwnrAKX4zrT%bR5}{E:WF<nvB==,Gwyo}^qE#V=Hh$bm^p2/mSx,dlJ^_>-M' );
define( 'SECURE_AUTH_KEY',  '|/%TN#)=adxxNYky>m:#+NnhS&pzURqgRKrwNfiR7sOm6&zV^E!a4`>)Ue[&;j63' );
define( 'LOGGED_IN_KEY',    '*hl{KE$:Hp6nh]fK#KDD3h%`[U]QMe*Th<e.:@{99 Wv3>g)nkAl0Z6UfNH@:8hc' );
define( 'NONCE_KEY',        'Ut[LrklC:p:_Tgl T&{#o%cDJ4nXO(+f/g{Q?W];TSGZ^KM@&tvpiDST~Z;w9]At' );
define( 'AUTH_SALT',        '~A6*1c&DJ4:up#P9pr23`ue%e:-l7,wQ*`VYQN<D~EM*mxi;JzIx$_$Yq/RcpSHw' );
define( 'SECURE_AUTH_SALT', 'T1Lo<..%s&m,qZ2phv9NQQhJ,UXva#^9%e%%HQS)6l1R~t?r=n/#u;}jl|IW<v5t' );
define( 'LOGGED_IN_SALT',   'l!6R=9~FC;66ZhT{gAZ4=S>LG,e@mde^dB1`.yM#jdQgLJY!qT/q !BmiH4 !<IM' );
define( 'NONCE_SALT',       'b*tH^,^B=7,a.B|U4!GbU/;{ysIf-aDYdUZ:xM}5E$#QRP6)bR6.f_UvRo2YjcSJ' );

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

define('UPLOADS', 'wp-content/uploads');
define('UPLOADS_PATH', WP_CONTENT_DIR . '/uploads');
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);