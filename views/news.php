<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../admin/models/posts.php');
include 'inc/header.php'
?>
<section>
    <div class="container">
        <div class="path-page"><a href="home">Trang chủ </a><i class="fa-solid fa-angle-right"></i>
            <p>Tin Tức</p>
        </div>
        <div class="page-news">
            <div class="news-more">
                <h2 class="title-news-more">Danh mục bài viết</h2>
                <ul>
                    <?php
                            $database = new Database();
                            $Post = new Post($database);
                            $categories = $Post->renderCategoryPost();

                            if ($categories !== null) {
                                $i=1;
                                foreach ($categories as $category) {
                                    echo '<li><a href="?category=' . $category . '">' . $category . '</a></li>';
                                }
                            }
                            ?>
                </ul>
                <h2 class="title-news-more more">Tin tức mới nhất </h2>
                <?php
                    $database = new Database();
                    $Post = new Post($database);
                    $latestPosts = $Post->getLatestPosts();
                    // var_dump($latestPosts);

                    if (!empty($latestPosts)) {
                        foreach ($latestPosts as $post) {
                            
                  echo ' 
                  <div class="item-news-more">
                  <img src="' . $post['article_photo'] . '" alt="">
                    <h3><a href="newDetail?post_id='. $post['post_id'].'">'. $post['title'].'</a></h3>
                </div>
                <hr>';
    }}?>

            </div>
            <div class="news-container">
                <?php
                    $database = new Database();
                    $Post = new Post($database);
                    $OnelatestPosts = $Post->getOneLatestPosts();
                    // var_dump($latestPosts);

                    if (!empty($OnelatestPosts)) {
                        foreach ($OnelatestPosts as $post) {
                            
                  echo '
                  <div class="news-main">
                    <img src="' . $post['article_photo'] . '" alt="">
                    <div class="content-news-main">
                        <h3 class="title-news-main">'. $post['title'].'</h3>
                        <span class="time-post"><i class="fa-solid fa-calendar-days"></i>'. $post['created_at'].'</span>
                   
                        <p class="descript">'. $post['description'].'</p>
                        <button> <a href="newDetail?post_id='. $post['post_id'].'" class="btn-custome">Xem chi tiết</a></button>
                    </div>
                </div> 
                <hr>
                  ';
    }}?>
                <?php 
          // Kiểm tra xem có tham số 'category' được truyền vào không
if (isset($_GET['category'])) {
    $category = $_GET['category'];
    
    // Nếu tham số 'category' không phải là 'all', lấy bài viết thuộc danh mục
    if ($category != 'all') {
        $query = "SELECT * FROM posts WHERE category = '$category'";
    } else {
        // Nếu tham số 'category' là 'all', lấy tất cả các bài viết
        $query = "SELECT * FROM posts";
    }
} else {
    // Nếu không có tham số 'category', lấy tất cả các bài viết
    $query = "SELECT * FROM posts";
}

$result = $conn->query($query);

// Kiểm tra kết quả trả về
if ($result->num_rows > 0) {
    // Lấy dữ liệu từ kết quả trả về
    while ($post = $result->fetch_assoc()) {
        echo '<div class="items-news">';
        echo '<div class="news-main">';
        echo '<img src="' . $post['article_photo'] . '" alt="' . $post['title'] . '">';
        echo '<div class="content-news-main">';
        echo '<a href="newDetail?post_id='. $post['post_id'].'"><h3 class="title-news-main">' . $post['title'] . '</h3></a>';
        echo '<span class="time-post"><i class="fa-solid fa-calendar-days"></i>' . $post['created_at'] . '</span>';
        echo '<span class="cmt-post"><i class="fa-solid fa-comments"></i>(0)Bình luận</span>';
        echo '<p class="descript">' . $post['description'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<hr>';
    }
} else {
    echo "Không có bài viết trong danh mục này.";
}

  
    ?>

            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>