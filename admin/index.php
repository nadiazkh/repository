<?php include "header.php";?>
    <?php include "sidebar.php";?>
        <?php include "head.php";?>

        <?php

//uji jika tombol simpan diklik
if(isset($_POST['bsimpan'])){
    $tgl = date('Y-m-d');

// htmlspecialchars agar inputan lebih aman dari injection
    $nama =htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $instansi =htmlspecialchars($_POST['instansi'], ENT_QUOTES);
    $alamat =htmlspecialchars($_POST['alamat'], ENT_QUOTES);
    $kepentingan =htmlspecialchars($_POST['kepentingan'], ENT_QUOTES);
    $tujuan =htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
    $nope =htmlspecialchars($_POST['nope'], ENT_QUOTES);
 //persiapan query simpan data

    $simpan = mysqli_query($koneksi, "INSERT INTO ttamu VALUES('', '$tgl', '$nama', '$instansi','$alamat', '$kepentingan', '$tujuan', '$nope')");
   
   //uji jika simpan data sukses

    if ($simpan) {
       echo "<script>alert('Simpan Data Sukses, Terimakasi...!');
              document.location='dashboard.php'</script>";
    } else {
        echo "<script>alert('simpan Data GAGAL!!!');
              document.location='?'</script>";
    }
}


?>
<div class="row text-center">
   <!-- Col-ig-7 -->
   <div class="col-lg-5 my-3 mx-auto">
        <div class="card shadow bg-light">
        <!-- crad-body -->
        <div class="card-body">
        <div class="p-4 m-6">
            <div class="text-center">
               <h1 class="h4 text-gray-900 mb-4">Identitas pengujung</h1>
            </div>
            <form class="user" method="POST" action="">
                <div class="form-group">
                   <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama pengunjung" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="instansi" placeholder="Instansi pengunjung" required>
                </div>
                <form class="user">
                   <div class="form-group">
                       <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat pengunjung" required>
                    </div>
                   <div class="form-group">
                       <input type="text" class="form-control form-control-user" name="kepentingan" placeholder="Kepentingan pengunjung" required>
                    </div>
                    <div class="form-group">
                       <input type="text" class="form-control form-control-user" name="tujuan" placeholder="Tujuan pengunjung" required>
                    </div>
                    <div class="form-group">
                       <input type="text" class="form-control form-control-user" name="nope" placeholder="No hp pengunjung" require>
                   </div>
                    <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Simpan Data</button>
                </form>
                <hr>
                <div class="text-center">
                   <a class="small" href="#">BPSI Tanaman Sayuran | 2023 - <?=date('Y') ?></a>
                </div>
            </div>
        </div>
        <!-- end crad-body -->
        </div> 
   </div>
   <!-- end col-lg-7 -->
</div>

<?php include "footer.php";