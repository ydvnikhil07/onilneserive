<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('include/header.php');
include('../dbcon.php');

session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aemail=$_SESSION['aemail']; 
}else{
    echo "<script>location.href='login.php'</script>";
}
?>

<div class="col-sm-9 col-md-10"><!--start Dashboard 2nd column -->

    <div class="row text-center mx-5">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Requests Received</div>
                <div class="card-body">
                    <h4 class="card-title">43</h4>
                    <a class="btn text-white" href="#">View</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Assigned Work</div>
                <div class="card-body">
                    <h4 class="card-title">23</h4>
                    <a class="btn text-white" href="#">View</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">No. of Technician</div>
                <div class="card-body">
                    <h4 class="card-title">3</h4>
                    <a class="btn text-white" href="#">View</a>
                </div>
            </div>
        </div>
    </div>


    <div class="mx-5 mt-5 text-center">
        <p class="bg-dark text-white p-2">List of Requesters</p>
        <?php
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            echo '
    <table class="table">
    <thead>
<tr> 
<th scope="col">Requester ID</th>
<th scope="col">Name</th>
<th scope="col">Email</th>
</tr>
     </thead>
     <tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["r_login_id"] . '</td>';
                echo '<td>' . $row["r_name"] . '</td>';
                echo '<td>' . $row["r_email"] . '</td>';
                echo '</tr>';
            }
            '</tbody>
      </table>';
        } else {
            echo '0 Result';
        }
        ?>
    </div>
</div><!--End Dashboard 2nd column -->
<?php
include('include/footer.php');
?>