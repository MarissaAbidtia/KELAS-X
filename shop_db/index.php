<?php
@include 'config.php';

// Proses tambah produk
if (isset($_POST['add_product'])) {
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_image = $_FILES['product_image']['name'];
    $image_tmp_name = $_FILES['product_image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $product_image;

    // Periksa apakah nama produk sudah ada di database
    $check_product = mysqli_query($conn, "SELECT * FROM `products` WHERE name = '$product_name'") or die('query failed');

    if (mysqli_num_rows($check_product) > 0) {
        $message[] = 'Product name already exists!';
    } else {
        // Tambahkan produk ke tabel "products"
        $insert_product = mysqli_query($conn, "INSERT INTO `products`(name, price, quantity, image) VALUES('$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');

        if ($insert_product) {
            // Upload gambar ke folder
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Product added successfully!';
        } else {
            $message[] = 'Failed to add product!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Product</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         padding: 20px;
         background-color: #f4f4f4;
      }
      .form-container {
         max-width: 500px;
         margin: 0 auto;
         background: #fff;
         padding: 20px;
         border-radius: 8px;
         box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }
      .form-container h1 {
         margin-bottom: 20px;
         font-size: 24px;
      }
      .form-container .input-box {
         margin-bottom: 15px;
      }
      .form-container .input-box label {
         display: block;
         margin-bottom: 5px;
         font-weight: bold;
      }
      .form-container .input-box input {
         width: 100%;
         padding: 10px;
         border: 1px solid #ddd;
         border-radius: 4px;
      }
      .form-container button {
         width: 100%;
         padding: 10px;
         border: none;
         background-color: #28a745;
         color: #fff;
         font-size: 16px;
         border-radius: 4px;
         cursor: pointer;
      }
      .form-container button:hover {
         background-color: #218838;
      }
      .message {
         margin-bottom: 15px;
         padding: 10px;
         border: 1px solid #ccc;
         background: #f9f9f9;
         border-radius: 4px;
      }
   </style>
</head>
<body>

<div class="form-container">
   <h1>Add Product</h1>

   <?php
   if (isset($message)) {
      foreach ($message as $msg) {
         echo '<div class="message">' . $msg . '</div>';
      }
   }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="input-box">
         <label for="product_name">Product Name:</label>
         <input type="text" name="product_name" id="product_name" required>
      </div>
      <div class="input-box">
         <label for="product_price">Product Price (Rp):</label>
         <input type="number" name="product_price" id="product_price" required>
      </div>
      <div class="input-box">
         <label for="product_quantity">Product Quantity:</label>
         <input type="number" name="product_quantity" id="product_quantity" min="1" required>
      </div>
      <div class="input-box">
         <label for="product_image">Product Image:</label>
         <input type="file" name="product_image" id="product_image" accept="image/*" required>
      </div>
      <button type="submit" name="add_product">Add Product</button>
   </form>
</div>

</body>
</html>
