<?php
class Auth
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn;
    }

    public function signUp()
    {
        // global $addSuccess, $addFailure, $errors ;
        $addSuccess = false;
        $addFailure = false;
        $errors = [];
        if (isset($_POST['submit'])) {
            $fullname = $_POST["fullname"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $cfpassword = $_POST["cfpassword"];
            $email = $_POST["email"];
            $roles = "user";
            if (empty($username)) {
                $errors["username"] = "Tên người dùng không được để trống";
            } else {
                $sqlusername = "SELECT * FROM `users` WHERE username = '$username'";
                $result = $this->db->query($sqlusername);
                if ($result->num_rows > 0) {
                    $errors["username"] = "Tên người dùng đã tồn tại";
                }
            }
            if (empty($fullname)) {
                $errors["fullname"] = "Tên không được để trống";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "Email không hợp lệ";
            }

            if (strlen($password) < 6) {
                $errors["password"] = "Mật khẩu phải chứa ít nhất 6 ký tự";
            }

            if ($password !== $cfpassword) {
                $errors["cfpassword"] = "Xác nhận mật khẩu không chính xác";
            }
            if (empty($errors)) {
                $sql = "INSERT INTO `users` (`username`,`full_name`, `password`,`email`,`roles`) VALUES('$username','$fullname','$password','$email','$roles')";
                if ($this->db->query($sql) === TRUE) {
                    $addSuccess = true;
                    
                } else {
                    $errors["errors"] = $this->db->error;
                    $addFailure = true;
                    var_dump($errors);
                }
            } else {
                $addFailure = true;
                var_dump($errors);
            }
        }
    }
}
?>