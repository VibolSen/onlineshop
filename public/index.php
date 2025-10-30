<?php

session_start();

require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/controllers/Controller.php';

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
$action_name = 'index'; // Default action
$params = []; // Initialize parameters array

if (!empty($segments[0])) {
    $segment_0 = strtolower($segments[0]);
    if ($segment_0 === 'login' || $segment_0 === 'register' || $segment_0 === 'logout') {
        $controller_name = 'AuthController';
        $action_name = $segment_0;
    } elseif ($segment_0 === 'profile') {
        $controller_name = 'UserController';
        $action_name = 'profile';
        } elseif ($segment_0 === 'admin') {
            $controller_name = 'AdminController';
            if (!empty($segments[1])) {
                if ($segments[1] === 'products') {
                    $action_name = 'products';
                } elseif ($segments[1] === 'createProduct') {
                    $action_name = 'createProduct';
                } elseif ($segments[1] === 'editProduct' && isset($segments[2])) {
                    $action_name = 'editProduct';
                } elseif ($segments[1] === 'deleteProduct' && isset($segments[2])) {
                    $action_name = 'deleteProduct';
                } elseif ($segments[1] === 'categories') {
                    $action_name = 'categories';
                } elseif ($segments[1] === 'createCategory') {
                    $action_name = 'createCategory';
                } elseif ($segments[1] === 'editCategory' && isset($segments[2])) {
                    $action_name = 'editCategory';
                } elseif ($segments[1] === 'deleteCategory' && isset($segments[2])) {
                    $action_name = 'deleteCategory';
                } elseif ($segments[1] === 'users') {
                    $action_name = 'users';
                } elseif ($segments[1] === 'editUserRole' && isset($segments[2])) {
                    $action_name = 'editUserRole';
                } elseif ($segments[1] === 'orders') {
                    $action_name = 'orders';
                } elseif ($segments[1] === 'editOrderStatus' && isset($segments[2])) {
                    $action_name = 'editOrderStatus';
                } else {
                    $action_name = $segments[1];
                }
                $params = array_slice($segments, 2);
            }
            } elseif ($segment_0 === 'cart') {
                $controller_name = 'CartController';
                if (!empty($segments[1])) {
                    $action_name = $segments[1];
                    $params = array_slice($segments, 2);
                }
                } elseif ($segment_0 === 'checkout') {
                    $controller_name = 'CheckoutController';
                    if (!empty($segments[1])) {
                        $action_name = $segments[1];
                        $params = array_slice($segments, 2);
                    }
                } elseif ($segment_0 === 'order') {
                    $controller_name = 'OrderController';
                    if (!empty($segments[1])) {
                        $action_name = $segments[1];
                        $params = array_slice($segments, 2);
                    }
            
            } else {
        if ($segment_0 === 'product' || $segment_0 === 'products') {
            $controller_name = 'ProductController';
        } else {
            $controller_name = ucfirst($segment_0) . 'Controller';
        }
        if (!empty($segments[1])) {
            $action_name = $segments[1];
            $params = array_slice($segments, 2);
        }
    }
}

$controller_file = __DIR__ . '/../app/controllers/' . $controller_name . '.php';

if (file_exists($controller_file)) {
    require_once $controller_file;
    $controller = new $controller_name();

    if (method_exists($controller, $action_name)) {
        call_user_func_array([$controller, $action_name], $params);
    } else {
        // If no route matched, show a 404 page
        http_response_code(404);
        require __DIR__ . '/../app/views/404.php';
        exit();
    }
} else {
    // Handle 404 - Controller not found
    echo "404 Not Found: Controller " . $controller_name . " not found.";
}

?>