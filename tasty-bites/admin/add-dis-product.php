<?php
    include('connection.php');
    include('login-check.php'); 
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
                <td><input type="submit" name="submit" value="Add Product" class="submit"></td>
            </tr>

            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>


            <tr>
                <td class="prd-name">Product Name: </td>
                <td><input type="text" name="prd_name" required></td>
            </tr>
                
            <tr>
                <td>Product Price: </td>
                <td><input type="number" name="prd_price" required></td>
            </tr>
                
            <tr>
                <td>Discount(%): </td>
                <td><input type="number" name="dis_percent" required></td>
            </tr>
                
            <tr>
                <td><input type="hidden" name="dis_price" value="<?php echo $dis_price; ?>" required></td>
            </tr>

            <tr>
                <td>Product image: </td>
                <td><input type="file" name="prd_image" required></td>
            </tr>

        </table>
        </form>
        
    </div>
    <?php include ('../footer.php'); ?>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $prd_name = $_POST['prd_name'];
        $prd_price = $_POST['prd_price'];
        $dis_percent = $_POST['dis_percent'];
        $dis_price = ($prd_price/100)*(100-$dis_percent);

        if (isset($_FILES['prd_image']['name'])) {
            $img_name = $_FILES['prd_image']['name'];
            $ext = end(explode('.', $img_name));
            $img_name = "discount_food_".rand(000, 999).'.'.$ext;
            $source_path = $_FILES['prd_image']['tmp_name'];
            $destination = "../img/dis-product/".$img_name;
            $upload = move_uploaded_file($source_path, $destination);
            if ($upload==FALSE) {
                $_SESSION['fail_up_img'] = "<div style='color:red;'>Failed to upload image.</div>";
                header('location:add-dis-product.php');
                die();
            }
        }else{
            $img_name = "";
        }

        $sql = "INSERT INTO dis_products (prd_name, prd_price, dis_percentage, prd_image, dis_price) VALUES ('$prd_name', '$prd_price', '$dis_percent', '$img_name', '$dis_price')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $_SESSION['prd_add'] = "<div style='color:#12bf05;'>Product is added successfully.</div>";
            header('location: dis-product.php');
            exit; // Ensure no further code execution after redirection
        }
    }
?>

