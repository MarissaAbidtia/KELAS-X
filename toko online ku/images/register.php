<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Header -->
<header class="bg-light p-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="header-logo">
            <a href="home.html">
                <img src="https://via.placeholder.com/150x50" alt="Logo Toko Online">
            </a>
        </div>

        <div class="menu">
            <a href="home.html" class="mx-2">Home</a>
            <a href="shop.html" class="mx-2">Shop</a>
            <a href="register.html" class="mx-2">Daftar</a>
            <a href="login.html" class="mx-2">Login</a>
        </div>
    </div>
</header>

<!-- Formulir Registrasi -->
<div class="container my-5">
    <h2>Daftar Akun Baru</h2>
    <form action="process_register.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"
