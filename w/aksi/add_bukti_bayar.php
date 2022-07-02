<?php
session_start();
include_once '../inc/koneksi.php';


$idUser = $_SESSION['id_user'];

if (isset($_FILES)) {

    $image_name = $_FILES['file']['name'];
    $image_tmp = $_FILES['file']['tmp_name'];

    $ekstensiGambar = explode(".", $image_name);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    $image_name_new = uniqid();
    $image_name_new .= '.';
    $image_name_new .= $ekstensiGambar;

    $dest = '../img/buktiBayar/' . $image_name_new;

    if (move_uploaded_file($image_tmp, $dest)) {
        $query = "INSERT INTO `tabel_bukti_pembayaran`(`id_bukti`,`gmb_bukti`,`ket_bukti`) VALUES ('$idUser','$image_name_new','belum diverifikasi')";
        mysqli_query($koneksi, $query);
    } else {
        print("gagal upload");
    }
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}