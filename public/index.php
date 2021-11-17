<?php
require_once '../autoload.php';

$diConfig = include('../config/di.php');
use Router\Router;

/**
 * @var $router
 * Yep, DI handler will be inside router
 */
$router = new Router($diConfig);

$router->register('/', 'App\Controller\FileUploadController', 'index');
$router->register('/upload', 'App\Controller\FileUploadController', 'upload');

try {
    $router->handle($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], ['file' => $_FILES['file'] ?? null]);
} catch (\Exception $exception) {
    header("HTTP/1.0 404 Not Found");
}
