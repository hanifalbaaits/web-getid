 <!-- main header @s -->
 <div class="nk-header nk-header-fluid is-theme">
     <div class="container-xl wide-xl">
         <div class="nk-header-wrap">
             <div class="nk-menu-trigger mr-sm-2 d-lg-none">
                 <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em
                         class="icon ni ni-menu"></em></a>
             </div>
             <div class="nk-header-brand">
                 <a href="<?php echo site_url("home"); ?>" class="logo-link">
                     <!-- <img class="logo-light logo-img" src="<?php echo base_url(); ?>images/logo.png"
                         srcset="<?php echo base_url(); ?>images/logo2x.png 2x" alt="logo">
                     <img class="logo-dark logo-img" src="<?php echo base_url(); ?>images/logo-dark.png"
                         srcset="<?php echo base_url(); ?>images/logo-dark2x.png 2x" alt="logo-dark"> -->
                     <img class="logo-light logo-img" src="<?php echo base_url(); ?>images/SAPA5.jpg"
                         srcset="<?php echo base_url(); ?>images/SAPA5.jpg 2x" alt="logo">
                     <img class="logo-dark logo-img" src="<?php echo base_url(); ?>images/SAPA5.jpg"
                         srcset="<?php echo base_url(); ?>images/SAPA5.jpg" alt="logo-dark">
                 </a>
             </div><!-- .nk-header-brand -->
             <div class="nk-header-menu" data-content="headerNav">
                 <div class="nk-header-mobile">
                     <div class="nk-header-brand">
                         <a href="<?php echo site_url("home"); ?>" class="logo-link">
                             <img class="logo-light logo-img" src="<?php echo base_url(); ?>images/logo.png"
                                 srcset="<?php echo base_url(); ?>images/logo2x.png 2x" alt="logo">
                             <img class="logo-dark logo-img" src="<?php echo base_url(); ?>images/logo-dark.png"
                                 srcset="<?php echo base_url(); ?>images/logo-dark2x.png 2x" alt="logo-dark">
                         </a>
                     </div>
                     <div class="nk-menu-trigger mr-n2">
                         <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em
                                 class="icon ni ni-arrow-left"></em></a>
                     </div>
                 </div>
                 <ul class="nk-menu nk-menu-main ui-s2">
                     <li class="nk-menu-item has-sub">
                         <a href="<?php echo site_url("home"); ?>" class="nk-menu-link">
                             <span class="nk-menu-text">Beranda</span>
                         </a>
                     </li><!-- .nk-menu-item -->
                     <li class="nk-menu-item has-sub">
                         <a href="#" class="nk-menu-link nk-menu-toggle">
                             <span class="nk-menu-text">Beli</span>
                         </a>
                         <ul class="nk-menu-sub">
                             <li class="nk-menu-item">
                                 <a href="<?php echo site_url("beli/pulsa"); ?>" class="nk-menu-link"><span
                                         class="nk-menu-text">Isi
                                         Pulsa</span></a>
                             </li>
                             <li class="nk-menu-item">
                                 <a href="<?php echo site_url("beli/paket"); ?>" class="nk-menu-link"><span
                                         class="nk-menu-text">Isi
                                         Paket Data</span></a>
                             </li>
                         </ul><!-- .nk-menu-sub -->
                     </li><!-- .nk-menu-item -->
                     <li class="nk-menu-item has-sub">
                         <a href="<?php echo site_url("beli/topup"); ?>" class="nk-menu-link">
                             <span class="nk-menu-text">Top Up Saldo</span>
                         </a>
                     </li><!-- .nk-menu-item -->
                     <li class="nk-menu-item has-sub">
                         <a href="#" class="nk-menu-link nk-menu-toggle">
                             <span class="nk-menu-text">Riwayat Transaksi</span>
                         </a>
                         <ul class="nk-menu-sub">
                             <li class="nk-menu-item">
                                 <a href="<?php echo site_url("riwayat/transaksi"); ?>" class="nk-menu-link"><span
                                         class="nk-menu-text">Transaksi</span></a>
                             </li>
                             <li class="nk-menu-item">
                                 <a href="<?php echo site_url("riwayat/deposito"); ?>" class="nk-menu-link"><span
                                         class="nk-menu-text">Deposito</span></a>
                             </li>
                         </ul><!-- .nk-menu-sub -->
                     </li><!-- .nk-menu-item -->
                 </ul><!-- .nk-menu -->
             </div><!-- .nk-header-menu -->
             <div class="nk-header-tools">
                 <ul class="nk-quick-nav">
                     <!-- <li class="dropdown notification-dropdown">
                         <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                             <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em>
                             </div>
                         </a>
                         <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                             <div class="dropdown-head">
                                 <span class="sub-title nk-dropdown-title">Notifications</span>
                                 <a href="#">Mark All as Read</a>
                             </div>
                             <div class="dropdown-body">
                                 <div class="nk-notification">
                                     <div class="nk-notification-item dropdown-inner">
                                         <div class="nk-notification-icon">
                                             <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                         </div>
                                         <div class="nk-notification-content">
                                             <div class="nk-notification-text">You have requested to
                                                 <span>Widthdrawl</span>
                                             </div>
                                             <div class="nk-notification-time">2 hrs ago</div>
                                         </div>
                                     </div>
                                     <div class="nk-notification-item dropdown-inner">
                                         <div class="nk-notification-icon">
                                             <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                         </div>
                                         <div class="nk-notification-content">
                                             <div class="nk-notification-text">Your <span>Deposit
                                                     Order</span> is placed</div>
                                             <div class="nk-notification-time">2 hrs ago</div>
                                         </div>
                                     </div>
                                     <div class="nk-notification-item dropdown-inner">
                                         <div class="nk-notification-icon">
                                             <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                         </div>
                                         <div class="nk-notification-content">
                                             <div class="nk-notification-text">You have requested to
                                                 <span>Widthdrawl</span>
                                             </div>
                                             <div class="nk-notification-time">2 hrs ago</div>
                                         </div>
                                     </div>
                                     <div class="nk-notification-item dropdown-inner">
                                         <div class="nk-notification-icon">
                                             <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                         </div>
                                         <div class="nk-notification-content">
                                             <div class="nk-notification-text">Your <span>Deposit
                                                     Order</span> is placed</div>
                                             <div class="nk-notification-time">2 hrs ago</div>
                                         </div>
                                     </div>
                                     <div class="nk-notification-item dropdown-inner">
                                         <div class="nk-notification-icon">
                                             <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                         </div>
                                         <div class="nk-notification-content">
                                             <div class="nk-notification-text">You have requested to
                                                 <span>Widthdrawl</span>
                                             </div>
                                             <div class="nk-notification-time">2 hrs ago</div>
                                         </div>
                                     </div>
                                     <div class="nk-notification-item dropdown-inner">
                                         <div class="nk-notification-icon">
                                             <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                         </div>
                                         <div class="nk-notification-content">
                                             <div class="nk-notification-text">Your <span>Deposit
                                                     Order</span> is placed</div>
                                             <div class="nk-notification-time">2 hrs ago</div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="dropdown-foot center">
                                 <a href="#">View All</a>
                             </div>
                         </div>
                     </li> -->
                     <li class="dropdown user-dropdown order-sm-first">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                             <div class="user-toggle">
                                 <div class="user-avatar sm">
                                     <em class="icon ni ni-user-alt"></em>
                                 </div>
                                 <div class="user-info d-none d-xl-block">
                                     <!-- <div class="user-status">Administrator</div> -->
                                     <div class="user-name dropdown-indicator">Abu Bin Ishityak</div>
                                 </div>
                             </div>
                         </a>
                         <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1 is-light">
                             <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                 <div class="user-card">
                                     <div class="user-avatar">
                                         <!-- <span>AB</span> -->
                                         <em class="icon ni ni-user-alt"></em>
                                     </div>
                                     <div class="user-info">
                                         <span class="lead-text">Abu Bin Ishtiyak</span>
                                         <span class="sub-text">info@softnio.com</span>
                                     </div>
                                     <!-- <div class="user-action">
                                         <a class="btn btn-icon mr-n2" href="html/invest/profile-setting.html"><em
                                                 class="icon ni ni-setting"></em></a>
                                     </div> -->
                                 </div>
                             </div>
                             <div class="dropdown-inner user-account-info">
                                 <h6 class="overline-title-alt">Saldo Saat Ini</h6>
                                 <div class="user-balance"><small class="currency currency-usd">Rp</small>1.000.000 ,-
                                 </div>
                                 <!-- <div class="user-balance-sub">Locked <span>15,495.39 <span
                                             class="currency currency-usd">USD</span></span></div>
                                 <a href="#" class="link"><span>Withdraw Balance</span> <em
                                         class="icon ni ni-wallet-out"></em></a> -->
                             </div>
                             <div class="dropdown-inner">
                                 <ul class="link-list">
                                     <li><a href="<?php echo site_url("profile"); ?>"><em
                                                 class="icon ni ni-user-alt"></em><span>Lihat Profile</span></a></li>
                                     <!-- <li><a href="html/invest/profile-setting.html"><em
                                                 class="icon ni ni-setting-alt"></em><span>Account
                                                 Setting</span></a></li>
                                     <li><a href="html/invest/profile-activity.html"><em
                                                 class="icon ni ni-activity-alt"></em><span>Login
                                                 Activity</span></a></li> -->
                                 </ul>
                             </div>
                             <div class="dropdown-inner">
                                 <ul class="link-list">
                                     <li><a href="<?php echo site_url("login/user_logout"); ?>"><em
                                                 class="icon ni ni-signout"></em><span>Keluar</span></a></li>
                                 </ul>
                             </div>
                         </div>
                     </li><!-- .dropdown -->
                 </ul><!-- .nk-quick-nav -->
             </div><!-- .nk-header-tools -->
         </div><!-- .nk-header-wrap -->
     </div><!-- .container-fliud -->
 </div>
 <!-- main header @e -->