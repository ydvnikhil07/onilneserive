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
    <link rel="stylesheet" href="CSS/custom.css">
    <title>OSMS</title>
</head>

<body>
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
        <a href="index.php" class="navbar-brand">OSMS</a>
        <span class="navbar-text">Customer's happiness is our Aim</span>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myMenu">
            <ul class="navbar-nav pl-5 custom-nav">
                <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
                <!-- <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li> -->
                <li class="nav-item"><a href="Requester/product.php" class="nav-link">Product</a></li>
                <li class="nav-item"><a href="userRegister.php" class="nav-link">Registration</a></li>
                <li class="nav-item"><a href="Requester/login.php" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>
    <!-- End Navigation -->

    <!-- Start Header jumbotron -->
    <header class="jumbotron back-image" style="background-image:url(IMAGE/imgb.jpg);">
        <div class="myclass mainHeading">
            <h1 class="text-uppercase text-danger font-weight-bold">Welcome to OSMS</h1>
            <p class="font-italic">Customer's Happiness is our Aim</p>
            <a href="Requester/login.php" class="btn btn-success mr-4">Login</a>
            <a href="userRegister.php" class="btn btn-danger mr-4">Sign Up</a>
        </div>
    </header>
    <!-- End Header jumbotron -->

    <!-- Start introduction Section -->
    <div class="container">
        <div class="jumbotron">
            <h3 class="text-center">OSMS Services</h3>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem consequatur impedit placeat similique, voluptatum eum dolor suscipit doloremque temporibus
                accusamus saepe esse obcaecati quis qui quam quae, deserunt repellat quaerat!
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem consequatur impedit placeat similique, voluptatum eum dolor suscipit doloremque temporibus
                accusamus saepe esse obcaecati quis qui quam quae, deserunt repellat quaerat!
            </p>
        </div>
    </div>
    <!-- End introduction Section container -->

    <!-- Start Services section -->
    <div class="container text-center border-bottom">
        <h2>Our Services</h2>
        <div class="row mt-4">
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
                <h4 class="mt-4">Electronic Appliances</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
                <h4 class="mt-4">Preventive Maintenance</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
                <h4 class="mt-4">Fault Repair</h4>
            </div>
        </div>
    </div>
    <!-- End Services section container -->

    <!-- Start Registration Form -->
    <?php include('userRegister.php'); ?>
    <!-- End Registration Form -->

    <!-- Start Happy Customers -->
    <div class="jumbotron bg-danger">
        <div class="container">
            <h2 class="text-center text-white">Happy Customers</h2>
            <div class="row mt-5">
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="IMAGE/img3.jpeg" class="img-fluid" style="border-radius: 100px;" alt="AVT">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="IMAGE/img3.jpeg" class="img-fluid" style="border-radius: 100px;" alt="AVT">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="IMAGE/img3.jpeg" class="img-fluid" style="border-radius: 100px;" alt="AVT">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="IMAGE/img3.jpeg" class="img-fluid" style="border-radius: 100px;" alt="AVT">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Happy Customers -->

    <!-- Start Contact Us -->
    <div class="container">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row">
            <!-- Start 1st Column -->
            <?php include('contactform.php'); ?>
            <!-- End 1st Column -->
            <!-- Start 2nd Column -->
            <div class="col-md-4 text-center">
                <strong>Headquarter</strong><br>
                OSMS Pvt Ltd,<br>
                Ashok Nagar, Ranchi<br>
                Jharkhand-452155<br>
                Phone: +00000000<br>
                <a href="#" target="_blank">www.osms.com</a><br>
                <br><br>
                <strong>Branch:</strong><br>
                OSMS Pvt Ltd,<br>
                New Ashok Nagar, Delhi<br>
                Delhi-252855<br>
                Phone: +00000000<br>
                <a href="#" target="_blank">www.osms.com</a><br>
            </div>
            <!-- End 2nd Column -->
        </div>
    </div>
    <!-- End Contact Us -->

    <!-- Start Footer -->
    <footer class="container-fluid bg-dark mt-5 text-white">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6">
                    <span class="pr-2">Follow us</span>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-rss"></i></a>
                </div>
                <div class="col-md-6 text-right">
                    <small>Designed by &copy;2024</small>
                    <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
</body>

</html>
