<?php
session_start();
?>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMJ Sistem Informasi</title>
    <style>
        /* Reset Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;

}

/* Global Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    line-height: 1.6;
   
}
/* Navbar Styles */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f5f5f5;
    padding: 1rem 2rem;
    border-bottom: 0.5px solid #498dc1; /* Warna hitam, ketebalan 2px */
}


.logo {
    width: 100px;
}

.navbar nav a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
    font-weight: bold;
    transition: color 0.3s ease;
}

.navbar nav a:hover {
    color: #ffeb3b;
}

.btn-primary {
    background-color: #498dc1;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    transition: background 0.3s ease;
}

.btn-primary:hover {
    background-color: #4a9ad7;
}



/* Hero Section */
/* CSS Global */


.hero {
    display: flex;
    justify-content: center; /* Tengah secara horizontal */
    align-items: center; /* Tengah secara vertikal */
    padding: 50px;
    background-color: #f8f9fa; /* Warna latar belakang */
}

.content {
    display: flex; /* Kontainer utama flexbox */
    justify-content: space-between; /* Ruang antara teks dan gambar */
    align-items: center; /* Konten sejajar tengah vertikal */
    max-width: 1200px;
    margin: 0 auto;
    gap: 20px; /* Jarak antara teks dan gambar */
}

.welcome {
    max-width: 50%; /* Ukuran teks */
}


.hero-image {
    width: 100%; /* Lebar penuh gambar */
    max-width: 400px; /* Maksimum ukuran gambar */
    border-radius: 8px; /* Sudut gambar melengkung */
}


.welcome {
    max-width: 600px;
    
}

.welcome-message {
    position: relative;
    font-size: 1.5rem;
    color: #0078d4;
}


h1 {
    font-size: 2.5rem;
    margin: 1rem 0;
}

.cta a {
    margin-top: 1rem;
    display: flex;
    display: inline-block;
    justify-content: center;
}

.cta a:hover {
    background-color: #4a9ad7;
}

/* Profile Card */
.profile-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    background-color: white;
    padding: 1rem;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.profile-pic {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
}

.profile-info h3 {
    margin: 0;
    font-size: 1.2rem;
}

/* UKM Section */
#ukm {
    text-align: center;
    padding: 2rem;
    background-color: #fafafa;
}
/* Keanggotaan Section Styling */
#ukm h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.chart {
    display: flex;
    flex-wrap: wrap; 
    justify-content: center; 
    padding: 20px;
    gap: 20px; 
}

/* Card Styling */
.card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 280px; 
    text-align: center;
    transition: transform 0.3s ease;
}

.card:hover {
    transform: scale(1.05); /* Adds a subtle zoom effect on hover */
}

/* Image Styling in Cards */
.card img {
    width: 100%; /* Makes image take the full width of the card */
    height: 200px; /* Sets a fixed height for the image */
    object-fit: cover; /* Crops image to fit within dimensions */
    border-radius: 8px; /* Matches the rounded corners of the card */
    margin-bottom: 15px;
}

/* Card Title and Text Styling */
.card h2 {
    font-size: 1.2em;
    color: #0078d4;
    margin: 10px 0;
}

.card p {
    color: #666;
    font-size: 0.9em;
    line-height: 1.4;
}


.list-ukm {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 2rem;
    margin-top: 2rem;
}

.card {
    width: 300px;
    background-color: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.card h2 {
    color: #0078d4;
    margin-bottom: 1rem;
}
/* General Image Styling for Cards */
.card img {
    width: 100%; /* Ensures image takes the full width of the card */
    height: 200px; /* Set a fixed height for consistency */
    object-fit: cover; /* Crops the image to fill the specified height and width */
    border-radius: 8px; /* Matches the card's rounded corners */
    margin-bottom: 10px; /* Adds space below the image */
}

/* Optional: Adjust card layout to ensure a consistent look */
.card {
    flex: 1 1 30%; /* Adjusts card width */
    min-width: 250px; /* Ensures a minimum width for larger images */
    max-width: 300px; /* Sets a maximum width for the card */
}


.card p {
    color: #555;
}

.btn-primary {
    background-color: #0078d4;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    transition: background 0.3s ease;
}

.btn-primary:hover {
    background-color: #0078d4;
}

.btn-primary {
    background-color: #58a6e1;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    transition: background 0.3s ease;
}

.btn-primary:hover {
    background-color: #638197;
}


        .chart {
            display: flex;
            flex-wrap: wrap; /* Allows cards to wrap to next line */
            justify-content: space-between; /* Space out cards */
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px; /* Margin between cards */
            flex: 1 1 30%; /* Flex properties for responsiveness */
            min-width: 200px; /* Minimum width of the card */
            text-align: center; /* Center text in the card */
        }

.containerr {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
}

.contentt {
    flex: 1;
    max-width: 50%;
}

h4 {
    color: #a8a8a8;
    font-size: 18px;
    margin-bottom: 10px;
}

h1 {
    font-size: 36px;
    margin-bottom: 20px;
    color: #333;
}

p {
    margin-bottom: 15px;
    font-size: 16px;
    line-height: 1.6;
}

.features p {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.features i {
    color: #333;
    margin-right: 10px;
    font-size: 18px;
}

.map {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

iframe {
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.whatsapp-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #25d366;
    color: white;
    font-size: 30px;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

.whatsapp-btn:hover {
    background-color: #1ebe57;
}


/* Footer Styles */
/* Footer */
footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
    background-color: #498dc1;
    color: white;
  }
  
  footer .logo {
    width: 3rem;
  }
  
  footer .menu {
    font-size: 0.9rem;
  }
  
  .sosmed a {
    color: white;
    margin-left: 1rem;
  }
  
  .sosmed svg {
    width: 1.5rem;
    height: 1.5rem;
    fill: white;
  }
  /* Visi & Misi Section */
#visi-misi {
    padding: 40px 20px;
    background-color: #f8f9fa;
    text-align: center;
}

#visi-misi h1 {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 20px;
}

.visi-misi-content {
    display: flex;
    justify-content: space-around;
    gap: 40px;
    flex-wrap: wrap;
}

.visi-misi-content > div {
    flex: 1;
    min-width: 300px;
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

.visi-misi-content h2 {
    font-size: 1.8rem;
    color: #2c3e50;
    margin-bottom: 10px;
}

.visi-misi-content p, .visi-misi-content ul {
    font-size: 1.1rem;
    color: #555;
    line-height: 1.6;
}

.visi-misi-content ul {
    list-style-type: none;
    padding-left: 0;
}

.visi-misi-content ul li {
    padding-left: 20px;
    position: relative;
}

.visi-misi-content ul li:before {
    content: '•';
    color: #3498db;
    position: absolute;
    left: 0;
}

.visi-misi-content > div.fade-in {
    opacity: 1;
    transform: translateY(0);
}

/* For smooth scrolling */
html {
    scroll-behavior: smooth;
}
.structure-container {
            text-align: center;
            margin: 0 auto;
            width: 80%;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #498dc1;
            transition: transform 0.3s ease;
        }
        .title:hover {
            transform: scale(1.1);
        }
        .box {
            display: inline-block;
            padding: 10px 20px;
            background-color: #498dc1;
            color: white;
            border-radius: 10px;
            margin: 10px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .box:hover {
            background-color: #498dc1;
            transform: translateY(-5px);
        }
        .line {
            width: 2px;
            background-color: #498dc1;
            margin: 0 auto;
        }
        .row {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
        }
        .column {
            text-align: center;
            margin: 0 10px;
            transition: transform 0.3s ease;
        }
        .column:hover {
            transform: scale(1.05);
        }

    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <a aria-label="Logo Icon">
            <img src="img/logo hmj.png" alt="Logo HMJ" class="logo" ></a>
            <nav>
                <a class="btn-primary" href="login.php">Login</a>
                <a class="btn-primary" href="signup.php">Register</a>
                <a class="btn-primary" href="index.php">Beranda</a>
                <a class="btn-primary" href="tentang.php">Tentang</a>
                <a class="btn-primary" href="pendaftaran.php">Pendaftaran</a>
            </nav>
        </div>
    </header>

    <main>
    <section class="hero">
        <div class="content">
            <div class="welcome">
            <div class="cta">
                    <a class="btn-primary" href="login.php">Selamat Datang di Website</a>
                </div>
                <h1>HMJ-SISTEM INFORMASI</h1>
                <p>Temukan informasi terbaru, termasuk berita dan kegiatan yang diadakan oleh Himpunan Mahasiswa Jurusan Sistem Informasi. Lihat perkembangan terkini, serta konten-konten menarik di sini.</p>
            </div>
            <div class="image-container">
                <img src="img/Ilham-1-1.png" alt="Ketua Himpunan" class="hero-image" height="400px">
            </div>
        </div>
    </section>


        <section id="visi-misi" class="visi-misi">
    <h1>Visi & Misi</h1>
    <div class="visi-misi-content">
        <div class="visi">
            <h2>Visi</h2>
            <p>Membangun Himpunan Mahasiswa yang inklusif, inovatif, dan kolaboratif dalam mendukung pengembangan akademik, profesional, dan sosial mahasiswa Sistem Informasi.</p>
        </div>
        <div class="misi">
            <h2>Misi</h2>
            <ul>
                <li>Mengadakan kegiatan yang melibatkan seluruh anggota untuk meningkatkan rasa kebersamaan.</li>
                <li>Mengadakan pelatihan teknologi terbaru untuk meningkatkan kompetensi mahasiswa.</li>
                <li>Membangun hubungan yang erat dengan alumni, dosen, dan organisasi luar untuk menciptakan peluang magang dan kerja.</li>
            </ul>
        </div>
    </div>
</section>

        <section id="ukm">
            <h1>Kegiatan Kami</h1>
            <p>
               
            <div class="list-ukm">
                <div class="card">
                    <h2>LDK</h2>
                    <img src="img/LDK.JPG" alt="LDK">
                    <p>Melatih Jiwa Keorganisasian calon pengurus HMJ-SI</p>
                </div>
                <div class="card">
                    <h2>Jejak Desa</h2>
                    <img src="img/JEKDES.jpg" alt="jekdes">
                    <p>Menciptakan program kerja yang berdampak sosial</p>
                </div>
                <div class="card">
                    <h2>Rapat Evaluasi</h2>
                    <img src="img/RAPAT.JPG" alt="rapat">
                    <p>Mengevaluasi secara berkala kendala dan progess program Kerja</p>
                </div>
                <div class="card">
                    <h2>Company Visit</h2>
                    <img src="img/cv.JPG" alt="CV">
                    <p>Menyaksikan langsung teknologi di dunia industri</p>
                </div>
            </div>
        </section>
        <section>
        <div class="structure-container">
        <div class="title">STRUKTURAL HMJ-SI 2024</div>

        <!-- Wali Kelas -->
        <div class="box">Pembina<br>Syahbudin, S.Kom., M.Kom</div>

        <!-- Line -->
        <div class="line" style="height: 40px;"></div>

        <!-- Ketua & Wakil Ketua -->
        <div class="row">
            <div class="column">
                <div class="box">Ketua <br>Ilham Ramadhan</div>
            </div>
            <div class="column">
                <div class="box">Wakil Ketua<br>Hendrawan HEry</div>
            </div>
        </div>

        <!-- Line -->
        <div class="line" style="height: 40px;"></div>

        <!-- Bendahara & Sekretaris -->
        <div class="row">
            <div class="column">
                <div class="box">Bendahara<br>Annisa Eka Jayanti</div>
            </div>
            <div class="column">
                <div class="box">Sekretaris<br>Ananda Intan Pratiwi</div>
            </div>
        </div>

        <!-- Line -->
        <div class="line" style="height: 40px;"></div>

        <!-- Seksi Sections -->
        <div class="row">
            <div class="column">
                <div class="box">Divisi Kominfo<br>Ahmad Ghazali</div>
            </div>
            <div class="column">
                <div class="box">Divisi Keilmuan<br>Muh.Ridha</div>
            </div>
            <div class="column">
                <div class="box">Divisi Humas<br>Aqilah</div>
            </div>
            <div class="column">
                <div class="box">Divisi Kaderisasi<br>M.Fajrin</div>
            </div>
        </div>
    </div>
    </section>
    <div class="containerr">
        <div class="contentt">
            <h4>Melayani Mahasiswa Sistem Informasi</h4>
            <h1>Kunjungi Kami</h1>
            <p>Jangan ragu untuk menghubungi kami melalui kontak di bawah ini. Kami akan merespons Anda secepat mungkin</p>
            <div class="features">
                <p><i class="fas fa-check-circle"></i> UIN ALAUDDIN MAKASSAR</p>
            </div>
        </div>
        <div class="map">
        <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.361491501051!2d119.49463007553592!3d-5.205752752472589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee267ff62d2b7%3A0xa96ffb26e4edcc26!2sUniversitas%20Islam%20Negeri%20Alauddin%20Makassar!5e0!3m2!1sid!2sid!4v1734580110565!5m2!1sid!2sid"
        width="400" 
        height="300" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
</iframe>

        </div>
    </div>
    <a href="http://Wa.me/6288245937855" target="_blank" class="whatsapp-btn">
        <i class="fab fa-whatsapp"></i>
    </a>
</main>
    <footer> 
        <div>
            <a href="/"><img src="img/logo hmj.png" alt="icon" style="width: 3rem;" class="logo"></a>
        </div>
        <div class="menu">
            <p>&copy; HMJ-SI</p>
        </div>
        <div class="sosmed">
            <a href="#" aria-label="facebook"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg></a>
            <a href="#" aria-label="instagram"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>
            <a href="#" aria-label="twitter/x"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a>
            <a href="#" aria-label="youtube"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg></a>
            <a href="#" aria-label="tiktok"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg></a>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sections = document.querySelectorAll('.visi-misi-content > div');
        
            function checkVisibility() {
                const windowHeight = window.innerHeight;
                const scrollTop = window.scrollY;
        
                sections.forEach(section => {
                    const sectionTop = section.getBoundingClientRect().top + scrollTop;
        
                    if (sectionTop - windowHeight < scrollTop) {
                        section.classList.add('fade-in');
                    }
                });
            }
        
            window.addEventListener('scroll', checkVisibility);
            checkVisibility(); // To check visibility on page load
        });
        
    </script>
</body>
</html>

