<?php include('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TastyBites</title>
	<link rel="stylesheet" type="text/css" href="foods.css">
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
    </div>

	<div class="main">
		<h1>Today Special Three</h1>
		<?php 
            if (isset($_SESSION['order-success'])) {
                echo $_SESSION['order-success'];
                unset($_SESSION['order-success']);
            } 
            
         ?>
		<div class="wrap">
			<?php
                $sql2 = "SELECT * FROM dis_products";
                $res2 = mysqli_query($con, $sql2);
                $count2 = mysqli_num_rows($res2);
                if($count2>0){
                $snm2 = 1;
                    while($row2=mysqli_fetch_assoc($res2)){
                        $id2 = $row2['id'];
                        $prd_name2 = $row2['prd_name'];
                        $prd_price2 = $row2['prd_price'];
                        $prd_image2 = $row2['prd_image'];
                        $dis_percent = $row2['dis_percentage'];

                        ?> 

			<div class="dis-prd">
				<div class="img">
								<?php 
                                    if ($prd_name2!="") {
                                        ?>
                                        <img src="img/dis-product/<?php echo $prd_image2; ?>">
                                        <?php
                                    }else{
                                        echo "No image added.";
                                    }
                                    ?>
					<div class="content">
						<h1><?php echo $prd_name2; ?></h1>
						<p><?php echo $dis_percent; ?> % Discount</p>
					</div>
				</div>
						  <?php 


						   ?>
						  <a href="order-form-dis.php?id=<?php echo $id2; ?>" class="od-btn">Order Now</a>
						  </div> 
                            
                        <?php
                    }
                }else{
                    ?>
                    <tr>
                        <td style="color: red; font-size: 40px;">No products to show.</td>
                    </tr>
                    <?php
                }
             ?>				
			</div>
		</div>
	</div>



	<h1 class="h1">All of TastyBites</h1>

	<div class="main2">

		<?php 
                $sql = "SELECT * FROM products";
                $res = mysqli_query($con, $sql);
                $count = mysqli_num_rows($res);
                if($count>0){
                $snm = 1;
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $prd_name = $row['prd_name'];
                        $prd_price = $row['prd_price'];
                        $prd_image = $row['prd_image'];

                        ?>
                            
                           <div class="card">

							<div class="pd-img">
								<?php 
                                    if ($prd_name!="") {
                                        ?>
                                        <img src="img/product/<?php echo $prd_image; ?>">
                                        <?php
                                    }else{
                                        echo "No image added.";
                                    }
                                    ?>

							<div class="content2">
								<h2><?php echo $prd_name ?></h2>
								<p><?php echo $prd_price ?> Ks</p>
							</div>
						  </div>
						  <?php 


						   ?>
						  <a href="order-form.php?id=<?php echo $id; ?>" class="od-btn2">Order Now</a>
						  </div> 
                            
                        <?php
                    }
                }else{
                    ?>
                    <tr>
                        <td style="color: red; font-size: 40px;">No products to show.</td>
                    </tr>
                    <?php
                }
             ?>		
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>