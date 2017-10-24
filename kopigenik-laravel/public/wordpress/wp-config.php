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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

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
define('AUTH_KEY',         'dK6=3[KR=!xWx.y{Hww%Dxa~1RH(7JBb^n7!wp9hi~tu5P{&Si!z/S-gpW]~p3KV');
define('SECURE_AUTH_KEY',  '>LXs!gXF<>%S |g^|M_Y|COOk#s$wN0M+aazW?(NA=7$vw0_` IG!Ze)c%z?#Nh[');
define('LOGGED_IN_KEY',    'de8PVn>yw8eqNyEc>4NX?0M{Er_8|i=1W@ijQSRz.S(v/>V$JP^exrytaGn,d(b ');
define('NONCE_KEY',        '$LmRZu<>,8Rf)n_eZPUuavot(PA%V}- 6/|=rrdMIQzcfxU$]pfcuh??ewo#ERG ');
define('AUTH_SALT',        'xHif9hL!x17T#KKI)ujD0W~%1oOUxn=>>xSN9vvXd{f348f#qCA9|&$LW&;DQm~d');
define('SECURE_AUTH_SALT', 'p=X>{q6NmT%s=Yi7!gPjr;KxE5cEl?~ _Sy2lHYL$V|c=nju`dncUV-9RMRdTVKz');
define('LOGGED_IN_SALT',   'OkQ,zR7,Jc%H?7,UXAocClCzC:^jxuV{.Gj|a~ {olBznXPd=>n#n?}QeDijQ.U.');
define('NONCE_SALT',       'Cn,*v`I`=Nce!uthG*l8K|Np;{BmaPg86]I%]VSq|#]p(:KCQ5JsOH<|D;vMB,5T');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
