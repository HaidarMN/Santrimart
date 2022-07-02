<?php
// Defining variables
include "../inc/koneksi.php";

if (isset($_POST['submit'])) {
    $id_user =  $_POST['kategori'];
    $tanggal = $_POST['tanggal'];
    $jumlah =  $_POST['nominal'];
    $keterangan = $_POST['keterangan'];


    $saldo_masuk = "INSERT INTO 'tabel_saldo' ('id_user', 'tanggal', 'jumlah','pengeluaran', 'ket_saldo')   VALUES ('$id_user', 
    '$tanggal','$jumlah','0','$keterangan')";

    if (mysqli_query($koneksi, $saldo_masuk)) {
        echo "sukses";

        // echo nl2br("\n$first_name\n $last_name\n "
        //     . "$gender\n $address\n $email");
    } else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    //check if form was submitted
}
// Checking for a POST request

// Removing the redundant HTML characters if any exist.

?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0 text-dark text-capitalize">
                            <?php echo $_SESSION['akses']; ?></h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Saldo</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="divider">
                    <div class="divider-text">
                        <h3 class="mb-3 display-4 text-uppercase">Saldo</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-12 pb-5">
                        <form method="post" action="../aksi/input_saldo.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 pb-1">
                                    <?php if ($_SESSION['akses'] == 'member') {   ?>
                                    <input type="text" name="kategori" class="form-control"
                                        value="<?= $_SESSION['id_user'] ?>" hidden>

                                    <?php } else { ?>
                                    <div class="font-small-2 mb-1 mt-1">Member</div>
                                    <select name="kategori" class="form-control select2" required>
                                        <option disabled selected>Pilih Member</option>
                                        <?php error_reporting(0);
                                            $ketQuery = "SELECT * FROM tabel_member WHERE akses !='admin' ORDER BY nm_user ASC";
                                            $executeSat = mysqli_query($koneksi, $ketQuery);
                                            while ($k = mysqli_fetch_array($executeSat)) {
                                            ?>
                                        <option value="<?php echo $k['id_user']; ?>"><?php echo $k['nm_user']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <?php } ?>
                                </div>

                                <div class="col-12 pb-1">
                                    <div class="font-small-2 mb-1">Tanggal</div>
                                    <fieldset>
                                        <div class="input-group">
                                            <input type="text" name="tanggal" class="form-control pickadate" required>
                                            <div class="input-group-append" id="button-addon2">
                                                <button class="btn btn-primary rounded-0" type="button">
                                                    <i class="far fa-calendar-alt"></i></button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-12 col-md-12">
                                    <div class="font-small-2 mb-1">Nominal</div>
                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                        <input type="number" name="nominal" class="form-control"
                                            placeholder="Isi disini" required />
                                        <small class="counter-value float-right"><span class="char-count">Tanpa titik
                                                dan Rupiah</span></small>
                                        <div class="form-control-position"><i class="feather icon-clipboard"></i>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-12">
                                    <div class="font-small-2 mb-1">Bukti Transfer</div>
                                    <fieldset class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="" id="image" required>
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-12 mt-1 mb-2">
                                    <div class="font-small-2 mb-1">Keterangan</div>
                                    <fieldset class="form-label-group mb-0">
                                        <textarea data-length=100 name="keterangan" class="form-control char-textarea"
                                            required rows="3">Isi disini</textarea>
                                    </fieldset>
                                    <small class="counter-value float-right"><span class="char-count">maks.</span> / 100
                                        karakter</small>
                                </div>

                                <div class="col-12 mt-1 mb-2">
                                    <input type="submit" name="submit" value="Upload"
                                        class="btn btn-primary rounded-0" />
                                    <input type="reset" name="" value="Cancel" onClick="hide(0)"
                                        class="btn btn-danger rounded-0" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="badge badge-primary float-right">
                           <?php
                            $id_user = $_SESSION['id_user'];
                            if ($_SESSION['akses'] == 'member') {
                                $sql_user = mysqli_query($koneksi, "SELECT * FROM tabel_saldo WHERE id_user = '$id_user'");
                                $jumlah_user = mysqli_num_rows($sql_user);
                            } else {
                                $sql_user = mysqli_query($koneksi, "SELECT * FROM tabel_saldo");
                                $jumlah_user = mysqli_num_rows($sql_user);
                            }
                            ?>
                            <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
                                <?php echo $jumlah_user; ?>
                            </span>
                            Total Saldo
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                                <?php if ($_SESSION['akses'] == 'member') {   ?>
                                <thead>
                                    <tr>
                                        <th>Member</th>
                                        <th>Saldo</th>
                                        <th>Pengeluaran</th>
                                        <th>Topup</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $id_user = $_SESSION['id_user'];
                                        $ketQuery = "SELECT * FROM tabel_saldo,tabel_member WHERE tabel_saldo.id_user = $id_user AND tabel_member.id_user = $id_user ";
                                        $executeSat = mysqli_query($koneksi, $ketQuery);
                                        while ($b = mysqli_fetch_array($executeSat)) {

                                        ?>
                                    <tr>
                                        <td><?php echo $b['nm_user'] ?></td>
                                        <td>Rp.<?php echo number_format($b['jumlah'], 0, ",", "."); ?></td>
                                        <td>Rp.<?php echo number_format($b['pengeluaran'], 0, ",", "."); ?></td>

                                        <td><?php echo $b['tanggal'] ?></td>
                                        <!-- <td>
                                            <a href="#" data-toggle="modal" data-target="#ad">
                                                <i class="fas fa-edit"></i></a>
                                            <a class="action-delete"><i class="fas fa-trash-alt"></i></a>
                                        </td> -->
                                    </tr>
                                    <?php } ?>
                                </tbody>


                                <?php } else { ?>
                                <thead>
                                    <tr>
                                        <th>Member</th>
                                        <th>Saldo</th>
                                        <th>Topup</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>

                                <?php
                                    $ketQuery = "SELECT * FROM tabel_saldo, tabel_member WHERE tabel_saldo.id_user = tabel_member.id_user";
                                    $executeSat = mysqli_query($koneksi, $ketQuery);
                                    while ($b = mysqli_fetch_array($executeSat)) {
                                        // print_r($b)
                                    ?>
                                <tr>
                                    <td><?php echo $b['nm_user'] ?></td>
                                    <td>Rp.<?php echo number_format($b['jumlah'], 0, ",", "."); ?></td>
                                    <td><?php echo $b['tanggal'] ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#ad">
                                            <i class="fas fa-edit"></i></a>
                                        <a class="action-delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                <?php } ?>

                                <!-- <tfoot>
                                    <tr>
                                        <th>Member</th>
                                        <th>Saldo</th>
                                        <th>Topup</th>
                                        <th>Edit</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>

                    </div>
                </div>
                <!-- END: Content-->
            </div>
        </div>
    </div>
</div>

<!---------------------------------------- Modal Kategori ------------------------------------>
<div class="modal fade text-left" id="kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel20"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-plus-circle"></i> Tambahkan
                    kategori baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="post" class="form-kategori">
                    <div class="row">
                        <div class="col-12">
                            <div class="font-small-2 mb-1">Icon</div>
                            <fieldset class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="ip-logo" id="logo"
                                        accept="image/png, image/gif, image/jpeg">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <div class="font-small-2 mb-1">Nama Kategori</div>
                            <fieldset class="form-group">
                                <div class="custom-file">
                                    <input type="text" name="ip-kat" class="form-control" placeholder="Isi disini"
                                        id="defaultForm-kat" />
                                </div>
                            </fieldset>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" name="submit-kategori" id="submit-kategori" class="btn btn-dark"
                    data-dismiss="modal">SEND</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!---------------------------------------- Modal Kategori ------------------------------------>


<!---------------------------------------- Modal ads------------------------------------>
<div class="modal fade" id="ad" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-plus-circle"></i> Ubah Data
                    Informasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 pb-1">
                            <div class="font-small-2 mb-1">Judul</div>
                            <fieldset>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tulis disini!">
                                    <div class="input-group-append" id="button-addon2">
                                        <button class="btn btn-primary rounded-0" type="button">
                                            <i class="fas fa-align-center"></i></button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-12">
                            <div class="font-small-2 mb-1">File</div>
                            <fieldset class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-12">
                            <div class="font-small-2 mb-1 mt-1">Kategori Iklan</div>
                            <select name="kategori" class="form-control select2">
                                <option disabled selected>Pilih Kategori</option>
                                <option value="header">Header All Page</option>
                                <option value="landingpage">Promo Landingpage</option>
                                <option value="slide">Slide</option>
                            </select>

                        </div>

                        <div class="col-12 mt-1 mb-2">
                            <div class="font-small-2 mb-1">Keterangan</div>
                            <fieldset class="form-label-group mb-0">
                                <textarea data-length=100 class="form-control char-textarea" rows="3"
                                    name="">Isi disini</textarea>
                            </fieldset>
                            <small class="counter-value float-right"><span class="char-count">maks.</span> / 100
                                karakter</small>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" name="" value="Upload" class="btn btn-primary rounded-0" />
                <input type="reset" name="" value="Cancel" onClick="hide(0)" class="btn btn-danger rounded-0" />
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!---------------------------------------- Modal ads------------------------------------>