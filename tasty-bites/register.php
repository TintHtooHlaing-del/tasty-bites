<?php 
	include ('connection.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TastyBites</title>
	<link rel="stylesheet" type="text/css" href="register.css">
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
				    <option value="burger.php" class="ctg-list"><?php echo $drink="burger"; ?></option>
				    <option value="pizza.php" class="ctg-list"><?php echo $drink="pizza"; ?></option>
				    <option value="barbecue.php" class="ctg-list"><?php echo $drink="barbecue"; ?></option>
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
    </div>

	<form method="POST" action="">
		<div class="wrap">
			<h2>Register Here</h2>

			<?php 
            if (isset($_SESSION['fail'])) {
                echo $_SESSION['fail'];
                unset($_SESSION['fail']);
            } 

			 ?>

			<table class="login-table">
			<tr>
				<td>Username: </td>
				<td><input type="text" name="username" placeholder="username" ></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password" placeholder="password" ></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type="email" name="email" placeholder="email address" ></td>
			</tr>
			<tr>
				<td>Phone: </td>
				<td><input type="text" name="mobile" placeholder="mobile number" ></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Sign Up"></td>
			</tr>
			</table>	
		</div>						
	</form>
</body>
</html>

<?php 
	$sql = "SELECT * FROM users";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);
	if($count>0){
		while ($row=mysqli_fetch_assoc($result)) {
			$current_email = $row['email'];
			$current_mobile = $row['mobile'];
		}
	}
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$new_email = $_POST['email'];
		$new_mobile = $_POST['mobile'];
		if ($new_email != $current_email && $new_mobile != $current_mobile) {
			$sql2 = "INSERT INTO users SET
					username = '$username',
					password = '$password',
					email = '$new_email',
					mobile = '$new_mobile'
				";
		}else{
			$_SESSION['fail'] = "<center><div style='color:red;'>Email* or Phone Number* already exists.</div></center>";
			header('location:register.php');
		}
		$_SESSION['success'] = "<center><div style='color:lightgreen;'>Please login here to order our delicious foods.</div></center>";
		header('location:login.php');
	}
 ?>