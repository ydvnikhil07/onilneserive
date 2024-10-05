<?php
define('TITLE', 'Technician');
define('PAGE', 'technician');
include('include/header.php');
include('../dbcon.php');

session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aemail = $_SESSION['aemail'];
} else {
    echo "<script>location.href='login.php'</script>";
    exit;
}

?>

<div class="col-sm-9 col-md-10 mt-5 text-center">
    <p class="bg-dark text-white p-2">List of Technicians</p>
    <?php

    $sql = "SELECT * FROM technician";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Emp ID</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">City</th>';
        echo '<th scope="col">Mobile</th>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["empid"] . '</td>';
            echo '<td>' . $row["empname"] . '</td>';
            echo '<td>' . $row["empcity"] . '</td>';
            echo '<td>' . $row["empmobile"] . '</td>';
            echo '<td>' . $row["empemail"] . '</td>';
            echo '<td>';
            echo '<form action="Editemp.php" method="post" class="d-inline">';
            echo '<input type="hidden" name="id" value=' . $row["empid"] . '>';
            echo '<button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">';
            echo '<i class="fas fa-pen"></i></button>';
            echo '</form>';

            echo '<form action="#" method="post" class="d-inline">';
            echo '<input type="hidden" name="id" value=' . $row["empid"] . '>';
            echo '<button type="submit" class="btn btn-secondary mr-3" name="delete" value="Delete">';
            echo '<i class="fas fa-trash-alt"></i></button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
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
    $sql = "DELETE FROM technician WHERE empid={$_REQUEST['id']}";
    if ($conn->query($sql) === TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    } else {
        echo "Unable to Delete";
    }
}

?>
</div> <!--End row -->
<div class="float-right"><a href="Insertemp.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
</div> <!-- End container -->

<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
</body>

</html>

<?php
include('include/footer.php');
?>