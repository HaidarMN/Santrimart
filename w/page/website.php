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
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Edit website</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <!-- account setting page start -->
            <section id="page-account-settings">
                <div class="row">

                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
                                    href="#account-vertical-general" aria-expanded="true"><i
                                        class="feather icon-globe mr-50 font-medium-3"></i>Profile Website</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                                    href="#account-vertical-password" aria-expanded="false">
                                    <i class="feather icon-lock mr-50 font-medium-3"></i>Password</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill"
                                    href="#account-vertical-social" aria-expanded="false"><i
                                        class="feather icon-camera mr-50 font-medium-3"></i>Social Media</a>
                            </li>


                        </ul>
                    </div>

                    <?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko")); ?>

                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">

                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                            aria-labelledby="account-pill-general" aria-expanded="true">
                                            <form action="../aksi/edit_toko.php" method="post"
                                                enctype="multipart/form-data">
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img id="chosen-image1"
                                                            src="../img/toko/<?php echo $a['logo'] ?>"
                                                            class="rounded mr-75" height="64" width="64">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label
                                                                class="btn btn-sm btn-primary rounded-0 ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                                for="account-upload">Upload new logo</label>
                                                            <input type="file" id="account-upload" hidden name="image">
                                                            <button
                                                                class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                                                        </div>
                                                        <p class="text-muted ml-75 mt-50">
                                                            <small>Allowed JPG, GIF or PNG. Max size of 100kB</small>
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="my-1">
                                                <!-- <form novalidate> -->
                                                <input type="text" class="form-control" name="id_toko" hidden
                                                    value="<?php echo $a['kd_toko'] ?>">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-name">Name</label>
                                                                <input type="text" name="nama" class="form-control"
                                                                    value="<?php echo $a['nm_toko'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls row">
                                                                <label>Logo Header </label>

                                                                <div class="col mb-1">
                                                                    <img id="chosen-image1"
                                                                        src="../img/toko/<?php echo $a['logo_header'] ?>"
                                                                        class="border p-1" height="20" width="200">
                                                                </div>
                                                                <div class="col-12">
                                                                    <input type="file" name="header"
                                                                        class="form-control"
                                                                        value="<?php echo $a['logo_header'] ?>">
                                                                </div>

                                                                <small>Allowed JPG, GIF or PNG. Max size of
                                                                    100kB</small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Alamat</label>
                                                                <input type="text" name="alamat" class="form-control"
                                                                    value="<?php echo $a['almt_toko'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Kecamatan</label>
                                                                <input type="text" name="kecamatan" class="form-control"
                                                                    value="<?php echo $a['kecamatan_toko'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Kota</label>
                                                                <input type="text" name="kota" class="form-control"
                                                                    value="<?php echo $a['kota_toko'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>KONTEN</label>
                                                                <textarea type="text" name="konten"
                                                                    class="form-control">
                                                                    <?= $a['konten'] ?></textarea>
                                                                <small>ex : Nama Aplikasi, Keterangan, Jargon/Tagline,
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Ketentuan Download App Untuk User</label>
                                                                <textarea type="text" name="ketentuan"
                                                                    class="form-control"><?= $a['ketentuan'] ?></textarea>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Tema Header</label>
                                                                <input type="text" name="style_headerfooter"
                                                                    id="headerfooter" class="form-control"
                                                                    value="<?php echo $a['headerfooter'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Background</label>
                                                                <input type="text" name="style_background" id="latar"
                                                                    class="form-control"
                                                                    value="<?php echo $a['background'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Tema Tombol</label>
                                                                <input type="text" name="style_tombol" id="tombol"
                                                                    class="form-control"
                                                                    value="<?php echo $a['tombol'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" name="upload_edit_toko"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                                                        <button type="reset"
                                                            class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
                                            </form>
                                        </div>

                                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                            aria-labelledby="account-pill-password" aria-expanded="false">
                                            <form action="../aksi/edit_toko.php" method="post">
                                                <div class="row">
                                                    <input type="text" class="form-control" name="id_toko" hidden
                                                        value="<?php echo $a['kd_toko'] ?>">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-old-password">Password Lama</label>
                                                                <input type="password" class="form-control"
                                                                    name="old_password">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-new-password">Password baru</label>
                                                                <input type="password" name="new_password"
                                                                    class="form-control" placeholder="New Password"
                                                                    minlength="6">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-retype-new-password">Ketik Ulang
                                                                    Password</label>
                                                                <input type="password" name="confirm_pass_user"
                                                                    class="form-control" minlength="6">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" name="upload_edit_password_toko"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                                                        <button type="reset"
                                                            class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="account-vertical-social" role="tabpanel"
                                            aria-labelledby="account-pill-social" aria-expanded="false">
                                            <?php
                      $id_toko = $a['kd_toko'];
                      $medsos = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tabel_medsos_toko` WHERE `id_toko` = '$id_toko'"));
                      // var_dump($medsos);
                      $twitter = "";
                      $facebook = "";
                      $google = "";
                      $tiktok = "";
                      $instagram = "";

                      if ($medsos != null) {
                        $twitter = $medsos['twitter'];
                        $facebook = $medsos['facebook'];
                        $google = $medsos['google'];
                        $tiktok = $medsos['tiktok'];
                        $instagram = $medsos['instagram'];
                      }
                      ?>
                                            <form action="../aksi/edit_toko.php" method="post">
                                                <div class="row">
                                                    <div class="col-12 mb-1">
                                                        <h5>Akun Media Sosial <span class="badge badge-dark">Tidak Wajib
                                                                Diisi</span></h5>
                                                    </div>
                                                    <hr>
                                                    <input type="text" class="form-control" name="id_toko" hidden
                                                        value="<?php echo $a['kd_toko'] ?>">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-twitter">Twitter</label>
                                                            <input type="text" name="account-twitter"
                                                                class="form-control" placeholder="Add link"
                                                                value="<?php echo $twitter ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-facebook">Facebook</label>
                                                            <input type="text" name="account-facebook"
                                                                class="form-control" placeholder="Add link"
                                                                value="<?php echo $facebook ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-google">Google+</label>
                                                            <input type="text" name="account-google"
                                                                class="form-control" placeholder="Add link"
                                                                value="<?php echo $google ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-tiktok">Tiktok</label>
                                                            <input type="text" name="account-tiktok"
                                                                class="form-control" placeholder="Add link"
                                                                value="<?php echo $tiktok ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-instagram">Instagram</label>
                                                            <input type="text" name="account-instagram"
                                                                class="form-control" placeholder="Add link"
                                                                value="<?php echo $instagram ?>">
                                                        </div>
                                                    </div>


                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" name="upload_edit_medsos_toko"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                                                        <button type="reset"
                                                            class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- account setting page end -->
        </div>
    </div>
</div>
<!-- END: Content-->

<script type="text/javascript">
let uploadButton1 = document.getElementById("account-upload");
let chosenImage1 = document.getElementById("chosen-image1");

uploadButton1.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButton1.files[0]);
    reader.onload = () => {
        chosenImage1.setAttribute("src", reader.result);
    }
}
</script>