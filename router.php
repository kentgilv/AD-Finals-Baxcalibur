<?php

// --------------------------------------------------
// Router script for PHP's built-in development server
// --------------------------------------------------
// - Directly serves static files (e.g., .css, .js, .png)
// - Forwards all other requests to index.php for routing
// - Simulates basic web server behavior (like Apache/Nginx)

require_once __DIR__ . '/bootstrap.php';

// Handle static file requests when using the built-in server
if (PHP_SAPI === 'cli-server') {
    $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $file = BASE_PATH . $urlPath;
    $realFile = realpath($file);

    if (
        $realFile !== false &&
        strpos($realFile, BASE_PATH) === 0 &&
        is_file($realFile)
    ) {
        // Let the server serve the static file as-is
        return false;
    }
}

$requestUri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') ?: '/';

$routes = [
  '/' => 'index.php',
  '/about' => 'pages/about/index.php',
  '/login' => 'pages/login/index.php',
  '/signup' => 'pages/signup/index.php',
  '/userDashboard' => 'pages/userDashboard/index.php',
  '/trips' => 'pages/trips/index.php',
  '/adminDashboard' => 'pages/adminDashboard/index.php',
];

if (isset($routes[$requestUri])) {
  require BASE_PATH . '/' . $routes[$requestUri];
} else {
  http_response_code(404);
  require ERRORS_PATH . '/_404.error.php';
}