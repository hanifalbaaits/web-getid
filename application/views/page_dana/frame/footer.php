<footer class="footer">
    <div>
        <hr style="background-color: grey;">
    </div>
    <div class="d-flex justify-content-between">
        <div style="color: black;">
            &copy; 2020 GetId
        </div>
        <div class="a-foot">
            <span class="pr-3">
                <a href="<?php echo site_url('Help/terms_policy');?>">
                    Syarat dan Ketentuan
                </a>
            </span>
            <span>
                <a href="<?php echo site_url('Help');?>">
                    Bantuan
                </a>
            </span>
        </div>
    </div>
</footer>

<div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: none;">

            <div class="modal-body text-center" style="padding: 0 40px; font-size: 15px;">
                <div class="pt-5">
                    <i style="font-size: 60px; color: #da9f22;" class="far fa-clock"></i>
                </div>
                <div class="pt-3">
                    Mohon tunggu...
                </div>
                <div>
                    Transaksi anda sedang diproses
                </div>
                <div class="pt-3 pb-5">
                    <button type="button" class="lanjut">Oke</button>
                </div>
            </div>

        </div>
    </div>
</div>

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
<?php } else if ($status == '2') { ?>
<script type="text/javascript">
$(window).on('load', function() {
    $('#warningmodal').modal('show');
});
</script>
<?php } else { ?>
<script type="text/javascript">
$(window).on('load', function() {
    $('#transactionModal').modal('show');
});
</script>
<?php }} ?>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<!-- JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/bundle.js?ver=1.9.2"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js?ver=1.9.2"></script>
<script src="<?php echo base_url(); ?>assets/js/charts/gd-invest.js?ver=1.9.2"></script>

<script type="text/javascript">
function scrollto(div) {
    $('html,body').animate({
        scrollTop: $("#" + div).offset().top
    }, 'slow');
}
</script>

</body>

</html>