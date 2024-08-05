<?php
define('TITLE', 'Add New Product');
define('PAGE', 'assets');
include('include/header.php');
include('../dbcon.php');

session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aemail = $_SESSION['aemail'];
} else {
    echo "<script>location.href='login.php'</script>";
}

if (isset($_REQUEST['productsubmit'])) {
    if (empty($_REQUEST['pname']) ||
        empty($_REQUEST['pdop']) || 
      empty($_REQUEST['pava']) || 
      empty($_REQUEST['ptotal']) || 
      empty($_REQUEST['poriginalcost']) || 
      empty($_REQUEST['psellingcost']) || 
     empty($_REQUEST['pname'])) {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $pname = $_REQUEST['pname'];
        $pDOP = $_REQUEST['pdop'];
        $pavailable = $_REQUEST['pava'];
        $ptotal = $_REQUEST['ptotal'];
        $poriginalcost = $_REQUEST['poriginalcost'];
        $psellingcost = $_REQUEST['psellingcost'];

        $sql = "INSERT INTO Assets (pname, pdop, pava, ptotal, poriginalcost, psellingcost) VALUES ('$pname', '$pDOP', '$pavailable', '$ptotal', '$poriginalcost', '$psellingcost')";
        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Added Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Add</div>';
        }
    }
}
?>

<!--start 2nd column -->
 
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <?php if (isset($msg)) {
            echo $msg;
        } ?>
    <h3 class="text-center">Add New Product</h3>
    
    <form action="" method="post">
        <div class="form-group">
            <label for="pname">Name</label>
            <input type="text" class="form-control" id="pname" name="pname">
        </div>
        <div class="form-group">
            <label for="pdop">DOP</label>
            <input type="date" class="form-control" id="pdop" name="pdop">
        </div>
        <div class="form-group">
            <label for="pava">Available</label>
            <input type="text" class="form-control" id="pava" name="pava">
        </div>
        <div class="form-group">
            <label for="ptotal">Total</label>
            <input type="text" class="form-control" id="ptotal" name="ptotal">
        </div>
        <div class="form-group">
            <label for="poriginalcost">Original Cost Each</label>
            <input type="text" class="form-control" id="poriginalcost" name="poriginalcost">
        </div>
        <div class="form-group">
            <label for="ptotal">Selling Cost Each</label>
            <input type="text" class="form-control" id="psellingcost" name="psellingcost">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="productsubmit" name="productsubmit">Submit</button>
            <a href="assets.php" class="btn btn-secondary">Close</a>
        </div>
        
    </form>
</div>
<!--End 2nd column -->

<?php
include('include/footer.php');
?>