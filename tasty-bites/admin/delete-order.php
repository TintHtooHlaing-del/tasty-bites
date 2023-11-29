<?php 
    include('connection.php');
    include('login-check.php');
    echo $id = $_GET['id'];
    $sql = "DELETE FROM `order` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if($result==TRUE){      
        $_SESSION['delete-order'] = "<div style='color:#12bf05;'>Order Deleted.</div>";
        header('location:order.php');
    }
?>