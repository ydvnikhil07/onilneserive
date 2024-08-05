<?php
define('TITLE', 'RequesterSubmit');
define('PAGE', 'RequesterSubmit');
include('include/header.php');
include('../dbcon.php');
session_start();

if ($_SESSION['is_login']) {
    $remail = $_SESSION['remail'];
} else {
    echo "<script>location.href='login.php'</script>";
}

if (isset($_REQUEST['submitrequest'])) {
    if (
        ($_REQUEST['requestinfo'] == "") ||
        ($_REQUEST['requestdesc'] == "") ||
        ($_REQUEST['requesterName'] == "") ||
        ($_REQUEST['requesterAddress1'] == "") ||
        ($_REQUEST['requesterAddress2'] == "") ||
        ($_REQUEST['requestercity'] == "") ||
        ($_REQUEST['requesterState'] == "") ||
        ($_REQUEST['requesterzip'] == "") ||
        ($_REQUEST['requesterEmail'] == "") ||
        ($_REQUEST['requesterMobile'] == "") ||
        ($_REQUEST['requesterDate'] == "")
    ) {
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-1'>All fields are required</div>";
    } else {

        $rinfo = $_REQUEST['requestinfo'];
        $rdesc = $_REQUEST['requestdesc'];
        $rName = $_REQUEST['requesterName'];
        $rAddress1 = $_REQUEST['requesterAddress1'];
        $rAddress2 = $_REQUEST['requesterAddress2'];
        $rcity = $_REQUEST['requestercity'];
        $rState = $_REQUEST['requesterState'];
        $rZip = $_REQUEST['requesterzip'];
        $rEmail = $_REQUEST['requesterEmail'];
        $rMobile = $_REQUEST['requesterMobile'];
        $rDate = $_REQUEST['requesterDate'];

        $sql = "INSERT INTO submitrequest(request_info, request_desc, request_name, request_add1, request_add2, request_city, request_state, request_zip, request_email, request_mobile, request_date)
        VALUES ('$rinfo', '$rdesc', '$rName', '$rAddress1', '$rAddress2', '$rcity', '$rState', '$rZip', '$rEmail', '$rMobile', '$rDate')";

        if (mysqli_query($conn, $sql)) {

            $genid = mysqli_insert_id($conn);
           
            $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-1'>Request Submitted successfully</div>";
      
            $_SESSION['myid']=$genid;

            echo "<script>location.href='submitsuccess.php'</script>";

      
    } else {
            $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-1'>Unable to Submit Your Request</div>";
        }
    }
}
?>

<div class="col-sm-9 col-md-8 mt-1"> <!-- start service request form 2nd column -->

    <form action="" method="post" class="mx-5 d-print-none">
        <div class="form-group">
            <label for="inputRequestInfo">Request Info</label>
            <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request info" name="requestinfo">
        </div>

        <div class="form-group">
            <label for="inputRequestDescription">Description</label>
            <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc">
        </div>

        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Name" name="requesterName">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress1">Address Line 1</label>
                <input type="text" class="form-control" id="inputAddress1" placeholder="Address" name="requesterAddress1">
            </div>

            <div class="form-group col-md-6">
                <label for="inputAddress2">Address Line 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Address" name="requesterAddress2">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" placeholder="City" name="requestercity">
            </div>

            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <input type="text" class="form-control" id="inputState" placeholder="State" name="requesterState">
            </div>

            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)">
            </div>

            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="requesterEmail" placeholder="Email">
            </div>

            <div class="form-group col-md-2">
                <label for="inputMobile">Mobile</label>
                <input type="text" class="form-control" id="inputMobile" name="requesterMobile" onkeypress="isInputNumber(event)">
            </div>

            <div class="form-group col-md-2">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control" id="inputDate" name="requesterDate">
            </div>
        </div>
        <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>

    <?php
    if (isset($msg)) {
        echo "$msg";
    }
    ?>
</div> <!-- End service request form 2nd column -->

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
include('include/footer.php');
?>