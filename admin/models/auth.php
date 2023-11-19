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
        $addSuccess = 'block';
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
            } else {
                $sqlemail = "SELECT * FROM `users` WHERE email = '$email'";
                $result = $this->db->query($sqlemail);
                if ($result->num_rows > 0) {
                    $errors["email"] = "Email đã tồn tại";
                }
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
                    return $addSuccess;
                } else {
                    $errors["errors"] = $this->db->error;
                    return $errors;
                }
            } else {
                return $errors;
            }
        }
    }
    public function login()
    {
        $addFailure = 'block';
        if (isset($_POST['submit'])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $sqlPass = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = $this->db->query($sqlPass);
            if ($result->num_rows > 0) {
                // Fetch user data and store it in the $infoUser array
                $userInfo = $result->fetch_assoc();
        
                $infoUser['user_id'] = $userInfo['user_id'];
                $infoUser['username'] = $userInfo['username'];
                $infoUser['password'] = $userInfo['password'];
                $infoUser['email'] = $userInfo['email'];
                $infoUser['full_name'] = $userInfo['full_name'];
                $infoUser['address_user'] = $userInfo['address_user'];
                $infoUser['birth_user'] = $userInfo['birth_user'];
                $infoUser['roles'] = $userInfo['roles'];
                $infoUser['phone_number'] = $userInfo['phone_number'];
                $infoUser['avatar'] = $userInfo['avatar'];
                $_SESSION['user_info'] = $infoUser;

        
            } else {
                return $addFailure;
            }
        }
    }
}
