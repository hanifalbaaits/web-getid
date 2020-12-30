<!-- footer @s -->
<div class="nk-footer nk-footer-fluid bg-lighter">
    <div class="container-xl">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright"> &copy; 2020 GetId </div>
            <div class="nk-footer-links">
                <ul class="nav nav-sm">
                    <li class="nav-item"><a class="nav-link"
                            href="<?php echo site_url('Help/terms_policy');?>">Persyaratan dan Ketentuan</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Help');?>">Bantuan</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- footer @e -->
</div>
<!-- wrap @e -->
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




<!-- JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/bundle.js?ver=1.9.2"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js?ver=1.9.2"></script>
<script src="<?php echo base_url(); ?>assets/js/charts/gd-invest.js?ver=1.9.2"></script>

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

<script>
$('.date-picker').datepicker({
    autoclose: true,
    format: "yyyy-mm-dd",
    orientation: "bottom auto"
});

function del_confirm() {
    var x = confirm("Apakah anda akan menghapus data ini?");
    if (x) {
        // localStorage.clear();
        return true;
    } else {
        return false;
    }
}

function act_confirm() {
    var x = confirm("Apakah anda akan mengerjakan perintah tersebut?");
    if (x) {
        // localStorage.clear();
        return true;
    } else {
        return false;
    }
}
</script>


</body>

</html>