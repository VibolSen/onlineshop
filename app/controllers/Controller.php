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
        header("Location: /Program/Step/onlineshop/public/" . $path);
        exit();
    }
}

?>