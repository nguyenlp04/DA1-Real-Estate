<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SB Admin 2 - Dashboard</title>
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/Chart.min.js"></script>

    <link rel="stylesheet" href="../vendor/dataTables/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/dataTables/dataTables.bootstrap5.min.css">



    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="../vendor/dataTables/jquery.dataTables.min.js"></script>
    <script src="../vendor/dataTables/dataTables.bootstrap5.min.js"></script>
    


    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/css/add-post.css" rel="stylesheet">
    <link href="../assets/css/upload-property.css" rel="stylesheet">



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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaction"
                    aria-expanded="true" aria-controls="collapseTransaction">
                    <i class="fa-solid fa-handshake"></i>
                    <span>Giao dịch</span>
                </a>
                <div id="collapseTransaction" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tùy chọn giao dịch :</h6>
                        <a class="collapse-item" href="contract"> Hợp đồng </a>
                        <a class="collapse-item" href="negotiations">Thương lượng</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Bài viết</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tùy chọn bài viết :</h6>
                        <a class="collapse-item" href="post">Bài viết</a>
                        <a class="collapse-item" href="addPost">Thêm bài viết</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseuser"
                    aria-expanded="true" aria-controls="collapseuser">
                    <i class="fa-solid fa-user"></i>
                    <span>Người dùng</span>
                </a>
                <div id="collapseuser" class="collapse" aria-labelledby="headinguser" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tùy chọn người dùng :</h6>
                        <a class="collapse-item" href="user">Người dùng</a>
                        <a class="collapse-item" href="addUser">Thêm người dùng </a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="setting"><i class="fas fa-fw fa-wrench"></i> <span>Cài đặt</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
        </ul>