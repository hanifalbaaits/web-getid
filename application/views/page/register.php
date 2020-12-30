<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets_custom/pavicon.png">
    <!-- Page Title  -->
    <title>Buat Akun | GetId - Aplikasi Jual Pulsa dan Paket Data termurah</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashlite.css?ver=1.9.2">
    <link id="skin" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme.css?ver=1.9.2">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div
                            class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em
                                        class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg"
                                            src="<?php echo base_url(); ?>assets_custom/nama_berwarna.png"
                                            srcset="<?php echo base_url(); ?>assets_custom/nama_berwarna.png 2x"
                                            alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg"
                                            src="<?php echo base_url(); ?>assets_custom/nama_berwarna.png"
                                            srcset="<?php echo base_url(); ?>assets_custom/nama_berwarna.png 2x"
                                            alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Buat Akun</h5>
                                        <div class="nk-block-des">
                                            <!-- <p>Create New Dashlite Account</p> -->
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form class="form-horizontal form-validate is-alter" method="post"
                                    action="<?php echo site_url('Login/user_register')?>">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control form-control-lg" id="name" name="name"
                                            placeholder="Masukan nama lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control form-control-lg" id="email" name="email"
                                            placeholder="Masukan alamat email" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Kata Sandi</label>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password"
                                                name="password" placeholder="Masukan Kata Sandi" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-control-xs custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox">
                                            <!-- <label class="custom-control-label" for="checkbox">Saya Setuju dengan <a
                                                    tabindex="-1"
                                                    href="<?php echo site_url('Help/terms_policy');?>">Kebijakan</a>
                                                &amp; <a tabindex="-1"
                                                    href="<?php echo site_url('Help/terms_policy');?>">Syarat dan
                                                    Ketentuan</a></label> -->
                                            <label class="custom-control-label" for="checkbox">Saya Setuju dengan
                                                <a tabindex="-1"
                                                    href="<?php echo site_url('Help/terms_policy');?>">Syarat &amp;
                                                    Ketentuan</a></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block"
                                            onclick="return check_privacy()">Daftar</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 pt-4"> Telah memiliki akun ? <a
                                        href="<?php echo site_url('Login');?>"><strong>Masuk GetId</strong></a>
                                </div>
                                <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>Atau</span></h6>
                                </div>
                                <ul class="nav justify-center gx-8">
                                    <!-- <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li> -->
                                    <li class="nav-item"><a class="nav-link"
                                            href="<?php echo site_url('Login/google');?>">Login dengan Google</a></li>
                                </ul>
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="<?php echo site_url('Help/terms_policy');?>">Syarat dan
                                                Ketentuan</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link"
                                                href="<?php echo site_url('Help/terms_policy');?>">Kebijakan Pribadi</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('Help');?>">Bantuan</a>
                                        </li>
                                        <!-- <li class="nav-item dropup">
                                            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link"
                                                data-toggle="dropdown" data-offset="0,10"><small>English</small></a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul class="language-list">
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/english.png" alt=""
                                                                class="language-flag">
                                                            <span class="language-name">English</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/spanish.png" alt=""
                                                                class="language-flag">
                                                            <span class="language-name">Español</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/french.png" alt=""
                                                                class="language-flag">
                                                            <span class="language-name">Français</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/turkey.png" alt=""
                                                                class="language-flag">
                                                            <span class="language-name">Türkçe</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li> -->
                                    </ul><!-- nav -->
                                </div>
                                <div class="mt-3">
                                    <p>&copy; 2020 GetId</p>
                                </div>
                            </div><!-- nk-block -->
                        </div><!-- nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right"
                            data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <!-- <img class="round"
                                                    src="<?php echo base_url(); ?>images/slides/promo-a.png"
                                                    srcset="<?php echo base_url(); ?>images/slides/promo-a2x.png 2x"
                                                    alt=""> -->
                                                <img class="round"
                                                    src="<?php echo base_url(); ?>assets_custom/pavicon.png"
                                                    srcset="<?php echo base_url(); ?>assets_custom/pavicon.png 2x"
                                                    alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Title 1</h4>
                                                <p>Content 1</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <!-- <img class="round"
                                                    src="<?php echo base_url(); ?>images/slides/promo-b.png"
                                                    srcset="<?php echo base_url(); ?>images/slides/promo-b2x.png 2x"
                                                    alt=""> -->
                                                <img class="round"
                                                    src="<?php echo base_url(); ?>assets_custom/nama_berwarna.png"
                                                    srcset="<?php echo base_url(); ?>assets_custom/nama_berwarna.png 2x"
                                                    alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Title 2</h4>
                                                <p>Content 2</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <!-- <img class="round"
                                                    src="<?php echo base_url(); ?>images/slides/promo-c.png"
                                                    srcset="<?php echo base_url(); ?>images/slides/promo-c2x.png 2x"
                                                    alt=""> -->
                                                <img class="round" src="<?php echo base_url(); ?>assets_custom/logo.png"
                                                    srcset="<?php echo base_url(); ?>assets_custom/logo.png 2x" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Title 3</h4>
                                                <p>Content 3</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                </div><!-- .slider-init -->
                                <div class="slider-dots"></div>
                                <div class="slider-arrows"></div>
                            </div><!-- .slider-wrap -->
                        </div><!-- .nk-split-content -->
                    </div><!-- nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
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
                                <?php echo json_decode(json_encode($this->session->flashdata('message')))->message; ?>
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
                                <?php echo json_decode(json_encode($this->session->flashdata('message')))->message; ?>
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

    <script type="text/javascript">
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
    </script>




    <!-- JavaScript -->
    <?php if($this->session->flashdata('message') != NULL) {
      $status = json_decode(json_encode($this->session->flashdata('message')))->status;
      if($status == "1"){ ?>
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

    <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bundle.js?ver=1.9.2"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js?ver=1.9.2"></script>

</html>