
<?php

session_start();
include "../../inc/koneksi.php";


$email = $_SESSION['info']['email'];
$query = "SELECT * FROM tabel_member WHERE email_user  = '$email'";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_assoc($hasil);

$hasil_email = $data['email_user'];
if ($hasil_email == null)
{
   echo "<script>alert('Login Berhasil Silahkan Lengkapi Data!');window.location= 'daftar_google.php';</script>";
//    echo '<script>
//             setTimeout(function() {
//                 Swal.fire({
//                     icon: "error",
//                     tittle: "Gagal login",
//                     text: "Periksa username dan password",
//                 }, function() {
//                     window.location.href = "google_daftar.php";
//                 });
//             }, 1);
//         </script>';

}else{

    $id						= $data['id_user'];
    $_SESSION['nm_user']	= $data['nm_user'];
    $_SESSION['id_user']	= $data['id_user'];
    $_SESSION['email_user']	= $data['email_user'];
    $_SESSION['akses']		= $data['akses'];
    $_SESSION['kd_toko']	= $data['kd_toko'];
    $update					= mysqli_query($koneksi, "UPDATE `tabel_member` SET `log` = now() WHERE `id_user` = '$id'");

    echo "<script>alert('Berhasil Login');window.location= '../../page/?menu=home';</script>";
    // echo '<script>
    //         setTimeout(function() {
    //             Swal.fire({
    //                 icon: "success",
    //                 tittle: "Berhasil Login",
    //                 text: "Anda Berhak Mengakses Halaman Beranda",
    //             }, function() {
    //                 window.location = "../page/?menu=home";
    //             });
    //         }, 1);
    //     </script>';
    
}


?>