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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
    <div>
        <nav class="nav-section" style="position: fixed; top:0;">
            <a class="logo" style="text-decoration: none; padding-top: 10px;"><h1>Tasty<span>Bites</span></h1></a>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <div class="menu">
                <ul><a href="add-product.php" style="text-decoration: none;">add product</a></ul>
                <ul><a href="admin.php" style="text-decoration: none;">admin</a></ul>
                <ul><a href="add-admin.php" style="text-decoration: none;">add admin</a></ul>
                <ul><a href="product.php" style="text-decoration: none;">products</a></ul>
                <ul><a href="order.php" style="text-decoration: none;">order</a></ul>
                <ul><a href="logout.php" style="text-decoration: none;">logout</a></ul>
            </div>
        </nav>
    </div>

    <div class="main-admin" style="width:80%; margin: 100px auto 20px;">
        <h2 style="margin: 30px;">Products</h2>
        <?php 
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            } 
            if (isset($_SESSION['prd_add'])) {
                echo $_SESSION['prd_add'];
                unset($_SESSION['prd_add']);
            }
            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if (isset($_SESSION['fail'])) {
                echo $_SESSION['fail'];
                unset($_SESSION['fail']);
            }
            if (isset($_SESSION['no-prd-found'])) {
                echo $_SESSION['no-prd-found'];
                unset($_SESSION['no-prd-found']);
            }
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            
         ?>
        <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>pd-Image</th>
                <th>pd-Name</th>
                <th>Price</th>
                <th>Discount(%)</th>
                <th>Discount-Price</th>
                <th>Edit</th>
              </tr>
            </thead>
            <?php 
                $sql = "SELECT * FROM dis_products";
                $res = mysqli_query($con, $sql);
                $count = mysqli_num_rows($res);
                if($count>0){
                $snm = 1;
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $prd_name = $row['prd_name'];
                        $prd_price = $row['prd_price'];
                        $dis_percent = $row['dis_percentage'];
                        $dis_price = $row['dis_price'];
                        $prd_image = $row['prd_image'];

                        ?>
                            
                            <tr>
                                <td class="ad1" style="line-height:70px;"><?php echo $snm++; ?></td>

                                <td>
                                    <?php 
                                    if ($prd_name!="") {
                                        ?>
                                        <img src="../img/dis-product/<?php echo $prd_image; ?>" width="70px" height="70px">
                                        <?php
                                    }else{
                                        echo "No image added.";
                                    }
                                    ?>
                                     
                                 </td>

                                <td style="line-height: 70px"><?php echo $prd_name; ?></td>
                                <td style="line-height: 70px"><?php echo $prd_price." Ks"; ?></td>
                                <td style="line-height: 70px"><?php echo $dis_percent." (%)"; ?></td>
                                <td style="line-height: 70px"><?php echo $dis_price." Ks"; ?></td>
                                <td style="line-height: 70px"><a href="update-dis-product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                            </tr> 
                            
                        <?php
                    }
                }else{
                    ?>
                    <tr>
                        <td style="color: #964646; font-size: 40px;" colspan="7">No products to show.</td>
                    </tr>
                    <?php
                }
             ?>
        </table>
    </div>
    <?php include ('../footer.php'); ?>
</body>
</html>
