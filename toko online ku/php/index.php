<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "toko_online";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data produk
$sql = "SELECT * FROM produk";
$result = $conn->query($sql);

// Cek apakah ada produk
$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "0 produk ditemukan";
}

$conn->close();
?>

<?php
// Simulasi data produk dari database (misalnya menggunakan array atau mengambil data dari database)
$products = [
    [
        'name' => 'Produk 1',
        'image' => 'produk1.jpg',
        'price' => 'Rp 100.000'
    ],
    [
        'name' => 'Produk 2',
        'image' => 'produk2.jpg',
        'price' => 'Rp 150.000'
    ],
    [
        'name' => 'Produk 3',
        'image' => 'produk3.jpg',
        'price' => 'Rp 200.000'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="search">
            <input type="text" placeholder="Search...">
            <button>Search</button>
        </div>
        <div class="auth">
            <a href="#">Register</a>
            <a href="#">Login</a>
        </div>
    </header>

    <section class="banner">
        <div class="static-column">
            <h1>Selamat datang di Toko Online Kami</h1>
            <p>Temukan berbagai produk berkualitas!</p>
        </div>
        <div class="dynamic-column">
            <img src="banner.jpg" alt="Banner Toko Online">
        </div>
    </section>

    <section class="products">
        <h2>Produk Unggulan</h2>
        <?php foreach ($products as $product): ?>
        <div class="product-item">
            <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>">
            <h3><?= $product['name']; ?></h3>
            <p><?= $product['price']; ?></p>
        </div>
        <?php endforeach; ?>
    </section>

    <footer>
        <div class="payment-methods">
            <p>Payment Methods: <span>Visa, MasterCard, PayPal</span></p>
        </div>
        <div class="social-media">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
        </div>
        <div class="contact-info">
            <p>Contact: <span>email@toko.com</span></p>
        </div>
    </footer>
</body>
</html>
