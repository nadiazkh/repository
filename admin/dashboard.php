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
        <!-- DataTales Example -->
        <div class="card shadow mb-4 mt-5">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data pengujung hari ini[<?=date('d-m-Y')?>]</h6>
                </div>
            <div class="card-body">
                                                     
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Instansi</th>
                                    <th>Alamat</th>
                                    <th>Kepentingan</th>
                                    <th>Tujuan</th>
                                    <th>No.Hp</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Instansi</th>
                                    <th>Alamat</th>
                                    <th>Kepentingan</th>
                                    <th>Tujuan</th>
                                    <th>No.Hp</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    $tgl = date('Y-m-d');//2023-09-07 
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu where tanggal like '%$tgl%' order by id desc");
                                    $no = 1;
                                    while($data = mysqli_fetch_array($tampil)) { 
                                        ?>
                                        <tr>
                                            <td><?= $no++?></td>
                                            <td><?= $data['tanggal']?></td>
                                            <td><?= $data['nama']?></td>
                                            <td><?= $data['instansi']?></td>
                                            <td><?= $data['alamat']?></td>
                                            <td><?= $data['kepentingan']?></td>
                                            <td><?= $data['tujuan']?></td>
                                            <td><?= $data['nope']?></td>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
        </div>

<?php include "footer.php";