
<?php

//aktifkan session
session_start();

//panggil koneksi database
include "koneksi.php";

@$pass = md5($_POST['password']);
@$username = mysqli_escape_string($koneksi, $_POST['username']);
@$password = mysqli_escape_string($koneksi, $pass);

$login = mysqli_query($koneksi, "SELECT * FROM tuser where username = '$username' and password ='$password' and status ='aktif' ");

$data = mysqli_fetch_array($login);

//uji jika username dan password ditemukan / sesuai
if(isset($data)) {
    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
    
    //arahkan ke halaman admin
    header('location:admin');
} else {
    echo"<script>
          alert('Maaf, login gagal, pastikan username dan password anda bener....!');
           document.location='index.php';
    </script>";
}
?>
