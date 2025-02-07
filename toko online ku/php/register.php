<?php
    // register.php
    include 'config.php';

    function registerUser($name, $email, $password) {
        global $conn;
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $passwordHash);
        return $stmt->execute();
    }
    ?>