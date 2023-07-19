<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="icon" href="assets/img/logo-2.png" type="image/x-icon">
    <script src="assets/parallax.js/parallax.js"></script>
    <script src="assets/parallax.js/parallax.min.js"></script>
    <title>Home | Akbar Heights Hotel</title>
    <style>

    </style>
</head>

<body>

    <!-- memberikan atribut class dan data untuk mengatur efek paralaks pada latar belakang header. -->
    <header class="parallax-window" data-parallax="scroll" data-image-src="assets/img/background.jpg">
        <nav>
            <h1 class="logo">
                <div>
                    <img src="assets/img/logo-2.png" alt="logo">
                </div>
            </h1>
            <ul class="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <div>
                    <a href="login.php" class="btn-sign-in">Sign in</a>
                </div>
            </ul>
        </nav>
        <div class="header-title">Welcome To Akbar Heights Hotel.
            <p>Kami Menyambut Anda dengan Keramahan yang Hangat dan Layanan Tak Terlupakan.</p>
        </div>
    </header>

    <!-- Menampilan info web yang di buat -->
    <section id="about">
        <div class="about-container">
            <h2>About</h2>
            <div class="image-gallery">
                <div class="image-box">
                    <img src="assets/img/superior.jpg" alt="image" />
                    <h2 class="Room">Superior Room</h2>
                </div>

                <div class="image-box">
                    <img src="assets/img/deluxe.jpg" alt="image" />
                    <h2 class="Room">Deluxe Room</h2>
                </div>

                <div class="image-box">
                    <img src="assets/img/suite.jpg" alt="image" />
                    <h2 class="Room">Suite Room</h2>
                </div>

                <div class="image-box">
                    <img src="assets/img/standar.jpg" alt="image" />
                    <h2 class="Room">Standard Room</h2>
                </div>
            </div>

            <!-- Menampilkan info tentang web yang sedang di buat -->
            <div class="about-info">
                Akbar Heights Hotel adalah sebuah hotel mewah yang terletak di pusat kota. Hotel ini dikenal karena menyediakan akomodasi yang nyaman
                dan layanan yang terbaik kepada para tamu yang menginap.
                Bangunan hotel yang megah menawarkan pemandangan indah kota dan lingkungan sekitar.
                Akbar Heights Hotel memiliki berbagai jenis kamar yang tersedia untuk memenuhi kebutuhan semua tamu, mulai dari kamar standar hingga suite mewah.
                Setiap kamar dilengkapi dengan fasilitas modern seperti AC, televisi layar datar, Wi-Fi gratis, lemari es mini, dan kamar mandi pribadi
                dengan perlengkapan mandi lengkap.
            </div>
        </div>
    </section>

    <!-- Menampilkan halaman kontak -->
    <section id="contact">
        <div class="contact-container">
            <h2>Contact Us</h2>
            <ul class="contact-info">
                <li><i class="fas fa-phone"></i> Phone: <a href="tel:+123456789">+123456789</a></li>
                <li><i class="fab fa-instagram"></i> Instagram: <a href="https://www.instagram.com/akbarheightshotel">akbarheightshotel</a></li>
                <li><i class="fab fa-twitter"></i> Twitter: <a href="https://www.twitter.com/akbarheightshotel">akbarheightshotel</a></li>
                <li><i class="fab fa-facebook"></i> Facebook: <a href="https://www.facebook.com/akbarheightshotel">akbarheightshotel</a></li>
                <li><i class="fas fa-map-marker-alt"></i> Address: 18-11-03 Akbar Height Hotel, Padang, Indonesia</li>
            </ul>
        </div>
    </section>


    <!-- Footer -->
    <footer>
        &copy; 2023 Azzammil Akbar Ramadhan.
    </footer>

</body>

</html>