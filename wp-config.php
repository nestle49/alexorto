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
define( 'DB_NAME', 'alexorto' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '1IZSQPL^oGg:ZnV{EvD{;^3/h8qA.3V?G6a!*}R%$.r!ttQ0RVGLut;>mVsJ!_@w' );
define( 'SECURE_AUTH_KEY',  'm-.JI6SH2BHBE[[m_7v:|!o*cK;[_w )38m8?pZ/v)?2k`4_I~D0Q@[bzO0vyO7L' );
define( 'LOGGED_IN_KEY',    'n%uMwWEX`!6$6.;IU$z^x?i9V8W97[wR[4hkJa!)8]S~tV*T6z,Uwhk]%;skG:s1' );
define( 'NONCE_KEY',        '![}oz(CukU+6pMUW%)MCjQzA&cY9%N2EPc<@,A)8;kB(r#{BgAU:QwBKF5eXU/39' );
define( 'AUTH_SALT',        'rJ&S)*fcizrtH$tGl$9md?aEhC3r8YAHm_BKqa$sNa!P[CJbyzG]?KF6XZVQ9;L`' );
define( 'SECURE_AUTH_SALT', 'f~2QpPs>6Wg+nh4%X#pP*,,A7CXm<r?MHVnW^_L%EUAVa_$|ga)K)hif03n61c0^' );
define( 'LOGGED_IN_SALT',   'a*p (XI,|*sg8gcBp/*I<e-R>Kc@Ut#n5m{C {1]H2ivQHxdcrh;C=2?OSA%r|C7' );
define( 'NONCE_SALT',       'X~?#O;${q}c5$F4[^+JR2,K%<t;[8X?.Y):,EFa8i;rk fwPz]vH0?0T@` ree:5' );

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

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
