<?php

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
}

if (!defined('BASE_URL')) {
    define('BASE_URL', 'http://localhost/SaaS/');
}

if (!defined('CSS_URL')) {
    define('CSS_URL', BASE_URL . 'public/css/main.css');
}

if (!defined('ADMIN_URL')) {
    define('ADMIN_URL', BASE_URL . 'admin/');
}

if (!defined('ADMIN_PATH')) {
    define('ADMIN_PATH', ROOT_PATH . 'admin/');
}

?>