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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '');

/** MySQL database username */
define('DB_USER', '');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '$$N!%$iTRMG4D!{zw~Xnw8U^]>4IAVqv lS;U|<=)q%)=v~46orKp3F=Og*iB?^Y');
define('SECURE_AUTH_KEY',  'z0(J1#Fh)3~M&%K3eHrZ|P`Q1tZQ^|QVDgw><M#0Le3ZFkrM;rmY](p{:>8;>qi<');
define('LOGGED_IN_KEY',    'O<]NwmNo-3y7TSfWXVery-I%.w3TW<E~E}!IY3~w=M=%DW$KxDW=7oNG$1f=P%.z');
define('NONCE_KEY',        'k#}E+JyzD3#Ua8hTa|Tg&[n}OeqDXa_?bTr&bI`7eRqb;fw;$TkHQHUcQ)9h+Boo');
define('AUTH_SALT',        'f)[pNR}@3~;GQh^O&m(O{>oFyGSr0-7*<h8v`I22%{y?xrc1h8@VM)J^I^13~JZL');
define('SECURE_AUTH_SALT', '#J2(av)7=#jlg@Vl7qYKp-VHWUwi{-%-?N>aFe}R jDsXHI:8uxi<(MV}>sup|It');
define('LOGGED_IN_SALT',   '?c{ZkWp!Jjb 6$&ZW[JAijna-xsJofh:h@#i[uqKl2`sG~t^d/OHbtT8(C3=7^~r');
define('NONCE_SALT',       '_KvwEWL7T;1W`G<|y%702G/IeEp~;=?Z<L:V1W?Hx2,$Jd$(cYkf4~me$P#!bG[3');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('WP_AUTO_UPDATE_CORE', false);
define('WP_POST_REVISIONS', 5);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
