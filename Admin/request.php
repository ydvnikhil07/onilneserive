<?php
define('TITLE', 'Request');
define('PAGE', 'request');
include('include/header.php');
include('../dbcon.php');

session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aemail = $_SESSION['aemail'];
} else {
    echo "<script>location.href='login.php'</script>";
}

?>

<!-- start 2nd column -->

<div class="col-sm-4 mb-5">
    <?php
    $sql = "SELECT request_id, request_info, request_desc, request_date FROM submitrequest";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card mt-5 mx-5">';
            echo '<div class="card-header">';
            echo 'Request ID: ' . $row['request_id'];
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Request Info:  ' . $row['request_info'] . '</h5>';
            echo '<p class="card-text">' . $row['request_desc'] . '</p>';
            echo '<p class="card-text"><small class="text-muted">Request Date:  ' . $row['request_date'] . '</small></p>';
            echo '<div class="float-right">';
            echo '<form action="" method="post">';
            echo '<input type="hidden" name="id" value="' . $row['request_id'] . '">';
            echo '<input type="submit" class="btn btn-danger mr-3" value="View" name="view">';
            echo '<input type="submit" class="btn btn-secondary" value="Close" name="close">';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    ?>
</div><!-- End 2nd column -->


<?php
include('assignworkform.php');
include('include/footer.php');
?>
