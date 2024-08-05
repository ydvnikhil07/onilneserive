<?php
define('TITLE', 'Edit Product');
define('PAGE', 'assets');
include('include/header.php');
include('../dbcon.php');

session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aemail = $_SESSION['aemail'];
} else {
    echo "<script>location.href='login.php'</script>";
    exit;
}
?>

<!-- Start 2nd column -->
<div class="col-sm-5 mt-2 mx-3 jumbotron">
    <h3 class="text-center">Update Product Details</h3>
    <?php
    if (isset($_REQUEST['edit'])) {
        $sql = "SELECT * FROM Assets WHERE pid = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
    }

    if (isset($_REQUEST['update'])) {
        if (
            empty($_REQUEST['pname']) ||
            empty($_REQUEST['pdop']) ||
            empty($_REQUEST['pava']) ||
            empty($_REQUEST['ptotal']) ||
            empty($_REQUEST['poriginalcost']) ||
            empty($_REQUEST['psellingcost'])
        ) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
        } else {
            $pname = $_REQUEST['pname'];
            $pDOP = $_REQUEST['pdop'];
            $pavailable = $_REQUEST['pava'];
            $ptotal = $_REQUEST['ptotal'];
            $poriginalcst = $_REQUEST['poriginalcost'];
            $psellingcost = $_REQUEST['psellingcost'];
            $pid = $_REQUEST['pid'];

            $sql = "UPDATE Assets SET 
                pname = '$pname',
                pdop = '$pDOP',
                pava = '$pavailable',
                ptotal = '$ptotal',
                poriginalcost = '$poriginalcst',
                psellingcost = '$psellingcost'
                WHERE pid = '$pid'";

            if ($conn->query($sql) === TRUE) {
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Record Updated Successfully</div>';
            } else {
                // Debugging: print the SQL query and error message
                echo "Error: " . $sql . "<br>" . $conn->error;
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update Record</div>';
            }
        }
    }
    ?>
    <form action="" method="POST">
        <?php if (isset($msg)) { echo $msg; } ?>

        <div class="form-group">
            <label for="pid">Product ID</label>
            <input type="text" class="form-control" id="pid" name="pid" value="<?php if (isset($row['pid'])) echo $row['pid']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="pname">Name</label>
            <input type="text" class="form-control" id="pname" name="pname" value="<?php if (isset($row['pname'])) echo $row['pname']; ?>">
        </div>
        <div class="form-group">
            <label for="pdop">DOP</label>
            <input type="date" class="form-control" id="pdop" name="pdop" value="<?php if (isset($row['pdop'])) echo $row['pdop']; ?>">
        </div>
        <div class="form-group">
            <label for="pava">Available</label>
            <input type="text" class="form-control" id="pava" name="pava" value="<?php if (isset($row['pava'])) echo $row['pava']; ?>">
        </div>
        <div class="form-group">
            <label for="ptotal">Total</label>
            <input type="text" class="form-control" id="ptotal" name="ptotal" value="<?php if (isset($row['ptotal'])) echo $row['ptotal']; ?>">
        </div>
        <div class="form-group">
            <label for="poriginalcost">Original Cost Each</label>
            <input type="text" class="form-control" id="poriginalcost" name="poriginalcost" value="<?php if (isset($row['poriginalcost'])) echo $row['poriginalcost']; ?>">
        </div>
        <div class="form-group">
            <label for="psellingcost">Selling Cost Each</label>
            <input type="text" class="form-control" id="psellingcost" name="psellingcost" value="<?php if (isset($row['psellingcost'])) echo $row['psellingcost']; ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="update" name="update">Update</button>
            <a href="assets.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>
<!-- End 2nd column -->
<?php
include('include/footer.php');
?>
