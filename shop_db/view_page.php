<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_wishlist'])){

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    
    $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_wishlist_numbers) > 0){
        $message[] = 'already added to wishlist';
    }elseif(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{
        mysqli_query($conn, "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
        $message[] = 'product added to wishlist';
    }

}

if(isset($_POST['add_to_cart'])){

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{

        $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

        if(mysqli_num_rows($check_wishlist_numbers) > 0){
            mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
        }

        mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'product added to cart';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quick view</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="quick-view">

    <h1 class="title">product details</h1>

    <?php  
        if(isset($_GET['pid'])){
            $pid = $_GET['pid'];
            $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$pid'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
    ?>
    <section class="quick-view">
    

    <?php  
        if(isset($_GET['pid'])){
            $pid = $_GET['pid'];
            $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$pid'") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
    ?>
    <!-- Update Product Form -->
    <form action="edit_product.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
        <input type="text" name="product_name" value="<?php echo $fetch_products['name']; ?>" required>
        <input type="number" name="product_price" value="<?php echo $fetch_products['price']; ?>" required>
        <input type="number" name="product_quantity" value="<?php echo $fetch_products['quantity']; ?>" required>

        <!-- Ensuring 'product_details' is set -->
        <textarea name="product_details" placeholder="Enter product details"><?php echo isset($fetch_products['details']) ? $fetch_products['details'] : ''; ?></textarea>

        <input type="file" name="product_image" accept="image/*">
        <button type="submit" name="update_product">Update Product</button>
    </form>

    <!-- Delete Product Button -->
    <form action="delete_product.php" method="post" onsubmit="return confirm('Are you sure you want to delete this product?');">
        <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
        <button type="submit" name="delete_product" style="background-color: red; color: white;">Delete Product</button>
    </form>

    <?php
                }
            }else{
                echo '<p class="empty">Product not found!</p>';
            }
        }
    ?>
</section>

    <form action="" method="POST">
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
         <?php
@include 'config.php';

if (isset($_GET['pid'])) {
    $product_id = $_GET['pid'];

    // Query to get product details
    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'");

    if (mysqli_num_rows($select_product) > 0) {
        $fetch_product = mysqli_fetch_assoc($select_product);

        // Safely access array keys
        $product_name = isset($fetch_product['name']) ? $fetch_product['name'] : 'Name not available';
        $product_price = isset($fetch_product['price']) ? $fetch_product['price'] : 'Price not available';
        $product_details = isset($fetch_product['details']) ? $fetch_product['details'] : 'Details not available';
    } else {
        echo "Product not found!";
        exit;
    }
} else {
    echo "Product ID not provided!";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product View</title>
</head>
<body>
<?php
    @include 'config.php';

    if (isset($_GET['pid'])) {
        $product_id = $_GET['pid'];

        // Query to get product details
        $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'");

        if (mysqli_num_rows($select_product) > 0) {
            $fetch_product = mysqli_fetch_assoc($select_product);

            // Safely access array keys
            $product_name = isset($fetch_product['name']) ? $fetch_product['name'] : 'Name not available';
            $product_price = isset($fetch_product['price']) ? $fetch_product['price'] : 'Price not available';
            $product_details = isset($fetch_product['details']) ? $fetch_product['details'] : 'Details not available';
            $product_image = isset($fetch_product['image']) ? 'uploads/' . $fetch_product['image'] : ''; // Adjust image path to match your folder structure
        } else {
            echo "Product not found!";
            exit;
        }
    } else {
        echo "Product ID not provided!";
        exit;
    }
    ?>


    <h1>Product: <?php echo $product_name; ?></h1>
    <p>Price: ₹<?php echo $product_price; ?></p>
    <p>Details: <?php echo $product_details; ?></p>
    <!-- Debugging: Show the path -->
   
    <?php if (!empty($product_image)): ?>
        <img src="<?php echo $product_image; ?>" alt="Product Image" width="300">
    <?php else: ?>
        <p>No image available</p>
    <?php endif; ?>
</body>
</html>

         
         <input type="number" name="product_quantity" value="1" min="0" class="qty">
         <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
         <input type="submit" value="add to wishlist" name="add_to_wishlist" class="option-btn">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      </form>
    <?php
            }
        }else{
        echo '<p class="empty">no products details available!</p>';
        }
    }
    ?>

    <div class="more-btn">
        <a href="home.php" class="option-btn">go to home page</a>
    </div>

</section>

<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>