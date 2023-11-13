<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/tags.php');
include(__DIR__ . '/../../../config/config.php');
$errors = [];
$success = 'none';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $database = new Database();
  $User = new Tags($database);
  $result = $User->addTags();

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
              <p class="text-[#0957CB] font-semibold  text-2xl py-4">Thêm Tags</p>
              <div class="alert alert-success h-full m-0	ml-2" style="background-color: #5cb85c; display: <?php echo $success ?>">
                <i class="text-white fas fa-circle-check"></i>&nbsp;<strong class="text-white">Thêm thành công!</strong>
              </div>
            </div>
            <form method="post" enctype="multipart/form-data" class="text-black">
              <div class="grid md:grid-cols-2 grid-cols-1 md:gap-x-4 md:gap-y-0 gap-4">

                <div class="grid-rows-2">
                  <div class="w-full flex flex-col py-2 ">
                    <label for="name" class="text-black  font-semibold pb-1 capitalize">Tags</label>
                    <input type="text" id="name" class="p-2  border border-[#a5abb5] rounded" name="name">
                  </div>
                  <div class="w-full flex flex-col py-2">
                    <label for="description" class="text-black  font-semibold pb-1 capitalize">Mô
                      tả</label>
                    <textarea name="description" id="description" rows="4" class="p-2  border border-[#E8F0FC] rounded"></textarea>
                  </div>
                  <div class="mt-4 w-full flex justify-end">
                    <input type="submit" class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold" value="Thêm tags">
                  </div>
                  
                </div>
                <div class="grid-rows-2">

                </div>
              </div>
              <table id="example" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th style="width: 150px">Tags</th>
                    <th>Mô tả</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $stt = 1;
                  $database = new Database();
                  $Tags = new Tags($database);
                  $result = $Tags->renderTags();
                  foreach ($result as $row) {
                    echo '<tr>
                                <td>' . $stt . '</td>
                                <td>' . $row['tag_name'] . '</td>
                                <td>' . $row['tag_description'] . '</td>
                                <td>
                                    <a href="updateTags?tag_id=' . $row['tag_id'] . '">
                                        <i class="fa-solid fs-5 fa-pen-to-square text-primary mr-3"></i>
                                    </a>
                                    <a href="deleteTags?tag_id=' . $row['tag_id'] . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa tags này không?\')">
                                        <i class="fa-solid fs-5 fa-trash-can text-danger"></i>
                                    </a>
                                </td>
                            </tr>';
                    $stt++;
                  }

                  ?>
                </tbody>
              </table>
              <script>
                new DataTable('#example');
              </script>
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