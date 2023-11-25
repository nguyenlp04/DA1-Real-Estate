<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/tags.php');

$errors = [];
$success = 'none';
$database = new Database();
$Tags = new Tags($database);
$idtags = $_GET['tag_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $result = $Tags->updateTags($idtags);

  if (is_array($result) && !empty($result)) {
    $errors = $result;
  } else if (is_string($result) && !empty($result)) {
    $success = $result;
  }
}

if (isset($_GET['tag_id'])) {
    $idtags = $_GET['tag_id'];
    $tag = $Tags->getTagById($idtags);
    if (!$tag) {
        echo "Không tìm thấy bài viết với ID: $idtags";
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
                            <div class="alert alert-success h-full m-0	ml-2"
                                style="background-color: #5cb85c; display: <?php echo $success ?>">
                                <i class="text-white fas fa-circle-check"></i>&nbsp;<strong class="text-white"> Chỉnh
                                    sửa
                                    thành công!</strong>
                            </div>
                        </div>
                        <form method="post" enctype="multipart/form-data" class="text-black">
                            <div class="grid md:grid-cols-2 grid-cols-1 md:gap-x-4 md:gap-y-0 gap-4">
                                <input type="hidden" id="tag_id" class="p-2  border border-[#a5abb5] rounded"
                                    name="tag_id" value="<?php echo $tag['tag_id']?>">
                                <div class="grid-rows-2">
                                    <div class="w-full flex flex-col py-2 ">
                                        <label for="name" class="text-black  font-semibold pb-1 capitalize">Tags</label>
                                        <input type="text" id="name" class="p-2  border border-[#a5abb5] rounded"
                                            name="name" value="<?php echo $tag['tag_name']?>">
                                    </div>
                                    <div class="w-full flex flex-col py-2">
                                        <label for="description" class="text-black  font-semibold pb-1 capitalize">Mô
                                            tả</label>
                                        <textarea name="description" id="description" rows="4"
                                            class="p-2  border border-[#E8F0FC] rounded"><?php echo $tag['tag_description']?></textarea>
                                    </div>
                                    <div class="mt-4 w-full flex justify-end">
                                        <input type="submit"
                                            class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold"
                                            value="Thêm tags">
                                    </div>

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