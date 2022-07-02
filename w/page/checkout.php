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
                                  <li class="breadcrumb-item"><a href="#" class="text-dark">Checkout</a>
                                  </li>
                              </ol>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
            $idUser = $user['id_user'];
            $kdBarang = $_GET['kd_barang'];
            $saldo = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(jumlah) FROM tabel_saldo WHERE id_user = $idUser "));
            $pengeluaran = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(pengeluaran) FROM tabel_saldo WHERE id_user = $idUser "));
            $sisa_saldo = $saldo[0] - $pengeluaran[0];
            ?>







          <div class="content-body">
              <!-- Form wizard with icon tabs section start -->
              <section id="icon-tabs">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-content">
                                  <div class="card-body">
                                      <form action="" method="post" class="icons-tab-steps wizard-circle" name="form">

                                          <!-- Step 1 -->
                                          <h6><i class="step-icon fas fa-luggage-cart"></i> Keranjang</h6>
                                          <fieldset class="checkout-step-1 px-0">
                                              <section id="place-order" class="list-view product-checkout">

                                                  <div class="checkout-items">
                                                      <?php error_reporting(0);
                                                        $Que = "SELECT DISTINCT nm_barang,gambar,hrg_jual,stok,id_brg,nm_toko FROM keranjang,tabel_toko, tabel_barang_gambar, tabel_barang, tabel_stok_toko WHERE  keranjang.id_member = '$idUser' AND keranjang.kd_toko = tabel_toko.kd_toko  AND tabel_barang_gambar.id_brg = keranjang.kd_barang AND tabel_barang.kd_barang = keranjang.kd_barang AND tabel_stok_toko.kd_barang = keranjang.kd_barang ";
                                                        $executeSat = mysqli_query($koneksi, $Que);
                                                        $no = 0;
                                                        while ($d = mysqli_fetch_array($executeSat)) {
                                                            $no++;
                                                            $stok_awal = (int)$d['stok'] - (int)$sisa_stok[0];
                                                            $e = explode(",", $d['gambar']);
                                                            $r = $d['hrg_jual'];
                                                            $kdToko = $d['nm_toko'];
                                                            $barang[] = $d['id_brg'];
                                                        ?>
                                                      <?php
                                                            $nomorFaktur = "ONN";
                                                            $nama_member_upper = strtoupper(substr($d['nm_toko'], 0, 3));
                                                            $nomorFaktur .= $nama_member_upper;
                                                            $query_tabel_penjualan = "SELECT * FROM `tabel_penjualan` WHERE `no_faktur_penjualan` LIKE '%$nama_member_upper%'";
                                                            $hasil_tabel_penjualan = mysqli_query($koneksi, $query_tabel_penjualan);
                                                            $old_faktur = "";
                                                            $new_faktur = "";
                                                            while ($h = mysqli_fetch_array($hasil_tabel_penjualan)) {
                                                                $old_faktur = $h['no_faktur_penjualan'];
                                                            }

                                                            // no faktur + urutan
                                                            if ($old_faktur == null) {
                                                                $new_faktur .= "00001";
                                                            } else {
                                                                $old_faktur = substr($old_faktur, strlen($old_faktur) - 5) + 1;
                                                                $nol = 5 - strlen($old_faktur);
                                                                while ($nol > 0) {
                                                                    $new_faktur .= '0';
                                                                    $nol--;
                                                                }
                                                                $new_faktur = $new_faktur . $old_faktur;
                                                            }

                                                            // print_r($new_faktur);
                                                            $nomorFaktur .= $new_faktur;
                                                            // print_r($nomorFaktur);
                                                            ?>
                                                      <?php $faktur_beli = "BELI";
                                                            $query_member = "SELECT * FROM `tabel_member` WHERE `id_user` = '$idUser'";
                                                            $hasil_member = mysqli_fetch_array(mysqli_query($koneksi, $query_member));
                                                            $member_upper = strtoupper(substr($hasil_member['nm_user'], 0, 3));
                                                            // no faktur + nama toko
                                                            $faktur_beli .= $member_upper;

                                                            $query_tabel_pembelian = "SELECT * FROM `tabel_pembelian` WHERE `no_faktur_pembelian` LIKE '%$member_upper%'";
                                                            $hasil_tabel_pembelian = mysqli_query($koneksi, $query_tabel_pembelian);
                                                            $faktur_lama = "";
                                                            $faktur_baru = "";
                                                            while ($j = mysqli_fetch_array($hasil_tabel_pembelian)) {
                                                                $faktur_lama = $j['no_faktur_pembelian'];
                                                                // print_r($faktur_lama);
                                                            }

                                                            if ($faktur_lama == null) {
                                                                $faktur_baru .= "00001";
                                                            } else {
                                                                $faktur_lama = substr($faktur_lama, strlen($faktur_lama) - 5) + 1;
                                                                $noll = 5 - strlen($faktur_lama);
                                                                while ($noll > 0) {
                                                                    $faktur_baru .= '0';
                                                                    $noll--;
                                                                }
                                                                $faktur_baru = $faktur_baru . $faktur_lama;
                                                            }

                                                            // print_r($new_faktur);
                                                            $faktur_beli .= $faktur_baru;
                                                            ?>
                                                      <div class="card ecommerce-card">
                                                          <div class="card-content ">
                                                              <div class="item-img text-center">
                                                                  <a href="index.php?menu=detail">
                                                                      <input type="text" name="kd_barang[]"
                                                                          value="<?= $d['id_brg'] ?>" hidden>
                                                                      <img src="../img/produk/<?php echo $e[0] ?>"
                                                                          width="90%" height="90%">
                                                                  </a>
                                                              </div>

                                                              <div class="card-body ">
                                                                  <div class="coupons-title mb-1">
                                                                      <input type="text" name="fakturJual"
                                                                          id="fakturJual"
                                                                          value="<?php echo $nomorFaktur; ?> " hidden>
                                                                      <input type="text" name="fakturBeli"
                                                                          id="fakturBeli"
                                                                          value="<?php echo $faktur_beli; ?>" hidden>
                                                                      <input type="text" name="nama_barang"
                                                                          value="<?php echo $d['nm_barang'] ?>" hidden>

                                                                      <p id="barang"> <?php echo $d['nm_barang'] ?></p>
                                                                  </div>
                                                                  <div class="item-name">
                                                                      <a href="index.php?menu=detail"></a>
                                                                      <input type="text" id="total-stok-<?= $no ?>"
                                                                          value="<?= $stok_awal ?>" hidden>
                                                                      <input type="text" id="total-harga-<?= $no ?>"
                                                                          name="total-harga[]"
                                                                          value="<?php echo $d['hrg_jual'] ?>" hidden>
                                                                      <p class="stock-status-in">

                                                                      <p id="stok_total-<?= $no ?>">
                                                                          <?php echo $stok_awal ?>
                                                                      </p>

                                                                      </p>
                                                                  </div>
                                                                  <div class="item-quantity">
                                                                      <p class="quantity-title">
                                                                      <div
                                                                          class="input-group quantity-counter-wrapper ">
                                                                          <input type="text" name="quantity[]"
                                                                              class="quantity-counter"
                                                                              id="quantity-<?= $no ?>"
                                                                              onchange="cek_jumlah(<?= $no ?>)"
                                                                              value="1">
                                                                      </div>
                                                                      </p>
                                                                  </div>
                                                              </div>
                                                              <div class="item-options text-center">
                                                                  <div class="item-wrapper">
                                                                      <div class="item-rating">
                                                                          <div class="badge badge-primary badge-md">
                                                                              4 <i class="feather icon-star ml-25"></i>
                                                                          </div>
                                                                      </div>
                                                                      <div class="item-cost">
                                                                          <h6 class="item-price">
                                                                              <input name="harga" type="number"
                                                                                  value="<?= $d['hrg_jual'] ?>"
                                                                                  id="harga-<?= $no ?>" hidden>
                                                                              Rp.<?php echo $d['hrg_jual']; ?>
                                                                          </h6>
                                                                          <p class="shipping">
                                                                              <i class="feather icon-shopping-cart"></i>
                                                                              Free Shipping
                                                                          </p>
                                                                      </div>
                                                                  </div>
                                                                  <div class="wishlist ">
                                                                      <button class=" remove-wishlist btn-block"
                                                                          style="border: none;background-color: transparent;"
                                                                          onclick="hapus(`<?php echo $idUser ?>`,`<?php echo $d['id_brg'] ?>`)"><i
                                                                              class="feather icon-x align-middle">&nbsp
                                                                              REMOVE</i></button>
                                                                  </div>
                                                                  <div class="cart remove-wishlist rounded-0 "
                                                                      onclick="">
                                                                      <i class="fa fa-heart-o mr-25"></i> Wishlist
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <?php } ?>
                                                  </div>

                                                  <div class="checkout-options">
                                                      <div class="card">
                                                          <div class="card-content">
                                                              <div class="card-body">
                                                                  <hr>
                                                                  <div class="price-details">
                                                                      <p>Price Details</p>
                                                                  </div>
                                                                  <div class="detail">
                                                                      <div class="detail-title">
                                                                          <p>Total </p>
                                                                      </div>
                                                                      <div class="detail-amt">
                                                                          <p id="total_harga">
                                                                              Rp.0</p>
                                                                      </div>
                                                                  </div>
                                                                  <div class="detail">
                                                                      <div class="detail-title">
                                                                          Diskon
                                                                      </div>
                                                                      <div class="detail-amt discount-amt">
                                                                          <input type="number" name="diskon" id="diskon"
                                                                              value="<?= $d['diskon'] ?>" hidden>
                                                                          <p id="disc"> Rp.0<?php echo $d['diskon']; ?>
                                                                          </p>
                                                                      </div>
                                                                  </div>
                                                                  <hr>
                                                                  <div class="detail">
                                                                      <div class="detail-title detail-total">Total
                                                                      </div>
                                                                      <div class="detail-amt total-amt">
                                                                          <p id="total_final">
                                                                              Rp.<?php echo $d['hrg_jual']; ?></p>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                              </section>
                                          </fieldset>

                                          <!-- Step 2 -->
                                          <h6><i class="step-icon fas fa-map-marker-alt"></i> Pengiriman</h6>
                                          <fieldset>

                                              <section id="checkout-address" class="list-view product-checkout">
                                                  <div class="card">
                                                      <div class="card-header flex-column align-items-start">
                                                          <h4 class="card-title">Tambah Alamat Pengiriman</h4>
                                                          <p class="text-muted mt-25">Pastikan untuk mencentang "Kirim
                                                              ke alamat ini" setelah Anda selesai</p>
                                                      </div>
                                                      <div class="card-content">
                                                          <div class="card-body">
                                                              <div class="row">
                                                                  <div class="col-md-6 col-sm-12">
                                                                      <div class="form-group">
                                                                          <label for="checkout-name">Nama
                                                                              penerima</label>
                                                                          <input type="text" class="form-control"
                                                                              name="">
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-md-6 col-sm-12">
                                                                      <div class="form-group">
                                                                          <label
                                                                              for="checkout-number">No.Handphone:</label>
                                                                          <input type="number" class="form-control"
                                                                              name="">
                                                                      </div>
                                                                  </div>

                                                                  <div class="col-md-6 col-sm-12">
                                                                      <div class="form-group">
                                                                          <label for="checkout-landmark">Alamat
                                                                              Lengkap</label>
                                                                          <input type="text" class="form-control"
                                                                              name="">
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-md-6 col-sm-12">
                                                                      <div class="form-group">
                                                                          <label for="checkout-city">Kota</label>
                                                                          <input type="text" class="form-control"
                                                                              name="">
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-sm-6 offset-md-6">
                                                                      <div
                                                                          class="btn btn-primary rounded-0 float-right">
                                                                          SIMPAN
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="customer-card">
                                                      <div class="card">
                                                          <div class="card-header">
                                                              <input type="text" name="alamat"
                                                                  value="<?= $user['alamat_user'] ?>" hidden>
                                                              <input type="text" name="hp" value="<?= $user['hp'] ?>"
                                                                  hidden>
                                                              <input type="text" name="nama_user"
                                                                  value="<?= $user['id_user'] ?>" hidden>
                                                              <h4 class="card-title"><?php echo $user['nm_user'] ?></h4>
                                                          </div>
                                                          <div class="card-content">
                                                              <div class="card-body actions">
                                                                  <p class="mb-0"><?php echo $user['alamat_user'] ?></p>
                                                                  <!-- <p>Lewis Center, OH 43035</p>
                                                                  <p>UTC-5: Eastern Standard Time (EST) </p>
                                                                  <p>202-555-0140</p> -->
                                                                  <hr>
                                                                  <div class="btn btn-primary btn-block rounded-0">KIRIM
                                                                      DI ALAMAT YANG SAMA</div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>

                                              </section>
                                          </fieldset>

                                          <!-- Step 3 -->
                                          <h6><i class="step-icon fas fa-credit-card"></i> Pembayaran</h6>
                                          <fieldset>
                                              <section id="checkout-payment" class="list-view product-checkout">
                                                  <div class="payment-type">
                                                      <div class="card">
                                                          <div class="card-header flex-column align-items-start">
                                                              <h4 class="card-title">Payment options</h4>
                                                              <p class="text-muted mt-25">Be sure to click on correct
                                                                  payment option</p>
                                                          </div>
                                                          <div class="card-content">
                                                              <div class="card-body">
                                                                  <div class="d-flex justify-content-between flex-wrap">
                                                                      <div class="vs-radio-con vs-radio-primary">
                                                                          <input type="radio" name="vueradio" checked=""
                                                                              value="">
                                                                          <span class="vs-radio">
                                                                              <span class="vs-radio--border"></span>
                                                                              <span class="vs-radio--circle"></span>
                                                                          </span>
                                                                          <img src="../img/payment/bank.png"
                                                                              alt="img-placeholder" height="80">
                                                                      </div>
                                                                      <div class="card-holder-name mt-75">
                                                                          <p><?php echo $user['nm_user'] ?></p>
                                                                      </div>
                                                                      <div class="card-expiration-date mt-75">
                                                                          11/2020
                                                                      </div>
                                                                  </div>
                                                                  <div class="customer-cvv mt-1">
                                                                      <div class="form-inline">
                                                                          <label class="mb-50"
                                                                              for="card-holder-cvv">Enter CVV:</label>
                                                                          <input type="number"
                                                                              class="form-control ml-75 mb-50 input-cvv"
                                                                              id="card-holder-cvv">
                                                                          <div
                                                                              class="btn btn-primary btn-cvv ml-50 mb-50">
                                                                              Continue</div>
                                                                      </div>
                                                                  </div>
                                                                  <hr class="my-2">
                                                                  <ul class="other-payment-options list-unstyled">
                                                                      <li>
                                                                          <div
                                                                              class="vs-radio-con vs-radio-primary py-25">
                                                                              <input type="radio" name="vueradio"
                                                                                  value="">
                                                                              <span class="vs-radio">
                                                                                  <span class="vs-radio--border"></span>
                                                                                  <span class="vs-radio--circle"></span>
                                                                              </span>
                                                                              <span>
                                                                                  Credit / Debit / ATM Card
                                                                              </span>
                                                                          </div>
                                                                      </li>
                                                                      <li>
                                                                          <div
                                                                              class="vs-radio-con vs-radio-primary py-25">
                                                                              <input type="radio" name="vueradio"
                                                                                  value="">
                                                                              <span class="vs-radio">
                                                                                  <span class="vs-radio--border"></span>
                                                                                  <span class="vs-radio--circle"></span>
                                                                              </span>
                                                                              <span>
                                                                                  Net Banking
                                                                              </span>
                                                                          </div>
                                                                      </li>
                                                                      <li>
                                                                          <div
                                                                              class="vs-radio-con vs-radio-primary py-25">
                                                                              <input type="radio" name="vueradio"
                                                                                  value="3">
                                                                              <span class="vs-radio">
                                                                                  <span class="vs-radio--border"></span>
                                                                                  <span class="vs-radio--circle"></span>
                                                                              </span>
                                                                              <span>
                                                                                  Transfer
                                                                              </span>
                                                                          </div>
                                                                      </li>
                                                                      <li>
                                                                          <div
                                                                              class="vs-radio-con vs-radio-primary py-25">
                                                                              <input type="radio" name="vueradio"
                                                                                  value="4">
                                                                              <input type="text" name="getOpt"
                                                                                  id="getOpt" hidden>
                                                                              <span class="vs-radio">
                                                                                  <span class="vs-radio--border"></span>
                                                                                  <span class="vs-radio--circle"></span>
                                                                              </span>
                                                                              <span>
                                                                                  Cash On Delivery
                                                                              </span>
                                                                          </div>
                                                                      </li>
                                                                      <li>
                                                                          <div
                                                                              class="vs-radio-con vs-radio-primary py-25">
                                                                              <input type="radio" name="vueradio"
                                                                                  value="5">
                                                                              <!-- to get status -->
                                                                              <input type="text" name="getOpt5"
                                                                                  id="getOpt5" value="saldo" hidden>
                                                                              <span class="vs-radio">
                                                                                  <span class="vs-radio--border"></span>
                                                                                  <span class="vs-radio--circle"></span>
                                                                              </span>
                                                                              <span>
                                                                                  Kurangi dari saldo
                                                                              </span>
                                                                          </div>
                                                                      </li>
                                                                  </ul>
                                                                  <hr>
                                                                  <!-- <div class="gift-card">
                                                                      <p><i
                                                                              class="feather icon-plus-square mr-25 font-medium-5"></i>
                                                                          Add Gift Card
                                                                      </p>
                                                                  </div> -->
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>


                                                  <div class="amount-payable checkout-options">
                                                      <div class="card">
                                                          <div class="card-header">
                                                              <h4 class="card-title">Detail Harga</h4>
                                                          </div>
                                                          <div class="card-content">
                                                              <div class="card-body">

                                                                  <div class="detail">
                                                                      <div class="details-title">
                                                                          <p id="jumlah_barang">Total</p>
                                                                      </div>
                                                                      <div class="detail-amt">
                                                                          <input type="text" id="harga_barang"
                                                                              name="harga_barang" hidden>
                                                                          <p id="harga_semua">
                                                                              Rp.<?php echo $d['hrg_jual'];
                                                                                    ?></p>
                                                                      </div>
                                                                  </div>
                                                                  <div class="detail">
                                                                      <div class="details-title">
                                                                          Harga Pengiriman
                                                                      </div>
                                                                      <div class="detail-amt discount-amt">
                                                                          <input type="text" name="biaya_kirim"
                                                                              id="biaya_kirim" value="20000" hidden>
                                                                          <p id="b_kirim">Rp.20000</p>
                                                                      </div>
                                                                  </div>
                                                                  <hr>
                                                                  <div class="detail">
                                                                      <div class="details-title">
                                                                          Yang harus di bayar </div>
                                                                      <div class="detail-amt total-amt">
                                                                          <input type="number" value=""
                                                                              name="total_penjualan"
                                                                              id="total_penjualan" hidden>
                                                                          <p id="harga_final">
                                                                              Rp.<?php echo $d['hrg_jual']; ?></p>
                                                                      </div>
                                                                  </div>
                                                                  <div class="detail">
                                                                      <div class="details-title">
                                                                          <p id="title_saldo"> </p>
                                                                      </div>
                                                                      <div class="detail-amt">
                                                                          <input type="number"
                                                                              value="<?= $sisa_saldo ?>" id="saldo_user"
                                                                              name="saldo_user" hidden>
                                                                          <p id="amount"> </p>
                                                                      </div>
                                                                  </div>
                                                                  <div class="detail">
                                                                      <div class="details-title">
                                                                          <p id="title_total"> </p>
                                                                      </div>
                                                                      <div class="detail-amt">

                                                                          <p id="total_akhir"> </p>
                                                                      </div>
                                                                  </div>

                                                                  <div class="detail">
                                                                      <button type="submit" class="btn btn-primary btn-block
                                                                      rounded-0 simpanData">
                                                                          BAYAR
                                                                      </button>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </section>
                                          </fieldset>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- Form wizard with icon tabs section end -->
          </div>


          <!-- Modal Kirim Transfer -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                  <form enctype="multipart/form-data">

                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Transfer</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <h5>Transfer Ke :<h5>
                                      <hr>
                                      </hr>
                                      <p></p>
                                      <h4>Santri Mart</h4>
                                      <h4>010231029301292</h4>
                                      <h4>BRI</h4>
                                      <hr>
                                      </hr>
                                      <input type="file" id="sub" name="gambar" multiple
                                          accept="i mage/png, image/jpeg"></input>

                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary uploadBukti">Save
                                  changes</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>


          <!-- Modal Success -->
          <div class="modal fade" id="modalSukses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Transfer</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <p class="text-center">Transaksi Sukses</p>

                      </div>

                  </div>
              </div>
          </div>



      </div>
  </div>
  <script src="scripts/jquery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <script type="text/javascript">
$(document).ready(function() {

    $('.simpanData').click(function(e) {
        e.preventDefault();
        var dis = document.getElementsByName("vueradio");
        var kd_barang = $("input[name='kd_barang[]']")
            .map(function() {
                return $(this).val();
            }).get();
        var quantity = $("input[name='quantity[]']")
            .map(function() {
                return $(this).val();
            }).get();
        if (dis[3].checked) {
            var cara_bayar = dis[3].value
            $("#exampleModal").modal('show');
            submit(kd_barang, quantity, cara_bayar);
        } else if (dis[5].checked) {
            var cara_bayar = dis[5].value;
            submit(kd_barang, quantity, cara_bayar);
            var saldo = document.getElementById("saldo_user").value;
            var total_penjualan = document.getElementById("total_penjualan").value;
            var total_akhir = saldo - total_penjualan;
            $("#title_saldo").text("Saldo");
            $("#amount").text("Rp." + saldo);
            $("#total_akhir").text("Rp." + total_akhir);
            $("#title_total").text("Sisa Saldo");
            $("#modalSukses").modal('show');
            setTimeout(function() {
                window.location = "../page/index.php?menu=home";
            }, 1000);

        }

    });

    $('.uploadBukti').click(function(e) {
        e.preventDefault();
        sendphoto();
    })

    var input = document.getElementsByName("tot al-harga[]");
    var totalall = 0;
    for (var i = 0; i < input.length; i++) {
        totalall += parseInt(input[i].value);
    }
    $("#total_harga").text("Rp." + totalall);
    $("#total_final").text("Rp." + totalall);

    $("#harga_barang").val(totalall);
    $("#harga_semua").text("Rp." + totalall);
    $("#harga_semua").val(totalall);
    var total_penjualan = document.getElementById("biaya_kirim").value;
    var total_all = totalall + parseInt(total_penjualan)
    $("#total_penjualan").val(total_all);
    $("#harga_final").text("Rp." + total_all);
});

var diskon = document.getElementById("diskon").value;

if (diskon == "") {
    diskon = 0;
} else {
    diskon
}


function submit(kd_barang, quantity, cara_bayar) {
    var fak = document.getElementById("fakturJual").value;
    var biaya_kirim = document.getElementById("biaya_kirim").value;
    var harga_barang = document.getElementById("harga_barang").value;
    var total_penjualan = document.getElementById("total_penjualan").value;
    var fakBeli = document.getElementById("fakturBeli").value;

    $.ajax({
        url: "../aksi/add_checkout.php",
        type: "post",
        data: {
            cara_bayar: cara_bayar,
            kd_barang: kd_barang,
            quantity: quantity,
            faktur_jual: fak,
            faktur_beli: fakBeli,
            biaya_kirim: biaya_kirim,
            harga_barang: harga_barang,
            total_penjualan: total_penjualan
        },
        success: function(data) {
            // alert(data);
        }
    })
}


function hapus(idUser, id_brg) {
    $.ajax({
        type: "POST",
        url: "../aksi/remove_checkout.php",
        data: {
            kd_barang: id_brg,
            id_user: idUser,
        },
        success: function(data) {}
    });
}

function sendphoto() {
    $("#exampleModal").modal('toggle');
    var file_data = $("#sub").prop("files")[0];
    var form_data = new FormData(); // Creating object of FormData class
    form_data.append("file", file_data);
    $.ajax({
        url: "../aksi/add_bukti_bayar.php",
        type: "post",
        dataType: 'script',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success: function(data) {
            $("#modalSukses").modal('show');
            setTimeout(function() {
                window.location = "../page/index.php?menu=home";
            }, 1000);
            // window.location.href=''
        }

    })
}




function cek_jumlah(id) {
    var total_stok = document.getElementById("total-stok-" + id).value;
    var jumlah = document.getElementById("quantity-" + id).value;
    // stok
    stok_akhir = total_stok - jumlah
    $("#stok_total-" + id).text(stok_akhir);
    // harga
    var harga = document.getElementById("harga-" + id).value;
    var total_harga = document.getElementById("total-harga-" + id);
    var total = jumlah * harga;
    $("#total-harga-" + id).val(total);

    var input = document.getElementsByName("total-harga[]");
    var totalall = 0;
    for (var i = 0; i < input.length; i++) {
        totalall += parseInt(input[i].value);
    }

    $("#total_harga").text("Rp." + totalall);
    $("#harga_barang").val(totalall);
    $("#harga_semua").text("Rp." + totalall);
    $("#total_final").text("Rp." + totalall);

    var total_penjualan = document.getElementById("biaya_kirim").value;
    var total_all = totalall + parseInt(total_penjualan)
    $("#total_penjualan").val(total_all);
    $("#harga_final").text("Rp." + total_all);
}
  </script>

  <!-- END: Content-->