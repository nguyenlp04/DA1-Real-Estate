<?php

class Post
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn;
    }
    public function addPost()
    {
        $errors = [];
        $success = "block";

        $userid = "1";   // $_SESSION['user_id']; // lấy id của nv đang thực hiện
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form post
            $title = $_POST["title"];
            $category = $_POST["category"];
            $description = $_POST["description"];
            $content = $_POST["content"];

            if (empty($title)) {
                $errors["title"] = "Tiêu đề không được để trống";
            }
            // xử lí tải ảnh đại diện bài viết
            $articlephoto = null;
            if (isset($_FILES['article_photo']) && $_FILES['article_photo']['error'] === UPLOAD_ERR_OK) {
                $articlephoto_tmp = $_FILES['article_photo']['tmp_name'];
                $articlephoto = "./assets/images/imgpost/" . $_FILES['article_photo']['name'];
                move_uploaded_file($articlephoto_tmp, $articlephoto);
            }


            if (empty($errors)) {
                // thực hiện truy vấn thêm bài viết vào cơ sở dữ liệu
                $sql = "INSERT INTO posts (user_id ,title, category, description,content,article_photo) VALUES ('$userid', '$title', '$category', '$description','$content','$articlephoto')";

                if ($this->db->query($sql) === TRUE) {
                    return $success;
                } else {
                    return $errors;
                }
            } else {
                return $errors;
            }
        }
    }

    public function listPost()
    {
        $sql = "SELECT * FROM posts";
        $result = $this->db->query($sql);
        $posts = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $posts[] = $row;
            }
        }

        return $posts;
    }

    public function renderThreePost(){
        $sql = "SELECT * FROM posts LIMIT 3";
        $result = $this->db->query($sql);
        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function updatePost($postid, $title, $content, $description, $category, $articlephoto)
    {

        // kiểm tra xem các biến có rỗng không
        if (empty($title) || empty($category) || empty($description) || empty($content)) {
            return false;
        } // kiểm tra xem post có up ảnh mới hay không 
        if (isset($_FILES['article_photo']) && $_FILES['article_photo']['error'] === UPLOAD_ERR_OK) {
            $articlephoto_tmp = $_FILES['article_photo']['tmp_name'];
            $articlephoto = "./assets/images/imgpost/" . $_FILES['article_photo']['name'];
            move_uploaded_file($articlephoto_tmp, $articlephoto);
        } else {

            $existingPost = $this->getPostById($postid);
            $articlephoto = $existingPost['article_photo'];
        }

        $sql = "UPDATE posts SET title = '$title', content = '$content', description = '$description', category = '$category', article_photo = '$articlephoto' WHERE post_id = $postid";

        if ($this->db->query($sql)) {
            return true; // Trả về true nếu cập nhật thành công
        } else {
            return false; // Trả về false nếu có lỗi khi cập nhật
        }
    }

    public function getPostById($postid)
    {

        $query = "SELECT posts.*, 
        author_user.full_name AS author
        FROM posts 
        INNER JOIN 
        users AS author_user ON posts.user_id = author_user.user_id
        WHERE post_id = $postid";

        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return null;
        }
    }

    public function deletePost($postid)
    {


        $query = "DELETE FROM posts WHERE post_id = $postid";

        if ($this->db->query($query)) {
            return true; // Trả về true nếu xóa thành công
        } else {
            return false; // Trả về false nếu có lỗi khi xóa
        }
    }
    // phần view 
    public function renderCategoryPost(){
        $query = "SELECT DISTINCT category FROM posts";
        $result = $this->db->query($query);
    
        $categories = [];
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row['category'];
            }
            return $categories;
        } else {
            return null;
        }
    }

    public function getLatestPosts($limit = 4) {
        $query = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $limit";
        $result = $this->db->query($query);

        $latestPosts = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $latestPosts[] = $row;
            }
        }

        return $latestPosts;
    }

    public function getOneLatestPosts($limit = 1) {
        $query = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $limit";
        $result = $this->db->query($query);

        $latestPosts = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $latestPosts[] = $row;
            }
        }

        return $latestPosts;
    }
}