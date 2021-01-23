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
    <title>Masuk GetId - Aplikasi Jual Pulsa dan Paket Data termurah</title>


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
                    Selamat Datang,
                </div>
                <div class="pb-3" style="font-weight: 400;">
                    Silahkan login terlebih dahulu untuk melanjutkan
                </div>
                <form class="form-horizontal" method="post" action="<?php echo site_url('Login/user_login')?>">
                    <div>
                        Email
                    </div>
                    <div>
                        <input class="text-center" name='username' id='username' type="email"
                            placeholder="masukan email anda" required>
                    </div>
                    <div class="pt-3">
                        Password
                    </div>
                    <div class="pb-3">
                        <input class="text-center" name="password" id='password' type="password"
                            placeholder="masukan password anda" required>
                        <i style="position: relative; left: -30px; color: black; cursor: pointer;"
                            onclick="myFunction(this)" class="fas fa-eye clk"></i>
                    </div>
                    <div>
                        <button class="masuk" type="submit">Masuk</button>
                    </div>

                </form>
                <div class="pt-2" style="font-weight: 300;">
                    <span>Baru pertama kali?</span>
                    <span>
                        <a class="create" href="<?php echo site_url('Login/Register')?>"> Buat Akun</a>
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
                            Masuk Dengan Akun Google
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
    <div class="modal fade" id="successmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none;">

                <div class="modal-body text-center" style="padding: 0 40px; font-size: 15px;">
                    <div class="pt-5">
                        <i style="font-size: 60px; color: #28d468;" class="far fa-check"></i>
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
    <!-- Modal Danger -->
    <div class="modal fade" id="warningmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none;">

                <div class="modal-body text-center" style="padding: 0 40px; font-size: 15px;">
                    <div class="pt-5">
                        <i style="font-size: 60px; color: #bd2130;" class="far fa-times"></i>
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