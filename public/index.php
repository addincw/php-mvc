<?php

if (!empty($_GET['route'])) {
    $route = rtrim($_GET['route'], '/');
    $route = explode('/', $route);
}

$page = !empty($route) ? array_shift($route) : '';
$params = !empty($route) ? array_values($route) : [];

switch ($page) {
    case 'create':
        require_once '../app/create.php';
        break;
    case 'update':
        $id = $params[0];
        require_once '../app/update.php';
        break;
    case 'action':
        $action = $params[0];
        $id = !empty($params[1]) ? $params[1] : NULL;
        require_once '../app/actions.php';
        break;
    
    default:
        require_once '../app/home.php';
        break;
}