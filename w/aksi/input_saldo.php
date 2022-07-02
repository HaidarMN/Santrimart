<?php
include "../inc/koneksi.php";

// $tangal = date("Y-m-d", $_POST['tanggal']);
// Taking all 5 values from the form data(input)

$id_user =  $_POST['kategori'];
$tanggal = $_POST['tanggal'];
$jumlah =  $_POST['nominal'];
$keterangan = $_POST['keterangan'];
// print_r($tanggal);


$saldo_masuk = "INSERT INTO `tabel_saldo` (`id_user`, `tanggal`,`jumlah`,`ket_saldo`) VALUES ($id_user, 
    '$tanggal','$jumlah','$keterangan')";

if (mysqli_query($koneksi, $saldo_masuk)) {
    header('location: ../page/index.php?menu=saldo');
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

mysqli_close($conn);