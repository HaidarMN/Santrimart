<?php
include "../inc/koneksi.php";
session_start();

$idUser = $_SESSION['id_user'];


$query_user = "SELECT * FROM `tabel_member` WHERE `id_user` = '$idUser'";
$hasil_user_details = mysqli_fetch_array(mysqli_query($koneksi, $query_user));
$alamat = $hasil_user_details['alamat_user'];
$a_n = $hasil_user_details['nm_user'];
$hp = $hasil_user_details['hp'];

$cara_bayar = $_POST['cara_bayar'];
$faktur = $_POST['faktur_jual'];
$fakturBeli = $_POST['faktur_beli'];
$ids = $_POST['kd_barang'];
$biaya_kirim = $_POST['biaya_kirim'];
$harga_barang_total = $_POST['harga_barang'];
$jumlah = $_POST['quantity'];
$kd_supplier = "";
$dp = "";
$sisa = "";

for ($i = 0; $i < count($ids); $i++) {
    $query_tabel_barang = "SELECT * FROM `tabel_barang` WHERE `kd_barang` = '$ids[$i]'";
    $hasil_tabel_barang = mysqli_fetch_array(mysqli_query($koneksi, $query_tabel_barang));

    $namaBarang = $hasil_tabel_barang['nm_barang'];


    $ukuran = "";
    $harga = $hasil_tabel_barang['hrg_jual'];

    $subtotal = intval($jumlah[$i]) * intval($hasil_tabel_barang['hrg_jual']);
    $total_biaya = $_POST['total_penjualan'];
    $diskon = "";
    $ket = "";
    $stts = "PROSES";
    $alamat_akhir = "";


    $query_stok = "SELECT  `stok` FROM `tabel_stok_toko` WHERE `kd_barang` = '$ids[$i]'";
    $stok = mysqli_fetch_array(mysqli_query($koneksi, $query_stok));
    $stok_awal = $stok['stok'];
    $stok = $stok_awal - $jumlah[$i];

    $query_update = "INSERT INTO `tabel_rinci_penjualan`(`no_faktur_penjualan`, `kd_barang`, `nm_barang`, `no_hp`, `ukuran`, `jumlah`, `stok_awal`, `harga`, `sub_total_jual`, `diskon`, `a_n`, `keterangan`, `stts`, `alamat`, `alamat_akhir`) VALUES ('$faktur','$ids[$i]','$namaBarang','$hp','$ukuran','$jumlah[$i]','$stok_awal','$harga','$subtotal','$diskon','$a_n','$ket','$stts','$alamat','$alamat')";
    $hasil = mysqli_query($koneksi, $query_update);

    $query_update = "INSERT INTO `tabel_rinci_pembelian`(`no_faktur_pembelian`, `kd_barang`, `jumlah`, `harga`, `sub_total_beli`) VALUES ('$fakturBeli','$ids[$i]','$jumlah[$i]','$harga','$subtotal')";
    $hasil = mysqli_query($koneksi, $query_update);
    // print_r($hasil);
    $query_update = "UPDATE `tabel_stok_toko` SET `stok` = '$stok'  WHERE kd_barang = '$ids[$i]'";
    $hasil = mysqli_query($koneksi, $query_update);
}
if ($cara_bayar == 5) {
    $ket_penjualan = "Saldo";
    $status = "Proses";
    $ket_saldo = "";


    $query_penjualan = "INSERT INTO `tabel_penjualan` (`no_faktur_penjualan`, `kd_supplier`, `tgl_penjualan`, `id_user`, `total_penjualan`,`biaya_pengiriman`,`total_biaya`,`dp`, `sisa`, `ket`, `status`,`nama_penerima`,`kontak`,`alamat`) VALUES ('$faktur','$kd_supplier',now(),'$idUser','$harga_barang_total','$biaya_kirim','$total_biaya','$dp','$sisa','$ket_penjualan','$status','$a_n','$hp','$alamat')";
    $n = mysqli_query($koneksi, $query_penjualan);

    $query_pembelian = "INSERT INTO `tabel_pembelian` (`no_faktur_pembelian`, `kd_supplier`, `tgl_pembelian`, `id_user`, `total_pembelian`,`biaya_pengiriman`,`total_biaya`, `ket`,`status`) VALUES ('$fakturBeli','$kd_supplier',now(),'$idUser','$harga_barang_total','$biaya_kirim','$total_biaya','$ket_penjualan','$status')";
    $b = mysqli_query($koneksi, $query_pembelian);

    $query_saldo = "INSERT INTO `tabel_saldo` (`id_user`,`tanggal`,`jumlah`,`pengeluaran`,`ket_saldo`) VALUES ('$idUser',now(), 0,'$total_biaya','$ket_saldo')";
    $a = mysqli_query($koneksi, $query_saldo);
    // print_r($a);

    if ($a != null) {
        $query_delete = "DELETE FROM keranjang WHERE id_member = $idUser";
        $success_delete = mysqli_query($koneksi, $query_delete);
        echo $cara_bayar;
    }
} else if ($cara_bayar == 3) {
    $ket_penjualan = "Transfer";
    $status = "Proses";

    $query_penjualan = "INSERT INTO `tabel_penjualan` (`no_faktur_penjualan`, `kd_supplier`, `tgl_penjualan`, `id_user`, `total_penjualan`,`biaya_pengiriman`,`total_biaya`,`dp`, `sisa`, `ket`, `status`,`nama_penerima`,`kontak`,`alamat`) VALUES ('$faktur','$kd_supplier',now(),'$idUser','$harga_barang_total','$biaya_kirim','$total_biaya','$dp','$sisa','$ket_penjualan','$status','$a_n','$hp','$alamat')";
    $n = mysqli_query($koneksi, $query_penjualan);

    $query_pembelian = "INSERT INTO `tabel_pembelian` (`no_faktur_pembelian`, `kd_supplier`, `tgl_pembelian`, `id_user`, `total_pembelian`,`biaya_pengiriman`,`total_biaya`, `ket`,`status`) VALUES ('$fakturBeli','$kd_supplier',now(),'$idUser','$harga_barang_total','$biaya_kirim','$total_biaya','$ket_penjualan','$status')";
    $b = mysqli_query($koneksi, $query_pembelian);

    if ($b != null) {
        $query_delete = "DELETE FROM keranjang WHERE id_member = $idUser";
        $success_delete = mysqli_query($koneksi, $query_delete);
        echo $cara_bayar;
    }
} else {
    echo "<script type='text/javascript'>alert('Transaksi sukses');window.location.href='../page/index.php?menu=home';</script>";
}