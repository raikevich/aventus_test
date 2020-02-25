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
define( 'DB_NAME', 'raikevic_aventus' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'raikevic_aventus' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'K125l125!' );

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
define( 'AUTH_KEY',         'CkROiSaon1<a>W>~kK[#ub -$~Dh,{G(%S%]]vjf@wZ-,i]~UB|z2=Fs2zap000:' );
define( 'SECURE_AUTH_KEY',  '0ul5t?x>;V@FBIJR/x[p7A} [i]-tg#WB{@/#Tg<#RCWB^[nm5e6Xrr*PQ(|Lx`r' );
define( 'LOGGED_IN_KEY',    '?37v-lsAI2nrds}[OFhZy~|jf6&HD/;/G]WCySv<AXa|1q]qgMSs)9*M3-]Q}t,0' );
define( 'NONCE_KEY',        'XNB!aLBx-8W9GuuXZ^fP=wBzlXMlu!ObEtgbH4kp,m)JjJX-,[E|6S4EM(*:^sTo' );
define( 'AUTH_SALT',        '7[MHBVtly07!zTY?L OsM&OS32w-=wbkq;:],Sb$j:hARmNP?med^c,FQ/:p5|%N' );
define( 'SECURE_AUTH_SALT', 'P<7>|5 lc&_(EOiKJ+r-#X?j]b:Y>hqD:7+}.=s9H8:#pe;C*^+MaJICY5||3p*g' );
define( 'LOGGED_IN_SALT',   'dZ@# 8UlxeZ{Eqr*&OT5Ri2_Xdk,yh-MYs@pFV7y53MIwF7!8.Q:)j(D1Gic^TJ0' );
define( 'NONCE_SALT',       '=R^Ig|~;-YoV&f@JW)QQ{aMJcPGP<Oa}b;HMzbSlp`t0H FfI!ViwfzOTEZeRT?t' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'av_';

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
