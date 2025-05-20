<?php
session_start();

// Menghubungkan ke database
//$db = new mysqli('localhost', 'root', '', 'pertek');
include '../inc/koneksi.php';

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Menangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Menyiapkan statement untuk mencegah SQL injection
$stmt = $koneksi->prepare("SELECT id, username, password FROM akun WHERE username = ?");
$stmt->bind_param("s", $username);

// Menjalankan statement
$stmt->execute();

// Mendapatkan hasil
$result = $stmt->get_result();
if ($user = $result->fetch_assoc()) {
    // Memeriksa password
    //if (password_verify($password, $user['password'])) {
    if ( md5($password) == $user['password'] ) {
        // Menetapkan session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        //header("Location: ../app");
        echo '<meta content="0; url=../app" http-equiv="refresh">';
        exit;
    }
}

echo '<script type="text/javascript">
        alert("Username atau password salah!");
        window.location = "../";
      </script>';
//echo '<meta content="0; url=../" http-equiv="refresh">';

?>