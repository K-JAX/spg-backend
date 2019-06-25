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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'SrChH+aILG7LXEcYh7yb9za+5k07iuBjEdzyAaDatkkOhyrO5hqcOx2fNvcJB0x+pSBihEFp9RaIqmwdnfhSCg==');
define('SECURE_AUTH_KEY',  'gYZgDz78LO/XJMqEMdr5YM9S+Wt9nbctnS87yDoJgRZ7brM0R8mu4UCnj0wmPchFzWmNpYUDKrasR+UeJr8nsQ==');
define('LOGGED_IN_KEY',    'YtCwvigKyLIDwzwfUCgPg8jFzRnsbBMbIcVRrxv382JDPr75neZeMZnOsJuug89vaTlRFAutBYlprjjH91Dwog==');
define('NONCE_KEY',        'OWRBEw6TRYvI9L87w2Gq8KOxnD5YPqXmW2h6bp1/QYKP7lV0ZHsGYxgaj1zW388eIMcd6HGdOUrZZMHOzhSluw==');
define('AUTH_SALT',        'ze4lbGHGTU8OVTbQlt61ziZwlm9L6nyvyydCuk0XHtYI16hltSMRESi47oOXrzzujNltLqXe+5lHNp3Rb5+hxg==');
define('SECURE_AUTH_SALT', '5nxfUqstXj6uyetVItYmOg208SOG+Kp3MXej8D54xu2CP/guQsBoEEsJjhI51cT0lpx4XJ7DbCovIiIKZuGkXg==');
define('LOGGED_IN_SALT',   'JipGHZP7Fqpc4nWZVdEGQ2fB+eledapdFtNpcmCVmItwSyQP/AHnqrgWKPPcZ1t29zcL7AW4m3PEt2kWJvlfhA==');
define('NONCE_SALT',       'rR+MQ8f6Vhhzl1xlR2V8slcK5oKR/3kH9KCGS8zp2N+yS3fF/hr46J9DqyPv8E8Vj80v4HQCYKJyccO9XVekqw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
