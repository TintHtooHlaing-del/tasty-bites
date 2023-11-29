<?php 
    include('connection.php');
    include('login-check.php');
    echo $id = $_GET['id'];
    $sql = "DELETE FROM admin WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if($result==TRUE){      
        $_SESSION['delete'] = "<div style='color:#12bf05;'>Admin was deleted successfully.</div>";
        header('location:admin.php');
    }
?>