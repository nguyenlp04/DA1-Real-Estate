<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include(__DIR__ . '../../../config/config.php');

$database = new Database();
$conn = $database->conn;


$adminMenuItem = '';
$hiddenUser = "d-none";
$hiddenAuth = "d-none";
if (isset($_SESSION['user_info'])) {
    $user_id = $_SESSION['user_info']['user_id'];
    $sql = "SELECT * FROM users WHERE user_id='$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $rowGet = $result->fetch_assoc();
        if ($rowGet['roles'] == 'admin') {
            $adminMenuItem = '<li><a class="dropdown-item px-4" href="admin/dashboard">Admin</a></li>';
        }
    } else {
        echo "Không tìm thấy dữ liệu";
        exit;
    }
    $hiddenUser = "d-flex";
} else {
    $hiddenAuth = "d-flex";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Primary Meta Tags -->
    <title>NguyenLP Land - Property Buy & Seles</title>
    <meta name="title" content="Property Buy & Seles HTML Template" />
    <meta name="description" content="Rents is an property buy and seles websites template. This is a clean and modern template that you can use for your rental or property buy/selling business website. this is fully responsive with 100% Retina readiness which means it will be able to adapt to any screen size or resolution." />

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/f-icon" />

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script> -->

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/nice-select.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/introduce.css">
    <link rel="stylesheet" href="assets/css/products.css">
    <link rel="stylesheet" href="assets/css/news.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script> -->
    
    <link rel="stylesheet" href="vendor/dataTables/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/dataTables/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="vendor/dataTables/jquery.dataTables.min.js"></script>
    <script src="vendor/dataTables/dataTables.bootstrap5.min.js"></script>

</head>

<body>
    <!-- Header Start  -->
    <header class="header-section">
        <nav class="nav">
            <div class="container">
                <!-- Header Wrap Start  -->
                <div class="header-wrap">
                    <div class="header-logo">
                        <a href="home">
                            <img src="assets/images/logo.png" alt="logo" />
                        </a>
                    </div>
                    <div class="header-menu">
                        <ul class="main-menu">
                            <li><a href="home">Trang Chủ</a></li>
                            <li><a href="introduce">Giới Thiệu</a></li>
                            <li><a href="products">Sản Phẩm</a></li>
                            <li><a href="news">Tin Tức</a></li>
                            <li><a href="contact">Liên Hệ</a></li>
                        </ul>
                    </div>
                    <div class="header-meta">
                        <div class="group-login align-items-center auth <?php echo $hiddenAuth ?>">

                            <a href="login" class="rounded-3 px-4 py-3 btn-outline me-3 btn-login-form">Đăng Nhập</a>
                            <a href="signup" class="rounded-3 px-4 py-3 btn-primary btn-signup-form">Đăng Ký</a>

                        </div>
                        <div class="group-login align-items-center dropdown <?php echo $hiddenUser ?>">
                            <a class=" dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" type="button" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <img src="./assets/images/imguser/user.png" class="rounded-circle" style="height: 35px" alt="Avatar" loading="lazy" />
                                <span class="ms-2 text-dark">Nguyen</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar" style="font-size: 16px">

                                <?php echo $adminMenuItem ?>
                                <li>
                                    <a class="dropdown-item px-4" href="transaction">Giao dịch</a>
                                </li>
                                <li>
                                    <a class="dropdown-item px-4" href="profile">Thông tin của tôi</a>
                                </li>
                                <li>
                                    <a class="dropdown-item px-4" href="profile">Cài đặt</a>
                                </li>
                                <li>
                                    <a class="dropdown-item px-4" href="logout">Đăng xuất</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Header Toggle Start -->
                        <div class="header-toggle d-lg-none">
                            <button class="toggler-btn">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        </div>
                        <!-- Header Toggle End -->
                    </div>
                </div>
                <!-- Header Wrap End  -->
            </div>
        </nav>
    </header>