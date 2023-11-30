<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../admin/models/tags.php');
include(__DIR__ . '/../admin/models/property.php');
include 'inc/header.php'
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<section>
    <div class="container">
        <div class="path-page"><a href="home">Trang chủ </a><i class="fa-solid fa-angle-right"></i>
            <p>Sản Phẩm</p>
        </div>
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9103837.511775466!2d100.61540368373728!3d15.74048014411591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31157a4d736a1e5f%3A0xb03bb0c9e2fe62be!2zVmnhu4d0IE5hbQ!5e1!3m2!1svi!2s!4v1685888231342!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
        <div class="search-products">
            <div class="advance-search">
                <form action="#" class="inline-form">
                    <div class="input-group">
                        <label for="services">Dịch vụ</label>
                        <select name="services" id="services">
                            <option value="">---</option>
                            <option value="Thuê">Thuê</option>
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
                            <?php
                            $database = new Database();
                            $Tags = new Tags($database);
                            $result = $Tags->renderTags();
                            foreach ($result as $row) {
                                echo '
                            <option value="' . $row['tag_name'] . '">' . $row['tag_name'] . '</option>
                                ';
                            }
                            ?>
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


        <div class="container">
            <div class="section-content">
                <div class="section-header search-products-title"></div>
                <div class="row dataContainer" id="dataContainer">
                    <?php
                    $database = new Database();
                    $Property = new Property($database);
                    $result = $Property->renderProperty();
                    $cityType = isset($_GET['city']) ? $_GET['city'] : '';
                    if($cityType == ''){
                        $result = $Property->renderProperty();
                    } else {
                        $result = $Property->searchProperties();
                    }
                    foreach ($result as $row) {
                        // $firstImageUrl = $row['first_image_url'];
                        echo '<div class="col-md-3 col-sm-6 card-product article-loop">
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
                <nav aria-label="Page navigation example">
                    <ul id="paginationContainer" class="pagination">
                    </ul>
                </nav>


            </div>
        </div>

        <script>
            const houseCards = document.querySelectorAll('.card-product');
            const servicesSelect = document.getElementById('services');
            const citySelect = document.getElementById('city');
            const apartmentSelect = document.getElementById('apartment');
            const priceSelect = document.getElementById('price');
            const acreageSelect = document.getElementById('acreage');

            servicesSelect.addEventListener('change', filterProducts);
            citySelect.addEventListener('change', filterProducts);
            apartmentSelect.addEventListener('change', filterProducts);
            priceSelect.addEventListener('change', filterProducts);
            acreageSelect.addEventListener('change', filterProducts);

            let data = [];
            houseCards.forEach(card => {
                data.push(card);
            });

            var itemsPerPage = 8;
            var currentPage = 1;
            var filteredProducts = [];

            function filterProducts() {
                const selectedservices = servicesSelect.value.toLowerCase();
                const selectedCity = citySelect.value.toLowerCase();
                const selectedApartment = apartmentSelect.value.toLowerCase();
                const selectedPrice = priceSelect.value;
                const selectedAcreage = acreageSelect.value;

                filteredProducts = [];

                houseCards.forEach(card => {
                    const services = card.querySelector('.services').textContent.toLowerCase();
                    const location = card.querySelector('.location').textContent.toLowerCase();
                    const houseMeta = card.querySelector('.house__meta').textContent.toLowerCase();
                    const price = parseFloat(card.querySelector('.price').textContent.replace(/[\$,]/g, '').trim());
                    const acreage = card.querySelector('.acreage').textContent.toLowerCase();

                    if (
                        services.includes(selectedservices) &&
                        location.includes(selectedCity) &&
                        houseMeta.includes(selectedApartment) &&
                        ((selectedPrice === "---") ||
                            (selectedPrice === "1000-" && price < 1000) ||
                            (selectedPrice === "1000-10000" && price >= 1000 && price < 10000) ||
                            (selectedPrice === "10000-30000" && price >= 10000 && price < 30000) ||
                            (selectedPrice === "30000-50000" && price >= 30000 && price < 50000) ||
                            (selectedPrice === "50000+" && price >= 50000)) &&
                        ((selectedAcreage === "---") ||
                            (selectedAcreage === "0-50" && parseInt(acreage) >= 0 && parseInt(acreage) < 50) ||
                            (selectedAcreage === "50-100" && parseInt(acreage) >= 50 && parseInt(acreage) < 100) ||
                            (selectedAcreage === "100-200" && parseInt(acreage) >= 100 && parseInt(acreage) < 200) ||
                            (selectedAcreage === "200+" && parseInt(acreage) >= 200))
                    ) {
                        filteredProducts.push(card);
                    }
                });

                renderItems(filteredProducts, currentPage);
            }

            function renderItems(items, page) {
                const startIndex = (page - 1) * itemsPerPage;
                const endIndex = page * itemsPerPage;

                const visibleItems = items.slice(startIndex, endIndex);

                data.forEach(card => {
                    card.style.display = 'none';
                });

                visibleItems.forEach(card => {
                    card.style.display = 'block';
                });

                renderPagination(items.length);
            }

            function renderPagination(totalItems) {
                const totalPages = Math.ceil(totalItems / itemsPerPage);

                const paginationContainer = document.getElementById('paginationContainer');
                paginationContainer.innerHTML = '';

                // Tạo nút "Previous"
                var previousPageItem = document.createElement('li');
                previousPageItem.className = 'page-item';
                var previousPageLink = document.createElement('a');
                previousPageLink.className = 'page-link';
                previousPageLink.href = '#';
                previousPageLink.innerText = 'Previous';

                // Kiểm tra nếu đang ở trang đầu tiên, thì ẩn nút "Previous"
                if (currentPage > 1) {
                    previousPageLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        currentPage--;
                        renderItems(filteredProducts, currentPage);
                        setActivePage(currentPage);
                    });
                } else {
                    previousPageItem.classList.add('disabled');
                }

                previousPageItem.appendChild(previousPageLink);
                paginationContainer.appendChild(previousPageItem);

                // Tạo các nút số trang
                for (let i = 1; i <= totalPages; i++) {
                    var pageItem = document.createElement('li');
                    pageItem.className = 'page-item';
                    var pageLink = document.createElement('a');
                    pageLink.className = 'page-link';
                    pageLink.innerText = i;

                    // Kiểm tra nếu đang ở trang hiện tại, thì thêm class "active" cho nút đó
                    if (i === currentPage) {
                        pageLink.classList.add('active');
                    }

                    pageLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        currentPage = i;
                        renderItems(filteredProducts, currentPage);
                        const allPageLinks = document.querySelectorAll('.page-link');
                        allPageLinks.forEach(link => link.classList.remove('active'));
                        this.classList.add('active');
                        setActivePage(currentPage);
                    });

                    pageItem.appendChild(pageLink);
                    paginationContainer.appendChild(pageItem);
                }

                // Tạo nút "Next"
                var nextPageItem = document.createElement('li');
                nextPageItem.className = 'page-item';
                var nextPageLink = document.createElement('a');
                nextPageLink.className = 'page-link';
                nextPageLink.href = '#';
                nextPageLink.innerText = 'Next';

                // Kiểm tra nếu đang ở trang cuối cùng, thì ẩn nút "Next"
                if (currentPage < totalPages) {
                    nextPageLink.addEventListener('click', function(event) {
                        event.preventDefault();
                        currentPage++;
                        renderItems(filteredProducts, currentPage);
                        setActivePage(currentPage);
                    });
                } else {
                    nextPageItem.classList.add('disabled');
                }

                nextPageItem.appendChild(nextPageLink);
                paginationContainer.appendChild(nextPageItem);
            }




            function setActivePage(page) {
                var paginationContainer = document.getElementById('paginationContainer');
                var pageLinks = paginationContainer.getElementsByTagName('a');
                for (var i = 0; i < pageLinks.length; i++) {
                    pageLinks[i].classList.remove('active');
                }
                pageLinks[page].classList.add('active');
            }
            filterProducts();

            //             function renderPagination(totalItems) {
            //     const totalPages = Math.ceil(totalItems / itemsPerPage);

            //     const paginationContainer = document.getElementById('paginationContainer');
            //     paginationContainer.innerHTML = '';

            //     for (let i = 1; i <= totalPages; i++) {
            //         var pageItem = document.createElement('li');
            //         pageItem.className = 'page-item';

            //         var pageLink = document.createElement('a');
            //         pageLink.className = 'page-link';
            //         // Set the href to '#' for demonstration purposes. Update this to a valid link or use JavaScript.
            //         // pageLink.href = '#';
            //         pageLink.innerText = i;

            //         pageLink.addEventListener('click', function(event) {
            //             event.preventDefault(); // Prevent the default link behavior
            //             currentPage = parseInt(this.innerText);
            //             displayData();
            //             setActivePage(currentPage);
            //         });

            //         pageItem.appendChild(pageLink);
            //         paginationContainer.appendChild(pageItem);
            //     }
            // }
        </script>
</section>
<?php include 'inc/footer.php' ?>