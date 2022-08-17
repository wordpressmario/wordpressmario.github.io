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
define( 'DB_NAME', 'portfolio' );

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
define( 'AUTH_KEY',         '&5:Hg/TbAwmUMmD~44y);(`nXws@PwWb |@AzK|pb&_1((G&+/i&vS8/7T*v!nv.' );
define( 'SECURE_AUTH_KEY',  'KU91?r:amexP_<297/UlpNX|[b!+>|6|q-w{:pq=_5v;z/ h{oRb$ULYA]U]G[r~' );
define( 'LOGGED_IN_KEY',    '/C@OD4ct*=*ZkJ==B;/E&33ngktFa#F]n  J|f_KohgC-`{%$T??DoceFv3P{tm]' );
define( 'NONCE_KEY',        'nZrIk*[p`,xP*9aQ @9Qs@N]tY!z~EF!VasI^:~vm<P4SaP-F36fyZ4UUutvqb?B' );
define( 'AUTH_SALT',        ')`8T|js@75-J6t?tAR83a!+)Zt*4i%l~xh!>(2^`b@r^0sl4<]B0%_]v=K$`-w&E' );
define( 'SECURE_AUTH_SALT', 'U?}So[ E~ *1IFw?Ce6RX?Xr+s}cEbC<G&TPO0`p4fxgpT#OcS>L{;%QV%NZg?ch' );
define( 'LOGGED_IN_SALT',   '*RBfd%@F`x9vvhJ0z:]jYFNjN]2]cL&fccgt{O{@+VCJHA{C|GWi%;itW:4!1+$s' );
define( 'NONCE_SALT',       '038aG-LRgGv+*3(B:EJCnh`nE?nG7+WPa_9W9UQ0~AWa2`1_F)pgdDm6~J%JTfZ|' );

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
