<?php

session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aemail = $_SESSION['aemail'];
} else {
    echo "<script>location.href='login.php'</script>";
}

include('../dbcon.php');

if (isset($_REQUEST['view'])) {
    $sql = "SELECT * FROM submitrequest WHERE request_id={$_REQUEST['id']}";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
}

if (isset($_REQUEST['close'])) {
    $sql = "DELETE FROM submitrequest WHERE request_id={$_REQUEST['id']}";
    $delete = mysqli_query($conn, $sql);
    if ($delete == true) {
        echo '<meta http-equiv="refresh" content= "0;URL=?closed"/>';
    } else {
        echo "Unable to Delete";
    }
}

if (isset($_REQUEST['assign'])) {
    if (
        empty($_REQUEST['request_id']) ||
        empty($_REQUEST['requestinfo']) ||
        empty($_REQUEST['requestdesc']) ||
        empty($_REQUEST['requesterName']) ||
        empty($_REQUEST['requesterEmail']) ||
        empty($_REQUEST['requesterAddress1']) ||
        empty($_REQUEST['requesterAddress2']) ||
        empty($_REQUEST['requestercity']) ||
        empty($_REQUEST['requesterState']) ||
        empty($_REQUEST['requesterzip']) ||
        empty($_REQUEST['requesterMobile']) ||
        empty($_REQUEST['assigntech']) ||
        empty($_REQUEST['inputDate'])
    ) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $rid = $_REQUEST['request_id'];
        $rinfo = $_REQUEST['requestinfo'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requesterName'];
        $remail = $_REQUEST['requesterEmail'];
        $radd1 = $_REQUEST['requesterAddress1'];
        $radd2 = $_REQUEST['requesterAddress2'];
        $rcity = $_REQUEST['requestercity'];
        $rstate = $_REQUEST['requesterState'];
        $rzip = $_REQUEST['requesterzip'];
        $rmobile = $_REQUEST['requesterMobile'];
        $rtech = $_REQUEST['assigntech'];
        $rdate = $_REQUEST['inputDate'];
        $sql = "INSERT INTO assignwork (request_id, request_info, request_desc, request_name, request_email, request_add1, request_add2, request_city, request_state, request_zip, request_mobile, assign_tech, assign_date) VALUES ('$rid', '$rinfo', '$rdesc', '$rname', '$remail', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$rmobile', '$rtech', '$rdate')";

        $rresult = mysqli_query($conn, $sql);
        if ($rresult == true) {
            $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Work Assigned successfully</div>";
        } else {
            $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Assign Work</div>";
        }
    }
}
?>

<div class="col-sm-5 md-5 jumbotron"> <!-- start Assigned work 3rd column -->
    <form action="" method="post">
        <?php
        if (isset($msg)) {
            echo "$msg";
        }
        ?>
        <h5 class="text-center">Assign Work Order Request</h5>
        <div class="form-group">
            <label for="inputRequest_id">Request ID</label>
            <input type="text" class="form-control" id="inputRequest_id" name="request_id" readonly value="<?php if (isset($row['request_id'])) {
                                                                                                                echo $row['request_id'];
                                                                                                            } ?>">
        </div>

        <div class="form-group">
            <label for="inputRequestInfo">Request Info</label>
            <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request info" name="requestinfo" value="<?php if (isset($row['request_info'])) {
                                                                                                                                    echo $row['request_info'];
                                                                                                                                } ?>">
        </div>

        <div class="form-group">
            <label for="inputRequestDescription">Description</label>
            <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc" value="<?php if (isset($row['request_desc'])) {
                                                                                                                                                echo $row['request_desc'];
                                                                                                                                            } ?>">
        </div>

        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Name" name="requesterName" value="<?php if (isset($row['request_name'])) {
                                                                                                                        echo $row['request_name'];
                                                                                                                    } ?>">
        </div>

        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="requesterEmail" placeholder="Email" value="<?php if (isset($row['request_email'])) {
                                                                                                                            echo $row['request_email'];
                                                                                                                        } ?>">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress1">Address Line 1</label>
                <input type="text" class="form-control" id="inputAddress1" placeholder="Address" name="requesterAddress1" value="<?php if (isset($row['request_add1'])) {
                                                                                                                                        echo $row['request_add1'];
                                                                                                                                    } ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="inputAddress2">Address Line 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Address" name="requesterAddress2" value="<?php if (isset($row['request_add2'])) {
                                                                                                                                        echo $row['request_add2'];
                                                                                                                                    } ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" placeholder="City" name="requestercity" value="<?php if (isset($row['request_city'])) {
                                                                                                                            echo $row['request_city'];
                                                                                                                        } ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="inputState">State</label>
                <input type="text" class="form-control" id="inputState" placeholder="State" name="requesterState" value="<?php if (isset($row['request_state'])) {
                                                                                                                                echo $row['request_state'];
                                                                                                                            } ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)" value="<?php if (isset($row['request_zip'])) {
                                                                                                                                        echo $row['request_zip'];
                                                                                                                                    } ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="inputMobile">Mobile</label>
                <input type="text" class="form-control" id="inputMobile" maxlength="10" name="requesterMobile" onkeypress="isInputNumber(event)" value="<?php if (isset($row['request_mobile'])) {
                                                                                                                                                echo $row['request_mobile'];
                                                                                                                                            } ?>">
            </div>

            <!-- Assign to Technician -->
            <div class="form-group col-md-6">
                <label for="assigntech">Assign to Technician</label>
                <select class="form-control" id="assigntech" name="assigntech">
                    <?php
                    $sql = "SELECT empid, empname FROM technician";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo '<option value="">Select Technicians</option>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["empname"] . '">' . $row["empname"] . '</option>';
                        }
                    } else {
                        echo '<option value="">No Technicians Found</option>';
                    }
                    ?>
                </select>
            </div>
            <!-- Assign to Technician -->

            <div class="form-group col-md-6">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control" id="inputDate" name="inputDate">
            </div>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-success" name="assign">Assign</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>


</div> <!-- End service request form 2nd column -->


<?php
include('include/footer.php');
?>