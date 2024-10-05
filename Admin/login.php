<?php
include('../dbcon.php');
session_start();

if (!isset($_SESSION['is_adminlogin'])) {
    if (isset($_POST['submit'])) {
        $aemail = $_POST['aemail'];
        $apassword = $_POST['apassword'];

        $sql = "SELECT a_email FROM admin WHERE a_email='$aemail' AND a_password='$apassword' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['is_adminlogin'] = true;
            $_SESSION['aemail'] = $aemail;
            // $_SESSION['aname'] = $row['a_name'];
            echo "<script> location.href='dashboard.php';</script>";

            exit;
        } else {
            $msg = '<div class="alert alert-warning mt-2">Enter valid Email and Password</div>';
        }
    }
} else {
    echo "<script> location.href='dashboard.php';</script>";
    exit;
}
?>

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
    <title>Login</title>
</head>

<body>
    <div class="mb-3 mt-5 text-center" style="font-size: 30px;">

        <span>Online Service Management System</span>
    </div>
    <p class="text-center" style="font-size: 20px;">
        <i class="fas fa-user-secret text-danger"></i>Admin
    </p>

    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-sm-6 col-md-4 mt-4">
                <form action="" class="shadow-lg p-4" method="post">
                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <label for="email" class="font-weight-bold pl-2">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="aemail" required>
                        <small class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="password" class="font-weight-bold pl-2">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" name="apassword" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-outline-danger mt-4 font-weight-bold btn-block shadow-sm">Login</button>
                </form>
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <div class="text-center">
                    <a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">Back to home</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
</body>

</html>