<?php
@include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Cek apakah email sudah terdaftar
    $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select->bind_param("s", $email);
    $select->execute();
    $result = $select->get_result();

    if ($result->num_rows > 0) {
        $message[] = 'Email already registered!';
    } elseif ($password !== $confirm_password) {
        $message[] = 'Passwords do not match!';
    } else {
        // Hash password sebelum menyimpan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert = $conn->prepare("INSERT INTO `users`(name, email, password, user_type) VALUES(?, ?, ?, ?)");
        $user_type = 'user'; // Default tipe user
        $insert->bind_param("ssss", $name, $email, $hashed_password, $user_type);

        if ($insert->execute()) {
            $message[] = 'Registration successful! Please login.';
        } else {
            $message[] = 'Registration failed. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="form-container">
    <form action="" method="post">
        <h3>Register Now</h3>

        <?php
        if (isset($message)) {
            foreach ($message as $msg) {
                echo '<div class="error-msg">' . $msg . '</div>';
            }
        }
        ?>

        <input type="text" name="name" class="box" placeholder="Enter your name" required>
        <input type="email" name="email" class="box" placeholder="Enter your email" required>
        <input type="password" name="password" class="box" placeholder="Enter your password" required>
        <input type="password" name="confirm_password" class="box" placeholder="Confirm your password" required>
        <input type="submit" class="btn" name="submit" value="Register Now">
        <p>Already have an account? <a href="login.php">Login Now</a></p>
    </form>
</section>

</body>
</html>
