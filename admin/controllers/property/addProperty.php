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
                                        <div class="lg:w-3/5">
                                            <div class="w-full">
                                                <div class="flex flex-col md:flex-row gap-4">
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="title"
                                                            class="text-black  font-semibold pb-1 capitalize">Tên
                                                            bất động sản</label>
                                                        <input type="text" id="title"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="property_price"
                                                            class="text-black  font-semibold pb-1 capitalize">Giá
                                                            bất động sản</label>
                                                        <input type="text" id="property_price"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>
                                                </div>

                                                <div class="flex flex-col md:flex-row gap-4">
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="booking_amount"
                                                            class="text-black  font-semibold pb-1 capitalize">Loại
                                                            hình</label>
                                                        <select name="booking_amount" id="booking_amount"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                            <option value="">---</option>
                                                            <option value="Thuê">Thuê</option>
                                                            <option value="Mua">Mua</option>
                                                            <option value="Bán">Bán</option>
                                                        </select>
                                                    </div>
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="property_area"
                                                            class="text-black  font-semibold pb-1 capitalize">Tổng
                                                            diện tích (m<sup>2</sup>)</label>
                                                        <input type="text" id="property_area"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>
                                                </div>

                                                <!-- <div class="flex flex-col md:flex-row gap-4">
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="description" class="text-black  font-semibold pb-1 capitalize">Mô tả</label>
                                                        <textarea name="" id="description" rows="4" class="p-2  border border-[#E8F0FC] rounded"></textarea>
                                                    </div>
                                                </div> -->

                                                <!-- property type -->
                                                <div class="flex flex-col md:flex-row gap-4">
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="property_type"
                                                            class="text-black  font-semibold pb-1 capitalize">Vị
                                                            trí</label>
                                                        <input type="text" id="property_type"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="property_address"
                                                            class="text-black  font-semibold pb-1 capitalize">Năm
                                                            xây dựng</label>
                                                        <input type="text" id="property_address"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>

                                                </div>

                                                <!-- property address -->
                                                <div class="flex flex-col md:flex-row gap-4">
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="property_address"
                                                            class="text-black  font-semibold pb-1 capitalize">Phòng
                                                            tắm</label>
                                                        <input type="number" id="property_address"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="property_address"
                                                            class="text-black  font-semibold pb-1 capitalize">Phòng
                                                            ngủ</label>
                                                        <input type="number" id="property_address"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>
                                                </div>
                                                <div class="flex flex-col md:flex-row gap-4">
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="property_address"
                                                            class="text-black  font-semibold pb-1 capitalize">Điều
                                                            hòa</label>
                                                        <input type="number" id="property_address"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="property_address"
                                                            class="text-black  font-semibold pb-1 capitalize">TV</label>
                                                        <input type="number" id="property_address"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>
                                                </div>
                                                <div class="flex flex-col md:flex-row gap-4">
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="property_address"
                                                            class="text-black  font-semibold pb-1 capitalize">WiFi</label>
                                                        <input type="number" id="property_address"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="property_address"
                                                            class="text-black  font-semibold pb-1 capitalize">Cameras</label>
                                                        <input type="number" id="property_address"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>
                                                </div>
                                                <div class="flex flex-col md:flex-row gap-4">
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="property_address"
                                                            class="text-black  font-semibold pb-1 capitalize">Sơ đồ mặt bằng</label>
                                                        <input type="file" id="property_address"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="property_address"
                                                            class="text-black  font-semibold pb-1 capitalize">Tags</label>
                                                        <input type="number" id="property_address"
                                                            class="p-2  border border-[#E8F0FC] rounded">
                                                    </div>
                                                </div>
                                               

                                                <!-- <div class="flex flex-col md:flex-row gap-4">
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="bedroom" class="text-black  font-semibold pb-1 capitalize">Phòng ngủ</label>
                                                        <div id="bedroom" class="flex flex-row items-center gap-4 text-xs">
                                                            <button class="outline-none shadow rounded text-[#111827] py-2 px-4 focus:border border-[#0957CB]">1</button>
                                                            <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">2</button>
                                                            <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">3</button>
                                                            <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">4</button>
                                                            <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">5+</button>
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="bathroom" class="text-black  font-semibold pb-1 capitalize">Phòng tắm</label>
                                                        <div id="bathroom" class="flex flex-row items-center gap-4 text-xs">
                                                            <button class="outline-none shadow rounded text-[#111827] py-2 px-4 focus:border border-[#0957CB]">1</button>
                                                            <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">2</button>
                                                            <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">3</button>
                                                            <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">4</button>
                                                            <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">5+</button>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="flex flex-col md:flex-row gap-4">
                                                    <div class="w-full flex flex-col py-2">
                                                        <label for="description"
                                                            class="text-black  font-semibold pb-1 capitalize">Mô
                                                            tả</label>
                                                        <textarea name="" id="description" rows="4"
                                                            class="p-2  border border-[#E8F0FC] rounded"></textarea>
                                                    </div>
                                                </div>
                                                <!-- features and amenities -->

                                            </div>

                                        </div>
                                        <!-- form part of the page ends here -->
                                        <!-- map & file part of the page starts here -->
                                        <div class="lg:w-2/5 flex justify-center">
                                            <div class="w-11/13">
                                                <div
                                                    class="my-6 bg-[#EAF0F8] rounded-md w-full h-56 flex justify-center items-center">
                                                    <div id="dragger" class="w-11/12 rounded-md h-52 my-4">
                                                        <div
                                                            class="w-full h-full flex justify-center items-center text-xs font-semibold rounded">
                                                            <div class="">
                                                                <div class="px-8">
                                                                    <object data="" type=""
                                                                        width="20px"></object>
                                                                </div>
                                                                <p id="dragger_text" class="py-2 px-4">Image</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- drag and drop files input starts here -->
                                                <div
                                                    class="my-6 bg-[#EAF0F8] rounded-md w-full h-56 flex justify-center items-center">
                                                    <div id="dragger" class="w-11/12 rounded-md h-52 my-4">
                                                        <div
                                                            class="w-full h-full flex justify-center items-center text-xs font-semibold rounded">
                                                            <div class="">
                                                                <div class="px-8">
                                                                    <object data="" type=""
                                                                        width="20px"></object>
                                                                </div>
                                                                <p id="dragger_text" class="py-2 px-4">Image</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ends here -->
                                                <!-- map section begins here-->
                                                <div class="w-full my-8 h-56 rounded">
                                                    <iframe
                                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1009058.2639950551!2d6.691469669291524!3d8.913590745836654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e6157ce3eeda9%3A0x32af1c368be32dfc!2sFederal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1653069476266!5m2!1sen!2sng"
                                                        width="100%" height="100%"
                                                        style="border:0; border-radius: 10px;" allowfullscreen=""
                                                        loading="lazy"
                                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                </div>
                                                <!-- map section ends -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- reset and upload actions -->
                                    <div class="w-full flex justify-end">
                                        <div class="w-fit flex flex-row items-center gap-4 my-4 text-xs">
                                            <button
                                                class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold">Thêm
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