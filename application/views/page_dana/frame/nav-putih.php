<body class="beli">
    <header id="header" class="header-beli" style="position: fixed;">
        <div class="pt-3 d-flex" style="color: black;">
            <div class="head-left d-flex">
                <div>
                    <img style="height: 30px;" src="<?php echo base_url(); ?>assets_custom/nama_berwarna.png" alt="">
                </div>
                <div style="border-bottom:  #fbb040 2px solid;">
                    <a class="nav-putih" href="<?php echo site_url("home"); ?>">
                        Beranda
                    </a>
                </div>
                <div class="angle dropdown nav-putih" style="cursor: pointer;">
                    Beli
                    <i class="fas fa-angle-down"></i>
                    <i class="fas fa-angle-up"></i>
                    <div class="dropdown-content">
                        <a href="<?php echo site_url("beli/pulsa"); ?>">Pulsa</a>
                        <a href="<?php echo site_url("beli/paket"); ?>">Paket Data</a>
                    </div>
                </div>
                <div class="angel">
                    <a class="nav-putih" href="<?php echo site_url("beli/topup"); ?>">
                        Top Up Saldo
                    </a>
                </div>
                <div class="angle dropdown" style="cursor: pointer;">
                    <a class="nav-putih" href="<?php echo site_url("riwayat/index"); ?>">
                        Riwayat
                    </a>
                    <!-- <i class="fas fa-angle-down"></i>
                    <i class="fas fa-angle-up"></i>
                    <div class="dropdown-content">
                        <a href="<?php echo site_url("riwayat/transaksi"); ?>">Transaksi</a>
                        <a href="<?php echo site_url("riwayat/deposito"); ?>">Deposito</a>
                    </div> -->
                </div>
            </div>
            <div class="angle dropdown" style="cursor: pointer; margin-left: 380px;">
                <i class="fas fa-user"></i>
                profile
                <i class="fas fa-angle-down"></i>
                <i class="fas fa-angle-up"></i>
                <div class="dropdown-content">
                    <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                        <div class="user-card">
                            <div class="user-avatar">
                                <!-- <span>AB</span> -->
                                <em class="icon ni ni-user-alt"></em>
                            </div>
                            <div class="user-info">
                                <span class="lead-text"><?php echo $this->session->userdata('storename'); ?></span>
                                <span class="sub-text"><?php echo $this->session->userdata('storeid'); ?></span>
                            </div>
                            <!-- <div class="user-action">
                                         <a class="btn btn-icon mr-n2" href="html/invest/profile-setting.html"><em
                                                 class="icon ni ni-setting"></em></a>
                                     </div> -->
                        </div>
                    </div>
                    <div class="dropdown-inner user-account-info">
                        <h6 class="overline-title-alt">Saldo Saat Ini</h6>
                        <div class="user-balance"><?php echo "Rp ".number_format($saldo, 0, ',', '.'); ?>
                        </div>
                        <!-- <div class="user-balance-sub">Locked <span>15,495.39 <span
                                             class="currency currency-usd">USD</span></span></div>
                                 <a href="#" class="link"><span>Withdraw Balance</span> <em
                                         class="icon ni ni-wallet-out"></em></a> -->
                    </div>
                    <div class="dropdown-inner">
                        <ul class="link-list">
                            <li><a href="<?php echo site_url("profile"); ?>"><em class="icon ni ni-user-alt"></em>
                                    <span>Lihat Profile</span></a>
                            </li>
                            <?php if ($this->session->userdata('platform') == 'default') { ?>
                            <li><a href="#" data-toggle="modal" data-target="#modalGP"><em
                                        class="icon ni ni-setting-alt"></em><span>Ubah Kata
                                        Sandi</span></a></li>
                            <?php } ?>
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
            </div>
        </div>

        <!-- Modal Form -->

    </header>

    <div class="modal fade" id="modalGP">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Kata Sandi</h5>
                    <a href="" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form data-parsley-validate class="form-group form-validate is-alter" method="post"
                        enctype="multipart/form-data" action="<?php echo site_url(). "/profile/ganti_password" ?>">
                        <div class="form-group">
                            <label class="form-label" for="full-name">Kata Sandi saat ini</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" name="gp_password_lama" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Kata Sandi Baru</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" name="gp_password_baru" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Konfirmasi Sandi Baru</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" name="gp_konfirmasi" required>
                            </div>
                        </div>
                        <div class="form-group" style="float:right">
                            <button type="submit" class="btn btn-lg btn-primary" onclick="return act_confirm()">Ubah
                                Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>