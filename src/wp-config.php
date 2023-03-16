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
define( 'DB_NAME', 'db_wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '123456' );

/** Database hostname */
define( 'DB_HOST', 'db' );

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
define( 'AUTH_KEY',         'rf71G8&Tx|%CXoCEG *r,9G <7VOlwAMwBT/Zt D w@ZTeaBaO(rg3?t]F2^J>+@' );
define( 'SECURE_AUTH_KEY',  '35MnAN-E:(R5zSa<<Iw7DnU08-/cUDcVKGDw/Ul,B&kzJpO(MULu]t<*Rc9>1A1F' );
define( 'LOGGED_IN_KEY',    'xdKO|F+f5CB]O}y 4i3,BjO]JJD<)|j:Hi)tkPKeAJA{j6e)5#(gDG6z#S5<*:_b' );
define( 'NONCE_KEY',        '3)oU<HN7GRj&:W<?Y53G^iYg5igwPpRj0|,oO2$00Vjs|CHV5(#Tcy%:T`}e2l,;' );
define( 'AUTH_SALT',        'XYA2{]3}Kpex^GCLEz@.D_pORrX{#cI4dFn<y8fQ##9^Kp|[SfX+>0}<cc)1@CD1' );
define( 'SECURE_AUTH_SALT', 'n`;;MYZeOstYz^;_O1HLGWwu$r2wZk^tzL=.05P*.!7.Q!+A3Z=*K~*x:fk:0iy)' );
define( 'LOGGED_IN_SALT',   'JXi[-y!Xr8Qa*0k][QYQyG<k+K<9PKQV&j#4!wT^?C2PO!5f_f&:mL&l>t!FU-#z' );
define( 'NONCE_SALT',       'l1p9r93Gj z|=[M[XgT/ZL:mf1:tpdxy#/^-p8hvW6aRf|1P5b -&|M@h2`*Mt5f' );

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

define('ALLOW_UNFILTERED_UPLOADS', true);