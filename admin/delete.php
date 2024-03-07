<?php

include 'koneksi.php';
include 'header.php';

$id = $_GET['id'];

$sql = "DELETE FROM ttamu WHERE ID = '$id'";
$hapus = mysqli_query($koneksi, $sql);

if ($hapus) {
    header("location: rekap.php");
} else{
    echo "Error: " . $query . "<br>" . $koneksi->error;
};

$koneksi->close();

?>