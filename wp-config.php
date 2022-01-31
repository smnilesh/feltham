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
define( 'DB_NAME', 'feltham2' );

/** MySQL database username */
define( 'DB_USER', 'feltham2' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mK4XN@j54NaUU87' );

/** MySQL hostname */
define( 'DB_HOST', 'searchmantrainc.fatcowmysql.com' );

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
define( 'AUTH_KEY',         '}%@4fpg}DI}blisJ|qqtsl<QYo`1!GEY $OPsNWBxgcaI459<w 7UD<w*msR%T;(' );
define( 'SECURE_AUTH_KEY',  '|G9u83s-^_m>H#b.OSj`j5l=.jb*!N~/W5kat|HEQp[G,X0wufbmIS~?F7*=jc[J' );
define( 'LOGGED_IN_KEY',    '+U,E)%@q]!5/F~g{pb1p:XT`WH-Sd5Hk=9bm|dt.#<3)Rz2^AAL)$*u-1Pk5RThi' );
define( 'NONCE_KEY',        'i ?8(s_{Sc]qpdK-F{:N<%Zw@[;rVsoOZ6wxw#?!rF/@KCg|/+O(%8-xuxqvSR- ' );
define( 'AUTH_SALT',        '*z ]~@onUUMD]]1|_d5Q%x8+KE!DbbrM{iM}kCaNUMZz8G:pd0T%5xZCU]OF*=d/' );
define( 'SECURE_AUTH_SALT', 'aE!]$l.>)=> P[B=;n|RzK<!w:LOCv1*6E2dFKA~WR(n%yy<>e)qJdvWf-_l~C{1' );
define( 'LOGGED_IN_SALT',   '#<VO1>:G>G0cZtebXDHNW#L {6}{p)Q_Z]=Hq_i3h5iqpewkO^?qCJ-8|?~U,4!`' );
define( 'NONCE_SALT',       'dN7gi^j*$;rl99_^^$18meC6jZ 2bv8|VkA$e4DTA@pDNqo^s,senwg3yFdhy;m1' );

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
