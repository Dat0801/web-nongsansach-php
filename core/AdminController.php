<?php
class AdminController
{
    public $db;
    public function __construct()
    {
        if (!isset($_SESSION['employee'])) {
            header('Location: ' . _WEB_ROOT . '/admin/account/login');
            exit();
        }
    }
    public function model($model)
    {
        if (file_exists(__DIR__ROOT . '/app/models/' . $model . '.php')) {
            require_once __DIR__ROOT . '/app/models/' . $model . '.php';
            if (class_exists($model)) {
                $model = new $model();
                return $model;
            }
        }
        return false;
    }

    public function render($view, $data = [])
    {
        extract($data);
        if (file_exists(__DIR__ROOT . '/app/views/' . $view . '.php')) {
            require_once __DIR__ROOT . '/app/views/' . $view . '.php';
        }
    }

    public function controller($controller)
    {
        if (file_exists(__DIR__ROOT . '/app/controllers/' . $controller . '.php')) {
            require_once __DIR__ROOT . '/app/controllers/' . $controller . '.php';
            if (class_exists($controller)) {
                return new $controller();
            }
        }
        return false;
    }
}