<!-- BEGIN: Content-->
   <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0 text-dark text-capitalize"><?php echo $_SESSION['akses'];?></h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#" class="text-dark">Sales Report</a>
                                    </li>                                   
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="card">
     <div class="card-body">
<?php
include "../inc/koneksi.php";
//untuk menantukan tanggal awal dan tanggal akhir data di database
$min_tanggal = mysqli_fetch_array(mysqli_query($koneksi, "SELECT MIN(tgl_penjualan) AS min_tanggal FROM tabel_penjualan"));
$max_tanggal = mysqli_fetch_array(mysqli_query($koneksi, "SELECT MAX(tgl_penjualan) AS max_tanggal FROM tabel_penjualan"));
?>  
<!-- Column selectors with Export Options and print table -->
      <section id="column-selectors">
         <div class="row">
           <div class="col-12">
             <div class="card">
                <div class="divider">
                     <div class="divider-text"><h3 class="mb-3 display-4 text-uppercase">Laporan Penjualan</h3></div>
                 </div>
                 <div class="card-content">
                   <div class="card-body card-dashboard"> 
                     <div class="row">
                     	<div class="col-lg-3 col-12 mb-3">
                        <form action="index.php?menu=sales" method="post" name="postform">
                           <div class="divider">
                                 <div class="divider-text"><h5 class="mb-3 font-medium-1 text-uppercase">Tanggal Awal</h5></div>
                           </div>
                            <div class="input-group">
                             <input type='text' name="tanggal_awal" class="form-control pickadate" value="<?php echo $min_tanggal['min_tanggal']; ?>" />
                                <div class="input-group-append" id="button-addon2">
                                   <button class="btn btn-primary rounded-0" type="button"><i class="far fa-calendar-minus"></i></button>
                                </div>
                             </div>
                           <div class="divider">
                                 <div class="divider-text"><h5 class="mb-3 font-medium-1 text-uppercase">Tanggal Akhir</h5></div>
                           </div>
                            <div class="input-group">
                             <input type='text' name="tanggal_akhir" class="form-control pickadate" value="<?php echo $max_tanggal['max_tanggal']; ?>" />
                                <div class="input-group-append" id="button-addon2">
                                   <button class="btn btn-primary rounded-0" type="button"><i class="far fa-calendar-plus"></i></button>
                                </div>
                             </div>
                           <button type="submit" name="cari" class="btn btn-block btn-info mt-2 text-white rounded-0">TAMPIL</button>
                        </form>
                        </div>
                        <div class="col-lg-9 col-12 mb-1">
                        	<div class="table-responsive">
<?php
if (isset($_POST['cari'])) {
$tanggal_awal = $_POST['tanggal_awal'];
$tanggal_akhir = $_POST['tanggal_akhir'];
if (empty($tanggal_awal) and empty($tanggal_akhir)) {
          //jika tidak menginput apa2
$query = mysqli_query($koneksi, "SELECT * FROM tabel_penjualan ORDER BY tgl_penjualan DESC");
$jumlah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(total_penjualan) AS total FROM tabel_penjualan ORDER BY tgl_penjualan DESC"));
        } else {
      ?><i><b>Data Penjualan : </b> Pencarian dari tanggal <b><?php echo $_POST['tanggal_awal'] ?></b> sampai dengan tanggal <b><?php echo $_POST['tanggal_akhir'] ?></b></i>
	  <?php $query = mysqli_query($koneksi, "SELECT * FROM tabel_penjualan WHERE tgl_penjualan BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tgl_penjualan DESC");
            $jumlah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(total_penjualan) AS total FROM tabel_penjualan WHERE tgl_penjualan BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tgl_penjualan DESC")); } ?>                         
                        
                        <table class="table table-striped dataex-html5-selectors">
                           <thead>
                             <tr>
                                <th>No</th>
                                <th>Faktur</th>
                                <th>Tanggal</th>
                                <th>Penjualan</th>
                                <th>Barang</th>
                                <th>Member</th>
                                <th>Keterangan</th>
                              </tr>
                              <?php
                              //untuk penomoran data
                              $no = 0;
                              //menampilkan data
                              while ($row = mysqli_fetch_array($query)) {
                              ?>
                               <tbody> 
                                <tr>
                                  <td style="vertical-align: top;"><?php echo $no = $no + 1; ?></td>
                                  <td style="vertical-align: top;"><?php echo $row['no_faktur_penjualan']; ?></td>
                                  <td style="vertical-align: top;"><?php echo $row['tgl_penjualan']; ?></td>
                                  <td style="vertical-align: top;">
                                    <!--?php echo number_format($row['total_penjualan'],0,',','.');?--><?php echo $row['total_penjualan']; ?></td>
                                  <td>
                                    <?php $c = mysqli_query($koneksi, "SELECT * FROM tabel_barang, tabel_rinci_penjualan WHERE tabel_barang.kd_barang = tabel_rinci_penjualan.kd_barang AND tabel_rinci_penjualan.no_faktur_penjualan = '$row[no_faktur_penjualan]' ");
                    
                                    while ($d = mysqli_fetch_array($c)) {
                                      $hrg     = $d['harga'];
                                      $jml     = $d['jumlah'];
                                      $total_hrg  = $hrg * $jml;
                                    ?>
                                      <?php echo $jml ?> &nbsp; <?php echo $d['nm_barang'] ?>
                                      <hr />
                                    <?php } ?>
                    
                                  </td>
                                  <td style="vertical-align: top;">
<?php $e = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE tabel_member.id_user = '$row[id_user]'")); ?>
                                    <?php echo $e['nm_user'] ?></td>
                                  <td style="vertical-align: top;"><?php echo $row['ket']; ?></td>
                                </tr>
                              <?php  } ?>
                              </tbody>
          <tfoot>
          <tr>
            <th>TOTAL</th>
            <th>
              <!--?php echo number_format($jumlah['total'],2,',','.');?--><?php echo $jumlah['total']; ?></th>
          </tr>
		  
          <tr>
            <td>
              <?php
              //jika data tidak ditemukan
              if (mysqli_num_rows($query) == 0) {
                echo "<font color=red><blink>Tidak ada data yang dicari!</blink></font>";
              }
              ?>
            </td>
          </tr>
          </tfoot>
        </table>
                          </div>
 <?php } else {
        unset($_POST['cari']);
      } ?>                       	
                        </div>
                        
                      </div>
                     </div>
                    </div>
                   </div>
                  </div>
                 </div>
                </section>
<!-- Column selectors with Export Options and print table -->                 
            </div>
          </div>
       <!-- END: Content-->
   </div>
</div> 