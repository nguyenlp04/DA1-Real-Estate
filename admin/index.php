 <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  include('../routes/routes.php');
  ?>

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <meta name="author" content="" />

   <title>SB Admin 2 - Dashboard</title>
   <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>

   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/Chart.min.js"></script>

   <!-- Custom styles for this template-->
   <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet" />

 </head>

 <body id="page-top">
   <!-- Page Wrapper -->
   <div id="wrapper">
     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
         <div class="sidebar-brand-icon rotate-n-15">
           <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0" />

       <!-- Nav Item - Dashboard -->
       <li class="nav-item active">
         <a class="nav-link" href="dashboard">
           <i class="fas fa-fw fa-tachometer-alt"></i>
           <span>Dashboard</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider" />

       <!-- Heading -->
       <div class="sidebar-heading">Interface</div>

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
           <i class="fa-solid fa-city"></i>
           <span> Bất động sản</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Tùy chọn bất động sản :</h6>
             <a class="collapse-item" href="listProperty">Bất động sản</a>
             <a class="collapse-item" href="addProperty">Thêm bất động sản</a>
             <a class="collapse-item" href="addTags">Thêm tags</a>
           </div>
         </div>
       </li>
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaction" aria-expanded="true" aria-controls="collapseTransaction">
           <i class="fa-solid fa-handshake"></i>
           <span>Giao dịch</span>
         </a>
         <div id="collapseTransaction" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Tùy chọn giao dịch :</h6>
             <a class="collapse-item" href="contract"> Hợp đồng </a>
             <a class="collapse-item" href="negotiations">Thương lượng</a>
           </div>
         </div>
       </li>

       <!-- Nav Item - Utilities Collapse Menu -->
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
           <i class="fa-solid fa-pen-to-square"></i>
           <span>Bài viết</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Tùy chọn bài viết :</h6>
             <a class="collapse-item" href="post">Bài viết</a>
             <a class="collapse-item" href="addPost">Thêm bài viết</a>
           </div>
         </div>
       </li>

       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseuser" aria-expanded="true" aria-controls="collapseuser">
           <i class="fa-solid fa-user"></i>
           <span>Người dùng</span>
         </a>
         <div id="collapseuser" class="collapse" aria-labelledby="headinguser" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Tùy chọn người dùng :</h6>
             <a class="collapse-item" href="user">Tất cả người dùng</a>
             <a class="collapse-item" href="addUser">Thêm người dùng </a>
           </div>
         </div>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="setting"><i class="fas fa-fw fa-wrench"></i> <span>Cài đặt</span></a>
       </li>

       <!-- Divider -->

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>

       <!-- Sidebar Message -->
     </ul>

     <?php include 'inc/navBar.php';  ?>





 <!-- Begin Page Content -->
 <div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
       Report</a>
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
                 Earnings (Monthly)
               </div>
               <div class="h5 mb-0 font-weight-bold text-gray-800">
                 $40,000
               </div>
             </div>
             <div class="col-auto">
               <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                 Earnings (Annual)
               </div>
               <div class="h5 mb-0 font-weight-bold text-gray-800">
                 $215,000
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
       <div class="card border-left-info shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                 Tasks
               </div>
               <div class="row no-gutters align-items-center">
                 <div class="col-auto">
                   <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                     50%
                   </div>
                 </div>
                 <div class="col">
                   <div class="progress progress-sm mr-2">
                     <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-auto">
               <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                 Pending Requests
               </div>
               <div class="h5 mb-0 font-weight-bold text-gray-800">
                 18
               </div>
             </div>
             <div class="col-auto">
               <i class="fas fa-comments fa-2x text-gray-300"></i>
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
             Earnings Overview
           </h6>
           <div class="dropdown no-arrow">
             <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
             </a>
             <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
               <div class="dropdown-header">Dropdown Header:</div>
               <a class="dropdown-item" href="#">Action</a>
               <a class="dropdown-item" href="#">Another action</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#">Something else here</a>
             </div>
           </div>
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
             Revenue Sources
           </h6>
           <div class="dropdown no-arrow">
             <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
             </a>
             <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
               <div class="dropdown-header">Dropdown Header:</div>
               <a class="dropdown-item" href="#">Action</a>
               <a class="dropdown-item" href="#">Another action</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#">Something else here</a>
             </div>
           </div>
         </div>
         <!-- Card Body -->
         <div class="card-body">
           <div class="chart-pie pt-4 pb-2">
             <canvas id="myPieChart"></canvas>
           </div>
           <div class="mt-4 text-center small">
             <span class="mr-2">
               <i class="fas fa-circle text-primary"></i> Direct
             </span>
             <span class="mr-2">
               <i class="fas fa-circle text-success"></i> Social
             </span>
             <span class="mr-2">
               <i class="fas fa-circle text-info"></i> Referral
             </span>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- /.container-fluid -->
  

 
 <?php include 'inc/footerDashboard.php';  ?>