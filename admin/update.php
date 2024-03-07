 <!--  panggil file header -->
 <?php 
    include "koneksi.php";

 ?>

<?php
$id = $_POST['id'];
$tampil = mysqli_query($koneksi,"SELECT * FROM ttamu where id=$id");
$data =mysqli_fetch_assoc($tampil);

// Uji Jika tombol simpan diklik
if (isset($_POST['update'])) {
    $tgl = date('Y-m-d');
   
    //htmlspecialchars agar inputan lebih aman dari injection
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
    $nope = htmlspecialchars($_POST['nope'], ENT_QUOTES);

    //persiapan query simpan data
    $simpan = mysqli_query($koneksi, "UPDATE  ttamu SET nama='$nama', alamat='$alamat', tujuan='$tujuan',nope='$nope' WHERE id=$id");


    // Uji Jika simpan data sukses
    if ($simpan) {
        echo 'Edit data sukses, Terima kasih..!';
               header ('location: rekap.php');
    } else {
        echo 'Edit Data GAGAL!!!';
               header('location: rekap.php');
    }
}

?>