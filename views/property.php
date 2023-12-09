<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../admin/models/contract.php');
include(__DIR__ . '/../admin/models/property.php');
include(__DIR__ . '/../admin/models/tags.php');
include 'inc/header.php';
$errors = [];
$success = 'none';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $Property = new Property($database);
    $result = $Property->addProperty();
    if (is_array($result) && !empty($result)) {
        $errors = $result;
    } else if (is_string($result) && !empty($result)) {
        $success = $result;
    }
}
$database = new Database();
if (isset($_POST['submitSetStatusNegotiation'])) {
    $negotiationId = $_POST["negotiationId"];
    $newStatus = $_POST["newStatus"];
    echo $negotiationId;
    echo $newStatus;
    $Negotiation = new Transaction($database);
    $result = $Negotiation->updateStatus($negotiationId, $newStatus);
}

?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<section>
<style>
#floorPlanPreview,
#propertyPreview {
    display: flex !important;
    height: 130px !important;
}

#floorPlanPreview img,
#propertyPreview img {
    width: 130px !important;
    object-fit: cover !important;
    margin-right: 15px !important;
}

.image-upload-btn,
.image-remove-btn {
    color: black !important;
    display: flex !important;
    align-items: center !important;
    margin-left: 10px !important;
    background-color: #fafafa !important;
}

label {
    cursor: pointer !important;

}
</style>
    <div class="container">
        <div class="path-page"><a href="home">Trang chủ </a><i class="fa-solid fa-angle-right"></i>
            <p>Giao dịch</p>
        </div>
        <div class="container d-block  ">
            <div class="row ">
                <div class="col-12">
                    <ul class="nav nav-pills rounded-2 d-flex justify-content-center">
                        <li class="nav-item "><a href="#tab2-1" class="nav-link active" data-toggle='tab'>Thêm bất động
                                sản</a></li>
                        <li class="nav-item"><a href="#tab2-2" class="nav-link " data-toggle='tab'>Bất động sản</a></li>


                    </ul>
                    <div class="tab-content">
                        <!-- tab 1 -->
                        <div class="tab-pane  mt-5 fade show active" id='tab2-1'>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <?php
                        if (!empty($errors)) {
                            echo '<ul class="py-4 alert" style="background-color: #DC3545; color: white">';
                            foreach ($errors as $error) {
                                echo '<li class="pl-2">' . $error . '</li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                                        <div class="title-container flex items-center">

                                            <div class="alert alert-success h-full m-0	ml-2"
                                                style="background-color: #5cb85c; display: <?php echo $success ?>">
                                                <i class="text-white fas fa-circle-check"></i>&nbsp;<strong
                                                    class="text-white">Thêm
                                                    thành công!</strong>
                                            </div>
                                        </div>
                                        <form id="uploadForm" method="post" enctype="multipart/form-data"
                                            class="text-black">
                                            <div class="w-full flex flex-col lg:flex-row gap-4">
                                                <!-- form part of the page starts here -->
                                                <div class="w-full">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="title"
                                                                class="text-black  fw-medium p-2 capitalize">Tên
                                                                bất động sản</label>
                                                            <input type="text" id="title" name="title"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <label for="property_price"
                                                                class="text-black  fw-medium p-2 capitalize">Giá
                                                                bất động sản</label>
                                                            <input type="number" name="property_price"
                                                                id="property_price" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="property_type"
                                                                class="text-black  fw-medium p-2 capitalize">Loại
                                                                hình</label>
                                                            <select name="property_type" id="property_type"
                                                                class="form-control">
                                                                <option value="Thuê" selected>Thuê</option>
                                                                <option value="Mua">Mua</option>
                                                                <option value="Bán">Bán</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <label for="property_area"
                                                                class="text-black  fw-medium p-2 capitalize">Tổng
                                                                diện tích (m<sup>2</sup>)</label>
                                                            <input type="number" name="property_area" id="property_area"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="property_bed"
                                                                class="text-black  fw-medium p-2 capitalize">Phòng
                                                                ngủ</label>
                                                            <input type="number" name="property_bed" id="property_bed"
                                                                class="form-control">
                                                        </div>

                                                        <div class="col">
                                                            <label for="property_year"
                                                                class="text-black  fw-medium p-2 capitalize">Năm
                                                                xây dựng</label>
                                                            <input type="number" name="property_year" id="property_year"
                                                                class="form-control">
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="property_bath"
                                                                class="text-black  fw-medium p-2 capitalize">Phòng
                                                                tắm</label>
                                                            <input type="number" name="property_bath" id="property_bath"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col">

                                                            <label for="property_wifi"
                                                                class="text-black  fw-medium p-2 capitalize">WiFi</label>
                                                            <input type="number" name="property_wifi" id="property_wifi"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="property_conditioner"
                                                                class="text-black  fw-medium p-2 capitalize">Điều
                                                                hòa</label>
                                                            <input type="number" name="property_conditioner"
                                                                id="property_conditioner" class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <label for="property_tv"
                                                                class="text-black  fw-medium p-2 capitalize">TV</label>
                                                            <input type="number" name="property_tv" id="property_tv"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="property_tags"
                                                                class="text-black  fw-medium p-2 capitalize">Tags</label>
                                                            <select name="property_tags" id="property_tags"
                                                                class="form-control">
                                                                <?php
                                                $stt = 1;
                                                $database = new Database();
                                                $Tags = new Tags($database);
                                                $result = $Tags->renderTags();
                                                foreach ($result as $row) {
                                                    echo '<option value="' . $row['tag_id'] . '">' . $row['tag_name'] . '</option>';

                                                    $stt++;
                                                }
                                                ?>
                                                            </select>

                                                        </div>
                                                        <div class="col">
                                                            <label for="property_cam" class="">Cameras</label>
                                                            <input type="number" name="property_cam" id="property_cam"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="city"
                                                                class="text-black  fw-medium p-2 capitalize">Thành
                                                                phố</label>
                                                            <select id="city" name="city" class="p-2 form-select">
                                                                <option value="" selected>Chọn tỉnh thành</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <label for="district"
                                                                class="text-black  fw-medium p-2 capitalize">Quận/Huyện</label>
                                                            <select id="district" name="district"
                                                                class="p-2 form-select">
                                                                <option value="" selected>Chọn quận huyện</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <label for="ward"
                                                                class="text-black  fw-medium p-2 capitalize">Phường/Xã</label>
                                                            <select id="ward" name="wards" class="p-2 form-select">
                                                                <option value="" selected>Chọn phường xã</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="addressDetail"
                                                            class="text-black  fw-medium p-2 capitalize">Địa
                                                            chỉ chi tiết</label>
                                                        <input name="addressDetail" id="addressDetail" type="text"
                                                            placeholder="Địa chỉ chi tiết"
                                                            class="w-full form-control" />
                                                    </div>


                                                    <script
                                                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNI_ZWPqvdS6r6gPVO50I4TlYkfkZdXh8&callback=initMap"
                                                        async defer></script>

                                                    <div class="w-full flex flex-col py-2">
                                                        <label for=""
                                                            class="text-black d-flex fw-medium p-2 capitalize">Vị trí
                                                            trên
                                                            bản đồ &nbsp;
                                                            <p class="showAddress" style="color: #888; "></p>
                                                        </label>
                                                        <!-- <input type="text" id="address" class="form-control"> -->
                                                    </div>
                                                    <div id="map" style="height: 400px; width: 100%;"></div>
                                                    <script
                                                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNI_ZWPqvdS6r6gPVO50I4TlYkfkZdXh8&callback=initMap"
                                                        async defer></script>
                                                    <div class="w-full flex flex-col py-2 mt-10">
                                                        <div class="text-black pb-3 capitalize fw-medium inline-block"> <i
                                                                class="fa-solid fa-file-image fa-2xl"></i> Tải lên ảnh
                                                            sơ đồ mặt bảng
                                                        </div>
                                                        <input type="file" class="article_photo" name="floorPlanImage"
                                                            id="floorPlanImage"
                                                            class="p-2 hidden border border-[#E8F0FC] rounded"
                                                            style="display:none" accept="image/*">
                                                        <div class=" d-flex align-items-center">
                                                            <div id="floorPlanPreview">
                                                            </div>
                                                            <div class="image-upload-btn p-2 uploadImage rounded"
                                                                data-preview="floorPlanPreview" style="background-color: #fafafa; margin-left: 10px; display:flex; align-items:center;">
                                                                <label for="floorPlanImage"
                                                                    style="display:flex; align-items:center; margin-bottom: 0px; ">
                                                                    <i class="fa-solid fa-upload me-2"></i>
                                                                    <p class="m-0">Tải lên</p>
                                                                </label>
                                                            </div>
                                                            <div class="image-remove-btn deleteImage p-2 rounded"
                                                                data-preview="floorPlanPreview" style="display:flex; align-items:center; background-color: #fafafa; margin-left: 10px;">
                                                                <i class="fa-solid fa-trash-can  me-2"></i>
                                                                <p class="m-0">Xóa ảnh</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex flex-col py-2 mt-10">
                                                        <div class="text-black pb-3 capitalize fw-medium inline-block"> <i
                                                                class="fa-solid fa-file-image fa-2xl"></i> Tải lên ảnh
                                                            bất động sản
                                                        </div>
                                                        <input type="file" class="article_photo" name="propertyImage[]"
                                                            id="propertyImage"
                                                            class="p-2  hidden border border-[#E8F0FC] rounded"
                                                            style="display:none" multiple accept="image/*">
                                                        <div class=" d-flex align-items-center">
                                                            <div id="propertyPreview"></div>
                                                            <div class="image-upload-btn uploadImage p-2 rounded"
                                                                data-preview="propertyPreview" style="background-color: #fafafa; margin-left: 10px;">
                                                                <label for="propertyImage"
                                                                    style="display:flex; align-items:center; margin-bottom: 0px;">
                                                                    <i class="fa-solid fa-upload me-2"></i>
                                                                    <p class="m-0">Tải lên</p>
                                                                </label>
                                                            </div>
                                                            <div class="image-remove-btn deleteImage p-2 rounded"
                                                                data-preview="propertyPreview" style="display:flex; align-items:center; background-color:#fafafa; margin-left: 10px;">
                                                                <i class="fa-solid fa-trash-can  me-2"></i>
                                                                <p class="m-0">Xóa ảnh</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col md:flex-row gap-4">
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="description"
                                                                class="text-black  fw-medium p-2 capitalize">Mô
                                                                tả</label>
                                                            <textarea name="description" id="description" rows="4"
                                                                class="form-control"></textarea>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                            <div class="d-flex flex-row-reverse ">
                                                <div class="w-fit flex flex-row align-items-center gap-4 my-4 text-xs">
                                                    <input type="submit" class="btn btn-primary"
                                                        value="Thêm Bất Động Sản">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end tab 1 -->
                        <!-- tab 2 -->
                        <div class="tab-pane  mt-5 fade show " id='tab2-2'>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <table id="example1" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên</th>
                                                    <th>Giá</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Trạng thái</th>
                                                    <th>Lượt xem</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <style>

                                                </style>
                                                <?php
                                                $stt = 1;
                                                $database = new Database();
                                                $Property = new Transaction($database);
                                                if(isset($_SESSION['user_info'])){
                                                    $id = $_SESSION['user_info']['user_id'];
                                                } else {
                                                    $id = 0;
                                                }
                                                $result = $Property->renderPropertyById($id);
                                                foreach ($result as $row) {
                                                    echo '<tr>
                                <td>' . $stt . '</td>
                                <td><a href="propertyDetail?id=' . $row['property_id'] . '"> ' . $row['title'] . '</a></td>
                                <td>' . $row['price'] . '$</td>
                                <td>' . $row['location'] . '</td>
                                <td><span  style="color: black; text-transform: none;color: white;display:inline-block; border-radius: 0.375rem; padding: 5px; background-color: ' . ($row['status'] === 'Đã duyệt' ? '#e67e22' : '#d35400;') . '">
                                    ' . $row['status'] . '
                                </span></td>
                                <td>' . $row['views'] . '</td>
                                <td>
                                    <i class="fa-solid fs-5 fa-eye overlay mr-2 " style="color: blue;" data-toggle="modal" data-target="#propertyModal' . $row['property_id'] . '"></i>
                                    <a href="admin/deleteProperty?property_id=' . $row['property_id'] . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa bất động sản này không?\')">
                                        <i class="fa-solid fs-5 fa-trash-can text-danger"></i>
                                    </a>
                                </td>
                            </tr>';
                                                    echo '<div class="modal text-black fade" id="propertyModal' . $row['property_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">' . $row['title'] . '</h5>
                                                    <button type="button" class="btn-close border border-black" style="border:1px solid black !important" data-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                                </div>
                                                <div class="modal-body row">
                                                <div class="col-6">Giá: ' . $row['price'] . ' $</div>
                                                <div class="col-6">Địa chỉ: ' . $row['location'] . '</div>
                                                <div class="col-6">Loại: ' . $row['type'] . '</div>
                                                <div class="col-6">Tình trạng: ' . $row['status'] . '</div>
                                                <div class="col-6">Phòng ngủ: ' . $row['beds'] . '</div>
                                                <div class="col-6">Phòng tắm: ' . $row['baths'] . '</div>
                                                <div class="col-6">Diện tích: ' . $row['acreage'] . ' m²</div>
                                                <div class="col-6">Số phòng TV: ' . $row['tivis'] . '</div>
                                                <div class="col-6">Số camera: ' . $row['cameras'] . '</div>
                                                <div class="col-6">Nội thất: ' . $row['built_in'] . '</div>
                                                <div class="col-6">Điều hòa: ' . $row['conditioner'] . '</div>
                                                <div class="col-6">Wifi: ' . $row['wifi'] . '</div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn" style="border:1px solid !important" data-dismiss="modal" aria-label="Close">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                                    $stt++;
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                        <script>
                                        var table = new DataTable('#example1');
                                        </script>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-3'>
                            <span>Đang cập nhật</span>
                        </div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-3'><span>Đang cập nhật</span></div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-4'><span>Đang cập nhật</span></div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-5'><span>Đang cập nhật</span></div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-6'><span>Đang cập nhật</span></div>

                    </div>

                </div>
            </div>
        </div>
        </head>

        <body>
            <style>
            table.dataTable thead>tr>th.sorting:nth-child(2) {
                max-width: 200px !important;
            }
            </style>
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
            <script src="./assets/js/dashboard/upload-property.js"></script>
    </div>
</section>
<?php include 'inc/footer.php' ?>