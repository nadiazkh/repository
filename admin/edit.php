 <!--  panggil file header -->
 <?php 
    include "koneksi.php";
    include "header.php";
    include "sidebar.php";
    include "head.php";
 ?>

<?php
$id = $_GET['id'];
$tampil = mysqli_query($koneksi,"SELECT * FROM ttamu where id='$id'");
$data =mysqli_fetch_assoc($tampil);
// Uji Jika tombol simpan diklik
if (isset($_GET['update'])) {
    $tgl = date('Y-m-d');

    //htmlspecialchars agar inputan lebih aman dari injection
    $nama = htmlspecialchars($_GET['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars($_GET['alamat'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_GET['tujuan'], ENT_QUOTES);
    $nope = htmlspecialchars($_GET['nope'], ENT_QUOTES);

    //persiapan query simpan data
    $simpan = mysqli_query($koneksi, "UPDATE  ttamu VALUES ('','$id','$nama','$alamat','$tujuan','$nope')");

    // Uji Jika simpan data sukses
    if ($simpan) {
        echo "<script>alert('Simpan data sukses, Terima kasih..!');
               document.location='?'</script>";
    } else {
        echo "<script>alert('Simpan Data GAGAL!!!');
               document.location='?'</script>";
    }
}

?>

    <div class="row text-center">
        <!-- col-lg-7 -->
        <div class="col-lg-5 my-3 mx-auto">
            <div class="card" style="background-color:#ffffff">
                <!-- card-body -->
                <div class="card-body">
                <div class="p-4 m-6">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Identitas Pengunjung</h1>
                    </div>
                    <form class="user" method="POST" action="update.php">
                        <div class="form-group">
                            <input type="hidden" class="form-control form-control-user" name="id" placeholder="id pengunjung"
                                value="<?php echo $data['id']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nama"
                                placeholder="Nama pengunjung" value="<?php echo $data['nama']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nama"
                                placeholder="Instansi pengunjung" value="<?php echo $data['instansi']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="alamat"
                                placeholder="Alamat pengunjung" value="<?php echo $data['alamat']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="alamat"
                                placeholder="Kepentingan pengunjung" value="<?php echo $data['kepentingan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="tujuan"
                                placeholder="Tujuan pengunjung" value="<?php echo $data['tujuan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" name="nope"
                                placeholder="No.Hp pengunjung" value="<?php echo $data['nope']; ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <button type="submit" name="update"class="btn btn-primary">Simpan Edit</button>
                            </div>
                            <div class="col-md-4">
                                <a href="rekap.php" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>

                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="#"> 
                            <?= date('Y') ?>
                        </a>
                    </div>
                </div>
                </div>
                <!-- end card-body -->

            </div>

        </div>
        <!-- end col-lg-7 -->
    </div>