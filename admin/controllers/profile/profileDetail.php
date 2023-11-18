<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');

?>



<div class="w-full">

  <div class="flex justify-center xl:w-11/13">
    <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
      <div class="w-full bg-white rounded-lg min-h-screen">
        <div class="w-full flex justify-center h-auto">
          <div class="w-11/12">
            <p class="text-[#0957CB] font-semibold text-2xl py-4">Hồ Sơ</p>

            <div class="p-8 bg-white shadow mt-24 relative">
              <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="grid grid-cols-3  text-center  md:order-first mt-20 md:mt-0">
                  <div>
                    <p class="font-bold text-gray-700 text-xl">22</p>
                    <p class="text-gray-400">Bài viết</p>
                  </div>
                  <div>
                    <p class="font-bold text-gray-700 text-xl">10</p>
                    <p class="text-gray-400">Sản phẩm đã đăng</p>
                  </div>
                  <div>
                    <p class="font-bold text-gray-700 text-xl">89</p>
                    <p class="text-gray-400">ID</p>
                  </div>
                </div>
                <div class="">
                  <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                    <img src="https://i.upanh.org/2023/02/24/322286618_178807304773929_8667228387630154499_n150c4b75513f9fd5.png" class="h-48 w-48 rounded-full">


                  </div>
                </div>
                <div class="space-x-8 flex justify-between mt-10 md:mt-0 md:justify-center text-sm">
                  <button class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                    Đổi mật khẩu</button> <button class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                    chỉnh sửa hồ sơ</button>
                </div>
              </div>
              <div class="mt-10 text-center border-b pb-12">
                <h1 class="text-4xl font-medium text-gray-900">Nguyễn Quang Cường
                </h1>
                <div id="changePassword" class="section" style="">
                  <div class="px-4 py-4 sm:px-6">
                    <h3 class="text-3xl leading-6 font-medium text-gray-900 pt-2  ">
                      Đổi mật khẩu
                    </h3>
                  </div>
                  <!-- <h2>Đổi Mật Khẩu</h2> -->
                  <form action="post" class="p-5 border-t border-gray-200 px-4">
                    <div class=" flex flex-col py-2 ">
                      <label for="title" class="text-black  font-semibold pb-1 capitalize"> Mật
                        Khẩu Hiện Tại </label>
                      <input type="text" id="title" class="p-2  border border-[#a5abb5] rounded" name="title">
                    </div>
                    <div class=" flex flex-col py-2 ">
                      <label for="title" class="text-black  font-semibold pb-1 capitalize"> Mật
                        Khẩu Mới </label>
                      <input type="text" id="title" class="p-2  border border-[#a5abb5] rounded" name="title">
                    </div>
                    <div class="w-full  justify-end pt-4">
                      <input type="submit" class="btn btn-primary btn-signup-form rounded-sm  bg-blue-700" value="Đổi mật khẩu">
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    include(__DIR__ . '/../../inc/footerDashboard.php');
    ?>