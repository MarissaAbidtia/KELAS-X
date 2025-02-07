<?php
@include 'config.php';

session_start(); // Mulai session

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Cari pengguna berdasarkan email
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifikasi password menggunakan password_verify
        if (password_verify($password, $row['password'])) {
            // Login berhasil, buat session
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];

            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                header('location:admin_page.php');
                exit;
            } else {
                header('location:home.php');
                exit;
            }
        } else {
            $message[] = 'Incorrect password!';
        }
    } else {
        $message[] = 'No user found with that email!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="form-container">
    <form action="" method="post">
        <h3>Login Now</h3>

        <?php
        if (isset($message)) {
            foreach ($message as $msg) {
                echo '<div class="error-msg">' . $msg . '</div>';
            }
        }
        ?>

        <input type="email" name="email" class="box" placeholder="Enter your email" required>
        <input type="password" name="password" class="box" placeholder="Enter your password" required>
        <input type="submit" class="btn" name="submit" value="Login Now">
        <p>Don't have an account? <a href="register.php">Register Now</a></p>
    </form>
</section>

</body>
</html>
