<?php
define('TITLE', 'Work Report');
define('PAGE', 'workreport');
include('include/header.php');
include('../dbcon.php');

session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aemail=$_SESSION['aemail']; 
}else{
    echo "<script>location.href='login.php'</script>";
}

?> 

<?php
include('include/footer.php');
?>
