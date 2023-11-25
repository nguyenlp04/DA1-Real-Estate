    const host = "https://provinces.open-api.vn/api/";
    var callAPI = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data, "city");
            });
    }
    callAPI('https://provinces.open-api.vn/api/?depth=1');
    var callApiDistrict = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.districts, "district");
            });
    }
    var callApiWard = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.wards, "ward");
            });
    }

    var renderData = (array, select) => {
        let row = ' <option disable value="">Chọn</option>';
        array.forEach(element => {
            row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
        });
        document.querySelector("#" + select).innerHTML = row
    }

    $("#city").change(() => {
        callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
        printResult();
    });
    $("#district").change(() => {
        callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
        printResult();
    });
    $("#ward").change(() => {
        printResult();
    })

    var printResult = () => {
        if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
            $("#ward").find(':selected').data('id') != "") {
            let result = $("#city option:selected").text() +
                " | " + $("#district option:selected").text() + " | " +
                $("#ward option:selected").text();
            $("#result").text(result)
        }

    }

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
            },
        });

        new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: `https://api.geoapify.com/v1/icon/?type=material&color=red&size=small&iconType=awesome&noWhiteCircle&scaleFactor=2&apiKey=70a97adee56547329de91aa39b2e0665`,

        });
    }

    function deleteImage(previewId) {
        const previewContainer = document.getElementById(previewId);
        while (previewContainer.firstChild) {
            previewContainer.removeChild(previewContainer.firstChild);
        }
    }

    const deleteButtons = document.querySelectorAll('.deleteImage');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const previewId = this.getAttribute('data-preview');
            deleteImage(previewId);
        });
    });


    function setupFileInput(inputId, previewId) {
        document.getElementById(inputId).addEventListener('change', function(event) {
            console.log(123);

            const previewContainer = document.getElementById(previewId);
            previewContainer.innerHTML = ''; // Clear previous previews

            const files = event.target.files;
            for (const file of files) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Preview Image';
                    img.style.maxWidth = '130px'; // Adjust size as needed
                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        });
    }
    setupFileInput('floorPlanImage', 'floorPlanPreview');
    setupFileInput('propertyImage', 'propertyPreview');


    document.querySelector('#addressDetail').addEventListener('change', function() {
        event.preventDefault();
        const citySelect = document.getElementById('city').value;
        const districtSelect = document.getElementById('district').value;
        const wardSelect = document.getElementById('ward').value;
        const addressDetail = document.querySelector('#addressDetail').value;
        const getAddress = `${addressDetail}, ${wardSelect}, ${districtSelect}, ${citySelect}`;

        console.log(getAddress);
        document.querySelector('.showAddress').innerHTML = getAddress;
        
        fetch(`https://api.geoapify.com/v1/geocode/search?text=${encodeURIComponent(getAddress)}&apiKey=70a97adee56547329de91aa39b2e0665`)
            .then(resp => resp.json())
            .then((geocodingResult) => {
                console.log(geocodingResult);
                var longitude = geocodingResult.features[0].geometry.coordinates[0]; // Kinh độ
                var latitude = geocodingResult.features[0].geometry.coordinates[1]; // Vĩ độ
                console.log("Kinh độ:", longitude);
                console.log("Vĩ độ:", latitude);
                initMap(latitude, longitude);
            });
    })