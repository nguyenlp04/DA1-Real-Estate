<?php

class User
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn;
    }

    public function addUser()
    {
        $errors = [];
        $success = "block";
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $pass = $_POST["pass"];
        $cfpass = $_POST["cfpass"];
        $email = $_POST["email"];
        $roles = $_POST["roles"];
        $phone = $_POST["phone"];

        if (empty($username)) {
            $errors["username"] = "Tên người dùng không được để trống";
        } else {
            $sqlusername = "SELECT * FROM `users` WHERE username = '$username'";
            $result = $this->db->query($sqlusername);
        
            if ($result->num_rows > 0) {
                $errors["username"] = "Tên người dùng đã tồn tại";
            }
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Email không hợp lệ";
        }

        if (strlen($pass) < 6) {
            $errors["pass"] = "Mật khẩu phải chứa ít nhất 6 ký tự";
        }

        if ($pass !== $cfpass) {
            $errors["cfpass"] = "Xác nhận mật khẩu không chính xác";
        }

        if (empty($phone)) {
            $errors["phone"] = "Số điện thoại không được để trống";
        } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
            $errors["phone"] = "Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số.";
        }

        $avatar = $_FILES["avatar"];
        $fileName = $avatar["name"];
        if ($fileName != "") {
            $path = $username . basename($_FILES['avatar']['name']);
        } else {
            $path = "user.png";
        }
        $target_dir = dirname(__FILE__) . '/../../assets/images/imguser/';
        $target_file = $target_dir . $path;
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            $avatarPath = '/' . $path;
        } else {
            $avatarPath = '/user.png'; 
        }
        
        if (empty($errors)) {
            $sql = "INSERT INTO `users` (`username`,`full_name`,`password`,`email`,`avatar`,`roles`, `phone_number`) VALUES('$username','$fullname','$pass','$email','$avatarPath','$roles', $phone)";
            if ($this->db->query($sql) === TRUE) {
                return $success;
            } else {
                $errors["errors"] = $this->db->error;  
                return $errors; 
            }
        } else {
            return $errors; 
        }
    }
}
