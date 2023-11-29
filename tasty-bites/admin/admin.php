<?php 
    include('connection.php');
    include('login-check.php');
    $query = "SELECT * FROM admin";
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

    <div class="main-admin" style="width:80%; margin: auto;">
        <h2 style="margin: 30px;">Admins</h2>
        <?php 
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
         ?>
        <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr><?php 
                 $asn = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                   
            ?>
                <td class="ad1"><?php echo $asn++; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><a href="update-admin.php?id=<?php echo $row['ID']; ?>" class="btn btn-success">Edit</a></td>
                <td><a href="delete-admin.php?id=<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a></td>
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
