<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../admin/models/posts.php');
include 'inc/header.php';
$database = new Database();
$Post = new Post($database);

?>
<section>
    <div class="container">
        <div class="path-page"><a href="home">Trang chủ </a><i class="fa-solid fa-angle-right"></i>
            <p>Tin Tức</p><i class="fa-solid fa-angle-right"></i>
            <p>Chi tết bài tin tức</p>
        </div>
        <div class="page-news" style="display:flex;flex-direction: column;">

            <?php 
if (isset($_GET['post_id'])) {
    $postid = $_GET['post_id'];
    $post = $Post->getPostById($postid);

    // Kiểm tra xem có bài viết hay không
    if ($post) {
        // Hiển thị thông tin bài viết

        echo '<h1 class="title-news-more" style="font-size: 4.5rem;">' . $post['title'] . '</h1>';
        echo '<p class="time-post"><i class="fa-solid fa-calendar-days"></i>&nbsp;' . $post['created_at'] . '</p>';
        echo '<p class="content-news">' . $post['content'] . '</p>';
        echo '
        <div class="row fw-bold text-light-emphasis fs-5">
            <div class="col-6"></div>
            <div class="col-6 text-center fs-6">Tác giả</div>
            <div class="col-6"></div>
            <div class="col-6 text-center"><em>' . $post['author'] . '</em></div>
        </div>
';


    } else {
        echo '<p>Bài viết không tồn tại.</p>';
    }
}?>

        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>