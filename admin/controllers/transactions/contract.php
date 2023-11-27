<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');

include(__DIR__ . '/../../models/contract.php');
$database = new Database();
$contract = new Transaction($database);
$contracts = $contract->listContract();

 
 ?>


<div class="w-full">

    <script>
    new DataTable('#example', {
        pagingType: 'full_numbers'
    });
    </script>
    <link rel="stylesheet" href="../../../vendor/dataTables/jquery.dataTables.min.css">

    <script src="../../../vendor/dataTables/jquery-3.7.0.js"></script>
    <script src="../../../vendor/dataTables/jquery.dataTables.min.js"></script>
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">
                        <p class="text-[#0957CB] font-semibold  text-2xl py-4">Danh Sách Hợp Đồng</p>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th> Loại hợp đồng </th>
                                    <th> Bên mua </th>
                                    <th>Bên Bán</th>

                                    <th>Ngày tạo</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <?php foreach ($contracts as $contract) : ?>
                            <tr>
                                <td><?php echo $contract['transaction_id']; ?></td>
                                <td><?php echo $contract['transaction_type']; ?></td>
                                <td><?php echo $contract['customer_fullname']; ?></td>
                                <td>

                                    <?php echo $contract['seller_fullname']; ?>

                                </td>
                                <td><?php echo $contract['transaction_date']; ?></td>
                                <td> <a
                                        href="contractDetail?transaction_id=<?php echo  $contract['transaction_id'];  ?>"><i
                                            class="fa-solid fa-file-contract"></i></a>
                                </td>

                            </tr>
                            <?php endforeach; ?>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include(__DIR__ . '/../../inc/footerDashboard.php'); 
 ?>