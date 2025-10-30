<?php

class Controller {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    protected function view($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . '/../views/' . $viewName . '.php';
    }

    protected function redirect($path) {
        $baseUrl = '/onlineshop/'; // Assuming the application is in a subdirectory named 'onlineshop'
        header("Location: " . $baseUrl . $path);
        exit();
    }
}

?>