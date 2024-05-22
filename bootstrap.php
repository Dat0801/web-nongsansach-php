<?php 
define('__DIR__ROOT', str_replace('\\','/',__DIR__));

// Xử lý http root
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
}

$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(__DIR__ROOT));

$web_root = $web_root.$folder;

define('_WEB_ROOT', $web_root);

// Tự động load configs
$configs_dir = scandir('configs');
if(!empty($configs_dir)) {
    foreach($configs_dir as $item) {
        if($item != '.' && $item != '..' && file_exists('configs/'.$item)) {
            require_once 'configs/'.$item;
        }
    }
}

require_once 'core/Session.php';// Load session
require_once 'app/App.php';// Load app

// Kiểm tra config và load Database
if(!empty($config['database'])) {
    $db_config = array_filter($config['database']);

    if(!empty($db_config)) {
        require_once 'core/Connection.php';
        require_once 'core/QueryBuilder.php';
        require_once 'core/Database.php';
        require_once 'core/DB.php';
    }

}

require_once 'core/Model.php';// Load app
require_once 'core/PHPMailer.php';// Load PHPMailer
require_once 'core/Controller.php'; //Load base controller
require_once 'core/AdminController.php'; //Load base controller
require_once 'core/Request.php'; // Load request
require_once 'core/Response.php'; // Load response
