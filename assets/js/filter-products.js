const houseCards = document.querySelectorAll('.card-product');

// Lấy các phần tử HTML
const servicesSelect = document.getElementById('services');
const citySelect = document.getElementById('city');
const apartmentSelect = document.getElementById('apartment');
const priceSelect = document.getElementById('price'); 
const acreageSelect = document.getElementById('acreage');

// Thêm sự kiện change cho các lựa chọn
servicesSelect.addEventListener('change', filterProducts);
citySelect.addEventListener('change', filterProducts);
apartmentSelect.addEventListener('change', filterProducts);
priceSelect.addEventListener('change', filterProducts); 
acreageSelect.addEventListener('change', filterProducts); 
function test() {
  console.log(123);
}
function filterProducts() {
const selectedservices = servicesSelect.value.toLowerCase();
const selectedCity = citySelect.value.toLowerCase();
const selectedApartment = apartmentSelect.value.toLowerCase();
const selectedPrice = priceSelect.value;
const selectedAcreage = acreageSelect.value;
console.log(selectedservices);

  houseCards.forEach(card => {
    const services = card.querySelector('.services').textContent.toLowerCase();
    const location = card.querySelector('.location').textContent.toLowerCase();
    const houseMeta = card.querySelector('.house__content__main .title').textContent.toLowerCase();
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
      card.style.display = 'block';
    } else {
      card.style.display = 'none'; 
    }
  });
}