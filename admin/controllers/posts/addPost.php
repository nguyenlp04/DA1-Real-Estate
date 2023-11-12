<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/posts.php');
include(__DIR__ . '/../../../config/config.php');

$database = new Database();
$Post = new Post($database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $result = $Post->addPost();

    // Kiểm tra kết quả và hiển thị thông báo cho người dùng
    if ($result === true) {
        echo '<div class=" bg-green-500" style="margin-left: 30px; width:300px; border-radius: 0.25rem;"><div class="alert text-white font-bold rounded-t px-4 py-2"> Thêm bài viết thành công <i class="fa-solid fa-circle-check"></i></div></div>';
    } else {
        echo "Lỗi khi thêm bài viết: " . $result;
    }
}
?>
<div class="w-full">

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script>


    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">
                        <p class="text-[#0957CB] font-semibold  text-2xl py-4">Upload Post</p>

                        <form method="post" enctype="multipart/form-data" class="text-black">
                            <div class="grid md:grid-cols-2 grid-cols-1 md:gap-x-4 md:gap-y-0 gap-4">
                                <div class="w-full flex flex-col py-2 ">
                                    <label for="title" class="text-black  font-semibold pb-1 capitalize">Tiêu đề</label>
                                    <input type="text" id="title" class="p-2  border border-[#a5abb5] rounded"
                                        name="title">
                                </div>
                                <div class="w-full flex flex-col py-2 md:row-start-2 ">
                                    <label for="category" class="text-black  font-semibold pb-1 capitalize">Loại bài
                                        viết</label>

                                    <select id="category" name="category" class="p-2  border border-[#a5abb5] rounded"
                                        required>
                                        <option value="Mua">Mua</option>
                                        <option value="Bán">Bán</option>
                                        <option value="Thuê">Thuê</option>
                                    </select>
                                </div>


                                <div class="w-full flex flex-col py-2  md:row-span-2 md:row-start-1 md:col-start-2">
                                    <label for="description" class="text-black  font-semibold pb-1 capitalize"> Mô
                                        tả</label>
                                    <textarea type="text" id="title"
                                        class="p-2 h-[8.5rem]  border border-[#E8F0FC] rounded"
                                        name="description"></textarea>
                                </div>

                            </div>
                            <div class="w-full flex flex-col py-2">
                                <label for="content" class="text-black  font-semibold pb-1 capitalize">Nội dung</label>
                                <textarea type="text" id="editor" name="content"
                                    class="p-2  border border-[#E8F0FC] rounded"></textarea>


                            </div>

                            <div class="w-full flex flex-col py-2 mt-10">
                                <label for="article_photo" class="text-black   font-semibold pb-1 capitalize"> <i
                                        class="fa-solid fa-file-image fa-2xl"></i> Tải lên ảnh đại diện </label>
                                <input type="file" class="article_photo" name="article_photo" id="article_photo"
                                    class="p-2  hidden border border-[#E8F0FC] rounded" style="display:none">
                            </div>
                            <div class="w-full flex justify-end">
                                <input type="submit"
                                    class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold"
                                    value="Thêm bài viết">
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../../assets/js/ckeditor.js"></script>


<?php
include(__DIR__ . '/../../inc/footerDashboard.php');
?>