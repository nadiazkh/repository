<?php include "header.php"; ?>
   
    <?php include "sidebar.php"; ?>

    <?php include "head.php";?>
    
                <!-- Col-lg-7 -->
                <div class="col-lg-8 mb-3 mx-auto my-5">
                    <!-- crad -->
                    <div class="card shadow ">
                    <!-- crad body -->
                    <div class="card-body">
                        <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Statistik pengunjung</h1>  
                    </div>
                    <?php
                    //deklarasi tanggal
            
                    //menampilkan tanggal sekarang
                    $tgl_sekarang = date('Y-m-d');
            
                    //menampilkan tgl kemarin
                    $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
            
                    //mendapatkan 6 hari sebelum tgl sekarang 
                    $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime($tgl_sekarang)));
            
                    $sekarang = date('Y-m-d h:i:s');
            
                    //persiapan query tampilkan jumlah data pengujung
            
                    $tgl_sekarang = mysqli_fetch_array(mysqli_query(
                    $koneksi,  
                    "SELECT count(*) FROM ttamu where tanggal like'%$tgl_sekarang%'"
                        ));
            
                    $kemarin = mysqli_fetch_array(mysqli_query(
                        $koneksi,  
                        "SELECT count(*) FROM ttamu where tanggal like'%$kemarin%'"
                    ));
        
                    $seminggu = mysqli_fetch_array(mysqli_query(
                        $koneksi,  
                        "SELECT count(*) FROM ttamu where tanggal BETWEEN '$seminggu' and '$sekarang'"
                    ));
            
                    $bulan_ini = date ('m');
        
                    $sebulan = mysqli_fetch_array(mysqli_query(
                        $koneksi,  
                        "SELECT count(*) FROM ttamu where month(tanggal) = '$bulan_ini'"
                    ));
        
                    $keseruluhan = mysqli_fetch_array(mysqli_query(
                        $koneksi,  
                        "SELECT count(*) FROM ttamu "
                    ));
            
        
                    ?>
                        <table class="table table-bordered">
                            <tr>
                                    <td>Hari ini</td>
                                    <td>: <?= $tgl_sekarang[0]?></td>
                                </tr>
                                <tr>
                                    <td>Kemarin</td>
                                    <td>: <?= $kemarin[0]?></td>
                                </tr>
                                <tr>
                                    <td>Minggu ini</td>
                                    <td>: <?= $seminggu[0]?></td>
                                </tr>
                                <tr>
                                    <td>Bulan ini</td>
                                    <td>: <?= $sebulan[0]?></td>
                                </tr>
                                <tr>
                                    <td>Keseruluhan</td>
                                    <td>: <?= $keseruluhan[0]?></td>
                                </tr>
                        </table>
                    </div>
                    <!-- crad body -->
                    </div>
                    <!-- end crad -->
                </div>
                <!-- end Col-lg-5 -->

<?php include "footer.php"; ?>