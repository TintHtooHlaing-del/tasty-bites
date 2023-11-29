<?php
    include('connection.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM dis_products WHERE id=$id";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if ($count==1) {
            $row = mysqli_fetch_assoc($result);
            $prd_name = $row['prd_name'];
            $prd_price = $row['prd_price'];
            $dis_percent = $row['dis_percentage'];
            $dis_price = $row['dis_price'];
            $current_image = $row['prd_image'];
        }else{
            $_SESSION['no-prd-found'] = "<div style='color:red;'>No Product Found.</div>";
            header('location:dis-product.php');
        }
    }else{
        header('location:dis-product.php');
    }
 ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="add-product.css">
    
</head>
<body>
    <div>
        <nav class="nav-section">
            <a class="logo"><h1>Tasty<span>Bites</span></h1></a>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <div class="menu">
                <ul><a href="add-product.php">add product</a></ul>
                <ul><a href="admin.php">admin</a></ul>
                <ul><a href="add-admin.php">add admin</a></ul>
                <ul><a href="product.php">products</a></ul>
                <ul><a href="order.php" style="text-decoration: none;">order</a></ul>
                <ul><a href="logout.php" style="text-decoration: none;">logout</a></ul>
            </div>
        </nav>
    </div>

    <div class="main">
        <?php 
            if (isset($_SESSION['fail_up_img'])) {
                echo $_SESSION['fail_up_img'];
                unset($_SESSION['fail_up_img']);
            }
         ?>
        <form method="POST" enctype="multipart/form-data">
            <table>
            <tr>
                <td>
                    <input type="hidden" name="current_img" value="<?php echo $prd_image; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Update Product" class="submit">
                </td>
            </tr>

            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>


            <tr>
                <td class="prd-name">Product Name: </td>
                <td><input type="text" name="prd_name" value="<?php echo $prd_name; ?>" required></td>
            </tr>
                
            <tr>
                <td>Product Price: </td>
                <td><input type="number" name="prd_price" value="<?php echo $prd_price; ?>" required></td>
            </tr>
                         
            <tr>
                <td>Discount(%): </td>
                <td><input type="number" name="dis_percent" value="<?php echo $dis_percent; ?>" required></td>
            </tr>
                
            <tr>
                <td><input type="hidden" name="dis_price" value="<?php echo $dis_price2; ?>" required></td>
            </tr>
           
            <tr>
                <?php 
                if ($prd_name!="") {
                ?>
                <td>Product image: </td>
                <td>
                    <img src="../img/dis-product/<?php echo $current_image; ?>" style="margin-left: 10px;" width="70px" height="70px" name="current_img">
                </td>
                
                <?php
                }else{
                    echo "No image added.";
                }
                ?>
            </tr>
                
 
            <tr>
                <td>Update image: </td>
                <td><input type="file" name="prd_image"></td>
            </tr>
            
        </table>
        </form>

        <?php 
            // ...

            if (isset($_POST['submit'])) {
                $prd_name = $_POST['prd_name'];
                $prd_price = $_POST['prd_price'];
                $dis_percent = $_POST['dis_percent'];
                $dis_price2 = ($prd_price/100)*(100-$dis_percent);
                $prd_image = $_FILES['prd_image']['name'];

                if (isset($_FILES['prd_image']['name'])) {
                    $prd_image = $_FILES['prd_image']['name'];

                    if ($prd_image != "") {
                        $ext = end(explode('.', $prd_image));
                        $prd_image = "discount_food_".rand(000, 999).'.'.$ext;
                        $source_path = $_FILES['prd_image']['tmp_name'];
                        $destination = "../img/dis-product/".$prd_image;
                        $upload = move_uploaded_file($source_path, $destination);
                        if ($upload==FALSE) {
                            $_SESSION['fail_up_img'] = "<div style='color:red;'>Failed to upload image.</div>";
                            header('location:dis-product.php');
                            die();
                        }
                        $remove = unlink('../img/dis-product/'.$current_image);
                        if ($remove==FALSE) {
                            $_SESSION['fail'] = "<div style='color:red;'>Failed to remove current image.</div>";
                            header('location:dis-product.php');
                            die();
                        }

                    }else{
                        $prd_image = $current_image;
                    }
                }else{
                    $prd_image = $current_image;
                }

                $sql2 = "UPDATE dis_products SET
                         prd_name='$prd_name',
                         prd_image='$prd_image',
                         dis_percentage='$dis_percent',
                         dis_price='$dis_price2',
                         prd_price='$prd_price'
                         WHERE id=$id";

                $result2 = mysqli_query($con, $sql2);
                if ($result2 == true) {
                    $_SESSION['update'] = "<div style='color:#12bf05;'>Product updated successfully.</div>";
                    header('location:dis-product.php');
                } else {
                    $_SESSION['update-fail'] = "<div style='color:red;'>Product update failed.</div>";
                }
            
            }
         ?>
        
    </div>
    <?php include ('../footer.php'); ?>
</body>
</html>

 