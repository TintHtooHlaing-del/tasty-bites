<?php  
	include('connection.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TastyBites</title>
	<link rel="stylesheet" type="text/css" href="contact.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-7aap41XV99g4fBDOek5XcA1z1xJ2z5qo8g+Vhkyj1+uSjufmbF5tDoNU39pL1ZiKkiR8tSZqkOgN/iZyefQ7g==" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css2?family=Style+Script&display=swap" rel="stylesheet">
</head>
<body>
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



    <form method="POST">
        <h2>Contact us</h2>
        <?php
            if (isset($_SESSION['contact-success'])) {
                echo $_SESSION['contact-success'];
                unset($_SESSION['contact-success']);
            }
        ?>

        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="content">Subject:</label>
        <textarea id="content" name="subject" rows="4" required></textarea>

        <button type="submit" name="submit">Submit</button>
    </form>
    <?php include ('footer.php'); ?>
</body>
</html>

<?php 
    date_default_timezone_set('Asia/Yangon');
    if (isset($_POST['submit'])) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $date = date("Y-m-d h:i:sa");

        $sql = "INSERT INTO contact SET
                name='$name',
                email='$email',
                subject='$subject',
                contact_date='$date'
                ";

        $result = mysqli_query($con, $sql) or die(mysqli_error());
        if ($result==true) {
            $_SESSION['contact-success'] = "<div style='color:green;'>Contacted successfully.</div><br>";


    }
}
 ?>


