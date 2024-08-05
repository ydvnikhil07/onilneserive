<?php
define('TITLE', 'Work');
define('PAGE', 'work');
include('include/header.php');
include('../dbcon.php');

session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aemail = $_SESSION['aemail'];
} else {
    echo "<script>location.href='login.php'</script>";
}

?>
<!-- start 2nd cloumn  -->


<div class="col-sm-8 col-md-9 mt-5">
    <?php
    $sql = "SELECT * FROM assignwork";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Req Id</th>';
        echo '<th scope="col">Req Info</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Address</th>';
        echo '<th scope="col">City</th>';
        echo '<th scope="col">Technician</th>';
        echo '<th scope="col">Assigned Date</th>';
        echo '<th scope="col">Action</th>';
        echo '</tr>';
        echo '</thead>';

        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['request_id'] . '</td>';
            echo '<td>' . $row['request_info'] . '</td>';
            echo '<td>' . $row['request_name'] . '</td>';
            echo '<td>' . $row['request_email'] . '</td>';
            echo '<td>' . $row['request_add1'] . '</td>';
            echo '<td>' . $row['request_city'] . '</td>';
            echo '<td>' . $row['assign_tech'] . '</td>';
            echo '<td>' . $row['assign_date'] . '</td>';
            echo '<td>';
            
            echo '<div class="d-flex">';

            echo '<form action="viewassignwork.php" method="post">';
            echo '<input type="hidden" name="id" value="' . htmlspecialchars($row['request_id'], ENT_QUOTES, 'UTF-8') . '">';
            echo '<button class="btn btn-warning mx-2" name="view" value="View" type="submit">';
            echo '<i class="far fa-eye"></i></button>';
            echo '</form>';
            
            echo '<form action="" method="post">';
            echo '<input type="hidden" name="id" value="' . htmlspecialchars($row['request_id'], ENT_QUOTES, 'UTF-8') . '">';
            echo '<button class="btn btn-secondary" name="delete" value="Delete" type="submit">';
            echo '<i class="far fa-trash-alt"></i></button>';
            echo '</form>';
            
echo '</div>';
            echo '</td>';
            echo '</tr>';
        }
        echo '<tbody>';

        echo '</table>';
    } else {
        echo '0 Result';
    }
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM assignwork WHERE request_id ={$_REQUEST['id']}";
        $delete=mysqli_query($conn,$sql);
        if($delete==true){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        }else{
           echo"Unable to Delete Data";
        }
    }
    ?>
</div>

<!-- End 2nd cloumn  -->

<?php
include('include/footer.php');
?>