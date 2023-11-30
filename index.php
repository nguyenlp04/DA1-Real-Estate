<?php
include 'views/inc/header.php';
include(__DIR__ . '/admin/models/tags.php');
include(__DIR__ . '/admin/models/property.php');
include(__DIR__ . '/admin/models/posts.php');
?>

<!-- hero section start -->
<div class="hero">
    <img src="assets/images/banner.jpeg" alt="hero-bg image" class="hero-bg" />
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="hero__content">
                    <h1 class="hero__title">Mua và bán tài sản một cách nhanh chóng</h1>
                    <p class="hero__desc">Khám phá các căn hộ mới, bất động sản, nhà và đất, thiết kế nhà, nhà xây
                        dựng và nhiều nhà xây dựng căn hộ khác.</p>
                    <div class="counter__wrapper">
                        <div class="counter">
                            <h3 class="counter__number"><span class="num">1200</span><span class="suffix">+</span>
                            </h3>
                            <h5 class="counter__title">Sản phẩm cao cấp</h5>
                        </div>
                        <div class="counter">
                            <h3 class="counter__number"><span class="num">15</span><span class="suffix">+</span>
                            </h3>
                            <h5 class="counter__title">Số năm kinh nghiệm</h5>
                        </div>
                        <div class="counter">
                            <h3 class="counter__number"><span class="num">146</span><span class="suffix">+</span>
                            </h3>
                            <h5 class="counter__title">Giải thưởng</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero section end -->

<!-- Advance Search option start -->
<div class="advance-search__wraper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="advance-search">
                    <form class="inline-form" action="products">
                        <div class="search__type">
                            <input type="radio" name="search-type" id="searchRent" value="Thuê" checked />
                            <label for="searchRent">Thuê</label>

                            <input type="radio" name="search-type" id="searchSell" value="Bán" />
                            <label for="searchSell">Bán</label>
                        </div>
                        <div class="input-group">
                            <label for="city">Vị trí</label>
                            <input name="city" id="city" type="text" placeholder="Đà Nẵng" class="myInput" ondrop="drop(event)" ondragover="allowDrop(event)" />
                            <div class="icon">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.75 7.5C15.75 12.75 9 17.25 9 17.25C9 17.25 2.25 12.75 2.25 7.5C2.25 5.70979 2.96116 3.9929 4.22703 2.72703C5.4929 1.46116 7.20979 0.75 9 0.75C10.7902 0.75 12.5071 1.46116 13.773 2.72703C15.0388 3.9929 15.75 5.70979 15.75 7.5Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9 9.75C10.2426 9.75 11.25 8.74264 11.25 7.5C11.25 6.25736 10.2426 5.25 9 5.25C7.75736 5.25 6.75 6.25736 6.75 7.5C6.75 8.74264 7.75736 9.75 9 9.75Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="apantment">Loại</label>
                            <select name="apartment" id="apartment">
                                <option value="">---</option>
                                <?php
                                $database = new Database();
                                $Tags = new Tags($database);
                                $result = $Tags->renderTags();
                                foreach ($result as $row) {
                                    echo '
                            <option value="' . $row['tag_id'] . '">' . $row['tag_name'] . '</option>
                                ';
                                }
                                ?>
                            </select>
                            <div class="icon">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.25 6.75L9 1.5L15.75 6.75V15C15.75 15.3978 15.592 15.7794 15.3107 16.0607C15.0294 16.342 14.6478 16.5 14.25 16.5H3.75C3.35218 16.5 2.97064 16.342 2.68934 16.0607C2.40804 15.7794 2.25 15.3978 2.25 15V6.75Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.75 16.5V9H11.25V16.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="price">Ngân sách</label>
                            <select name="price" id="price">
                                <option value="---">---</option>
                                <option value="1000-">dưới $1,000.00</option>
                                <option value="1000-10000">$1,000.00 - $10,000.00</option>
                                <option value="10000-30000">$10,000.00 - $30,000.00</option>
                                <option value="30000-50000">$30,000.00 - $50,000.00</option>
                                <option value="50000+">$Trên $50,000.00</option>
                            </select>
                            <div class="icon">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 0.75V17.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.75 3.75H7.125C6.42881 3.75 5.76113 4.02656 5.26884 4.51884C4.77656 5.01113 4.5 5.67881 4.5 6.375C4.5 7.07119 4.77656 7.73887 5.26884 8.23116C5.76113 8.72344 6.42881 9 7.125 9H10.875C11.5712 9 12.2389 9.27656 12.7312 9.76884C13.2234 10.2611 13.5 10.9288 13.5 11.625C13.5 12.3212 13.2234 12.9889 12.7312 13.4812C12.2389 13.9734 11.5712 14.25 10.875 14.25H4.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>

                        <div class="input-group">
                            <label for="acreage">Diện Tích</label>
                            <select name="acreage" id="acreage">
                                <option value="---">---</option>
                                <option value="50-">dưới 50m<sup>2</sup></option>
                                <option value="50-100">50m<sup>2</sup> - 100m<sup>2</sup></option>
                                <option value="100-150">100m<sup>2</sup> - 150m<sup>2</sup></option>
                                <option value="150-200">150m<sup>2</sup> - 200m<sup>2</sup></option>
                                <option value="200+">Trên 200m<sup>2</sup></option>
                            </select>
                            <div class="icon">
                                <i class="fa-solid fa-vector-square"></i>
                            </div>
                        </div>

                        <div class="input-group">
                            <button class="btn btn-primary" type="submit">Tìm Kiếm</button>
                        </div>
                    </form>

                    <div class="suggest">
                        <p>Gợi ý: </p>
                        <span draggable="true" ondragstart="dragStart(event)">Hà Nội</span>
                        <span draggable="true" ondragstart="dragStart(event)">Đà Nẵng</span>
                        <span draggable="true" ondragstart="dragStart(event)">Nha Trang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Advance Search option end -->

<!-- house section start  -->
<section class="houses" id="houses">
    <div class="container">
        <div class="section-header">
            <div class="section-header__content">
                <h4 class="sub-title">PHỔ BIẾN</h4>
                <h2 class="title">Ngôi Nhà Phổ Biến Của Chúng Tôi</h2>
            </div>
            <div class="section-header__action">
                <a href="./products">Xem Tất Cả <span class="icon"><img src="assets/images/icons/arrow-right.svg" alt="arrow-right" /></span></a>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                <?php
                $database = new Database();
                $Property = new Property($database);
                $result = $Property->renderThreeProperties();
                foreach ($result as $row) {
                    // $firstImageUrl = $row['first_image_url'];
                    echo '<div class="col-md-4 col-sm-6">
                    <div class="house-card">
                        <div class="house__thumb">
                            <img src="./assets/images/imgproperty' .  $row['first_image_url'] . '" alt="house-03" />
                            <div class="house__meta">
                                <a href="">' . $row['tag_name'] . '</a>
                            </div>
                        </div>
                        <div class="house__content">
                            <div class="house__content__top">
                                <h4 class="price">$' . number_format($row['price'], 2) . '</h4>
                                <span class="services">' . $row['type'] . '</span>
                            </div>
                            <div class="house__content__main">
                                <h3 class="title"><a href="propertyDetail?id=' . $row['property_id'] . '">' . $row['title'] . '</a></h3>
                                <p class="location">
                                    <span class="icon"><i class="fa-solid fa-location-dot"></i></span>
                                    <span>' . $row['location'] . '</span>
                                </p>
                            </div>
                        </div>
                        <div class="house__content__bottom">
                            <div class="info-wrap">
                                <div class="info">
                                    <div class="icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>
                                    <span>' . $row['beds'] . '</span>
                                </div>
                                <div class="info">
                                    <div class="icon">
                                        <i class="fa-solid fa-bath"></i>
                                    </div>
                                    <span>' . $row['baths'] . '</span>
                                </div>
                                <div class="info info-right">
                                    <div class="icon">
                                        <i class="fa-solid fa-vector-square"></i>
                                    </div>
                                    <span class="acreage">' . $row['acreage'] . '</span><span>M<sup>2</sup></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- house section end -->

<!-- about-us section start -->
<section class="about-us" id="about-us">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6">
                <div class="section-banner combain">
                    <div class="short-img">
                        <img src="assets/images/about-short.jpeg" alt="about short image" />
                        <a data-fancybox href="https://youtu.be/7EHnQ0VM4KY" class="playBtn">
                            <img src="assets/images/icons/play.svg" alt="play-btn" />
                        </a>
                    </div>
                    <div class="big-img">
                        <img src="assets/images/about-big.jpeg" alt="about bit image" />
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="section-header__content v2">
                    <h4 class="sub-title">VỀ CHÚNG TÔI</h4>
                    <h2 class="title">Kinh Nghiệm Mua, Bán, Cho Thuê Nhà Lâu Dài</h2>
                    <p class="text">
                        Một cộng đồng hoàn toàn mới có các căn hộ cao cấp và tiện nghi đầy phong cách tại một trong
                        những địa điểm năng động nhất của Việt Nam. Từ bên bờ biển đến bên thành phố hoặc bên hồ bơi
                        đến
                        bên lò sưởi, đây là nơi lối sống và vị trí phù hợp hoàn hảo.
                    </p>
                    <ul class="icon-list">
                        <li>
                            <span class="icon"><img src="assets/images/icons/check.svg" alt="checked" /></span>
                            <span>Kỹ năng quản lý thời gian</span>
                        </li>
                        <li>
                            <span class="icon"><img src="assets/images/icons/check.svg" alt="checked" /></span>
                            <span>Tiếp thị truyền thông xã hội</span>
                        </li>
                        <li>
                            <span class="icon"><img src="assets/images/icons/check.svg" alt="checked" /></span>
                            <span>Tìm tiếp thị Bất động sản</span>
                        </li>
                        <li>
                            <span class="icon"><img src="assets/images/icons/check.svg" alt="checked" /></span>
                            <span>Tìm tiếp thị Bất động sản</span>
                        </li>
                    </ul>
                    <a href="./introduce" class="btn btn-primary">Đọc Thêm</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-us section end -->

<!-- Trendy cities section start  -->
<section class="trendy-cities" id="trendy-cities">
    <div class="container">
        <div class="section-header">
            <div class="section-header__content">
                <h4 class="sub-title">Dự án nỗi bật</h4>
                <h2 class="title">Các dự án đã triển khai tại một số thành phố</h2>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <a href="products?city=Đà+Nẵng">
                        <div class="city-card">
                            <img src="./assets/images/cauvang-1654247842-9403-1654247849.jpeg" alt="city-01" />
                            <h4 class="title">Đà Nẵng</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="products?city=Hà+Nội">
                        <div class="city-card">
                            <img src="assets/images/cover-1578768419-1710-1578769015.jpeg" alt="city-02" />
                            <h4 class="title">Hà Nội</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="products?city=Hồ+Chí+Minh">
                        <div class="city-card">
                            <img src="assets/images/1(3).jpeg"" alt=" city-03" />
                            <h4 class="title">Hồ Chí Minh</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="products?city=Nha+Trang">
                        <div class="city-card">
                            <img src="assets/images/abdffce43449f317aa58.jpeg" alt="city-04" />
                            <h4 class="title">Nha Trang</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="products?city=Quy+Nhơn">
                        <div class="city-card">
                            <img src="assets/images/quynhon-binhdinh.jpeg" alt="city-05" />
                            <h4 class="title">Quy Nhơn</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="products?city=Cần+Thơ">
                        <div class="city-card">
                            <img src="assets/images/dia-diem-du-lich-can-tho-cover.jpeg" alt="city-06" />
                            <h4 class="title">Cần Thơ</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trendy cities section end -->

<!-- contact-us section start -->
<section class="contact-us" id="contact-us">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-5">
                <div class="section-banner">
                    <img src="assets/images/contact-info.jpeg" alt="contact-us banner" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="section-header__content v2">
                    <h4 class="sub-title">LIÊN HỆ VỚI CHÚNG TÔI</h4>
                    <h2 class="title">Tìm cách Mua một tài sản mới hoặc Bán một tài sản hiện có? NguyenLP Land cung
                        cấp một giải pháp tuyệt vời!</h2>
                    <p class="text">
                        Một cộng đồng hoàn toàn mới có các căn hộ cao cấp và tiện nghi đầy phong cách tại một trong
                        những địa điểm năng động nhất của Việt Nam.
                        Từ bên bờ biển đến bên thành phố hoặc bên hồ bơi đến bên lò sưởi, đây là nơi lối sống và vị
                        trí phù hợp hoàn hảo.
                    </p>
                    <ul class="icon-list">
                        <li>
                            <span class="icon"><img src="assets/images/icons/check.svg" alt="checked" /></span>
                            <span>Phát triển khu dân cư</span>
                        </li>
                        <li>
                            <span class="icon"><img src="assets/images/icons/check.svg" alt="checked" /></span>
                            <span>Phát triển thương mại</span>
                        </li>
                        <li>
                            <span class="icon"><img src="assets/images/icons/check.svg" alt="checked" /></span>
                            <span>Quản lý xây dựng</span>
                        </li>
                        <li>
                            <span class="icon"><img src="assets/images/icons/check.svg" alt="checked" /></span>
                            <span>Quản lý tài sản</span>
                        </li>
                    </ul>

                    <a href="./contact" class="btn btn-primary">Liên Hệ Chúng Tôi</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-us section end -->

<!-- Testimonial section start  -->
<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="section-header">
            <div class="section-header__content">
                <h4 class="sub-title">ĐÁNH GIÁ</h4>
                <h2 class="title">Khách Hàng Nói Gì Về Chúng Tôi</h2>
            </div>
            <div class="section-header__action">
                <div class="slider-nav">
                    <button type="button" class="prev">
                        <!-- <img src="assets/images/icons/arrow-left.svg" alt="arrow-left"> -->
                        <svg width="31" height="25" viewBox="0 0 31 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26 12.5H5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 19.5L5 12.5L12 5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <!-- 
                                <svg width="43" height="25" viewBox="0 0 43 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M36.0645 12.5H6.93542" stroke="#D0D5DD" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 19.5L5 12.5L12 5.5" stroke="#D0D5DD" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg> -->
                    </button>
                    <button type="button" class="next">
                        <!-- <img src="assets/images/icons/arrow-right.svg" alt="arrow-right"> -->
                        <svg width="43" height="25" viewBox="0 0 43 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12.5L38 12.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M31 5.5L38 12.5L31 19.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col-12">
                    <div class="swiper testimonialSwiper">
                        <div class="swiper-wrapper">
                            <div class="testimonial swiper-slide">
                                <div class="testimonial__header">
                                    <div class="avater">
                                        <img src="assets/images/avater-01.jpeg" alt="testimonial-1" />
                                    </div>
                                    <div class="user-info">
                                        <h5 class="name">Nicolas</h5>
                                        <h6 class="designation">Web Developer</h6>
                                    </div>
                                </div>
                                <div class="testimonial__body">
                                    <p class="content">
                                        There are many variations of passages of Lorem Ipsum available, but the
                                        majority have suffered randomised words illusion
                                    </p>
                                    <p class="meta">Tuesday 19 June, 2022</p>
                                </div>
                            </div>

                            <div class="testimonial swiper-slide">
                                <div class="testimonial__header">
                                    <div class="avater">
                                        <img src="assets/images/avater-02.jpeg" alt="testimonial-2" />
                                    </div>
                                    <div class="user-info">
                                        <h5 class="name">Mariya Deo</h5>
                                        <h6 class="designation">Designer</h6>
                                    </div>
                                </div>
                                <div class="testimonial__body">
                                    <p class="content">
                                        There are many variations of passages of Lorem Ipsum available, but the
                                        majority have suffered randomised words illusion
                                    </p>
                                    <p class="meta">Tuesday 19 June, 2022</p>
                                </div>
                            </div>

                            <div class="testimonial swiper-slide">
                                <div class="testimonial__header">
                                    <div class="avater">
                                        <img src="assets/images/avater-03.jpeg" alt="testimonial-3" />
                                    </div>
                                    <div class="user-info">
                                        <h5 class="name">Jhon Smith</h5>
                                        <h6 class="designation">Web Developer</h6>
                                    </div>
                                </div>
                                <div class="testimonial__body">
                                    <p class="content">
                                        There are many variations of passages of Lorem Ipsum available, but the
                                        majority have suffered randomised words illusion
                                    </p>
                                    <p class="meta">Tuesday 19 June, 2022</p>
                                </div>
                            </div>

                            <div class="testimonial swiper-slide">
                                <div class="testimonial__header">
                                    <div class="avater">
                                        <img src="assets/images/avater-01.jpeg" alt="testimonial-1" />
                                    </div>
                                    <div class="user-info">
                                        <h5 class="name">Nicolas</h5>
                                        <h6 class="designation">Web Developer</h6>
                                    </div>
                                </div>
                                <div class="testimonial__body">
                                    <p class="content">
                                        There are many variations of passages of Lorem Ipsum available, but the
                                        majority have suffered randomised words illusion
                                    </p>
                                    <p class="meta">Tuesday 19 June, 2022</p>
                                </div>
                            </div>

                            <div class="testimonial swiper-slide">
                                <div class="testimonial__header">
                                    <div class="avater">
                                        <img src="assets/images/avater-02.jpeg" alt="testimonial-2" />
                                    </div>
                                    <div class="user-info">
                                        <h5 class="name">Mariya Deo</h5>
                                        <h6 class="designation">Designer</h6>
                                    </div>
                                </div>
                                <div class="testimonial__body">
                                    <p class="content">
                                        There are many variations of passages of Lorem Ipsum available, but the
                                        majority have suffered randomised words illusion
                                    </p>
                                    <p class="meta">Tuesday 19 June, 2022</p>
                                </div>
                            </div>

                            <div class="testimonial swiper-slide">
                                <div class="testimonial__header">
                                    <div class="avater">
                                        <img src="assets/images/avater-03.jpeg" alt="testimonial-3" />
                                    </div>
                                    <div class="user-info">
                                        <h5 class="name">Jhon Smith</h5>
                                        <h6 class="designation">Web Developer</h6>
                                    </div>
                                </div>
                                <div class="testimonial__body">
                                    <p class="content">
                                        There are many variations of passages of Lorem Ipsum available, but the
                                        majority have suffered randomised words illusion
                                    </p>
                                    <p class="meta">Tuesday 19 June, 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial section end -->

<!-- blog section start  -->
<section class="faqs" id="faqs">
    <div class="container">
        <div class="section-header">
            <div class="section-header__content">
                <h4 class="sub-title">CÂU HỎI</h4>
                <h2 class="title">Các Câu Hỏi Thường Gặp</h2>
            </div>
        </div>
        <div class="section-content">
            <div class="accordion__wrapper__v2">
                <div class="accordion accordion-flush" id="accordionFlushExample01">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading01">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse01" aria-expanded="false" aria-controls="flush-collapse01">
                                        01. Bạn làm nghề gì?
                                    </button>
                                </h2>
                                <div id="flush-collapse01" class="accordion-collapse collapse show" aria-labelledby="flush-heading01" data-bs-parent="#accordionFlushExample01">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam
                                            amet distinctio, impedit sequi laboriosam esse magni
                                            eligendi neque. Sequi quas molestiae non, illum enim magnam architecto
                                            et quia nisi exercitationem rerum, rem veritatis officiis
                                            vitae, ex debitis numquam quos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading02">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse02" aria-expanded="false" aria-controls="flush-collapse02">
                                        02. Tại sao chúng tôi là tốt nhất?
                                    </button>
                                </h2>
                                <div id="flush-collapse02" class="accordion-collapse collapse" aria-labelledby="flush-heading02" data-bs-parent="#accordionFlushExample01">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam
                                            amet distinctio, impedit sequi laboriosam esse magni
                                            eligendi neque. Sequi quas molestiae non, illum enim magnam architecto
                                            et quia nisi exercitationem rerum, rem veritatis officiis
                                            vitae, ex debitis numquam quos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading03">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse03" aria-expanded="false" aria-controls="flush-collapse03">
                                        03. Những ngành công nghiệp được bảo hiểm là gì?
                                    </button>
                                </h2>
                                <div id="flush-collapse03" class="accordion-collapse collapse" aria-labelledby="flush-heading03" data-bs-parent="#accordionFlushExample01">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam
                                            amet distinctio, impedit sequi laboriosam esse magni
                                            eligendi neque. Sequi quas molestiae non, illum enim magnam architecto
                                            et quia nisi exercitationem rerum, rem veritatis officiis
                                            vitae, ex debitis numquam quos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading04">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse04" aria-expanded="false" aria-controls="flush-collapse04">
                                        04. Tại sao chúng tôi là tốt nhất?
                                    </button>
                                </h2>
                                <div id="flush-collapse04" class="accordion-collapse collapse" aria-labelledby="flush-heading04" data-bs-parent="#accordionFlushExample01">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam
                                            amet distinctio, impedit sequi laboriosam esse magni
                                            eligendi neque. Sequi quas molestiae non, illum enim magnam architecto
                                            et quia nisi exercitationem rerum, rem veritatis officiis
                                            vitae, ex debitis numquam quos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading05">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse05" aria-expanded="false" aria-controls="flush-collapse05">
                                        05. Bạn làm nghề gì?
                                    </button>
                                </h2>
                                <div id="flush-collapse05" class="accordion-collapse collapse" aria-labelledby="flush-heading05" data-bs-parent="#accordionFlushExample01">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam
                                            amet distinctio, impedit sequi laboriosam esse magni
                                            eligendi neque. Sequi quas molestiae non, illum enim magnam architecto
                                            et quia nisi exercitationem rerum, rem veritatis officiis
                                            vitae, ex debitis numquam quos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading06">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse06" aria-expanded="false" aria-controls="flush-collapse06">
                                        06. Bạn làm nghề gì?
                                    </button>
                                </h2>
                                <div id="flush-collapse06" class="accordion-collapse collapse" aria-labelledby="flush-heading06" data-bs-parent="#accordionFlushExample01">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquam
                                            amet distinctio, impedit sequi laboriosam esse magni
                                            eligendi neque. Sequi quas molestiae non, illum enim magnam architecto
                                            et quia nisi exercitationem rerum, rem veritatis officiis
                                            vitae, ex debitis numquam quos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog section end -->

<!-- blog section start  -->
<section class="blog" id="blog">
    <div class="container">
        <div class="section-header">
            <div class="section-header__content">
                <h4 class="sub-title">Tin Tức</h4>
                <h2 class="title">Tin Tức Bất Động Sản Mới Nhất</h2>
            </div>
            <div class="section-header__action">
                <a href="./news">Xem Tất Cả <span class="icon"><img src="assets/images/icons/arrow-right.svg" alt="arrow-right" /></span></a>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                <style>
                    .description-post {
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        padding: 0 !important;
                        margin-bottom: 10px;
                    }

                    .title-post {
                        display: -webkit-box;
                        -webkit-line-clamp: 0;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        padding: 0 !important;
                        margin-bottom: 10px;
                    }
                </style>
                <?php
                $database = new Database();
                $Post = new Post($database);
                $result = $Post->renderThreePost();
                foreach ($result as $row) {
                    echo '
                        <div class="col-md-4 col-sm-6">
                        <a href="newDetail?post_id=' . $row['post_id'] . '" style="color: unset;">
                            <div class="blog-card">
                                <div class="blog__thumb">

                                        <img src="' . $row['article_photo'] . '" alt="blog-2" />
                                </div>

                                <div class="blog__meta">
                                    ' . $row['created_at'] . '
                                </div>
                                <div class="blog__content">
                                    <h4 class="title title-post">' . $row['title'] . '</h4>
                                    <p class="description description-post">' . $row['description'] . '.</p>
                                    <a href="newDetail?post_id=' . $row['post_id'] . '" class="btn btn-primary btn-more">Đọc Thêm</a>
                                </div>
                                </div>
                                </a>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php include 'views/inc/footer.php' ?>
<script src="./assets/js/counter-number.js"></script>
<!-- <script src="assets/js/scripts.js"></script> -->