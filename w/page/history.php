<div class="app-content content">
    <div class="content-overlay"></div>

    <div class="header-navbar-shadow"></div>

    <div class="content-wrapper">

        <!-- NAVIGASI -->
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0 text-dark text-capitalize">
                            <?php echo $_SESSION['akses']; ?>
                        </h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php?menu=home" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#" class="text-dark">Histori</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-detached content-right">
            <div class="content-body row">

                <!-- MAIN CONTENT -->
                <section id="basic-examples">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card p-2">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>No Faktur</th>
                                                    <th>Kode Suplier</th>
                                                    <th>Tanggal Pembelian</th>
                                                    <th>Total Pembelian</th>
                                                    <th>Biaya Pengiriman</th>
                                                    <th>Total Biaya</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $id_user    = $_SESSION['id_user'];
                                                    $ketQuery   = "SELECT * FROM tabel_pembelian WHERE tabel_pembelian.id_user = $id_user";
                                                    $executeSat = mysqli_query($koneksi, $ketQuery);
                                                    while ($b = mysqli_fetch_array($executeSat)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $b['no_faktur_pembelian'] ?></td>
                                                    <td><?php echo $b['kd_supplier'] ?></td>
                                                    <td><?php echo $b['tgl_pembelian'] ?></td>
                                                    <td><?php echo $b['total_pembelian'] ?></td>
                                                    <td><?php echo $b['biaya_pengiriman'] ?></td>
                                                    <td><?php echo $b['total_biaya'] ?></td>
                                                    <td><?php echo $b['ket'] ?></td>
                                                    <td><?php echo $b['status'] ?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- SIDEBAR -->
        <div class="sidebar-detached sidebar-left">
            <div class="sidebar">

                <!-- JUDUL -->
                <div class="sidebar-shop" id="ecommerce-sidebar-toggler">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="filter-heading d-none d-lg-block">Filter pencarian</h6>
                        </div>
                    </div>
                </div>
                <span class="sidebar-close-icon d-block d-md-none">
                    <i class="feather icon-x"></i>
                </span>

                <!-- BODY SIDEBAR -->
                <div class="card">
                    <div class="card-body">
                        
                        <!-- STATUS -->
                        <div class="multi-range-price">
                            <div class="multi-range-title pb-75">
                                <h6 class="filter-title mb-0">Status</h6>
                            </div>
                            <ul class="list-unstyled price-range" id="price-range">
                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="price-range" checked value="false">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">All</span>
                                    </span>
                                </li>
                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="price-range" value="false">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">Belum bayar</span>
                                    </span>
                                </li>
                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="price-range" value="false">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">Dikemas</span>
                                    </span>
                                </li>
                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="price-range" value="false">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">Dikirim</span>
                                    </span>
                                </li>
                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="price-range" value="false">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">Selesai</span>
                                    </span>
                                </li>
                            </ul>
                        </div>

                        <hr>

                        <!-- CLEAR FILTER -->
                        <div id="clear-filters">
                            <button class="btn btn-block btn-primary">CLEAR ALL FILTER</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>