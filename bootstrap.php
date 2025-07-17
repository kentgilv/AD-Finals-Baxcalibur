<?php

// This is used to initialize the application's environment.

//  - Loads environment variables (e.g., using dotenv)
//  - Sets up configuration settings.
//  - Includes autoloaders (like Composer’s).
//  - Prepares database connections or other services.

// Acts as the entry point for shared setup logic needed before the app runs.

define('BASE_PATH', realpath(__DIR__));
define('ERRORS_PATH', realpath(BASE_PATH . '/errors'));
define('COMPONENTS_PATH', realpath(BASE_PATH . '/components'));
define('PAGES_PATH', realpath(BASE_PATH . '/pages'));
define('HANDLERS_PATH', realpath(BASE_PATH . "/handlers"));
define('LAYOUTS_PATH', realpath(BASE_PATH . '/layouts'));
define('UTILS_PATH', realpath(BASE_PATH . "/utils"));
define('STATIC_DATAS_PATH', realpath(BASE_PATH . '/staticDatas'));

chdir(BASE_PATH);

require_once BASE_PATH . '/vendor/autoload.php';
