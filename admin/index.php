 <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  include(__DIR__ . '/../admin/models/statistical.php');
  include('inc/sideBar.php');
  include('inc/navBar.php');
  $database = new Database();
  $statistical = new statistical($database);
  $totalRevenue = $statistical->totalRevenue();
  $totalTransactions = $statistical->totalTransactions();
  $totalProperties = $statistical->totalProperties();
  $totalUsers = $statistical->totalUsers();
  $topSellers = $statistical->topSellers();
  $RecentSixMonthsRevenue = $statistical->RecentSixMonthsRevenue();
  $jsonData = json_encode($RecentSixMonthsRevenue);
  $recentMonths = [];
  for ($i = 5; $i >= 0; $i--) {
      $month = date('Y-m', strtotime("-$i months"));
      $recentMonths[] = $month;
  }
  // Chuyển dữ liệu JSON vào biến JavaScript
  echo "<script>var chartData = $jsonData;
  var totalPaymentArray = [];
  for (var i = 0; i < chartData.length; i++) {
    totalPaymentArray.push(chartData[i].total_payment);
  }
  console.log(totalPaymentArray);

  var recentMonths = " . json_encode($recentMonths) . "; console.log(recentMonths)
  </script>";
 
  
  ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tạo báo cáo</a>
   </div>

   <!-- Content Row -->
   <div class="row">
     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-primary shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                 Tổng doanh thu
               </div>
               <div class="h5 mb-0 font-weight-bold text-gray-800">
                 $<?php echo number_format($totalRevenue, 2); ?>
               </div>
             </div>
             <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                 Tổng giao dịch
               </div>
               <div class="h5 mb-0 font-weight-bold text-gray-800">
                 <?php echo $totalTransactions ?>
               </div>
             </div>
             <div class="col-auto">
               <i class="fa-solid fa-handshake fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-info shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                 Bất động sản,
               </div>
               <div class="h5 mb-0 font-weight-bold text-gray-800">
                 <?php echo $totalProperties ?>
               </div>
             </div>
             <div class="col-auto">
               <i class="fa-solid fa-city fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Pending Requests Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-warning shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                 Người dùng
               </div>
               <div class="h5 mb-0 font-weight-bold text-gray-800">
                 <?php echo $totalUsers ?>
               </div>
             </div>
             <div class="col-auto">
               <i class="fa-solid fa-user fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

   <!-- Content Row -->

   <div class="row">
     <!-- Area Chart -->
     <div class="col-xl-8 col-lg-7">
       <div class="card shadow mb-4">
         <!-- Card Header - Dropdown -->
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
           <h6 class="m-0 font-weight-bold text-primary">
             Tổng quan về thu nhập
           </h6>
         </div>
         <!-- Card Body -->
         <div class="card-body">
           <div class="chart-area">
             <canvas id="myAreaChart"></canvas>
           </div>
         </div>
       </div>
     </div>

     <!-- Pie Chart -->
     <div class="col-xl-4 col-lg-5">
       <div class="card shadow mb-4">
         <!-- Card Header - Dropdown -->
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
           <h6 class="m-0 font-weight-bold text-primary">
             Doanh Thu Tốt Nhất Tháng
           </h6>
         </div>
         <!-- Card Body -->
         <div class="card-body">
           <table style="width: 100% !important; min-width: unset">
             <thead>
               <tr class="bg-blue-600 text-left text-xs font-semibold uppercase tracking-widest text-white">
                 <th class="px-2 py-3" style="width: 10%;">STT</th>
                 <th class="px-2 py-3" style="width: 60%;">Họ và tên</th>
                 <th class="px-2 py-3" style="width: 30%;">Doanh thu</th>
               </tr>
             </thead>
             <tbody class="text-gray-500">
               <?php
                $stt = 1;
                foreach ($topSellers as $row) {
                  echo '<tr>
					<td class="p-0 py-1 px-2">
						<p class="whitespace-no-wrap">' . $stt . '</p>
					</td>
					<td class="p-0 py-1 px-2">
						<div class="flex items-center">
							<div class="h-10 w-10 flex-shrink-0">
								<img style="width: 3rem; height:3rem" class="rounded-full mr-2" src="../assets/images/imguser' . $row['avatar'] . '" alt="" />
							</div>
							<div class="">
								<p class="whitespace-no-wrap">' . $row['full_name'] . '</p>
							</div>
						</div>
					</td>
					<td class="p-0 py-1 px-2">
						<p class="whitespace-no-wrap">' . number_format($row['totalRevenue'], 2) . '$</p>
					</td>
				</tr>';
                  $stt++;
                }
                ?>
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- /.container-fluid -->

 <script>
   document.addEventListener("DOMContentLoaded", function() {
         var ctx = document.getElementById("myAreaChart");
         var myLineChart = new Chart(ctx, {
           type: 'line',
           data: {
             labels: recentMonths,
             datasets: [{
               label: "Tổng",
               lineTension: 0.3,
               backgroundColor: "rgba(78, 115, 223, 0.05)",
               borderColor: "rgba(78, 115, 223, 1)",
               pointRadius: 3,
               pointBackgroundColor: "rgba(78, 115, 223, 1)",
               pointBorderColor: "rgba(78, 115, 223, 1)",
               pointHoverRadius: 3,
               pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
               pointHoverBorderColor: "rgba(78, 115, 223, 1)",
               pointHitRadius: 10,
               pointBorderWidth: 2,
               data: totalPaymentArray,
             }],
           },
           options: {
             maintainAspectRatio: false,
             layout: {
               padding: {
                 left: 10,
                 right: 25,
                 top: 25,
                 bottom: 0
               }
             },
             scales: {
               xAxes: [{
                 time: {
                   unit: 'date'
                 },
                 gridLines: {
                   display: false,
                   drawBorder: false
                 },
                 ticks: {
                   maxTicksLimit: 7
                 }
               }],
               yAxes: [{
                 ticks: {
                   maxTicksLimit: 5,
                   padding: 10,
                   // Include a dollar sign in the ticks
                   callback: function(value, index, values) {
                     return '$' + number_format(value);
                   }
                 },
                 gridLines: {
                   color: "rgb(234, 236, 244)",
                   zeroLineColor: "rgb(234, 236, 244)",
                   drawBorder: false,
                   borderDash: [2],
                   zeroLineBorderDash: [2]
                 }
               }],
             },
             legend: {
               display: false
             },
             tooltips: {
               backgroundColor: "rgb(255,255,255)",
               bodyFontColor: "#858796",
               titleMarginBottom: 10,
               titleFontColor: '#6e707e',
               titleFontSize: 14,
               borderColor: '#dddfeb',
               borderWidth: 1,
               xPadding: 15,
               yPadding: 15,
               displayColors: false,
               intersect: false,
               mode: 'index',
               caretPadding: 10,
               callbacks: {
                 label: function(tooltipItem, chart) {
                   var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                   return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                 }
               }
             }
           }
         })
       })
 </script>

 <?php include 'inc/footerDashboard.php';  ?>