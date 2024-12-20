<?php
session_start();
$error = '';

$host = 'localhost';
$dbname = 'himpunan_db';
$dbuser = 'root'; // Ganti dengan username database Anda
$dbpass = '';     // Ganti dengan password database Anda

// Koneksi ke database
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Redirect jika sudah login
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['role'] === 'admin') {
        echo "<script>alert('Selamat datang, Anda login sebagai Admin');</script>";
        header("Location: dashboard_admin.php");
    } else {
        echo "<script>alert('Selamat datang, Anda login sebagai User');</script>";
        header("Location: dashboard.php");
    }
    exit;
}

// Cek apakah form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query untuk mendapatkan data pengguna
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Set session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Set cookie berlaku selama 1 jam
        setcookie("username", $user['username'], time() + 3600, "/");
        setcookie("role", $user['role'], time() + 3600, "/");

        // Redirect berdasarkan role
        if ($user['role'] === 'admin') {
            echo "<script>alert('Selamat datang, Anda login sebagai Admin');</script>";
            header("Location: profil.php");
        } else {
            echo "<script>alert('Selamat datang, Anda login sebagai User');</script>";
            header("Location: dashboard.php");
        }
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMJ Sistem Informasi - Login</title>
    <style>
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Body Styling */
body {
    font-size: 1rem;
    color: #333;
    background-image: url('img/background_login.jpeg');
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* Navbar */
nav {
    background-color: #0066cc;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem;
}

nav .menu {
    display: flex;
    gap: 1.5rem;
}

nav .link {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

nav .link:hover {
    color: #ffcc00;
}

nav .btn-primary {
    background-color: #ffcc00;
    color: #0066cc;
    padding: 0.5rem 1rem;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

nav .btn-primary:hover {
    background-color: #ffc107;
}

/* Login Section */
.login-section {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 0;
    background-color: #fff;
}

.login-container {
    background-color: #f4f4f4;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 30px;
    width: 90%;
    max-width: 400px;
    text-align: center;
}

.login-container h2 {
    font-size: 24px;
    color: #0066cc;
    margin-bottom: 20px;
}

.login-container .form-group {
    margin-bottom: 15px;
    text-align: left;
}

.login-container .form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.login-container .form-group input[type="text"],
.login-container .form-group input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.login-btn {
    width: 100%;
    padding: 10px;
    background-color: #0066cc;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    font-size: 16px;
    transition: background 0.3s ease;
}

.login-btn:hover {
    background-color: #00796b;
}

/* Footer */
footer {
    background-color: #0066cc;
    color: #fff;
    padding: 1.5rem;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

footer .menu p {
    margin: 0;
}

footer .sosmed a {
    color: #fff;
    margin: 0 0.5rem;
    transition: color 0.3s ease;
}

footer .sosmed a:hover {
    color: #ffcc00;
}

/* Responsive Design */
@media (max-width: 768px) {
    nav .menu, nav .btn-primary {
        display: none;
    }

    footer {
        flex-direction: column;
    }
}



    </style>
</head>

<body>
    <section class="login-section">
        <div class="login-container">
            <h2>Login</h2>
            <!-- Form Login -->
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn login-btn">Login</button>
            </form>
            <p>Anda belum memiliki akun? <a href="signup.php">Daftar disini</a></p>


            <!-- Menampilkan pesan kesalahan jika login gagal -->
            <?php if (!empty($error)): ?>
                <p style="color: red; margin-top: 10px;"><?php echo $error; ?></p>
            <?php endif; ?>
        </div>
    </section>
</body>

</html>
