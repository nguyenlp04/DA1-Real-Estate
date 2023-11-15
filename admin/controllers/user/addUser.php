<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/user.php');
include(__DIR__ . '/../../../config/config.php');
$errors = [];
$success = 'none';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $database = new Database();
  $User = new User($database);
  $result = $User->addUser();

  if (is_array($result) && !empty($result)) {
      $errors = $result;
  } else if (is_string($result) && !empty($result)) {
      $success = $result;
  }
}
?>

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
              <p class="text-[#0957CB] font-semibold  text-2xl py-4">Thêm Người Dùng</p>
              <div class="alert alert-success h-full m-0	ml-2" style="background-color: #5cb85c; display: <?php echo $success ?>">
                <i class="text-white fas fa-circle-check"></i>&nbsp;<strong class="text-white">Thêm thành công!</strong>
              </div>
            </div>
            <form method="post" enctype="multipart/form-data" class="text-black">
              <div class="grid md:grid-cols-2 grid-cols-1 md:gap-x-4 md:gap-y-0 gap-4">

                <div class="w-full flex flex-col py-2 ">
                  <label for="fullname" class="text-black  font-semibold pb-1 capitalize">Họ và tên</label>
                  <input type="text" id="fullname" class="p-2  border border-[#a5abb5] rounded" name="fullname">
                </div>
                <div class="w-full flex flex-col py-2 ">
                  <label for="username" class="text-black  font-semibold pb-1 capitalize">Username </label>
                  <input type="text" id="username" class="p-2  border border-[#a5abb5] rounded" name="username">
                </div>

                <div class="w-full flex flex-col py-2 ">
                  <label for="pass" class="text-black  font-semibold pb-1 capitalize">Mật khẩu</label>
                  <input type="password" id="pass" class="p-2  border border-[#a5abb5] rounded" name="pass">
                </div>
                <div class="w-full flex flex-col py-2 ">
                  <label for="cfpass" class="text-black  font-semibold pb-1 capitalize">Xác nhận mật khẩu</label>
                  <input type="password" id="cfpass" class="p-2  border border-[#a5abb5] rounded" name="cfpass">
                </div>
                <div class="w-full flex flex-col py-2 ">
                  <label for="date_birth" class="text-black  font-semibold pb-1 capitalize">Ngày sinh</label>
                  <input type="date" id="date_birth" class="p-2  border border-[#a5abb5] rounded" name="date_birth">
                </div>
                <div class="w-full flex flex-col py-2 ">
                  <label for="address" class="text-black  font-semibold pb-1 capitalize">Địa chỉ</label>
                  <input type="text" id="address" class="p-2  border border-[#a5abb5] rounded" name="address">
                </div>
                <div class="w-full flex flex-col py-2 ">
                  <label for="email" class="text-black  font-semibold pb-1 capitalize">Email</label>
                  <input type="text" id="email" class="p-2  border border-[#a5abb5] rounded" name="email">
                </div>
                <div class="w-full flex flex-col py-2 ">
                  <label for="phone" class="text-black  font-semibold pb-1 capitalize">Số điện thoại</label>
                  <input type="text" id="phone" class="p-2  border border-[#a5abb5] rounded" name="phone">
                </div>

                <div class="w-full flex flex-col py-2 ">
                  <label for="roles" class="text-black  font-semibold pb-1 capitalize">Vai trò</label>
                  <select id="roles" name="roles" class="p-2  border border-[#a5abb5] rounded" required>
                    <option value="admin">Admin</option>
                    <option value="staff">Nhân viên</option>
                    <option value="user">User</option>
                  </select>
                </div>

                <div class="w-full flex flex-col py-2 mt-10">
                  <label for="avatar" class="text-black   font-semibold pb-1 capitalize"> <i class="fa-solid fa-file-image fa-2xl"></i> Tải lên ảnh đại diện </label>
                  <input type="file" class="article_photo" name="avatar" id="avatar" class="p-2  hidden border border-[#E8F0FC] rounded" style="display:none">
                </div>
              </div>

              <div class="w-full flex justify-end">
                <input type="submit" class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold" value="Thêm người dùng">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include(__DIR__ . '/../../inc/footerDashboard.php');
?>