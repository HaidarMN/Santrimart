<head>
	<!-- SweetAlert -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
	session_start();
	include "../inc/koneksi.php";
	$nama		= $_POST['nama'];	
	$password	= $_POST['pass'];
	
	$query	= "SELECT * FROM tabel_member WHERE nm_user  = '$nama'";
	$hasil	= mysqli_query($koneksi,$query);
	$data	= mysqli_fetch_assoc($hasil);
	
	$pengacak = "p3ng4c4k";
	
	$passmd = md5($pengacak . md5($password));
	if ($passmd == $data['password'])
	{
		$id						= $data['id_user'];
		$_SESSION['nm_user']	= $data['nm_user'];
		$_SESSION['id_user']	= $data['id_user'];
		$_SESSION['email_user']	= $data['email_user'];
		$_SESSION['akses']		= $data['akses'];
		$_SESSION['kd_toko']	= $data['kd_toko'];
		$update					= mysqli_query($koneksi, "UPDATE `tabel_member` SET `log` = now() WHERE `id_user` = '$id'");

		// echo "<script>alert('Berhasil Login');window.location= '../page/?menu=home';</script>";
		echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "success",
						tittle: "Berhasil Login",
						text: "Anda Berhak Mengakses Halaman Beranda",
					}, function() {
						window.location = "../page/?menu=home";
					});
				}, 1);
			</script>';
	}else{
		// echo "<script>alert('Gagal Login');window.location= 'login.php';</script>";
		echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "error",
						tittle: "Gagal login",
						text: "Periksa username dan password",
					}, function() {
						window.location.href = "login.php";
					});
				}, 1);
			</script>';
	}
	
?>