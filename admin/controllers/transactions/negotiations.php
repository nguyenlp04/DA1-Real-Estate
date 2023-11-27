<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/contract.php');
// 
?>
<div class="w-full">
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">
                        <div class="title-container flex items-center">
                            <p class="text-[#0957CB] font-semibold  text-2xl py-4">Thương Lượng</p>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên BĐS</th>
                                    <th style="width: 3rem;">Loại</th>
                                    <th style="width: 7rem;">Người bán</th>
                                    <th style="width: 7rem;">Người mua</th>
                                    <th class="w-20">Giá</th>
                                    <th class="w-20">Giá Đề xuất</th>
                                    <th style="width: 6rem;">Trạng thái</th>
                                    <th style="width: 7rem;">Ngày tạo</thc>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stt = 1;
                                $database = new Database();
                                $Negotiation = new Transaction($database);
                                $result = $Negotiation->renderNegotiations();
                                foreach ($result as $row) {
                                    $statusColor = ($row['status'] === 'Chấp nhận') ? '#e67e22' : (($row['status'] === 'Đang thương lượng') ? '#0984e3' : '#e74c3c');
                                    echo '<tr>
                                    <td>' . $stt . '</td>
                                    <td><a style="color:rgb(13, 110, 253)" href="../propertyDetail?id=' . $row['property_id'] . '">' . $row['property_title'] . '</a></td>
                                    <td>' . $row['type'] . '</td>
                                    <td>' . $row['seller_name'] . '</td>
                                    <td>' . $row['buyer_name'] . '</td>
                                    <td>' . $row['price'] . '$</td>
                                    <td>' . $row['price_offered'] . '$</td>
                                    <td><span style="color: black; text-transform: none;color: white;display:inline-block; border-radius: 0.375rem; padding: 5px; background-color: ' . $statusColor . '">' . $row['status'] . '
                                    <i class="fa-solid fs-5 fa-pen-to-square overlay mr-2 " style="color: blue;" data-toggle="modal" data-target="#propertyModal' . $row['negotiation_id'] . '"></i></span></td>
                                    <td>' . $row['created_at'] . '</td>
                                </tr>
                                <div class="modal" id="propertyModal' . $row['negotiation_id'] . '">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Chỉnh sửa trạng thái</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                            <form id="editForm" method="post" action="updateQuery">
                                            <label for="newStatus">Chọn trạng thái mới:</label>
                                                    <select id="newStatus" name="newStatus" class="form-control">
                                                        <option value="Chấp nhận">Chấp nhận</option>
                                                        <option value="Từ chối">Từ chối</option>
                                                    </select>
                                                    <input type="hidden" id="negotiationId" name="negotiationId" value="' . $row['negotiation_id'] . '">
                                                    <button name="submit" type="submit" class="btn mt-3" style="background-color: #0e6efd; color: white">Lưu</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                    $stt++;
                                }
                                ?>
                                <tbody>
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