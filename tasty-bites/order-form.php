<?php 
    include('connection.php');
    if (!isset($_SESSION['user'])) {
        header('location:login.php');
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id=$id";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if ($count==1) {
            $row = mysqli_fetch_assoc($result);
            $prd_name = $row['prd_name'];
            $prd_price = $row['prd_price'];
            $prd_image = $row['prd_image'];
        }else{
            $_SESSION['no-prd-found'] = "<div style='color:red;'>No Product Found.</div>";
            header('location:product.php');
        }
    }else{
        header('location:product.php');
    }
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TastyBites</title>
    <link rel="stylesheet" type="text/css" href="order-form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Style+Script&display=swap" rel="stylesheet">
</head>
<body>
    <div>
        <nav class="nav-section">
            <a class="logo" href="index.php"><h1>Tasty<span>Bites</span></h1></a>
            <input type="checkbox" id="check">
            
            <div class="menu">
                <ul><a href="index.php">HOME</a></ul>
                <ul><a href="foods.php">FOODS</a></ul>

                <ul><select class="category" onchange="redirectToCategory(this)">
                    <option value="" class="ctg-list">category</option>
                    <option value="drink.php" class="ctg-list"><?php echo $drink="drink"; ?></option>
                    <option value="burger.php" class="ctg-list"><?php echo $burger="burger"; ?></option>
                    <option value="pizza.php" class="ctg-list"><?php echo $pizza="pizza"; ?></option>
                    <option value="barbecue.php" class="ctg-list"><?php echo $barbecue="barbecue"; ?></option>
                    <option value="other.php" class="ctg-list"><?php echo $other="other"; ?></option>
                </select>

                <script>
                    function redirectToCategory(select) {
                        var selectedValue = select.value;
                        if (selectedValue) {
                            window.location.href = selectedValue;
                        }
                    }
                </script>

                </a></ul>
                <ul><a href="contact.php">CONTACT</a></ul>
                <ul><a href="<?php 

                                if (!isset($_SESSION['user'])) {
                                    echo "login.php";
                                }else{
                                    echo "logout.php";
                                }

                            ?>">
                            <?php 

                                if (!isset($_SESSION['user'])) {
                                    echo "LOGIN";
                                }else{
                                    echo "LOGOUT";
                                }
                            ?>
                                            
                </a></ul>
            </div>
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
        </nav>
    </div><br><br><br><br><br><br>

    <div>
        <form method="POST" enctype="multipart/form-data">
        <h2>Order Here</h2><br><br>
        <div class="detail">
                <?php 
                if ($prd_name!="") {
                ?>
                    <img src="img/product/<?php echo $prd_image; ?>" name="prd_image">              
                <?php
                }else{
                    echo "No image added.";
                }
                ?>
            <h4 class="pd-name"><?php echo $prd_name; ?></h4>
            <p class="pd-price">Price: <?php echo $prd_price; ?> Ks</p>
        </div><br><br>

        <input type="hidden" name="prd_name" value="<?php echo $prd_name; ?>">
        <input type="hidden" name="prd_price" value="<?php echo $prd_price; ?>">

        <label for="name">Number of Order:</label>
        <input type="number" name="order_count" min="1" required>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="address">Delivery Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea>

        <button type="submit" name="submit">Place Order</button>
    </form>
    </div>
    <?php include ('footer.php'); ?>
 
</body>
</html>

<?php 
    date_default_timezone_set('Asia/Yangon');
    if (isset($_POST['submit'])) {
        $prd_name2 = $_POST['prd_name'];
        $prd_price2 = $_POST['prd_price'];
        $order_count = $_POST['order_count'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $total = $order_count * $prd_price2;
        $order_date = date("Y-m-d h:i:sa");
        $status = "ordered";

        $sql2 = "INSERT INTO `order` SET 
            prd_name = '$prd_name2',
            prd_price = $prd_price2,
            order_count = $order_count,
            order_user = '$name',
            phone = '$phone',
            address = '$address',
            total = $total,
            order_date = '$order_date',
            status = '$status'";

        $result2 = mysqli_query($con, $sql2) or die(mysqli_error());
        if ($result2==true) {
            $_SESSION['order-success'] = "<center><div style='color:green; font-size: 20px;'>We have received your order and we will deliver it as soon as possible. Thank you.</div></center>";
            header('location:foods.php');
        }
        
    }

?>

