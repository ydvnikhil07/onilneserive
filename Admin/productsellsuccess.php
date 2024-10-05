<?php
define('TITLE', 'Success');
include('include/header.php');
include('../dbcon.php');

session_start();
if (!isset($_SESSION['is_adminlogin'])) {
    echo "<script>location.href='login.php'</script>";
    exit();
}
$aemail = $_SESSION['aemail'];

$sql = "SELECT * FROM customer WHERE custid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['myid']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo "<div class='ml-5 mt-5'>
    <h3 class='text-center'>Customer Bill</h3>
    <table class='table'>
    <tbody>
    <tr>
    <th>Customer ID</th>
    <td>" . $row['custid'] . "</td>
    </tr>
    <tr>
    <th>Customer Name</th>
    <td>" . $row['custname'] . "</td>
    </tr>
    <tr>
    <th>Address</th>
    <td>" . $row['custadd'] . "</td>
    </tr>
    <tr>
    <th>Product</th>
    <td>" . $row['cpname'] . "</td>
    </tr>
    <tr>
    <th>Quantity</th>
    <td>" . $row['cpquantity'] . "</td>
    </tr>
    <tr>
    <th>Price Each</th>
    <td>" . $row['cpeach'] . "</td>
    </tr>
    <tr>
    <th>Total Cost</th>
    <td>" . $row['cptotal'] . "</td>
    </tr>
    <tr>
    <th>Date</th>
    <td>" . $row['cpdate'] . "</td>
    </tr>
    <tr>
    <td>
        <form class='d-print-none'>
            <input class='btn btn-danger' type='button' value='Print' onClick='window.print()'>
        </form>
    </td>
    <td> 
        <a href='assets.php' class='btn btn-secondary d-print-none'>Close</a>
    </td>
    </tr>
    </tbody>
    </table>
    </div>";
} else {
    echo "Failed to retrieve customer data.";
}
$stmt->close();
?>

<?php
include('include/footer.php');
?>
