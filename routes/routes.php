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

$router->addRoute('/', __DIR__ . '/../index.php');

// Auth 
$router->addRoute('signup', __DIR__ . '/../auth/signUp.php');
$router->addRoute('login', __DIR__ . '/../auth/login.php');
$router->addRoute('logout', __DIR__ . '/../auth/logout.php');
$router->addRoute('forgotPassword', __DIR__ . '/../auth/forgotPassword.php');
$router->addRoute('changePass', __DIR__ . '/../auth/changePass.php');
$router->addRoute('recoverCode', __DIR__ . '/../auth/recoverCode.php');



// User
$router->addRoute('home', __DIR__ . '/../index.php');
$router->addRoute('introduce', __DIR__ . '/../views/introduce.php');
$router->addRoute('profile', __DIR__ . '/../views/userProfile.php');
$router->addRoute('transaction', __DIR__ . '/../views/transaction.php');
$router->addRoute('products', __DIR__ . '/../views/products.php');
$router->addRoute('news', __DIR__ . '/../views/news.php');
$router->addRoute('newDetail', __DIR__ . '/../views/newDetail.php');
$router->addRoute('contact', __DIR__ . '/../views/contact.php');
$router->addRoute('payment', __DIR__ . '/../views/payment.php');
$router->addRoute('property', __DIR__ . '/../views/property.php');
$router->addRoute('contractDetail', __DIR__ . '/../views/contractDetail.php');
$router->addRoute('propertyDetail', __DIR__ . '/../views/propertyDetail.php');



// Admin
$router->addRoute('admin/dashboard', __DIR__ . '/../admin/index.php');

$router->addRoute('admin/profileDetail', __DIR__ . '/../admin/controllers/profile/profileDetail.php');

$router->addRoute('admin/listProperty', __DIR__ . '/../admin/controllers/property/listProperty.php');
$router->addRoute('admin/addProperty', __DIR__ . '/../admin/controllers/property/addProperty.php');
$router->addRoute('admin/updateProperty', __DIR__ . '/../admin/controllers/property/updateProperty.php');
$router->addRoute('admin/deleteProperty', __DIR__ . '/../admin/controllers/property/deleteProperty.php');
$router->addRoute('admin/addTags', __DIR__ . '/../admin/controllers/property/addTags.php');
$router->addRoute('admin/updateTags', __DIR__ . '/../admin/controllers/property/updateTags.php');
$router->addRoute('admin/deleteTags', __DIR__ . '/../admin/controllers/property/deleteTags.php');
$router->addRoute('admin/updateStatus', __DIR__ . '/../admin/controllers/property/updateStatus.php');

$router->addRoute('admin/listSchedule', __DIR__ . '/../admin/controllers/schedule/listSchedule.php');

$router->addRoute('admin/contract', __DIR__ . '/../admin/controllers/transactions/contract.php');
$router->addRoute('admin/contractDetail', __DIR__ . '/../admin/controllers/transactions/contractDetail.php');
$router->addRoute('admin/negotiations', __DIR__ . '/../admin/controllers/transactions/negotiations.php');
$router->addRoute('admin/updateQuery', __DIR__ . '/../admin/controllers/transactions/updateQuery.php');


$router->addRoute('admin/post', __DIR__ . '/../admin/controllers/posts/listPost.php');
$router->addRoute('admin/addPost', __DIR__ . '/../admin/controllers/posts/addPost.php');
$router->addRoute('admin/updatePost', __DIR__ . '/../admin/controllers/posts/updatePost.php');
$router->addRoute('admin/deletePost', __DIR__ . '/../admin/controllers/posts/deletePost.php');

$router->addRoute('admin/user', __DIR__ . '/../admin/controllers/user/listUser.php');
$router->addRoute('admin/addUser', __DIR__ . '/../admin/controllers/user/addUser.php');
$router->addRoute('admin/updateUser', __DIR__ . '/../admin/controllers/user/updateUser.php');
$router->addRoute('admin/deleteUser', __DIR__ . '/../admin/controllers/user/deleteUser.php');


$router->addRoute('admin/setting', __DIR__ . '/../admin/controllers/setting/setting.php');

$requestUrl = isset($_GET['url']) ? $_GET['url'] : '/';
$router->handleRequest($requestUrl);
?>