<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tentang</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>Toko kami</h3>
    <p> <a href="home.php">home</a> / tentang kami </p>
</section>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/2.jpg" alt="">
        </div>

        <div class="content">
            <h3>Mengapa Memilih Kami?</h3>
            <p>Kami menyediakan suasana yang nyaman dan hangat, membuat Anda merasa seperti di rumah sendiri. Dari dekorasi yang unik hingga musik yang menenangkan, kami telah memikirkan segalanya untuk membuat Anda merasa nyaman.</p>
            <a href="shop.php" class="btn">belanja sekarang</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>apa yang kami sediakan?</h3>
            <p>
            Kopi kami dibuat dari biji kopi terbaik dan diproses dengan cinta untuk memberikan rasa yang sempurna
            Kue kami dibuat dengan bahan-bahan segar dan dipanggang dengan hati untuk memberikan rasa yang lezat
            Suasana kami yang nyaman dan hangat membuat Anda merasa seperti di rumah sendiri.
            Pelayanan kami yang ramah dan profesional membuat Anda merasa seperti tamu yang dihormati.
            </p>
            <a href="contact.php" class="btn">kontak kami</a>
        </div>

        <div class="image">
            <img src="images/1.jpg" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="images/3.jpg" alt="">
        </div>

        <div class="content">
            <h3>siapakah kami</h3>
            <p>
            Selamat datang di Seacoffe, toko coffe dan kue terbaik di kota! Kami adalah tempat yang tepat untuk menikmati kopi dan kue yang lezat. 
            Di Seacoffe, kami menyajikan kopi yang dibuat dari biji kopi terbaik dan kue yang dibuat dengan bahan-bahan segar. Kami memiliki berbagai jenis kopi dan kue yang dapat memenuhi selera Anda, dari kopi klasik hingga kue modern.
Toko kami dirancang untuk memberikan suasana yang nyaman dan hangat, sehingga Anda dapat menikmati kopi dan kue dengan santai.
 Jangan lewatkan kesempatan untuk mencoba kopi dan kue terbaru kami Seacoffe! Kunjungi kami hari ini dan nikmati promo spesial untuk kopi dan kue favorit Anda!
Seacoffe - Kopi dan Kue yang Membuat Hari Anda Lebih Baik. Kami berkomitmen untuk memberikan pelayanan yang terbaik dan kualitas kopi dan kue yang tinggi.
            </p>
            <a href="#reviews" class="btn">riview pembeli</a>
        </div>

    </div>

</section>

<section class="reviews" id="reviews">

    <h1 class="title">client's reviews</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/4.jpg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia animi consequatur nostrum cumque itaque ducimus, iure expedita voluptates. Minima, minus.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>uburubur ikan lele</h3>
        </div>

        <div class="box">
            <img src="images/5.jpg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia animi consequatur nostrum cumque itaque ducimus, iure expedita voluptates. Minima, minus.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>twinkythinky</h3>
        </div>

        <div class="box">
            <img src="images/6.jpg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia animi consequatur nostrum cumque itaque ducimus, iure expedita voluptates. Minima, minus.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>bombastis side eye</h3>
        </div>

        <div class="box">
            <img src="images/7.jpg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia animi consequatur nostrum cumque itaque ducimus, iure expedita voluptates. Minima, minus.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>pengangum rahasia</h3>
        </div>

        <div class="box">
            <img src="images/8.jpg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia animi consequatur nostrum cumque itaque ducimus, iure expedita voluptates. Minima, minus.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>slebewww</h3>
        </div>

        <div class="box">
            <img src="images/9.jpg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia animi consequatur nostrum cumque itaque ducimus, iure expedita voluptates. Minima, minus.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>excited sendiri</h3>
        </div>

    </div>

</section>











<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>