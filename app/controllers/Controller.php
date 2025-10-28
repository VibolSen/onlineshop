<?php

class Controller {
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