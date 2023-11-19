<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../../config/config.php');
include(__DIR__ . '/../../models/property.php');
include(__DIR__ . '/../../models/tags.php');
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

?>
<!-- End of Topbar -->
<style>
    #floorPlanPreview,
    #propertyPreview {
        display: flex;
        height: 130px;
    }

    #floorPlanPreview img,
    #propertyPreview img {
        width: 130px;
        object-fit: cover;
        margin-right: 15px;
    }

    .image-upload-btn,
    .image-remove-btn {
        color: black;
        display: flex;
        align-items: center;
        margin-left: 10px;
        background-color: #fafafa;
    }

    label {
        cursor: pointer;

    }
</style>
<!-- Begin Page Content -->
<div class="w-full">
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">
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
                            <h1 class="text-[#0957CB] font-semibold text-md py-4 h3">Thêm Bất Động Sản</h1>
                            <div class="alert alert-success h-full m-0	ml-2" style="background-color: #5cb85c; display: <?php echo $success ?>">
                                <i class="text-white fas fa-circle-check"></i>&nbsp;<strong class="text-white">Thêm thành công!</strong>
                            </div>
                        </div>
                        <form id="uploadForm" method="post" enctype="multipart/form-data" class="text-black">
                            <div class="w-full flex flex-col lg:flex-row gap-4">
                                <!-- form part of the page starts here -->
                                <div class="w-full">
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="title" class="text-black  font-semibold pb-1 capitalize">Tên
                                                bất động sản</label>
                                            <input type="text" id="title" name="title" class="p-2 border border-[#E8F0FC] rounded">
                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_price" class="text-black  font-semibold pb-1 capitalize">Giá
                                                bất động sản</label>
                                            <input type="number" name="property_price" id="property_price" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                    </div>

                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_type" class="text-black  font-semibold pb-1 capitalize">Loại
                                                hình</label>
                                            <select name="property_type" id="property_type" class="p-2  border border-[#E8F0FC] rounded">
                                                <option value="Thuê" selected>Thuê</option>
                                                <option value="Mua">Mua</option>
                                                <option value="Bán">Bán</option>
                                            </select>
                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_area" class="text-black  font-semibold pb-1 capitalize">Tổng
                                                diện tích (m<sup>2</sup>)</label>
                                            <input type="number" name="property_area" id="property_area" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_bed" class="text-black  font-semibold pb-1 capitalize">Phòng
                                                ngủ</label>
                                            <input type="number" name="property_bed" id="property_bed" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>

                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_year" class="text-black  font-semibold pb-1 capitalize">Năm
                                                xây dựng</label>
                                            <input type="number" name="property_year" id="property_year" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>

                                    </div>
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_bath" class="text-black  font-semibold pb-1 capitalize">Phòng
                                                tắm</label>
                                            <input type="number" name="property_bath" id="property_bath" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                        <div class="w-full flex flex-col py-2">

                                            <label for="property_wifi" class="text-black  font-semibold pb-1 capitalize">WiFi</label>
                                            <input type="number" name="property_wifi" id="property_wifi" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_conditioner" class="text-black  font-semibold pb-1 capitalize">Điều
                                                hòa</label>
                                            <input type="number" name="property_conditioner" id="property_conditioner" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_tv" class="text-black  font-semibold pb-1 capitalize">TV</label>
                                            <input type="number" name="property_tv" id="property_tv" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_tags" class="text-black  font-semibold pb-1 capitalize">Tags</label>
                                            <select name="property_tags" id="property_tags" class="p-2 border border-[#E8F0FC] rounded">
                                                <?php
                                                $stt = 1;
                                                $database = new Database();
                                                $Tags = new Tags($database);
                                                $result = $Tags->renderTags();
                                                foreach ($result as $row) {
                                                    echo '<option value="' . $row['tag_name'] . '">' . $row['tag_name'] . '</option>';

                                                    $stt++;
                                                }
                                                ?>



                                            </select>

                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_cam" class="text-black  font-semibold pb-1 capitalize">Cameras</label>
                                            <input type="number" name="property_cam" id="property_cam" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                    </div>

                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="city" class="text-black  font-semibold pb-1 capitalize">Thành phố</label>
                                            <select id="city" name="city" class="p-2 form-select">
                                                <option value="" selected>Chọn tỉnh thành</option>
                                            </select>
                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="district" class="text-black  font-semibold pb-1 capitalize">Quận/Huyện</label>
                                            <select id="district" name="district" class="p-2 form-select">
                                                <option value="" selected>Chọn quận huyện</option>
                                            </select>
                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="ward" class="text-black  font-semibold pb-1 capitalize">Phường/Xã</label>
                                            <select id="ward" name="wards" class="p-2 form-select">
                                                <option value="" selected>Chọn phường xã</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full flex flex-col py-2">
                                        <label for="addressDetail" class="text-black  font-semibold pb-1 capitalize">Địa chỉ chi tiết</label>
                                        <input name="addressDetail" id="addressDetail" type="text" placeholder="Địa chỉ chi tiết" class="w-full p-2  border border-[#E8F0FC] rounded" />
                                    </div>


                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNI_ZWPqvdS6r6gPVO50I4TlYkfkZdXh8&callback=initMap" async defer></script>

                                    <div class="w-full flex flex-col py-2">
                                        <label for="" class="text-black flex font-semibold pb-1 capitalize">Vị trí trên bản đồ &nbsp;
                                            <p class="showAddress" style="color: #888; "></p>
                                        </label>
                                        <!-- <input type="text" id="address" class="p-2  border border-[#E8F0FC] rounded"> -->
                                    </div>
                                    <div id="map" style="height: 400px; width: 100%;"></div>
                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNI_ZWPqvdS6r6gPVO50I4TlYkfkZdXh8&callback=initMap" async defer></script>
                                    <div class="w-full flex flex-col py-2 mt-10">
                                        <div class="text-black pb-3 capitalize inline-block"> <i class="fa-solid fa-file-image fa-2xl"></i> Tải lên ảnh sơ đồ mặt bảng </div>
                                        <input type="file" class="article_photo" name="floorPlanImage" id="floorPlanImage" class="p-2 hidden border border-[#E8F0FC] rounded" style="display:none" accept="image/*">
                                        <div class=" flex items-center">
                                            <div id="floorPlanPreview">
                                            </div>
                                            <div class="image-upload-btn p-2 uploadImage rounded" data-preview="floorPlanPreview">
                                                <label for="floorPlanImage" style="display:flex; align-items:center; margin-bottom: 0px; ">
                                                    <i class="fa-solid fa-upload"></i>
                                                    <p>Tải lên</p>
                                                </label>
                                            </div>
                                            <div class="image-remove-btn deleteImage p-2 rounded" data-preview="floorPlanPreview">
                                                <i class="fa-solid fa-trash-can mr-2"></i>
                                                <p>Xóa ảnh</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full flex flex-col py-2 mt-10">
                                        <div class="text-black pb-3 capitalize inline-block"> <i class="fa-solid fa-file-image fa-2xl"></i> Tải lên ảnh bất động sản </div>
                                        <input type="file" class="article_photo" name="propertyImage[]" id="propertyImage" class="p-2  hidden border border-[#E8F0FC] rounded" style="display:none" multiple accept="image/*">
                                        <div class=" flex items-center">
                                            <div id="propertyPreview"></div>
                                            <div class="image-upload-btn uploadImage p-2 rounded" data-preview="propertyPreview">
                                                <label for="propertyImage" style="display:flex; align-items:center; margin-bottom: 0px; ">
                                                    <i class="fa-solid fa-upload"></i>
                                                    <p>Tải lên</p>
                                                </label>
                                            </div>
                                            <div class="image-remove-btn deleteImage p-2 rounded" data-preview="propertyPreview">
                                                <i class="fa-solid fa-trash-can mr-2"></i>
                                                <p>Xóa ảnh</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="description" class="text-black  font-semibold pb-1 capitalize">Mô
                                                tả</label>
                                            <textarea name="description" id="description" rows="4" class="p-2  border border-[#E8F0FC] rounded"></textarea>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="w-full flex justify-end">
                                <div class="w-fit flex flex-row items-center gap-4 my-4 text-xs">
                                    <input type="submit" class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold" value="Thêm Bất Động Sản">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- API Select Address -->


<?php
include(__DIR__ . '/../../inc/footerDashboard.php');
?>