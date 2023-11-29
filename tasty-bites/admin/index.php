

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Login Form</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php 
            include('connection.php');
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if (isset($_SESSION['no-login'])) {
                echo $_SESSION['no-login'];
                unset($_SESSION['no-login']);
            }
         ?><br><br>
        <form action="" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="btn-container">
                <button type="submit" name="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE Name='$username' AND Password='$password'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count==1) {
        $_SESSION['login'] = "<div style='color:#12bf05'>Login success.</div>.";
        $_SESSION['user'] = $username;
        header('location:product.php');
    }else{
        $_SESSION['login'] = "<div style='color:red'>Invalid username* or password*.</div>";
        header('location:index.php');

    }
}

 ?>
