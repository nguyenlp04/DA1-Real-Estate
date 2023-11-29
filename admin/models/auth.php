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

    public function forgotPassword()
    {
        $emailError = '<span class="text-danger">Email không tồn tại</span>';
        if (isset($_POST['submit'])) {
            $emailForgot = $_POST["emailForgot"];
            $query = "SELECT * FROM users WHERE email = '$emailForgot'";
            $resultGetEmail = $this->db->query($query);

            if ($resultGetEmail && $resultGetEmail->num_rows > 0) {
                $row = $resultGetEmail->fetch_assoc();
                $_SESSION['emailChangePass'] = $emailForgot;
                $random = strval(rand(1000, 9999));
                $_SESSION['codeForgotPass'] = $random;
                $fullname = $row['full_name'];
                $session_expiration = 180;

                if (isset($_SESSION['codeForgotPass']) && (time() - $_SESSION['codeForgotPass'] > $session_expiration)) {
                    unset($_SESSION['user']);
                }

                $baseURL = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
                $baseURL .= "://" . $_SERVER['HTTP_HOST'];
                $baseURL .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

                $resetLink = $baseURL . "auth/changePass.php?code=$random";

                $subject = "$random là mã khôi phục tài khoản của bạn";
                $message = '<div style="width: 500px">
                    <span class="m_2518355874397658137mb_text" style="font-family: Helvetica Neue, Helvetica, Lucida Grande, tahoma, verdana, arial, sans-serif; font-size: 16px; line-height: 21px; color: #141823;">
                        <span style="font-size: 15px">
                            <p></p>
                            <div style="margin-top: 16px; margin-bottom: 20px">
                                Xin chào ' . $fullname . ',
                            </div>
                            <div>
                                Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn.
                            </div>
                            Nhập mã đặt lại mật khẩu sau đây:
                            <p></p>
                            <table border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; width: max-content; margin-top: 20px; margin-bottom: 20px;">
                                <tbody>
                                    <tr>
                                        <td style="font-size: 11px; font-family: LucidaGrande, tahoma, verdana, arial, sans-serif; padding: 14px 32px 14px 32px; background-color: #f2f2f2; border-left: 1px solid #ccc; border-right: 1px solid #ccc; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; text-align: center; border-radius: 7px; display: block; border: 1px solid #1877f2; background: #e7f3ff;">
                                            <span class="m_2518355874397658137mb_text" style="font-family: Helvetica Neue, Helvetica, Lucida Grande, tahoma, verdana, arial, sans-serif; font-size: 16px; line-height: 21px; color: #141823;">
                                                <span style="font-size: 17px; font-family: Roboto; font-weight: 700; margin-left: 0px; margin-right: 0px;">' . $random . '</span>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            Ngoài ra, bạn có thể thay đổi trực tiếp mật khẩu của mình.
                            <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                <tbody>
                                    <tr>
                                        <td height="20" style="line-height: 20px">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="middle">
                                            <tbody>
                                                <tr>
                                                    <td style="border-collapse: collapse; border-radius: 6px; text-align: center; display: block; background: #1877f2; padding: 8px 20px 8px 20px;">
                                                        <a href="' . $resetLink . '" style="color: #1b74e4; text-decoration: none; display: block;" target="_blank">
                                                            <center>
                                                                <font size="3">
                                                                    <span style="font-family: Helvetica Neue, Helvetica, Lucida Grande, tahoma, verdana, arial, sans-serif; white-space: nowrap; font-weight: bold; vertical-align: middle; color: #ffffff; font-weight: 500; font-family: Roboto-Medium, Roboto, -apple-system, BlinkMacSystemFont, Helvetica Neue, Helvetica, Lucida Grande, tahoma, verdana, arial, sans-serif; font-size: 17px;">
                                                                        Đổi&nbsp;mật&nbsp;khẩu
                                                                    </span>
                                                                </font>
                                                            </center>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="8" style="line-height: 8px">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="20" style="line-height: 20px">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br />
                            <div>
                                <span style="color: #333333; font-weight: bold;">Bạn đã không yêu cầu thay đổi này?</span>
                            </div>
                            Nếu bạn không yêu cầu mật khẩu mới,
                            <a href="' . $baseURL . '" style="color: #0a7cff; text-decoration: none" target="_blank">hãy cho chúng tôi biết</a>.
                        </span>
                        <div>
                            <div></div>
                            <div></div>
                        </div>
                    </span>
                </div>';

                header('Location: recoverCode');
                send_email($emailForgot, $subject, $message, $fullname);
                return true;
            } else {
                return $emailError;
            }
        }
    }

    public function recoverCode()
    {
        $codeError = '<span class="text-danger">Mã không hợp lệ</span>';

        if (isset($_POST['submit'])) {
            $codeRecover = $_POST['codeRecover'];
            $code = $_SESSION['codeForgotPass'];
            if ($codeRecover == $code) {
                header('Location: changePass');
                return true;
            } else {
                return $codeError;
            }
        }
    }

    public function changePass()
    {
        if (isset($_POST['submit'])) {
            $passNew = $_POST['passNew'];
            $emailChangePass = $_SESSION['emailChangePass'];
            $sql = "UPDATE users SET password = '$passNew' WHERE email='$emailChangePass'";
            $old = $this->db->query($sql);
            header("Location: ./index.php");
        }
    }

    public function updatePassword($currentPassword, $newPassword, $confirmPassword, $userid)
    {

        $errors = [];
        // Kiểm tra mật khẩu hiện tại
        $sqlCheckPassword = "SELECT password FROM users WHERE user_id = '$userid'";
        $result = $this->db->query($sqlCheckPassword);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];

            // Kiểm tra mật khẩu hiện tại có khớp không
            if ($storedPassword  != $currentPassword) {
                $errors['current_password'] = "Mật khẩu hiện tại không đúng";
            }
        } else {
            $errors['current_password'] = "Không thể kiểm tra mật khẩu hiện tại";
        }
        // Kiểm tra mật khẩu mới và xác nhận mật khẩu
        if (strlen($newPassword) < 6) {
            $errors['new_password'] = "Mật khẩu mới phải chứa ít nhất 6 ký tự";
        }

        if ($newPassword !== $confirmPassword) {
            $errors['confirm_password'] = "Xác nhận mật khẩu không chính xác";
        }

        // Nếu không có lỗi, thực hiện cập nhật mật khẩu
        if (empty($errors)) {
            $sqlUpdatePassword = "UPDATE users SET password = '$newPassword' WHERE user_id = '$userid'";

            if ($this->db->query($sqlUpdatePassword)) {
                return true; // Cập nhật mật khẩu thành công
            } else {
                $errors['update_password'] = "Không thể cập nhật mật khẩu";
            }
        }

        return $errors; // Trả về mảng lỗi nếu có lỗi

    }
}