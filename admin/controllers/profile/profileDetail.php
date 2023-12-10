<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/auth.php');
include(__DIR__ . '/../../models/user.php');
$database = new Database();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["addavatar"])) {
        $userid = $_SESSION['user_info']['user_id'];
        $avataprofile = $_FILES["profileImage"];
        $avtf4 = new Profile($database);
        $sqlavt = $avtf4->updateavta($avataprofile, $userid);
        if ($sqlavt === true) {
            // Lấy thông tin người dùng từ session
            $infoUser = $_SESSION['user_info'];
        
            // Cập nhật thông tin mới (nếu có)
            $infoUser['avatar'] = "/".$avataprofile['name']; // hoặc đường dẫn đến ảnh nếu cần
        
            // Lưu lại vào session
            $_SESSION['user_info'] = $infoUser;
        } else {
            // Xử lý và hiển thị lỗi
            echo "<script>alert('Thông tin không được cập nhật!');</script>";
            echo $sqlavt["errors"] . "<br>"; // Lưu ý sửa đổi ở đây để truy cập mảng errors
        }
    }elseif (isset($_POST['editinfo'])) {
        $userid = $_SESSION['user_info']['user_id'];
        
        $Profile = new Profile($database);
        $success = "block";
        $fullname = $_POST["fullname"];
        $datebirth = $_POST["birthuser"];
        $address = $_POST["addressuser"];
        $email = $_POST["email"];
        $roles = $_POST["roles"];
        $phone = $_POST["phonenumber"];
        $sqlPass = $Profile->updateProfile($fullname,$datebirth,$address,$email,$roles,$phone,$userid);
        if ($sqlPass === true) {
            // Thông tin đã được cập nhật thành công
            echo "<script>alert('Thông tin đã được cập nhật thành công!');</script>";
        
            // Lấy thông tin người dùng từ session
            $infoUser = $_SESSION['user_info'];
        
            // Cập nhật thông tin mới (nếu có)
            $infoUser['full_name'] = $fullname;
            $infoUser['address_user'] = $address;
            $infoUser['email'] = $email;
            $infoUser['birth_user'] = $datebirth;
            $infoUser['roles'] = $roles;
            $infoUser['phone_number'] = $phone;
        
            // Lưu lại vào session
            $_SESSION['user_info'] = $infoUser;
        } else {
            // Xử lý và hiển thị lỗi
            foreach ($sqlPass as $error) {
                echo "<script>alert('Thông tin không được cập nhật!');</script>";
                echo $error . "<br>";
            }
        }
        }
        
     elseif (isset($_POST['editpassword'])) {
        $auth = new Auth($database);
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
                echo "<script>alert('$error');</script>";
                echo $error . "<br>";
            }
        }
    } else {
        echo "Không có nút t1 nào được nhấn!";
    }
}
?>
<link href="../assets/css/profileAdmin.css" rel="stylesheet">

<div class="w-full">

    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full  rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">
                        <div>
                            <div class=" px-6 mx-auto">

                                <div
                                    class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
                                    <div class="flex">
                                        <div class="flex-none w-auto max-w-full px-3">
                                            <div
                                                class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                                                <form method="post" enctype="multipart/form-data" id="avataForm2">
                                                    <label for="profileImage" class="cursor-pointer">
                                                        <input type="file" id="profileImage" name="profileImage"
                                                            style="display: none;" onchange="uploadImage()" />
                                                        <img src="./../assets/images/imguser/<?php echo $_SESSION['user_info']['avatar'] ?>"
                                                            id="previewImage" alt="profile_image"
                                                            class="w-full shadow-soft-sm rounded-xl" />
                                                    </label>

                                                    <input type="submit" id="submitBtn" class="hidden" name="addavatar">
                                                </form>

                                                <script>
                                                function uploadImage() {

                                                    document.getElementById('submitBtn').click();
                                                }
                                                </script>




                                            </div>
                                        </div>
                                        <div class="flex-none w-auto max-w-full px-3 my-auto">
                                            <div class="h-full">
                                                <h5 class="mb-1"><?php echo  $_SESSION['user_info']['username'] ?> </h5>
                                                <p class="mb-0 font-semibold leading-normal text-sm">
                                                    <?php echo  $_SESSION['user_info']['roles'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="w-full max-w-full mt-4 ml-20 sm:my-auto sm:mr-0  "
                                            style="padding-left:300px">
                                            <div class=" w-full">
                                                <ul class="flex list-none bg-transparent justify-between w-full">
                                                    <li class="z-30 flex-auto text-center w-full">
                                                        <button data-section="info"
                                                            class="section-button z-30 block w-full px-0 py-1 mb-0 transition-all hover:no-underline border-0 rounded-lg bg-inherit text-slate-700">
                                                            <i class="fa-solid fa-user"></i>
                                                            <span class="ml-1"> Thông tin </span>
                                                        </button>
                                                    </li>
                                                    <li class="z-30 flex-auto text-center w-full">
                                                        <button data-section="editInfo"
                                                            class="section-button z-30 block w-full px-0 py-1 mb-0 transition-all hover:no-underline border-0 rounded-lg bg-inherit text-slate-700">
                                                            <i class="fa-solid fa-user-pen"></i>
                                                            <span class="ml-1"> Chỉnh sửa </span>
                                                        </button>
                                                    </li>
                                                    <li class="z-30 flex-auto text-center w-full">
                                                        <button data-section="changePassword"
                                                            class="section-button z-30 block w-full px-0 py-1 mb-0 transition-all border-0 rounded-lg bg-inherit text-slate-700">
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
                                            <div class="flex-auto pl-4 mb-6">
                                                <p class="leading-normal text-sm">
                                                    Chào mừng bạn đến với trang quản trị hãy cố gắng mỗi ngày nhé !
                                                </p>
                                                <hr
                                                    class="h-px my-3 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent" />
                                                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                                    <li
                                                        class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit">
                                                        <strong class="text-slate-700">Họ và tên :</strong> &nbsp;
                                                        <?php echo  $_SESSION['user_info']['full_name'] ?>
                                                    </li>
                                                    <li
                                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                                        <strong class="text-slate-700">Số điện thoại:</strong> &nbsp;
                                                        <?php echo  $_SESSION['user_info']['phone_number'] ?>
                                                    </li>
                                                    <li
                                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                                        <strong class="text-slate-700">Email:</strong> &nbsp;
                                                        <?php echo  $_SESSION['user_info']['email'] ?>

                                                    </li>
                                                    <li
                                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                                        <strong class="text-slate-700">Địa chỉ:</strong> &nbsp;
                                                        <?php echo  $_SESSION['user_info']['address_user'] ?>
                                                    </li>
                                                    <li
                                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                                        <strong class="text-slate-700">Ngày sinh:</strong> &nbsp;
                                                        <?php echo  $_SESSION['user_info']['birth_user'] ?>

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
                                                <form action="" method="POST" class="mb-6 mr-4">
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
                                                <form class="mb-6 mr-4" method="POST">
                                                    <div
                                                        class="grid md:grid-cols-2 grid-cols-1 md:gap-x-4 md:gap-y-0 gap-4">
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="fullname"
                                                                class="text-black font-semibold pb-1 capitalize"> Họ và
                                                                tên </label>
                                                            <input type="fullname" id="fullname"
                                                                class="p-2 border border-[#a5abb5] rounded"
                                                                name="fullname"
                                                                value=" <?php echo  $_SESSION['user_info']['full_name'] ?>">
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="email"
                                                                class="text-black font-semibold pb-1 capitalize"> Email
                                                            </label>
                                                            <input type="email" id="email"
                                                                class="p-2 border border-[#a5abb5] rounded" name="email"
                                                                value=" <?php echo  $_SESSION['user_info']['email'] ?>">
                                                        </div>
                                                        <input type="hidden" id="roles"
                                                            class="p-2 border border-[#a5abb5] rounded" name="roles"
                                                            value="<?php echo  $_SESSION['user_info']['roles'] ?>">
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="phonenumber"
                                                                class="text-black font-semibold pb-1 capitalize"> Số
                                                                điện thoại</label>
                                                            <input type="text" id="phonenumber"
                                                                class="p-2 border border-[#a5abb5] rounded"
                                                                name="phonenumber"
                                                                value="<?php echo  $_SESSION['user_info']['phone_number'] ?>">
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="confirm-password"
                                                                class="text-black font-semibold pb-1 capitalize"> Ngày
                                                                sinh</label>
                                                            <input type="birthuser" id="confirm-password"
                                                                class="p-2 border border-[#a5abb5] rounded"
                                                                name="birthuser"
                                                                value=" <?php echo  $_SESSION['user_info']['birth_user'] ?>">
                                                        </div>
                                                        <div class="w-full flex flex-col py-2">
                                                            <label for="addressuser"
                                                                class="text-black font-semibold pb-1 capitalize"> Địa
                                                                chỉ</label>
                                                            <input type="text" id="addressuser"
                                                                class="p-2 border border-[#a5abb5] rounded"
                                                                name="addressuser"
                                                                value=" <?php echo  $_SESSION['user_info']['address_user'] ?>">
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