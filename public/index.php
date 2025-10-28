<?php

session_start();

require_once __DIR__ . '/../app/config/config.php';

// Basic routing
$request_uri = trim($_SERVER['REQUEST_URI'], '/');

// Remove the base path from the request URI
$base_path = 'Program/Step/onlineshop/public';
if (strpos($request_uri, $base_path) === 0) {
    $request_uri = substr($request_uri, strlen($base_path));
}

$request_uri = trim($request_uri, '/');
$segments = explode('/', $request_uri);

$controller_name = 'HomeController'; // Default
if (!empty($segments[0])) {
    $segment_0 = strtolower($segments[0]);
    if ($segment_0 === 'login' || $segment_0 === 'register' || $segment_0 === 'logout') {
        $controller_name = 'AuthController';
    } else {
        $controller_name = ucfirst($segment_0) . 'Controller';
    }
}
$action_name = 'index'; // Default action
if (!empty($segments[0])) {
    $segment_0_lower = strtolower($segments[0]);
    if ($segment_0_lower === 'login' || $segment_0_lower === 'register' || $segment_0_lower === 'logout') {
        $action_name = $segment_0_lower; // Use 'login' or 'register' as action
    } elseif (!empty($segments[1])) {
        $action_name = $segments[1]; // Use segment 1 as action if available
    }
}

$controller_file = __DIR__ . '/../app/controllers/' . $controller_name . '.php';

if (file_exists($controller_file)) {
    require_once $controller_file;
    $controller = new $controller_name();

    if (method_exists($controller, $action_name)) {
        call_user_func_array([$controller, $action_name], array_slice($segments, 2));
    } else {
        // Handle 404 - Action not found
        echo "404 Not Found: Action ".$action_name." not found in ".$controller_name;
    }
} else {
    // Handle 404 - Controller not found
    echo "404 Not Found: Controller ".$controller_name." not found.";
}

?>