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

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'bd_energia_renovable');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'admincicy');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'cicyadmin2013');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '3z)_,3u!+r{Cn&(*MkwKzDB:$264z1H?Xf)wh|$3k *s^{ZG$/rhC7i8^djX<b3E'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', '^^tEx%J[,V3P1][9bBMb#6~3i,>3!I_Nvz1.h+ld;H=>#vD@fuXFSs~f*1QV>9%q'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'f/SMe`JV~Daj*1Ts)n^<8bG#98:1hP4snGFr}32*<9@gz!LowoJ1.;D^[EF@a&4:'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', '*|C;$8Iq`.:<6cPh6o)*dtWsVM%T<_6PQOVx|^@L:4pq{7w}9E]$g;01KY~$yjm/'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'c`LDf@Zv:OanBk3jB.BVd24l,bvW N fJ^w>+,O8~@CB$58G`P>0ErW*_dh=(t0X'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', '[A!bT=X2%r1mfOg(cX@xTd0JU W=aca4:XIie^u<_&_P5z9xgnjq;JPF&ISU^Ge{'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'lz(G{t[mWQd8jq/2-Hk#4z|_-1uE{Jb]?JNAqkI4z*eQ3+=h%B`V`VG9a4x<|M. '); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '>bLuMGQOb)k>4eDn5F#G2,!Z4uA9/FubibvRz7TDOC4g1R3}JV:j@Z5n4J/=Wf-.'); // Cambia esto por tu frase aleatoria.

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

