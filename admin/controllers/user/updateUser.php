<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/user.php');
$errors = [];
$success = 'none';
$database = new Database();
$User = new User($database);
$userid = $_GET['user_id'];
if (isset($_POST['submit'])) {
  $result = $User->updateUser($userid);
  if (is_array($result) && !empty($result)) {
    $errors = $result;
  } else if (is_string($result) && !empty($result)) {
    $success = $result;
  }
}
if (isset($_GET['user_id'])) {
  $user = $User->getUserById($userid);
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
              <p class="text-[#0957CB] font-semibold  text-2xl py-4">Cập Nhật Người Dùng</p>
              <div class="alert alert-success h-full m-0	ml-2" style="background-color: #5cb85c; display: <?php echo $success ?>">
                <i class="text-white fas fa-circle-check"></i>&nbsp;<strong class="text-white">Thêm thành công!</strong>
              </div>
            </div>
            <form method="post" enctype="multipart/form-data" class="text-black">
              <div class="grid md:grid-cols-2 grid-cols-1 md:gap-x-4 md:gap-y-0 gap-4">

                <div class="w-full flex flex-col py-2 ">
                  <label for="fullname" class="text-black  font-semibold pb-1 capitalize">Họ và tên</label>
                  <input type="text" id="fullname" class="p-2  border border-[#a5abb5] rounded" name="fullname" value="<?php echo $user['full_name'] ?>">
                </div>
                <div class="w-full flex flex-col py-2 ">
                  <label for="username" class="text-black  font-semibold pb-1 capitalize">Username </label>
                  <input type="text" id="username" class="p-2  border border-[#a5abb5] rounded" name="username" value="<?php echo $user['username'] ?>" disabled>
                </div>
                <div class="w-full flex flex-col py-2 ">
                  <label for="date_birth" class="text-black  font-semibold pb-1 capitalize">Ngày sinh</label>
                  <input type="date" id="date_birth" class="p-2  border border-[#a5abb5] rounded" name="date_birth" value="<?php echo $user['birth_user'] ?>">
                </div>
                <div class="w-full flex flex-col py-2 ">
                  <label for="address" class="text-black  font-semibold pb-1 capitalize">Địa chỉ</label>
                  <input type="text" id="address" class="p-2  border border-[#a5abb5] rounded" name="address" value="<?php echo $user['address_user'] ?>">
                </div>
                <div class="w-full flex flex-col py-2 ">
                  <label for="email" class="text-black  font-semibold pb-1 capitalize">Email</label>
                  <input type="text" id="email" class="p-2  border border-[#a5abb5] rounded" name="email" value="<?php echo $user['email'] ?>">
                </div>
                <div class="w-full flex flex-col py-2 ">
                  <label for="phone" class="text-black  font-semibold pb-1 capitalize">Số điện thoại</label>
                  <input type="text" id="phone" class="p-2  border border-[#a5abb5] rounded" name="phone" value="<?php echo $user['phone_number'] ?>">
                </div>
                <div class="w-full flex flex-col py-2">
                  <label for="roles" class="text-black font-semibold pb-1 capitalize">Vai trò</label>
                  <select id="roles" name="roles" class="p-2 border border-[#a5abb5] rounded" required>
                    <option value="admin" <?php echo ($user['roles'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="staff" <?php echo ($user['roles'] == 'staff') ? 'selected' : ''; ?>>Nhân viên</option>
                    <option value="user" <?php echo ($user['roles'] == 'user') ? 'selected' : ''; ?>>User</option>
                  </select>
                </div>
                <div class="w-full flex flex-col py-2 mt-10">
                  <label for="avatar" class="text-black   font-semibold pb-1 capitalize"> <i class="fa-solid fa-file-image fa-2xl"></i> Tải lên ảnh đại diện </label>
                  <input type="file" class="article_photo" name="avatar" id="avatar" class="p-2  hidden border border-[#E8F0FC] rounded" style="display:none">
                </div>
              </div>

              <div class="w-full flex justify-end">
                <input name="submit" type="submit" class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold" value="Cập nhật">
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