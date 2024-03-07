<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "head.php";?>

 <!--  Awal Row -->
 <div class="row">
    <!--  Awal col-md-12 -->
    <div class="col-md-12">
         <!--  Awal card -->
      <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi pengujung</h6>
                    </div>
                     <div class="card-body">
                        <form method = "POST" action = "" class= "text-center">
                          <div class= "row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Dari Tanggal</label>
                                    <input class="form-control" type="date" name="tanggal1" value="<?= isset($_POST['tanggal1']) ? 
                                    $_POST['tanggal1']: date('Y-m-d')?>" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Hingga Tanggal</label>
                                    <input class="form-control" type="date" name="tanggal2"  value="<?= isset($_POST['tanggal2']) ? 
                                    $_POST['tanggal2']: date('Y-m-d')?>" required>
                                </div>
                            </div>
                          </div>  
                          <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-2 mb-4">
                                <button class="btn btn-primary form-control" name="btampilkan"><i class="fa fa-search">
                                </i>Tampilkan</button>
                            </div>
                          </div>
                        </form>

                        <?php
                        if (isset($_POST['btampilkan'])):
                        ?>
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Instansi</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Kepentingan</th>
                                            <th>Tujuan</th>
                                            <th>No.Hp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    
                                    $tgl1 = $_POST['tanggal1'];
                                    $tgl2 = $_POST['tanggal2'];

                                    $tgl = date('Y-m-d');//2023-09-07
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu where tanggal BETWEEN '$tgl1' and '$tgl2' order by id desc");
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($tampil)) { 
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
                                            <td>
                                                <a href="edit.php?id=<?php echo $data['id'];?>"> <button class="btn btn-warning mb-3">Edit</a>
                                                <a href="delete.php?id=<?php echo $data['id'];?>"><button class="btn btn-danger mb-3" onclick="return confirm('yakin ingin menghapus data?')">Hapus</button></a>
                                            </td>                                     
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                  
                                <center>

                                    <form method="POST" action="exportexcel.php">
                                        <div class="col-md-4">
                                            <input type="hidden" name="tanggala" value="<?= @$_POST['tanggal1'] ?>">
                                            <input type="hidden" name="tanggalb" value="<?= @$_POST['tanggal2'] ?>">

                                            <button class="btn btn-success form-control" name="bexport"><i class="fa fa-download"></i> Export Data Excel</button>
                                        </div>
                                    </form>
                                
                                </center>

                            </div>
                            <?php endif;?>
                </div>
         </div>
         <!--  end card -->
    </div>
     <!--  Akhir col-lg-12 -->
 </div>
 <!--  Akhir Awal Row -->
 

<?php include "footer.php"; ?>