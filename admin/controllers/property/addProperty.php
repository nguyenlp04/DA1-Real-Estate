<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');

?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="w-full">
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">
                        <h1 class="text-[#0957CB] font-semibold text-md py-4 h3">Thêm Bất Động Sản</h1>
                        <div class="w-full flex flex-col lg:flex-row gap-4">
                            <!-- form part of the page starts here -->
                                <div class="w-full">
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="title" class="text-black  font-semibold pb-1 capitalize">Tên
                                                bất động sản</label>
                                            <input type="text" id="title" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_price" class="text-black  font-semibold pb-1 capitalize">Giá
                                                bất động sản</label>
                                            <input type="text" id="property_price" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="booking_amount" class="text-black  font-semibold pb-1 capitalize">Loại
                                                hình</label>
                                            <select name="booking_amount" id="booking_amount" class="p-2  border border-[#E8F0FC] rounded">
                                                <option value="">---</option>
                                                <option value="Thuê">Thuê</option>
                                                <option value="Mua">Mua</option>
                                                <option value="Bán">Bán</option>
                                            </select>
                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_area" class="text-black  font-semibold pb-1 capitalize">Tổng
                                                diện tích (m<sup>2</sup>)</label>
                                            <input type="text" id="property_area" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_type" class="text-black  font-semibold pb-1 capitalize">Vị
                                                trí</label>
                                            <input type="text" id="property_type" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_address" class="text-black  font-semibold pb-1 capitalize">Năm
                                                xây dựng</label>
                                            <input type="text" id="property_address" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>

                                    </div>

                                    <!-- property address -->
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_address" class="text-black  font-semibold pb-1 capitalize">Phòng
                                                tắm</label>
                                            <input type="number" id="property_address" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_address" class="text-black  font-semibold pb-1 capitalize">Phòng
                                                ngủ</label>
                                            <input type="number" id="property_address" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_address" class="text-black  font-semibold pb-1 capitalize">Điều
                                                hòa</label>
                                            <input type="number" id="property_address" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_address" class="text-black  font-semibold pb-1 capitalize">TV</label>
                                            <input type="number" id="property_address" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_address" class="text-black  font-semibold pb-1 capitalize">WiFi</label>
                                            <input type="number" id="property_address" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_address" class="text-black  font-semibold pb-1 capitalize">Cameras</label>
                                            <input type="number" id="property_address" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2 mt-10">
                                            <label for="avatar" class="text-black   font-semibold pb-1 capitalize"> <i class="fa-solid fa-file-image fa-2xl"></i> Tải lên ảnh sơ đồ mặt bảng </label>
                                            <input type="file" class="article_photo" name="avatar" id="avatar" class="p-2  hidden border border-[#E8F0FC] rounded" style="display:none">
                                        </div>
                                        <div class="w-full flex flex-col py-2">
                                            <label for="property_address" class="text-black  font-semibold pb-1 capitalize">Tags</label>
                                            <input type="number" id="property_address" class="p-2  border border-[#E8F0FC] rounded">
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <div class="w-full flex flex-col py-2">
                                            <label for="description" class="text-black  font-semibold pb-1 capitalize">Mô
                                                tả</label>
                                            <textarea name="" id="description" rows="4" class="p-2  border border-[#E8F0FC] rounded"></textarea>
                                        </div>
                                    </div>
                                    <!-- features and amenities -->


                            </div>
                            <!-- form part of the page ends here -->
                            <!-- map & file part of the page starts here -->
                            
                        </div>
                        <!-- reset and upload actions -->
                        <div class="w-full flex justify-end">
                            <div class="w-fit flex flex-row items-center gap-4 my-4 text-xs">
                                <button class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold">Thêm
                                    Bất Động Sản</button>
                            </div>
                        </div>
                        <!-- end of reset and upload actions -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include(__DIR__ . '/../../inc/footerDashboard.php');
?>