<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/posts.php');
$database = new Database();
$Post = new Post($database);
$posts = $Post->listPost();
?>
<div class="w-full">
    <link rel="stylesheet" href="../../../vendor/dataTables/jquery.dataTables.min.css">
    <script src="../../../vendor/dataTables/jquery-3.7.0.js"></script>
    <script src="../../../vendor/dataTables/jquery.dataTables.min.js"></script>
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">
                        <p class="text-[#0957CB] font-semibold  text-2xl py-4">Danh sách bài viết</p>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Ảnh đại diện </th>
                                    <th> Tiêu đề</th>
                                    <th>Mô tả</th>
                                    <th>Loại</th>
                                    <th style="width: 4rem;">Thao Tác</th>
                                </tr>
                            </thead>

                            <?php foreach ($posts as $post) : ?>
                            <tr>
                                <td><?php echo $post['post_id']; ?></td>
                                <td><img src="../../.<?php echo $post['article_photo']; ?>" alt="Ảnh đại diện"
                                        width="50"></td>
                                <td><?php echo $post['title']; ?></td>
                                <td>
                                    <p
                                        style="  display: -webkit-box; -webkit-box-orient: vertical;-webkit-line-clamp: 3; overflow: hidden;">
                                        <?php echo $post['description']; ?>
                                    <p>
                                </td>
                                <td><?php echo $post['category']; ?></td>
                                <td> <a href="updatePost?post_id=<?php echo $post['post_id']; ?>"
                                        style="margin-right:10px;"><i class="fa-solid fs-5 fa-pen-to-square text-primary mr-3"></i></a>

                                    <a href="deletePost?post_id=<?php echo $post['post_id']; ?>"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?')"><i class="fa-solid fs-5 fa-trash-can text-danger"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <script>
                            new DataTable('#example');
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php 
include(__DIR__ . '/../../inc/footerDashboard.php'); 
 ?>