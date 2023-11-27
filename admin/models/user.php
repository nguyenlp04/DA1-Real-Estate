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
        $datebirth = $_POST["date_birth"];
        $address = $_POST["email"];
        $email = $_POST["email"];
        $roles = $_POST["roles"];
        $phone = $_POST["phone"];

        if (empty($username)) {
            $errors["username"] = "Tên người dùng không được để trống";
        } 

        if (empty($datebirth)) {
            $errors["date_birth"] = "Ngày sinh không được để trống";
        }

        if (empty($address)) {
            $errors["address"] = "Địa chỉ không được để trống";
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
            $sql = "INSERT INTO `users` (`username`,`full_name`,`birth_user`, `address_user`, `password`,`email`,`avatar`,`roles`, `phone_number`) VALUES('$username','$fullname','$datebirth','$address','$pass','$email','$avatarPath','$roles', '$phone')";
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

    public  function updateUser($userid)
    {
        $errors = [];
        $success = "block";
        $fullname = $_POST["fullname"];
        $datebirth = $_POST["date_birth"];
        $address = $_POST["email"];
        $email = $_POST["email"];
        $roles = $_POST["roles"];
        $phone = $_POST["phone"];
        if (empty($datebirth)) {
            $errors["date_birth"] = "Ngày sinh không được để trống";
        }

        if (empty($address)) {
            $errors["address"] = "Địa chỉ không được để trống";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Email không hợp lệ";
        }

        if (empty($phone)) {
            $errors["phone"] = "Số điện thoại không được để trống";
        } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
            $errors["phone"] = "Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số.";
        }

        $avatar = $_FILES["avatar"];
        $fileName = $avatar["name"];

        if ($fileName != "") {
            $path = $_SESSION['user_info']['username'] . basename($_FILES['avatar']['name']);
        } else {
            $query = "SELECT * FROM users WHERE user_id='$userid'";
            $resultShow = $this->db->query($query);
            $row = $resultShow->fetch_assoc();
            $path = $row['avatar'];
        }
        $target_dir = dirname(__FILE__) . '/../../assets/images/imguser/';
        $target_file = $target_dir . $path;
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            $avatarPath = '/' . $path;
        } else {
            $avatarPath =  $path;
        }
        if (empty($errors)) {
            $sql = "UPDATE `users` SET 
            `full_name` = '$fullname',
            `birth_user` = '$datebirth',
            `address_user` = '$address',
            `email` = '$email',
            `avatar` = '$avatarPath',
            `roles` = '$roles',
            `phone_number` = '$phone'
            WHERE `user_id` = $userid";
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

    public function getUserById($userid)
    {

        $query = "SELECT * FROM users WHERE user_id = $userid";

        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return null;
        }
    }



    public  function renderUser()
    {
        $query = "SELECT * FROM users";
        $result = $this->db->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $data[] = $item;
            }
        }
        return $data;
    }

    public  function deleteUser($iduser)
    {
        $sql = "SELECT * FROM users WHERE user_id ='$iduser'";
        $result = $this->db->query($sql);
        if ($result->num_rows == 1) {
            $delete = "DELETE FROM users WHERE user_id ='$iduser'";
            if ($this->db->query($delete) === TRUE) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                echo 113123;
            }
        }
        echo "Không tìm thấy dữ liệu";
        exit;
    }
}
class Profile {
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn;
    }
    public function updateProfile($fullname,$datebirth,$address,$email,$roles,$phone,$userid){
        
        $errors = [];
       
        if (empty($datebirth)) {
            $errors["birthuser"] = "Ngày sinh không được để trống";
        }

        if (empty($address)) {
            $errors["addressuser"] = "Địa chỉ không được để trống";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Email không hợp lệ";
        }

        if (empty($phone)) {
            $errors["phonenumber"] = "Số điện thoại không được để trống";
        } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
            $errors["phonenumber"] = "Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số.";
        }

     
        if (empty($errors)) {
            $sql = "UPDATE `users` SET 
            `full_name` = '$fullname',
            `birth_user` = '$datebirth',
            `address_user` = '$address',
            `email` = '$email',
            `roles` = '$roles',
            `phone_number` = '$phone'
            WHERE `user_id` = $userid";
            if ($this->db->query($sql) === TRUE) {
                return true;
            } else {
                $errors["errors"] = $this->db->error;
                return $errors;
            }
        } else {
            return $errors;
        }
    }   
}