* Main

Nếu bạn muốn push từ một nhánh khác vào nhánh main, bạn có thể thực hiện theo các bước sau:

Chuyển sang nhánh main:

git checkout main
Lấy các thay đổi mới nhất từ nhánh main trên máy chủ:

git pull origin main
Chuyển lại sang nhánh bạn muốn push từ:

git checkout <tên-nhánh-khác>
Rebase nhánh hiện tại của bạn trên nhánh main:

git rebase main
Điều này sẽ đặt commit của bạn lên trên cùng của lịch sử commit của nhánh main.

Chuyển lại nhánh main:

git checkout main
Merge nhánh hiện tại của bạn vào nhánh main:

git merge <tên-nhánh-khác>
Hoặc nếu bạn đã rebase:

git merge --ff-only <tên-nhánh-khác>
Push các thay đổi lên nhánh main:

git push origin main

<!-- Begin Page Content -->

                <div class="w-full">
                    <div class="flex justify-center xl:w-11/13">
                        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
                            <div class="w-full bg-white rounded-lg min-h-screen">
                                <div class="w-full flex justify-center h-auto">
                                    <div class="w-11/12">
                                        <p class="text-[#0957CB] font-semibold text-md py-4">Upload Listing</p>
                                        <div class="w-full flex flex-col lg:flex-row gap-4">
                                            <!-- form part of the page starts here -->
                                            <div class="lg:w-3/5">
                                                <div class="w-full">
                                                    <div class="flex flex-col md:flex-row gap-4">
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="title" class="text-black text-[10px] font-semibold pb-1 capitalize">Tên bất động sản</label>
                                                            <input type="text" id="title" class="p-2 text-[10px] border border-[#E8F0FC] rounded">
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="property_price" class="text-black text-[10px] font-semibold pb-1 capitalize">Giá bất động sản</label>
                                                            <input type="text" id="property_price" class="p-2 text-[10px] border border-[#E8F0FC] rounded">
                                                        </div>
                                                    </div>

                                                    <div class="flex flex-col md:flex-row gap-4">
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="booking_amount" class="text-black text-[10px] font-semibold pb-1 capitalize">Loại hình</label>
                                                            <select name="booking_amount" id="booking_amount" class="p-2 text-[10px] border border-[#E8F0FC] rounded">
                                                                <option value="">---</option>
                                                                <option value="Thuê">Thuê</option>
                                                                <option value="Mua">Mua</option>
                                                                <option value="Bán">Bán</option>
                                                              </select>
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="property_area" class="text-black text-[10px] font-semibold pb-1 capitalize">Tổng diện tích (m<sup>2</sup>)</label>
                                                            <input type="text" id="property_area" class="p-2 text-[10px] border border-[#E8F0FC] rounded">
                                                        </div>
                                                    </div>

                                                    <div class="flex flex-col md:flex-row gap-4">
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="description" class="text-black text-[10px] font-semibold pb-1 capitalize">Mô tả</label>
                                                            <textarea name="" id="description" rows="4" class="p-2 text-[10px] border border-[#E8F0FC] rounded"></textarea>
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="overview" class="text-black text-[10px] font-semibold pb-1 capitalize">overview</label>
                                                            <textarea name="" id="overview" rows="4" class="p-2 text-[10px] border border-[#E8F0FC] rounded"></textarea>
                                                        </div>
                                                    </div>

                                                    <!-- property type -->
                                                    <div class="flex flex-col md:flex-row gap-4">
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="property_type" class="text-black text-[10px] font-semibold pb-1 capitalize">Vị trí</label>
                                                            <input type="text" id="property_type" class="p-2 text-[10px] border border-[#E8F0FC] rounded">
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="bedroom" class="text-black text-[10px] font-semibold pb-1 capitalize">Bedroom</label>
                                                            <div id="bedroom" class="flex flex-row items-center gap-4 text-xs">
                                                                <button class="outline-none shadow rounded text-[#111827] py-2 px-4 focus:border border-[#0957CB]">1</button>
                                                                <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">2</button>
                                                                <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">3</button>
                                                                <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">4</button>
                                                                <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">5+</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- property address -->
                                                    <div class="flex flex-col md:flex-row gap-4">
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="property_address" class="text-black text-[10px] font-semibold pb-1 capitalize">property address</label>
                                                            <input type="text" id="property_address" class="p-2 text-[10px] border border-[#E8F0FC] rounded">
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="bathroom" class="text-black text-[10px] font-semibold pb-1 capitalize">Bathroom</label>
                                                            <div id="bathroom" class="flex flex-row items-center gap-4 text-xs">
                                                                <button class="outline-none shadow rounded text-[#111827] py-2 px-4 focus:border border-[#0957CB]">1</button>
                                                                <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">2</button>
                                                                <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">3</button>
                                                                <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">4</button>
                                                                <button class="outline-none shadow rounded-md text-[#111827] py-2 px-4 focus:border border-[#0957CB]">5+</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- features and amenities -->
                                                    <div class="flex flex-col md:flex-row gap-4">
                                                        <div class="w-full flex flex-col py-2">
                                                            <div class="w-full flex flex-col py-2">
                                                                <label for="features" class="text-black text-[10px] font-semibold pb-1 capitalize">features and amenities</label>
                                                                <input type="text" id="features" class="p-2 text-[10px] border border-[#E8F0FC] rounded">
                                                            </div>
                                                            <!-- location nearby -->
                                                            <div class="w-full flex flex-col py-4">
                                                                <label for="location" class="text-black text-[10px] font-semibold pb-1 capitalize">Location Nearby</label>
                                                                <input type="text" id="location" class="p-2 text-[10px] border border-[#E8F0FC] rounded">
                                                            </div>
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="avalability" class="text-black text-[10px] font-semibold pb-1 capitalize">Availability</label>
                                                            <div id="avalability flex flex-col capitalize">
                                                                <div class="py-1 flex justify-between items-center text-[11px] text-[#7D7D7D]">
                                                                    <p>Ready to move</p>
                                                                    <input
                                                                    type="radio"
                                                                    name="radio"
                                                                    value="Ready to move"
                                                                    class="text-[10px] border border-[#E8F0FC] rounded">
                                                                </div>
                                                                <div class="py-1 flex justify-between items-center text-[11px] text-[#7D7D7D]">
                                                                    <p>within 6 months+</p>
                                                                    <input
                                                                    type="radio"
                                                                    name="radio"
                                                                    value="within 6 months+"
                                                                    class="text-[10px] border border-[#E8F0FC] rounded">
                                                                </div>
                                                                <div class="py-1 flex justify-between items-center text-[11px] text-[#7D7D7D]">
                                                                    <p>within 1 year</p>
                                                                    <input
                                                                    type="radio"
                                                                    name="radio"
                                                                    value="within 1 year"
                                                                    class="text-[10px] border border-[#E8F0FC] rounded"
                                                                    >
                                                                </div>
                                                                <div class="py-1 flex justify-between items-center text-[11px] text-[#7D7D7D]">
                                                                    <p>more than 1 year</p>
                                                                    <input
                                                                    type="radio"
                                                                    name="radio"
                                                                    value="more than 1 year"
                                                                    class="text-[10px] border border-[#E8F0FC] rounded">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- form part of the page ends here -->
                                            <!-- map & file part of the page starts here -->
                                            <div class="lg:w-2/5 flex justify-center">
                                                <div class="w-11/13">
                                                    <div class="my-6 bg-[#EAF0F8] rounded-md w-full h-56 flex justify-center items-center">
                                                        <div id="dragger" class="w-11/12 rounded-md h-52 my-4">
                                                            <div class="w-full h-full flex justify-center items-center text-xs font-semibold rounded">
                                                                <div class="">
                                                                    <div class="px-8">
                                                                        <object data="../images/image.svg" type="" width="20px"></object>
                                                                    </div>
                                                                    <p id="dragger_text" class="py-2 px-4">Image</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- drag and drop files input starts here -->
                                                    <div class="my-6 bg-[#EAF0F8] rounded-md w-full h-56 flex justify-center items-center">
                                                        <div id="dragger" class="w-11/12 rounded-md h-52 my-4">
                                                            <div class="w-full h-full flex justify-center items-center text-xs font-semibold rounded">
                                                                <div class="">
                                                                    <div class="px-8">
                                                                        <object data="../images/image.svg" type="" width="20px"></object>
                                                                    </div>
                                                                    <p id="dragger_text" class="py-2 px-4">Image</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ends here -->
                                                    <!-- map section begins here-->
                                                    <div class="w-full my-8 h-56 rounded">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1009058.2639950551!2d6.691469669291524!3d8.913590745836654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e6157ce3eeda9%3A0x32af1c368be32dfc!2sFederal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1653069476266!5m2!1sen!2sng"
                                                        width="100%" height="100%" style="border:0; border-radius: 10px;" allowfullscreen=""
                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                    </div>
                                                    <!-- map section ends -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- reset and upload actions -->
                                        <div class="w-full flex justify-end">
                                            <div class="w-fit flex flex-row items-center gap-4 my-4 text-xs">
                                                <button class="bg-white text-[#0957CB] hover:bg-[#0957CB] hover:text-white rounded-lg p-2 font-semibold">Reset</button>
                                                <button class="hover:bg-white hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-2">Upload Listing</button>
                                            </div>
                                        </div>
                                        <!-- end of reset and upload actions -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

          