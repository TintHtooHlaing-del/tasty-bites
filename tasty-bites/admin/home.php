<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<?php 


 ?>
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

    <div class="main">
        <form>
            <table>
            <tr>
                <td><input type="submit" name="" value="Add Product" class="submit"></td>
            </tr>

            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>


            <tr>
                <td class="prd-name">Product Name: </td>
                <td><input type="text" name="" required></td>
            </tr>
                
            <tr>
                <td>Product Price: </td>
                <td><input type="text" name="" required></td>
            </tr>
                
            <tr>
                <td>Discount: </td>
                <td><input type="text" name=""></td>
            </tr>
            <tr>
                <td>Category: </td>
                <td>
                    <select class="category" required>
                    <option><a href="" class="ctg-list"></a></option>
                    <option><a href="" class="ctg-list">drink</a></option>
                    <option><a href="" class="ctg-list">burger</a></option>
                    <option><a href="" class="ctg-list">pizza</a></option>
                    <option><a href="" class="ctg-list">barbecue</a></option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Product image: </td>
                <td><input type="file" name="" required></td>
            </tr>

        </table>
        </form>
        
    </div>

    <footer>
        <p>
            © 2023 TestyBites <br>
            All rights reserved. Made by <a href="">Tint Htoo Hlaing</a>.
        </p>
    </footer>
</body>
</html>
