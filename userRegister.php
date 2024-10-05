 <?php
    include('dbcon.php');

    if (isset($_POST['rSignup'])) {
        $name = $_POST['rName'];
        $email = $_POST['rEmail'];
        $password = $_POST['rPassword'];

        // Check if email already exists
        $check_email_sql = "SELECT r_email FROM user WHERE r_email='$email'";
        $check_email_result = mysqli_query($conn, $check_email_sql);

        if (mysqli_num_rows($check_email_result) > 0) {
            $msg = '<div class="alert alert-danger mt-2" role="alert">Email already registered</div>';
        } else {
            // Insert new user
            $sql = "INSERT INTO `user` (`r_name`, `r_email`, `r_password`) VALUES ('$name', '$email', '$password')";
            $data = mysqli_query($conn, $sql);

            if ($data) {
                $msg = '<div class="alert alert-success mt-2" role="alert">Account Successfully Created</div>';
            } else {
                $msg = '<div class="alert alert-danger mt-2" role="alert">Unable to Create Account</div>';
            }
        }
    }
    ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <!-- Custom CSS (Keep this local if you have custom styles) -->
    <link rel="stylesheet" href="CSS/custom.css">
 <div class="container pt-5">
 <a href="/index.php">back to home</a>
     <h2 class="text-center">Create an Account</h2>
     <div class="row mt-4 mb-4">
         <div class="col-md-6 offset-md-3">
             <form action="" class="shadow-lg p-4" method="post">
                 <div class="form-group">
                     <i class="fas fa-user"></i> <label for="name" class="font-weight-bold pl-2">Name</label>
                     <input type="text" class="form-control" placeholder="Name" name="rName" required>
                 </div>
                 <div class="form-group">
                     <i class="fas fa-user"></i> <label for="email" class="font-weight-bold pl-2">Email</label>
                     <input type="email" class="form-control" placeholder="Email" name="rEmail" required>
                 </div>
                 <small class="form-text">We'll never share your email with anyone else.</small>
                 <div class="form-group">
                     <i class="fas fa-key"></i> <label for="pass" class="font-weight-bold pl-2">Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="rPassword" required>
                 </div>
                 <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
                 <em style="font-size:10px">Note - By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy.</em>
                 <?php if (isset($msg)) {
                        echo $msg;
                    } ?>
             </form>
         </div>
     </div>
 </div>
 <!-- jQuery, Popper.js, Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
