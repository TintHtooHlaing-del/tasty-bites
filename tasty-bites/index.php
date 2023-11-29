<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TastyBites</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Style+Script&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.jpg" />
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
            </div>
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
        </nav>
    </div>

	<div class="main">
		<div class="welcome">
			<h1>Welcome to Our Food Service</h1>
			<p>"Welcome to [Tasty<span>Bites</span>], where convenience meets <br> culinary excellence. Browse our delectable menu and indulge in a world of flavors, <br> all delivered to your door in no time."</p>
			<a href="foods.php" class="tofood">Browse Foods</a>
		</div>
	</div>
</body>
</html>