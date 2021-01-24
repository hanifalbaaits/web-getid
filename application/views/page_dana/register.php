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

<body class="register">
    <header id="header" class="header">
    </header>
    <div>
        <div class="content-reg row col-12">
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
                        <input class="text-center py-1" id="name" name="name" type="text"
                            placeholder="masukan nama lengkap" required>
                    </div>
                    <div>
                        Email
                    </div>
                    <div>
                        <input class="text-center py-1" id="email" name="email" type="email"
                            placeholder="masukan email anda" required>
                    </div>
                    <div class="">
                        Password
                    </div>
                    <div class="pb-3">
                        <input class="text-center py-1" id="password" name="password" type="password"
                            placeholder="masukan password anda" required>
                        <i style="position: relative; left: -30px; color: black; cursor: pointer;"
                            onclick="myFunction(this)" class="fas fa-eye clk"></i>
                    </div>
                    <div class="d-flex align-items-center">
                        <input class="mr-1" style="width: fit-content;" id="checkbox-1" name="checkbox-1"
                            type="checkbox">
                        <label class="mb-0" for="checkbox-1" style="font-size: 12px;">
                            Saya Setuju dengan
                            <a class="create" tabindex="-1" href="<?php echo site_url('Help/terms_policy');?>">Syarat
                                &amp; Ketentuan</a>
                        </label>
                    </div>
                    <div class="pt-1">
                        <button class="masuk py-1" type="submit" onclick="return check_privacy()">Daftar</button>
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
                        <span class="google py-1">
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
            <!-- <img class="image2" src=" <?php echo base_url(); ?>assets_dana/Path 88@2x.png" alt=""> -->
        </div>
    </div>
    <!-- MODAL -->
    <!-- Modal Success -->
    <div class="modal fade" id="successmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none;">
                <div class="modal-body text-center" style="padding: 0 40px; font-size: 15px;">
                    <div class="pt-5">
                        <i style="font-size: 60px; color: #28a745;" class="far fa-check"></i>
                    </div>
                    <div class="pt-3">
                        Berhasil
                    </div>
                    <div>
                        <?php
                    if ($this->session->flashdata('message') != null) {
                        echo json_decode(json_encode($this->session->flashdata('message')))->message; 
                    } 
                    ?>
                    </div>
                    <div class="pt-3 pb-5">
                        <button type="button" class="lanjut" data-dismiss="modal">Oke</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="warningmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none;">

                <div class="modal-body text-center" style="padding: 0 40px; font-size: 15px;">
                    <div class="pt-5">
                        <i style="font-size: 60px; color: #dc3545;" class="far fa-times"></i>
                    </div>
                    <div class="pt-3">
                        Gagal
                    </div>
                    <div>
                        <?php
                    if ($this->session->flashdata('message') != null) {
                        echo json_decode(json_encode($this->session->flashdata('message')))->message; 
                    } 
                    ?>
                    </div>
                    <div class="pt-3 pb-5">
                        <button type="button" class="lanjut" data-dismiss="modal">Oke</button>
                    </div>
                </div>

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