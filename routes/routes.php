<?php

class Router {
    public $routes = [];

    public function addRoute($url, $viewPath) {
        $this->routes[$url] = $viewPath;
    }

    public function handleRequest($url) {
        // Loại bỏ dấu / cuối cùng nếu có
        $url = rtrim($url, '/');

        if (array_key_exists($url, $this->routes)) {
            $viewPath = $this->routes[$url];
            $this->renderView($viewPath);
            exit;
        } 
    }

    public function renderView($viewPath) {
        // Kiểm tra sự tồn tại của file trước khi bao gồm
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo "View not found";
        }
    }
}
$router = new Router();
// $router->addRoute('/', __DIR__ . '/../index.php');
$router->addRoute('introduce', __DIR__ . '/../views/introduce.php');
$router->addRoute('products', __DIR__ . '/../views/products.php');
$router->addRoute('news', __DIR__ . '/../views/news.php');
$router->addRoute('contact', __DIR__ . '/../views/contact.php');

$requestUrl = isset($_GET['url']) ? $_GET['url'] : '/';
$router->handleRequest($requestUrl);
?>