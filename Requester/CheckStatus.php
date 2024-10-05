<?php
define('TITLE', 'Status');
define('PAGE', 'Status');
include('include/header.php');

include('../dbcon.php');
session_start();

if ($_SESSION['is_login']) {
    $remail = $_SESSION['remail'];
} else {
    echo "<script>location.href='login.php'</script>";
}
?>

<!-- start 2nd column -->
<div class="col-sm-6 mt-5 mx-4">
    <form action="" method="post" class="d-print-none">
        <div class="form-group mr-4">
            <label for="checkid">Enter Request ID</label>
            <input type="text" name="checkid" id="checkid" class="form-control" onkeypress="isInputNumber(event)">
        </div>
        <button type="submit" name="checkstatus" class="btn btn-danger">Search</button>
    </form>

    <?php
    if (isset($_REQUEST['checkstatus'])) {
        if ($_REQUEST['checkid'] == "") {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Enter Request Id</div>';
        } else {
            $sql = "SELECT * FROM assignwork WHERE request_id={$_REQUEST['checkid']}";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            if ($row['request_id'] == $_REQUEST['checkid']) {
    ?>

                <h3 class="text-center mt-5">Assigned Work Details</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Request ID</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['request_id'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Request Info</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['request_info'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Request Description</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['request_desc'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['request_name'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Email Id</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['request_email'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Address Line 1</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['request_add1'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Address Line 2</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['request_add2'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['request_city'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['request_state'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Zip</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['request_zip'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['request_mobile'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Assigned Date</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['assign_date'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Technician Name</td>
                            <td><?php if (isset($row['request_id'])) {
                                    echo $row['assign_tech'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Customer Sign</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Technician Sign</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
<form action="" class="mb-3 d-print-none">
    <input  class="btn btn-danger" type="submit" value="Print" onclick="window.print()">
    <input  class="btn btn-secondary" type="submit" value="Close">
</form>
                </div>
    <?php
            } else {
                echo '<div class="alert alert-warning mt-4">Your Request is Still Pending</div>';
            }
        }
    }
    ?>

    <?php
    if (isset($msg)) {
        echo $msg;
    }
    ?>
</div>
<!--End 2nd column   -->

<!-- only number for input fields -->
<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>

<?php
include('include/footer.php')
?>