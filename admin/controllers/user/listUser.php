<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/user.php');
// 
?>
<div class="w-full">
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">

                        <div class="title-container flex items-center">
                            <p class="text-[#0957CB] font-semibold  text-2xl py-4">Tất Cả Người Dùng</p>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Username</th>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th style="width: 4rem;">Vai trò</th>
                                    <th style="width: 4rem;">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $stt = 1;
                        $database = new Database();
                        $User = new User($database);
                        $result = $User->renderUser();
                        foreach ($result as $row) {
                            echo '<tr>
                                <td>'. $stt .'</td>
                                <td class="flex items-center"> <img style="width: 42px; height:42px" class="rounded-full mr-2" src="./../assets/images/imguser/' . $row['avatar'] . '"> ' . $row['username'] . '</td>
                                <td>'. $row['full_name'] .'</td>
                                <td style="text-transform: none;">'. $row['email'] .'</td>
                                <td>'. $row['phone_number'] .'</td>
                                <td>'. $row['roles'] .'</td>
                                <td>
                                    <a href="updateUser?user_id=' . $row['user_id'] . '">
                                        <i class="fa-solid fs-5 fa-pen-to-square text-primary mr-3"></i>
                                    </a>
                                    <a href="deleteUser?user_id=' . $row['user_id'] . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa bình luận này không?\')">
                                        <i class="fa-solid fs-5 fa-trash-can text-danger"></i>
                                    </a>
                                </td>
                            </tr>';
                            $stt++;
                        }
                        
                                ?>
                            </tbody>
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
