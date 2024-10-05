<?php
include('../dbcon.php');
session_start();

define('TITLE', 'Product Management');

if ($_SESSION['is_login']) {
    $remail = $_SESSION['remail'];
} else {
    echo "<script>location.href='login.php'</script>";
}

// Handle Add Product
if (isset($_POST['productsubmit'])) {
    if (empty($_POST['pname']) || empty($_POST['pdop']) || empty($_POST['pava']) || empty($_POST['ptotal']) || empty($_POST['poriginalcost']) || empty($_POST['psellingcost'])) {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Please fill in all fields.</div>';
    } else {
        $pname = $_POST['pname'];
        $pDOP = $_POST['pdop'];
        $pavailable = $_POST['pava'];
        $ptotal = $_POST['ptotal'];
        $poriginalcost = $_POST['poriginalcost'];
        $psellingcost = $_POST['psellingcost'];

        $sql = "INSERT INTO Assets (pname, pdop, pava, ptotal, poriginalcost, psellingcost) VALUES ('$pname', '$pDOP', '$pavailable', '$ptotal', '$poriginalcost', '$psellingcost')";
        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Product added successfully.</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Failed to add product.</div>';
        }
    }
}

// Handle Delete Product
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete') {
    $sql = "DELETE FROM Assets WHERE pid={$_REQUEST['id']}";
    if ($conn->query($sql) === TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=product.php?deleted"/>';
    } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to delete product.</div>';
    }
}

// Handle Edit Product
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
    $pid = $_REQUEST['id'];
    $sql = "SELECT * FROM Assets WHERE pid=$pid";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}

// Handle Sell Product
if (isset($_POST['psubmit'])) {
    if (empty($_POST['cname']) || empty($_POST['cadd']) || empty($_POST['pname']) || empty($_POST['pquantity']) || empty($_POST['psellingcost']) || empty($_POST['totalcost']) || empty($_POST['selldate'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please fill in all fields.</div>';
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

        $sql = "INSERT INTO customer (custname, custadd, cpname, cpquantity, cpeach, cptotal, cpdate) VALUES ('$custname', '$custadd', '$cpname', '$cppquantity', '$cpeach', '$cptotal', '$cpdate')";
        if ($conn->query($sql) === TRUE) {
            $sqlup = "UPDATE Assets SET pava='$pava' WHERE pid='$pid'";
            $conn->query($sqlup);
            $_SESSION['print_data'] = [
                'customer_name' => $custname,
                'customer_address' => $custadd,
                'product_name' => $cpname,
                'quantity' => $cppquantity,
                'selling_cost_each' => $cpeach,
                'total_cost' => $cptotal,
                'sell_date' => $cpdate
            ];
            echo "<script>location.href='productsellsuccess.php'</script>";
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Failed to process the sale.</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../CSS/custom.css">
</head>
<body>
<div class="container mt-5">
    <a href="/index.php">back to home</a>
    <div class="row">
        <!-- Product List -->
        <div class="col-md-12">
            <h3 class="text-center mb-4">Product List</h3>
            <?php if (isset($msg)) echo $msg; ?>
            <div class="table-responsive">
                <?php
                $sql = "SELECT * FROM Assets";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo '<table class="table table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Product ID</th>';
                    echo '<th scope="col">Name</th>';
                    echo '<th scope="col">DOP</th>';
                    echo '<th scope="col">Available</th>';
                    echo '<th scope="col">Total</th>';
                    echo '<th scope="col">Original Cost Each</th>';
                    echo '<th scope="col">Selling Cost Each</th>';
                    echo '<th scope="col">Actions</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["pid"] . '</td>';
                        echo '<td>' . $row["pname"] . '</td>';
                        echo '<td>' . $row["pdop"] . '</td>';
                        echo '<td>' . $row["pava"] . '</td>';
                        echo '<td>' . $row["ptotal"] . '</td>';
                        echo '<td>' . $row["poriginalcost"] . '</td>';
                        echo '<td>' . $row["psellingcost"] . '</td>';
                        echo '<td>';
                        echo '<form action="" method="post" class="d-inline">';
                        echo '<input type="hidden" name="id" value="' . $row["pid"] . '">';
                        echo '<input type="hidden" name="action" value="handbuy">';
                        echo '<button type="submit" class="btn btn-warning" name="handbuy">Buy</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<div class="alert alert-info" role="alert">No products found.</div>';
                }
                ?>
            </div>
        </div>

        <!-- Sell Product Form -->
        <?php if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'handbuy' || isset($_POST['psubmit'])): ?>
        <div class="col-lg-6 col-md-8 mx-auto mt-4 mb-5">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="card-title mb-0">Sell Product</h5>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'handbuy') {
                        $pid = $_REQUEST['id'];
                        $sql = "SELECT * FROM Assets WHERE pid=$pid";
                        $result = $conn->query($sql);
                        if ($result->num_rows == 1) {
                            $product = $result->fetch_assoc();
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <?php if (isset($msg)) echo $msg; ?>

                        <div class="form-group">
                            <label for="cname">Customer Name</label>
                            <input type="text" class="form-control" id="cname" name="cname" required>
                        </div>
                        <div class="form-group">
                            <label for="cadd">Customer Address</label>
                            <input type="text" class="form-control" id="cadd" name="cadd" required>
                        </div>
                        <div class="form-group">
                            <label for="pname">Product Name</label>
                            <input type="text" class="form-control" id="pname" name="pname" value="<?= isset($product['pname']) ? $product['pname'] : '' ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pquantity">Quantity</label>
                            <input type="number" class="form-control" id="pquantity" name="pquantity" min="1" max="<?= isset($product['pava']) ? $product['pava'] : '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="psellingcost">Selling Cost Each</label>
                            <input type="text" class="form-control" id="psellingcost" name="psellingcost" value="<?= isset($product['psellingcost']) ? $product['psellingcost'] : '' ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="totalcost">Total Cost</label>
                            <input type="text" class="form-control" id="totalcost" name="totalcost" readonly>
                        </div>
                        <div class="form-group">
                            <label for="selldate">Sell Date</label>
                            <input type="date" class="form-control" id="selldate" name="selldate" required>
                        </div>
                        <input type="hidden" name="pid" value="<?= isset($product['pid']) ? $product['pid'] : '' ?>">
                        <input type="hidden" name="pava" value="<?= isset($product['pava']) ? $product['pava'] : '' ?>">
                        <button type="submit" class="btn btn-primary" name="psubmit">Payment</button>
                        <a href="product.php" class="btn btn-secondary ml-2">Back</a>
                        <button type="button" class="btn btn-info ml-2" onclick="alert('Additional action!')">Other</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
    // Update total cost when quantity changes
    document.getElementById('pquantity').addEventListener('input', function() {
        var quantity = this.value;
        var sellingCostEach = parseFloat(document.getElementById('psellingcost').value);
        var totalCost = quantity * sellingCostEach;
        document.getElementById('totalcost').value = totalCost.toFixed(2);
    });
</script>

<?php include('include/footer.php'); ?>
