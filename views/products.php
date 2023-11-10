<?php 

include 'inc/header.php'
?>
    <section>
        <div class="container">
        <div class="path-page"><a href="home">Trang chủ </a><i class="fa-solid fa-angle-right"></i> <p>Sản Phẩm</p></div>
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9103837.511775466!2d100.61540368373728!3d15.74048014411591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31157a4d736a1e5f%3A0xb03bb0c9e2fe62be!2zVmnhu4d0IE5hbQ!5e1!3m2!1svi!2s!4v1685888231342!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
        <div class="search-products">
            <div class="advance-search">
                <form action="#" class="inline-form">
                    <div class="input-group">
                        <label for="services">Dịch vụ</label>
                        <select name="services" id="services">
                          <option value="">---</option>
                          <option value="Thuê">Thuê</option>
                          <option value="Mua">Mua</option>
                          <option value="Bán">Bán</option>
                        </select>
                        <div class="icon">
                            <i class="fa-solid fa-panorama"></i>
                        </div>
                      </div>
                      <div class="input-group">
                        <label for="city">Vị trí</label>
                        <input type="text" name="" id="city">
                        <div class="icon">
                          <i class="fa-solid fa-location-dot"></i>
                        </div>
                      </div>
                      <div class="input-group">
                        <label for="apartment">Loại</label>
                        <select name="apartment" id="apartment">
                          <option value="">---</option>
                          <option value="Biệt thự">Biệt thự</option>
                          <option value="Nhà ở thương mại">Nhà ở thương mại</option>
                          <option value="Nhà ở chung cư">Nhà ở chung cư</option>
                        </select>
                        <div class="icon">
                          <i class="fa-solid fa-house"></i>
                        </div>
                      </div>
                      <div class="input-group">
                        <label for="price">Ngân Sách</label>
                        <select name="price" id="price">
                          <option value="---">---</option>
                          <option value="1000-">dưới $1,000.00</option>
                          <option value="1000-10000">$1,000.00 - $10,000.00</option>
                          <option value="10000-30000">$10,000.00 - $30,000.00</option>
                          <option value="30000-50000">$30,000.00 - $50,000.00</option>
                          <option value="50000+">$Trên $50,000.00</option>
                        </select>
                        <div class="icon">
                          <i class="fa-solid fa-dollar-sign"></i>
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
                </form>
               
            </div>
        </div>
       
        <section class="section-products ">
            <div class="container">
                <div class="section-content ">
                    <div class="section-header search-products-title">
                        <div class="section-header__content">
                            <h2 class="title">Sản Phẩm Nổi Bật</h2>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="card-product">
                            <div class="house-card">
                                <div class="house__thumb">
                                    <img src="./assets/images/house-03.jpeg" alt="house-03" />
                                    <div class="house__meta">
                                        <a href="propertyDetail">Bất Động Sản</a>
                                    </div>
                                </div>
        
                                <div class="house__content">
                                    <div class="house__content__top">
                                        <h4 class="price">$4,600.00</h4>
                                        <span class="services">Thuê</span>
                                    </div>
                                    <div class="house__content__main">
                                        <h3 class="title"><a href="#">Nhà Ở Chung Cư</a></h3>
                                        <p class="location">
                                            <span class="icon"><i class="fa-solid fa-location-dot"></i></span>
                                            <span>Đại Dương, Đa Tốn, Gia Lâm, Hà Nội</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="house__content__bottom">
                                    <div class="info-wrap">
                                        <div class="info">
                                            <div class="icon">
                                                <i class="fa-solid fa-bed"></i>
                                            </div>
                                            <span>2</span>
                                        </div>
                                        <div class="info">
                                            <div class="icon">
                                                <i class="fa-solid fa-house"></i>
                                            </div>
                                            <span>2</span>
                                        </div>
                                        <div class="info">
                                            <div class="icon">
                                                <i class="fa-solid fa-car-tunnel"></i>
                                            </div>
                                            <span>2</span>
                                        </div>
                                        <div class="info info-right">
                                            <div class="icon">
                                                <i class="fa-solid fa-vector-square"></i>
                                            </div>
                                            <span class="acreage">49</span><span>M<sup>2</sup></span> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="card-product">
                            <div class="house-card">
                                <div class="house__thumb">
                                    <img src="./assets/images/house-03.jpeg" alt="house-03" />
                                    <div class="house__meta">
                                        <a href="#">Bất Động Sản</a>
                                    </div>
                                </div>
        
                                <div class="house__content">
                                    <div class="house__content__top">
                                        <h4 class="price">$4,600.00</h4>
                                        <span class="services">Thuê</span>
                                    </div>
                                    <div class="house__content__main">
                                        <h3 class="title"><a href="#">Nhà Ở Chung Cư</a></h3>
                                        <p class="location">
                                            <span class="icon"><i class="fa-solid fa-location-dot"></i></span>
                                            <span>Đại Dương, Đa Tốn, Gia Lâm, Hà Nội</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="house__content__bottom">
                                    <div class="info-wrap">
                                        <div class="info">
                                            <div class="icon">
                                                <i class="fa-solid fa-bed"></i>
                                            </div>
                                            <span>2</span>
                                        </div>
                                        <div class="info">
                                            <div class="icon">
                                                <i class="fa-solid fa-house"></i>
                                            </div>
                                            <span>2</span>
                                        </div>
                                        <div class="info">
                                            <div class="icon">
                                                <i class="fa-solid fa-car-tunnel"></i>
                                            </div>
                                            <span>2</span>
                                        </div>
                                        <div class="info info-right">
                                            <div class="icon">
                                                <i class="fa-solid fa-vector-square"></i>
                                            </div>
                                            <span class="acreage">49</span><span>M<sup>2</sup></span> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
        
                <div class="next-prev">
                    <div class="box active">1</div>
                    <div class="box">2</div>
                </div>
            </div>
        </section>
    </div>
    </section>
    <?php include 'inc/footer.php' ?>

    <!-- copyright arean end -->


  

</body>

</html>