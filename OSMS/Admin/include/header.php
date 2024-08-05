<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <!-- Custom CSS (Keep this local if you have custom styles) -->
    <link rel="stylesheet" href="../CSS/custom.css">
    <title><?php  echo TITLE ?></title>
</head>

<body>

    <!-- TOP navbar -->
    <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">OSMS</a>
    </nav>

    <!-- Start container -->
    <div class="container-fluid" style="margin-top: 60px;">
        <div class="row"> <!-- start row -->

            <nav class="col-sm-2 bg-light sidebar py-5"> <!-- side bar 1st column-->
                <div class="sidebar-sticky d-print-none" style="background-color:#3cb371;">
                <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link <?php if(PAGE === 'dashboard'){echo 'active';}  ?>" href="dashboard.php" style="color:red;"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE === 'work'){echo 'active';}  ?>" href="work.php"><i class="fab fa-accessible-icon"></i>Work Order</a></li>
                        <li class="nav-item"><a class="nav-link  <?php if(PAGE === 'request'){echo 'active';}  ?>" href="request.php"><i class="fas fa-align-center"></i>Request</a></li>
                        <li class="nav-item"><a class="nav-link   <?php if(PAGE === 'assets'){echo 'active';}  ?>" href="assets.php"><i class="fas fa-key"></i>Assets</a></li>
                        <li class="nav-item"><a class="nav-link   <?php if(PAGE === 'technician'){echo 'active';}  ?>" href="Technician.php"><i class="fas fa-solid fa-wrench"></i>Technician</a></li>
                        <li class="nav-item"><a class="nav-link   <?php if(PAGE === 'requester'){echo 'active';}  ?>" href="requester.php"><i class="fas fa-users"></i>Requester</a></li>
                        <li class="nav-item"><a class="nav-link   <?php if(PAGE === 'sellreport'){echo 'active';}  ?>" href="soldproductreport.php"><i class="fas fa-table"></i>Sell Report</a></li>
                        <li class="nav-item"><a class="nav-link   <?php if(PAGE === 'workreport'){echo 'active';}  ?>" href="workreport.php"><i class="fas fa-table"></i>Work Report</a></li>
                        <li class="nav-item"><a class="nav-link   <?php if(PAGE === 'Changepass'){echo 'active';}  ?>" href="changepass.php"><i class="fas fa-key"></i> Change Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </nav> <!-- end side bar 1st column -->