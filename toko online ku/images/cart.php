<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
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
            <a href="cart.html" class="mx-2">Keranjang</a> <!-- Menu keranjang -->
        </div>
    </div>
</header>

<!-- Keranjang Belanja -->
<div class="container my-4">
    <h2>Keranjang Belanja Anda</h2>
    <div class="row">
        <!-- Item dalam keranjang -->
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nama Produk 1</h5>
                    <p class="card-text">Rp 100.000</p>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nama Produk 2</h5>
                    <p class="card-text">Rp 150.000</p>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Harga -->
    <div class="d-flex justify-content-end">
        <h4>Total: Rp 250.000</h4>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <button class="btn btn-secondary">Kembali Belanja</button>
        <button class="btn btn-primary">Checkout</button>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white p-4">
    <div class="container d-flex justify-content-between">
        <div>
            <h5>Menu Pembayaran</h5>
            <p>Transfer Bank, OVO, GoPay</p>
        </div>
        <div>
            <h5>Media Sosial</h5>
            <p>Instagram, Facebook, Twitter</p>
        </div>
        <div>
            <h5>Kontak</h5>
            <p>Email: tokoonline@example.com</p>
            <p>Telp: 081234567890</p>
        </div>
    </div>
</footer>

</body>
</html>
