<?php

/**
 * data
 * return vardup and die()
 */
if (! function_exists('dd')) {
    function dd($data = null) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }
}

if (! function_exists('view')) {
    function view($master = '', $data = []) {
        if (! file_exists(__VIEW__ . $master . '.php')) {
            throw new Exception('File view ' . $master . ' not exit');
        }

        extract($data);

        require_once __VIEW__ . $master . '.php';
    }
}

if (! function_exists('redirect')) {
    function redirect($url = '/') {
       header('location: ' . $_ENV['BASE_URL'] . $url);
       exit;
    }
}

if (! function_exists('makeSafe')) {
    function makeSafe($data = '') {
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }
}

if (! function_exists('json')) {
    function json($data = null) {
        header('Content-type: application/json');
        echo json_encode($data);
    }
}

if (! function_exists('old')) {
    function old($key) {
        echo $_SESSION[$key] ?? '';
        unset($_SESSION[$key]);
    }
}