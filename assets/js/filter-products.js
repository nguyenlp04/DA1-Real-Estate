// const houseCards = document.querySelectorAll('.card-product');

// // Lấy các phần tử HTML
// const servicesSelect = document.getElementById('services');
// const citySelect = document.getElementById('city');
// const apartmentSelect = document.getElementById('apartment');
// const priceSelect = document.getElementById('price'); 
// const acreageSelect = document.getElementById('acreage');

// // Thêm sự kiện change cho các lựa chọn
// servicesSelect.addEventListener('change', filterProducts);
// citySelect.addEventListener('change', filterProducts);
// apartmentSelect.addEventListener('change', filterProducts);
// priceSelect.addEventListener('change', filterProducts); 
// acreageSelect.addEventListener('change', filterProducts); 

// function filterProducts() {
// const selectedservices = servicesSelect.value.toLowerCase();
// const selectedCity = citySelect.value.toLowerCase();
// const selectedApartment = apartmentSelect.value.toLowerCase();
// const selectedPrice = priceSelect.value;
// const selectedAcreage = acreageSelect.value;
// console.log(selectedservices);
// console.log(selectedservices);

// let filteredProducts = [];
//     let filteredCount = 0;
//   houseCards.forEach(card => {
//     const services = card.querySelector('.services').textContent.toLowerCase();
//     const location = card.querySelector('.location').textContent.toLowerCase();
//     const houseMeta = card.querySelector('.house__meta').textContent.toLowerCase();
//     const price = parseFloat(card.querySelector('.price').textContent.replace(/[\$,]/g, '').trim());
//     const acreage = card.querySelector('.acreage').textContent.toLowerCase();
//     if (
//         services.includes(selectedservices) && 
//         location.includes(selectedCity) && 
//         houseMeta.includes(selectedApartment) &&
//         ((selectedPrice === "---") ||
//         (selectedPrice === "1000-" && price < 1000) || 
//         (selectedPrice === "1000-10000" && price >= 1000 && price < 10000) || // Lọc theo giá
//         (selectedPrice === "10000-30000" && price >= 10000 && price < 30000) ||
//         (selectedPrice === "30000-50000" && price >= 30000 && price < 50000) ||
//         (selectedPrice === "50000+" && price >= 50000)) &&
//         ((selectedAcreage === "---") || 
//         (selectedAcreage === "50-" && acreage < 50) ||
//         (selectedAcreage === "50-100" && acreage >= 50 && acreage <= 100) ||
//         (selectedAcreage === "100-150" && acreage > 100 && acreage <= 150) ||
//         (selectedAcreage === "150-200" && acreage > 150 && acreage <= 200) ||
//         (selectedAcreage === "200+" && acreage >= 200))
        
//     ) {
//       // card.style.display = 'block';
//       card.style.visibility = "visible";
//             filteredProducts.push(card);
//             filteredCount++;
//             console.log(card);
//     } else {
//       // card.style.display = 'none'; 
//       card.style.visibility = "hidden";
//     }
//   });
// }



// (function($) {
//   var paginate = {
//       startPos: function(pageNumber, perPage) {
//           // determine what array position to start from
//           // based on current page and # per page
//           return pageNumber * perPage;
//       },

//       getPage: function(items, startPos, perPage) {
//           // declare an empty array to hold our page items
//           var page = [];

//           // only get items after the starting position
//           items = items.slice(startPos, items.length);

//           // loop remaining items until max per page
//           for (var i = 0; i < perPage; i++) {
//               page.push(items[i]);
//           }

//           return page;
//       },

//       totalPages: function(items, perPage) {
//           // determine total number of pages
//           return Math.ceil(items.length / perPage);
//       },

//       createBtns: function(totalPages, currentPage) {
//           // create buttons to manipulate current page
//           var pagination = $('<div class="pagination" />');

//           // add a "first" button
//           pagination.append('<span class="text-primary pagination-button">&laquo;</span>');

//           // add pages inbetween
//           for (var i = 1; i <= totalPages; i++) {
//               // truncate list when too large
//               if (totalPages > 5 && currentPage !== i) {
//                   // if on first two pages
//                   if (currentPage === 1 || currentPage === 2) {
//                       // show first 5 pages
//                       if (i > 5) continue;
//                       // if on last two pages
//                   } else if (currentPage === totalPages || currentPage === totalPages - 1) {
//                       // show last 5 pages
//                       if (i < totalPages - 4) continue;
//                       // otherwise show 5 pages w/ current in middle
//                   } else {
//                       if (i < currentPage - 2 || i > currentPage + 2) {
//                           continue;
//                       }
//                   }
//               }

//               // markup for page button
//               var pageBtn = $('<span class=" pagination-button page-num" />');

//               // add active class for current page
//               if (i == currentPage) {
//                   pageBtn.addClass('active');
//               }

//               // set text to the page number
//               pageBtn.text(i);

//               // add button to the container
//               pagination.append(pageBtn);
//           }

//           // add a "last" button
//           pagination.append($('<span class="text-primary pagination-button">&raquo;</span>'));

//           return pagination;
//       },

//       createPage: function(items, currentPage, perPage) {
//           // remove pagination from the page
//           $('.pagination').remove();

//           // set context for the items
//           var container = items.parent(),
//               // detach items from the page and cast as array
//               items = items.detach().toArray(),
//               // get start position and select items for page
//               startPos = this.startPos(currentPage - 1, perPage),
//               page = this.getPage(items, startPos, perPage);

//           // loop items and readd to page
//           $.each(page, function() {
//               // prevent empty items that return as Window
//               if (this.window === undefined) {
//                   container.append($(this));
//               }
//           });

//           // prep pagination buttons and add to page
//           var totalPages = this.totalPages(items, perPage),
//               pageButtons = this.createBtns(totalPages, currentPage);

//           container.after(pageButtons);
//       }
//   };

//   // stuff it all into a jQuery method!
//   $.fn.paginate = function(perPage) {
//       var items = $(this);

//       // default perPage to 5
//       if (isNaN(perPage) || perPage === undefined) {
//           perPage = 5;
//       }

//       // don't fire if fewer items than perPage
//       if (items.length <= perPage) {
//           return true;
//       }

//       // ensure items stay in the same DOM position
//       if (items.length !== items.parent()[0].children.length) {
//           items.wrapAll('<div class="pagination-items " />');
//       }

//       // paginate the items starting at page 1
//       paginate.createPage(items, 1, perPage);

//       // handle click events on the buttons
//       $(document).on('click', '.pagination-button', function(e) {
//           // get current page from active button
//           var currentPage = parseInt($('.pagination-button.active').text(), 10),
//               newPage = currentPage,
//               totalPages = paginate.totalPages(items, perPage),
//               target = $(e.target);

//           // get numbered page
//           newPage = parseInt(target.text(), 10);
//           if (target.text() == '«') newPage = 1;
//           if (target.text() == '»') newPage = totalPages;

//           // ensure newPage is in available range
//           if (newPage > 0 && newPage <= totalPages) {
//               paginate.createPage(items, newPage, perPage);
//           }
//       });
//   };

// })(jQuery);
// $('.article-loop').paginate(4);

// function handleFilterAndPaginate() {
// // Gọi hàm filterProducts để lọc sản phẩm
// filterProducts();

// // Lấy mảng sản phẩm đã lọc
// const filteredProducts = Array.from(document.querySelectorAll('.card-product[style="visibility: visible;"]'));

// // Số sản phẩm trên mỗi trang
// const itemsPerPage = 4;

// // Sử dụng hàm paginate để thực hiện phân trang
// $('.pagination-items').paginate(itemsPerPage);
// console.log(filteredProducts);
// }