<?php
define('TITLE', 'RequesterProfile');
define('PAGE', 'RequesterProfile');
include('include/header.php');
include('../dbcon.php');
session_start();

if ($_SESSION['is_login']) {
    $remail = $_SESSION['remail'];
} else {
    echo "<script>location.href=http://localhost:3000/Requester/submit.php'login.php'</script>";
}

$sql = "SELECT r_name, r_email FROM user WHERE r_email='$remail'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $rname = $row['r_name'];
}
if (isset($_POST['nameupdate'])) {
    $rname = $_POST['rname'];
    $sql = "UPDATE user SET r_name='$rname' WHERE r_email='$remail'";
    if (mysqli_query($conn, $sql)) {
        $msg = "<div class='alert alert-success mt-2'>Profile updated successfully</div>";
    } else {
        $msg = "<div class='alert alert-danger mt-2'>Unable to update profile</div>";
    }
}

?>

<!-- start profile Area 2nd column-->
<div class="col-sm-6 mt-5">
    <form action="" method="post" class="mx-5">
        <div class="form-group">
            <label for="remail">Email</label>
            <input type="email" class="form-control" name="remail" id="remail" value="<?php echo $remail; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="rname">Name</label>
            <input type="text" class="form-control" name="rname" id="rname" value="<?php echo $rname ?>">
        </div>

        <button type="submit" class="btn btn-danger" name="nameupdate">Update</button>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
    </form>
</div>
<!-- End profile Area 2nd column-->

<?php
include('include/footer.php');
?>