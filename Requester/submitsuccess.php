<?php
define('TITLE', 'Success');
define('PAGE', 'Success');
include('include/header.php');
include('../dbcon.php');
session_start();

if ($_SESSION['is_login']) {
    $remail = $_SESSION['remail'];
} else {
    echo "<script>location.href='login.php'</script>";
}

$sql = "SELECT * FROM submitrequest WHERE request_id = {$_SESSION['myid']}";
$result = mysqli_query($conn, $sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo "<div class='ml-5 mt-5'>
    <table class='table'>
    <tbody>
    <tr>
    <th>Request id</th>
    <td>" . $row['request_id'] . "</td>
    </tr>
    <tr>
    <th>Request Name</th>
    <td>" . $row['request_name'] . "</td>
    </tr>
    <tr>
    <th>Request Email</th>
    <td>" . $row['request_email'] . "</td>
    </tr>
    <tr>
    <th>Request Info</th>
    <td>" . $row['request_info'] . "</td>
    </tr>
    <tr>
    <th>Request Description</th>
    <td>" . $row['request_desc'] . "</td>
    </tr>
    <tr>
     <td><form class='d-print-none'><input class='btn btn-danger' 
     type='submit' value='print' onClick='window.print()'></form></td>
    </tr>
    </tbody>
    </table>
    
    </div>";
}else{
    echo "failed";
}
?>
<?php
include('include/footer.php');
?>