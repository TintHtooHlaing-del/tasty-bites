<?php 
    include('connection.php');
    include('login-check.php');
    if (isset($_GET['id']) && isset($_GET['prd_image'])) {
        $id = $_GET['id'];
        $prd_image = $_GET['prd_image'];

        if ($prd_image != "") {
            $path = "../img/product/".$prd_image;
            $remove = unlink($path);

            if ($remove == false) {
                $_SESSION['fail'] = "<div style='color:red;'>Failed to remove product image.</div>";
                header('location:product.php');
                die();
            }
        }
    $sql = "DELETE FROM products WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if($result==true){      
        $_SESSION['delete'] = "<div style='color:#12bf05;'>Product was deleted successfully.</div>";
        header('location:product.php');
    }

    }
    else{
        header('location:product.php');
    }
?>