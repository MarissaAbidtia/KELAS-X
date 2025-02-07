<?php
@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if (isset($_POST['add_product'])) {
    // Tangkap data dari form
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_quantity = mysqli_real_escape_string($conn, $_POST['product_quantity']);
    $product_image = $_FILES['product_image']['name'];
    $image_tmp_name = $_FILES['product_image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $product_image;

    // Upload gambar ke folder
    if (move_uploaded_file($image_tmp_name, $image_folder)) {
        // Masukkan data ke tabel orders
        $insert_order = mysqli_query($conn, "INSERT INTO `orders` (product_name, product_price, product_quantity, product_image) VALUES ('$product_name', '$product_price', '$product_quantity', '$product_image')") or die(mysqli_error($conn));
        
        if ($insert_order) {
            $message[] = "Product successfully added to orders!";
        } else {
            $message[] = "Failed to add product to orders.";
        }
    } else {
        $message[] = "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Product</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <style>
    .add-product-form {
        max-width: 500px;
        margin: 2rem auto;
        padding: 2rem;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }
    
    .form-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
    }
    
    .btn-submit {
        width: 100%;
        padding: 0.75rem;
        background: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.3s ease;
    }
    
    .btn-submit:hover {
        background: #45a049;
    }
    
    .message {
        background: #e8f5e9;
        color: #2e7d32;
        padding: 1rem;
        border-radius: 4px;
        margin-bottom: 1rem;
    }
   </style>
</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>Add Product</h3>
    <p><a href="home.php">home</a> / add product</p>
</section>

<section class="add-product-section">
    <div class="add-product-form">
        <?php
        if(isset($message)){
            foreach($message as $msg){
                echo '<div class="message">'.$msg.'</div>';
            }
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" required>
            </div>

            <div class="form-group">
                <label for="product_price">Product Price (Rp):</label>
                <input type="number" id="product_price" name="product_price" required>
            </div>

            <div class="form-group">
                <label for="product_quantity">Product Quantity:</label>
                <input type="number" id="product_quantity" name="product_quantity" required>
            </div>

            <div class="form-group">
                <label for="product_image">Product Image:</label>
                <input type="file" id="product_image" name="product_image" accept="image/*" required>
            </div>

            <button type="submit" name="add_product" class="btn-submit">Add Product</button>
        </form>
    </div>
</section>

<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>