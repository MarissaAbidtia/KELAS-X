<?php
@include 'config.php';

if (isset($_POST['delete_product'])) {
    $product_id = $_POST['product_id'];

    // Delete the product from the database
    $delete_query = "DELETE FROM `products` WHERE id = '$product_id'";

    if (mysqli_query($conn, $delete_query)) {
        echo '<p class="message">Product deleted successfully!</p>';
        header('Location: home.php'); // Redirect to the home page after deletion
    } else {
        echo '<p class="error">Failed to delete product. Please try again.</p>';
    }
}
?>
