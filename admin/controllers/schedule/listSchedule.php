<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/schedule.php');
?>
<div class="w-full">
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">

                        <div class="title-container flex items-center">
                            <p class="text-[#0957CB] font-semibold  text-2xl py-4">Tất Cả Lịch Trình Tham Quan</p>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Bất động sản</th>
                                    <th>Địa chỉ</th>
                                    <th style="width: 3rem;">Loại</th>
                                    <th style="width: 7rem;">Người bán</th>
                                    <th style="width: 7rem;">Người thăm quan</th>
                                    <th style="width: 3rem;">Trạng thái</th>
                                    <th style="width: 5rem;">Ngày tạo</th>

                                </tr>
                            </thead>
                            <tbody>
                                <style>

                                </style>
                                <?php
                        $stt = 1;
                        $database = new Database();
                        $Schedule = new Schedule($database);
                        $result = $Schedule->renderSchedule();
                        foreach ($result as $row) {
                            echo '<tr>
                                <td>'. $stt .'</td>
                                <td><a class="decoration-none" href="../propertyDetail?id='.$row['property_id'].'"> '. $row['property_title'] .'</a></td>
                                <td>'. $row['property_location'] .'$</td>
                                <td>'. $row['property_type'] .'</td>
                                <td>'. $row['seller_name'] .'</td>
                                <td>'. $row['customer_name'] .'</td>
                                <td><span  style="color: black; color: white;display:inline-block; border-radius: 0.375rem; padding: 5px; background-color: #e67e22">
                                '. $row['tour_status'] .'
                                </span>
                                </td>
                                <td>'. $row['tour_created_at'] .'</td>
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
$(document).ready(function() {
    // Kích hoạt modal
    $('.modal').modal();
    // Khởi tạo DataTable
    new DataTable('#example');
});
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});
</script>

<?php
include(__DIR__ . '/../../inc/footerDashboard.php');
?>