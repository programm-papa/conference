<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'family53_confere' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'family53_confere' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'JaRq6lCh' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '2zf;DTP8[P}n`y?G{`|2k= s*5eD5?2K,yIp*%E7_U|A_?@GH,U#r==e,Kiwy#k[' );
define( 'SECURE_AUTH_KEY',  'utX6 V2%En|-AT9a_C{d9+YX.SL%<x#rq/E+ ZR[et{tb2cnSCDWRj9.vO`:Qa4o' );
define( 'LOGGED_IN_KEY',    'tX%!#=@remj%9> Q`#|oe0lR|OJew`<5TB#Tr3koi6+Pi*|@qD%igOeM/)iqWB_4' );
define( 'NONCE_KEY',        '(qE=-;K@cT3sL|+g0%rL~C9{{|zYT#d!Wp(4?VA%15ip *AR;C$D_`vUt#]_^H`o' );
define( 'AUTH_SALT',        'f-[~Saba*>mA9S7kIy[,k!<r39eg2t9Cy?Uya?<in#F*s2{sSY_UljQ~JFSeo%*<' );
define( 'SECURE_AUTH_SALT', '5 M5_@dlfx_Ai}8/ypT+wD%c^1ADbkSe&Kv~ZCn3<R=:xfBVhK!$U80g3-wq%Le#' );
define( 'LOGGED_IN_SALT',   'mcF]2I&4[Jib#WLN/T4x& 5@Mtt8x`/4U@eWfK{fWK@J|qKg5qh|Qv|oAm9vB{7;' );
define( 'NONCE_SALT',       'HIAMz6+3fCA2LeGwmv]`8Em0y]rhW-Fjp~(3^/{7^6e%1qVn,KT!-u,uT77F&rda' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
