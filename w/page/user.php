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
                            <li class="breadcrumb-item"><a href="#" class="text-dark"><?php echo $_SESSION['nm_user'];?></a>
                            </li>                                   
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
      <div class="card-body">
  
        <!-- Column selectors with Export Options and print table -->
        <section id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="divider">
                  <div class="divider-text"><h3 class="mb-3 display-4 text-uppercase">Data Pengguna</h3></div>
                </div>
                <div class="card-content">
                  <div class="card-body card-dashboard">                                       
                    <div class="table-responsive">
                      <?php 
                        if($_GET['akses'] == 'merchant'){
                      ?>
                        <table class="table table-striped dataex-html5-selectors">
                          <thead>
                            <tr>
                              <th class="text-center">Kode</th>
                              <th class="text-center">Nama</th>
                              <th class="text-center">Alamat</th>
                              <th class="text-center">No.HP</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Validasi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                               $akses = $_GET['akses'];           
                               $ketQuery = "SELECT * FROM tabel_member WHERE tabel_member.akses = '$akses' ORDER BY nm_user ASC";
                               $executeSat = mysqli_query($koneksi, $ketQuery);
                               while ($m=mysqli_fetch_array($executeSat)) {
                            ?>                                  
                            <tr>
                              <td class="text-center"><?php echo $m['kode_user'] ?></td>
                              <td class="text-capitalize"><?php echo $m['nm_user'] ?></td>
                              <td><?php echo $m['alamat_user'] ?></td>
                              <td class="text-center"><?php echo $m['hp'] ?></td>
                              <td class="text-center"><?php echo $m['stt_user'] ?></td>
                              <td class="text-center">
                               	<a class="badge badge-primary text-white" onclick="action_valid(`<?php echo $m['kode_user']; ?>`,`<?php echo $m['nm_user']; ?>`)">Validasi</a>
                                <a class="badge badge-danger text-white" onclick="action_tolak(`<?php echo $m['kode_user']; ?>`,`<?php echo $m['nm_user']; ?>`)">Tolak</a>
                              </td>
                            </tr>
                               <?php } ?>                                                  
                          </tbody>
                          <tfoot>
                            <tr>
                              <th class="text-center">Kode</th>
                             	<th class="text-center">Nama</th>
                             	<th class="text-center">Alamat</th>
                             	<th class="text-center">No.HP</th>
                              <th class="text-center">Status</th>
                             	<th class="text-center">Validasi</th>
                            </tr>
                          </tfoot>
                        </table>
                      <?php  
                        }else if($_GET['akses'] == 'member'){
                      ?>
                        <table class="table table-striped dataex-html5-selectors">
                          <thead>
                            <tr>
                              <th class="text-center">Kode</th>
                              <th class="text-center">Nama</th>
                              <th class="text-center">Alamat</th>
                              <th class="text-center">No.HP</th>
                              <!-- <th class="text-center">Status</th>
                              <th class="text-center">Validasi</th>
 -->                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                               $akses = $_GET['akses'];           
                               $ketQuery = "SELECT * FROM tabel_member WHERE tabel_member.akses = '$akses' ORDER BY nm_user ASC";
                               $executeSat = mysqli_query($koneksi, $ketQuery);
                               while ($m=mysqli_fetch_array($executeSat)) {
                            ?>                                  
                            <tr>
                              <td class="text-center"><?php echo $m['kode_user'] ?></td>
                              <td class="text-capitalize"><?php echo $m['nm_user'] ?></td>
                              <td><?php echo $m['alamat_user'] ?></td>
                              <td class="text-center"><?php echo $m['hp'] ?></td>
                              <!-- <td class="text-center"><?php echo $m['stt_user'] ?></td>
                              <td class="text-center">
                                <a class="badge badge-primary text-white" onclick="action_valid(`<?php echo $m['kode_user']; ?>`,`<?php echo $m['nm_user']; ?>`)">Validasi</a>
                                <a class="badge badge-danger text-white" onclick="action_tolak(`<?php echo $m['kode_user']; ?>`,`<?php echo $m['nm_user']; ?>`)">Tolak</a>
                              </td> -->
                            </tr>
                               <?php } ?>                                                  
                          </tbody>
                          <tfoot>
                            <tr>
                              <th class="text-center">Kode</th>
                              <th class="text-center">Nama</th>
                              <th class="text-center">Alamat</th>
                              <th class="text-center">No.HP</th>
                              <!-- <th class="text-center">Status</th>
                              <th class="text-center">Validasi</th> -->
                            </tr>
                          </tfoot>
                        </table>
                      <?php  
                        }
                      ?>
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
  </div>
</div>
<!-- END: Content-->


<script type="text/javascript">
  function action_valid(kode_user, nm_user){

    let valid = confirm("Aktifkan Merchant");

     $.ajax({
      type: "POST",
      url: "../aut/validasi_merchant.php",
      data: {
          kode_user: kode_user
      },
      success: function(data) {
        if (data) {
          alert('Merchant Aktif') ? "" : location.reload();
        }
      }
    });
  }

  function action_tolak(kode_user, nm_user){
    let valid = confirm("Tolak Merchant");

     $.ajax({
      type: "POST",
      url: "../aut/tolak_merchant.php",
      data: {
          kode_user: kode_user
      },
      success: function(data) {
        if (data) {
          alert('Merchant Ditolak') ? "" : location.reload();
        }
      }
    });
  }
</script>