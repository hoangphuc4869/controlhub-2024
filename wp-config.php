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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'controlHub' );

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

define( 'FS_METHOD', 'direct' );
define( 'ALLOW_UNFILTERED_UPLOADS', true );



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
define( 'AUTH_KEY',         'MRfAwq}GL8twuGklb;2WTKfV<b.J/jXuG4<<!^&o6F(X;~%Z7w)XVptIo^sO~7uz' );
define( 'SECURE_AUTH_KEY',  'Gz|o.&$=q2Cb?Ly% urgT 6aDUbrM9XLFkK[A6*We(i}HDr/$p1?_GPYg9b,;u%%' );
define( 'LOGGED_IN_KEY',    '=L%~ef,iiBs&KG;v98As<gbT%2> 5^%r_5Yri.gq:=B@K5rypN~l1zSesoD)u*tv' );
define( 'NONCE_KEY',        'nR$_O%no_1~-ubUdg,)kY@InpA8Zp3iEZKKHvPM%37sH`$`1kZi2wE8X/NV|WR@a' );
define( 'AUTH_SALT',        '&5dW~@=Be^S8.3)u1fF^J]KXvJqa6/R/<Nsk3,f#G8O|,pN;qzNXEr2gQBp&;pY4' );
define( 'SECURE_AUTH_SALT', '*+xK<i.5d#fy6fET+=Ijedfo4pQLf)/^WTgq-9+@ ?]S$bD,?JFRgN7(i_kt!iP9' );
define( 'LOGGED_IN_SALT',   'zbjKG+A/=lGf]!=szk{kq3 xLY%Axopcw)Qx<lv=9t@8ZhHZ!(CI#gp]lBG8^;Ms' );
define( 'NONCE_SALT',       'Vcau POdB$TQ>o81bhrU-rz5lA53g6SA/:3v78OlSQC7N#TuK|ztvy,518+<*2/B' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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