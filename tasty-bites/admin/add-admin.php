<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="add-product.css">
    <link rel="stylesheet" type="text/css" href="add-admin.css">
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
                <ul><a href="add-category.php">category</a></ul>
                <ul><a href="order.php" style="text-decoration: none;">order</a></ul>
                <ul><a href="logout.php">logout</a></ul>
            </div>
        </nav>
    </div>

    <div class="main">
        <form method="POST">
            <table>
                <tr>
                    <td><input type="submit" name="submit" value="Add Admin"></td>
                </tr>
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="name" placeholder="Enter your name" required></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" placeholder="Enter your email" required></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter your password" required></td>
                </tr>
            </table>
        </form>
        
    </div>
    <?php include ('../footer.php'); ?>
</body>
</html>

<?php 
    error_reporting(1);
    include('connection.php');
    include('login-check.php');


    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO admin SET
                Name='$name',
                Email='$email',
                Password='$password'
        ";
    $res = mysqli_query($con, $sql) or die(msql_error());
    header("location:admin.php");
    }
    if ($res==TRUE) {
        $_SESSION['add'] = "<div style='color:#12bf05'>Admin added successfully.</div>";
    }
 ?>