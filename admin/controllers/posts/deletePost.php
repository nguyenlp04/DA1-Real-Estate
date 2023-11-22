<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../models/posts.php');

if (isset($_GET['post_id'])) {
    $postid = $_GET['post_id'];
    $database = new Database();
    $post = new Post($database);
    $result = $post->deletePost($postid);
    if ($result === true) {
        echo "<script>alert('xóa bài viết thành công .');</script>";
        // Chuyển hướng người dùng trở lại trang trước đó sau một khoảng thời gian ngắn
        echo "<script>window.location.href = 'post';</script>";
    } else {
        echo "Có lỗi khi xóa bài viết.";
    }
}
?>