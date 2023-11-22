<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../config/config.php');
include(__DIR__ . '/../admin/models/tags.php');
include(__DIR__ . '/../admin/models/property.php');
$id = $_GET['id'];
$database = new Database();
$Property = new Property($database);
$result = $Property->renderPropertyDetail($id);
$resultImage = $Property->renderImagePropertyDetail($id);
$errorsNegotiate = "";
$errors = [];
$resultNegotiate = $Property->negotiate($id);
if (is_array($resultNegotiate) && !empty($resultNegotiate)) {
    $errors = $resultNegotiate;
}

// echo "<pre>";
// print_r($_SESSION['user_info']);
// echo "</pre>";
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
    <meta name="keywords" content="rents, template, property" />
    <meta name="author" content="https://xirosoft.com" />

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/nice-select.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/introduce.css">


    <link rel="stylesheet" id="newhome-main-css" href="https://newhome.qodeinteractive.com/wp-content/themes/newhome/assets/css/main.min.css?ver=6.3.2" type="text/css" media="all" />
    <link rel="stylesheet" id="newhome-core-style-css" href="https://newhome.qodeinteractive.com/wp-content/plugins/newhome-core/assets/css/newhome-core.min.css?ver=6.3.2" type="text/css" media="all" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>

</head>

<body class="property-template-default single single-property postid-2459 theme-newhome qi-blocks-1.2.1 qodef-gutenberg--no-touch qode-framework-1.2.2 woocommerce-no-js qodef-qi--no-touch qi-addons-for-elementor-1.6.2 qodef-back-to-top--enabled  qodef--passepartout qodef-header--standard qodef-header-appearance--none qodef-mobile-header--standard qodef-drop-down-second--full-width qodef-drop-down-second--default qodef-title-area--enabled newhome-core-1.0.4 newhome-membership-1.0 newhome-1.2.2 qodef-content-grid-1400 qodef-property-item-layout--gallery qodef-header-standard--center elementor-default elementor-kit-4" itemscope itemtype="https://schema.org/WebPage">

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
                        <a href="login" class="btn btn-outline me-3 btn-login-form">Đăng Nhập</a>
                        <a href="signup" class="btn btn-primary btn-signup-form">Đăng Ký</a>
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
    <section>



        <div id="qodef-page-wrapper" class>
            <div id="qodef-page-outer">
                <div id="qodef-page-inner" class="qodef-content-full-width">
                    <div id="qodef-property-media" class="qodef-property-media--gallery-custom-first-large">
                        <div class="qodef-custom-gallery qodef-e qodef-magnific-popup qodef-popup-gallery">
                            <?php
                            foreach ($resultImage as $index => $item) {
                                // echo $index;
                                echo '<a class="qodef-e-item qodef-popup-item" itemprop="image" href="./assets/images/imgproperty' . $item['image_url'] . '" data-type="image">';
                                echo '<img width="406" height="320" src="./assets/images/imgproperty' . $item['image_url'] . '" />';
                                if ($index === 4) {
                                    echo '<span class="qodef-e-item-button">See all photos</span></a>';
                                } else {
                                    echo '</a>';
                                }
                            }
                            ?>

                        </div>
                    </div>

                    <main id="qodef-page-content" role="main">
                        <div class="qodef-property qodef-m qodef-property-single qodef-item-layout--gallery">
                            <div class="qodef-m-content qodef-content-grid">
                                <div class="qodef-grid qodef-layout--template qodef-grid-template--8-4">
                                    <div class="qodef-grid-inner">
                                        <div class="qodef-grid-item qodef-page-content-section qodef-col--content">
                                            <article class="qodef-property-item qodef-m post-2459 property type-property status-publish has-post-thumbnail hentry property-type-for-rent property-category-villas property-location-brooklyn property-tag-swimming-pool">
                                                <div class="qodef-m-inner">
                                                    <section class="qodef-m-heading m-0">
                                                        <div class="qodef-m-heading-top">
                                                            <div class="qodef-m-types ">
                                                                <a href="https://newhome.qodeinteractive.com/property-type/for-rent/" rel="tag"><?php echo $result['type'] ?></a>
                                                            </div>
                                                        </div>
                                                        <h2 class="qodef-m-heading-title"><?php echo $result['title'] ?></h2>
                                                        <div class="qodef-m-heading-bottom">

                                                            <div class="qodef-m-property-id">
                                                                <span class="qodef-m-property-id-title">
                                                                    Bất động sản: </span>
                                                                <span class="qodef-m-property-id-content">
                                                                    <?php echo $result['property_id'] ?> </span>
                                                            </div>
                                                            <div class="qodef-m-separator"></div>
                                                            <div class="qodef-m-view-count">
                                                                <span class="qodef-m-view-count-icon">
                                                                    <svg width="14.842" height="11.013" viewBox="0 0 14.842 11.013">
                                                                        <g transform="translate(-.6 -3.6)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width=".8">
                                                                            <path d="M1 9.106S3.553 4 8.021 4s7.021 5.106 7.021 5.106-2.553 5.106-7.021 5.106S1 9.106 1 9.106Z" />
                                                                            <circle cx="2" cy="2" r="2" transform="translate(6 7)" />
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                                <span class="qodef-m-view-count-content">
                                                                    <?php echo $result['views'] ?> </span>
                                                            </div>
                                                            <div class="qodef-m-separator"></div>
                                                        </div>
                                                        <div class="qodef-m-price-actions qodef--touch">
                                                        </div>
                                                    </section>
                                                    <section class="qodef-m-description m-0 p-0">
                                                        <h4 class="qodef-m-description-title">Mô tả</h4>
                                                        <div class="qodef-m-description-content">
                                                            <p><?php echo $result['description'] ?></p>
                                                        </div>
                                                    </section>
                                                    <section class="qodef-m-features">
                                                        <h4 class="qodef-m-features-title">Các tính năng hữu</h4>
                                                        <p class="qodef-m-features-description">
                                                            Lorem ipsum dolor sit amet, homero debitis temporibus in
                                                            mei, at
                                                            sit voluptua antiopam hendrerit. Lorem epicuri eu per.
                                                            Mediocrem
                                                            torquatos deseruisse te eum commodo. </p>
                                                        <div class="qodef-m-features-content">
                                                            <h6 class="qodef-m-features-subtitle">
                                                                Chi tiết tài sản </h6>
                                                            <div class="qodef-m-features-content-inner">
                                                                <div class="qodef-m-features-item qodef--predefined-order">
                                                                    <span class="qodef-m-features-item-icon">
                                                                        <svg class="qodef-ei-svg-icon qodef--size" width="18.214" height="19.601" viewBox="0 0 18.214 19.601">
                                                                            <path d="M7.87.151h10.013a.181.181 0 0 1 .181.179v2.4a.181.181 0 1 1-.362 0V.511H8.051v4.224a.181.181 0 0 1-.181.181H.511v14.173h17.191V6.296h-6.421v2.139a.181.181 0 1 1-.362 0v-2.32a.181.181 0 0 1 .181-.181h6.783a.181.181 0 0 1 .181.181V19.27a.181.181 0 0 1-.181.181H.331a.181.181 0 0 1-.181-.181V4.735a.181.181 0 0 1 .181-.181h7.358V.33A.181.181 0 0 1 7.87.151Z" fill="currentColor" stroke="currentColor" stroke-width=".3" />
                                                                            <path d="M11.1 11.249h2.158a.181.181 0 0 1 0 .362h-1.977v1.669a.181.181 0 0 1-.181.181H.33a.181.181 0 0 1 0-.362h10.589v-1.67a.181.181 0 0 1 .181-.18Z" fill="currentColor" stroke="currentColor" stroke-width=".3" />
                                                                            <path d="M16.121 11.249h1.762a.181.181 0 0 1 0 .362h-1.762a.181.181 0 0 1 0-.362Z" fill="currentColor" stroke="currentColor" stroke-width=".3" />
                                                                            <path d="M11.1 15.83a.181.181 0 0 1 .181.181v3.259a.181.181 0 1 1-.362 0v-3.259a.181.181 0 0 1 .181-.181Z" fill="currentColor" stroke="currentColor" stroke-width=".3" />
                                                                        </svg>
                                                                    </span>
                                                                    <span class="qodef-m-features-item-label">
                                                                        Diện tích: </span>
                                                                    <span class="qodef-m-features-item-text">
                                                                        <?php echo $result['acreage'] ?> <span class="qodef--measure-unit">m<sup>2</sup></span>
                                                                    </span>
                                                                </div>

                                                                <div class="qodef-m-features-item qodef--predefined-order">
                                                                    <span class="qodef-m-features-item-icon">
                                                                        <svg class="qodef-ei-svg-icon qodef--bedrooms" width="24.017" height="17.998" viewBox="0 0 24.017 17.998">
                                                                            <path d="M21.333 8.065H2.683a.355.355 0 0 1-.355-.355V3.059A3.063 3.063 0 0 1 5.387 0h13.242a3.063 3.063 0 0 1 3.059 3.059V7.71a.355.355 0 0 1-.355.355Zm-18.295-.71h17.94v-4.3A2.352 2.352 0 0 0 18.629.706H5.387a2.352 2.352 0 0 0-2.349 2.349Z" fill="currentColor" />
                                                                            <path d="M12.008 8.065H4.421a.355.355 0 0 1-.355-.355V4.719a2.128 2.128 0 0 1 2.125-2.125h4.046a2.128 2.128 0 0 1 2.125 2.125V7.71a.355.355 0 0 1-.354.355Zm-7.232-.71h6.877V4.719a1.417 1.417 0 0 0-1.415-1.415H6.192a1.417 1.417 0 0 0-1.415 1.415Z" fill="currentColor" />
                                                                            <path d="M19.59 8.065h-7.587a.355.355 0 0 1-.355-.355V4.719a2.128 2.128 0 0 1 2.125-2.125h4.046a2.127 2.127 0 0 1 2.125 2.125V7.71a.355.355 0 0 1-.354.355Zm-7.232-.71h6.877V4.719a1.417 1.417 0 0 0-1.415-1.415h-4.046a1.417 1.417 0 0 0-1.415 1.415Z" fill="currentColor" />
                                                                            <path d="M23.662 16.844H.355A.355.355 0 0 1 0 16.489v-5.717a3.421 3.421 0 0 1 3.417-3.417h17.182a3.421 3.421 0 0 1 3.418 3.417v5.717a.355.355 0 0 1-.355.355Zm-22.951-.71h22.6v-5.362a2.71 2.71 0 0 0-2.707-2.707H3.417a2.71 2.71 0 0 0-2.706 2.707Z" fill="currentColor" />
                                                                            <path d="M2.637 17.997a.355.355 0 0 1-.355-.355v-1.14a.355.355 0 1 1 .71 0v1.14a.355.355 0 0 1-.355.355Z" fill="currentColor" />
                                                                            <path d="M21.333 17.997a.355.355 0 0 1-.355-.355v-1.14a.355.355 0 1 1 .71 0v1.14a.355.355 0 0 1-.355.355Z" fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    <span class="qodef-m-features-item-label">
                                                                        Phòng ngủ: </span>
                                                                    <span class="qodef-m-features-item-text">
                                                                        <?php echo $result['beds'] ?> </span>
                                                                </div>

                                                                <div class="qodef-m-features-item qodef--predefined-order">
                                                                    <span class="qodef-m-features-item-icon">
                                                                        <svg class="qodef-ei-svg-icon qodef--bathrooms" width="28.528" height="21.994" viewBox="0 0 28.528 21.994">
                                                                            <path d="M21.283 20.649H7.252c-2.119 0-5.529-3.517-5.529-5.7V12.36a.383.383 0 0 1 .383-.383h24.316a.383.383 0 0 1 .383.378v2.593c0 2.184-3.406 5.701-5.522 5.701Zm-18.8-7.909v2.207c0 1.8 3.028 4.937 4.764 4.937h14.031c1.734 0 4.757-3.138 4.757-4.937v-2.206Z" fill="currentColor" />
                                                                            <path d="M5.057 10.882a.383.383 0 0 1-.383-.383V3.382A3.5 3.5 0 0 1 5.6.853a2.921 2.921 0 0 1 2.094-.854 2.979 2.979 0 0 1 3.045 2.755.38225907.38225907 0 1 1-.762.062A2.228 2.228 0 0 0 7.694.764a2.162 2.162 0 0 0-1.551.627 2.759 2.759 0 0 0-.7 1.991v7.117a.383.383 0 0 1-.386.383Z" fill="currentColor" />
                                                                            <path d="M27.525 12.74H1.003a1 1 0 0 1-1-1v-.377a1 1 0 0 1 1-1h26.522a1 1 0 0 1 1 1v.377a1 1 0 0 1-1 1ZM1.003 11.123a.24.24 0 0 0-.238.237v.377a.241.241 0 0 0 .238.237h26.522a.241.241 0 0 0 .238-.237v-.377a.24.24 0 0 0-.238-.237Z" fill="currentColor" />
                                                                            <path d="M12.648 5.466a.383.383 0 0 1-.382-.383 1.917 1.917 0 0 0-3.833 0 .383.383 0 0 1-.765 0 2.682 2.682 0 1 1 5.363 0 .383.383 0 0 1-.383.383Z" fill="currentColor" />
                                                                            <path d="M13.505 5.824H7.194a.383.383 0 1 1 0-.765h6.311a.383.383 0 0 1 0 .765Z" fill="currentColor" />
                                                                            <path d="M5.917 21.995a.383.383 0 0 1-.293-.629l1.128-1.344a.383.383 0 0 1 .586.492l-1.129 1.344a.38.38 0 0 1-.292.137Z" fill="currentColor" />
                                                                            <path d="M22.61 21.995a.38.38 0 0 1-.293-.137l-1.129-1.344a.383.383 0 0 1 .586-.492l1.131 1.344a.383.383 0 0 1-.293.629Z" fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    <span class="qodef-m-features-item-label">
                                                                        Phòng tắm: </span>
                                                                    <span class="qodef-m-features-item-text">
                                                                        <?php echo $result['baths'] ?> </span>
                                                                </div>
                                                                <div class="qodef-m-features-item qodef--predefined-order">
                                                                    <span class="qodef-m-features-item-icon">
                                                                        <svg class="qodef-ei-svg-icon qodef--construction-year" width="22.85" height="18.278" viewBox="0 0 22.85 18.278">
                                                                            <path d="M19.949 15.91H.904a.755.755 0 0 1-.754-.754V1.835a.755.755 0 0 1 .754-.754h19.045a.755.755 0 0 1 .753.754v13.321a.754.754 0 0 1-.753.754ZM.904 1.447a.388.388 0 0 0-.388.388v13.321a.388.388 0 0 0 .388.388h19.045a.388.388 0 0 0 .387-.388V1.835a.388.388 0 0 0-.387-.388Z" fill="currentColor" stroke="currentColor" stroke-width=".3" />
                                                                            <path d="M20.519 4.577H.333a.183.183 0 0 1-.183-.183V1.835a.755.755 0 0 1 .754-.754h19.045a.755.755 0 0 1 .753.754v2.559a.183.183 0 0 1-.183.183Zm-20-.366h19.82V1.835a.388.388 0 0 0-.387-.388H.904a.388.388 0 0 0-.388.388Z" fill="currentColor" stroke="currentColor" stroke-width=".3" />
                                                                            <path d="M21.946 18.127H2.616a.755.755 0 0 1-.754-.754v-1.646a.183.183 0 0 1 .183-.183h17.9a.388.388 0 0 0 .387-.388V3.478a.183.183 0 0 1 .183-.183h1.427a.755.755 0 0 1 .754.754V17.37a.755.755 0 0 1-.75.757ZM2.228 15.91v1.463a.389.389 0 0 0 .388.388h19.33a.388.388 0 0 0 .387-.388V4.052a.388.388 0 0 0-.387-.388h-1.249v11.492a.754.754 0 0 1-.753.754Z" fill="currentColor" stroke="currentColor" stroke-width=".3" />
                                                                            <path d="M10.011 12.127H6.617v-.349L8.408 9.75a5.424 5.424 0 0 0 .7-.937 1.518 1.518 0 0 0 .2-.723 1.151 1.151 0 0 0-.287-.818 1.056 1.056 0 0 0-.813-.308 1.236 1.236 0 0 0-.946.345 1.3 1.3 0 0 0-.323.924h-.417l-.008-.023a1.53 1.53 0 0 1 .443-1.156 1.668 1.668 0 0 1 1.251-.473 1.566 1.566 0 0 1 1.13.406 1.434 1.434 0 0 1 .424 1.088 1.745 1.745 0 0 1-.283.914 7.515 7.515 0 0 1-.79 1.035l-1.506 1.7.008.019h2.816Z" />
                                                                            <path d="M14.103 8.068a1.224 1.224 0 0 1-.259.775 1.461 1.461 0 0 1-.691.482 1.66 1.66 0 0 1 .8.513 1.261 1.261 0 0 1 .3.839 1.37 1.37 0 0 1-.492 1.132 2.238 2.238 0 0 1-2.54 0 1.374 1.374 0 0 1-.486-1.134 1.281 1.281 0 0 1 .3-.843 1.625 1.625 0 0 1 .8-.513 1.429 1.429 0 0 1-.686-.481 1.233 1.233 0 0 1-.253-.773 1.381 1.381 0 0 1 .445-1.1 1.9 1.9 0 0 1 2.313 0 1.371 1.371 0 0 1 .449 1.103Zm-.3 2.611a1.059 1.059 0 0 0-.375-.841 1.384 1.384 0 0 0-.939-.324 1.367 1.367 0 0 0-.939.324 1.069 1.069 0 0 0-.368.841 1.033 1.033 0 0 0 .364.84 1.615 1.615 0 0 0 1.889 0 1.03 1.03 0 0 0 .372-.84Zm-.154-2.615a1.036 1.036 0 0 0-.333-.787 1.159 1.159 0 0 0-.828-.314 1.172 1.172 0 0 0-.83.3 1.04 1.04 0 0 0-.323.8.99.99 0 0 0 .325.775 1.331 1.331 0 0 0 1.662 0 .986.986 0 0 0 .331-.774Z" />
                                                                            <path d="M4.15 0h2v2h-2z" stroke="none" />
                                                                            <path fill="none" d="M4.65.5h1v1h-1z" />
                                                                            <path d="M15.15 0h2v2h-2z" stroke="none" />
                                                                            <path fill="none" d="M15.65.5h1v1h-1z" />
                                                                            <path d="M18.885 14.326h-2.151a.183.183 0 1 1 0-.366h2.151a.183.183 0 1 1 0 .366Z" fill="currentColor" stroke="currentColor" stroke-width=".3" />
                                                                        </svg>
                                                                    </span>
                                                                    <span class="qodef-m-features-item-label">
                                                                        Năm xây dựng: </span>
                                                                    <span class="qodef-m-features-item-text">
                                                                        <?php echo $result['built_in'] ?> </span>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="qodef-m-features-content">
                                                            <h6 class="qodef-m-features-subtitle">
                                                                Tiện ích tài sản </h6>
                                                            <div class="qodef-m-features-content-inner">


                                                                <div class="qodef-m-features-item qodef--predefined-order">
                                                                    <span class="qodef-m-features-item-icon">
                                                                        <svg class="qodef-ei-svg-icon qodef--air-condition" width="26.053" height="21.522" viewBox="0 0 26.053 21.522">
                                                                            <path d="M21.969 12.316H4.084A4.089 4.089 0 0 1 0 8.232V.382a.383.383 0 0 1 .383-.383h25.288a.383.383 0 0 1 .383.383v7.85a4.089 4.089 0 0 1-4.085 4.084ZM.769.765v7.467a3.323 3.323 0 0 0 3.319 3.319h17.885a3.323 3.323 0 0 0 3.319-3.319V.761Z" fill="currentColor" />
                                                                            <path d="M22.641 12.106a.382.382 0 0 1-.383-.383V9.46H3.793v2.263a.383.383 0 1 1-.765 0V9.078a.383.383 0 0 1 .383-.383h19.231a.383.383 0 0 1 .383.383v2.645a.382.382 0 0 1-.384.383Z" fill="currentColor" />
                                                                            <path d="M25.671 7.704H.382a.383.383 0 0 1 0-.765H25.67a.383.383 0 0 1 0 .765Z" fill="currentColor" />
                                                                            <path d="M3.032 21.522a.382.382 0 0 1-.35-.538l2.433-5.478a.383.383 0 1 1 .7.311l-2.433 5.478a.383.383 0 0 1-.35.227Z" fill="currentColor" />
                                                                            <path d="M6.94 21.522a.382.382 0 0 1-.349-.538l2.433-5.478a.383.383 0 0 1 .7.311l-2.433 5.478a.383.383 0 0 1-.351.227Z" fill="currentColor" />
                                                                            <path d="M10.843 21.522a.382.382 0 0 1-.349-.538l2.433-5.478a.383.383 0 0 1 .7.311l-2.439 5.478a.382.382 0 0 1-.345.227Z" fill="currentColor" />
                                                                            <path d="M14.747 21.522a.382.382 0 0 1-.35-.538l2.434-5.478a.383.383 0 1 1 .7.311l-2.434 5.478a.382.382 0 0 1-.35.227Z" fill="currentColor" />
                                                                            <path d="M18.653 21.522a.382.382 0 0 1-.35-.538l2.433-5.478a.383.383 0 0 1 .7.311l-2.433 5.478a.382.382 0 0 1-.35.227Z" fill="currentColor" />
                                                                            <path d="M24.514 2.198H7.589a.383.383 0 1 1 0-.765h16.925a.383.383 0 0 1 0 .765Z" fill="currentColor" />
                                                                            <path d="M5.683 2.198H2.005a.383.383 0 0 1 0-.765h3.678a.383.383 0 1 1 0 .765Z" fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    <span class="qodef-m-features-item-label">
                                                                        Điều hòa: </span>
                                                                    <span class="qodef-m-features-item-text">
                                                                        <?php echo $result['conditioner'] ?> </span>
                                                                </div>


                                                                <div class="qodef-m-features-item qodef--predefined-order">
                                                                    <span class="qodef-m-features-item-icon">
                                                                        <svg class="qodef-ei-svg-icon qodef--cable-tv" width="26.378" height="21.5" viewBox="0 0 26.378 21.5">
                                                                            <path d="M24.707 18.249H1.673A1.674 1.674 0 0 1 0 16.577V1.672A1.674 1.674 0 0 1 1.673 0h23.034a1.674 1.674 0 0 1 1.672 1.672v14.91a1.674 1.674 0 0 1-1.672 1.667ZM1.673.8a.873.873 0 0 0-.872.872v14.91a.873.873 0 0 0 .872.872h23.034a.873.873 0 0 0 .871-.872V1.672A.873.873 0 0 0 24.707.8Z" fill="currentColor" />
                                                                            <path d="M24.012 15.441H2.367a.476.476 0 0 1-.475-.475V2.108a.476.476 0 0 1 .475-.475h21.645a.476.476 0 0 1 .475.475v12.857a.476.476 0 0 1-.475.476Zm-21.319-.8h20.994V2.433H2.692Z" fill="currentColor" />
                                                                            <path d="M5.12 21.5a.405.405 0 0 1-.2-.054.4.4 0 0 1-.145-.547c.07-.12 1.746-2.946 4.627-3.443a.4.4 0 0 1 .463.326.4.4 0 0 1-.326.463c-2.518.435-4.056 3.031-4.071 3.058a.4.4 0 0 1-.348.197Z" fill="currentColor" />
                                                                            <path d="M21.259 21.5a.4.4 0 0 1-.346-.2c-.015-.026-1.563-2.624-4.072-3.058a.40040292.40040292 0 1 1 .137-.789c2.882.5 4.557 3.323 4.627 3.443a.4.4 0 0 1-.345.6Z" fill="currentColor" />
                                                                            <path d="M13.52 16.849h-.654a.4.4 0 1 1 0-.8h.654a.4.4 0 0 1 0 .8Z" fill="currentColor" />
                                                                            <path d="M12.15 5.846H6.365a.4.4 0 1 1 0-.8h5.785a.4.4 0 0 1 0 .8Z" fill="currentColor" />
                                                                            <path d="M9.257 12.453a.4.4 0 0 1-.4-.4V5.446a.4.4 0 0 1 .8 0v6.607a.4.4 0 0 1-.4.4Z" fill="currentColor" />
                                                                            <path d="M17.07 12.608a.4.4 0 0 1-.367-.241L13.76 5.606a.40016153.40016153 0 1 1 .734-.319l2.576 5.918 2.576-5.919a.40036109.40036109 0 1 1 .734.32l-2.943 6.761a.4.4 0 0 1-.367.241Z" fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    <span class="qodef-m-features-item-label">
                                                                        TV: </span>
                                                                    <span class="qodef-m-features-item-text">
                                                                        <?php echo $result['tivis'] ?> </span>
                                                                </div>

                                                                <div class="qodef-m-features-item qodef--predefined-order">
                                                                    <span class="qodef-m-features-item-icon">
                                                                        <svg class="qodef-ei-svg-icon qodef--wifi" width="26.008" height="22.796" viewBox="0 0 26.008 22.796">
                                                                            <path d="M23.167 20.419a.4.4 0 0 1-.4-.4V7.332l-6.026-.01a.4.4 0 0 1 0-.8h6.016a.81.81 0 0 1 .809.81v12.687a.4.4 0 0 1-.399.4Z" fill="currentColor" />
                                                                            <path d="M2.841 20.419a.4.4 0 0 1-.4-.4V7.332a.811.811 0 0 1 .81-.81h6.016a.4.4 0 1 1 0 .8H3.251l-.01 12.7a.4.4 0 0 1-.4.397Z" fill="currentColor" />
                                                                            <path d="M24.277 22.796H1.73a1.331 1.331 0 0 1-1.134-.627.412.412 0 0 1-.046-.106l-.536-1.937a.4.4 0 0 1 .385-.507H9.82a.4.4 0 0 1 .32.16.693.693 0 0 0 .549.277h4.628a.684.684 0 0 0 .549-.277.4.4 0 0 1 .32-.16h9.421a.4.4 0 0 1 .386.507l-.536 1.937a.4.4 0 0 1-.047.106 1.332 1.332 0 0 1-1.133.627Zm-22.974-1.01a.533.533 0 0 0 .426.21h22.547a.534.534 0 0 0 .427-.21l.378-1.366h-8.715a1.493 1.493 0 0 1-1.049.437h-4.628a1.493 1.493 0 0 1-1.049-.437H.925Z" fill="currentColor" />
                                                                            <path d="M13.004 11.804a2.291 2.291 0 1 1 2.291-2.291 2.293 2.293 0 0 1-2.291 2.291Zm0-3.782a1.491 1.491 0 1 0 1.491 1.491 1.492 1.492 0 0 0-1.491-1.491Z" fill="currentColor" />
                                                                            <path d="M7.62 5.655a.4.4 0 0 1-.248-.086.4.4 0 0 1-.066-.562 7.253 7.253 0 0 1 11.388 0 .40097662.40097662 0 1 1-.627.5 6.453 6.453 0 0 0-10.133 0 .4.4 0 0 1-.314.148Z" fill="currentColor" />
                                                                            <path d="M6.025 4.056a.4.4 0 0 1-.306-.658 9.51 9.51 0 0 1 14.572 0 .4003105.4003105 0 0 1-.613.515 8.71 8.71 0 0 0-13.346 0 .4.4 0 0 1-.307.143Z" fill="currentColor" />
                                                                            <path d="M9.267 7.298a.4.4 0 0 1-.327-.63 4.958 4.958 0 0 1 8.129 0 .4.4 0 1 1-.655.459 4.157 4.157 0 0 0-6.818 0 .4.4 0 0 1-.329.171Z" fill="currentColor" />
                                                                            <path d="M7.62 5.655a.4.4 0 0 1-.248-.086.4.4 0 0 1-.066-.562 7.253 7.253 0 0 1 11.388 0 .40097662.40097662 0 1 1-.627.5 6.453 6.453 0 0 0-10.133 0 .4.4 0 0 1-.314.148Z" fill="currentColor" />
                                                                            <path d="M16.282 15.012H9.727a.4.4 0 1 1 0-.8h6.555a.4.4 0 1 1 0 .8Z" fill="currentColor" />
                                                                            <path d="M16.282 17.172H9.727a.4.4 0 1 1 0-.8h6.555a.4.4 0 1 1 0 .8Z" fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    <span class="qodef-m-features-item-label">
                                                                        WiFi: </span>
                                                                    <span class="qodef-m-features-item-text">
                                                                        <?php echo $result['wifi'] ?> </span>
                                                                </div>
                                                                <div class="qodef-m-features-item qodef--predefined-order">
                                                                    <span class="qodef-m-features-item-icon">
                                                                        <svg class="qodef-ei-svg-icon qodef--security" width="26.404" height="25.041" viewBox="0 0 26.404 25.041">
                                                                            <path d="M19.333 13.328a1.51 1.51 0 0 1-.5-.085L5.001 8.425a1.566 1.566 0 0 1-.938-2l1.829-5.248a1.592 1.592 0 0 1 .792-.906A1.516 1.516 0 0 1 7.87.191l18.289 6.366a.222.222 0 0 1 .084.366l-3.057 3.08a1.551 1.551 0 0 1-1.6.38l-.1-.036-.665 1.909a1.592 1.592 0 0 1-.792.906 1.529 1.529 0 0 1-.696.166ZM7.374.548a1.09 1.09 0 0 0-.49.117 1.15 1.15 0 0 0-.572.656L4.484 6.569a1.121 1.121 0 0 0 .664 1.437l13.832 4.818a1.072 1.072 0 0 0 .841-.058 1.152 1.152 0 0 0 .572-.656l.738-2.119a.222.222 0 0 1 .283-.136l.312.108a1.089 1.089 0 0 0 1.139-.273l2.809-2.83L7.725.608a1.059 1.059 0 0 0-.351-.06Z" fill="currentColor" stroke="currentColor" stroke-width=".2" />
                                                                            <path d="M21.438 10.322a.222.222 0 0 1-.073-.012l-7.992-2.788a.222.222 0 1 1 .146-.419l7.992 2.784a.222.222 0 0 1-.073.431Z" fill="currentColor" stroke="currentColor" stroke-width=".2" />
                                                                            <path d="M11.765 12.079a.214.214 0 0 1-.073-.012l-5.214-1.816a.222.222 0 0 1-.137-.283l.386-1.107a.222.222 0 1 1 .419.146l-.313.9 4.795 1.671.313-.9a.222.222 0 0 1 .419.146l-.386 1.108a.22.22 0 0 1-.209.149Z" fill="currentColor" stroke="currentColor" stroke-width=".2" />
                                                                            <path d="M8.008 18.451a.222.222 0 0 1-.21-.3l2.313-6.641-2.1-.732-2.331 6.693a.222.222 0 1 1-.419-.146l2.4-6.9a.222.222 0 0 1 .283-.136l2.521.878a.222.222 0 0 1 .137.283L8.216 18.3a.222.222 0 0 1-.208.151Z" fill="currentColor" stroke="currentColor" stroke-width=".2" />
                                                                            <path d="M23.164 13.41a1.04 1.04 0 0 1-.341-.058l-2.427-.845a.222.222 0 0 1-.136-.282l.787-2.26a.222.222 0 0 1 .282-.136l.312.108a1.132 1.132 0 0 0 1.174-.264l1.651-1.627a.222.222 0 0 1 .23-.051 1.036 1.036 0 0 1 .631 1.314l-1.187 3.407a1.035 1.035 0 0 1-.976.694Zm-2.413-1.25 2.218.773a.591.591 0 0 0 .451-.026.582.582 0 0 0 .3-.337l1.187-3.407a.591.591 0 0 0-.241-.692l-1.54 1.517a1.574 1.574 0 0 1-1.631.367l-.1-.036Z" fill="currentColor" stroke="currentColor" stroke-width=".2" />
                                                                            <path d="M2.679 24.941H.321a.222.222 0 0 1-.222-.222v-9.094a.222.222 0 0 1 .222-.222h2.358a.222.222 0 0 1 .222.222v9.094a.222.222 0 0 1-.222.222Zm-2.136-.444h1.914v-8.65H.544Z" fill="currentColor" stroke="currentColor" stroke-width=".2" />
                                                                            <path d="M6.057 23.162H2.844a.222.222 0 0 1 0-.444h3.213a2.546 2.546 0 1 0 0-5.092H2.844a.222.222 0 0 1 0-.444h3.213a2.99 2.99 0 1 1 0 5.98Z" fill="currentColor" stroke="currentColor" stroke-width=".2" />
                                                                            <path d="M6.072 21.539a1.362 1.362 0 1 1 1.362-1.363 1.364 1.364 0 0 1-1.362 1.363Zm0-2.281a.918.918 0 1 0 .918.918.92.92 0 0 0-.918-.922Z" fill="currentColor" stroke="currentColor" stroke-width=".2" />
                                                                            <path d="M1.501 15.847a.222.222 0 0 1-.222-.222V5.301a2.066 2.066 0 0 1 2.064-2.063H5.19a.222.222 0 1 1 0 .444H3.343a1.621 1.621 0 0 0-1.62 1.619v10.324a.222.222 0 0 1-.222.222Z" fill="currentColor" stroke="currentColor" stroke-width=".2" />
                                                                        </svg>
                                                                    </span>
                                                                    <span class="qodef-m-features-item-label">
                                                                        Bảo vệ: </span>
                                                                    <span class="qodef-m-features-item-text">
                                                                        <?php echo $result['cameras'] ?> Cameras </span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </section>
                                                    <section class="qodef-m-video">
                                                        <h4 class="qodef-m-video-title">Video</h4> <video width="1300" autoplay loop muted playsinline>
                                                            <source src="https://newhome.qodeinteractive.com/wp-content/uploads/2023/03/property-single-video-1.mp4" type="video/mp4">
                                                            Your browser does not support the video tag
                                                        </video>
                                                    </section>
                                                    <section class="qodef-m-floor-plans">
                                                        <h4 class="qodef-m-floor-plans-title">Sơ đồ mặt bằng</h4>
                                                        <div class="qodef-m-floor-plans-description">
                                                            Lorem ipsum dolor sit amet, homero debitis temporibus in
                                                            mei, at
                                                            sit voluptua antiopam hendrerit. Lorem epicuri eu per.
                                                            Mediocrem
                                                            torquatos deseruisse te eum commodo. </div>
                                                        <div class="qodef-m-floor-plans-content">
                                                            <div class="qodef-m-floor-plans-images">
                                                                <img width="913" height="545" src="./assets/images/imgproperty<?php echo $result['floor_plans'] ?>" class="qodef--active" alt="w" decoding="async" data-target="1" loading="lazy" sizes="(max-width: 913px) 100vw, 913px" /> <img width="913" height="545" />
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <section class="qodef-m-virtual-tour">
                                                        <h4 class="qodef-m-virtual-tour-title">360° chuyến tham quan ảo
                                                        </h4>
                                                        <iframe src="https://my.matterport.com/show/?play=1&#038;share=0&#038;wh=0&#038;m=RLwQbNpdSYL"></iframe>
                                                    </section>
                                                    <section class="qodef-m-location">
                                                        <h4 class="qodef-m-location-title">Vị trí</h4>
                                                        <div class="qodef-m-location-content">
                                                            <div class="qodef-m-location-content-inner mb-3">
                                                                <div class="qodef-m-location-content-inner-left">
                                                                    <div class="qodef-m-location-street">
                                                                        <?php echo $result['location'] ?>
                                                                    </div>
                                                                </div>
                                                                <div class="qodef-m-location-content-inner-right">
                                                                    <div class="qodef-m-location-map-button">
                                                                        <a href="https://www.google.com/maps/search/?api=1&#038;query=<?php echo $result['location'] ?>" rel="noopener noreferrer" target="_blank">
                                                                            <span class="qodef-m-text">Hiển thị trên bản
                                                                                đồ</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                function initMap(latitude, longitude) {
                                                                    const myLatLng = {
                                                                        lat: latitude,
                                                                        lng: longitude
                                                                    };
                                                                    const map = new google.maps.Map(document.getElementById("map"), {
                                                                        zoom: 16,
                                                                        center: myLatLng,
                                                                        center: {
                                                                            lat: latitude,
                                                                            lng: longitude
                                                                        }, // Nếu thêm address rồi thì xoá cái này
                                                                        // mapTypeId: google.maps.MapTypeId.SATELLITE,  // Bản đồ vệ tinh
                                                                    });
                                                                    // const iconPath = './snapedit_1698892191370.png';
                                                                    new google.maps.Marker({
                                                                        position: myLatLng,
                                                                        map: map,
                                                                        // icon: {
                                                                        //     url: iconPath,
                                                                        //     scaledSize: new google.maps.Size(50, 50) // Kích thước biểu tượng
                                                                        // },
                                                                    });
                                                                }
                                                            </script>

                                                            <div id="map" style="height: 400px; width: 100%;"></div>
                                                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNI_ZWPqvdS6r6gPVO50I4TlYkfkZdXh8&callback=initMap" async defer></script>
                                                            <script>
                                                                const getAddress = "<?php echo $result['location'] ?>";
                                                                fetch(`https://api.geoapify.com/v1/geocode/search?text=${encodeURIComponent(getAddress)}&apiKey=70a97adee56547329de91aa39b2e0665`)
                                                                    .then(resp => resp.json())
                                                                    .then((geocodingResult) => {
                                                                        console.log(geocodingResult);
                                                                        var latitude = geocodingResult.features[0].geometry.coordinates[1]; // Lưu trữ kinh độ và vĩ độ
                                                                        var longitude = geocodingResult.features[0].geometry.coordinates[0];
                                                                        console.log("Kinh độ:", longitude);
                                                                        console.log("Vĩ độ:", latitude);
                                                                        initMap(latitude, longitude); // Gọi hàm initMap sau khi có kinh độ và vĩ độ
                                                                    });
                                                            </script>

                                                        </div>
                                                    </section>

                                                </div>
                                            </article>

                                        </div>
                                        <div class="qodef-grid-item qodef-page-sidebar-section qodef-col--sidebar">
                                            <div class="qodef-m-price-actions qodef--desktop">
                                                <div class="qodef-m-price">
                                                    <h5 class="qodef-m-price-title">
                                                        Giá: </h5>
                                                    <div class="qodef-m-price-content">
                                                        <span class="qodef-m-price-amount qodef-h5">
                                                            <?php echo $result['price'] ?>&#036; </span>
                                                        <span class="qodef-m-price-after">
                                                            /tháng </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <section class="qodef-m-author">
                                                <div class="qodef-m-author-top">
                                                    <div class="qodef-m-author-image">
                                                        <a itemprop="author" href="https://newhome.qodeinteractive.com/author/rachel-gray/">
                                                            <img src="./assets/images/imguser<?php echo $result['avatar'] ?>" alt="f" width="100" height="100" data-ratio="1" /> </a>
                                                    </div>
                                                    <div class="qodef-m-author-heading">
                                                        <span class="qodef-m-author-heading-agency">
                                                            <?php echo $result['roles'] ?> </span>
                                                        <h4 class="qodef-m-author-heading-name"><?php echo $result['full_name'] ?></h4> <span class="qodef-m-author-heading-address">
                                                            <?php echo $result['address_user'] ?> </span>
                                                    </div>
                                                </div>
                                                <div class="qodef-m-author-content">
                                                    <div class="qodef-m-author-content-item">
                                                        <span class="qodef-m-author-content-item-label">
                                                            Điện thoại văn phòng: </span>
                                                        +1114445557
                                                    </div>
                                                    <div class="qodef-m-author-content-item">
                                                        <span class="qodef-m-author-content-item-label">
                                                            Số điện thoại: </span>
                                                        +84 <?php echo $result['phone_number'] ?>
                                                    </div>
                                                    <div class="qodef-m-author-content-item">
                                                        <span class="qodef-m-author-content-item-label">
                                                            Email: </span>
                                                        <?php echo $result['email'] ?>
                                                    </div>
                                                </div>
                                                <a class="qodef-shortcode qodef-m qodef-m-author-link qodef-button qodef-layout--filled qodef-size--normal-full qodef-html--link" href="https://newhome.qodeinteractive.com/author/rachel-gray/" target="_self"> <span class="qodef-m-text">View my
                                                        properties</span></a>
                                            </section>
                                            <section class="qodef-m-schedule-tour">
                                                <h4 class="qodef-m-schedule-tour-title">Lịch trình tham quan</h4>
                                                <p class="qodef-m-schedule-tour-description">
                                                    Vui lòng điền vào biểu mẫu dưới đây để hẹn lịch tham quan.
                                                </p>
                                                <div class="qodef-m-schedule-tour-content">
                                                    <form class="qodef-m-form" id="qodef-schedule-tour">
                                                        <div class="qodef-m-form-inner">
                                                            <div class="qodef-m-form-row">
                                                                <input type="text" name="user_name" placeholder="Họ và tên*">
                                                            </div>
                                                            <div class="qodef-m-form-row">
                                                                <input type="email" name="user_email" placeholder="Email*">
                                                            </div>
                                                            <div class="qodef-m-form-row">
                                                                <input type="text" name="user_phone" placeholder="Số điện thoại*">
                                                            </div>
                                                            <div class="qodef-m-form-row">
                                                                <textarea name="user_message" placeholder="Tin nhắn" rows="4"></textarea>
                                                            </div>
                                                            <input type="hidden" name="agent_id" value="5" />
                                                            <div class="qodef-m-action qodef-property-spinner">
                                                                <button type="submit" class="qodef-shortcode qodef-m  qodef-button qodef-layout--filled qodef-size--normal-full ">
                                                                    <span class="qodef-btn-text">Gửi</span></button><span class="qodef-m-spinner">
                                                                    <svg width="20" height="20" viewBox="0 0 50 50">
                                                                        <circle cx="25" cy="25" r="20" fill="none" stroke="currentColor" stroke-width="5" stroke-linecap="round" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="qodef-m-form-result"></div>
                                                    </form>
                                                </div>
                                            </section>


                                            <section class="qodef-m-mortgage-calculator">
                                                <h4 class="qodef-m-mortgage-calculator-title m-0">Thươnng lượng</h4>
                                                <div class="qodef-m-schedule-tour-description py-4">
                                                    Vui lòng điền vào biểu mẫu dưới đây để gửi yêu cầu thương lượng giá.
                                                </div>
                                                <span class="text-danger">
                                                    <?php
                                                    if (!empty($errors)) {
                                                        echo '<ul class="py-4 alert" style="background-color: #DC3545; color: white">';
                                                        foreach ($errors as $error) {
                                                            echo '<li class="pl-2" style="list-style: none">' . $error . '</li>';
                                                        }
                                                        echo '</ul>';
                                                    } ?>
                                                </span>
                                                <div class="qodef-m-mortgage-calculator-content">
                                                    <form method="POST" class="qodef-m-form" id="qodef-mortgage-calculator" data-error-message="Please review your enquiry and try again">
                                                        <div class="qodef-m-form-inner">
                                                            <div class="qodef-m-form-row">
                                                                <input type="text" name="user_name" placeholder="Họ và tên*">
                                                            </div>
                                                            <div class="qodef-m-form-row">
                                                                <input type="text" name="user_email" placeholder="Email*">
                                                            </div>

                                                            <div class="qodef-m-form-row">
                                                                <label>
                                                                    Giá:</label>
                                                                <input id="qodef-mortgage-calculator-price" type="number" name="price" value="<?php echo $result['price'] ?>" readonly="readonly">
                                                            </div>
                                                            <div class="qodef-m-form-row">
                                                                <input type="text" name="price_offered" placeholder="Giá mong muốn*">
                                                            </div>
                                                            <div class="qodef-m-form-row">
                                                                <textarea name="user_message" placeholder="Tin nhắn" rows="4"></textarea>
                                                            </div>
                                                            <input type="hidden" name="agent_id" value="5" />
                                                            <div class="qodef-m-action qodef-property-spinner">
                                                                <button type="submit" name="submitNegotiations" class="qodef-shortcode qodef-m  qodef-button qodef-layout--filled qodef-size--normal-full ">
                                                                    <span class="qodef-btn-text">Thương lượng</span></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <a id="qodef-back-to-top" href="#" class="qodef--predefined">
                <span class="qodef-back-to-top-icon">
                    <svg class="qodef-svg--back-to-top qodef-e-back-to-top-icon" xmlns="http://www.w3.org/2000/svg" width="15.2" height="15.2" viewBox="0 0 15.2 15.2">
                        <path d="M7.6 15.2a.6.6 0 0 1-.6-.6V.6a.6.6 0 0 1 .6-.6.6.6 0 0 1 .6.6v14a.6.6 0 0 1-.6.6Z" />
                        <path d="M14.6 8.2a.6.6 0 0 1-.424-.176L7.6 1.449 1.024 8.024a.60033366.60033366 0 0 1-.849-.849l7-7a.6.6 0 0 1 .849 0l7 7A.6.6 0 0 1 14.6 8.2Z" />
                    </svg> </span>
            </a>
            <div class="qodef-property-compare-modal qodef-m ">
                <div class="qodef-m-opener">
                    <button type="button" class="qodef-m-opener-button">
                        <span class="qodef-m-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15.029" height="17.702" viewBox="0 0 15.029 17.702">
                                <g transform="translate(-0.5 -1.293)">
                                    <path d="M17,1l3.117,3.117L17,7.235" transform="translate(-5.089 1)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path d="M3,9.676V8.117A3.117,3.117,0,0,1,6.117,5H17.028" transform="translate(-2 0.117)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path d="M6.117,21.235,3,18.117,6.117,15" transform="translate(-1.999 -2.946)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path d="M17.028,13v1.559a3.117,3.117,0,0,1-3.117,3.117H3" transform="translate(-1.999 -2.505)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                </g>
                            </svg>
                        </span>
                        <span class="qodef-m-text">Compare</span>
                    </button>
                </div>

                <div class="qodef-m-popup">
                    <div class="qodef-m-popup-inner qodef-content-grid">
                        <div class="qodef-m-popup-items">
                        </div>
                        <span class="qodef-m-popup-close">
                            <svg width="9.193" height="9.192" viewBox="0 0 9.193 9.192">
                                <g fill="none" stroke="currentColor" stroke-linecap="round">
                                    <path d="m.7070873.7069127 7.77817459 7.7781746" />
                                    <path d="M.7070873 8.4850873 8.48526189.7069127" />
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

        </div>



    </section>
    <?php include 'inc/footer.php' ?>