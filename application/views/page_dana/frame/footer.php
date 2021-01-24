<footer class="footer pt-0 mt-0">
    <div>
        <hr class="pt-0 mt-0" style="background-color: grey;">
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

            <div class="modal-body text-center" style="padding: 0 40px; font-size: 15px; color:black;">
                <div class="pt-5">
                    <i style="font-size: 60px; color: #da9f22;" class="fas fa-clock"></i>
                </div>
                <div class="pt-3">
                    Mohon tunggu...
                </div>
                <div>
                    Transaksi anda sedang diproses
                </div>
                <div class="pt-3 pb-5">
                    <button type="button" class="lanjut" data-dismiss="modal">Oke</button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="successmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-body text-center" style="padding: 0 40px; font-size: 15px; color:black;">
                <div class="pt-5">
                    <i style="font-size: 60px; color: #28a745;" class="fas fa-check-circle"></i>
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

            <div class="modal-body text-center" style="padding: 0 40px; font-size: 15px; color:black;">
                <div class="pt-5">
                    <i style="font-size: 60px; color: #dc3545;" class="fas fa-times-circle"></i>
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
<?php } else if ($status == '2' || $status == '0') { ?>
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

</body>

</html>