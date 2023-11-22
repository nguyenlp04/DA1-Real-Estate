<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../admin/models/contract.php');
include 'inc/header.php'
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<section>
    <div class="container">
        <div class="path-page"><a href="home">Trang chủ </a><i class="fa-solid fa-angle-right"></i>
            <p>Sản Phẩm</p>
        </div>
        <div class="container d-block  ">
            <div class="row ">
                <div class="col-12">
                    <ul class="nav nav-pills rounded-2 d-flex justify-content-center">
                        <li class="nav-item "><a href="#tab2-1" class="nav-link  " data-toggle='tab'>Thông tin</a></li>
                        <li class="nav-item"><a href="#tab2-2" class="nav-link active" data-toggle='tab'>Mật khẩu</a></li>
                        <li class="nav-item"><a href="#tab2-3" class="nav-link" data-toggle='tab'>Đang cập nhật</a></li>
                        <li class="nav-item"><a href="#tab2-4" class="nav-link" data-toggle='tab'>Đang cập nhật</a></li>
                        <li class="nav-item"><a href="#tab2-5" class="nav-link" data-toggle='tab'>Đang cập nhật</a></li>
                        <li class="nav-item"><a href="#tab2-6" class="nav-link" data-toggle='tab'>Đang cập nhật</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- tab 1 -->
                        <div class="tab-pane  mt-5 fade show active" id='tab2-1'>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                    <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên BĐS</th>
                                    <th>Người bán</th>
                                    <th>Người mua</th>
                                    <th>Giá</th>
                                    <th>Giá Đề xuất</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stt = 1;
                                $database = new Database();
                                $Negotiation = new Transaction($database);
                                $id = $_SESSION['user_info']['user_id'];
                                $result = $Negotiation->renderNegotiationsByUser($id);
                                foreach ($result as $row) {
                                    $statusColor = ($row['status'] === 'Chấp nhận') ? '#e67e22' : (($row['status'] === 'Đang thương lượng') ? '#0984e3' : '#e74c3c');
                                    echo '<tr>
                                    <td>' . $stt . '</td>
                                    <td><a href="../propertyDetail?id=' . $row['property_id'] . '">' . $row['property_title'] . '</a></td>
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

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end tab 1 -->
                        <!-- tab 2 -->
                        <div class="tab-pane  mt-5 fade show " id='tab2-2'>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        123
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end tab 2 -->
                        <!-- tab 3  -->
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-3'>
                            <span>Đang cập nhật</span>
                        </div>
                        <!-- end tab 3 -->
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-3'><span>Đang cập nhật</span></div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-4'><span>Đang cập nhật</span></div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-5'><span>Đang cập nhật</span></div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-6'><span>Đang cập nhật</span></div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            new DataTable('#example');
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </div>
</section>
<?php include 'inc/footer.php' ?>