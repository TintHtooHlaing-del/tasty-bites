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
    <link rel="stylesheet" type="text/css" href="add-product.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
</head>
<body>
    <div>
        <nav class="nav-section">
            <a class="logo" style="text-decoration: none; margin-top: 10px;"><h1>Tasty<span>Bites</span></h1></a>
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


                <h2 class="col-7 m-auto mt-5 mb-4">Contacts</h2>
                <div class="card col-7 m-auto mt-3 mb-4">

            <?php 
                $sql = "SELECT * FROM contact";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if ($count>0) {
                    while($row=mysqli_fetch_assoc($result)){
                    $name = $row['name'];
                    $email = $row['email'];
                    $subject = $row['subject'];
                    $date = $row['contact_date'];

                    ?> 
                  <div class="card-header">
                    Customer Contact
                  </div>
                    
                  <div class="card-body height-30%">
                    <blockquote class="blockquote mb-0">
                    <p><?php echo $subject; ?></p>
                    </blockquote>
                    <p>-from <?php echo $name; ?>(<?php echo $email; ?>)</p> 
                    <p>-date <?php echo $date; ?></p> 
                </div><hr>
                  <?php
                    }
                }        
                   
             ?> </div>
    <?php include('footer.php'); ?>
</body>
</html>
