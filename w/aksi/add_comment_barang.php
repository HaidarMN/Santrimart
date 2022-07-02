<?php
session_start();
error_reporting(0);

include '../inc/koneksi.php';

print_r($_POST);

$id_barang = $_POST['idbarang'];
$nama = $_POST['nama'];
$comment = $_POST['comment'];
$date = date('Y-m-d H:i:s');

$comment = "INSERT INTO tabel_comment_barang values('','$id_barang','$nama','$comment','$date')";
if (mysqli_query($koneksi, $comment)) {
    echo "<script type='text/javascript'>alert('Terimakasih Telah Memberi Komentar');</script>";
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}