<?php
define('TITLE', 'Sell Product');
define('PAGE', 'assets');
include('include/header.php');
include('../dbcon.php');

session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aemail = $_SESSION['aemail'];
} else {
    echo "<script>location.href='login.php'</script>";
}
if (isset($_POST['psubmit'])) {

    if (empty($_POST['cname']) || empty($_POST['cadd']) || empty($_POST['pname']) || empty($_POST['pquantity']) || empty($_POST['psellingcost']) || empty($_POST['totalcost']) || empty($_POST['selldate'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $pid = $_POST['pid'];
        $pava = $_POST['pava'] - $_POST['pquantity'];

        $custname = $_POST['cname'];
        $custadd = $_POST['cadd'];
        $cpname = $_POST['pname'];
        $cppquantity = $_POST['pquantity'];
        $cpeach = $_POST['psellingcost'];
        $cptotal = $_POST['totalcost'];
        $cpdate = $_POST['selldate'];

        $sql = "INSERT INTO customer(custname,custadd,cpname,cpquantity,cpeach,cptotal,cpdate) VALUES ('$custname','$custadd','$cpname','$cppquantity','$cpeach','$cptotal','$cpdate')";
        $result = mysqli_query($conn, $sql);
        if ($result == true) {
            $genid = mysqli_insert_id($conn);
            $_SESSION['myid'] = $genid;
            echo "<script>location.href='productsellsuccess.php'</script>";
        }

        $sqlup = "UPDATE Assets SET pava='$pava' WHERE pid='$pid'";
        $conn->query($sqlup);
    }
}
?>

<!-- start 2nd column -->
<div class="col-sm-5 mt-2 mx-3 jumbotron">
    <h3 class="text-center">Customer Bill</h3>
    <?php
    if (isset($_REQUEST['issue'])) {
        $sql = "SELECT * FROM Assets WHERE pid = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
    }
    ?>
    <form action="" method="POST">
        <?php if (isset($msg)) {
            echo $msg;
        } ?>

        <div class="form-group">
            <label for="pid">Product ID</label>
            <input type="text" class="form-control" id="pid" name="pid" value="<?php if (isset($row['pid'])) echo $row['pid']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="cname">Customer Name</label>
            <input type="text" class="form-control" id="cname" name="cname">
        </div>
        <div class="form-group">
            <label for="cadd">Customer Address</label>
            <input type="text" class="form-control" id="cadd" name="cadd">
        </div>
        <div class="form-group">
            <label for="pname">Product Name</label>
            <input type="text" class="form-control" id="pname" name="pname" value="<?php if (isset($row['pname'])) echo $row['pname']; ?>">
        </div>

        <div class="form-group">
            <label for="pava">Available</label>
            <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)" value="<?php if (isset($row['pava'])) echo $row['pava']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="pquantity">Quantity</label>
            <input type="text" class="form-control" id="pquantity" name="pquantity" oninput="calculateTotal()" onkeypress="isInputNumber(event)" value="<?php if (isset($row['cpquantity'])) echo $row['pava']; ?>">
        </div>

        <div class="form-group">
            <label for="psellingcost">Price</label>
            <input type="text" class="form-control" id="psellingcost" name="psellingcost" oninput="calculateTotal()" onkeypress="isInputNumber(event)" value="<?php if (isset($row['psellingcost'])) echo $row['psellingcost']; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="totalcost">Total Price</label>
            <input type="text" class="form-control" id="totalcost" name="totalcost"  readonly>
        </div>

        <div class="form-group">
            <label for="selldate">Date</label>
            <input type="date" class="form-control" id="selldate" name="selldate" onkeypress="isInputNumber(event)">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
            <a href="assets.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>
<!-- End 2nd column -->

<!-- JavaScript to calculate total cost -->
<script>
    function calculateTotal() {
        var quantity = document.getElementById('pquantity').value;
        var price = document.getElementById('psellingcost').value;
        var total = quantity * price;
        document.getElementById('totalcost').value = total;
    }

    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>

<?php
include('include/footer.php');
?>
