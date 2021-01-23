<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="UTF-8" />
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Jual Pulsa dan Paket Data termurah">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets_custom/pavicon.png">
    <!-- Page Title  -->
    <title>Buat Akun GetId - Aplikasi Jual Pulsa dan Paket Data termurah</title>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_dana/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_dana/css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

    <script src="<?php echo base_url(). "js/" ?>vendors/jquery/jquery.js"></script>
</head>

<body class="login">
    <header id="header" class="header">
    </header>
    <div>
        <div class="content row col-12">
            <div class="col-5">
                <div class="pb-3">
                    <img width="150" src="<?php echo base_url(); ?>assets_dana/logo get.id@2x.png" alt="">
                </div>
                <div style="font-size: 27px;  font-weight: 500;">
                    Mau buat akun baru mu?,
                </div>
                <div class="pb-3" style="font-weight: 400;">
                    Silahkan daftarkan diri melalui form berikut
                </div>
                <form class="form-horizontal" method="post" action="<?php echo site_url('Login/user_register')?>">
                    <div>
                        Nama Lengkap
                    </div>
                    <div>
                        <input class="text-center" id="name" name="name" type="text" placeholder="masukan nama lengkap"
                            required>
                    </div>
                    <div>
                        Email
                    </div>
                    <div>
                        <input class="text-center" id="email" name="email" type="email" placeholder="masukan email anda"
                            required>
                    </div>
                    <div class="pt-3">
                        Password
                    </div>
                    <div class="pb-3">
                        <input class="text-center" id="password" name="password" type="password"
                            placeholder="masukan password anda" required>
                        <i style="position: relative; left: -30px; color: black; cursor: pointer;"
                            onclick="myFunction(this)" class="fas fa-eye clk"></i>
                    </div>
                    <div>
                        <input type="checkbox" class="custom-control-input" id="checkbox">
                        <label class="custom-control-label" for="checkbox">Saya Setuju dengan
                            <a class="create" tabindex="-1" href="<?php echo site_url('Help/terms_policy');?>">Syarat
                                &amp;
                                Ketentuan</a></label>
                    </div>
                    <div>
                        <button class="masuk" type="submit" onclick="return check_privacy()">Daftar</button>
                    </div>

                </form>
                <div class="pt-2" style="font-weight: 300;">
                    <span>Telah memiliki Akun?</span>
                    <span>
                        <a class="create" href="<?php echo site_url('Login')?>"> Masuk</a>
                    </span>
                </div>
                <div class="atau">
                    <span class="atau-text">
                        atau
                    </span>

                </div>
                <div>
                    <a href="<?php echo site_url('login/oauthg')?>">
                        <span class="google">
                            <i class="fab fa-google"></i>
                            Daftar dengan Akun Google
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <img style="height: 400px; width: auto; position: relative; bottom: -40px;"
                    src="<?php echo base_url(); ?>assets_dana/Group 185@2x.png" alt="">
            </div>
        </div>

        <div class="parent">
            <img class="image1" src="<?php echo base_url(); ?>assets_dana/Path 87@2x.png" alt="">
            <img class="image2" src=" <?php echo base_url(); ?>assets_dana/Path 88@2x.png" alt="">
        </div>
    </div>
    <footer id="footer">

    </footer>
    <!-- MODAL -->
    <!-- Modal Success -->
    <div class="modal fade" tabindex="-1" id="successmodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Berhasil!</h4>
                        <div class="nk-modal-text">
                            <div class="caption-text">
                                <?php
                                if ($this->session->flashdata('message') != null) {
                                    echo json_decode(json_encode($this->session->flashdata('message')))->message; 
                                } 
                                ?>
                            </div>
                            <!-- <span class="sub-text-sm">Learn when you reciveve bitcoin in your wallet. <a href="#"> Click
                                    here</a></span> -->
                        </div>
                        <div class="nk-modal-action">
                            <a href="#" class="btn btn-lg btn-mw btn-primary" data-dismiss="modal">Oke</a>
                        </div>
                    </div>
                </div><!-- .modal-body -->
                <!-- <div class="modal-footer bg-lighter">
                    <div class="text-center w-100">
                        <p>Earn upto $25 for each friend your refer! <a href="#">Invite friends</a></p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Modal Danger -->
    <div class="modal fade" tabindex="-1" id="warningmodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                        <h4 class="nk-modal-title">Maaf Gagal!</h4>
                        <div class="nk-modal-text">
                            <p class="lead">
                                <?php
                                if ($this->session->flashdata('message') != null) {
                                    echo json_decode(json_encode($this->session->flashdata('message')))->message; 
                                } 
                                ?>
                            </p>
                            <!-- <p class="text-soft">Jika kamu memerlukan bantuan hubungi kami di (813) 86111-891.</p> -->
                        </div>
                        <div class="nk-modal-action mt-5">
                            <a href="#" class="btn btn-lg btn-mw btn-light" data-dismiss="modal">Kembali</a>
                        </div>
                    </div>
                </div><!-- .modal-body -->
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <?php if($this->session->flashdata('message') != NULL) {
      $status = json_decode(json_encode($this->session->flashdata('message')))->status;
      if($status == '1'){ ?>
    <script type="text/javascript">
    $(window).on('load', function() {
        $('#successmodal').modal('show');
    });
    </script>
    <?php } else { ?>
    <script type="text/javascript">
    $(window).on('load', function() {
        $('#warningmodal').modal('show');
    });
    </script>
    <?php }} ?>
    <script>
    function check_privacy() {
        let check = false;
        if ($('#checkbox').is(":checked")) {
            check = true;
        }

        if (check == false) {
            alert('Privacy and Policy must be checked');
            return false;
        } else {
            return act_confirm();
        }
    }


    function myFunction(dana) {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        dana.classList.toggle("fa-eye-slash");

    }
    </script>
    <script src="<?php echo base_url(); ?>assets/js/bundle.js?ver=1.9.2"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js?ver=1.9.2"></script>
</body>

</html>