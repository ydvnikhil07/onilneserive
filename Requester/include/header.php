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
 
    <title><?php echo TITLE ?></title>
</head>

<body>

    <!-- TOP navbar -->
    <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="profile.php">OSMS</a>
    </nav>

    <!-- Start container -->
    <div class="container-fluid" style="margin-top: 60px;">
        <div class="row"> <!-- start row -->

            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none"> <!-- side bar 1st column-->
                <div class="sidebar-sticky" style="background-color:#3cb371;">
                <div class="mb-3">
                    <a href="/index.php" class="btn btn-danger">Back to home</a>
                </div>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link <?php if(PAGE === 'RequesterProfile'){echo 'active';}  ?>" href="profile.php" style="color:red;"><i class="fas fa-user"></i> Profile</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE === 'RequesterSubmit'){echo 'active';}  ?>" href="submit.php"><i class="fab fa-accessible-icon"></i> Submit Request</a></li>
                        <li class="nav-item"><a class="nav-link  <?php if(PAGE === 'Status'){echo 'active';}  ?>" href="CheckStatus.php"><i class="fas fa-align-center"></i> Service Status</a></li>
                        <li class="nav-item"><a class="nav-link   <?php if(PAGE === 'Change password'){echo 'active';}  ?>" href="changepassword.php"><i class="fas fa-key"></i> Change Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </nav> <!-- end side bar 1st column -->

             
  