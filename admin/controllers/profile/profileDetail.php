<?php
session_start();

  error_reporting(E_ALL);
  ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../../config/config.php');
include(__DIR__ . '/../../models/auth.php');
$database = new Database();
$auth = new Auth($database);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['editinfo'])) {
       
    } elseif (isset($_POST['editpassword'])) {
        $errors = [];
     $currentPassword = $_POST['current-password'];
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];
    
  
    $userid = $_SESSION['user_info']['user_id'];
    
    $result = $auth->updatePassword($currentPassword, $newPassword, $confirmPassword, $userid);

    if ($result === true) {
        // Mật khẩu đã được cập nhật thành công
        echo "<script>alert('Mật khẩu đã được cập nhật thành công!');</script>";
    } else {
        // Xử lý và hiển thị lỗi
        foreach ($result as $error) {
        echo "<script>alert('Mật khẩu  đéo cập nhật được !');</script>";
        echo $error . "<br>";
        }
    }
    } else {
        echo "Không có nút t1 nào được nhấn!";
    }
}


  ?>



<div class="w-full">

    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">


                        <div>
                            <div class=" px-6 mx-auto">
                                <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl"
                                    style="
            background-image: url('../assets/img/curved-images/curved0.jpg');
            background-position-y: 50%;
          ">
                                    <span
                                        class="absolute inset-y-0  w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>
                                </div>
                                <div
                                    class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
                                    <div class="flex flex-wrap -mx-3">
                                        <div class="flex-none w-auto max-w-full px-3">
                                            <div
                                                class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                                                <img src=" <?php echo  $_SESSION['user_info']['avatar']?>"
                                                    alt="profile_image" class="w-full shadow-soft-sm rounded-xl" />
                                            </div>
                                        </div>
                                        <div class="flex-none w-auto max-w-full px-3 my-auto">
                                            <div class="h-full">
                                                <h5 class="mb-1"><?php echo  $_SESSION['user_info']['username']?> </h5>
                                                <p class="mb-0 font-semibold leading-normal text-sm">
                                                    <?php echo  $_SESSION['user_info']['roles']?>
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="ml-4 w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                                            <div class="relative right-0">
                                                <ul class="relative flex flex-wrap p-1 list-none bg-transparent rounded-xl"
                                                    nav-pills role="tablist">
                                                    <li class="z-30 flex-auto text-center">
                                                        <button data-section="editInfo"
                                                            class="section-button z-30 block w-full px-0 py-1 mb-0 transition-all hover:no-underline  border-0 rounded-lg  bg-inherit text-slate-700">
                                                            <i class="fa-solid fa-user-pen"></i>

                                                            <span class="ml-1 "> Chỉnh sửa </span>
                                                        </button>
                                                    </li>
                                                    <li class="z-30 flex-auto text-center">
                                                        <button data-section="changePassword"
                                                            class="section-button z-30 block w-full px-0 py-1 mb-0 transition-all border-0 rounded-lg  bg-inherit text-slate-700">

                                                            <i class="fa-solid fa-key"></i>
                                                            <span class="ml-1"> Đổi mật khẩu </span>
                                                        </button>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full p-6 mx-auto">
                                <div class="flex flex-wrap -mx-3  section" id="info">
                                    <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-5/12">
                                        <div
                                            class="relative flex flex-col  min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                                            <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                                                <div class="flex flex-wrap -mx-3">
                                                    <div
                                                        class="flex items-center  max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                                                        <h6 class="mb-0">Hồ sơ </h6>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex-auto pl-4">
                                                <p class="leading-normal text-sm">
                                                    Chào mừng bạn đến với trang quản trị hãy cố gắng mỗi ngày nhé !
                                                </p>
                                                <hr
                                                    class="h-px my-3 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent" />
                                                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                                    <li
                                                        class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit">
                                                        <strong class="text-slate-700">Tên đầy đủ :</strong> &nbsp;
                                                        <?php echo  $_SESSION['user_info']['full_name']?>
                                                    </li>
                                                    <li
                                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                                        <strong class="text-slate-700">Số điện thoại:</strong> &nbsp;
                                                        <?php echo  $_SESSION['user_info']['phone_number']?>
                                                    </li>
                                                    <li
                                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                                        <strong class="text-slate-700">Email:</strong> &nbsp;
                                                        <?php echo  $_SESSION['user_info']['email']?>

                                                    </li>
                                                    <li
                                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                                        <strong class="text-slate-700">Địa chỉ:</strong> &nbsp;
                                                        <?php echo  $_SESSION['user_info']['address_user']?>
                                                    </li>
                                                    <li
                                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                                        <strong class="text-slate-700">Ngày sinh:</strong> &nbsp;
                                                        <?php echo  $_SESSION['user_info']['birth_user']?>

                                                    </li>
                                                    <li
                                                        class="relative block px-4 py-2 pb-0 pl-0 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
                                                        <strong
                                                            class="leading-normal text-sm text-slate-700">Social:</strong>
                                                        &nbsp;
                                                        <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center text-blue-800 align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none"
                                                            href="javascript:;">
                                                            <i class="fab fa-facebook fa-lg"></i>
                                                        </a>
                                                        <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-600"
                                                            href="javascript:;">
                                                            <i class="fab fa-twitter fa-lg"></i>
                                                        </a>
                                                        <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-900"
                                                            href="javascript:;">
                                                            <i class="fab fa-instagram fa-lg"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 hidden section" id="changePassword">
                                    <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-5/12">
                                        <div
                                            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                                            <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                                                <div class="flex flex-wrap -mx-3">
                                                    <div
                                                        class="flex items-center  max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                                                        <h6 class="mb-0">Đổi mật khẩu</h6>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex-auto pl-4 ">
                                                <form action="" class="mb-6">
                                                    <div
                                                        class="grid md:grid-cols-2 grid-cols-1 md:gap-x-4 md:gap-y-0 gap-4">
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="current-password"
                                                                class="text-black font-semibold pb-1 capitalize"> Mật
                                                                khẩu hiện tại </label>
                                                            <input type="password" id="current-password"
                                                                class="p-2 border border-[#a5abb5] rounded"
                                                                name="current-password">
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="new-password"
                                                                class="text-black font-semibold pb-1 capitalize"> Mật
                                                                khẩu mới </label>
                                                            <input type="password" id="new-password"
                                                                class="p-2 border border-[#a5abb5] rounded"
                                                                name="new-password">
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="confirm-password"
                                                                class="text-black font-semibold pb-1 capitalize"> Nhập
                                                                lại </label>
                                                            <input type="password" id="confirm-password"
                                                                class="p-2 border border-[#a5abb5] rounded"
                                                                name="confirm-password">
                                                        </div>
                                                        <div class="w-full flex justify-center items-center h-1/2 py-2">
                                                            <input type="submit" name="editpassword"
                                                                class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold"
                                                                value="Thay đổi">
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        <footer class="pt-4">
                                            <div class="w-full px-6 mx-auto">
                                                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                                                    <div
                                                        class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                                                        <div
                                                            class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                                                            ©
                                                            <script>
                                                            document.write(new Date().getFullYear() + ",");
                                                            </script>
                                                            made with <i class="fa fa-heart"></i> by
                                                            <a href="https://www.creative-tim.com"
                                                                class="font-semibold text-slate-700"
                                                                target="_blank">Creative
                                                                Tim</a>
                                                            for a better web.
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                                                        <ul
                                                            class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                                                            <li class="nav-item">
                                                                <a href="https://www.creative-tim.com"
                                                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                                                    target="_blank">Creative Tim</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="https://www.creative-tim.com/presentation"
                                                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                                                    target="_blank">About Us</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="https://creative-tim.com/blog"
                                                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                                                    target="_blank">Blog</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="https://www.creative-tim.com/license"
                                                                    class="block px-4 pt-0 pb-1 pr-0 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                                                    target="_blank">License</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </footer>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 hidden section" id="editInfo">
                                    <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-5/12">
                                        <div
                                            class="relative flex flex-col  min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                                            <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                                                <div class="flex flex-wrap -mx-3">
                                                    <div
                                                        class="flex items-center  max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                                                        <h6 class="mb-0">Chỉnh sửa thông tin</h6>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex-auto pl-4 ">
                                                <form action="" class="mb-6">
                                                    <div
                                                        class="grid md:grid-cols-2 grid-cols-1 md:gap-x-4 md:gap-y-0 gap-4">
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="fullname"
                                                                class="text-black font-semibold pb-1 capitalize"> Tên
                                                                đầy đủ </label>
                                                            <input type="fullname" id="fullname"
                                                                class="p-2 border border-[#a5abb5] rounded"
                                                                name="fullname"
                                                                value=" <?php echo  $_SESSION['user_info']['full_name']?>">
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="email"
                                                                class="text-black font-semibold pb-1 capitalize"> Email
                                                            </label>
                                                            <input type="email" id="email"
                                                                class="p-2 border border-[#a5abb5] rounded" name="email"
                                                                value=" <?php echo  $_SESSION['user_info']['email']?>">
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="phonenumber"
                                                                class="text-black font-semibold pb-1 capitalize"> Số
                                                                điện thoại</label>
                                                            <input type="phonenumber" id="phonenumber"
                                                                class="p-2 border border-[#a5abb5] rounded"
                                                                name="phonenumber"
                                                                value=" <?php echo  $_SESSION['user_info']['phone_number']?>">
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="confirm-password"
                                                                class="text-black font-semibold pb-1 capitalize"> Ngày
                                                                sinh</label>
                                                            <input type="birthuser" id="confirm-password"
                                                                class="p-2 border border-[#a5abb5] rounded"
                                                                name="birthuser"
                                                                value=" <?php echo  $_SESSION['user_info']['birth_user']?>">
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="addressuser"
                                                                class="text-black font-semibold pb-1 capitalize"> Địa
                                                                chỉ</label>
                                                            <input type="addressuser" id="addressuser"
                                                                class="p-2 border border-[#a5abb5] rounded"
                                                                name="addressuser"
                                                                value=" <?php echo  $_SESSION['user_info']['address_user']?>">
                                                        </div>
                                                        <div
                                                            class="w-full flex justify-center items-center h-1/2  mt-auto py-2">
                                                            <input type="submit" name="editinfo"
                                                                class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold"
                                                                value="Thay đổi">
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        <footer class="pt-4">
                                            <div class="w-full px-6 mx-auto">
                                                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                                                    <div
                                                        class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                                                        <div
                                                            class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                                                            ©
                                                            <script>
                                                            document.write(new Date().getFullYear() + ",");
                                                            </script>
                                                            made with <i class="fa fa-heart"></i> by
                                                            <a href="https://www.creative-tim.com"
                                                                class="font-semibold text-slate-700"
                                                                target="_blank">Creative
                                                                Tim</a>
                                                            for a better web.
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                                                        <ul
                                                            class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                                                            <li class="nav-item">
                                                                <a href="https://www.creative-tim.com"
                                                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                                                    target="_blank">Creative Tim</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="https://www.creative-tim.com/presentation"
                                                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                                                    target="_blank">About Us</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="https://creative-tim.com/blog"
                                                                    class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                                                    target="_blank">Blog</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="https://www.creative-tim.com/license"
                                                                    class="block px-4 pt-0 pb-1 pr-0 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                                                    target="_blank">License</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </footer>
                                    </div>
                                </div>
                                <div fixed-plugin>

                                    <!-- -right-90 in loc de 0-->
                                    <div fixed-plugin-card
                                        class="z-sticky shadow-soft-3xl w-90 ease-soft -right-90 fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white bg-clip-border px-2.5 duration-200">
                                        <div class="px-6 pt-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                                            <div class="float-left">
                                                <h5 class="mt-4 mb-0">Soft UI Configurator</h5>
                                                <p>See our dashboard options.</p>
                                            </div>
                                            <div class="float-right mt-6">
                                                <button fixed-plugin-close-button
                                                    class="inline-block p-0 mb-4 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 active:opacity-85 text-slate-700">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </div>
                                            <!-- End Toggle Button -->
                                        </div>
                                        <hr
                                            class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                                        <div class="flex-auto p-6 pt-0 sm:pt-4">
                                            <!-- Sidebar Backgrounds -->
                                            <div>
                                                <h6 class="mb-0">Sidebar Colors</h6>
                                            </div>
                                            <a href="javascript:void(0)">
                                                <div class="my-2 text-left" sidenav-colors>
                                                    <span
                                                        class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-purple-700 to-pink-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-slate-700 text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                                                        active-color data-color-from="purple-700"
                                                        data-color-to="pink-500" onclick="sidebarColor(this)"></span>
                                                    <span
                                                        class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-gray-900 to-slate-800 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                                                        data-color-from="gray-900" data-color-to="slate-800"
                                                        onclick="sidebarColor(this)"></span>
                                                    <span
                                                        class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-blue-600 to-cyan-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                                                        data-color-from="blue-600" data-color-to="cyan-400"
                                                        onclick="sidebarColor(this)"></span>
                                                    <span
                                                        class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-green-600 to-lime-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                                                        data-color-from="green-600" data-color-to="lime-400"
                                                        onclick="sidebarColor(this)"></span>
                                                    <span
                                                        class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-red-500 to-yellow-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                                                        data-color-from="red-500" data-color-to="yellow-400"
                                                        onclick="sidebarColor(this)"></span>
                                                    <span
                                                        class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-red-600 to-rose-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                                                        data-color-from="red-600" data-color-to="rose-400"
                                                        onclick="sidebarColor(this)"></span>
                                                </div>
                                            </a>
                                            <!-- Sidenav Type -->
                                            <div class="mt-4">
                                                <h6 class="mb-0">Sidenav Type</h6>
                                                <p class="leading-normal text-sm">
                                                    Choose between 2 different sidenav types.
                                                </p>
                                            </div>
                                            <div class="flex">
                                                <button transparent-style-btn
                                                    class="inline-block w-full px-4 py-3 mb-2 font-bold text-center text-white uppercase align-middle transition-all border border-transparent border-solid rounded-lg cursor-pointer xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-purple-700 xl-max:to-pink-500 xl-max:text-white xl-max:border-0 hover:scale-102 hover:shadow-soft-xs active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-purple-700 to-pink-500 bg-fuchsia-500 hover:border-fuchsia-500"
                                                    data-class="bg-transparent" active-style>
                                                    Transparent
                                                </button>
                                                <button white-style-btn
                                                    class="inline-block w-full px-4 py-3 mb-2 ml-2 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg cursor-pointer xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-purple-700 xl-max:to-pink-500 xl-max:text-white xl-max:border-0 hover:scale-102 hover:shadow-soft-xs active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 border-fuchsia-500 bg-none text-fuchsia-500 hover:border-fuchsia-500"
                                                    data-class="bg-white">
                                                    White
                                                </button>
                                            </div>
                                            <p class="block mt-2 leading-normal text-sm xl:hidden">
                                                You can change the sidenav type just on desktop view.
                                            </p>
                                            <!-- Navbar Fixed -->
                                            <div class="mt-4">
                                                <h6 class="mb-0">Navbar Fixed</h6>
                                            </div>
                                            <div class="min-h-6 mb-0.5 block pl-0">
                                                <input
                                                    class="rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right"
                                                    type="checkbox" navbarFixed />
                                            </div>
                                            <hr
                                                class="h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent sm:my-6" />
                                            <a class="inline-block w-full px-6 py-3 mb-4 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer leading-pro text-xs ease-soft-in hover:shadow-soft-xs hover:scale-102 active:opacity-85 tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800"
                                                href="https://www.creative-tim.com/product/soft-ui-dashboard-tailwind"
                                                target="_blank">Free Download</a>
                                            <a class="inline-block w-full px-6 py-3 mb-4 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer active:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 border-slate-700 text-slate-700 hover:bg-transparent hover:text-slate-700 hover:shadow-none active:bg-slate-700 active:text-white active:hover:bg-transparent active:hover:text-slate-700 active:hover:shadow-none"
                                                href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/soft-ui-dashboard/"
                                                target="_blank">View documentation</a>
                                            <div class="w-full text-center">
                                                <a class="github-button"
                                                    href="https://github.com/creativetimofficial/soft-ui-dashboard-tailwind"
                                                    data-icon="octicon-star" data-size="large" data-show-count="true"
                                                    aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                                                <h6 class="mt-4">Thank you for sharing!</h6>
                                                <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20Tailwind%20made%20by%20%40CreativeTim&hashtags=webdesign,dashboard,tailwindcss&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard-tailwind"
                                                    class="inline-block px-6 py-3 mb-0 mr-2 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700"
                                                    target="_blank">
                                                    <i class="mr-1 fab fa-twitter" aria-hidden="true"></i> Tweet
                                                </a>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard-tailwind"
                                                    class="inline-block px-6 py-3 mb-0 mr-2 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700"
                                                    target="_blank">
                                                    <i class="mr-1 fab fa-facebook-square" aria-hidden="true"></i>
                                                    Share
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                <?php 
include(__DIR__ . '/../../inc/footerDashboard.php'); 
 ?>