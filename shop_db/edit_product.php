<?php
@include 'config.php';

// Check the database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['update_product'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_details = $_POST['product_details'];

    // Ensure a product image is set (handle case when no image is uploaded)
    $product_image = $_FILES['product_image']['name'];
    if ($product_image != '') {
        // Image upload logic
        $image_tmp_name = $_FILES['product_image']['tmp_name'];
        $image_folder = 'uploads/' . $product_image;
        move_uploaded_file($image_tmp_name, $image_folder);
        $update_image_query = ", image = '$product_image'"; // Include image in query if new image is uploaded
    } else {
        $update_image_query = ''; // If no image is uploaded, don't include it in the query
    }

    // Update product query
    $update_query = "UPDATE `products` SET 
                        name = '$product_name', 
                        price = '$product_price', 
                        quantity = '$product_quantity', 
                        details = '$product_details' 
                        $update_image_query 
                    WHERE id = '$product_id'";

    // Execute the query
    $update_product = mysqli_query($conn, "UPDATE `products` SET name = '$product_name', price = '$product_price', details = '$product_details' WHERE id = '$product_id'") or die('query failed');


    // Check if the query was successful
    if ($result) {
        echo 'Product updated successfully!';
    } else {
        echo 'Failed to update product: ' . mysqli_error($conn); // Output the error if query fails
    }
}
?>
