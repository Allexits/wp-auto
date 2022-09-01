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
define( 'DB_NAME', 'auto_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '$_hE3lpb8TsU?y-&2Gf13m5Bt(,$.:-`%[wh;1m&xWKlYd+Zkh91fG8+{`@C@jZZ' );
define( 'SECURE_AUTH_KEY',  'qfZ16^v? !:g[Wq3$qg/K}P#<*If4_1zBhq> _R=?F!;@B]t,S1kSQ/~z%^oC@e^' );
define( 'LOGGED_IN_KEY',    'NQ~&)YW 4U+WNIbR*/`<)9FGghn~R%o#:R,* %jGtA~5sWcg5&L^=EAl|C-|nXYH' );
define( 'NONCE_KEY',        '7Quaq?fZTfy5,dw=~V=^$+C>9V[ l%IB)K@f5sM1qe4;Wiz^Stc|7x3NzUi@w|I:' );
define( 'AUTH_SALT',        'Lq_1YZ?sVW~gH?7i8]C*xhu(DC+6~?!w]5:!G 7smgmZn!ug^(pcatm<rlk6m<RF' );
define( 'SECURE_AUTH_SALT', 'e)2U&0I^bP#^8NF!:V-h&HXi&Cth:R^GVtBtJ^-p`@iV$9,mH>>}eUk+ll!z;I`w' );
define( 'LOGGED_IN_SALT',   'p2g<mL q|Z&#My%vuZ+=T&8V>i;0(bB|CXxgXd>N:^$8Y|U2qR?^{s,rTdxkW7O&' );
define( 'NONCE_SALT',       '|^YP?M#Jcnl#I}y2|jMZ4GS^ZDmqEk|3bv;QAUNkT{O3;U1P9?pURh-_+5-|`wSR' );

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
