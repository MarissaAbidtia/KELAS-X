<?php
    // contact.php
    include 'config.php';

    function sendMessage($name, $email, $message) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        return $stmt->execute();
    }
    ?>