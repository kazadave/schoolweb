<?php
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Skrypt wp-config.php używa tego pliku podczas instalacji.
 * Nie musisz dokonywać konfiguracji przy pomocy przeglądarki internetowej,
 * możesz też skopiować ten plik, nazwać kopię "wp-config.php"
 * i wpisać wartości ręcznie.
 *
 * Ten plik zawiera konfigurację:
 *
 * * ustawień MySQL-a,
 * * tajnych kluczy,
 * * prefiksu nazw tabel w bazie danych,
 * * ABSPATH.
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - możesz uzyskać je od administratora Twojego serwera ** //
/**
 * Nazwa bazy danych, której używać ma WordPress
 */
define('DB_NAME', 'srokowo_wordpress');

/**
 * Nazwa użytkownika bazy danych MySQL
 */
define('DB_USER', 'srokowo_user');

/**
 * Hasło użytkownika bazy danych MySQL
 */
define('DB_PASSWORD', 'HasloSpsrok123');

/**
 * Nazwa hosta serwera MySQL
 */
define("INSTALL_DIRECTORY", dirname(__DIR__) . "/");
define("INSTALL_DIRNAME", basename(INSTALL_DIRECTORY));
switch(strtolower(INSTALL_DIRNAME))
{
	case "spsrokowo":
		define('DB_HOST', '10.33.64.143');
		break;
	case "spsrokowo2":
		define('DB_HOST', 's12.hekko.net.pl');
		break;
}

/**
 * Kodowanie bazy danych używane do stworzenia tabel w bazie danych.
 */
define('DB_CHARSET', 'utf8');

/**
 * Typ porównań w bazie danych.
 * Nie zmieniaj tego ustawienia, jeśli masz jakieś wątpliwości.
 */
define('DB_COLLATE', '');

/**
 * #@+
 * Unikatowe klucze uwierzytelniania i sole.
 * Zmień każdy klucz tak, aby był inną, unikatową frazą!
 * Możesz wygenerować klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generującego tajne klucze witryny WordPress.org}
 * Klucze te mogą zostać zmienione w dowolnej chwili, aby uczynić nieważnymi wszelkie istniejące ciasteczka. Uczynienie tego zmusi wszystkich użytkowników do ponownego zalogowania się.
 * @since 2.6.0
 */
define('AUTH_KEY', 'dsfj34j6hk3jh4kjhdsjkhj334dsfsd');
define('SECURE_AUTH_KEY', 'klj3456hk34jh6kjdsj23hlhj23324d');
define('LOGGED_IN_KEY', 'poioi432hgdsf89436jsdjkkh34456d');
define('NONCE_KEY', '3246hhgsddsghggh4353jhjhj213324');
define('AUTH_SALT', 'dflgjkdklj568978dfjkjhk546jkhhf');
define('SECURE_AUTH_SALT', 'fgkjjlkhj6kjhkj34568778dfjhghj5');
define('LOGGED_IN_SALT', 'fgdfjkljk45646hkh54879787897897');
define('NONCE_SALT', 'dsfjlk3456jhkh45kj44k4k5kkjhhje');

/**
 * #@-
 */

/**
 * Prefiks tabel WordPressa w bazie danych.
 * Możesz posiadać kilka instalacji WordPressa w jednej bazie danych,
 * jeżeli nadasz każdej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkreślenia, proszę!
 */
$table_prefix = 'wp_';

/**
 * Dla programistów: tryb debugowania WordPressa.
 * Zmień wartość tej stałej na true, aby włączyć wyświetlanie
 * ostrzeżeń podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby twórcy wtyczek oraz motywów używali
 * WP_DEBUG podczas pracy nad nimi.
 * Aby uzyskać informacje o innych stałych, które mogą zostać użyte
 * do debugowania, przejdź na stronę Kodeksu WordPressa.
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
error_reporting(E_All);
ini_set('display_error', 1);
define('WP_DEBUG', true);

/* To wszystko, zakończ edycję w tym miejscu! Miłego blogowania! */

/**
 * Absolutna ścieżka do katalogu WordPressa.
 */
if(!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');

/**
 * Ustawia zmienne WordPressa i dołączane pliki.
 */
require_once (ABSPATH . 'wp-settings.php');

