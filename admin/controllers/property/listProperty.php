<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/property.php');
include(__DIR__ . '/../../../config/config.php');
?>
<div class="w-full">
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">

                        <div class="title-container flex items-center">
                            <p class="text-[#0957CB] font-semibold  text-2xl py-4">Tất Cả Bất Động Sản</p>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Địa chỉ</th>
                                    <th class="roles">Người đăng</th>
                                    <th class="roles">Trạng thái</th>
                                    <th class="roles">Lượt xem</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $stt = 1;
                        $database = new Database();
                        $User = new Property($database);
                        $result = $User->renderProperpty();
                        foreach ($result as $row) {
                            echo '<tr>
                                <td>'. $stt .'</td>
                                <td><a class="decoration-none" href="propertyDetail?id='.$row['property_id'].'"> '. $row['title'] .'</a></td>
                                <td>'. $row['price'] .' $</td>
                                <td>'. $row['location'] .'</td>
                                <td>'. $row['full_name'] .'</td>
                                <td><span  style="text-transform: none;color: white;display:inline-block; border-radius: 0.375rem; padding: 5px; background-color: '. ($row['status'] === 'Đã duyệt' ? '#e67e22' : '#d35400; color: black') .'">
            '. $row['status'] .'
        </span></td>
                                <td>'. $row['views'] .'</td>
                                <td>
                                    <a href="updateProperty?property_id=' . $row['property_id'] . '">
                                        <i class="fa-solid fs-5 fa-pen-to-square text-primary mr-3"></i>
                                    </a>
                                    <a href="deleteProperty?property_id=' . $row['property_id'] . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa bất động sản này không?\')">
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



<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>

<?php
include(__DIR__ . '/../../inc/footerDashboard.php');
?>
