<?php
define('TITLE', 'Requesters');
define('PAGE', 'requester');
include('include/header.php');
include('../dbcon.php');

session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aemail = $_SESSION['aemail'];
} else {
    echo "<script>location.href='login.php'</script>";
}
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <p class="bg-dark text-white p-2">List of Requester</p>
    <?php

    $sql = "SELECT * FROM user ";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Requester ID </th>';
        echo '<th scope="col">Name </th>';
        echo '<th scope="col">Email </th>';
        echo '<th scope="col">Action </th>';
        echo '</tr>';
        echo '</thead>';
        echo '</tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["r_login_id"] . '</td>';
            echo '<td>' . $row["r_name"] . '</td>';
            echo '<td>' . $row["r_email"] . '</td>';
            echo '<td>';

            echo '<form action="editreq.php" method="post" class="d-inline">';
            echo ' <input type ="hidden" name="id" value=' . $row["r_login_id"] . '><button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">
            <i class="fas fa-pen"></i></button>';
            echo '</form>';

            echo '<form action="" method="post" class="d-inline">';
            echo ' <input type ="hidden" name="id" value=' . $row["r_login_id"] . '><button type="submit" class="btn btn-secondary mr-3" name="delete" value="Delete">
            <i class="fas fa-trash-alt"></i></button>';
            echo '</form>';

            echo '</td>';
            echo '<tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '0 Result';
    }

    ?>
</div>
<?php
if (isset($_REQUEST['delete'])) {
    $sql = "DELETE FROM user WHERE r_login_id={$_REQUEST['id']}";
    if ($conn->query($sql) == true) {
        echo '<meta http-equiv="refresh" content=";URL=?deleted"/>';
    } else {
        echo "Unable to Delete";
    }
}

?>
</div> <!--End row -->
<div class="float-right"><a href="insertreq.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a>

</div>
</div> <!-- End container -->

<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
</body>

</html>