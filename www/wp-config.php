<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
#define('DB_NAME', 'putyourdbnamehere');

/** MySQL database username */
#define('DB_USER', 'usernamehere');

/** MySQL database password */
#define('DB_PASSWORD', 'yourpasswordhere');

define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'wireblog');    // The name of the database
define('DB_USER', 'wireblog');     // Your MySQL username
define('DB_PASSWORD', 'aun4eg3eep1e7o'); // ...and password
define('DB_HOST', 'mysql.wireload.net');    // 99% chance you won't need to change this value

/** MySQL hostname */
#define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',        'FEHMvo~NoyIIjX+oIbD%+-4^r[)KjVsX_$cD{^va^*A+a*azwAxiL|J+q lV]k?R');
define('SECURE_AUTH_KEY', 'a?jdevT<ta+1|[Y+yCn1gu=$;*zG-w/FW<A@DH|Y_&q].F5GCV92sQ:*6=YB$0)f');
define('LOGGED_IN_KEY',   '9p,ymszg_*=sOIEt-Imr6ZIBb$8IB+Kq6PKXLxDmauwBW4-zp-Tg!ve!sX(En!.k');
define('NONCE_KEY',       '2a%8y1ZUld86ttVjJA55jC)O:]h?~aQL[N=9dK6yLfo>~#?,&y0QY2|)Y)>^16Li');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>
