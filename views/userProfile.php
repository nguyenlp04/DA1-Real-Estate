<?php include "inc/header.php";?>
<script src="https://cdn.tailwindcss.com"></script>
<section style="background-color: #eee" class="grid md:grid-cols-3 gap-4 pt-60 md:px-52">
    <div class="md:col-span-1 col-span-3   bg-white rounded-2xl">
        <img src="https://www.ldg.com.vn/media/uploads/uploads/01223448-anh-con-gai-xinh.jpg" alt=""
            class="rounded-full mx-auto w-40 mt-16" />
        <dt class="text-2xl font-medium text-gray-500 mt-10 text-center">User</dt>
        <h1 class="text-3xl leading-6 font-medium text-gray-900 pt-2 text-center">Nguyễn Quang Cường</h1>
        <div class="mt-4 w-50 mx-48">

            <ul class="list-disc">
                <li class="pl-6"><button type="button" class="section-button" data-section="changePassword"><i
                            class="fa-solid fa-key"></i> Đổi Mật Khẩu </button>
                </li>
                <li class="pl-6"><button type="button" class="section-button" data-section="info"> <i
                            class="fa-solid fa-user"></i>
                        Trang Thông Tin </button></li>
                <li class="pl-6"><button type="button" class="section-button"> <i
                            class="fa-solid fa-right-from-bracket"></i> Đăng
                        xuất</button></li>


            </ul>

        </div>
    </div>
    <div class="md:col-span-2 col-span-3 bg-white rounded-2xl ">
        <div id="info" class="section" style="display:none;">
            <div class="px-4 py-4 sm:px-6 ">
                <h3 class="text-3xl leading-6 font-medium text-gray-900 pt-2">
                    Thông tin người dùng
                </h3>
            </div>
            <div class="border-t border-gray-200 px-4">
                <dl>
                    <div class="border-b px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-2xl font-medium text-gray-900">Tên đầy đủ</dt>
                        <dd class="mt-1 text-2xl  text-gray-500 sm:mt-0 sm:col-span-2">
                            Nguyễn Quang Cường
                        </dd>
                    </div>
                    <div class="border-b px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-2xl font-medium text-gray-900">User Name</dt>
                        <dd class="mt-1 text-2xl text-gray-500 sm:mt-0 sm:col-span-2">
                            Cuong1412
                        </dd>
                    </div>
                    <div class="border-b px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-2xl font-medium text-gray-900">Số Điện Thoại</dt>
                        <dd class="mt-1 text-2xl text-gray-500  sm:mt-0 sm:col-span-2">
                            0773311371
                        </dd>
                    </div>
                    <div class=" px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-2xl font-medium text-gray-900">Email</dt>
                        <dd class="mt-1 text-2xl text-gray-500 sm:mt-0 sm:col-span-2">
                            nhungbae200@gmail.comm
                        </dd>
                    </div>

            </div>
            </dl>
            <div class="w-full flex justify-end p-4">
                <button type="button" class="section-button bg-blue-700 rounded-lg   text-white p-3"
                    data-section="editInfo">Chỉnh sửa</button>
            </div>

        </div>
        <div id="changePassword" class="section" style="display:none;">
            <div class="px-4 py-4 sm:px-6">
                <h3 class="text-3xl leading-6 font-medium text-gray-900 pt-2  ">
                    Đổi mật khẩu
                </h3>
            </div>
            <!-- <h2>Đổi Mật Khẩu</h2> -->
            <form action="post" class="p-5 border-t border-gray-200 px-4">
                <div class=" flex flex-col py-2 ">
                    <label for="title" class="text-black  font-semibold pb-1 capitalize"> Mật Khẩu Hiện Tại </label>
                    <input type="text" id="title" class="p-2  border border-[#a5abb5] rounded" name="title">
                </div>
                <div class=" flex flex-col py-2 ">
                    <label for="title" class="text-black  font-semibold pb-1 capitalize"> Mật Khẩu Mới </label>
                    <input type="text" id="title" class="p-2  border border-[#a5abb5] rounded" name="title">
                </div>
                <div class="w-full  justify-end pt-4">
                    <input type="submit" class="btn btn-primary btn-signup-form rounded-sm  bg-blue-700"
                        value="Đổi mật khẩu">
                </div>
            </form>
        </div>
        <div id="editInfo" class="section" style="display:none;">
            <div class="px-4 py-4 sm:px-6 ">
                <h3 class="text-3xl leading-6 font-medium text-gray-900 pt-2">
                    Hồ Sơ
                </h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <form action="" method="post">
                        <div class=" px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

                            <div class=" flex flex-col py-2 ">
                                <label for="title" class="text-2xl font-medium text-gray-900"> Tên người dùng </label>
                                <input type="text" id="title" class="p-2  border border-[#a5abb5] rounded" name="">
                            </div>
                        </div>
                        <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <div class=" flex flex-col py-2 ">
                                <label for="title" class="text-2xl font-medium text-gray-900"> Số Điện Thoại </label>
                                <input type="text" id="title" class="p-2  border border-[#a5abb5] rounded" name=""
                                    value="">
                            </div>
                        </div>
                        <div class=" px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

                            <div class=" flex flex-col py-2 ">
                                <label for="title" class="text-2xl font-medium text-gray-900"> Email </label>
                                <input type="text" id="title" class="p-2  border border-[#a5abb5] rounded" name="">
                            </div>
                        </div>



                        <div class="w-full flex justify-end p-4">
                            <input type="submit" class="btn btn-primary btn-signup-form rounded-sm  bg-blue-700"
                                value="Thay đổi">
                        </div>
                    </form>
            </div>
</section>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Lắng nghe sự kiện click cho các button
    var buttons = document.querySelectorAll('.section-button');

    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Lấy sectionId từ thuộc tính data-section của button
            var sectionId = button.dataset.section;

            // Lấy tất cả các section
            var sections = document.getElementsByClassName("section");

            // Ẩn tất cả các section
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = "none";
            }

            // Hiển thị section được chọn
            var selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.style.display = "block";
            }
        });
    });

    // Hiển thị trang info khi tải trang
    var infoSection = document.getElementById('info');
    if (infoSection) {
        infoSection.style.display = 'block';
    }
});
</script>

<?php include "inc/footer.php";?>