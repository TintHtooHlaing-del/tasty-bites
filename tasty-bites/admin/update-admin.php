
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
                <ul><a href="logout.php" style="text-decoration: none;">logout</a></ul>
            </div>
        </nav>
    </div>
<?php 
    include('connection.php');
    include('login-check.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM admin WHERE ID=$id";
    $result = mysqli_query($con, $sql);
    if($result==TRUE){
        $count = mysqli_num_rows($result);
        if($count==1){
            $row = mysqli_fetch_assoc($result);
            $name = $row['Name'];
            $email = $row['Email'];
            $password = $row['Password'];
        }else{
            header('location:admin.php');
        }
    }
 ?>
    <div class="main">
        <form method="POST">
            <table>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                    <td><input type="submit" name="submit" value="Update Admin"></td>
                </tr>
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="name" placeholder="Enter your name" value="<?php echo $name; ?>" required></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" placeholder="Enter your email" value="<?php echo $email ?>" required></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="text" name="password" placeholder="Enter your password" value="<?php echo "$password"; ?>" required></td>
                </tr>
            </table>
        </form>
        
    </div>
    <?php include ('../footer.php'); ?>
</body>
</html>

<?php 
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "UPDATE admin SET
        Name = '$name',
        Email= '$email',
        Password= '$password' 
        WHERE ID= '$id'";
        $res = mysqli_query($con, $sql);
        if ($res==TRUE) {
            $_SESSION['update'] = "<div style='color:#12bf05;'>Admin is updated successfully.</div>";
            header('location:admin.php');
        }
    }
 ?>

