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
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Statistics card section start -->
        <section id="statistics-card">
            <div class="row">


                <?php 
                $satQuery = "SELECT COUNT(kd_barang) as barang FROM tabel_barang WHERE `kd_merchant` = $_SESSION[id_user]";
                $executeSat = mysqli_query($koneksi, $satQuery);
                while ($barang = mysqli_fetch_array($executeSat)) {
                ?>
                <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                    <a href="index.php?menu=product" class="text-dark" style="text-decoration:none">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                        <div class="avatar-content">
                                            <i class="fas fa-box-open font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700"><?= $barang['barang'] ?></h2>
                                    <p class="mb-0 line-ellipsis">Produk <?php echo $_SESSION['nm_user']; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php  }  ?>

                <?php
                $satQuery = "SELECT COUNT(total_retur) as total_retur FROM tabel_retur WHERE `id_user` = $_SESSION[id_user]";
                $executeSat = mysqli_query($koneksi, $satQuery);
                while ($count = mysqli_fetch_array($executeSat)) {
                ?>

                <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                    <a href="index.php?menu=retur" class="text-dark" style="text-decoration:none">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                        <div class="avatar-content">
                                            <i class="fas fa-recycle font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700"><?= $count['total_retur']    ?></h2>
                                    <p class="mb-0 line-ellipsis">Retur</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>

                <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                    <a href="index.php?menu=sales" class="text-dark" style="text-decoration:none">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                        <div class="avatar-content">
                                            <i class="fas fa-paste font-medium-5"></i>
                                        </div>
                                    </div>
                                    <!-- <h2 class="text-bold-700">1</h2> -->
                                    <p class="mb-0 line-ellipsis">Laporan Penjualan</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                    <a href="index.php?menu=balance" class="text-dark" style="text-decoration:none">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                        <div class="avatar-content">
                                            <i class="fas fa-balance-scale font-medium-5"></i>
                                        </div>
                                    </div>
                                    <!-- <h2 class="text-bold-700">1</h2> -->
                                    <p class="mb-0 line-ellipsis">Laporan Laba</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                    <a href="index.php?menu=stock" class="text-dark" style="text-decoration:none">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                        <div class="avatar-content">
                                            <i class="fas fa-clipboard-list font-medium-5"></i>
                                        </div>
                                    </div>
                                    <!-- <h2 class="text-bold-700">1</h2> -->
                                    <p class="mb-0 line-ellipsis">Laporan Stock</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>


            <?php
            $satQuery = "SELECT COUNT(nm_user) as nm_user FROM tabel_member WHERE akses='member'";
            $executeSat = mysqli_query($koneksi, $satQuery);
            while ($count = mysqli_fetch_array($executeSat)) {
            ?>
            <div class="row">
                <!-- <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-primary font-medium-5"></i>
                                </div>
                            </div>

                            <h2 class="text-bold-700 mt-1"><?= $count['nm_user'] ?></h2>
                            <p class="mb-0"> Member</p>
                        </div>
                        <div class="card-content">
                            <div id="line-area-chart-1"></div>
                        </div>
                    </div>
                </div> -->

                <?php } ?>

                <?php
                $satQuery = "SELECT SUM(jumlah) as jumlah FROM tabel_rinci_penjualan ";
                $executeSat = mysqli_query($koneksi, $satQuery);
                while ($count = mysqli_fetch_array($executeSat)) {
                    // print_r($count)

                ?>

                <!-- <div class="col-lg-4 col-sm-6 col-12"> -->
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-credit-card text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><?= $count['jumlah'] ?></h2>
                            <p class="mb-0">Transaksi</p>
                        </div>
                        <div class="card-content">
                            <div id="line-area-chart-2"></div>
                        </div>
                    </div>
                </div>

                <?php } ?>

                <?php
                $satQuery = "SELECT SUM(jumlah), SUM(stok_awal) FROM tabel_rinci_penjualan ";
                $executeSat = mysqli_query($koneksi, $satQuery);
                while ($count = mysqli_fetch_array($executeSat)) {
                    $countPersen = substr($count[0] / $count[1] * 100, 0, 4);
                ?>

                <!-- <div class="col-lg-4 col-sm-6 col-12"> -->
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-danger p-50 m-0">
                                <div class="avatar-content">
                                    <i class="fas fa-truck-loading font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><?= $countPersen ?> %</h2>
                            <p class="mb-0">Sirkulasi Produk</p>
                        </div>
                        <div class="card-content">
                            <div id="line-area-chart-3"></div>
                        </div>
                    </div>
                </div>
                <?php } ?>


            </div>

        </section>
        <!-- // Statistics Card section end-->




    </div>
</div>
<!-- END: Content-->