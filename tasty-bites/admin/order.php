<?php 
    include('connection.php');
    include('login-check.php');
    $query = "SELECT * FROM `order` ";
    $result = mysqli_query($con, $query);
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" type="text/css" href="add-product.css">
    
</head>
<body>
    <div>
        <nav class="nav-section">
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
        <h2 style="margin: 30px;">Ordered Foods</h2>
        <?php 
            if(isset($_SESSION['delete-order'])){
                echo $_SESSION['delete-order'];
                unset($_SESSION['delete-order']);
            }
         ?>
        <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Prd name</th>
                <th>Prd price</th>
                <th>Customer</th>
                <th>Quentity</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr><?php 
                 $asn = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                   
            ?>
                <td class="ad1"><?php echo $asn++; ?></td>
                <td><?php echo $row['prd_name']; ?></td>
                <td><?php echo $row['prd_price']; ?> Ks</td>
                <td><?php echo $row['order_user']; ?></td>
                <td><?php echo $row['order_count']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td><?php echo $row['total']; ?> Ks</td>
                <td><?php echo $row['status']; ?></td>
                <td><a href="delete-order.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>         
            <?php 
                }
             ?>  
            </tbody>
        </table>
    </div>
    <?php include ('../footer.php'); ?>   
</body>
</html>
