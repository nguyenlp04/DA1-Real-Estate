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
            <div class="section-content ">
                <div class="section-header search-products-title">
                </div>
                <div class="row">
                    <?php
                    $stt = 1;
                    $database = new Database();
                    $Property = new Property($database);
                    $result = $Property->renderProperty();
                    foreach ($result as $row) {
                        echo ' <div class="col-md-3 col-sm-6 card-product article-loop">
                            <div class="house-card">
                                <div class="house__thumb">
                                    <img src="./assets/images/house-03.jpeg" alt="house-03" />
                                    <div class="house__meta">
                                        <a href="">' . $row['tag_name'] . '</a>
                                    </div>
                                </div>

                                <div class="house__content">
                                    <div class="house__content__top">
                                        <h4 class="price">$' . $row['price'] . '</h4>
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
                    </div> </div>';
                    }
                    ?>
                </div>
            </div>
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
function filterProducts() {
const selectedservices = servicesSelect.value.toLowerCase();
const selectedCity = citySelect.value.toLowerCase();
const selectedApartment = apartmentSelect.value.toLowerCase();
const selectedPrice = priceSelect.value;
const selectedAcreage = acreageSelect.value;
console.log(selectedservices);
console.log(selectedservices);
let filteredProducts = [];
    let filteredCount = 0;
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
        (selectedPrice === "1000-10000" && price >= 1000 && price < 10000) || // Lọc theo giá
        (selectedPrice === "10000-30000" && price >= 10000 && price < 30000) ||
        (selectedPrice === "30000-50000" && price >= 30000 && price < 50000) ||
        (selectedPrice === "50000+" && price >= 50000)) &&
        ((selectedAcreage === "---") || 
        (selectedAcreage === "50-" && acreage < 50) ||
        (selectedAcreage === "50-100" && acreage >= 50 && acreage <= 100) ||
        (selectedAcreage === "100-150" && acreage > 100 && acreage <= 150) ||
        (selectedAcreage === "150-200" && acreage > 150 && acreage <= 200) ||
        (selectedAcreage === "200+" && acreage >= 200))
        
    ) {
      // card.style.display = 'block';
      card.style.display = 'block'
            filteredProducts.push(card);
            filteredCount++;
            console.log(filteredProducts);
    } else {
      // card.style.display = 'none'; 
      card.style.display = "none";
    }
  });
}
(function($) {
  var paginate = {
      startPos: function(pageNumber, perPage) {
          // determine what array position to start from
          // based on current page and # per page
          return pageNumber * perPage;
      },

      getPage: function(items, startPos, perPage) {
          // declare an empty array to hold our page items
          var page = [];

          // only get items after the starting position
          items = items.slice(startPos, items.length);

          // loop remaining items until max per page
          for (var i = 0; i < perPage; i++) {
              page.push(items[i]);
          }

          return page;
      },

      totalPages: function(items, perPage) {
          // determine total number of pages
          return Math.ceil(items.length / perPage);
      },

      createBtns: function(totalPages, currentPage) {
          // create buttons to manipulate current page
          var pagination = $('<div class="pagination" />');

          // add a "first" button
          pagination.append('<span class="text-primary pagination-button">&laquo;</span>');

          // add pages inbetween
          for (var i = 1; i <= totalPages; i++) {
              // truncate list when too large
              if (totalPages > 5 && currentPage !== i) {
                  // if on first two pages
                  if (currentPage === 1 || currentPage === 2) {
                      // show first 5 pages
                      if (i > 5) continue;
                      // if on last two pages
                  } else if (currentPage === totalPages || currentPage === totalPages - 1) {
                      // show last 5 pages
                      if (i < totalPages - 4) continue;
                      // otherwise show 5 pages w/ current in middle
                  } else {
                      if (i < currentPage - 2 || i > currentPage + 2) {
                          continue;
                      }
                  }
              }

              // markup for page button
              var pageBtn = $('<span class=" pagination-button page-num" />');

              // add active class for current page
              if (i == currentPage) {
                  pageBtn.addClass('active');
              }

              // set text to the page number
              pageBtn.text(i);

              // add button to the container
              pagination.append(pageBtn);
          }

          // add a "last" button
          pagination.append($('<span class="text-primary pagination-button">&raquo;</span>'));

          return pagination;
      },

      createPage: function(items, currentPage, perPage) {
          // remove pagination from the page
          $('.pagination').remove();

          // set context for the items
          var container = items.parent(),
              // detach items from the page and cast as array
              items = items.detach().toArray(),
              // get start position and select items for page
              startPos = this.startPos(currentPage - 1, perPage),
              page = this.getPage(items, startPos, perPage);

          // loop items and readd to page
          $.each(page, function() {
              // prevent empty items that return as Window
              if (this.window === undefined) {
                  container.append($(this));
              }
          });

          // prep pagination buttons and add to page
          var totalPages = this.totalPages(items, perPage),
              pageButtons = this.createBtns(totalPages, currentPage);

          container.after(pageButtons);
      }
  };

  $.fn.paginate = function(perPage) {
      var items = $(this);

      // default perPage to 5
      if (isNaN(perPage) || perPage === undefined) {
          perPage = 5;
      }

      // don't fire if fewer items than perPage
      if (items.length <= perPage) {
          return true;
      }

      // ensure items stay in the same DOM position
      if (items.length !== items.parent()[0].children.length) {
          items.wrapAll('<div class="pagination-items " />');
      }

      // paginate the items starting at page 1
      paginate.createPage(items, 1, perPage);

      // handle click events on the buttons
      $(document).on('click', '.pagination-button', function(e) {
          // get current page from active button
          var currentPage = parseInt($('.pagination-button.active').text(), 10),
              newPage = currentPage,
              totalPages = paginate.totalPages(items, perPage),
              target = $(e.target);

          // get numbered page
          newPage = parseInt(target.text(), 10);
          if (target.text() == '«') newPage = 1;
          if (target.text() == '»') newPage = totalPages;

          // ensure newPage is in available range
          if (newPage > 0 && newPage <= totalPages) {
              paginate.createPage(items, newPage, perPage);
          }
      });
  };

  console.log(paginate.totalPages);
})(jQuery);
$('.article-loop').paginate(4);

</script>
</section>
<?php include 'inc/footer.php' ?>