<?php
/**
 * Autoload
 */
require 'vendor/autoload.php';

/**
 *  Const
 */
define("ROOT_DIR", __DIR__);

/**
 *  Load Env
 */
$env = json_decode(file_get_contents(ROOT_DIR."/env.json"), false);
Flight::set("env", $env);


/**
 * Debug
 */
Flight::set('flight.handle_errors', Flight::get('env')->debug);

/**
 * Views for Flight
 */
Flight::set('flight.views.path', ROOT_DIR.'/app/view');

/**
 * Timezone
 */
date_default_timezone_set(Flight::get('env')->timezone);

/**
 *  Routes
 */
require ROOT_DIR.'/route/web.php';

/**
 *  Starting App
 */
Flight::start();

