<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center" style="background:<?php echo $headerfooter;?>">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="index.php?menu=home"></a></li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-more-vertical"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons"> 
                            
                            <li class="nav-item d-none d-lg-block"><a href="index.php?menu=home"><img src="../img/toko/<?php echo $logo;?>" width="40" height="40" /></a></li>                            
                        </ul>                        
                    </div>
                    <ul class="nav navbar-nav float-right">                              
<?php if ($_SESSION['akses'] == 'admin') {	?>
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1 d-xl-none" href="index.php?menu=home" style="color:<?php echo $tombol;?>"><i class="fas fa-home"></i></a></li>
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1 d-xl-none" href="index.php?menu=ipos" style="color:<?php echo $tombol;?>"><i class="fas fa-cash-register"></i></a></li>                        
                       </li> 
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1 d-xl-block d-none" href="index.php?menu=order" style="color:<?php echo $tombol;?>"><i class="fas fa-receipt"></i><span class="badge badge-pill badge-info font-small-2">1</span></a></li>                        
                       </li>
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1" href="chat.php" style="color:<?php echo $tombol;?>"><i class="fas fa-comment-dots"></i><span class="badge badge-pill badge-info font-small-1"><i class="fas fa-circle"></i></span></a></li>                        
                       </li>    
                       
                       </li> 
                       
                       <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                          <div class="user-nav d-sm-flex d-none">
                          	<span class="user-name text-bold-600" style="color:<?php echo $tombol;?>"><?php echo $_SESSION['nm_user'];?></span>
                            <span class="user-status" style="color:<?php echo $tombol;?>"><?php echo $_SESSION['email_user'];?></span>
                          </div>
                          <span><img class="round" src="../img/icon/admin.jpg" height="40" width="40"></span>
                            </a>
                          <div class="dropdown-menu dropdown-menu-right">
                          	<a class="dropdown-item" href="index.php?menu=profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../aut/logout.php"><i class="fas fa-power-off"></i> Logout</a>
                            </div>
                        </li>       
<?php } ?>   

<?php if ($_SESSION['akses'] == 'merchant') {	?>
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1" href="index.php?menu=home" style="color:<?php echo $tombol;?>"><i class="fas fa-home"></i></a></li> 
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1" href="chat.php" style="color:<?php echo $tombol;?>"><i class="fas fa-comment-dots"></i><span class="badge badge-pill badge-info font-small-1"><i class="fas fa-circle"></i></span></a></li>
                       </li>                        
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1" href="index.php?menu=order" data-toggle="dropdown" style="color:<?php echo $tombol;?>"><i class="fas fa-receipt"></i><span class="badge badge-pill badge-info font-small-1">1</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                        </div>
                                    </a>
                                    
                                    <a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                        </div>
                                    </a>
                                    </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="index.php?menu=order">Read all notifications</a></li>
                            </ul>
                            
                        </li>
                        
                         <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                          <div class="user-nav d-sm-flex d-none">
                          	<span class="user-name text-bold-600" style="color:<?php echo $tombol;?>"><?php echo $_SESSION['nm_user'];?></span>
                            <span class="user-status" style="color:<?php echo $tombol;?>"><?php echo $_SESSION['email_user'];?></span>
                          </div>
                          <span><img class="round" src="../img/icon/admin.jpg" height="40" width="40"></span>
                            </a>
                          <div class="dropdown-menu dropdown-menu-right">
                          	<a class="dropdown-item" href="index.php?menu=profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../aut/logout.php"><i class="fas fa-power-off"></i> Logout</a>
                            </div>
                        </li>        
<?php } ?> 

<?php if ($_SESSION['akses'] == 'member') {	?>
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1" href="index.php?menu=home" style="color:<?php echo $tombol;?>"><i class="fas fa-home"></i></a></li> 
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1" href="chat.php?id=1" style="color:<?php echo $tombol;?>"><i class="fas fa-comment-dots"></i><span class="badge badge-pill badge-info font-small-1"><i class="fas fa-circle"></i></span></a></li>
                        
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1" href="index.php?menu=order" data-toggle="dropdown" style="color:<?php echo $tombol;?>"><i class="fas fa-receipt"></i><span class="badge badge-pill badge-info font-small-1">1</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                        </div>
                                    </a>
                                    
                                    <a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                        </div>
                                    </a>
                                    </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="index.php?menu=order">Read all notifications</a></li>
                            </ul>
                            
                        </li>
                        
                        <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                          <div class="user-nav d-sm-flex d-none">
                          	<span class="user-name text-bold-600" style="color:<?php echo $tombol;?>"><?php echo $_SESSION['nm_user'];?></span>
                            <span class="user-status" style="color:<?php echo $tombol;?>"><?php echo $_SESSION['email_user'];?></span>
                          </div>
                          <span><img class="round" src="../img/icon/admin.jpg" height="40" width="40"></span>
                            </a>
                          <div class="dropdown-menu dropdown-menu-right">
                          	<a class="dropdown-item" href="index.php?menu=profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../aut/logout.php"><i class="fas fa-power-off"></i> Logout</a>
                            </div>
                        </li>         
<?php } ?>             
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php?menu=home">
                            <img src="../img/<?php echo $logo;?>" height="45" />
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">               
                <ul class="nav navbar-nav justify-content-center" id="main-menu-navigation" data-menu="menu-navigation">
<?php if ($_SESSION['akses'] == 'admin') {	?>                 
                 <li class="nav-item">
                     <a href="index.php?menu=home" class="nav-link"><i class="fas fa-home"></i> BERANDA</a>
                 </li>
                 <li class="nav-item">
                     <a href="index.php?menu=ipos" class="nav-link"><i class="fas fa-cash-register"></i> iPOS</a>
                 </li>
                 <li class="nav-item">
                     <a href="index.php?menu=product" class="nav-link"><i class="fas fa-box-open"></i> PRODUCT</a> 
                 </li> 
                 <li class="nav-item">
                 	<a href="index.php?menu=info" class="nav-link"><i class="fas fa-newspaper"></i> INFO</a> 
                 </li>
                 <li class="nav-item">
                 	<a href="index.php?menu=ads" class="nav-link"><i class="fab fa-adversal"></i> IKLAN</a> 
                 </li>
                 <li class="nav-item">
                 	<a href="index.php?menu=streaming" class="nav-link"><i class="fas fa-video"></i> LIVE STREAMING</a> 
                 </li>
                 <li class="nav-item">
                 	<a href="index.php?menu=saldo" class="nav-link"><i class="fas fa-wallet"></i> SALDO</a> 
                 </li>                 
                 <li class="nav-item">
                 	<a href="index.php?menu=website" class="nav-link"><i class="fas fa-globe"></i> WEBSITE</a> 
                 </li>
<?php } ?>

<?php if ($_SESSION['akses'] == 'merchant' ) {	?>                	
                  <li class="nav-item">
                     <a href="index.php?menu=home" class="nav-link"><i class="fas fa-home"></i> BERANDA</a>
                 	</li>
                  <li class="nav-item">
                     <a href="index.php?menu=product" class="nav-link"><i class="fas fa-box-open"></i> PRODUCT</a> 
                 </li>
                 <li class="nav-item">
                 	<a href="index.php?menu=order" class="nav-link"><i class="fas fa-receipt"></i> ORDER</a> 
                 </li>
                               
<?php } ?>
                 

<?php if ($_SESSION['akses'] == 'member' ) {	?>                	
                    <li class="nav-item">
                     <a href="index.php?menu=home" class="nav-link"><i class="fas fa-home"></i> BERANDA</a>
                 	</li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link active" href="index.php?menu=home" data-toggle="dropdown"><i class="fas fa-server"></i> PRODUK</a>
                        <ul class="dropdown-menu">
<?php error_reporting(0);           
   $ketQuery = "SELECT * FROM tabel_kategori_barang ORDER BY nm_kategori ASC";
   $executeSat = mysqli_query($koneksi, $ketQuery);
   while ($a=mysqli_fetch_array($executeSat)) {
?> 
                            <li class="nav-item" data-menu=""><a class="dropdown-item" href="index.php?menu=list&kd_kategori=<?php echo $a['kd_kategori']; ?>" data-toggle="dropdown"><?php echo $a['nm_kategori'];?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>                   

                 <li class="nav-item">
                 	<a href="index.php?menu=saldo" class="nav-link"><i class="fas fa-wallet"></i> SALDO</a> 
                 </li>
                 <li class="nav-item">
                 	<a href="index.php?menu=order" class="nav-link"><i class="fas fa-receipt"></i> ORDER</a> 
                 </li>
                                  
<?php } ?>


                </ul>
            </div>
        </div>
    </div>
<!-- END: Main Menu-->
    
