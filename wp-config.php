<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

if (isset($_SERVER["DATABASE_URL"])) {
  $db = parse_url($_SERVER["DATABASE_URL"]);
  define("DB_NAME", trim($db["path"],"/"));
  define("DB_USER", $db["user"]);
  define("DB_PASSWORD", $db["pass"]);
  define("DB_HOST", $db["host"]);
  define('DB_CHARSET', 'utf8');
  define('DB_COLLATE', '');
}
else {
 die("Your heroku DATABASE_URL does not appear to be correctly specified.");
}
/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'xD+$e=sRT6 ,?0(evG?&f9#x5qi){u6hn>`31S=ZJk8:eA9A.)`i.|}?niddprNc');
define('SECURE_AUTH_KEY',  '>,fTp~Pox[^3YT7uq_NWI+!;%*#loy55$_/a-XttOYtF#7@C|(2]zHeeI7}rjgb+');
define('LOGGED_IN_KEY',    '{J[+|-[3L(U^1t8my-n:q.;WA;#TEg50N;hy*y46BnYV~|v.lc#6/3MyCw02K#l+');
define('NONCE_KEY',        'u;:J~~h.SdK!j_VlKs^[YXcnDXW2B(-M3Brw3_FYQI6NlW=>d+SAbuQifqPw) eO');
define('AUTH_SALT',        '{H&)1oU5p j%0+ofw&Jk.~F48B}~TPPf!-j|jBNt[rnD+,Sp^^0ix`IVWQfT=@]m');
define('SECURE_AUTH_SALT', 'ers+AHnzN;(AJ#]%`xoaEd<C&~j`t>U,z>I^g/Iz~f0d99Cm<Xi{@9!c3EuW?*l#');
define('LOGGED_IN_SALT',   'dr{YH-3bBEONq*.#M3|-[Z|qX[$eNRB,w9H[WcK=($8C&QJO5XkZ}Ti{O}WW|{:+');
define('NONCE_SALT',       'jBF C05a8F-I}n2.(7OMt;@a~wER*=,-P`H9,a~i6^@wJZr,yv6wu=?[]Tf< 0&b');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

